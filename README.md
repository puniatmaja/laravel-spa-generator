<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


# laravel-spa-generator
Laravel Vue SPA generator

# Installation

Install package laravel

    composer install

Make env file

    cp .env.example .env
    
Set DB Connection
 
    DB_DATABASE=YourDB
    DB_USERNAME=YourSQLUsername
    DB_PASSWORD=YourSQLPassword

Generate APP_KEY

    php artisan key:generate

Migrate database

    php artisan migrate

Create account login to dashboard:

    php artisan db:seed


Instal npm package : 

    npm install

# Runing

Runing server API

    php artisan serve

Runing vue front

    npm run hot

# Login 

Access :
    
    http://localhost:8000

Username :

    admin@gmail.com

Password :

    12345678

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
