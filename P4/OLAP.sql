SELECT tipo,ano,mes, COUNT(idMeio)
FROM eventos_meios_facts NATURAL JOIN d_meio NATURAL JOIN d_tempo
WHERE idEvento = 15
GROUP BY ROLLUP(tipo, ano, mes);