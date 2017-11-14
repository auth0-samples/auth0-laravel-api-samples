docker build -t auth0-laravel-api .
docker run --rm -it -v $(pwd)/.env:/home/app/.env auth0-laravel-api php artisan key:generate
docker run --env-file .env -p 3010:3010 -it auth0-laravel-api
