# What is advertiser?

Advertiser is basic login/register web app with ability to manage and publish ads. It has two account levels, admin part (which is still in development mode) and common user. This project is part of a learning process with focus on **laravel** framework.


## Setup

#### Go to project root path:

* Create .env file &nbsp; ```cp .env.example .env``` &nbsp; and change database information like so:

```php
DB_DATABASE=yourDatabaseName
DB_USERNAME=yourUsername
DB_PASSWORD=yourPassword    // leave blank if you don't have any
```

* Run the following commands

```php
composer update
php artisan key:generate    // generating new project key
php artisan migrate:refresh --seed  // create and seed table
```


## Usage

Create new account or use existing one:

| Email  | Password |
| --------- | ----------- |
| john.s@gmail.com | johny1
| margarita.t@gmail.com | margarita1



