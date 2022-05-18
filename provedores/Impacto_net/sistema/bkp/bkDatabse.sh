#DATA=`/bin/date +%d-%m-%Y`
# variaveis do MySQL
#HOST="localhost"
#USER="root"
#PASSWORD="88255925"
#DATABASE="mstelecom"
#mysqldump -h $HOST -u $USER -p$PASSWORD $DATABASE > $NOME
#NOME="/var/www/html/sistema/bkp/MSTelecom-$DATA.sql"

#!/bin/bash
# Database credentials
user="root"
password="88255925"
Host="localhost"
db_name="mstelecom"
# Other options
backup_path="/var/www/html/sistema/bkp"
date=$(date +"%d-%b-%Y")
mysqldump --user=$user --password=$password --Host=$Host $db_name >$backup_path/$db_name-$date.sql