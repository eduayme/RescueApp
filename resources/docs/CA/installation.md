# Instal·lació

- [Instal·lació de dependencies](/{{route}}/{{version}}/installation#install)
- [Instal·lació del projecte](/{{route}}/{{version}}/installation#setup-project)
- [Instal·lació de la base de dades](/{{route}}/{{version}}/installation#setup-database)
- [Instal·lació de la configuració pels emails](/{{route}}/{{version}}/installation#setup-email)
- [Fer funcionar l'aplicació](/{{route}}/{{version}}/installation#run-app)
- [Configuració pel servidor](/{{route}}/{{version}}/installation#conf-server)

---


<a name="install"></a>
## [Instal·lació de dependencies](/{{route}}/{{version}}/installation#install)

1) [Instal·lar Composer 1.8](https://getcomposer.org/download)

2) [Instal·lar PHP 7.3.5](https://www.php.net/downloads.php)

3) [Instal·lar Laravel 5.8](https://laravel.com/docs/5.8/installation)

<a name="setup-project"></a>
## [Instal·lació del projecte](/{{route}}/{{version}}/installation#setup-project)

4) Clonar el repositori
```php
> git clone git@github.com:eduayme/RescueApp.git
```
<br/>

5) Crear un nou fitxer `.env` dins de la carpeta del projecte amb el mateix contingut del fitxer `.env.example`
```php
> cp .env.example .env
```
<br/>

6) Obrir la terminal dins de la carpeta del projecte i executar el següent comandament
```php
> composer update --no-scripts
```
<br/>


<a name="setup-database"></a>
## [Instal·lació de la base de dades](/{{route}}/{{version}}/installation#setup-database)

### Opció 1) MySQL

7) [Instal·lar MySQL 5.7](https://dev.mysql.com/doc/mysql-installation-excerpt/5.7/en/)

8) Crear la base de dades `aplicatiu_bombers` a mysql
```php
mysql> CREATE DATABASE aplicatiu_bombers;
```
<br/>

9) Canviar credencials de mysql a `.env`
```php
DB_CONNECTION = mysql
DB_HOST       = 127.0.0.1
DB_PORT       = 3306
DB_DATABASE   = aplicatiu_bombers
DB_USERNAME   = mysql_username
DB_PASSWORD   = mysql_password
```
<br/>


### Opció 2) PostgreSQL

7) [Instal·lar PostgreSQL 12.0](https://www.postgresql.org/download/)

8) Crear la base de dades `aplicatiu_bombers` a postgresql
```php
postgresql> CREATE DATABASE aplicatiu_bombers;
```
<br/>

9) Canviar credencials de postgresql a `.env`
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
## [Instal·lació de la configuració pels emails](/{{route}}/{{version}}/installation#setup-email)

### Opció 1) Gmail via SMTP

10) Crear compte de gmail

11) [Anar a opcions de seguretat en el compte](https://myaccount.google.com/security?pli=1#connectedapps)

12) Activar la opció ```Permetre aplicacions poc segures```

13) Canviar les credencials de email a `.env`
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
## [Fer funcionar l'aplicació](/{{route}}/{{version}}/installation#run-app)

14) Obrir una terminal dins de la carpeta del projecte i migrar la base de dades
```php
> php artisan migrate
```
<br/>

15) Fer correr l'aplicació
```php
> php artisan serve
```
<br/>

16) Obrir un navegador i dirigir-se a la direcció `127.0.0.1:8000` o `localhost:8000`

17) RescueApp funcionant! :)

<a name="conf-server"></a>
## [Configuració pel servidor](/{{route}}/{{version}}/installation#conf-server)

Exemple d'instal·lació en el subdomini RescueApp.mysite.com

### Opció 1) Apache2

18) [Descarregar Apache2](https://help.ubuntu.com/lts/serverguide/httpd.html#Installation)

19) Configurar els registres tipus "A" en el DNS pel teu subdomini como ho requereix el teu proveïdor

20) Configurar /etc/apache2/sites-enabled/RescueApp.conf adaptant el codi a les teves necessitats: ServeName, DocumentRoot, ssl parameters(we used Letsencrypt), etc.. Exemple:
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
