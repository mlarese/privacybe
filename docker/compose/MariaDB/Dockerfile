FROM centos:centos7
MAINTAINER Mattias Costantini <mattias.costantini@mm-one.com>
LABEL description="This image contain MariaDb"
LABEL version="0.1.0"

# install noew mariadb-server in order to create the appropriate user
RUN yum -y install epel-release    

# Install common tool
RUN yum -y install htop \
    mytop \
    iotop \
    iftop \
    less \
    iproute \
    vim \
    mariadb \
    sudo
    
# Add MariaDB 10.1.x repository and install it
ADD MariaDB.repo /etc/yum.repos.d/MariaDB.repo
RUN yum -y update
RUN yum -y install mariadb-server
RUN mkdir -p /var/log/mariadb /var/run/mariadb/
# Relax MariaDB permissions
RUN chown mysql:mysql /var/log/mariadb /var/run/mariadb /var/lib/mysql -R
ADD my.cnf /etc/my.cnf
COPY fix-permissions.sh /tmp/
RUN /tmp/fix-permissions.sh /var/lib/mysql/   && \
    /tmp/fix-permissions.sh /var/log/mariadb/ && \
    /tmp/fix-permissions.sh /var/run/
EXPOSE 3306

# Place VOLUME statement below all changes to /var/lib/mysql
VOLUME /var/lib/mysql
RUN chown mysql:mysql /var/log/mariadb /var/run/mariadb /var/lib/mysql -R

# Add entry point
COPY docker-entrypoint.sh /tmp/docker-entrypoint.sh

# Login as MariaDB user in order to start MySQL and HTTPD
USER mysql

ENTRYPOINT ["/tmp/docker-entrypoint.sh"]
CMD ["mysqld_safe"]

