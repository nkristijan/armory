DROP DATABASE IF EXISTS armory;
CREATE DATABASE IF NOT EXISTS armory CHARACTER SET utf8 COLLATE utf8_general_ci;

Use armory;
CREATE TABLE members(
`m_id` INT NOT NULL AUTO_INCREMENT,
`first_name` VARCHAR(100),
`last_name` VARCHAR(100),
`username` VARCHAR(100),
`password` VARCHAR(100),
`email` VARCHAR(100),
`phone_number` VARCHAR(100),
`date_created` DATETIME,
`account_active` TINYINT,
`account_admin` TINYINT,
PRIMARY KEY (m_id)
);

CREATE TABLE items(
`i_id` INT NOT NULL AUTO_INCREMENT,
`type` VARCHAR(100),
`brand` VARCHAR(100),
`model` VARCHAR(100),
`color` VARCHAR(100),
`season` VARCHAR(100),
`quantity` INT,
`available` INT,
`description` VARCHAR(100),
PRIMARY KEY (i_id)
);

CREATE TABLE lends(
`l_id` INT NOT NULL AUTO_INCREMENT,
`lend_date` DATETIME,
`member_id` INT,
`item_id` INT,
`quantity` INT,
`return_by` DATETIME,
`return_date` DATETIME,
`active` TINYINT,
PRIMARY KEY (l_id),
FOREIGN KEY (member_id) REFERENCES members(m_id),
FOREIGN KEY (item_id) REFERENCES items(i_id)
);

CREATE TABLE transactions(
`t_id` INT NOT NULL AUTO_INCREMENT,
`from_user` INT,
`lend_id` INT,
`t_quantity` INT,
`to_user` INT,
PRIMARY KEY (t_id),
FOREIGN KEY (from_user) REFERENCES members(m_id),
FOREIGN KEY (lend_id) REFERENCES lends(l_id),
FOREIGN KEY (to_user) REFERENCES members(m_id)
);

CREATE TABLE log(
`log_id` INT NOT NULL AUTO_INCREMENT,
`date` DATETIME,
`user` INT,
`action` VARCHAR(255),
`admin` INT,
FOREIGN KEY (user) REFERENCES members(m_id),
FOREIGN KEY (admin) REFERENCES members(m_id),
PRIMARY KEY (log_id)
);

INSERT INTO members VALUES
('1','Neven','Kristijan','nkristijan','12345','neven.kristijan@gmail.com','0915501394','2012-11-08 11:27:00','1','1'),
('2','Kruno','Bejuk','kbejuk','12345','kruno.bejuk@gmail.com','091234567','2012-11-08 12:11:00','1','0'),
('3','Jagor','Koprek','jkoprek','12345','jagor.koprek@gmail.com','092345678','2012-11-08 12:12:00','1','0'),
('4','Ivan','Brozović','ibrozovic','12345','ivan.brozovic@gmail.com','093456789','2012-11-08 12:13:00','1','0'),
('5','Ivan','Mateljan','imateljan','12345','ivan.mateljan@gmail.com','099346789','2012-11-08 12:14:00','1','0');

INSERT INTO items VALUES
('1','Komplet','CAMP','Orbit','srebrna','ljeto','10','8',NULL),
('2','Dereze','Casin','C14','narančasta','zima','2','0',NULL),
('3','Pojas','Ocun','Quattro','sivo-žuta','ljeto','1','1',NULL),
('4','Gurta','Beal','','bijelo-ljubičasta','ljeto','1','1','60cm'),
('5','Uže','Roca','','crno-crvena','ljeto','1','0','10.0mm'),
('6','Kaciga','Salewa','','crvena','ljeto','4','3',''),
('7','Cepini','Grivel','X-monster','crno-žuta','zima','2','2','Sa crvenim vezicama');

INSERT INTO lends VALUES
('1','2012-11-12','1','1','2','2012-12-12',NULL,'1'),
('2','2012-11-16','3','5','1','2012-12-16',NULL,'1'),
('3','2012-11-18','4','2','1','2012-12-02',NULL,'1'),
('4','2012-11-12','5','6','1','2012-12-12',NULL,'1'),
('5','2012-11-08','2','2','1','2012-11-22',NULL,'1');
