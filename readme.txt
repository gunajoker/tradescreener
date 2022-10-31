get a mysql docker
	
get a php docker
	docker run -d -p 80:80 --name my-apache-php-app -v "$PWD":/var/www/html php:7.2-apache
	docker-php-ext-install mysqli

paste project

