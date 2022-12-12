DROP DATABASE IF EXISTS clicom;

create database clicom;

use clicom;

create table client (
cli_num int primary key,
cli_nom varchar(50),
cli_adresse varchar(50),
cli_tel varchar(30)
);

create table produit (
pro_num int primary key,
pro_libelle varchar(50),
pro_description varchar(50)
);

create table commande(
com_num int primary key,
cli_num int,
com_date datetime,
com_obs varchar(50),
foreign key (cli_num) references client (cli_num)
);

create table est_compose(
com_num int,
pro_num int,
est_qte int,
foreign key (com_num) references commande (com_num),
foreign key (pro_num) references produit (pro_num),
primary key (com_num, pro_num)
);

create index index_cli_nom on client (cli_nom);