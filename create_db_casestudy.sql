--Projekt	:	Case Study
--Script fuer Case Study

--Erstellt	:	29.01.2020
--Autor		:	Koller Cyril
-------------------------------------------

create table benutzer
(
	bnID		    int 	        not null auto_increment,
	bn_name			varchar(30)	    not null,
	bn_pw			varchar(70)	    not null,

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




insert into benutzer (bn_name, bn_pw)
	values	('ab', '123'),
			('cd', '456'),
            ('ef', '789');

insert into kategorie (beschreibung)
	values	('Kat1'),
            ('Kat2'),
            ('Kat3');

insert into tagebucheintrag (bnID, kategorieID_1, kategorieID_2, kategorieID_3, datum_eintrag, datum_erstellung)
	values	(1, 1, 2, 3, '2020-01-25', '2020-01-25'),
			(1, 1, 2, 3, '2020-01-26', '2020-01-26'),
            (2, 1, 2, 3, '2020-01-27', '2020-01-27');

