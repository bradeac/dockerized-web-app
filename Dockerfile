FROM tomsik68/xampp

ADD src/ www/
&& PROIECT/ /opt/lampp/var/mysql/

RUN /bin/bash -c "/opt/lampp/lampp start"
	
	
	
