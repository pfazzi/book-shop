up:
	symfony serve -d
	docker-compose up -d
	cd admin_frontend && yarn start

stop:
	symfony local:server:stop

cs:
	./vendor/bin/phpcbf -s

deps:
	./vendor/bin/deptrac --formatter=graphviz

psalm:
	./vendor/bin/psalm

consume_events:
	symfony console messenger:consume async -vv