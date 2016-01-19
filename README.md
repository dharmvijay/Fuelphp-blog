# Fuelphp-blog
FuelPHP ORM based blog application

# Requirement

    Apache Web Server
    PHP 5.3.2 or above
    MySQL

# Installation

1.    storage folder need to have writable permission. chmod -Rf 777 storage/
2.    Create a new database, we suggest to use MySQL create database "fpauth".
3.    Update database configuration based on you MySQL configuration in App_Path/fuel/app/config/development/db.php:

    'connection'  => array(
		'dsn'        => 'mysql:host=localhost;dbname=fpauth',
		'username'   => 'root',
		'password'   => '',
    ),

4. run "php oil r migrate" from root path where oil file placed.

# Run Application

You can access the application from http://localhost/Fuelphp-blog-master/fuel/public/, change localhost/Fuelphp-blog-master to whatever you set in your environment.
