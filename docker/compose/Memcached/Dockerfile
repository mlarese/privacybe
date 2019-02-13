FROM centos:centos7
MAINTAINER Mattias Costantini <mattias.costantini@mm-one.com>
LABEL description="This image contain Memcached service"
LABEL version="1.0.0"

# Add EPEL repository
RUN yum -y install epel-release

# Install Memcached server
RUN yum -y install memcached

EXPOSE  11211

CMD  ["memcached", "-u", "daemon"]
