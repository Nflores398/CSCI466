DROP TABLE WorkedOn;
DROP TABLE FreeQueuedIn;
DROP TABLE PaidQueuedIn;
DROP TABLE KaraokeVersion;
DROP TABLE Song;
DROP TABLE Artist;
DROP TABLE User;

CREATE TABLE Song (
	songID INT(12) PRIMARY KEY,
	title VARCHAR(32) NOT NULL
);

CREATE TABLE Artist (
	artistID INT(12) PRIMARY KEY,
	artistName VARCHAR(32) NOT NULL
);

CREATE TABLE User (
	userID INT(12) PRIMARY KEY AUTO_INCREMENT,
	userName VARCHAR(32) NOT NULL,
	timesSung INT(3)
);

CREATE TABLE KaraokeVersion (
	versionID INT(12) PRIMARY KEY,
	songID INT(12),
	versionName VARCHAR(32),
	FOREIGN KEY(songID) REFERENCES Song(songID)
);

CREATE TABLE WorkedOn (
	songID INT(12),
	artistID INT(12),
	contribution VARCHAR(32),
	PRIMARY KEY (songID, artistID),
	FOREIGN KEY(songID) REFERENCES Song(songID),
	FOREIGN KEY(artistID) REFERENCES Artist(artistID)
);


CREATE TABLE FreeQueuedIn (
	versionID INT(12),
	userID INT(12),
	dateTime TIMESTAMP,
	PRIMARY KEY(userID, versionID),
	FOREIGN KEY(userID) REFERENCES User(userID),
	FOREIGN KEY(versionID) REFERENCES KaraokeVersion(versionID)
);

CREATE TABLE PaidQueuedIn (
	versionID INT(12),
	userID INT(12),
	dateTime TIMESTAMP,
	amountPaid DECIMAL(12,2),
	PRIMARY KEY(versionID, userID),
	FOREIGN KEY(versionID) REFERENCES KaraokeVersion(versionID),
	FOREIGN KEY(userID) REFERENCES User(userID)
);

