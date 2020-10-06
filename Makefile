PHP_APP=app

init:
	docker network create fintech || true
	docker-compose up -d --build
	docker-compose exec $(PHP_APP) cp .env.example .env
	docker-compose exec $(PHP_APP) composer global require hirak/prestissimo
	docker-compose exec $(PHP_APP) composer install
	docker-compose exec $(PHP_APP) php artisan key:generate --ansi
	docker-compose exec $(PHP_APP) php artisan migrate --seed

start:
	docker-compose up -d
	docker-compose exec $(PHP_APP) composer install
	docker-compose exec $(PHP_APP) php artisan migrate

stop:
	docker-compose stop

down:
	docker-compose down

bash:
	docker-compose exec $(PHP_APP) bash
