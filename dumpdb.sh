#!/bin/bash
vagrant ssh -c "cd /vagrant && mysqldump -h127.0.0.1 -uroot -ppassword --databases seadb > cookbook/fluff/files/default/seadb_dump.sql"
