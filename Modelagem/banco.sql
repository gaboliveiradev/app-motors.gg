CREATE DATABASE ggmotors_banco;
USE ggmotors_banco;

CREATE TABLE Usuario(
	id int auto_increment primary key,
    nome varchar(100) NOT NULL,
    email varchar(100) not null,
    senha varchar(100) not null,
    data_cadastro timestamp not null default current_timestamp,
    ativo bool not null default true
);

CREATE TABLE `combustivel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(90) NOT NULL,
  data_cadastro timestamp not null default current_timestamp,
    data_atualizado timestamp default null,
  id_quem_registrou int not null,
  ativo bool not null default 1,
  foreign key (id_quem_registrou) references usuario (id),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `fabricante` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(90) NOT NULL,
  data_cadastro timestamp not null default current_timestamp,
    data_atualizado timestamp default null,
  id_quem_registrou int not null,
  ativo bool not null default 1,
  foreign key (id_quem_registrou) references usuario (id),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `marca` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(90) NOT NULL,
  data_cadastro timestamp not null default current_timestamp,
    data_atualizado timestamp default null,
  id_quem_registrou int not null,
  ativo bool not null default 1,
  foreign key (id_quem_registrou) references usuario (id),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `tipo_veiculo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(90) NOT NULL,
  data_cadastro timestamp not null default current_timestamp,
    data_atualizado timestamp default null,
  id_quem_registrou int not null,
  ativo bool not null default 1,
  foreign key (id_quem_registrou) references usuario (id),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `detalhes_veiculo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `revisao` tinyint NOT NULL,
  `venda` tinyint NOT NULL,
  `aluguel` tinyint NOT NULL,
  `roubo_furto` tinyint NOT NULL,
  `particular` tinyint NOT NULL,
  `sinistrado` tinyint NOT NULL,
  data_cadastro timestamp not null default current_timestamp,
  data_atualizado timestamp default null,
  id_quem_registrou int not null,
  ativo bool not null default 1,
  foreign key (id_quem_registrou) references usuario (id),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `veiculo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `modelo` varchar(90) NOT NULL,
  `ano` int NOT NULL,
  `cor` varchar(45) NOT NULL,
  `num_chassi` varchar(30) NOT NULL COMMENT 'n chassi é char(17)',
  `placa` char(8) NOT NULL,
  `quilometragem` double NOT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  data_cadastro timestamp not null default current_timestamp,
  data_atualizado timestamp default null,
  id_quem_registrou int not null,
  ativo bool not null default 1,
  `id_marca` int NOT NULL,
  `id_fabricante` int NOT NULL,
  `id_tipo` int NOT NULL,
  `id_combustivel` int NOT NULL,
  `id_detalhes` int NOT NULL,
  PRIMARY KEY (`id`),
  foreign key (id_quem_registrou) references usuario (id),
  KEY `fk_veiculo_marca_idx` (`id_marca`),
  KEY `fk_veiculo_fabricante_idx` (`id_fabricante`),
  KEY `fk_veiculo_tipo_idx` (`id_tipo`),
  KEY `fk_veiculo_detalhes_idx` (`id_detalhes`),
  KEY `fk_veiculo_combustivel_idx` (`id_combustivel`),
  CONSTRAINT `fk_veiculo_combustivel` FOREIGN KEY (`id_combustivel`) REFERENCES `combustivel` (`id`),
  CONSTRAINT `fk_veiculo_detalhes` FOREIGN KEY (`id_detalhes`) REFERENCES `detalhes_veiculo` (`id`),
  CONSTRAINT `fk_veiculo_fabricante` FOREIGN KEY (`id_fabricante`) REFERENCES `fabricante` (`id`),
  CONSTRAINT `fk_veiculo_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`),
  CONSTRAINT `fk_veiculo_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_veiculo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
