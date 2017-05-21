CREATE DATABASE yeticave;
USE yeticave;

CREATE TABLE categories (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name CHAR(32),
	en_name CHAR(32)
);

CREATE UNIQUE INDEX category_name ON categories(name);

CREATE TABLE lots (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name CHAR(128),
	description TEXT,
	create_date DATETIME,
	finish_date DATETIME,
	image CHAR(128),
	start_bet INT,
	step_bet INT,
	fav_count INT,
	
	owner_id INT,
	winner_id INT,
	category_id INT
);

CREATE INDEX lot_name ON lots(name);

CREATE TABLE bets (
	id INT AUTO_INCREMENT PRIMARY KEY,
	create_date DATETIME,
	price INT,
	user_id INT,
	lot_id INT
);

CREATE TABLE users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	reg_date DATETIME,
	email CHAR(64),
	name CHAR(64),
	password CHAR(64),
	image CHAR(128),
	details TEXT
);

CREATE UNIQUE INDEX email ON users(email);