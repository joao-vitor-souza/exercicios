CREATE TABLE IF NOT EXISTS usuarios (
codigo int NOT null AUTO_INCREMENT,
nome varchar(40) NOT null,
email varchar(50) NOT null UNIQUE,
telefone varchar(11) NOT null UNIQUE,
PRIMARY KEY(codigo)
) DEFAULT charset=utf8;
