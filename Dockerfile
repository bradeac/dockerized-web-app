FROM tomsik68/xampp

ADD src/ www/
ADD PROIECT/ /opt/lampp/var/mysql/PROIECT

RUN /bin/bash -c "/opt/lampp/lampp start"
RUN /bin/bash -c "/opt/lampp/bin/mysql PROIECT < xampp-web-app/proiect.sql"
