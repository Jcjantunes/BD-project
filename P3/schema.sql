DROP TABLE IF EXISTS solicita CASCADE;
DROP TABLE IF EXISTS audita CASCADE;
DROP TABLE IF EXISTS coordenador CASCADE;
DROP TABLE IF EXISTS acciona CASCADE;
DROP TABLE IF EXISTS alocado CASCADE;
DROP TABLE IF EXISTS transporta CASCADE;
DROP TABLE IF EXISTS meioSocorro CASCADE;
DROP TABLE IF EXISTS meioApoio CASCADE;
DROP TABLE IF EXISTS meioCombate CASCADE;
DROP TABLE IF EXISTS meio CASCADE;
DROP TABLE IF EXISTS entidadeMeio CASCADE;
DROP TABLE IF EXISTS eventoEmergencia CASCADE;
DROP TABLE IF EXISTS processoSocorro CASCADE;
DROP TABLE IF EXISTS vigia CASCADE;
DROP TABLE IF EXISTS local CASCADE;
DROP TABLE IF EXISTS segmentoVideo CASCADE;  
DROP TABLE IF EXISTS video CASCADE;
DROP TABLE IF EXISTS camara CASCADE;

create table camara
	(numCamara numeric(4) not null,
	constraint pk_camara primary key(numCamara));

create table video
	(dataHoraInicio timestamp not null,
	dataHoraFim timestamp not null,
	numCamara numeric(4) not null,
	constraint pk_video primary key (dataHoraInicio, numCamara),
	constraint fk_video_camara foreign key (numCamara) references camara(numCamara) ON DELETE CASCADE ON UPDATE CASCADE);

create table segmentoVideo
	(numSegmento numeric(4) not null,
	duracao time not null,
	dataHoraInicio timestamp not null,
	numCamara numeric(4) not null,
	constraint pk_segmentoVideo primary key (numSegmento, dataHoraInicio, numCamara),
	constraint fk_segmentoVideo_video foreign key (dataHoraInicio, numCamara) references video(dataHoraInicio, numCamara) ON DELETE CASCADE ON UPDATE CASCADE);

create table local
	(moradaLocal varchar(50) not null,
	constraint pk_local primary key(moradaLocal));

create table vigia
	(moradaLocal varchar(50) not null,
	numCamara numeric(4) not null,
	constraint pk_vigia primary key(moradaLocal, numCamara),
	constraint fk_vigia_local foreign key(moradaLocal) references local(moradaLocal) ON DELETE CASCADE ON UPDATE CASCADE,
	constraint fk_vigia_camara foreign key(numCamara) references camara(numCamara) ON DELETE CASCADE ON UPDATE CASCADE);

create table processoSocorro
	(numProcessoSocorro numeric(9) not null,
	constraint pk_processoSocorro primary key(numProcessoSocorro));

create table eventoEmergencia
	(numTelefone numeric(9) not null,
	instanteChamada timestamp not null,
	nomePessoa varchar(70) not null,
	moradaLocal varchar(50) not null,
	numProcessoSocorro numeric(9),
	constraint pk_eventoEmergencia primary key (numTelefone,instanteChamada),
	constraint fk_eventoEmergencia_local foreign key (moradaLocal) references local(moradaLocal) ON DELETE CASCADE ON UPDATE CASCADE,
	constraint fk_eventoEmergencia_processoSocorro foreign key (numProcessoSocorro) references processoSocorro(numProcessoSocorro) ON DELETE CASCADE ON UPDATE CASCADE,
	UNIQUE(numTelefone,nomePessoa));

create table entidadeMeio
	(nomeEntidade varchar(50) not null,
	constraint pk_entidadeMeio primary key (nomeEntidade));

create table meio
	(numMeio numeric(4) not null,
	nomeMeio varchar(50) not null,
	nomeEntidade varchar(50) not null,
	constraint pk_meio primary key (numMeio,nomeEntidade),
	constraint fk_meio_entidadeMeio foreign key (nomeEntidade) references entidadeMeio(nomeEntidade) ON DELETE CASCADE ON UPDATE CASCADE);

create table meioCombate
	(numMeio numeric(4) not null,
	nomeEntidade varchar(50) not null,
	constraint pk_meioCombate primary key (numMeio, nomeEntidade),
	constraint fk_meioCombate_meio foreign key (numMeio, nomeEntidade) references meio(numMeio, nomeEntidade) ON DELETE CASCADE ON UPDATE CASCADE);

create table meioApoio
	(numMeio numeric(4) not null,
	nomeEntidade varchar(50) not null,
	constraint pk_meioApoio primary key (numMeio, nomeEntidade),
	constraint fk_meioApoio_meio foreign key (numMeio, nomeEntidade) references meio(numMeio, nomeEntidade) ON DELETE CASCADE ON UPDATE CASCADE);

create table meioSocorro
	(numMeio numeric(4) not null,
	nomeEntidade varchar(50) not null,
	constraint pk_meioSocorro primary key (numMeio, nomeEntidade),
	constraint fk_meioSocorro_meio foreign key (numMeio, nomeEntidade) references meio(numMeio, nomeEntidade) ON DELETE CASCADE ON UPDATE CASCADE);

create table transporta
	(numMeio numeric(4) not null,
	nomeEntidade varchar(50) not null,
	numVitimas numeric(12) not null,
	numProcessoSocorro numeric(9) not null,
	constraint pk_transporta primary key (numMeio, nomeEntidade, numProcessoSocorro),
	constraint fk_transporta_meioSocorro foreign key (numMeio, nomeEntidade) references meioSocorro(numMeio, nomeEntidade) ON DELETE CASCADE ON UPDATE CASCADE,
	constraint fk_transporta_processoSocorro foreign key (numProcessoSocorro) references processoSocorro(numProcessoSocorro) ON DELETE CASCADE ON UPDATE CASCADE);

create table alocado
	(numMeio numeric(4) not null,
	nomeEntidade varchar(50) not null,
	numHoras time not null,
	numProcessoSocorro numeric(9) not null,
	constraint pk_alocado primary key (numMeio, nomeEntidade, numProcessoSocorro),
	constraint fk_alocado_meioApoio foreign key (numMeio, nomeEntidade) references meioApoio(numMeio, nomeEntidade) ON DELETE CASCADE ON UPDATE CASCADE,
	constraint fk_alocado_processoSocorro foreign key (numProcessoSocorro) references processoSocorro(numProcessoSocorro) ON DELETE CASCADE ON UPDATE CASCADE);

create table acciona
	(numMeio numeric(4) not null,
	nomeEntidade varchar(50) not null,
	numProcessoSocorro numeric(9) not null,
	constraint pk_acciona primary key (numMeio, nomeEntidade, numProcessoSocorro),
	constraint fk_acciona_meio foreign key (numMeio, nomeEntidade) references meio(numMeio, nomeEntidade) ON DELETE CASCADE ON UPDATE CASCADE,
	constraint fk_acciona_processoSocorro foreign key (numProcessoSocorro) references processoSocorro(numProcessoSocorro) ON DELETE CASCADE ON UPDATE CASCADE);

create table coordenador
	(idCoordenador numeric(3) not null,
	constraint pk_coordenador primary key (idCoordenador));

create table audita
	(idCoordenador numeric(3) not null,
	numMeio numeric(4) not null,
	nomeEntidade varchar(50) not null,
	numProcessoSocorro numeric(9) not null,
	datahoraInicio timestamp not null,
	datahoraFim timestamp not null,
	dataAuditoria date not null,
	texto varchar(255) not null,
	constraint pk_audita primary key (idCoordenador, numMeio, nomeEntidade, numProcessoSocorro),
	constraint fk_audita_acciona foreign key (numMeio, nomeEntidade, numProcessoSocorro) references acciona(numMeio, nomeEntidade, numProcessoSocorro) ON DELETE CASCADE ON UPDATE CASCADE,
	constraint fk_audita_coordenador foreign key (idCoordenador) references coordenador(idCoordenador) ON DELETE CASCADE ON UPDATE CASCADE,
	check (datahoraInicio < datahoraFim));

create table solicita
	(idCoordenador numeric(3) not null,
	dataHoraInicioVideo timestamp not null,
	numCamara numeric(4) not null,
	dataHoraInicio timestamp not null,
	dataHoraFim timestamp not null,
	constraint pk_solicita primary key (idCoordenador, dataHoraInicioVideo, numCamara),
	constraint fk_solicita_coordenador foreign key (idCoordenador) references coordenador(idCoordenador) ON DELETE CASCADE ON UPDATE CASCADE,
	constraint fk_solicita_video foreign key (dataHoraInicioVideo, numCamara) references video(dataHoraInicio, numCamara) ON DELETE CASCADE ON UPDATE CASCADE);
