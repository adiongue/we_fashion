# Wefashion
This repo contains a laravel project which allows to commerce online.

# Requires 

    php v7.0 to v7 .4
    composer version 2.0.14 or later
    npm

# Getting started
## Installation
Please check the official laravel installation guide hfor server requirements before you start. [Official Documentation](https://laravel.com/docs/5.5/installation#installation)

Clone the repository
    
    git clone https://github.com/adiongue/we_fashion.git

Switch to the repo folder

    cd we_fashion

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate:refresh --seed

Start the local development server

    php artisan serve
    npm run watch

You can now access the server at http://localhost:8000