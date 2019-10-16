<p align="center">
<a href="https://github.styleci.io/repos/184948124"><img src="https://github.styleci.io/repos/184948124/shield?branch=master" alt="StyleCI"></a>
<a href="https://travis-ci.org/eduayme/Rescue-app"><img src="https://travis-ci.org/eduayme/Rescue-app.svg?branch=master" alt="Build Status"></a>
<a href="https://shields.io/"><img src="https://img.shields.io/badge/version-v1.0-blue"></a>
<a href="https://github.com/eduayme/Aplicatiu-de-Recerques/blob/master/LICENSE"><img src="https://img.shields.io/badge/License-GPLv3-blue.svg" alt="License"></a>
</p>


## About Rescue app
Rescue app is a web application designed to help emergency services in registering and documenting tasks to rescue lost people. It started as a pioneer project for the Catalonia firefighters developed as a final year project in my Bachelor's Degree in Computer Engineering.


## Contributors ✨

Thanks goes to these wonderful people ([emoji key](https://allcontributors.org/docs/en/emoji-key)):

<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore -->
<table>
  <tr>
    <td align="center"><a href="https://linkedin.com/in/eduayme"><img src="https://avatars3.githubusercontent.com/u/26260104?v=4" width="100px;" alt="Eduard Aymerich"/><br /><sub><b>Eduard Aymerich</b></sub></a><br /><a href="https://github.com/eduayme/Rescue-app/commits?author=eduayme" title="Code">💻</a> <a href="#ideas-eduayme" title="Ideas, Planning, & Feedback">🤔</a> <a href="#maintenance-eduayme" title="Maintenance">🚧</a> <a href="#projectManagement-eduayme" title="Project Management">📆</a> <a href="#review-eduayme" title="Reviewed Pull Requests">👀</a> <a href="https://github.com/eduayme/Rescue-app/commits?author=eduayme" title="Tests">⚠️</a></td>
    <td align="center"><a href="https://joelibaceta.github.io"><img src="https://avatars1.githubusercontent.com/u/864790?v=4" width="100px;" alt="Joel Ibaceta"/><br /><sub><b>Joel Ibaceta</b></sub></a><br /><a href="#translation-joelibaceta" title="Translation">🌍</a></td>
    <td align="center"><a href="https://github.com/rferromoreno"><img src="https://avatars2.githubusercontent.com/u/5116187?v=4" width="100px;" alt="Ricardo Ferro Moreno"/><br /><sub><b>Ricardo Ferro Moreno</b></sub></a><br /><a href="#translation-rferromoreno" title="Translation">🌍</a></td>
    <td align="center"><a href="https://dribbble.com/azhsetiawan"><img src="https://avatars0.githubusercontent.com/u/3045602?v=4" width="100px;" alt="Azh Setiawan"/><br /><sub><b>Azh Setiawan</b></sub></a><br /><a href="#translation-azhsetiawan" title="Translation">🌍</a> <a href="https://github.com/eduayme/Rescue-app/commits?author=azhsetiawan" title="Code">💻</a></td>
    <td align="center"><a href="https://github.com/kaywinnet"><img src="https://avatars3.githubusercontent.com/u/26384252?v=4" width="100px;" alt="Andrea"/><br /><sub><b>Andrea</b></sub></a><br /><a href="#translation-kaywinnet" title="Translation">🌍</a></td>
  </tr>
  <tr>
    <td align="center"><a href="https://github.com/larryebaum"><img src="https://avatars1.githubusercontent.com/u/6776768?v=4" width="100px;" alt="Larry Eichenbaum"/><br /><sub><b>Larry Eichenbaum</b></sub></a><br /><a href="#translation-larryebaum" title="Translation">🌍</a></td>
    <td align="center"><a href="https://github.com/dcbCIn"><img src="https://avatars0.githubusercontent.com/u/48742131?v=4" width="100px;" alt="Daniel Brandão"/><br /><sub><b>Daniel Brandão</b></sub></a><br /><a href="#translation-dcbCIn" title="Translation">🌍</a></td>
    <td align="center"><a href="https://github.com/MRamirezO"><img src="https://avatars1.githubusercontent.com/u/4284570?v=4" width="100px;" alt="Jesus Ramirez"/><br /><sub><b>Jesus Ramirez</b></sub></a><br /><a href="#translation-MRamirezO" title="Translation">🌍</a></td>
    <td align="center"><a href="http://alfathony.com"><img src="https://avatars1.githubusercontent.com/u/14884603?v=4" width="100px;" alt="Alfathony"/><br /><sub><b>Alfathony</b></sub></a><br /><a href="https://github.com/eduayme/Rescue-app/commits?author=alfathony" title="Code">💻</a></td>
  </tr>
</table>

<!-- ALL-CONTRIBUTORS-LIST:END -->

This project follows the [all-contributors](https://github.com/all-contributors/all-contributors) specification. Contributions of any kind welcome!


## Installation
1) [Install Composer 1.8](https://getcomposer.org/download)

2) [Install MySQL 5.7](https://dev.mysql.com/doc/mysql-installation-excerpt/5.7/en/)

3) [Install PHP 7.3.5](https://www.php.net/downloads.php)

4) [Install Laravel 5.8](https://laravel.com/docs/5.8/installation)

5) Create the database `aplicatiu_bombers` in mysql
```
mysql> CREATE DATABASE aplicatiu_bombers;
```

6) Clone this repository
```
> git clone git@github.com:eduayme/Aplicatiu-de-Recerques.git
```

7) Create new file `.env` inside the project folder with the same content as `.env.example`
```
> cp .env.example .env
```

8) Change mysql and mail credentials in `.env`
```
DB_USERNAME = mysql_username
DB_PASSWORD = mysql_password

MAIL_USERNAME = email_username
MAIL_PASSWORD = email_password
```

9) Open terminal inside the project folder and run
```
> composer update --no-scripts
```

10) In the same terminal migrate the database
```
> php artisan migrate
```

11) Finally run the application
```
> php artisan serve
```

12) Open a browser and go to the url `127.0.0.1:8000` or `localhost:8000`

13) Web application is running! :)


## License
The web application is an open-source software licensed under the [GPL v3 license](https://opensource.org/licenses/GPL-3.0).

