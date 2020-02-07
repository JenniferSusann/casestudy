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
	bn_name			varchar(30)	    not null,
	bn_pw			varchar(70)	    not null,
	email			varchar(70)				,

	constraint PK_benutzer primary key (bnID)
);

create table kategorie
(
	kategorieID	    int 		    not null auto_increment,
	beschreibung    varchar(30)	            ,

	constraint PK_buecher primary key (kategorieID)
);

create table tagebucheintrag
(
	bucheintragID	        int 		    not null auto_increment,
    bnID                    int     	    not null,
	diary_text				varchar(50)		not null, --Muss noch angepasst werden auf ca. 1500
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
				on delete no action
				on update cascade;
alter table tagebucheintrag
	add constraint FK_bucheintrag_kategorieID_2 foreign key (kategorieID_2)
			references kategorie (kategorieID) 
				on delete no action
				on update cascade;
alter table tagebucheintrag
	add constraint FK_bucheintrag_kategorieID_3 foreign key (kategorieID_3)
			references kategorie (kategorieID) 
				on delete no action
				on update cascade;

alter table tagebucheintrag
	add constraint FK_bucheintrag_bnID foreign key (bnID)
			references benutzer (bnID) 
				on delete no action
				on update cascade;




insert into benutzer (vorname, nachname, bn_name, bn_pw, email)
	values	('a', 'b', 'ab', '123', 'ab@mail.ch'),
			('c', 'd', 'cd', '456', 'cd@mail.ch'),
            ('e', 'f', 'ef', '789', 'ef@mail.ch');

insert into kategorie (beschreibung)
	values	('Kat1'),
            ('Kat2'),
            ('Kat3');

insert into tagebucheintrag (bnID, kategorieID_1, kategorieID_2, kategorieID_3, datum_eintrag, datum_erstellung)
	values	(1, 1, 2, 3, '2020-01-25', '2020-01-25'),
			(1, 1, 2, 3, '2020-01-26', '2020-01-26'),
            (2, 1, 2, 3, '2020-01-27', '2020-01-27');

