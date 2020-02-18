--Projekt	:	Case Study
--Script fuer Case Study

--Erstellt	:	29.01.2020
--Autor		:	Koller Cyril
-------------------------------------------

create table benutzer
(
	bnID		    int 	        not null auto_increment,
	vorname			varchar(70)		not null,
	nachname		varchar(70)		not null,
	geburtsdatum	date					,
	bn_name			varchar(30)	    not null,
	bn_pw			varchar(70)	    not null,
	email			varchar(70)				,

	constraint PK_benutzer primary key (bnID)
);

create table kategorie
(
	kategorieID	    int 		    not null auto_increment,
	bnID			int				not null,
	beschreibung    varchar(30)	            ,

	constraint PK_buecher primary key (kategorieID)
);

create table tagebucheintrag
(
	bucheintragID	        int 		    not null auto_increment,
    bnID                    int     	    not null,
	diary_text				varchar(50)		not null, 
	kategorieID_1           int     	            ,
    kategorieID_2           int     	            ,
    kategorieID_3           int     	            ,
    datum_eintrag           date	        not null,
    datum_erstellung        date	        not null,
    bild                    longblob   	            ,
	

	constraint PK_bucheintrag primary key (bucheintragID)
);




alter table tagebucheintrag
	add constraint FK_bucheintrag_kategorieID_1 foreign key (kategorieID_1)
			references kategorie (kategorieID) 
				on delete restrict
				on update cascade;
alter table tagebucheintrag
	add constraint FK_bucheintrag_kategorieID_2 foreign key (kategorieID_2)
			references kategorie (kategorieID) 
				on delete restrict
				on update cascade;
alter table tagebucheintrag
	add constraint FK_bucheintrag_kategorieID_3 foreign key (kategorieID_3)
			references kategorie (kategorieID) 
				on delete restrict
				on update cascade;

alter table tagebucheintrag
	add constraint FK_bucheintrag_bnID foreign key (bnID)
			references benutzer (bnID) 
				on delete restrict
				on update cascade;

alter table kategorie 
	add CONSTRAINT UQ_kategorie_beschreibung 
    unique (bnID, beschreibung);
	

insert into benutzer (vorname, nachname, geburtsdatum, bn_name, bn_pw, email)
	values	('a', 'b', '2020-12-01', 'ab', '123', 'ab@mail.ch'),
			('c', 'd', '2020-12-02', 'cd', '456', 'cd@mail.ch'),
            ('e', 'f', '2020-12-03', 'ef', '789', 'ef@mail.ch');

insert into kategorie (bnID, beschreibung)
	values	(0, 'Familie'),
            (0, 'Feste'),
            (0, 'Schule');

insert into tagebucheintrag (bnID, diary_text, kategorieID_1, kategorieID_2, kategorieID_3, datum_eintrag, datum_erstellung)
	values	(1, 'Text', 1, 2, 3, '2020-01-25', '2020-01-25'),
			(1, 'Text', 1, 2, 3, '2020-01-26', '2020-01-26'),
            (2, 'Text', 1, 2, 3, '2020-01-27', '2020-01-27');

