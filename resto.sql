drop database if exists restov2;
create database restov2;
use restov2;

create table quartier(
 id int not null auto_increment,
 nom varchar(100) not null,
 description text not null,
 primary key(id),
 unique(nom),
 check(char_length(nom) >= 3)
) engine=InnoDB;

create table restaurant(
 id int not null auto_increment,
 nom varchar(100) not null,
 adresse text not null,
 description text not null,
 id_quartier int not null,
 primary key(id),
 foreign key(id_quartier) references quartier(id)
) engine=InnoDB;

create table diplome(
 id int not null auto_increment,
 nom varchar(100) not null,
 primary key(id)
) engine=InnoDB;

create table cuisinier(
 id int not null auto_increment,
 nom varchar(100) not null,
 salaire float not null,
 id_restaurant int not null,
 id_diplome int not null,
 primary key(id),
 foreign key(id_restaurant) references restaurant(id),
 foreign key(id_diplome) references diplome(id)
) engine=InnoDB;

insert into quartier (nom, description)
values
('Petit Bayonne', 'Un quartier assez étroit'),
('Grand Bayonne', 'Espace, air et liberté'),
('Polo-Beyris', 'Polo. Le bonbon avec un trou'),
('Saint-Esprit', 'Le quartier de la gare');

insert into restaurant (nom, adresse, description, id_quartier)
values
('Auberge du Petit Bayonne', '23 Rue des Cordeliers, 64100 Bayonne', 'Dans un cadre décontracté avec pierres apparentes, ce restaurant propose une cuisine basque familiale', 1),
('La Rotisserie du Roy Léon', '8 Rue de Coursic, 64100 Bayonne', 'Ce restaurant spécialisé en rôtisserie sert une cuisine régionale 7j/7 dans un cadre rustique ou en terrasse.', 1),
('Restaurant Le Chistera', '42 Rue Port Neuf, 64100 Bayonne', 'Ce restaurant sert des plats basques comme le jambon piperade dans un cadre rustique avec poutres apparentes.', 2),
('Le Bistrot Itsaski', '43 Quai Amiral Jaureguiberry, 64100 Bayonne', 'Restaurant français', 2),
('La Grange', '26 Quai Galuperie, 64100 Bayonne', 'Ce restaurant en bordure de rivière sert une cuisine du marché dans un décor rustique aux chaises Louis XIII.', 1);

insert into diplome (nom)
values
('CAP'),
('BEP'),
('Bac pro');

insert into cuisinier (nom, salaire, id_restaurant, id_diplome)
values
('Paul Bocuse', 4000, 1, 1),
('Pierre Troisgros', 3000, 2, 2),
('Michel Guerard', 2000, 3, 3),
('Georges Blanc', 1000, 4, 1),
('Joel Robuchon', 1500, 5, 2),
('Ghislaine Arabian', 2000, 1, 3),
('Christian Constant', 2500, 2, 1),
('Pierre Gagnaire', 2750, 3, 2),
('Bernard Loiseau', 1750, 4, 3),
('Guy Savoy', 1250, 5, 1),
('Alain Ducasse', 2250, 1, 1);
