# CakePHP Resource Registry

CakePHP resource registry for managing OIDC Relying Parties with User authentication and oidc metadata file publishing for Shibboleth IdP OIDC extension.

## Installation
### Server
```bash
yum install epel-release
yum install http://rpms.remirepo.net/enterprise/remi-release-7.rpm
yum install -y yum-utils
yum-config-manager --disable remi-php54
yum-config-manager --enable remi-php73
yum install php composer httpd unzip mc
```
### CakeRR

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.

#### Install CakePHP project
```
cd /var/www
composer create-project cscfi/cakephp-rr cakephp-rr --stability dev
```
#### Create logs/tmp directories and configure selinux for em
```
chown apache /var/www/html/logs -R
chown apache /var/www/html/tmp -R
chcon --type httpd_sys_rw_content_t /var/www/html/logs/ -R
chcon --type httpd_sys_rw_content_t /var/www/html/tmp/ -R
```
#### configure Apache web server
```
systemctl start httpd
systemctl enable httpd
```

#### edit /etc/httpd/conf/httpd.conf for allowing .htaccess files
```
<Directory /var/www/html>
    AllowOverride All
 </Directory>
```
#### Configure database
```
systemctl start mariadb
systemctl enable mariadb
mysql_secure_installation
```
You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```
Then visit `http://localhost:8765` to see the welcome page.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application. You also need following defined here.
```
'client_secret' => '<SECRET>',
'auth_url' => 'https://<HOST>/',
'redirect_url' => 'https://<HOST>/',
```

# Migrate database schema
`./bin/cake migrations migrate`

## Layout

The app skeleton uses a subset of [Foundation](http://foundation.zurb.com/) (v5) CSS
framework by default. You can, however, replace it with any other library or
custom styles.
