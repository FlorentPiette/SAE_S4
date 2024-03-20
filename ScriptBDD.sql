Drop table if exists administration, entreprise, etudiant, offre, poste, recrute, postule, reponse CASCADE;

CREATE TABLE Administration(

    IdProfil serial PRIMARY KEY,
    Nom text NOT NULL CHECK (Nom = UPPER(Nom)),
    Prenom text not null,
    Formation text not null,
    Email text not null,
    MotDePasse text NOT NULL 
constraint administration_motdepasse_check
            check ((length(motdepasse) >= 8) AND (motdepasse ~ '[A-Z]'::text) AND (motdepasse ~ '[a-z]'::text) AND
                   (motdepasse ~ '[0-9]'::text) AND (motdepasse ~ '[!@#$%^&*()]'::text) AND
                   (NOT (motdepasse ~ '^(password|123456|admin)$'::text))),
    Role text not null

);

create table entreprise
(
    identreprise    serial
        primary key,
    nom             text        not null,
    logo            varchar(255),
    adresse         text        not null,
    ville           text        not null,
    codepostal      varchar(5)  not null
        constraint entreprise_codepostal_check
            check (length((codepostal)::text) = 5),
    numtel          varchar(10) not null
        constraint entreprise_numtel_check
            check (length((numtel)::text) = 10),
    secteuractivite text        not null,
    email           text        not null
        constraint entreprise_email_check
            check (POSITION(('@'::text) IN (email)) > 0)
);

create table etudiant
(
    idetudiant      serial
        primary key,
    nom             text       not null
        constraint etudiant_nom_check
            check (nom = upper(nom)),
    prenom          text       not null,
    datedenaissance date       not null
        constraint etudiant_datedenaissance_check
            check ((datedenaissance >= '1900-01-01'::date) AND (datedenaissance <= CURRENT_DATE)),
    adresse         text       not null,
    ville           text       not null,
    codepostal      varchar(5) not null
        constraint etudiant_codepostal_check
            check (length((codepostal)::text) = 5),
    anneeetude      integer    not null,
    formation       text       not null,
    cv              bytea,
    email           text       not null
        constraint etudiant_email_check
            check (POSITION(('@'::text) IN (email)) > 0),
    motdepasse      text
        constraint etudiant_motdepasse_check
            check ((length(motdepasse) >= 8) AND (motdepasse ~ '[A-Z]'::text) AND (motdepasse ~ '[a-z]'::text) AND
                   (motdepasse ~ '[0-9]'::text) AND (motdepasse ~ '[!@#$%^&*()]'::text) AND
                   (NOT (motdepasse ~ '^(password|123456|admin)$'::text))),
    photo           varchar(255)
        constraint etudiant_photo_check
            check ((photo)::text ~ '.(png|jpeg|jpg)$'::text),
    ine             text       not null,
    typeentreprise  text,
    typemission     text,
    mobile          integer,
    actif           boolean,
    codemail        varchar
);


create table offre
(
    idoffre    serial
        primary key,
    nom        text not null,
    domaine    text not null,
    mission    text not null,
    nbetudiant integer,
    visible boolean,
    parcours text not null
);

create table Poste(
    IdOffre serial references Offre,
    IdEntreprise serial references Entreprise,
    PRIMARY KEY (IdEntreprise, IdOffre)

);

CREATE TABLE Postule(
    idPostule serial Primary Key,
    idoffre int REFERENCES Offre,
    Nom text,
    prenom text, 
	date date
);

CREATE TABLE Reponse(
    Idreponse int,
    IdProfil int REFERENCES Administration,
    Identreprise int REFERENCES Entreprise,
    Reponse boolean,
    PRIMARY KEY (Identreprise, IdProfil)
);

CREATE TABLE Recrute(
    IdEtudiant int REFERENCES Etudiant,
    IdEntreprise int REFERENCES Entreprise,
    Date date,
    PRIMARY KEY (IdEtudiant, IdEntreprise)
);

CREATE TABLE Notification(
    idNotif serial primary key,
    idetudiant int REFERENCES Etudiant,
    lu boolean, 
	date timestamp,
	rappel date 
);

CREATE TABLE CV(
    id serial primary key,
    chemin varchar,
    contenu bytea
);

INSERT INTO administration VALUES (1, 'MONSIEUR', 'test', 'GEII', 'monsieur.test@gmail.com', '$2y$10$bRnmw339wf.vvxSy1Rvr8ObH477nDgASbAZjmXxBBQE9xDI9SkFV6', 'admin');