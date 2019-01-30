FROM centos:centos7
MAINTAINER Mattias Costantini <mattias.costantini@mm-one.com>
LABEL description="This image contain PHP-FPM"
LABEL version="0.1.0"

# Add EPEL and WebTatic repositories
RUN yum -y install epel-release
RUN rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm

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
    mariadb \
    git \
    patch
    
# Place VOLUME statement
VOLUME /home/dataone/public_html

# Add dataone common user
RUN adduser -d /home/dataone -s /bin/bash dataone

# Install PHP-FPM
RUN yum -y install php72w \
    php72w-opcache \
    php72w-bcmath \
    php72w-gd \
    php72w-imap \
    php72w-mbstring \
    php72w-mcrypt \
    php72w-pdo \
    php72w-mysqlnd \
    php72w-xml \
    php72w-soap \
    php72w-pclzip \
    php72w-pecl-xdebug \
    php72w-pear.noarch \
    php72w-pecl-igbinary.x86_64 \
    php72w-pecl-memcached.x86_64 \
    php72w-pgsql.x86_64 \
    php72w-process.x86_64 \
    php72w-fpm \
    composer
ADD php.ini /etc/php.ini
ADD xdebug.ini /etc/php.d/xdebug.ini
ADD www.conf /etc/php-fpm.d/www.conf
EXPOSE 9000

# Add entry point
COPY docker-entrypoint.sh /tmp
RUN chmod +x /tmp/docker-entrypoint.sh

# Change current working directory
WORKDIR /home/dataone/public_html

ENTRYPOINT ["/tmp/docker-entrypoint.sh"]
