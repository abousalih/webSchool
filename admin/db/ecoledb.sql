drop database if exists ecoledb;
create database ecoledb;
use ecoledb;
ALTER DATABASE `ecoledb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE utilisateur(
	id_utilisateur int(4) AUTO_INCREMENT PRIMARY KEY,
	login VARCHAR(100) ,
	pwd VARCHAR(255) ,
	role VARCHAR(50) ,
	email VARCHAR(255) 
);
INSERT INTO `utilisateur` (`id_utilisateur`,`login`,`pwd`,`role`,`email`) VALUES 
 (12,'admin','123','Directeur','admin@gmail.com'),
 (13,'swc1','123','Secrétaire','sec1@gmail.com'),
 (14,'sec2','123','Secrétaire','user2@gmail.com'),
 (17,'sec3','123','Secrétaire','test10@gmail.com');

CREATE TABLE filiere (
	id INT  AUTO_INCREMENT PRIMARY KEY ,
	nom VARCHAR( 255 )  ,
	niveau_diplome VARCHAR( 2 )  ,
	duree_formation INT  ,
	stage1 VARCHAR( 255 )  ,
	stage2 VARCHAR( 255 )  ,
	niveau_admission VARCHAR( 50 )  ,
	frais_inscription DOUBLE  ,
	frais_mansuel DOUBLE  ,
	frais_examen DOUBLE  ,
	frais_diplome DOUBLE  ,
	date_creation DATE  ,
	num_autorisation VARCHAR( 255 )  ,
	date_qualification DATE  ,
	num_qualification VARCHAR( 255 )  ,
	date_accreditation DATE  ,
	num_accreditation VARCHAR( 255 ) 
);

create table stagiaire (
	id int not null auto_increment primary key,
	civilite varchar (1) ,
	nom varchar (50)  ,
	prenom varchar(50) ,
	date_naissance date ,
	lieu_naissance varchar (200) ,
	adresse varchar (255) ,
	ville varchar (50) ,
	cin varchar (50) ,
	tel varchar (50) ,
	niveau_scolaire varchar (50) ,
	dernier_diplome  varchar (50) ,
	dernier_etablissement varchar (50) ,
	num_inscription varchar (50) ,
	date_inscription date ,
	code_national varchar (50) ,
	photo varchar (50)
	-- photo : le nom "nom.jpg" ou "nom.png" de la photo
);
	
 create table matiere(
	id_matiere int not null auto_increment primary key,
	nom varchar (50) not null,
	nombre_heure_total int ,
	nombre_heure_tp int ,
	nombre_heure_th int ,
	coef int not null
);
	
create table programme(
	id_prog int not null auto_increment primary key,
	id_filiere int ,
	annee_scolaire varchar(50) ,
	id_matiere int ,
	classe varchar(50)  
);
	
create table attestation (
	id int not null auto_increment primary key,
	nom varchar (50) ,
	date_impression date ,
	num_attestation varchar(50),
	singature varchar(50) ,
	id_stagiaire int 
);

create table dossier_inscription(
	id int not null auto_increment primary key,
	attestation_scolarite int ,
	attestation_bac int ,
	cin int not null,
	extrait_acte_naissance int ,
	enveloppe int ,
	photo int ,
	reglement int ,
	id_filiere int
	);
	
create table scolarite(
	id int not null auto_increment primary key,
	annee_scolaire varchar(50) ,
	id_stagiaire int ,
	id_filiere int ,
	classe varchar(50) ,
	resultat varchar(50) , 
	date_resultat date 
	);
	-- resultat : inscrit, abondonne, admis, laureat, redoublant.
		
	alter table scolarite add constraint foreign key(id_stagiaire) 
	references stagiaire(id) ON DELETE CASCADE;
	-- ON DELETE CASCADE : si on supprime un stagiaire toutes ces données
	-- dans la table scolarité seront supprimées
-- 1 	
	alter table attestation add constraint foreign key (id_stagiaire) 
	references	stagiaire (id) ON DELETE CASCADE;
-- 2	
	alter table scolarite add constraint foreign key(id_filiere) 
	references filiere(id) ON DELETE CASCADE;
-- 3		
	alter table programme add constraint foreign key (id_filiere) 
	references filiere (id) ON DELETE CASCADE;
-- 4
	alter table programme add constraint foreign key (id_matiere) 
	references matiere (id_matiere) ON DELETE CASCADE;
-- 5		
	alter table dossier_inscription add constraint foreign key (id_filiere) 
	references filiere (id) ON DELETE CASCADE;
	
	describe filiere;
	describe stagiaire;
	describe matiere;
	describe attestation;
	describe dossier_inscription;
	describe scolarite;
	
	
	insert into filiere values

	(null,'TSGE','ts',2,'du 01 au 31 mai','du 01 au 31 mars','bac',500,500,500,500,'2014-12-15','01/2014','2017/10/11','Q1/2017','2017/10/11','AC1/2017'),
	
	(null,'TSDI','ts',2,'du 01 au 31 mai','du 01 au 31 mars','bac',500,500,500,500,'2014-12-15','01/2014','2017/10/11','Q1/2017','2017/10/11','AC1/2017'),
	
	(null,'TGI','t',2,'du 01 au 31 mai','du 01 au 31 mars','niveau_bac',500,500,500,500,'2014-12-15','01/2014','2017/10/11','Q1/2017','2017/10/11','AC1/2017');
	
	-- select id,nom from filiere;
	
	insert into stagiaire values

	( null,'f','Damiri','Hind','1997-11-21','Marrakech','154 Imlil','Marrakech','y12345','06 66 22 23 44','bac','bac','lyce rhali elfarouki','133-15','2017-10-05','z00053201',null),
	
	( null,'f','Kaftani','Souad','1998-02-25','Marrakech','120 Massira','Marrakech','y53284','06 44 22 23 22','bac','bac','lyce rhali elfarouki','134-15','2017-10-05','z00053201',null),
	
	( null,'f','wisal','dounia','1992-11-20','Marrakech','122 Daoudiyte','Marrakech','y14789','06 25 22 70 14','niveau bac',null,'lyce rhali elfarouki','135-15','2017-10-05','z00053201',null),
	
	( null,'f','meradi','samir','1992-11-20','Marrakech','122 Mhamid','Marrakech','y14789','06 25 22 70 14','bac',null,'lyce rhali elfarouki','135-15','2017-10-05','z00053201',null),
	
	( null,'m','Ennaciri','rachid','1992-11-20','Marrakech','122 Issil','Marrakech','y14789','06 25 22 70 14','bac',null,'lyce rhali elfarouki','135-15','2017-10-05','z00053201',null);
	
	
	insert into  scolarite(id,annee_scolaire,id_stagiaire,id_filiere,classe,resultat,date_resultat) values
		
		(null,'2018/2019',1,1,'1ere annee','admis','2018-06-30'),
		(null,'2018/2019',2,2,'1ere annee','admis','2018-06-30'),
		(null,'2018/2019',3,3,'1ere annee','admis','2018-06-30'),
		(null,'2018/2019',4,2,'1ere annee','admis','2017-06-30'),
		(null,'2018/2019',5,2,'1ere annee','Abondonne','2018-03-30'),
		
		(null,'2019/2020',1,1,'2eme annee','en cours',null),
		(null,'2019/2020',2,2,'2eme annee','en cours',null),
		(null,'2019/2020',3,3,'2eme annee','Laureat','2018-06-30'),
		(null,'2019/2020',4,2,'2eme annee','Laureat','2018-06-30');
	 
		
	--	select id,nom from stagiaire;
	--	select id,id_stagiaire,id_filiere,annee_scolaire,classe from scolarite;
		
	-- 	update stagiaire set ville='marrakech' where id=3;
		
	--	update filiere
	--	set frais_inscription='frais_inscription-frais_inscription*0.1';
		
	--	select id,nom,ville from stagiaire;
	--	select id, nom,frais_inscription from filiere;
		
	--	update filiere set frais_mansuel=frais_mansuel+50 where niveau_diplome='ts';
	--	select id,nom,niveau_diplome,frais_mansuel from filiere;
		
	
	SELECT id_stagiaire,annee_scolaire,classe,nom as 'Nom Filière'
	FROM scolarite,filiere
	WHERE filiere.id=scolarite.id_filiere
	AND id_stagiaire=2
	AND annee_scolaire='2017/2018';


	SELECT *
	FROM scolarite
	WHERE id_stagiaire=2
	AND annee_scolaire='2017/2018';

	
	
