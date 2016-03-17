FROM tomsik68/xampp

ADD src/ www/

RUN /bin/bash -c "/opt/lampp/lampp start" && \
	"/opt/lampp/bin/mysql -u root" && \
	mysql -u root -e "CREATE DATABASE PROIECT_CAMIL"
	
	
