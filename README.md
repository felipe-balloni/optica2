## Optica2 - this a partial clone of a real project.

This is for learning purposes only.

Made with Laravel, Filament Admin and Spatie / Permission. I am very grateful to the creators of these great frameworks and packages.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Fillament Admin

Filament is a collection of tools for rapidly building beautiful TALL stack interfaces, designed for humans.

### Admin Panel • [Documentation](https://filamentadmin.com/docs/admin) • [Demo](https://demo.filamentadmin.com)

## Laravel Permission by Spatie

This package allows you to manage user permissions and roles in a database.

See the [DOCUMENTATION](https://docs.spatie.be/laravel-permission/) for detailed installation and usage instructions.

## Installation

Clone the repo locally:

```sh
https://github.com/felipe-balloni/optica2.git optica2
cd optica2
```

Install PHP dependencies:

```sh
composer install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an SQLite database or use another database (MySQL, Postgres) and configure your .env accordingly.

Run database migrations with seed:

```sh
php artisan migrate --seed
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```

You're ready to go! Visit the url in your browser
    
    /sistema

, and login with:

Super Administrator
- **Username:** super.admin@test.com
- **Password:** password

Administrator
- **Username:** admin@test.com
- **Password:** password

Users

    User don't have any permission (yet).

- **Username:** user1@test.com
- **Password:** password

## Note:
The application is configured with the pt_BR language and America/Sao_Paulo time zone. If necessary, please remember to change it in the config/app.php configuration file
