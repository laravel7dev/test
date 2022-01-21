# Laravel + vuejs form test project

## Installation

## Docker

```sh
cd test
docker-compose build app
docker-compose up -d
```

```sh
docker-compose exec app cp .env.example .env
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
```

Verify the deployment by navigating to your server address in
your preferred browser.

```sh
127.0.0.1:8000
```

## License

MIT
