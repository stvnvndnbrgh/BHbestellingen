/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  steven.vandenberghe
 * Created: Jun 1, 2016
 */
CREATE DATABASE bhbase;

USE bhbase;

create table postcode (
    id int(8) not null auto_increment,
    postcode varchar(10) not null,
    gemeente varchar(100),
    primary key (id)
);

create table leverancier (
	id int(8) not null auto_increment,
	leveranciernaam varchar(100) not null,
    email varchar(100),
    primary key(id)
);

create table artikelgroep (
	id int(8) not null auto_increment,
    artikelgroepnaam varchar(100),
    primary key(id)
);

create table stati (
	id int(8) not null auto_increment,
    stati varchar(100),
    primary key (id)
);

create table klant (
    id int(8) not null auto_increment,
    voornaam varchar(60),
    familienaam varchar(60),
    adres varchar(255),
	postcode_id int(8),
    telefoonnr varchar(50),
    email varchar(100),
    klant_createdate timestamp default '0000-00-00 00:00:00',
    klant_editdate timestamp default now() on update now(),
    primary key (id),
    foreign key (postcode_id) references postcode (id)
);

create table artikel (
	id int(8) not null auto_increment,
    artikelnaam varchar(255),
    artikelgroep_id int(8),
    barcode varchar(100),
    leverancier_id int(8),
    primary key (id),
    foreign key (artikelgroep_id)
		references artikelgroep (id),
	foreign key (leverancier_id)
		references leverancier(id)
);

create table bestelling (
	id int(8) not null auto_increment,
    klant_id int(8),
    artikel_id int(8),
    status_id int(8),
    createdate timestamp default '0000-00-00 00:00:00',
    editdate timestamp default now() on update now(),
    primary key (id),
    foreign key (klant_id)
		references klant(id),
	foreign key (artikel_id)
		references artikel(id),
	foreign key (status_id)
		references stati (id)
);

CREATE USER 'bandagist'@'localhost' IDENTIFIED BY 'bandapwd';
GRANT USAGE ON * . * TO 'bandagist'@'localhost' IDENTIFIED BY 'bandapwd';
GRANT SELECT, INSERT, UPDATE, DELETE ON bhbase.* TO 'bandagist'@'localhost';
