CREATE DATABASE wf3_php_intermediaire_marilene;

USE wf3_php_intermediaire_marilene;

CREATE TABLE advert (
    id int(5) NOT NULL AUTO_INCREMENT,
    title varchar(200) NOT NULL,
    description varchar(255) NOT NULL,
    postal_code int(5) UNSIGNED ZEROFILL NOT NULL,
    city varchar(15) NOT NULL,
    type varchar(20) NOT NULL,
    price int(5) NOT NULL,
    reservation_message varchar(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;