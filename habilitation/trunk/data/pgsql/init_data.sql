-- data 13-12-2018
-- les donnees suivantes correspondent au musee reattu de la ville d arles

INSERT INTO service VALUES (nextval('service_seq'), 'dsit');
INSERT INTO service VALUES (nextval('service_seq'), 'drh');
INSERT INTO service VALUES (nextval('service_seq'), 'secretariat president');


INSERT INTO categorie VALUES (nextval('categorie_seq'), 'Permis');
INSERT INTO categorie VALUES (nextval('categorie_seq'), 'Visite médicale');
INSERT INTO categorie VALUES (nextval('categorie_seq'), 'Formation');
INSERT INTO categorie VALUES (nextval('categorie_seq'), 'Attestation');


INSERT INTO habilitation VALUES (nextval('habilitation_seq'), 
'conduite de bennes', '', false);

INSERT INTO condition VALUES (nextval('condition_seq'), 
'Permis poids lourd', 1, 1, NULL, 10);
INSERT INTO condition VALUES (nextval('condition_seq'), 
'Visite de moins d un an', 1, 2, 12, 20);
INSERT INTO condition VALUES (nextval('condition_seq'), 
'Formation conduite de bennes', 1, 3, 60, 30);
INSERT INTO condition VALUES (nextval('condition_seq'), 
'FIMO-FCO', 1, 3, 60, 40);
INSERT INTO condition VALUES (nextval('condition_seq'),
'Visite médicale agrée', 1, 2, 60, NULL);



INSERT INTO regle VALUES (nextval('regle_seq'),
'FIMO initiale',4,'type','==','initiale','60','');
INSERT INTO regle VALUES (nextval('regle_seq'),
'FCO recyclage',4,'type','==','recyclage','24','');
INSERT INTO regle VALUES (nextval('regle_seq'),
'Plus de 60 ans ',5,'age','>=','60','24','');



