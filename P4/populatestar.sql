
--populate d_tempo
DROP FUNCTION IF EXISTS insert_d_tempo();
CREATE OR REPLACE FUNCTION insert_d_tempo() RETURNS VOID AS $$
	DECLARE tempo date;
	
	BEGIN
		tempo = date '2018-01-01';

		WHILE  (tempo < '2019-01-01') LOOP
			INSERT INTO d_tempo (dia, mes, ano) VALUES (
				date_part('day',tempo),
				date_part('month',tempo),
				date_part('year',tempo));
			tempo = tempo + INTERVAL '1 DAY';
		END LOOP;
	END
	$$	LANGUAGE plpgsql;

SELECT insert_d_tempo();


--populate d_evento
INSERT INTO d_evento(numTelefone,instanteChamada)
SELECT numTelefone,instanteChamada
FROM eventoEmergencia;

--populate d_meio

INSERT INTO d_meio(numMeio, nomeMeio, nomeEntidade, tipo)
SELECT numMeio, nomeMeio, nomeEntidade,'Apoio'
FROM meioApoio NATURAL JOIN meio;


INSERT INTO d_meio(numMeio, nomeMeio, nomeEntidade, tipo)
SELECT numMeio, nomeMeio, nomeEntidade,'Socorro'
FROM meioSocorro NATURAL JOIN meio;

INSERT INTO d_meio(numMeio, nomeMeio, nomeEntidade, tipo)
SELECT numMeio, nomeMeio, nomeEntidade,'Combate'
FROM meioCombate NATURAL JOIN meio; 

INSERT INTO d_meio(numMeio, nomeMeio, nomeEntidade, tipo)
SELECT numMeio, nomeMeio, nomeEntidade, NULL
FROM meio
WHERE (numMeio, nomeEntidade) NOT IN 
(SELECT * FROM meioApoio UNION 
SELECT * FROM meioCombate UNION 
SELECT * FROM meioSocorro);

--populate eventos_meios_facts

INSERT INTO eventos_meios_facts(idTempo,idMeio,idEvento)
SELECT idTempo,idMeio,idEvento FROM (SELECT idMeio,idEvento,
											date_part('day', instanteChamada) as dia,
											date_part('month', instanteChamada) as mes,
											date_part('year', instanteChamada) as ano 
											FROM acciona NATURAL JOIN processoSocorro NATURAL JOIN eventoEmergencia NATURAL JOIN d_meio 
											NATURAL JOIN d_evento) as foo NATURAL JOIN d_tempo;