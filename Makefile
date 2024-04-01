start:
	docker compose up -d

stop:
	docker compose down

status:
	docker compose ps

build:
	docker compose build

bash:
	docker compose exec app bash

migrate:
	docker compose exec app php artisan migrate

seed:
	docker compose exec app php artisan db:seed

app:
	docker compose exec app bash

setup:
	make build
	make start
	make status
	docker compose exec app composer install
	docker compose exec app cp .env.example .env
	docker compose exec app php artisan key:generate
	docker compose exec app php artisan migrate
	docker compose exec app php artisan db:seed
	docker compose exec app php artisan horizon &

.PHONY: start stop status build bash migrate seed app setup
