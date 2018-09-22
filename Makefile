.PHONY: install update test

composer.lock: composer.json
	composer update

vendor: composer.lock
	composer install

install: vendor

serve: install
	php artisan serve	

test:
	./vendor/bin/phpunit --colors