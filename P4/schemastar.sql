DROP TABLE IF EXISTS eventos_meios_facts;
DROP TABLE IF EXISTS d_evento;
DROP TABLE IF EXISTS d_meio;
DROP TABLE IF EXISTS d_tempo;

CREATE TABLE d_tempo (
	idTempo SERIAl,
	dia numeric(2) NOT null,
	mes numeric(2) NOT null,
	ano numeric(4) NOT null,
	CONSTRAINT pk_d_tempo PRIMARY KEY(idTempo)
);


CREATE TABLE d_meio (
	idMeio SERIAL,
	numMeio numeric(4) NOT null,
	nomeMeio varchar(50) NOT null,
	nomeEntidade varchar(50) NOT null,
	tipo varchar(7),
	CONSTRAINT pk_d_meio PRIMARY KEY(idMeio)
);


CREATE TABLE d_evento(
	idEvento SERIAL,
	numTelefone numeric(9) NOT null,
	instanteChamada timestamp NOT null,
	CONSTRAINT pk_d_evento PRIMARY KEY(idEvento)	
);

create table eventos_meios_facts (
	idFact SERIAL,
	idTempo integer NOT null,
	idMeio integer NOT null,
	idEvento integer NOT null,

	CONSTRAINT pk_eventos_meios_facts PRIMARY KEY(idFact),
	CONSTRAINT fk_facts_tempo FOREIGN KEY (idTempo) REFERENCES d_tempo(idTempo) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_facts_meio FOREIGN KEY (idMeio) REFERENCES d_meio(idMeio) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_facts_evento FOREIGN KEY (idEvento) REFERENCES d_evento(idEvento) ON DELETE CASCADE ON UPDATE CASCADE
);