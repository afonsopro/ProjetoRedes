/*
Created		23-09-2024
Modified		18-11-2024
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/

CREATE DATABASE  LealCars;
USE LealCars;


drop table IF EXISTS TipoCaixa;
drop table IF EXISTS Mensagens;
drop table IF EXISTS Combustivel;
drop table IF EXISTS Anuncio;
drop table IF EXISTS Marca;
drop table IF EXISTS Modelo;
drop table IF EXISTS Iva;
drop table IF EXISTS Cliente;
drop table IF EXISTS Favoritos;
drop table IF EXISTS Tipouti;
drop table IF EXISTS FotosVei;
drop table IF EXISTS TipoVei;
drop table IF EXISTS Veiculo;
drop table IF EXISTS Utilizador;


Create table Utilizador (
	CodUti Serial NOT NULL,
	utinome Varchar(100),
	utimail Varchar(100),
	utipass Varchar(50),
	utifoto Varchar(250),
	CodTipoUti Bigint UNSIGNED NOT NULL,
 Primary Key (CodUti,CodTipoUti)) ENGINE = innodb;

Create table Veiculo (
	CodVei Serial NOT NULL,
	veikm Int,
	veidescricao Text,
	CodMod Bigint UNSIGNED NOT NULL,
	CodTpVei Bigint UNSIGNED NOT NULL,
	veiano Year(4),
	veipre Float,
	veicor Varchar(50),
	CodAnu Bigint UNSIGNED NOT NULL,
	Codcomb Bigint UNSIGNED NOT NULL,
	veipot Int,
	veiportas Int,
	veilug Int,
 Primary Key (CodVei)) ENGINE = innodb;

Create table TipoVei (
	CodTpVei Serial NOT NULL,
	tipopdsg Varchar(100),
 Primary Key (CodTpVei)) ENGINE = innodb;

Create table FotosVei (
	CodFoto Serial NOT NULL,
	foto Varchar(250),
	dataft Date,
	CodVei Bigint UNSIGNED NOT NULL,
 Primary Key (CodFoto,CodVei)) ENGINE = innodb;

Create table Tipouti (
	CodTipoUti Serial NOT NULL,
	tpudsg Varchar(100),
 Primary Key (CodTipoUti)) ENGINE = innodb;

Create table Favoritos (
	CodCar Serial NOT NULL,
	CodVei Bigint UNSIGNED NOT NULL,
	CodCLi Bigint UNSIGNED NOT NULL,
 Primary Key (CodCar)) ENGINE = innodb;

Create table Cliente (
	CodCLi Serial NOT NULL,
	clinome Varchar(100),
	climail Varchar(100),
	clitel Int,
	clidatares Datetime,
	climor Text,
 Primary Key (CodCLi)) ENGINE = innodb;

Create table Iva (
	CodIva Serial NOT NULL,
	ivavalor Float,
	ivadsg Varchar(20),
	CodVei Bigint UNSIGNED NOT NULL,
 Primary Key (CodIva)) ENGINE = innodb;

Create table Modelo (
	CodMod Serial NOT NULL,
	CodMarca Bigint UNSIGNED NOT NULL,
	moddgs Varchar(100),
 Primary Key (CodMod)) ENGINE = innodb;

Create table Marca (
	CodMarca Serial NOT NULL,
	mardsg Varchar(100),
 Primary Key (CodMarca)) ENGINE = innodb;

Create table Anuncio (
	CodAnu Serial NOT NULL,
	dataanu Date,
	estadoanu Varchar(50),
	CodCLi Bigint UNSIGNED NOT NULL,
 Primary Key (CodAnu)) ENGINE = innodb;

Create table Combustivel (
	Codcomb Serial NOT NULL,
	combdsg Varchar(20),
 Primary Key (Codcomb)) ENGINE = innodb;

CREATE TABLE Mensagens (
    CodMens Serial NOT NULL,
    menscont TEXT,
    mensdata DATETIME,
    mensstatus ENUM('lida', 'não lida') DEFAULT 'não lida',
    CodEmissor BIGINT UNSIGNED NOT NULL,
    CodRecetor BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (CodMens)) ENGINE= innodb;


Create table TipoCaixa (
	CodCai Serial NOT NULL,
 Primary Key (CodCai)) ENGINE = innodb;


Alter table Favoritos add Foreign Key (CodVei) references Veiculo (CodVei) on delete  restrict on update  restrict;
Alter table Iva add Foreign Key (CodVei) references Veiculo (CodVei) on delete  restrict on update  restrict;
Alter table FotosVei add Foreign Key (CodVei) references Veiculo (CodVei) on delete  restrict on update  restrict;
Alter table Veiculo add Foreign Key (CodTpVei) references TipoVei (CodTpVei) on delete  restrict on update  restrict;
Alter table Utilizador add Foreign Key (CodTipoUti) references Tipouti (CodTipoUti) on delete  restrict on update  restrict;
Alter table Favoritos add Foreign Key (CodCLi) references Cliente (CodCLi) on delete  restrict on update  restrict;
Alter table Anuncio add Foreign Key (CodCLi) references Cliente (CodCLi) on delete  restrict on update  restrict;
Alter table Mensagens add Foreign Key (Codrecetor) references Cliente (CodCLi) on delete  restrict on update  restrict;
Alter table Mensagens add Foreign Key (CodEmissor) references Cliente (CodCLi) on delete  restrict on update  restrict;
Alter table Veiculo add Foreign Key (CodMod) references Modelo (CodMod) on delete  restrict on update  restrict;
Alter table Modelo add Foreign Key (CodMarca) references Marca (CodMarca) on delete  restrict on update  restrict;
Alter table Veiculo add Foreign Key (CodAnu) references Anuncio (CodAnu) on delete  restrict on update  restrict;
Alter table Veiculo add Foreign Key (Codcomb) references Combustivel (Codcomb) on delete  restrict on update  restrict;


/* Users permissions */


