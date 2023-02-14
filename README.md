# Mini Project ( Backend )

This part of backend from mini project, please install this first, then clone & install this frontend :

```sh
https://github.com/do4zero/miniproject.ordivo.frontend
```

## Backend Installation

Clone and install :

```sh
git clone https://github.com/do4zero/miniproject.ordivo.backend backend
cd backend
composer install
npm install && npm run dev
```

setup your env and add this variable in the last row

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=******
DB_USERNAME=******
DB_PASSWORD=******
...
...
FE_BASE_PATH=http://localhost:8080
```
after installation, run this laravel command

```sh
php artisan key:generate
php artisan migrate:fresh --seed
```
last, serve and run your laravel app
```sh
php artisan serve
```
go to http://localhost:8000 to access this backend application
