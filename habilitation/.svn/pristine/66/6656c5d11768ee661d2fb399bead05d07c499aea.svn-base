.. _règle:


Saisie règle
================

Il est possible de lister les règles dans le menu  parametrage metier -> condition -> option regle

.. image:: ../_static/tab_regle.png

Il est possible de modifier / supprimer les règles dans le formulaire de saisie règle
en appuyant sur modifier ou supprimer

.. image:: ../_static/form_regle.png

les champs suivants peuvent être mis a jour :

.. note::

	Le champ *'regle'* est un champ numerique entier obligatoire.
	
	Le champ *'libelle'* est un champ obligatoire de (20) caractere(s) .
	
	Le champ *'condition'* est un champ numerique entier obligatoire.
	
	Le champ *'champ'* est un champ obligatoire de (20) caractere(s) .
	
	Le champ *'operateur'* est un champ obligatoire de (20) caractere(s) .
	
	Le champ *'valeur'* est un champ obligatoire de (20) caractere(s) .
	
	Le champ *'duree'* est un champ numerique entier non obligatoire.
	
	Le champ *'message'* est un champ texte obligatoire.
	
	Il y a une contrainte  de cle primaire  dont le nom est *'regle_pkey'*.

	Il y a une contrainte  de cle scondaire  dont le nom est *'regle_condition_fkey'*.



Il est possible de saisir les champs suivants :

* Le libellé 
* Le champ qui peut être "age" ou "type"
* L'opérateur 
* La valeur
* La durée en mois 
* Le message qui s'affiche lorsque la condition est remplie dans l'évènement

les régles s'écrivent de la manière suivante :

Si [champ] [opérateur] [valeur] alors durée  = valeur de la durée 

Exemple 

Si age >= 60 alors durée = 24 (mois)

.. note::

	Si la règle concerne le type de formation la valeur devra être soit "initiale" soit "recyclage"
