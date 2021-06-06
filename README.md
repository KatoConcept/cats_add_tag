`git clone https://github.com/Kasparsu/mm18cats.git`

`cd mm18cats`

`cp .env.example .env`

`composer install`

`npm install`

`php artisan key:generate`


`touch database.sqlite`

change in .env
`
DB_CONNECTION=sqlite
DB_DATABASE=[full path to your database.sqlite file]
`

`php artisan migrate --seed`
