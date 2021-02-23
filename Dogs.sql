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
VisitID int(8) PRIMARY KEY  AUTO_INCREMENT,
DogID int(4) FOREIGN KEY REFERENCES Dogs(DogID),
VisitDate DATE NOT NULL,
Duration TIME NOT NULL
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
ALTER TABLE Visit ADD Bill float(6);
SELECT * FROM Visit;
