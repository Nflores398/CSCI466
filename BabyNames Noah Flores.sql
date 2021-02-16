/*
Noah Flores
CSCI 466
*/
USE BabyName; --Switch to BabyName database

SHOW TABLES;	--Show tables in BabyName

SHOW COLUMNS FROM BabyName;	--shows all the columns

SELECT DISTINCT name	--shows name from the year 2000
 FROM BabyName
 WHERE year = 2000
 LIMIT 50;

SELECT DISTINCT year 	--Shows years that the name Noah appears
FROM BabyName 
WHERE name = 'Noah' 
LIMIT 50;

SELECT name, gender, count	--Prints out the popular names for male and female in 1984
FROM BabyName
WHERE year = 1984
ORDER BY count DESC
LIMIT 50;

SELECT COUNT(DISTINCT name),place --List how many different names there are for each place
 FROM BabyName
 GROUP BY place
 LIMIT 50;
 
 SELECT name, SUM(count) --Shows names similar to Noah by names that start with No.
 FROM BabyName			-- Prints a count of the name and in the year 2000
 WHERE name LIKE 'No%'
 AND year = 2000
 GROUP BY name
 LIMIT 50;
 
 SELECT COUNT(DISTINCT name),year --Show how many names there were in the year 1974.
 FROM BabyName
 WHERE year = 1974;
 
 SELECT COUNT(*) FROM BabyName; --Show how many rows there are in the table.
 
 SELECT COUNT(name),gender --Show how many names are in the table for each sex from the year 1962.
 FROM BabyName
 WHERE year = 1962
 GROUP BY gender;
 
 