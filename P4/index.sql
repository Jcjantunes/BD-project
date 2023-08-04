--1
CREATE INDEX video_idx ON video USING HASH (numCamara);
CREATE INDEX vigia_idx ON vigia(moradaLocal,numCamara);


--2
CREATE INDEX transporta_idx ON transporta USING HASH (numProcessoSocorro);
CREATE INDEX eventoEmergencia_idx ON eventoEmergencia (numTelefone,instanteChamada,numProcessoSocorro); 
