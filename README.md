# Simple CRUD Case 

## Installation

Clone the repo locally:

```sh
git clone https://github.com/bonifasiuskhris/crud_case.git
cd crud_case
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm ci
```

Build assets:

```sh
npm run dev
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create a database on your local machine and edit config on .env

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mekari_db
DB_USERNAME=root
DB_PASSWORD=
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```
