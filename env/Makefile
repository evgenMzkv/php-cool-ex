start:
	docker-compose start

stop:
	docker-compose stop

up:
	docker-compose up -d

down:
	docker-compose down

composer-install:
	docker-compose exec php bash -c "cd /var/www/html/app && composer install"

composer-update:
	docker-compose exec php bash -c "cd /var/www/html/app && composer update"

composer-autoload:
	docker-compose exec php bash -c "cd /var/www/html/app && composer dump-autoload --optimize"

ps:
	docker-compose ps

ssh-php-dev:
	docker-compose exec -u dev php bash -c 'cd app && bash'

ssh-php-root:
	docker-compose exec -u root php bash
