#!/bin/bash
#This script is a script that will save the database into a .sql file
#The database is the database that we worked on during the "pdp pret de velos"
#project.

current_date=$(date +"%d_%m_%Y_%H_%M_%S")
backup_filename="/root/backups/backup_$current_date.sql"
pg_dump -U postgres -d pdp_pret_velos_bdd -w > "$backup_filename";
