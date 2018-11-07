-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Ago-2018 às 22:46
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco_extilos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `album_torre`
--

CREATE TABLE `album_torre` (
  `idAlbum` int(11) NOT NULL,
  `idTorre` int(20) NOT NULL,
  `albumTorre` varchar(255) CHARACTER SET latin1 NOT NULL,
  `dataAlbumTorre` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `album_torre`
--

INSERT INTO `album_torre` (`idAlbum`, `idTorre`, `albumTorre`, `dataAlbumTorre`) VALUES
(1, 1, 'Sexy', '0000-00-00'),
(2, 1, 'Romamtico', NULL),
(3, 1, 'Cool', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `album_usuarios`
--

CREATE TABLE `album_usuarios` (
  `idAlbum` int(20) NOT NULL,
  `idUsuario` int(20) DEFAULT NULL,
  `album` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `dataAlbum` date NOT NULL,
  `qtd_post` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `album_usuarios`
--

INSERT INTO `album_usuarios` (`idAlbum`, `idUsuario`, `album`, `dataAlbum`, `qtd_post`) VALUES
(5, 3, 'Moda_Fashion', '2018-03-12', ''),
(6, 10, 'Testando', '2018-04-01', ''),
(7, 11, 'Primeiro_album', '2018-04-02', ''),
(8, 12, 'Primeiro', '2018-08-01', '0'),
(9, 12, 'Segundo', '2018-08-01', '0'),
(10, 13, 'Meu_album', '2018-08-01', '0'),
(11, 12, 'Balada', '2018-08-02', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ext_amigos`
--

CREATE TABLE `ext_amigos` (
  `idAmigo` int(20) NOT NULL,
  `idUsuario1` int(20) DEFAULT NULL,
  `nomeArroba1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idUsuario2` int(20) DEFAULT NULL,
  `nomeArroba2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ext_amigos`
--

INSERT INTO `ext_amigos` (`idAmigo`, `idUsuario1`, `nomeArroba1`, `idUsuario2`, `nomeArroba2`) VALUES
(1, 1, '@luishenrique@', 10, '@jorgelucas@'),
(2, 500, '@paulofernando@', 1, '@luishenrique@'),
(3, 25, '@basj@', 66, '@tass@');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ext_compartilha`
--

CREATE TABLE `ext_compartilha` (
  `id_comp` int(10) NOT NULL,
  `id_post` int(10) NOT NULL,
  `id_pagina` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ext_compartilha`
--

INSERT INTO `ext_compartilha` (`id_comp`, `id_post`, `id_pagina`) VALUES
(1, 42, 8),
(2, 43, 10),
(3, 42, 10),
(4, 43, 8),
(5, 50, 9),
(6, 50, 10),
(7, 50, 8),
(8, 51, 9),
(9, 51, 10),
(10, 51, 8),
(11, 52, 9),
(12, 52, 10),
(13, 52, 8),
(14, 53, 9),
(15, 53, 10),
(16, 53, 8),
(17, 54, 9),
(18, 54, 10),
(19, 54, 8),
(20, 55, 9),
(21, 55, 10),
(22, 56, 9),
(23, 57, 9),
(24, 57, 10),
(25, 57, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ext_ecom`
--

CREATE TABLE `ext_ecom` (
  `idCom` int(10) NOT NULL,
  `nomeCom` varchar(255) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `idAlbum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ext_ecom`
--

INSERT INTO `ext_ecom` (`idCom`, `nomeCom`, `idUsuario`, `idAlbum`) VALUES
(1, '0', 12, 31),
(2, '&colcci', 12, 32),
(3, '&nomeMarca', 12, 33),
(4, '&nome', 12, 33),
(5, '&nomeMarca', 12, 34),
(6, '&nome', 12, 34),
(7, '&nomeMarca', 12, 35),
(8, '&nome', 12, 35),
(9, '&nomeMarca', 12, 36),
(10, '&nome', 12, 36),
(11, '&nomeMarca', 12, 37),
(12, '&nome', 12, 37),
(13, '&planet_', 12, 39),
(14, '&hot_', 12, 39),
(15, '&CASSED', 12, 40),
(16, '&C', 12, 40),
(17, '&A', 12, 40),
(18, '&A', 12, 40),
(19, '&', 12, 40),
(20, '&NOME_DA_MARCA', 12, 41),
(21, '&NOME_DA_MARCA', 12, 42),
(22, '&nome_Marca', 12, 57);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ext_fans`
--

CREATE TABLE `ext_fans` (
  `idFan` int(20) NOT NULL,
  `idUsuario` int(20) NOT NULL,
  `arrobaUsuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idPagina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pgResposta` int(2) NOT NULL,
  `fanResposta` int(1) NOT NULL,
  `dataSolicita` date NOT NULL,
  `dataResposta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ext_fans`
--

INSERT INTO `ext_fans` (`idFan`, `idUsuario`, `arrobaUsuario`, `idPagina`, `pgResposta`, `fanResposta`, `dataSolicita`, `dataResposta`) VALUES
(1, 2, '@teste', '8', 8, 0, '0000-00-00', '0000-00-00'),
(2, 14, '@nickName', '9', 0, 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ext_marca`
--

CREATE TABLE `ext_marca` (
  `idMarca` int(20) NOT NULL,
  `usuMarcado` varchar(255) CHARACTER SET latin1 NOT NULL,
  `idUsuario` int(20) NOT NULL,
  `idAlbum` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Extraindo dados da tabela `ext_marca`
--

INSERT INTO `ext_marca` (`idMarca`, `usuMarcado`, `idUsuario`, `idAlbum`) VALUES
(1, '@aindaSemUsuario', 12, 30),
(2, '@semUsuario', 12, 31),
(3, '@nome', 12, 32),
(4, '@semUsuario', 12, 33),
(5, '@usuario', 12, 39),
(6, '@user', 12, 39),
(7, '@usuario', 12, 57),
(8, '@outroUser', 12, 57);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ext_mloja`
--

CREATE TABLE `ext_mloja` (
  `idLoja` int(11) NOT NULL,
  `nomeLoja` varchar(255) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idAlbum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ext_mloja`
--

INSERT INTO `ext_mloja` (`idLoja`, `nomeLoja`, `idUsuario`, `idAlbum`) VALUES
(1, '$nomeLoja', 12, 31),
(2, '$didaFashion', 12, 32),
(3, '$nomeLoja', 12, 33),
(4, '$nomeLoja', 12, 34),
(5, '$nomeLoja', 12, 35),
(6, '$nomeLoja', 12, 36),
(7, '$nomeLoja', 12, 37),
(8, '$campShop.', 12, 39),
(9, '$C_A', 12, 40),
(10, '$_', 12, 40),
(11, '$LOJA_PRIMEIRA', 12, 41),
(12, '$LOJA_PRIMEIRA', 12, 42),
(13, '$nomeLoja', 12, 57);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ext_paginas`
--

CREATE TABLE `ext_paginas` (
  `idPagina` int(20) NOT NULL,
  `dataPagina` date DEFAULT NULL,
  `torrePagina` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idUsuario` int(20) NOT NULL,
  `idUsuario2` int(20) DEFAULT NULL,
  `idUsuario3` int(20) DEFAULT NULL,
  `nomePagina` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descPagina` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estadoPagina` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidadePagina` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailPagina` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipoPagina` int(2) NOT NULL,
  `pgCapa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ext_paginas`
--

INSERT INTO `ext_paginas` (`idPagina`, `dataPagina`, `torrePagina`, `idUsuario`, `idUsuario2`, `idUsuario3`, `nomePagina`, `descPagina`, `estadoPagina`, `cidadePagina`, `emailPagina`, `tipoPagina`, `pgCapa`) VALUES
(8, '2018-06-25', NULL, 12, NULL, NULL, 'minhapagina', 'apresentação da página preciso acertar o problema de acentuação cs', 'GO', 'Itumbiara', 'luishenrique.pian@gmail.com', 0, '201808021950125b638aa43b71c.jpeg'),
(9, '2018-06-25', NULL, 14, 12, NULL, 'Meu_blog', 'Meu blog de moda', 'SP', 'Americana', 'Email@email.com ', 0, 'album.jpg'),
(10, '2018-08-01', NULL, 13, NULL, 12, 'Minha_loja', 'Apresento minha loja', 'SP', 'Campinas', 'Luishenrique.pian@gmail ', 0, 'album.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ext_permite`
--

CREATE TABLE `ext_permite` (
  `idPermite` int(10) NOT NULL,
  `idPagina` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `pm_post` int(1) NOT NULL,
  `pm_editar` int(1) NOT NULL,
  `pm_excluir` int(1) NOT NULL,
  `pm_cadastro` int(1) NOT NULL,
  `pm_financeiro` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ext_permite`
--

INSERT INTO `ext_permite` (`idPermite`, `idPagina`, `idUsuario`, `pm_post`, `pm_editar`, `pm_excluir`, `pm_cadastro`, `pm_financeiro`) VALUES
(1, 8, 12, 1, 1, 1, 1, 1),
(2, 8, 2, 1, 1, 0, 1, 0),
(13, 9, 14, 1, 1, 0, 1, 1),
(14, 10, 13, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ext_pg_tr`
--

CREATE TABLE `ext_pg_tr` (
  `idPgTorre` int(10) NOT NULL,
  `idPagina` int(10) NOT NULL,
  `idTorre` int(10) NOT NULL,
  `pgAutorizado` int(1) NOT NULL,
  `pgNegado` int(1) NOT NULL,
  `pgSaiu` int(1) NOT NULL,
  `pgAtivar` int(1) NOT NULL,
  `pgSolicita` int(2) NOT NULL,
  `pgData` int(2) NOT NULL,
  `pgPermite` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ext_pg_tr`
--

INSERT INTO `ext_pg_tr` (`idPgTorre`, `idPagina`, `idTorre`, `pgAutorizado`, `pgNegado`, `pgSaiu`, `pgAtivar`, `pgSolicita`, `pgData`, `pgPermite`) VALUES
(1, 8, 1, 1, 0, 0, 1, 0, 20180625, 0),
(2, 9, 3, 1, 0, 0, 0, 0, 20180625, 0),
(3, 10, 2, 1, 0, 0, 0, 0, 20180626, 0),
(7, 10, 1, 1, 0, 0, 0, 0, 20180626, 0),
(8, 10, 3, 1, 0, 0, 0, 0, 20180626, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ext_post`
--

CREATE TABLE `ext_post` (
  `id_post` int(10) NOT NULL,
  `id_postagem` int(10) NOT NULL,
  `id_torre` int(10) NOT NULL,
  `post_data` date NOT NULL,
  `post_liberado` int(1) NOT NULL,
  `post_denuncia` int(1) NOT NULL,
  `post_excluido` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ext_post`
--

INSERT INTO `ext_post` (`id_post`, `id_postagem`, `id_torre`, `post_data`, `post_liberado`, `post_denuncia`, `post_excluido`) VALUES
(8, 12, 2, '0000-00-00', 0, 0, 0),
(13, 42, 2, '0000-00-00', 0, 0, 0),
(14, 42, 1, '0000-00-00', 0, 0, 0),
(15, 42, 3, '0000-00-00', 0, 0, 0),
(16, 42, 1, '0000-00-00', 0, 0, 0),
(17, 43, 3, '0000-00-00', 0, 0, 0),
(18, 43, 2, '0000-00-00', 0, 0, 0),
(19, 43, 1, '0000-00-00', 0, 0, 0),
(20, 43, 3, '0000-00-00', 0, 0, 0),
(21, 43, 1, '0000-00-00', 0, 0, 0),
(22, 43, 1, '2018-08-14', 0, 0, 0),
(23, 46, 3, '0000-00-00', 0, 0, 0),
(24, 46, 2, '0000-00-00', 0, 0, 0),
(25, 46, 1, '0000-00-00', 0, 0, 0),
(26, 46, 3, '0000-00-00', 0, 0, 0),
(27, 46, 1, '0000-00-00', 0, 0, 0),
(28, 47, 3, '0000-00-00', 0, 0, 0),
(29, 47, 2, '0000-00-00', 0, 0, 0),
(30, 47, 1, '0000-00-00', 0, 0, 0),
(31, 47, 3, '0000-00-00', 0, 0, 0),
(32, 47, 1, '0000-00-00', 0, 0, 0),
(33, 48, 3, '0000-00-00', 0, 0, 0),
(34, 48, 2, '0000-00-00', 0, 0, 0),
(35, 48, 1, '0000-00-00', 0, 0, 0),
(36, 48, 3, '0000-00-00', 0, 0, 0),
(37, 48, 1, '0000-00-00', 0, 0, 0),
(38, 49, 3, '0000-00-00', 0, 0, 0),
(39, 49, 2, '0000-00-00', 0, 0, 0),
(40, 49, 1, '0000-00-00', 0, 0, 0),
(41, 49, 3, '0000-00-00', 0, 0, 0),
(42, 49, 1, '0000-00-00', 0, 0, 0),
(43, 50, 3, '0000-00-00', 0, 0, 0),
(44, 50, 2, '0000-00-00', 0, 0, 0),
(45, 50, 1, '0000-00-00', 0, 0, 0),
(46, 50, 3, '0000-00-00', 0, 0, 0),
(47, 50, 1, '0000-00-00', 0, 0, 0),
(48, 51, 3, '0000-00-00', 0, 0, 0),
(49, 51, 2, '0000-00-00', 0, 0, 0),
(50, 51, 1, '0000-00-00', 0, 0, 0),
(51, 51, 3, '0000-00-00', 0, 0, 0),
(52, 51, 1, '0000-00-00', 0, 0, 0),
(53, 52, 3, '0000-00-00', 0, 0, 0),
(54, 52, 2, '0000-00-00', 0, 0, 0),
(55, 52, 1, '0000-00-00', 0, 0, 0),
(56, 52, 3, '0000-00-00', 0, 0, 0),
(57, 52, 1, '0000-00-00', 0, 0, 0),
(58, 53, 3, '0000-00-00', 0, 0, 0),
(59, 53, 2, '0000-00-00', 0, 0, 0),
(60, 53, 1, '0000-00-00', 0, 0, 0),
(61, 53, 3, '0000-00-00', 0, 0, 0),
(62, 53, 1, '0000-00-00', 0, 0, 0),
(63, 54, 3, '0000-00-00', 0, 0, 0),
(64, 54, 2, '0000-00-00', 0, 0, 0),
(65, 54, 1, '0000-00-00', 0, 0, 0),
(66, 54, 3, '0000-00-00', 0, 0, 0),
(67, 54, 1, '0000-00-00', 0, 0, 0),
(68, 55, 3, '0000-00-00', 0, 0, 0),
(69, 55, 2, '0000-00-00', 0, 0, 0),
(70, 55, 1, '0000-00-00', 0, 0, 0),
(71, 55, 3, '0000-00-00', 0, 0, 0),
(72, 56, 3, '0000-00-00', 0, 0, 0),
(73, 57, 3, '0000-00-00', 0, 0, 0),
(74, 57, 2, '0000-00-00', 0, 0, 0),
(75, 57, 1, '0000-00-00', 0, 0, 0),
(76, 57, 3, '0000-00-00', 0, 0, 0),
(77, 57, 1, '0000-00-00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ext_publicidade`
--

CREATE TABLE `ext_publicidade` (
  `idPub` int(11) NOT NULL,
  `nomePub` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imgPub` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dataPub` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ext_tag`
--

CREATE TABLE `ext_tag` (
  `idTag` int(20) NOT NULL,
  `nomeTag` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  `idAlbum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ext_tag`
--

INSERT INTO `ext_tag` (`idTag`, `nomeTag`, `idUsuario`, `idAlbum`) VALUES
(40, '#testecompleto', 3, 307),
(41, '#paginaDe_empresa.', 3, 307),
(42, '#minhapagina', 3, 308),
(43, '#falo', 3, 308),
(44, '#muito', 3, 308),
(45, '#borala', 3, 308),
(46, '#irados', 3, 311),
(47, '#meuscarros', 3, 311),
(48, '#vaiqevai', 3, 311),
(49, '#MEU', 3, 312),
(50, '#teste', 10, 316),
(51, '#terceiro', 12, 2),
(52, '#teste', 13, 21),
(53, '#meuscarros', 13, 21),
(54, '#pagina', 13, 22),
(55, '#tamanho', 13, 23),
(56, '#esse', 13, 24),
(57, '#testeseSALVA', 12, 28),
(58, '#TEMQUESALVAR', 12, 28),
(59, '#MEU', 12, 29),
(60, '#teste', 12, 29),
(61, '#TEMQUESALVAR', 12, 29),
(62, '#tentativaUM', 12, 30),
(63, '#marcandoAlgo', 12, 31),
(64, '#balada', 12, 32),
(65, '#enois', 12, 32),
(66, '#marcandoAlgo', 12, 33),
(67, '#calcinha', 12, 39),
(68, '#mulherlinda', 12, 39),
(69, '#LINDASEXY', 12, 40),
(70, '#VAI', 12, 40),
(71, '#PUST', 12, 40),
(72, '#POST', 12, 41),
(73, '#minhapagina', 12, 41),
(74, '#teste', 12, 41),
(75, '#POST', 12, 42),
(76, '#minhapagina', 12, 42),
(77, '#teste', 12, 42),
(78, '#marcando', 12, 57),
(79, '#tag', 12, 57);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ext_torre`
--

CREATE TABLE `ext_torre` (
  `idTorre` int(20) NOT NULL,
  `torreSistema` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idUsuario` int(20) DEFAULT NULL,
  `nomeTorre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descTorre` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `torreImg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `torreData` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidadeTorre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estadoTorre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipoTorre` int(2) NOT NULL,
  `publicTorre` int(2) NOT NULL,
  `permiteTorre` int(2) NOT NULL,
  `setorTorre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ext_torre`
--

INSERT INTO `ext_torre` (`idTorre`, `torreSistema`, `idUsuario`, `nomeTorre`, `descTorre`, `torreImg`, `torreData`, `cidadeTorre`, `estadoTorre`, `tipoTorre`, `publicTorre`, `permiteTorre`, `setorTorre`) VALUES
(1, 'sim', NULL, 'Extilos', 'Símbolos monetários são sinais usados para representação de moeda, e variam de um país para o outro. Podem ser simples (um só caractere) ou compostos (dois ou mais caracteres).', NULL, NULL, 'Campinas', 'SP', 0, 0, 0, ''),
(2, 'sim', NULL, 'Rosa', 'moderno', NULL, NULL, 'Hortolandia', 'SP', 0, 0, 0, ''),
(3, 'sim', NULL, 'Azul', 'moderno', NULL, NULL, 'Sumare', 'SP', 0, 1, 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ext_usuarios`
--

CREATE TABLE `ext_usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(255) CHARACTER SET latin1 NOT NULL,
  `emailUsuario` varchar(255) CHARACTER SET latin1 NOT NULL,
  `senhaUsuario` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ip1` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `ip2` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `ip3` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `ip4` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `data` date NOT NULL,
  `captcha` varchar(20) CHARACTER SET latin1 NOT NULL,
  `usuMarca` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `usuFoto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuEstado` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuCidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuPrefere` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primeiroAcesso` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ext_usuarios`
--

INSERT INTO `ext_usuarios` (`idUsuario`, `nomeUsuario`, `emailUsuario`, `senhaUsuario`, `ip1`, `ip2`, `ip3`, `ip4`, `data`, `captcha`, `usuMarca`, `usuFoto`, `usuEstado`, `usuCidade`, `usuPrefere`, `primeiroAcesso`) VALUES
(2, 'Luis Henrique', 'luishenque@gmail', '202cb962ac59075b964b07152d234b70', NULL, NULL, '::1', NULL, '2018-06-25', '6ef56a39', '@teste', NULL, 'SP', 'Campinas', NULL, 0),
(12, 'Luis', 'luishenque@', '202cb962ac59075b964b07152d234b70', NULL, NULL, '::1', NULL, '2018-06-25', '6ef56a39', '@luis', 'album.jpg', 'SP', 'Campinas', NULL, 0),
(13, 'Luis Henrique Lima Pian', 'Bem.facil@outlook.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, '192.168.15.11', NULL, '2018-06-25', 'A1f8d20a', NULL, NULL, 'SP', 'Campinas', NULL, 0),
(15, 'Henrique', 'meuemail@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, '::1', NULL, '2018-06-28', '3923a2e8', '@nick_name(3923a2e8)', NULL, 'SP', 'Paulinia', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ext_usu_prefere`
--

CREATE TABLE `ext_usu_prefere` (
  `prefGeral` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `img_usuarios`
--

CREATE TABLE `img_usuarios` (
  `idImg` int(20) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `arrobaUsuario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuEstilo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `usuTitulo` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `usuDesc` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `usuMarca` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `img` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `img1` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `img2` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `img3` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `img4` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `publicarTorre` int(11) DEFAULT NULL,
  `nomeTorre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `precPro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descPro` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `formaPro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `infoPro` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `img_usuarios`
--

INSERT INTO `img_usuarios` (`idImg`, `idUsuario`, `arrobaUsuario`, `usuEstilo`, `usuTitulo`, `usuDesc`, `usuMarca`, `img`, `img1`, `img2`, `img3`, `img4`, `publicarTorre`, `nomeTorre`, `precPro`, `descPro`, `formaPro`, `infoPro`) VALUES
(41, 12, NULL, '9', 'POST_NOVO', '#POST #minhapagina #teste ESSA I A MINHA DESCRI_ÃO', 'CALCINHA_ &NOME_DA_MARCA $LOJA_PRIMEIRA ', '201808131439235b71c24bc224a.jpeg', '201808131439245b71c24c56f93.jpeg', '201808131439245b71c24cae617.jpeg', NULL, NULL, 1, 'Campinas', '', '', '', ''),
(42, 12, NULL, '9', 'POST_NOVO', '#POST #minhapagina #teste ESSA I A MINHA DESCRI_ÃO', 'CALCINHA_ &NOME_DA_MARCA $LOJA_PRIMEIRA ', '201808131441475b71c2dbf346a.jpeg', '201808131441485b71c2dc610a9.jpeg', '201808131441485b71c2dcbe4ef.jpeg', '201808131441495b71c2dd3af79.jpeg', NULL, 1, 'Campinas', '', '', '', ''),
(43, 12, NULL, '9', 'Quarto', 'jhgjkjhk', 'jgjkbmnkj', '201808131527435b71cd9f3347f.jpeg', '201808131527435b71cd9f9d7d0.jpeg', NULL, NULL, NULL, 1, 'Campinas', '', '', '', ''),
(44, 12, NULL, '9', 'SETIMO', 'asd', 'sdf', '201808141018425b72d6b276be8.png', NULL, NULL, NULL, NULL, 1, 'Campinas', '', '', '', ''),
(45, 12, NULL, '9', 'Terceiro', 'sadasd', 'asdas', '201808141019255b72d6dd94e33.jpeg', NULL, NULL, NULL, NULL, 1, 'Campinas', '', '', '', ''),
(46, 12, NULL, '8', 'sexto', 'sdas', 'asd', NULL, NULL, NULL, NULL, NULL, 1, 'Campinas', '', '', '', ''),
(47, 12, NULL, '8', 'Primeiro_', 'fhsdfsdf', 'sdfsdfsef', '201808141022255b72d791d23e0.png', NULL, NULL, NULL, NULL, 1, 'Campinas', '', '', '', ''),
(48, 12, NULL, '9', 'SETIMO', 'sdfsd', 'sdfsdf', '201808141036345b72dae28b160.jpeg', NULL, NULL, NULL, NULL, 1, 'Campinas', '', '', '', ''),
(49, 12, NULL, '11', 'Primeiro_Post', 'asdas', 'asdasd', '201808141038425b72db62a161e.png', NULL, NULL, NULL, NULL, 1, 'Campinas', '', '', '', ''),
(50, 12, NULL, '11', 'Primeiro_Post', 'asdas', 'asdasd', '201808141043375b72dc89bc355.png', NULL, NULL, NULL, NULL, 1, 'Campinas', '', '', '', ''),
(51, 12, NULL, '11', 'Quinto', 'azsdasd', 'zdfsadf', '201808141138465b72e97694f6c.png', NULL, NULL, NULL, NULL, 1, 'Campinas', '', '', '', ''),
(52, 12, NULL, '9', 'Terceiro', 'sgfsdf', 'sdgfsdf', NULL, NULL, NULL, NULL, NULL, 1, 'Campinas', '', '', '', ''),
(53, 12, NULL, '11', 'sexto', 'dfgdf', 'dfgd', '201808141140395b72e9e7a56f7.png', NULL, NULL, NULL, NULL, 1, 'Campinas', '', '', '', ''),
(54, 12, NULL, '8', 'sdfsfd', 'abre #marque @usuario', 'sdfsdfsdf', '201808141206255b72eff148074.png', NULL, NULL, NULL, NULL, 0, NULL, '', '', '', ''),
(55, 12, NULL, '11', 'sd', 'sd', 'sd', '201808141406395b730c1fbe1b0.jpeg', NULL, NULL, NULL, NULL, 1, NULL, '', '', '', ''),
(56, 12, NULL, '11', 'Quinto', 'abre #marque @usuario', 'sdfgsdf', '201808141407145b730c4206fd7.jpeg', NULL, NULL, NULL, NULL, 1, NULL, '', '', '', ''),
(57, 12, NULL, '8', 'nome_do_post', '#marcando #tag @usuario @outroUser', '&nome_Marca $nomeLoja', '201808151124315b74379fddfe8.jpeg', NULL, NULL, NULL, NULL, 1, 'Campinas', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album_torre`
--
ALTER TABLE `album_torre`
  ADD PRIMARY KEY (`idAlbum`);

--
-- Indexes for table `album_usuarios`
--
ALTER TABLE `album_usuarios`
  ADD PRIMARY KEY (`idAlbum`);

--
-- Indexes for table `ext_amigos`
--
ALTER TABLE `ext_amigos`
  ADD PRIMARY KEY (`idAmigo`);

--
-- Indexes for table `ext_compartilha`
--
ALTER TABLE `ext_compartilha`
  ADD PRIMARY KEY (`id_comp`);

--
-- Indexes for table `ext_ecom`
--
ALTER TABLE `ext_ecom`
  ADD PRIMARY KEY (`idCom`);

--
-- Indexes for table `ext_fans`
--
ALTER TABLE `ext_fans`
  ADD PRIMARY KEY (`idFan`);

--
-- Indexes for table `ext_marca`
--
ALTER TABLE `ext_marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indexes for table `ext_mloja`
--
ALTER TABLE `ext_mloja`
  ADD PRIMARY KEY (`idLoja`);

--
-- Indexes for table `ext_paginas`
--
ALTER TABLE `ext_paginas`
  ADD PRIMARY KEY (`idPagina`);

--
-- Indexes for table `ext_permite`
--
ALTER TABLE `ext_permite`
  ADD PRIMARY KEY (`idPermite`);

--
-- Indexes for table `ext_pg_tr`
--
ALTER TABLE `ext_pg_tr`
  ADD PRIMARY KEY (`idPgTorre`);

--
-- Indexes for table `ext_post`
--
ALTER TABLE `ext_post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `ext_publicidade`
--
ALTER TABLE `ext_publicidade`
  ADD PRIMARY KEY (`idPub`);

--
-- Indexes for table `ext_tag`
--
ALTER TABLE `ext_tag`
  ADD PRIMARY KEY (`idTag`);

--
-- Indexes for table `ext_torre`
--
ALTER TABLE `ext_torre`
  ADD PRIMARY KEY (`idTorre`);

--
-- Indexes for table `ext_usuarios`
--
ALTER TABLE `ext_usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indexes for table `img_usuarios`
--
ALTER TABLE `img_usuarios`
  ADD PRIMARY KEY (`idImg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album_torre`
--
ALTER TABLE `album_torre`
  MODIFY `idAlbum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `album_usuarios`
--
ALTER TABLE `album_usuarios`
  MODIFY `idAlbum` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ext_amigos`
--
ALTER TABLE `ext_amigos`
  MODIFY `idAmigo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ext_compartilha`
--
ALTER TABLE `ext_compartilha`
  MODIFY `id_comp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `ext_ecom`
--
ALTER TABLE `ext_ecom`
  MODIFY `idCom` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ext_fans`
--
ALTER TABLE `ext_fans`
  MODIFY `idFan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ext_marca`
--
ALTER TABLE `ext_marca`
  MODIFY `idMarca` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ext_mloja`
--
ALTER TABLE `ext_mloja`
  MODIFY `idLoja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ext_paginas`
--
ALTER TABLE `ext_paginas`
  MODIFY `idPagina` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ext_permite`
--
ALTER TABLE `ext_permite`
  MODIFY `idPermite` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ext_pg_tr`
--
ALTER TABLE `ext_pg_tr`
  MODIFY `idPgTorre` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ext_post`
--
ALTER TABLE `ext_post`
  MODIFY `id_post` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `ext_publicidade`
--
ALTER TABLE `ext_publicidade`
  MODIFY `idPub` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ext_tag`
--
ALTER TABLE `ext_tag`
  MODIFY `idTag` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `ext_torre`
--
ALTER TABLE `ext_torre`
  MODIFY `idTorre` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ext_usuarios`
--
ALTER TABLE `ext_usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `img_usuarios`
--
ALTER TABLE `img_usuarios`
  MODIFY `idImg` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
