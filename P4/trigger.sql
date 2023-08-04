drop trigger if exists solicita_videos_trigger on solicita;
drop trigger aloca_meio_trigger on alocado;

create or replace function solicita_videos() returns trigger as $$
begin

	IF NOT EXISTS 	(SELECT * FROM vigia
					WHERE numCamara = new.numCamara
					AND moradaLocal IN 
					(SELECT moradaLocal 
					FROM audita NATURAL JOIN eventoEmergencia
					WHERE idCoordenador = new.idCoordenador))
	
	THEN
		RAISE EXCEPTION 'Um Coordenador so pode solicitar videos de camaras colocadas num local cujo accionamento de meios esteja a ser (ou tenha sido) auditado por ele proprio';
	
	END IF;

	return new;

End
$$ language plpgsql;

create or replace function aloca_meio() returns trigger as $$
begin
	IF (new.numProcessoSocorro NOT IN (SELECT numProcessoSocorro FROM acciona WHERE numMeio = new.numMeio AND nomeEntidade = new.nomeEntidade))  
	THEN
		RAISE EXCEPTION 'Um Meio de Apoio so pode ser alocado a Processos de Socorro para os quais tenha sido accionado';
	
	END IF;

	return new;

End
$$ language plpgsql;

create trigger solicita_videos_trigger before insert or update on solicita
	for each row execute procedure solicita_videos();

create trigger aloca_meio_trigger before insert or update on alocado
	for each row execute procedure aloca_meio();