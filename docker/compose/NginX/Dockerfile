FROM centos:centos7
MAINTAINER Mattias Costantini <mattias.costantini@mm-one.com>
LABEL description="This image contain NginX service"
LABEL version="1.0.0"

# Add EPEL repository
RUN yum -y install epel-release

# Add NGINX repository
RUN rpm -ivh http://nginx.org/packages/centos/7/noarch/RPMS/nginx-release-centos-7-0.el7.ngx.noarch.rpm

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

# Install NginX
RUN yum -y install nginx
EXPOSE 80
EXPOSE 443

# Place VOLUME statement
VOLUME /home/dataone/public_html

# Add entry point
COPY docker-entrypoint.sh /tmp
RUN chmod +x /tmp/docker-entrypoint.sh

# Change current working directory
WORKDIR /home/dataone/public_html

CMD ["/tmp/docker-entrypoint.sh"]