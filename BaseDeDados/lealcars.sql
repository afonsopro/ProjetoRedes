-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Dez-2024 às 09:20
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

CREATE DATABASE lealcars;
USE lealcars;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lealcars`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

CREATE TABLE `anuncio` (
  `CodAnu` bigint(20) UNSIGNED NOT NULL,
  `dataanu` date DEFAULT NULL,
  `estadoanu` enum('Ativo','Inativo') DEFAULT 'Ativo',
  `CodCLi` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `anuncio`
--

INSERT INTO `anuncio` (`CodAnu`, `dataanu`, `estadoanu`, `CodCLi`) VALUES
(21, '2024-12-01', 'Ativo', 25),
(22, '2024-12-02', 'Inativo', 25),
(23, '2024-12-03', 'Ativo', 25),
(24, '2024-12-04', 'Ativo', 25),
(25, '2024-12-05', 'Inativo', 25),
(26, '2024-12-06', 'Ativo', 25),
(27, '2024-12-07', 'Ativo', 25),
(28, '2024-12-08', 'Inativo', 25),
(29, '2024-12-09', 'Ativo', 25),
(30, '2024-12-10', 'Ativo', 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `CodCLi` bigint(20) UNSIGNED NOT NULL,
  `clinome` varchar(100) DEFAULT NULL,
  `climail` varchar(100) DEFAULT NULL,
  `clitel` int(11) DEFAULT NULL,
  `clipass` varchar(250) DEFAULT NULL,
  `climor` text DEFAULT NULL,
  `Clifoto` varchar(250) DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`CodCLi`, `clinome`, `climail`, `clitel`, `clipass`, `climor`, `Clifoto`) VALUES
(25, 'Gonçalo', 'goncalorodtigues@gmail.com', 912125101, 'b08d8ebe3c63eee736a36bcca924d463', NULL, 'user.png'),
(27, 'Afonso', 'afonso@gmail.com', 912125101, '1232cc5fae73fad2da1c86343e7ed1c2', NULL, 'member.jpg'),
(28, 'Skibidi', 'lol@gmail.com', 123456789, '220466675e31b9d20c051d5e57974150', NULL, 'user.png'),
(29, 'Tiago', 'tiago@gmail.com', 987654321, '25d55ad283aa400af464c76d713c07ad', NULL, 'user.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `combustivel`
--

CREATE TABLE `combustivel` (
  `Codcomb` bigint(20) UNSIGNED NOT NULL,
  `combdsg` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `combustivel`
--

INSERT INTO `combustivel` (`Codcomb`, `combdsg`) VALUES
(1, 'Eletricidade'),
(2, 'Etanol'),
(3, 'Gasolina'),
(4, 'Diesel'),
(5, 'Gasóleo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `CodCar` bigint(20) UNSIGNED NOT NULL,
  `CodVei` bigint(20) UNSIGNED NOT NULL,
  `CodCLi` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotosvei`
--

CREATE TABLE `fotosvei` (
  `CodFoto` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `dataft` date DEFAULT NULL,
  `CodVei` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `iva`
--

CREATE TABLE `iva` (
  `CodIva` bigint(20) UNSIGNED NOT NULL,
  `ivavalor` float DEFAULT NULL,
  `ivadsg` varchar(20) DEFAULT NULL,
  `CodVei` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `CodMarca` bigint(20) UNSIGNED NOT NULL,
  `mardsg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`CodMarca`, `mardsg`) VALUES
(1, 'Toyota'),
(2, 'Volkswagen'),
(3, 'Ford'),
(4, 'Chevrolet'),
(5, 'Honda'),
(6, 'BMW'),
(7, 'Mercedes-Benz'),
(8, 'Audi'),
(9, 'Hyundai'),
(10, 'Nissan');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `CodMens` bigint(20) UNSIGNED NOT NULL,
  `menscont` text DEFAULT NULL,
  `mensdata` datetime DEFAULT NULL,
  `mensstatus` enum('lida','não lida') DEFAULT 'não lida',
  `CodEmissor` bigint(20) UNSIGNED NOT NULL,
  `CodRecetor` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE `modelo` (
  `CodMod` bigint(20) UNSIGNED NOT NULL,
  `CodMarca` bigint(20) UNSIGNED NOT NULL,
  `moddgs` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`CodMod`, `CodMarca`, `moddgs`) VALUES
(1, 1, 'Corolla'),
(2, 1, 'RAV4'),
(3, 2, 'Golf'),
(4, 2, 'Tiguan'),
(5, 3, 'Mustang'),
(6, 3, 'Ranger'),
(7, 4, 'Camaro'),
(8, 4, 'Silverado'),
(9, 5, 'Civic'),
(10, 5, 'CR-V\r\n'),
(11, 6, 'Série 3'),
(12, 6, 'X5'),
(13, 7, 'Classe C'),
(14, 7, 'GLE'),
(15, 8, 'A4'),
(16, 8, 'Q5'),
(17, 9, 'Tucson'),
(18, 9, 'Elantra'),
(19, 10, 'Altima'),
(20, 10, 'Rogue');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipocaixa`
--

CREATE TABLE `tipocaixa` (
  `CodCai` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipouti`
--

CREATE TABLE `tipouti` (
  `CodTipoUti` bigint(20) UNSIGNED NOT NULL,
  `tpudsg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipovei`
--

CREATE TABLE `tipovei` (
  `CodTpVei` bigint(20) UNSIGNED NOT NULL,
  `tipopdsg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tipovei`
--

INSERT INTO `tipovei` (`CodTpVei`, `tipopdsg`) VALUES
(1, 'Carro'),
(2, 'Carrinha'),
(3, 'Mota');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `CodUti` bigint(20) UNSIGNED NOT NULL,
  `utinome` varchar(100) DEFAULT NULL,
  `utimail` varchar(100) DEFAULT NULL,
  `utipass` varchar(50) DEFAULT NULL,
  `utifoto` varchar(250) DEFAULT NULL,
  `CodTipoUti` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `CodVei` bigint(20) UNSIGNED NOT NULL,
  `veikm` int(11) DEFAULT NULL,
  `veidescricao` text DEFAULT NULL,
  `CodMod` bigint(20) UNSIGNED NOT NULL,
  `CodTpVei` bigint(20) UNSIGNED NOT NULL,
  `veiano` year(4) DEFAULT NULL,
  `veipre` float DEFAULT NULL,
  `veicor` varchar(50) DEFAULT NULL,
  `Codcomb` bigint(20) UNSIGNED NOT NULL,
  `veipot` int(11) DEFAULT NULL,
  `veiportas` int(11) DEFAULT NULL,
  `veilug` int(11) DEFAULT NULL,
  `fotovei` varchar(250) DEFAULT NULL,
  `CodAnun` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`CodVei`, `veikm`, `veidescricao`, `CodMod`, `CodTpVei`, `veiano`, `veipre`, `veicor`, `Codcomb`, `veipot`, `veiportas`, `veilug`, `fotovei`, `CodAnun`) VALUES
(48, 15000, 'Carro sedan em ótimo estado', 1, 1, '2020', 50000, 'Prata', 1, 150, 4, 5, 'nigga.jpg', 21),
(49, 50000, 'SUV confortável', 2, 2, '2018', 70000, 'Preto', 2, 200, 4, 7, 'carro.jpg', 22),
(50, 30000, 'Hatch econômico', 3, 1, '2019', 30000, 'Branco', 3, 120, 4, 5, 'nigga.jpg', 23),
(51, 25000, 'Caminhonete potente', 4, 3, '2021', 90000, 'Azul', 4, 300, 2, 3, 'carro.jpg', 24),
(52, 80000, 'Esportivo de luxo', 5, 3, '2015', 200000, 'Vermelho', 5, 400, 2, 2, 'nigga.jpg', 25),
(53, 12000, 'Carro familiar espaçoso', 2, 2, '2022', 80000, 'Cinza', 2, 180, 4, 7, 'carro.jpg', 26),
(54, 70000, 'Van para transporte', 7, 1, '2017', 60000, 'Branco', 3, 150, 5, 10, 'nigga.jpg', 27),
(55, 10000, 'Conversível esportivo', 2, 3, '2023', 250000, 'Amarelo', 4, 350, 2, 2, 'carro.jpg', 28),
(56, 5000, 'Carro antigo restaurado', 3, 1, '1970', 100000, 'Verde', 5, 110, 2, 4, 'nigga.jpg', 29),
(57, 40000, 'Carro básico', 10, 1, '2020', 20000, 'Preto', 1, 100, 4, 5, 'carro.jpg', 30);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`CodAnu`),
  ADD UNIQUE KEY `CodAnu` (`CodAnu`),
  ADD KEY `CodCLi` (`CodCLi`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CodCLi`),
  ADD UNIQUE KEY `CodCLi` (`CodCLi`);

--
-- Índices para tabela `combustivel`
--
ALTER TABLE `combustivel`
  ADD PRIMARY KEY (`Codcomb`),
  ADD UNIQUE KEY `Codcomb` (`Codcomb`);

--
-- Índices para tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`CodCar`),
  ADD UNIQUE KEY `CodCar` (`CodCar`),
  ADD KEY `CodVei` (`CodVei`),
  ADD KEY `CodCLi` (`CodCLi`);

--
-- Índices para tabela `fotosvei`
--
ALTER TABLE `fotosvei`
  ADD PRIMARY KEY (`CodFoto`,`CodVei`),
  ADD UNIQUE KEY `CodFoto` (`CodFoto`),
  ADD KEY `CodVei` (`CodVei`);

--
-- Índices para tabela `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`CodIva`),
  ADD UNIQUE KEY `CodIva` (`CodIva`),
  ADD KEY `CodVei` (`CodVei`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`CodMarca`),
  ADD UNIQUE KEY `CodMarca` (`CodMarca`);

--
-- Índices para tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`CodMens`),
  ADD UNIQUE KEY `CodMens` (`CodMens`),
  ADD KEY `CodRecetor` (`CodRecetor`),
  ADD KEY `CodEmissor` (`CodEmissor`);

--
-- Índices para tabela `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`CodMod`),
  ADD UNIQUE KEY `CodMod` (`CodMod`),
  ADD KEY `CodMarca` (`CodMarca`);

--
-- Índices para tabela `tipocaixa`
--
ALTER TABLE `tipocaixa`
  ADD PRIMARY KEY (`CodCai`),
  ADD UNIQUE KEY `CodCai` (`CodCai`);

--
-- Índices para tabela `tipouti`
--
ALTER TABLE `tipouti`
  ADD PRIMARY KEY (`CodTipoUti`),
  ADD UNIQUE KEY `CodTipoUti` (`CodTipoUti`);

--
-- Índices para tabela `tipovei`
--
ALTER TABLE `tipovei`
  ADD PRIMARY KEY (`CodTpVei`),
  ADD UNIQUE KEY `CodTpVei` (`CodTpVei`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`CodUti`,`CodTipoUti`),
  ADD UNIQUE KEY `CodUti` (`CodUti`),
  ADD KEY `CodTipoUti` (`CodTipoUti`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`CodVei`),
  ADD UNIQUE KEY `CodVei` (`CodVei`),
  ADD UNIQUE KEY `CodAnun` (`CodAnun`),
  ADD KEY `CodTpVei` (`CodTpVei`),
  ADD KEY `CodMod` (`CodMod`),
  ADD KEY `Codcomb` (`Codcomb`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `CodAnu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `CodCLi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `combustivel`
--
ALTER TABLE `combustivel`
  MODIFY `Codcomb` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `CodCar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `fotosvei`
--
ALTER TABLE `fotosvei`
  MODIFY `CodFoto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `iva`
--
ALTER TABLE `iva`
  MODIFY `CodIva` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `CodMarca` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `CodMens` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `modelo`
--
ALTER TABLE `modelo`
  MODIFY `CodMod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tipocaixa`
--
ALTER TABLE `tipocaixa`
  MODIFY `CodCai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipouti`
--
ALTER TABLE `tipouti`
  MODIFY `CodTipoUti` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipovei`
--
ALTER TABLE `tipovei`
  MODIFY `CodTpVei` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `CodUti` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `CodVei` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `anuncio`
--
ALTER TABLE `anuncio`
  ADD CONSTRAINT `anuncio_ibfk_1` FOREIGN KEY (`CodCLi`) REFERENCES `cliente` (`CodCLi`);

--
-- Limitadores para a tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`CodVei`) REFERENCES `veiculo` (`CodVei`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`CodCLi`) REFERENCES `cliente` (`CodCLi`);

--
-- Limitadores para a tabela `fotosvei`
--
ALTER TABLE `fotosvei`
  ADD CONSTRAINT `fotosvei_ibfk_1` FOREIGN KEY (`CodVei`) REFERENCES `veiculo` (`CodVei`);

--
-- Limitadores para a tabela `iva`
--
ALTER TABLE `iva`
  ADD CONSTRAINT `iva_ibfk_1` FOREIGN KEY (`CodVei`) REFERENCES `veiculo` (`CodVei`);

--
-- Limitadores para a tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `mensagens_ibfk_1` FOREIGN KEY (`CodRecetor`) REFERENCES `cliente` (`CodCLi`),
  ADD CONSTRAINT `mensagens_ibfk_2` FOREIGN KEY (`CodEmissor`) REFERENCES `cliente` (`CodCLi`);

--
-- Limitadores para a tabela `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`CodMarca`) REFERENCES `marca` (`CodMarca`);

--
-- Limitadores para a tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `utilizador_ibfk_1` FOREIGN KEY (`CodTipoUti`) REFERENCES `tipouti` (`CodTipoUti`);

--
-- Limitadores para a tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `veiculo_ibfk_1` FOREIGN KEY (`CodTpVei`) REFERENCES `tipovei` (`CodTpVei`),
  ADD CONSTRAINT `veiculo_ibfk_2` FOREIGN KEY (`CodMod`) REFERENCES `modelo` (`CodMod`),
  ADD CONSTRAINT `veiculo_ibfk_4` FOREIGN KEY (`Codcomb`) REFERENCES `combustivel` (`Codcomb`),
  ADD CONSTRAINT `veiculo_ibfk_5` FOREIGN KEY (`CodAnun`) REFERENCES `anuncio` (`CodAnu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
