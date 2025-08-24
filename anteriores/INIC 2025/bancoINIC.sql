use bancoteste;
CREATE TABLE cadastro_usuario (
    ID_usuario int auto_increment primary key,
    Nome VARCHAR(255) not null,
    Email VARCHAR(255) not null unique,
    Senha_hash VARCHAR(255) not null,
    Data_criacao datetime default current_timestamp,
    Data_atualizacao datetime default current_timestamp on update current_timestamp,
    Ativo boolean default true
);

CREATE TABLE plantas (
    ID_planta int auto_increment primary key,
    nome_comum varchar(100) not null,
    nome_cientifico varchar(150),
    tipo varchar(50), -- Ex: erva, arbusto, árvore
    clima varchar(100), -- Ex: tropical, temperado
    regiao_origem varchar(100),
    luminosidade varchar(50), -- Ex: sol pleno, meia sombra, sombra
    frequencia_rega varchar(50), -- Ex: diária, 2x por semana 
    umidade_min decimal(4,2),
    umidade_max decimal(4,2),
    descricao text
);
CREATE TABLE usuarioXplanta (
	ID int not null primary key auto_increment,
	ID_usuario int,
    ID_planta int,
    foreign key (ID_usuario) references cadastro_usuario(ID_usuario),
    foreign key (ID_planta) references plantas(ID_planta)
);

CREATE TABLE planta_usuario (
	ID int auto_increment primary key not null,
    ID_usuarioplanta int,
    foreign key (ID_usuarioplanta) references usuarioXplanta(ID),
	apelido varchar(255),
    localizacao varchar(255)
);

CREATE TABLE condicoes_planta (
	ID int auto_increment primary key not null,
    ID_planta int,
    data_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    foreign key (ID_planta) references planta_usuario(ID),
    umidade_atual decimal(5,2)
);

CREATE TABLE analise_planta (
	ID int auto_increment primary key,
    ID_planta_usuario int,
    foreign key (ID_planta_usuario) references planta_usuario(ID),
    data_analise datetime default current_timestamp,
    status_saude ENUM('Boa', 'Regular', 'Ruim', 'Doente'),
    status_umidade ENUM('Baixo', 'Alto', 'Regular')
);

CREATE TABLE recomendacoes (
    ID int auto_increment primary key,
    titulo varchar(100) not null,
    descricao text not null
);

CREATE TABLE analiseXrecomendacao (
    ID_analise int not null,
    ID_recomendacao int not null,
    primary key (ID_analise, ID_recomendacao),
    foreign key (ID_analise) references analise_planta(ID) on delete cascade,
    foreign key (ID_recomendacao) references recomendacoes(ID) on delete cascade
);
