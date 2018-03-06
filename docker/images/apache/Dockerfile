FROM centos:7
MAINTAINER grodrigo <grodrigo@ausy.fr>

RUN yum install -y https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm && \
    yum install -y http://rpms.remirepo.net/enterprise/remi-release-7.rpm

RUN yum -y update

RUN yum -y install httpd

RUN yum install yum-utils && \
    yum-config-manager --enable remi-php70 && \
    yum update -y && \
    yum install -y \
    php70-php.x86_64 \
    php70-php-bcmath.x86_64 \
    php70-php-cli.x86_64 \
    php70-php-common.x86_64 \
    php70-php-devel.x86_64 \
    php70-php-gd.x86_64 \
    php70-php-intl.x86_64 \
    php70-php-json.x86_64 \
    php70-php-mbstring.x86_64 \
    php70-php-mcrypt.x86_64 \
    php70-php-posix.x86_64 \
    php70-php-gd.x86_64 \
    php70-php-mbstring.x86_64 \
    php70-php-mysql.x86_64 \
    php70-php-imap.x86_64 \
    php70-php-soap.x86_64 \
    php70-php-pdo.x86_64 \
    php70-php-pear.noarch \
    php70-php-xml.x86_64 \
    php70-php-ast.x86_64 \
    php70-php-opcache.x86_64 \
    php70-php-pecl-zip.x86_64 \
    php70-php-pecl-memcached.x86_64 && \
    ln -s /usr/bin/php70 /usr/bin/php && \
    ln -s /etc/opt/remi/php70/php.ini /etc/php.ini && \
    ln -s /etc/opt/remi/php70/php.d /etc/php.d && \
    ln -s /etc/opt/remi/php70/pear.conf /etc/pear.conf && \
    ln -s /etc/opt/remi/php70/pear /etc/pear

RUN yum -y clean all

## Installing GIT
RUN yum install -y git && \
    yum clean all
# COMPOSER INSTALL
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

## DRUSH INSTALL
# RUN composer global require drush/drush
# RUN ln -s ~/.composer/vendor/bin/drush ~bin/drush

### Installing Drupal Console
RUN curl https://drupalconsole.com/installer -L -o /usr/local/bin/drupal  && \
    chmod +x /usr/local/bin/drupal

### Installing Node
RUN curl https://dl.yarnpkg.com/rpm/yarn.repo --silent -o /etc/yum.repos.d/yarn.repo && \
    curl --silent --location https://rpm.nodesource.com/setup_6.x | bash - && \
    yum install -y \
                nodejs \
                yarn \
                gcc gcc-c++ \
                file \
                openssl openssl-devel \
                && \
    yum clean all -y

RUN yum install -y mysql php-mysql php-mbstring php-mcrypt php-gd php70-php-mysqlnd

### Installing ruby, compass, sass
RUN yum install ruby ruby-devel -y && \
gem install sass && \
gem install compass && \
gem install bootstrap-sass

RUN mkdir /etc/httpd/sites-enabled
RUN sed -i "\$aIncludeOptional sites-enabled/*.conf" /etc/httpd/conf/httpd.conf

RUN yum install -y wget && \
    wget https://github.com/drush-ops/drush/releases/download/8.1.13/drush.phar && \
    mv drush.phar /usr/local/bin/drush && \
    chmod +x /usr/local/bin/drush

VOLUME /var/www/html
VOLUME /etc/httpd/sites-enabled

EXPOSE 80 443

CMD ["/usr/sbin/httpd", "-DFOREGROUND"]
