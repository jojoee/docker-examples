FROM nimmis/apache-php5

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80
EXPOSE 443

ENV MYSQL_ROOT_USER=root
ENV MYSQL_ROOT_PASSWORD=password

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
