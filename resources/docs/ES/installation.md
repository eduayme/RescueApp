# Instalación

- [Instalación de dependencias](/{{route}}/{{version}}/installation#install)
- [Instalación del proyecto](/{{route}}/{{version}}/installation#setup-project)
- [Instalación de la base de datos](/{{route}}/{{version}}/installation#setup-database)
- [Instalación de la configuración para emails](/{{route}}/{{version}}/installation#setup-email)
- [Correr la aplicación](/{{route}}/{{version}}/installation#run-app)
- [Configuración para el servidor](/{{route}}/{{version}}/installation#conf-server)

---


<a name="install"></a>
## [Instalación de dependencias](/{{route}}/{{version}}/installation#install)

1) [Instalar Composer 1.8](https://getcomposer.org/download)

2) [Instalar PHP 7.3.5](https://www.php.net/downloads.php)

3) [Instalar Laravel 5.8](https://laravel.com/docs/5.8/installation)


<a name="setup-project"></a>
## [Instalación del proyecto](/{{route}}/{{version}}/installation#setup-project)

4) Clonar el repositorio
```php
> git clone git@github.com:eduayme/RescueApp.git
```
<br/>

5) Crear un nuevo archivo `.env` dentro del folder del proyecto con el mismo contenido del archivo `.env.example`
```php
> cp .env.example .env
```
<br/>

6) Abrir la terminal dentro del folder del proyecto y ejecutar el siguiente comando
```php
> composer update --no-scripts
```
<br/>


<a name="setup-database"></a>
## [Instalación de la base de datos](/{{route}}/{{version}}/installation#setup-database)

### Opción 1) MySQL

7) [Instalar MySQL 5.7](https://dev.mysql.com/doc/mysql-installation-excerpt/5.7/en/)

8) Crear la base de datos `aplicatiu_bombers` en mysql
```php
mysql> CREATE DATABASE aplicatiu_bombers;
```
<br/>

9) Cambiar credenciales de mysql en `.env`
```php
DB_CONNECTION = mysql
DB_HOST       = 127.0.0.1
DB_PORT       = 3306
DB_DATABASE   = aplicatiu_bombers
DB_USERNAME   = mysql_username
DB_PASSWORD   = mysql_password
```
<br/>


### Opción 2) PostgreSQL

7) [Instalar PostgreSQL 12.0](https://www.postgresql.org/download/)

8) Crear la base de datos `aplicatiu_bombers` en postgresql
```php
postgresql> CREATE DATABASE aplicatiu_bombers;
```
<br/>

9) Cambiar credenciales de postgresql en `.env`
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
## [Instalación de la configuración para emails](/{{route}}/{{version}}/installation#setup-email)

### Opción 1) Gmail via SMTP

10) Crear cuenta de gmail

11) [Ir a opciones de seguridad en la cuenta](https://myaccount.google.com/security?pli=1#connectedapps)

12) Activar la opción ```Permitir aplicaciones poco seguras```

13) Cambiar las credenciales de email en `.env`
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
## [Correr la aplicación](/{{route}}/{{version}}/installation#run-app)

14) Abrir una terminal dentro del folder del proyecto y migrar la base de datos
```php
> php artisan migrate
```
<br/>

15) Correr la aplicación
```php
> php artisan serve
```
<br/>

16) Abrir un navegador y dirigirse a la direccion `127.0.0.1:8000` o `localhost:8000`

17) RescueApp esta corriendo! :)


<a name="conf-server"></a>
## [Configuración para el servidor](/{{route}}/{{version}}/installation#conf-server)

Ejemplo de instalación en subdominio RescueApp.mysite.com

### Opción 1) Apache2

18) [Descargar Apache2](https://help.ubuntu.com/lts/serverguide/httpd.html#Installation)

19) Configurar los registros tipo "A" en el DNS para tu subdominio como lo requiere tu proveedor

20) Configurar /etc/apache2/sites-enabled/RescueApp.conf adaptando el código a tus necesidades: ServeName, DocumentRoot, ssl parameters(we used Letsencrypt), etc.. Ejemplo:
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
