/*
Noah Flores
CSCI 466
*/
USE BabyName; --Switch to BabyName database

SHOW TABLES;

SHOW COLUMNS FROM BabyName;

SELECT DISTINCT name
 FROM BabyName
 WHERE year = 2000
 LIMIT 50;

SELECT DISTINCT year 
FROM BabyName 
WHERE name = 'Noah' 
LIMIT 50;

SELECT name, gender, count
FROM BabyName
WHERE year = 1984
ORDER BY count DESC
LIMIT 50;

SELECT COUNT(DISTINCT name),place
 FROM BabyName
 GROUP BY place
 LIMIT 50;
 
 SELECT name, SUM(count)
 FROM BabyName
 WHERE name LIKE 'No%'
 AND year = 2000
 GROUP BY name
 LIMIT 50;
 
 SELECT COUNT(DISTINCT name),year
 FROM BabyName
 WHERE year = 1974;
 
 SELECT COUNT(*) FROM BabyName;
 
 SELECT COUNT(name),gender
 FROM BabyName
 WHERE year = 1962
 GROUP BY gender;
 
 