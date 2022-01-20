--------------------------------------------------------------------------------
-- Script d'installation
--
-- ATTENTION ce script peut supprimer des données de votre base de données
-- il n'est à utiliser qu'en connaissance de cause
--
-- Usage :
-- cd data/pgsql/
-- dropdb framework_openmairie && createdb framework_openmairie && psql framework_openmairie -f install.sql
--
-- @package framework_openmairie
-- @version SVN : $Id: install.sql 4348 2018-07-20 16:49:26Z softime $
--------------------------------------------------------------------------------

-- Force l'encoding client à UTF8
SET client_encoding = 'UTF8';

-- Nom du schéma
\set schema 'openhabilitation'

--
START TRANSACTION;

-- Initialisation de postgis
CREATE EXTENSION IF NOT EXISTS postgis;

-- Suppression, Création et Utilisation du schéma
DROP SCHEMA IF EXISTS :schema CASCADE;
CREATE SCHEMA :schema;
SET search_path = :schema, public, pg_catalog;

-- Instructions de base du framework openmairie
\i ../../core/data/pgsql/init.sql

-- Initialisation du paramétrage
-- \i ../../core/data/pgsql/init_permissions.sql
\i init_parametrage.sql

-- init openplanning
\i init_metier.sql
\i init_trigger.sql
\i init_edition.sql
\i init_data.sql
-- sequence uniquement om_
\set schema '\'openhabilitation\''
\i update_sequences.sql

COMMIT;

