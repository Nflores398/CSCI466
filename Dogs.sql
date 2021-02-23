DROP TABLE Dogs;
DROP TABLE Visit;
CREATE TABLE Dogs(
DogID int(4) PRIMARY KEY,
Breed char(30) NOT NULL,
Name char(20) NOT NULL,
Weight int(3) NOT NULL
);

INSERT INTO Dogs VALUE(
'1564',
'Labrador Retriever',
'Sammy',
'54'
);
INSERT INTO Dogs VALUE(
'1792',
'Husky',
'Daisy',
'52'
);
INSERT INTO Dogs VALUE(
'1602',
'German Shepherd',
'Max',
'90'
);
INSERT INTO Dogs VALUE(
'1129',
'Great Dane',
'Rocky',
'150'
);
INSERT INTO Dogs VALUE(
'1893',
'Golden Retriever',
'Goldie',
'64'
);
INSERT INTO Dogs VALUE(
'0986',
'French Bulldog',
'Milo',
'26'
);
DESCRIBE Dogs;
SELECT * FROM Dogs;

CREATE TABLE Visit(
VisitID int(8)AUTO_INCREMENT,
DogID int(4) NOT NULL,
VisitDate DATE NOT NULL,
Duration TIME NOT NULL,
PRIMARY KEY (VisitID),
FOREIGN KEY (DogID) REFERENCES Dogs(DogID)
);

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
DESCRIBE Visit;
SELECT * FROM Visit;
ALTER TABLE Visit ADD Bill float(8);

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

SELECT * FROM Visit;
