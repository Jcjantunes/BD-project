
/*1*/
SELECT numProcessoSocorro FROM acciona GROUP BY numProcessoSocorro HAVING COUNT(numMeio) >= 
ALL(SELECT COUNT(numMeio) FROM acciona GROUP BY numProcessoSocorro);

/*2*/
SELECT nomeEntidade FROM acciona NATURAL JOIN eventoEmergencia WHERE instanteChamada BETWEEN '2018-06-21 00:00:00' AND '2018-09-23 23:59:59'
GROUP BY nomeEntidade HAVING COUNT(DISTINCT numProcessoSocorro) >= ALL(SELECT COUNT(DISTINCT numProcessoSocorro) FROM acciona 
																	   NATURAL JOIN eventoEmergencia WHERE instanteChamada 
																	   BETWEEN '2018-06-21 00:00:00' AND '2018-09-23 23:59:59' 
																	   GROUP BY nomeEntidade);

/*3*/
SELECT DISTINCT numProcessoSocorro FROM eventoEmergencia NATURAL JOIN acciona WHERE moradaLocal = 'Oliveira do Hospital'
AND instanteChamada BETWEEN '2018-01-01 00:00:00' AND '2018-12-31 23:59:59' AND (numProcessoSocorro,numMeio,nomeEntidade) 
NOT IN(SELECT numProcessoSocorro,numMeio,nomeEntidade FROM audita NATURAL JOIN eventoEmergencia WHERE moradaLocal = 'Oliveira do Hospital'
AND instanteChamada BETWEEN '2018-01-01 00:00:00' AND '2018-12-31 23:59:59');

/*4*/
SELECT COUNT(numSegmento) FROM vigia NATURAL JOIN segmentoVideo NATURAL JOIN video WHERE duracao > '00:00:60' 
AND moradaLocal = 'Monchique' AND dataHoraInicio >= '2018-08-01 00:00:00' AND dataHoraFim <= '2018-08-31 23:59:59';

/*5*/
(SELECT numMeio,nomeEntidade FROM meioCombate) EXCEPT (SELECT numMeio,nomeEntidade FROM acciona NATURAL JOIN meioApoio);

/*6*/
SELECT nomeEntidade FROM meioCombate NATURAL JOIN acciona GROUP BY nomeEntidade HAVING COUNT(DISTINCT numProcessoSocorro) = 
(SELECT COUNT(DISTINCT numProcessoSocorro) FROM acciona);