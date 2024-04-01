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

horizon:
	docker compose exec horizon bash

setup:
	make build
	# Use Composer from the host machine or a Composer Docker image
	composer install
	# Conditionally copy .env.example to .env if .env doesn't exist
	[ -f .env ] || cp .env.example .env
	# Continue with the rest of the setup
	make start
	sleep 10 # enough time for DB to setup
	make status
	docker compose exec app php artisan key:generate
	docker compose exec app php artisan migrate
	docker compose exec app php artisan db:seed
	docker compose run --rm horizon php artisan horizon

.PHONY: start stop status build bash migrate seed app horizon setup
