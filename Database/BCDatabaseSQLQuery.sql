create database BCDatabase;
use BCDatabase;

create table _admin(
admin_id int primary key auto_increment NOT NULL,
username varchar (50) NOT NULL,
firstname varchar (50) NOT NULL,
lastname varchar (50) NOT NULL,
password varchar (50) NOT NULL,
birthday date NOT NULL,
email varchar (50) NOT NULL,
phone_num int NOT NULL
);

create table _user(
user_id int primary key auto_increment NOT NULL,
username varchar (50) NOT NULL,
firstname varchar (50) NOT NULL,
lastname varchar (50) NOT NULL,
password varchar (50) NOT NULL,
birthday date NOT NULL,
email varchar (50) NOT NULL,
phone_num int NOT NULL,
admin_id int,
constraint fk_admin
foreign key (admin_id) references _admin(admin_id)
);

create table _sellerupload (
file_id int primary key auto_increment NOT NULL,
user_id int NOT NULL,
art_title varchar (255) NOT NULL,
checksum varchar (255) NOT NULL,
date_time datetime NOT NULL,
pathdirectory varchar (255) NOT NULL,
constraint fk_sellerid
foreign key (user_id) references _user(user_id)
);

create table _wallet (
wallet_id int primary key auto_increment NOT NULL,
user_id int,
amount bigint,
constraint fk_user_id
foreign key (user_id) references _user(user_id)
);