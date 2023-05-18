build:
	docker-compose build

up:
	docker-compose up -d --remove-orphans

stop:
	docker-compose stop

restart:
	docker-compose restart

down:
	docker-compose down

ps:
	docker-compose ps

logs:
	docker-compose logs --tail=100 -f nginx || true

dblogs:
	docker-compose logs --tail=100 -f db || true

console:
	docker-compose run --rm web bash
