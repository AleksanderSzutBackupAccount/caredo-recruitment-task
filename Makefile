
up:
	./scripts/docker-compose up -d

build:
	./scripts/docker-compose rm -vsf
	./scripts/docker-compose down -v --remove-orphans
	./scripts/docker-compose build
	./scripts/docker-compose up -d

down:
	./scripts/docker-compose down

require:
	./scripts/docker-compose-run composer require

require-dev:
	./scripts/docker-compose-run composer require --dev

run:
	./scripts/docker-compose-run php index.php

shell:
	./scripts/docker-compose-run bash

test:
	./scripts/docker-compose-run ./vendor/bin/phpunit ./tests/

test-file:
	./scripts/docker-compose-run ./vendor/bin/phpunit ./tests/ --group $(FILE)

stan:
	./scripts/docker-compose-run ./vendor/bin/phpstan analyse $(FILE) --level 7

cs-fixer:
	./scripts/docker-compose-run ./vendor/bin/php-cs-fixer fix $(FILE)

tail-logs:
	./scripts/import-env
	./scripts/docker-compose logs -f ${container}
