DROP DATABASE IF EXISTS armory;
CREATE DATABASE IF NOT EXISTS armory CHARACTER SET utf8 COLLATE utf8_general_ci;

Use armory;
CREATE TABLE members(
`id` INT NOT NULL AUTO_INCREMENT,
`first_name` VARCHAR(100),
`last_name` VARCHAR(100),
`username` VARCHAR(100),
`password` VARCHAR(100),
`email` VARCHAR(100),
`phone_number` VARCHAR(100),
`date_created` DATETIME,
`account_active` TINYINT,
PRIMARY KEY (id)
);

CREATE TABLE items(
`id` INT NOT NULL AUTO_INCREMENT,
`type` VARCHAR(100),
`brand` VARCHAR(100),
`model` VARCHAR(100),
`color` VARCHAR(100),
`season` VARCHAR(100),
`quantity` INT,
`available` INT,
`description` VARCHAR(100),
PRIMARY KEY (id)
);

CREATE TABLE lends(
`id` INT NOT NULL AUTO_INCREMENT,
`lend_date` DATETIME,
`member_id` INT,
`item_id` INT,
`return_date` DATETIME,  
PRIMARY KEY (id),
FOREIGN KEY (member_id) REFERENCES members(id),
FOREIGN KEY (item_id) REFERENCES items(id)
);

INSERT INTO members VALUES
('1','Neven','Kristijan','nkristijan','12345','neven.kristijan@gmail.com','0915501394','2012-11-08 11:27:00','1');