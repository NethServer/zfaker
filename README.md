# zfaker

This is a REST API server which exposes `z-push-admin` output.

The server is implemented in PHP 8.0 (should work also with 7.4) and should run on the same container of z-push.

## Install the server

Copy the source code and make sure everything belongs to http daemon user.
```
cp -r src /usr/share/zfaker
chown -R apache:apache /usr/share/zfaker
```

## Run

The server must be executed as apache user.
```
su - apache -s /bin/bash
cd /usr/share/zfaker/public
php -S localhost:8080
```

## Install the client

To test on a NS7, use the scripts inside the `wrappers` directory:
```
cp wrappers/php /usr/share/webtop/bin/php
cp wrappers/z-push-admin-wapper /usr/share/webtop/bin/z-push-admin-wapper
```


## Setup development environment

This is has been tested and developed on NS7.

Install all required dependencies:
```
yum install http://rpms.remirepo.net/enterprise/remi-release-7.rpm
yum install php80 unzip php80-unit-php php80-php-xml php80-php-mbstring
```

Enter the `src` directory and download composer:
```
source /opt/remi/php80/enable
wget https://raw.githubusercontent.com/composer/getcomposer.org/76a7060ccb93902cd7576b67264ad91c8a2700e2/web/installer -O - -q | php -- --quiet
```

The project has been setup with the following requirements:
```
php ../composer.phar require slim/psr7 slim/slim:4.*
```
