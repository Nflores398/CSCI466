/*
Noah Flores
CSCI 466
*/
USE BabyName; --Switch to BabyName database

SHOW TABLES;	--Show tables in BabyName

SHOW COLUMNS FROM BabyName;	--shows all the columns

--shows name from the year 2000
SELECT DISTINCT name	
 FROM BabyName
 WHERE year = 2000
 LIMIT 50;	
 
--Shows years that the name Noah appears
SELECT DISTINCT year 	
FROM BabyName 
WHERE name = 'Noah' 
LIMIT 50;

--Prints out the popular names for male and female in 1984
SELECT name, gender, count	
FROM BabyName
WHERE year = 1984
ORDER BY count DESC
LIMIT 50;

--List how many different names there are for each place
SELECT COUNT(DISTINCT name),place 
 FROM BabyName
 GROUP BY place
 LIMIT 50;
 
 --Shows names similar to Noah by names that start with No.
 -- Prints a count of the name and in the year 2000
 SELECT name, SUM(count) 
 FROM BabyName			
 WHERE name LIKE 'No%'
 AND year = 2000
 GROUP BY name
 LIMIT 50;
 
 --Show how many names there were in the year 1974.
 SELECT COUNT(DISTINCT name),year 
 FROM BabyName
 WHERE year = 1974;
 
 --Show how many rows there are in the table.
 SELECT COUNT(*) FROM BabyName; 
 
 --Show how many names are in the table for each sex from the year 1962.
 SELECT COUNT(name),gender 
 FROM BabyName
 WHERE year = 1962
 GROUP BY gender;
 
 