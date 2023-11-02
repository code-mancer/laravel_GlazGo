# Определение команд для управления контейнерами

build:
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down

restart:
	docker-compose restart

bash:
	docker-compose exec payment-app /bin/bash

logs:
	docker-compose logs -f
