# Service Provider

This repository serves as service provider that will use the [identity provider repository](https://github.com/MMoreira01/identity-provider) to authenticate users.

This should run on port 8001 and the identity provider should run on port 8000.

The Service Provider is a simulated Academic Papers Repository,where the user can login by using the Identity Provider Plataform, in this case the Muudal Plataform. After he authorizes the access, he can navigate freely through the platform, and see the papers that are available.

## Setup

1. Install dependencies and copy the .env

```bash
composer install
npm install
```

2. Copy the .env file, generate a key and the assets

```bash
php -r "copy('.env.example', '.env');"
php artisan key:generate
npm run prod
```

3. Create a database and fill the .env file with those details

```bash
# .env
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

4. Run the migrations and create the admin user

```bash
php artisan migrate
php artisan db:seed
```

5. Serve the project

```bash
php artisan serve --port=8001
```

---

## Usefull commands

-   While testing Migrations and Seeders

```bash
php artisan migrate:rollback
php artisan migrate
php artisan db:seed
```

## Credits

-   [Marco Moreira](https://github.com/MMoreira01)
-   [Francisco Ferreira](https://github.com/feel31ng)
-   [João Rosa](https://github.com/joaorosa30)
