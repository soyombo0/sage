# Installation

git clone https://github.com/soyombo0/sage.git

cd sage

cp .env.example .env

cd docker

docker compose up -d --build

docker compose exec app bash

composer install

php artisan migrate
