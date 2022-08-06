# challenge - ZenSmart React/Laravel FullStack Test

**Note:** In this Project as working-enviorment i have used Vagrant, 
so if you're having difficulties to start the back-end, just contact me and i'll send the vagrant box.

---

## Back-end (Laravel)

### Install composer dependencies

run this command:

`composer install`

### Create a copy of your .env file

`cp .env.example .env`

### Generate an app encryption key

`php artisan key:generate`

### Initialize DB

run migrations & seeders with following commands:

`php artisan migrate`

`php artisan db:seed --class=CounterTableSeeder`

## Front-end (React)

to start the client-side,
cd into zensmart-react and run following commands:

`npm i`

`npm start`
