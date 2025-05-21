--
--Visa snygg utskrift från sql rapporter
--
.headers on
.mode columns

--
--Visa alla rader från tabellen
--
SELECT * FROM course;

--
--Visa bara vissa kolumner
--
SELECT code, name FROM course;

--
--Visa bara vissa rader
--
SELECT * FROM course WHERE term =1;