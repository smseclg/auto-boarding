FROM ubuntu

#LABEL maintainer "Aruna"
LABEL Author="Aruna" Description="A comprehensive docker image to run Apache-2.4 PHP-8.1"

# Stop dpkg-reconfigure tzdata from prompting for input
ENV DEBIAN_FRONTEND=noninteractive

# Update the repository sources list
RUN apt update

# Install and run apache
RUN apt-get install -y apache2
RUN apt-get install -y php libapache2-mod-php php-mysql

RUN apt clean

EXPOSE 80

COPY info.php /var/www/html

#CMD [“/usr/sbin/apache2ctl”, “-D”, “FOREGROUND”]
CMD apachectl -D FOREGROUND
