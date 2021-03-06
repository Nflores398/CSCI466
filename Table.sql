CREATE TABLE S(
S char(2) PRIMARY KEY,
SNAME char(20) NOT NULL,
STATUS int(5) NOT NULL,
CITY char(20) NOT NULL
);
CREATE TABLE P(
P char(2) PRIMARY KEY,
PNAME char(20) NOT NULL,
COLOR char(10) NOT NULL,
WEIGHT int(5) NOT NULL
);
CREATE TABLE SP(
S char(2) NOT NULL,
P char(2) NOT NULL,
QTY int(5) NOT NULL,
PRIMARY KEY (S),
PRIMARY KEY (P),
FOREIGN KEY (S) REFERENCES S(S),
FOREIGN KEY (P) REFERENCES P(P)
);
INSERT INTO S
 VALUE(
'S1',
'Smith',
 '20',
 'London'
);
INSERT INTO S
 VALUE(
'S2',
'Jones',
 '10',
 'Paris'
);
INSERT INTO S
 VALUE(
'S3',
'Blake',
 '30',
 'Paris'
);
INSERT INTO S
 VALUE(
'S4',
'Clark',
 '20',
 'Paris'
);
INSERT INTO P
 VALUE(
'P1',
'Nut',
 'Red',
 '12'
);
INSERT INTO P
 VALUE(
'P2',
'Bolt',
 'Green',
 '17'
);
INSERT INTO P
 VALUE(
'P3',
'Screw',
 'Blue',
 '17'
);
INSERT INTO P
 VALUE(
'P4',
'Screw',
 'Red',
 '14'
);
INSERT INTO P
 VALUE(
'P5',
'Cam',
 'Blue',
 '12'
);
INSERT INTO P
 VALUE(
'P6',
'Cog',
 'Red',
 '19'
);
INSERT INTO SP
 VALUE(
'S1',
'P1',
 '300',
);
INSERT INTO SP
 VALUE(
'S1',
'P2',
 '300',
);
INSERT INTO SP
 VALUE(
'S1',
'P3',
 '400',
);
INSERT INTO SP
 VALUE(
'S1',
'P4',
'200',
);
INSERT INTO SP
 VALUE(
'S1',
'P5',
 '100',
);
INSERT INTO SP
 VALUE(
'S1',
'P6',
 '100',
);
INSERT INTO SP
 VALUE(
'S2',
'P1',
 '300',
);
INSERT INTO SP
 VALUE(
'S2',
'P2',
 '400',
);
INSERT INTO SP
 VALUE(
'S3',
'P1',
 '200',
);
INSERT INTO SP
 VALUE(
'S4',
'P2',
 '200',
);
INSERT INTO SP
 VALUE(
'S4',
'P4',
 '300',
);
INSERT INTO SP
 VALUE(
'S4',
'P5',
 '400',
);