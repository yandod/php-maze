setup:
	docker-compose run --rm composer install --ignore-platform-reqs --prefer-dist --no-suggest

test:
	docker-compose run --rm php-cli ./vendor/bin/phpunit

coverage:
	docker-compose run --rm xdebug ./vendor/bin/phpunit

run:
	docker-compose run --rm composer run test -- --size=19

clean:
	docker-compose down 