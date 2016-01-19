# Fuelphp-blog
FuelPHP ORM based blog application

# Requirement

    Apache Web Server
    PHP 5.3.2 or above
    MySQL

# Installation

1. take a repo in local
2. find fpauth.sql file from root and import in your database
3. run in your browser.


1.    storage folder need to have writable permission. chmod -Rf 777 storage/
2.    Copy and edit application/config/application.sample.php to application/config/application.php
3.    Copy and edit application/config/database.sample.php to application/config/database.php
4.    Create a new database, we suggest to use MySQL create database howframework_laravel.

5.    Update database configuration based on you MySQL configuration in application/config/database.php:

    'mysql' => array(
        'driver'   => 'mysql',
        'host'     => 'localhost',
        'database' => 'howframework_laravel',
        'username' => 'root',
        'password' => '',
        'charset'  => 'utf8',
        'prefix'   => '',
    ),

    Run php artisan migrate:install to run migration table installation.
    Run php artisan migrate to update you're database to latest migration.

# Running the Application

You can access the application from http://localhost/laravel/public/, change localhost/laravel to whatever you set in your environment.
# Documentation

    Phase I - Authentication

