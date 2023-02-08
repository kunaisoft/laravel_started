# Job Aggregator

This project is created with [Laravel Jetstream]
---

## Requirements

-   PHP 8 +
-   Laravel installer
-   Composer
-   Npm installer (Node.js ver. 16)
-   APACHE or Nginx
-   Mysql (ver 8)


## Getting started

1. #### Clone the repository from Git and open the directory:

```
git clone url repository
```

2. #### cd into your project directory

3. #### install composer and npm packages

```
composer install
npm install && npm run dev
```

## Start prepare the environment:

```
cp .env.example .env // setup database credentials
php artisan key:generate
php artisan migrate:refresh --seed
```
