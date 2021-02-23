/*
Noah Flores
Z1861588
CSCI 466
*/
--#1
--Must Drop Visit Table first
DROP TABLE Visit;
--Drop Dog table second
DROP TABLE Dog;
--#2
--Creates Dogs table
CREATE TABLE Dog(
DogID int(4) PRIMARY KEY,
Breed char(30) NOT NULL,
Name char(20) NOT NULL,
Weight int(3) NOT NULL
);
--#3 Add rows into Dog table
INSERT INTO Dog VALUE(
'1564',
'Labrador Retriever',
'Sammy',
'54'
);
INSERT INTO Dog VALUE(
'1792',
'Husky',
'Daisy',
'52'
);
INSERT INTO Dog VALUE(
'1602',
'German Shepherd',
'Max',
'90'
);
INSERT INTO Dog VALUE(
'1129',
'Great Dane',
'Rocky',
'150'
);
INSERT INTO Dog VALUE(
'1893',
'Golden Retriever',
'Goldie',
'64'
);
INSERT INTO Dog VALUE(
'0986',
'French Bulldog',
'Milo',
'26'
);
--#4 Prints info about Dog table
DESCRIBE Dog;
--#5 Prints out Dog Table
SELECT * FROM Dog;
--#6 Creates Visit Table 
CREATE TABLE Visit(
VisitID int(8)AUTO_INCREMENT,
DogID int(4) NOT NULL,
VisitDate DATE NOT NULL,
Duration TIME NOT NULL,
PRIMARY KEY (VisitID),
FOREIGN KEY (DogID) REFERENCES Dog(DogID)
);
--#7 Inserts rows into Visit Table
INSERT INTO Visit
(DogID, VisitDate, Duration)
 VALUE(
'1792',
'2020-09-07',
 '1:12:00'
);
INSERT INTO Visit
(DogID, VisitDate, Duration)
 VALUE(
'1792',
'2020-9-12',
 '00:38:00'
);
INSERT INTO Visit
(DogID, VisitDate, Duration)
 VALUE(
'0986',
'2020-10-01',
 '1:30:00'
);
INSERT INTO Visit
(DogID, VisitDate, Duration)
 VALUE(
'1602',
'2020-10-05',
 '00:58:00'
);
INSERT INTO Visit
(DogID, VisitDate, Duration)
 VALUE(
'1792',
'2020-11-02',
 '2:25:00'
);
INSERT INTO Visit
(DogID, VisitDate, Duration)
 VALUE(
'1564',
'2020-11-05',
 '1:21:00'
);
INSERT INTO Visit
(DogID, VisitDate, Duration)
 VALUE(
'1893',
'2020-11-25',
 '00:34:00'
);
INSERT INTO Visit
(DogID, VisitDate, Duration)
 VALUE(
'1129',
'2020-12-08',
 '3:25:00'
);
INSERT INTO Visit
(DogID, VisitDate, Duration)
 VALUE(
'1792',
'2020-12-27',
 '00:14:00'
);
--#8 Prints out info of table
DESCRIBE Visit;
--#9 Prints out table
SELECT * FROM Visit;
--#10 Adds billing column to the Visit Table
ALTER TABLE Visit ADD Bill float(8);
--#11 Updates the rows in the Visit table with values for Bill
UPDATE Visit
SET Bill = '569.15'
WHERE VisitID = 1;

UPDATE Visit
SET Bill = '99.99'
WHERE VisitID = 2;

UPDATE Visit
SET Bill = '152.17'
WHERE VisitID = 3;

UPDATE Visit
SET Bill = '1569.35'
WHERE VisitID = 4;

UPDATE Visit
SET Bill = '79.55'
WHERE VisitID = 5;

UPDATE Visit
SET Bill = '869.01'
WHERE VisitID = 6;

UPDATE Visit
SET Bill = '777.00'
WHERE VisitID = 7;

UPDATE Visit
SET Bill = '868.05'
WHERE VisitID = 8;

UPDATE Visit
SET Bill = '0.99'
WHERE VisitID = 9;
--#12 Prints out table with updated column and rows
SELECT * FROM Visit;