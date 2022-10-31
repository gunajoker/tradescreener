get a mysql docker
	
get a php docker
	docker run -d -p 80:80 --name my-apache-php-app -v "$PWD":/var/www/html php:7.2-apache
	docker-php-ext-install mysqli

paste project



CREATE DATABASE trade_db;


use trade_db;
CREATE TABLE trade_details (
mode varchar(40),
stock_name varchar(40),
entry Int,
exit_price Int,
target Int,
sl Int,
date date,
trade_no Int,
outcome Int,
comment varchar(40)
);

ALTER table trade_details modify comment varchar(200);

insert into trade_details values
('Buy','Nifty 18000 CE',277.6,280,290,261,STR_TO_DATE("31-10-22","%d-%m-%y"),1,120,'Sideway market, exited early , but sl was not hit whole day',50)
;

SELECT * from trade_details;

commit;

