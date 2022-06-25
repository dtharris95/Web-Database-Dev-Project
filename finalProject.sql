CREATE DATABASE finalProject;
use finalProject;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    userId INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE,
    `password` VARCHAR(255)
);

select * from users;

DROP TABLE IF EXISTS record;
CREATE TABLE record(
	albumID INT PRIMARY KEY AUTO_INCREMENT,
	album VARCHAR(255),
    artist VARCHAR(255),
    releaseDate DATE
);
    
INSERT INTO record (album, artist, releaseDate)
VALUES
("My Beautiful Dark Twisted Fantasy", "Kanye West", "2010-11-22");

INSERT INTO record (album, artist, releaseDate)
VALUES
("Man On The Moon: The End of Day", "Kid Cudi", "2009-09-15");

INSERT INTO record (album, artist, releaseDate)
VALUES
("Illmatic", "Nas", "1994-04-19");

INSERT INTO record (album, artist, releaseDate)
VALUES
("Man On The Moon II: The Legend of Mr. Rager", "Kid Cudi", "2010-11-09");

INSERT INTO record (album, artist, releaseDate)
VALUES
("Because the Internet", "Childish Gambino", "2013-12-10");

INSERT INTO record (album, artist, releaseDate)
VALUES
("Under Pressure", "Logic", "2014-10-21");

INSERT INTO record (album, artist, releaseDate)
VALUES
("Birds in the Trap Sing McKnight", "Travis Scott", "2016-09-02");

INSERT INTO record (album, artist, releaseDate)
VALUES
("Nothing Was The Same", "Drake", "2013-09-24");

INSERT INTO record (album, artist, releaseDate)
VALUES
("Aquemini", "Outkast", "1998-09-29");

INSERT INTO record (album, artist, releaseDate)
VALUES
("GO:OD AM", "Mac Miller", "2015-09-18");

INSERT INTO record (album, artist, releaseDate)
VALUES
("DAMN.", "Kendrick Lamar", "2017-04-13");

INSERT INTO record (album, artist, releaseDate)
VALUES
("The Off-Season", "J. Cole", "2021-05-14");

select * from record;