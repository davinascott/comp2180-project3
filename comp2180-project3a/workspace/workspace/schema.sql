DROP TABLE IF EXISTS Messages;
DROP TABLE IF EXISTS MessagesRead;
DROP TABLE IF EXISTS Users;

CREATE TABLE Users(
id int AUTO_INCREMENT NOT NULL PRIMARY KEY,
firstname varchar(30) NOT NULL,
lastname varchar(30) NOT NULL,
username varchar(30) NOT NULL,
password varchar(60) NOT NULL,
mysession int(20) NOT NULL
);

CREATE TABLE Messages(
id int AUTO_INCREMENT NOT NULL PRIMARY KEY,
recepient_ids varchar(120) NOT NULL,
sender_id varchar(50) NOT NULL,
subject varchar(50) NOT NULL,
body LONGTEXT NOT NULL,
date_sent TIMESTAMP NOT NULL
);

CREATE TABLE MessagesRead(
id int AUTO_INCREMENT NOT NULL PRIMARY KEY,
message_id int(25) NOT NULL,
reader_id varchar(50) NOT NULL,
date_read TIMESTAMP NOT NULL
);

/*insert statement that adds a user with the username 'admin' and the
password 'password123'*/
INSERT INTO Users(username,password) VALUES ('admin', md5('password123')); 
