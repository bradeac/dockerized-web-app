FROM tomsik68/xampp

ADD src/ www/
ADD PROIECT/ /opt/lampp/var/mysql/PROIECT

RUN /bin/bash -c "chown -R mysql:mysql /opt/lampp/var/mysql/PROIECT"
RUN /bin/bash -c "/opt/lampp/bin/mysql -u root PROIECT < www/sql/proiect.sql"
