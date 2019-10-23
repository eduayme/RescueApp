# Installation

- [Install dependencies](/{{route}}/{{version}}/installation#install)
- [Setup the project](/{{route}}/{{version}}/installation#setup-project)
- [Setup the database](/{{route}}/{{version}}/installation#setup-database)
- [Setup EMAIL configuration](/{{route}}/{{version}}/installation#setup-email)
- [Run the app](/{{route}}/{{version}}/installation#run-app)
- [Configuration for the server](/{{route}}/{{version}}/installation#conf-server)

---


<a name="install"></a>
## Install dependencies

1) [Install Composer 1.8](https://getcomposer.org/download)

2) [Install PHP 7.3.5](https://www.php.net/downloads.php)

3) [Install Laravel 5.8](https://laravel.com/docs/5.8/installation)


<a name="setup-project"></a>
## Setup the project

4) Clone this repository
```php
> git clone git@github.com:eduayme/RescueApp.git
```
<br/>

5) Create new file `.env` inside the project folder with the same content as `.env.example`
```php
> cp .env.example .env
```
<br/>

6) Open terminal inside the project folder and run
```php
> composer update --no-scripts
```
<br/>


<a name="setup-database"></a>
## Setup the database

### Option 1) MySQL

7) [Install MySQL 5.7](https://dev.mysql.com/doc/mysql-installation-excerpt/5.7/en/)

8) Create the database `aplicatiu_bombers` in mysql
```php
mysql> CREATE DATABASE aplicatiu_bombers;
```
<br/>

9) Change mysql credentials in `.env`
```php
DB_CONNECTION = mysql
DB_HOST       = 127.0.0.1
DB_PORT       = 3306
DB_DATABASE   = aplicatiu_bombers
DB_USERNAME   = mysql_username
DB_PASSWORD   = mysql_password
```
<br/>


### Option 2) PostgreSQL

7) [Install PostgreSQL 12.0](https://www.postgresql.org/download/)

8) Create the database `aplicatiu_bombers` in postgresql
```php
postgresql> CREATE DATABASE aplicatiu_bombers;
```
<br/>

9) Change postgresql credentials in `.env`
```php
DB_CONNECTION = pgsql
DB_HOST       = 127.0.0.1
DB_PORT       = 5432
DB_DATABASE   = aplicatiu_bombers
DB_USERNAME   = postgresql_username
DB_PASSWORD   = postgresql_password
```
<br/>


<a name="setup-email"></a>
## Setup EMAIL configuration

### Option 1) Gmail via SMTP

10) Create a gmail account

11) [Go to the account security settings](https://myaccount.google.com/security?pli=1#connectedapps)

12) Active the ```Allow less secure app``` option

13) Change email credentials in `.env`
```php
MAIL_DRIVER      = smtp
MAIL_HOST        = smtp.gmail.com
MAIL_PORT        = 587
MAIL_USERNAME    = gmail_username
MAIL_PASSWORD    = gmail_password
MAIL_ENCRYPTION  = tls
```
<br/>


<a name="run-app"></a>
## Run the app

14) Open a terminal inside the project folder and migrate the database
```php
> php artisan migrate
```
<br/>

15) Run the application
```php
> php artisan serve
```
<br/>

16) Open a browser and go to the url `127.0.0.1:8000` or `localhost:8000`

17) RescueApp is running! :)


<a name="conf-server"></a>
## Configuration for the server
Installation example on subdomain RescueApp.mysite.com

### Option 1) Apache2

18) [Download Apache2](https://help.ubuntu.com/lts/serverguide/httpd.html#Installation)

19) Configure the DNS "A" records for your subdomain as required by your provider

20) Configure /etc/apache2/sites-enabled/RescueApp.conf adapting the code to your needs: ServeName, DocumentRoot, ssl parameters(we used Letsencrypt), etc.. Example:
```php
<VirtualHost *:80>
        ServerName RescueApp.mysite.com
        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/html/Rescue-app/public
        Redirect / https://RescueApp.mysite.com
        <Directory /var/www/html/Rescue-app>
            Options Indexes FollowSymLinks
            AllowOverride All
            Require all granted
        </Directory>

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined

        <IfModule mod_dir.c>
            DirectoryIndex index.php index.pl index.cgi index.html index.xhtml index.htm
        </IfModule>

RewriteEngine on
RewriteRule ^ https://%{SERVER_NAME}%{REQUEST_URI} [END,NE,R=permanent]
</VirtualHost>

<IfModule mod_ssl.c>
<VirtualHost *:443>
        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/html/Rescue-app/public

        <Directory /var/www/html/Rescue-app>
            Options Indexes FollowSymLinks
            AllowOverride All
            Require all granted
        </Directory>

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined

        <IfModule mod_dir.c>
            DirectoryIndex index.php index.pl index.cgi index.html index.xhtml index.htm
        </IfModule>
        ServerName RescueApp.mysite.com
        Include /etc/letsencrypt/options-ssl-apache.conf
        SSLCertificateFile /etc/letsencrypt/live/mysite.com/fullchain.pem
        SSLCertificateKeyFile /etc/letsencrypt/live/mysite.com/privkey.pem
</VirtualHost>
</IfModule>
```
<br/>
