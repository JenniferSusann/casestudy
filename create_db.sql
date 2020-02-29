sql

CREATE TABLE users ( 
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE kategorie (
	katid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	id INT NOT NULL,
	beschreibung VARCHAR(255)
);

CREATE TABLE eintrag (
	buchid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	id INT NOT NULL, 
	title VARCHAR(255) NOT NULL, -- ck Ist dies ein Input Feld beim Erfassen des Eintrages?
	-- ck oder ist der title der Eintragstext? JM das söt de titel von gsamte ihtrag sie
	text VARCHAR(1000) NOT NULL,
	katid1 INT, 
	katid2 INT,
	katid3 INT,
	datum_eintrag date NOT NULL,
	bild longblob,
	created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE eintrag
	ADD CONSTRAINT FK_katid1 FOREIGN KEY (katid1)
		REFERENCES kategorie (katid)
			ON DELETE RESTRICT
			ON UPDATE CASCADE;

ALTER TABLE eintrag
	ADD CONSTRAINT FK_katid2 FOREIGN KEY (katid2)
		REFERENCES kategorie (katid)
			ON DELETE RESTRICT
			ON UPDATE CASCADE;

ALTER TABLE eintrag
	ADD CONSTRAINT FK_katid3 FOREIGN KEY (katid3)
		REFERENCES kategorie (katid)
			ON DELETE RESTRICT
			ON UPDATE CASCADE;

ALTER TABLE kategorie
	ADD CONSTRAINT 

CREATE TABLE images(
	buchid INT(11) AUTO_INCREMENT,
	katid INT,
	imgdata longblob, 
	eintragid INT NOT NULL, 
	imgtype VARCHAR(20),
	id INT NOT NULL,
	PRIMARY KEY (bildid)
);