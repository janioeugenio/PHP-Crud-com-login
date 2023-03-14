# PHP-crud-com-login
 Um crud em PHP e bootstrap com validação de login

Para a utilização inicial use o banco da seguinte forma:
Nome do banco: crud
Tabelas:
    produtos
        id int(11) Auto_increment primary key
        nome varchar(100)   
        descrição varchar(255)
        status int (11)
    
    usuarios
        id int(11) Auto_increment primary key
        nome varchar(255)   
        email varchar(255)
        senha varchar(255)
    
    registro_log
        id int(11) Auto_increment primary key
        usuario varchar(255)
        data datetime
        alteracao varchar(255)

Como estamos usando o password_hash e password_verify o hash da senha de usuário padrão é: $2y$10$iBjo4P5chh.XGlBi2a7AkuBya4vBFOnEydIce/zpsclcR/YLbRYPO = admin

Para criar o banco direto use o SQL abaixo:

CREATE DATABASE crud;
USE crud;

CREATE TABLE produtos(
    id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome varchar(100),   
    descrição varchar(255),
    status int (11));

CREATE TABLE usuarios(
    id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome varchar(255),   
    email varchar(255),
    senha varchar(255));
    
CREATE TABLE registro_log(
    id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	usuario varchar(255),
    data datetime,
    alteracao varchar(255));
    
INSERT INTO usuarios (nome,email,senha) VALUES ('admin','admin@admin.com','$2y$10$iBjo4P5chh.XGlBi2a7AkuBya4vBFOnEydIce/zpsclcR/YLbRYPO');
    