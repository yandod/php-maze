setup:
	docker-compose run --rm composer install --ignore-platform-reqs --prefer-dist --no-suggest

test:
	docker-compose run --rm php-cli ./vendor/bin/phpunit

run:
	docker-compose run --rm composer run test

clean:
	docker-compose down 