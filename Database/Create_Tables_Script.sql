DROP TABLE IF EXISTS accounts;
CREATE TABLE accounts (
id INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
username VARCHAR(255) NOT NULL UNIQUE,
pass VARCHAR(16) NOT NULL,
email VARCHAR(255) NOT NULL,
balance INT(255) DEFAULT 0,
location VARCHAR(255),
lt_online VARCHAR(255),
account_status INT(2) default 0,
is_deleted BOOLEAN DEFAULT false,
PRIMARY KEY (id)
);

CREATE TABLE deleted_accounts (
id INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
username VARCHAR(255) NOT NULL UNIQUE,
pass VARCHAR(16) NOT NULL,
email VARCHAR(255) NOT NULL,
balance INT(255) DEFAULT 0,
location VARCHAR(255),
lt_online VARCHAR(255),
account_status int(2),
is_deleted BOOLEAN DEFAULT true,
PRIMARY KEY (id)
);