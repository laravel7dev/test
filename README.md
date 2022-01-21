# Laravel + vuejs form test project

## Installation

## Docker

```sh
git clone https://github.com/laravel7dev/test.git testproject
cd testproject
cp .env.example .env
```

```sh
docker-compose build app
docker-compose up -d
```

```sh
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
```

```sh
docker-compose exec app npm install
docker-compose exec app npm run dev
```

Verify the deployment by navigating to your server address in
your preferred browser.

```sh
localhost:8000
```

## License

MIT
