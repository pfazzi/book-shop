up:
	symfony serve -d
	docker-compose up -d

stop:
	symfony local:server:stop

cs:
	./vendor/bin/phpcbf -s