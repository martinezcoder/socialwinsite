#!/bin/bash

## export PATH=$PATH:/d/xampp/mysql/bin

mysqldump --opt --user=socialwi_admin --password='Velez12$' socialwi_wordpress --ignore-table=socialwi_wordpress.wp_comments --ignore-table=socialwi_wordpress.wp_commentmeta > socialwin.sql
