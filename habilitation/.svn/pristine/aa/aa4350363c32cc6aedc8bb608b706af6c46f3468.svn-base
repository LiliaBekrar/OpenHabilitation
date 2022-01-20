--
-- PostgreSQL database dump
--

--
-- PostgreSQL database dump complete
--

CREATE TABLE agent (
	agent integer NOT NULL,
    nom character varying(60) NOT NULL,
    prenom character varying(60) NOT NULL,
    nomjf character varying(100),
    matricule character varying(10) NOT NULL,   
    date_naissance date,
    service integer not null,
    poste integer not null
);


CREATE TABLE agent_habilitation (
    agent_habilitation integer NOT NULL,
    libelle varchar(60),
    agent integer NOT NULL,
    habilitation integer not null,
    observation text,
    archive boolean,
    date_validite_habilitation date
);

CREATE TABLE habilitation (
    habilitation integer NOT NULL,
    libelle varchar(60) NOT NULL,
    observation text,
    archive boolean
);

CREATE TABLE evenement (
  evenement integer NOT NULL,  
  libelle varchar(60) NOT NULL,
  agent_habilitation integer NOT NULL,
  condition integer NOT NULL,
  organisme integer,
  fichier varchar(60),
  date_evenement_debut date not null,
  date_evenement_fin date,
  date_validite date,
  type_formation character varying(20),
  observation text,
  forcer_validation boolean
);

CREATE TABLE regle
(
  regle integer NOT NULL,
  libelle character varying(20) NOT NULL,
  condition integer not null,
  champ character varying(20) NOT NULL,
  operateur character varying(20) NOT NULL,
  valeur character varying(20) NOT NULL,
  duree integer,
  message text
);

CREATE TABLE condition(
  condition integer NOT NULL,  
  libelle varchar(30) NOT NULL,
  habilitation integer not null,
  categorie integer NOT NULL,
  duree integer ,
  ordre integer
);

CREATE TABLE organisme (
    organisme integer NOT NULL,
    libelle character varying(60)
);


CREATE TABLE categorie (
    categorie integer NOT NULL,
    libelle character varying(60)
);

CREATE TABLE service (
    service integer NOT NULL,
    libelle character varying(60)
);

CREATE TABLE poste (
    poste integer NOT NULL,
    libelle character varying(60)
);


-- pk
ALTER TABLE ONLY agent
    ADD CONSTRAINT agent_pkey PRIMARY KEY (agent);
ALTER TABLE ONLY habilitation
    ADD CONSTRAINT habilitation_pkey PRIMARY KEY (habilitation);
ALTER TABLE ONLY agent_habilitation
    ADD CONSTRAINT agent_habilitation_pkey PRIMARY KEY (agent_habilitation);
ALTER TABLE ONLY condition
    ADD CONSTRAINT condition_pkey PRIMARY KEY (condition);
ALTER TABLE ONLY evenement
    ADD CONSTRAINT evenement_pkey PRIMARY KEY (evenement);
ALTER TABLE ONLY organisme
    ADD CONSTRAINT organisme_pkey PRIMARY KEY (organisme);
ALTER TABLE ONLY categorie
    ADD CONSTRAINT categorie_pkey PRIMARY KEY (categorie);
ALTER TABLE ONLY service
    ADD CONSTRAINT service_pkey PRIMARY KEY (service);
ALTER TABLE ONLY poste
    ADD CONSTRAINT poste_pkey PRIMARY KEY (poste);
ALTER TABLE ONLY regle
  ADD CONSTRAINT regle_pkey PRIMARY KEY (regle);

-- fk
ALTER TABLE ONLY agent_habilitation
    ADD CONSTRAINT agent_habilitation_agent_fkey FOREIGN KEY (agent) REFERENCES agent(agent);
ALTER TABLE ONLY agent_habilitation
    ADD CONSTRAINT agent_habilitation_habilitation_fkey FOREIGN KEY (habilitation) 
    REFERENCES habilitation(habilitation);
ALTER TABLE ONLY condition
    ADD CONSTRAINT condition_habilitation_fkey FOREIGN KEY (habilitation) 
    REFERENCES habilitation(habilitation);
ALTER TABLE ONLY agent
    ADD CONSTRAINT agent_service_fkey FOREIGN KEY (service) 
    REFERENCES service(service);
ALTER TABLE ONLY agent
    ADD CONSTRAINT agent_poste_fkey FOREIGN KEY (poste) 
    REFERENCES poste(poste);
ALTER TABLE ONLY evenement
    ADD CONSTRAINT evenement_agent_habilitation_fkey FOREIGN KEY (agent_habilitation) 
    REFERENCES agent_habilitation(agent_habilitation);
ALTER TABLE ONLY evenement
    ADD CONSTRAINT evenement_condition_fkey FOREIGN KEY (condition) 
    REFERENCES condition(condition);
ALTER TABLE ONLY evenement
    ADD CONSTRAINT evenement_organisme_fkey FOREIGN KEY (organisme) 
    REFERENCES organisme(organisme);
ALTER TABLE ONLY condition
    ADD CONSTRAINT condition_categorie_fkey FOREIGN KEY (categorie) 
    REFERENCES categorie(categorie);
ALTER TABLE ONLY regle
	ADD CONSTRAINT regle_condition_fkey FOREIGN KEY (condition)
      REFERENCES condition(condition);



-- seq

CREATE SEQUENCE agent_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;   

CREATE SEQUENCE habilitation_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;   

CREATE SEQUENCE agent_habilitation_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;   

CREATE SEQUENCE service_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1; 
    
CREATE SEQUENCE poste_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1; 
    
CREATE SEQUENCE regle_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;  

CREATE SEQUENCE condition_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;   

CREATE SEQUENCE evenement_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;   

CREATE SEQUENCE organisme_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;   

CREATE SEQUENCE categorie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;   

INSERT INTO om_droit (om_droit, libelle, om_profil) VALUES (nextval('om_droit_seq'), 'menu_administration', 1);
INSERT INTO om_droit (om_droit, libelle, om_profil) VALUES (nextval('om_droit_seq'), 'menu_parametrage', 2);
INSERT INTO om_droit (om_droit, libelle, om_profil) VALUES (nextval('om_droit_seq'), 'agent', 3);
INSERT INTO om_droit (om_droit, libelle, om_profil) VALUES (nextval('om_droit_seq'), 'habilitation', 3);
INSERT INTO om_droit (om_droit, libelle, om_profil) VALUES (nextval('om_droit_seq'), 'agent_habilitation', 3);
INSERT INTO om_droit (om_droit, libelle, om_profil) VALUES (nextval('om_droit_seq'), 'condition', 3);
INSERT INTO om_droit (om_droit, libelle, om_profil) VALUES (nextval('om_droit_seq'), 'service', 2);
INSERT INTO om_droit (om_droit, libelle, om_profil) VALUES (nextval('om_droit_seq'), 'poste', 2);
INSERT INTO om_droit (om_droit, libelle, om_profil) VALUES (nextval('om_droit_seq'), 'evenement', 2);
INSERT INTO om_droit (om_droit, libelle, om_profil) VALUES (nextval('om_droit_seq'), 'organisme', 3);
INSERT INTO om_droit (om_droit, libelle, om_profil) VALUES (nextval('om_droit_seq'), 'categorie', 3);
INSERT INTO om_droit (om_droit, libelle, om_profil) VALUES (nextval('om_droit_seq'), 'regle', 2);


