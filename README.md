


# Laravel SPA Generator
Laravel Vue SPA generator


<p align="center"><img src="https://ik.imagekit.io/7k7wjq0kndrg/Screenshot_2021-12-03_185731_vsaR4tN4sv3.png?updatedAt=1638529160914" width="100%"></p>


## Technology

- Laravel (8.54)
- Vue.js (3.0.5)
- Tailwindcss (2.1.2)

## Feature

- Generate CRUD (create data, update data, delete data, read data) automatically
- Standard component 
    - input
    - table
    - button
    - notification
- 

## Installation

Install package laravel

    composer install

Make env file

    cp .env.example .env
    
Set DB Connection
 
    DB_DATABASE=YourDB
    DB_USERNAME=root
    DB_PASSWORD=

Generate APP_KEY

    php artisan key:generate

Migrate database

    php artisan migrate

Create account login to dashboard:

    php artisan db:seed


Instal npm package : 

    npm install

## Running

Runing server API

    php artisan serve

Runing vue front

    npm run hot

## Access 

Url :
    
    http://localhost:8000

Username :

    admin@gmail.com

Password :

    12345678

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
