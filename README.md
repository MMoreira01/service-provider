# Service Provider

This repository serves as service provider for the [identity provider repository](https://github.com/MMoreira01/identity-provider). 

This is a Laravel project that provides a REST API using OAuth2.0 for the identity provider to consume.

This should run on port 8000, while the identity provider should be run on port 8001.

## Setup

1) Install dependencies and copy the .env
```bash
composer install
```

2) Copy the .env file, generate a key and the assets
```bash
php -r "copy('.env.example', '.env');"
php artisan key:generate
```

3) Create a database and fill the .env file with those details
```bash
# .env
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

4) Run the migrations and create the admin user
```bash
php artisan migrate
php artisan db:seed
```

5) Serve the project
```bash
php artisan serve --port=8000[
```

---

## Usefull commands

- While testing Migrations and Seeders
```bash
php artisan migrate:rollback
php artisan migrate 
php artisan db:seed
```

## Credits

- [Marco Moreira](https://github.com/MMoreira01)
- [Francisco Ferreira](https://github.com/feel31ng)
- [João Rosa](https://github.com/joaorosa30)

