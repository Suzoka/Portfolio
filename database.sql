create database if not exists `portfolio`;

use `portfolio`;

create table if not exists `projets` (
    `id_projet` int not null auto_increment,
    `nom_projet` varchar(255) not null,
    `description_rapide` text not null,
    `description_totale` text not null,
    `date_debut` date not null,
    `date_fin` date,
    `note_perso` int not null,
    `note_finale` int,
    `url` varchar(255) not null,
    primary key (`id_projet`)
);

create table if not exists `membres` (
    `id_membre` int not null auto_increment,
    `identite` varchar(255) not null,
    `url_linkedin` varchar(255) not null,
    primary key (`id_membre`)
);

create table if not exists `groupes` (
    `ext_id_projet` int not null,
    `ext_id_membre` int not null
);

create table if not exists `technologies` (
    `id_techno` int not null auto_increment,
    `nom_techno` varchar(255) not null,
    `couleur_techno` varchar(6) not null,
    primary key (`id_techno`)
);

create table if not exists `moyens` (
    `ext_id_projet` int not null,
    `ext_id_techno` int not null
);

create table if not exists `contexte` (
    `ext_id_projet` int not null,
    `nom_contexte` varchar(255) not null
);