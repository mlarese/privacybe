FROM centos:centos7
MAINTAINER Mattias Costantini <mattias.costantini@mm-one.com>
LABEL description="This image contain Apache service and PHPMyAdmin"
LABEL version="1.0.0"

# Add EPEL repository
RUN yum -y install epel-release

# Update distro
RUN yum -y update

# Install common tool
RUN yum -y install htop \
    mytop \
    iotop \
    iftop \
    less \
    iproute \
    vim \
    git

# Install PHPMyAdmin
RUN yum -y install httpd \
    phpmyadmin \
    php
ADD php.ini /etc/php.ini
ADD phpmyadmin.conf /etc/httpd/conf.d/phpMyAdmin.conf
ADD config.inc.php /etc/phpMyAdmin/config.inc.php
EXPOSE 80

# Add entry point
COPY docker-entrypoint.sh /tmp
RUN chmod +x /tmp/docker-entrypoint.sh

CMD ["/tmp/docker-entrypoint.sh"]