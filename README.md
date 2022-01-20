# Laravel + vuejs form test project

## Installation

Install the dependencies and devDependencies.

```sh
cd test
composer install
php artisan key:generate
npm install
npm run dev
```

For production environments...

```sh
npm run prod
```

Setup your environment, web-server, DB, and edit .env-file.

```sh
php artisan migrate
```

## Docker

Project is very easy to install and deploy in a Docker container.

By default, the Docker will expose port 8080, so change this within the
Dockerfile if necessary. When ready, simply use the Dockerfile to
build the image.

```sh
cd test
docker-compose build app
docker-compose up -d
```

This will create the image and pull in the necessary dependencies and run containers.
Now you can check Docker containers:

```sh
docker-compose ps
```

Verify the deployment by navigating to your server address in
your preferred browser.

```sh
127.0.0.1:8000
```

## License

MIT
