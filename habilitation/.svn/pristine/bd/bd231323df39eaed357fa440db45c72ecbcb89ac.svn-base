.. _evenement:


Saisie evenement
================

Il est possible de lister les evenements dans le menu  application -> agent_habilitation -> option evenement

.. image:: ../_static/tab_evenement.png

Il est possible de modifier / supprimer les evenements dans le formulaire de saisie evenement
en appuyant sur modifier ou supprimer

.. image:: ../_static/form_evenement.png



les champs suivants peuvent être mis a jour :

.. note::

	Le champ *'evenement'* est un champ numerique entier  obligatoire.

	Le champ *'libelle'* est un champ libelle obligatoire de 60 caractere(s) .

	Le champ *'agent_habilitation'* est un champ numerique entier obligatoire.

	Le champ *'condition'* est un champ numerique entier obligatoire.

	Le champ *'organisme'* est un champ numerique entier non obligatoire.

	Le champ *'fichier'* est un champ libelle non obligatoire de 60 caractere(s) .

	Le champ *'date_evenement_debut'* est un champ date obligatoire.

	Le champ *'date_evenement_fin'* est un champ date non obligatoire.

	Le champ *'date_validite'* est un champ date non obligatoire.

	Le champ *'type_formation'* est un champ date non obligatoire.
		
	Le champ *'observation'* est un champ texte non obligatoire.
	
	Le champ *'forcer_validation'* est un champ boléen.

	Il y a une contrainte  de cle primaire  dont le nom est *'evenement_pkey'*.

	Il y a une contrainte  de cle scondaire  dont le nom est *'evenement_agent_habilitation_fkey'*.

	Il y a une contrainte  de cle scondaire  dont le nom est *'evenement_condition_fkey'*.

	Il y a une contrainte  de cle scondaire  dont le nom est *'evenement_organisme_fkey'*.



Il est possible de saisir les champs suivant :

* Le fichier 
* L'agent habilitation
* La condition
* L'organisme
* Le type de formation qui peut être "initiale", "recyclage" ou null 
* La date de début de l'évènement 
* La date de fin de l'évènement
* La période de validité
* Forcer la date de validité
* L'observation

.. note::

	Le champ libelle se crée automatiquement sous la forme NOM-PRENOM-Libelle_de_la_condition-Type_formation
	
	Bien qu'il soit possible de forcer la date de validité grâce à une case à cocher, celle ci se calcule automatiquement avec la méthode calcul_date_validite() de la classe /obj/evenement.php	

