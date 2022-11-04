FROM mysql:8

ENV MYSQL_ROOT_PASSWORD="my-secret-pw"


COPY config/custom.cnf /etc/mysql/conf.d/custom.cnf
COPY config/mysqldump.sql /mysqldump.sql

EXPOSE 3306