drop database if exists gestion_cours;
create database if not exists gestion_cours;
use gestion_cours;
create table filiere (
    idFiliere int(4) auto_increment primary key,
    nomFilere varchar(50),
    niveau  varchar(50)

);

Create table cours(
    idCours int(4) auto_increment primary key,
    nomCours varchar(50),
    domaine varchar(50),
    datepublication varchar(50),
    idFiliere int(4)
);

Create table utilisateur(
    idUtilisateur int(4) auto_increment primary key,
    login varchar(50),
    email varchar(255),
    role varchar(50),
    etat int(1),
    pwd varchar(255)
);

Alter table cours add constraint foreign key(idFiliere) references filiere(idFiliere);


INSERT INTO filiere(nomFilere, niveau) VALUES 
 ('economie et finance ','B'),
 ('Comptabilité','B'),
 ('informatique de gestion','TS'),
 ('Digital Marketing','M') ,
 ('Genie logiciel','L'),
 ('economie et finance ','L'),
 ('Comptabilité','L'),
 ('informatique de gestion','L'),
 ('Digital Marketing','L') ,
 ('Genie industrielle','M'),
 ('Administration des Affaires','M'),
 ('Ressources Humaines','M'),
 ('economie et finance ','T'),
 ('Comptabilité','Ts'),
 ('informatique de gestion','T'),
 ('Digital Marketing','Ts') ,
 ('Genie informatique','L'),
 ('Genie logiciel','M'),
 ('Finance et Banque ','T'),
 ('Finance et banque','Ts'),
 ('Finance et banque','L'),
 ('Entreprenariat','Ts') ,
 ('Entreprenariat','L'),
 ('Genie industrielle','L'),
 ('Automatisme industrielle','T'),
 ('Automatisme industrielle','Ts'),
 ('Genie industrielle','Ts');

 INSERT INTO  utilisateur(login, email, role, etat, pwd) VALUES 
 ('admin', 'behiamoula@gmail.com', 'ADMIN','1',md5('123')),
 ('user1','user1@gmail.com','visiteur','0',md5('123')),
 ('user2', 'user2@gmail.com','visiteur','1',md5('123'));

 INSERT INTO cours(nomCours, domaine, datepublication, idFiliere) VALUES

 ('base de donnees', 'informatique', '20 janvier 2023',1),
 ('Marketing', 'Management et Entreprenariat', '24 juin 2023',2),
 ('Programmation', 'informatique','15 decembre 2022',3),
 ('WordPress','informatique', '04 fevrier 2023',4),
 ('Genie logiciel', 'informatique','15 decembre 2022',5),
 ('python','informatique', '04 fevrier 2023',6),

 ('base de donnees', 'informatique', '20 janvier 2023',1),
 ('Marketing', 'Management et Entreprenariat', '24 juin 2023',2),
 ('Programmation', 'informatique','15 decembre 2022',3),
 ('Genie logiciel', 'informatique','15 decembre 2022',5),
 ('python','informatique', '04 fevrier 2023',6),
 ('WordPress','informatique', '04 fevrier 2023',4);

 select * from filiere;
 select * from cours;
 select * from utilisateur;


select login,pwd from utilisateur;