-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 29-Out-2020 às 13:01
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mod_ead`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Flavio', 'flavio@gmail.com', '4297f44b13955235245b2497399d7a93');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_curso`
--

CREATE TABLE `aluno_curso` (
  `id` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno_curso`
--

INSERT INTO `aluno_curso` (`id`, `id_curso`, `id_aluno`) VALUES
(1, 1, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL,
  `arquivo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pdf` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `id_aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE `atividades` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `id_aula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_aluno`
--

CREATE TABLE `atividade_aluno` (
  `id` int(11) NOT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `id_aula` int(11) DEFAULT NULL,
  `url_video_aluno` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `avaliacao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `url_video_observacao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE `aulas` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL DEFAULT '',
  `nome_aula` varchar(255) DEFAULT NULL,
  `descricao` text,
  `imagem` text,
  `url_video` text,
  `url_vimeo` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `video_mp4` text,
  `arquivo` text,
  `gif` text,
  `imagem_gif` text,
  `midia` varchar(45) DEFAULT NULL,
  `atividade` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`id`, `id_modulo`, `id_curso`, `ordem`, `tipo`, `nome_aula`, `descricao`, `imagem`, `url_video`, `url_vimeo`, `video_mp4`, `arquivo`, `gif`, `imagem_gif`, `midia`, `atividade`) VALUES
(1, 1, 1, 1, 'poll', 'Questão 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, 1, 1, 2, 'poll', 'Questão em Vídeo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 1, 1, 5, 'aula', 'teste  teste test', NULL, '09ec9214115c6d736f5d709db7769217.jpg', NULL, NULL, 'c3ea9b444f09f0dc96281edb6d3ce9de.mp4', NULL, 'c414657bc3f0b74b345fcdedaac89bb8.gif', 'd3e32bfec85f24f6afb09044ee0f95d4.png', 'gif', 1),
(4, 1, 1, 3, 'aula', 'teste', NULL, NULL, NULL, NULL, NULL, NULL, '2579b5c2228853d969346c871d8e454e.gif', 'f2a46a4ac25a41bf96b92e89adc2913c.png', 'gif', 0),
(5, 1, 1, 4, 'aula', 'teste 2', NULL, NULL, NULL, NULL, NULL, NULL, '50e2804021b66e00b00c3d0acc0b88cd.gif', '3319447b6fa2cdfe5f46078a7abd29ba.png', 'gif', 0),
(6, 2, 1, 2, 'aula', 'teste teste ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, 2, 1, 3, 'aula', 'teste 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, 2, 1, 1, 'aula', 'teste teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, 2, 1, 4, 'aula', 'teste teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(10, 4, 1, 1, 'aula', 'teste teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(11, 4, 1, 2, 'aula', 'teste teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` text NOT NULL,
  `url` text,
  `status` int(1) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `id_nivel` int(11) DEFAULT NULL,
  `view` decimal(10,0) DEFAULT NULL,
  `duracao` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `descricao`, `imagem`, `url`, `status`, `ordem`, `id_nivel`, `view`, `duracao`) VALUES
(1, 'Libras I', 'Teste teste', '', 'https://www.youtube.com/embed/32Dq2x3yaq4', 1, 1, 1, NULL, NULL),
(2, 'Libras II', '', '', NULL, 1, 2, 2, NULL, NULL),
(3, 'Libras III', '', '', NULL, 1, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `duvidas`
--

CREATE TABLE `duvidas` (
  `id` int(11) UNSIGNED NOT NULL,
  `data_duvida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `respondida` tinyint(1) NOT NULL,
  `duvida` text,
  `id_aluno` int(11) DEFAULT NULL,
  `id_aula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicios`
--

CREATE TABLE `exercicios` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_aula` int(11) NOT NULL,
  `pergunta` varchar(100) COLLATE utf8_bin DEFAULT '',
  `opcao1` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `opcao2` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `opcao3` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `opcao4` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `resposta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) UNSIGNED NOT NULL,
  `data_viewed` datetime DEFAULT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `id_aula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `data_viewed`, `id_aluno`, `id_aula`) VALUES
(8, '2020-08-18 20:54:40', 1, 4),
(9, '2020-08-18 20:58:38', 1, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mais_videos`
--

CREATE TABLE `mais_videos` (
  `mais_video_id` int(10) UNSIGNED NOT NULL,
  `aula_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `video_nome` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_descricao` text COLLATE utf8mb4_unicode_ci,
  `video_url` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mais_video_ordem` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulos`
--

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `imagem` text,
  `url_video` text,
  `arquivo` text,
  `midia` varchar(45) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modulos`
--

INSERT INTO `modulos` (`id`, `nome`, `id_curso`, `imagem`, `url_video`, `arquivo`, `midia`, `ordem`) VALUES
(1, 'Módulo 1', 1, NULL, NULL, NULL, NULL, 1),
(2, 'Módulo 2', 1, NULL, NULL, NULL, NULL, 2),
(3, 'Módulo 3', 1, NULL, NULL, NULL, NULL, 4),
(4, 'Módulo 4', 1, NULL, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis`
--

CREATE TABLE `niveis` (
  `id_nivel` int(11) UNSIGNED NOT NULL,
  `nivel` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagina_especifica`
--

CREATE TABLE `pagina_especifica` (
  `id` int(11) NOT NULL,
  `id_aula` int(11) DEFAULT NULL,
  `titulo_pagina` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagina` text COLLATE utf8mb4_unicode_ci,
  `estilo` text COLLATE utf8mb4_unicode_ci,
  `script` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pagina_especifica`
--

INSERT INTO `pagina_especifica` (`id`, `id_aula`, `titulo_pagina`, `pagina`, `estilo`, `script`, `url`) VALUES
(1, 4, 'Teste 3', '	<div class=\"row\">\n	    <div id=\"timeline\">\n			<div class=\"row timeline-movement timeline-movement-top\">\n				<div class=\"timeline-badge timeline-future-movement\">\n						<p>2018</p>\n				</div>\n			</div>\n			<div class=\"row timeline-movement\">\n				<div class=\"timeline-badge center-left\">\n					\n				</div>\n				<div class=\"col-sm-6  timeline-item\">\n					<div class=\"row\">\n						<div class=\"col-sm-11\">\n							<div class=\"timeline-panel credits  anim animate fadeInLeft\">\n								<ul class=\"timeline-panel-ul\">\n									<div class=\"lefting-wrap\">\n										<li class=\"img-wraping\"><a href=\"#\"><img src=\"http://via.placeholder.com/250/000000\" class=\"img-responsive\" alt=\"user-image\" /></a></li>\n									</div>\n									<div class=\"righting-wrap\">\n										<li><a href=\"#\" class=\"importo\">Mussum ipsum cacilds</a></li>\n										<li><span class=\"causale\" style=\"color:#000; font-weight: 600;\">Developer </span> </li>\n										<li><span class=\"causale\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </span> </li>\n										<li><p><small class=\"text-muted\"><i class=\"glyphicon glyphicon-time\"></i> 13/01/2018, 13:05\"</small></p> </li>\n									</div>\n									<div class=\"clear\"></div>\n								</ul>\n							</div>\n\n						</div>\n					</div>\n				</div>\n			</div>\n\n			<div class=\"row timeline-movement\">\n				<div class=\"timeline-badge center-right\">\n				\n				</div>\n				<div class=\"offset-sm-6 col-sm-6  timeline-item\">\n					<div class=\"row\">\n						<div class=\"offset-sm-1 col-sm-11\">\n							<div class=\"timeline-panel debits  anim animate  fadeInRight\">\n								<ul class=\"timeline-panel-ul\">\n									<div class=\"lefting-wrap\">\n										<li class=\"img-wraping\"><a href=\"#\"><img src=\"http://via.placeholder.com/250/000000\" class=\"img-responsive\" alt=\"user-image\" /></a></li>\n									</div>\n									<div class=\"righting-wrap\">\n										<li><a href=\"#\" class=\"importo\">Mussum ipsum cacilds</a></li>\n										<li><span class=\"causale\" style=\"color:#000; font-weight: 600;\">Web Designer </span> </li>\n										<li><span class=\"causale\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </span> </li>\n										<li><p><small class=\"text-muted\"><i class=\"glyphicon glyphicon-time\"></i> 12/01/2018, 13:05\"</small></p> </li>\n									</div>\n									<div class=\"clear\"></div>\n								</ul>\n							</div>\n\n						</div>\n					</div>\n				</div>\n			</div>\n\n			<div class=\"row timeline-movement\">\n				<div class=\"timeline-badge center-left\">\n					\n				</div>\n				<div class=\"col-sm-6  timeline-item\">\n					<div class=\"row\">\n						<div class=\"col-sm-11\">\n							<div class=\"timeline-panel credits  anim animate  fadeInLeft\">\n								<ul class=\"timeline-panel-ul\">\n									<div class=\"lefting-wrap\">\n										<li class=\"img-wraping\"><a href=\"#\"><img src=\"http://via.placeholder.com/250/000000\" class=\"img-responsive\" alt=\"user-image\" /></a></li>\n									</div>\n									<div class=\"righting-wrap\">\n										<li><a href=\"#\" class=\"importo\">Mussum ipsum cacilds</a></li>\n										<li><span class=\"causale\" style=\"color:#000; font-weight: 600;\">Engineer </span> </li>\n										<li><span class=\"causale\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </span> </li>\n										<li><p><small class=\"text-muted\"><i class=\"glyphicon glyphicon-time\"></i> 11/01/2018, 13:05\"</small></p> </li>\n									</div>\n									<div class=\"clear\"></div>\n								</ul>\n							</div>\n\n						</div>\n					</div>\n				</div>\n			</div>\n			\n			<div class=\"row timeline-movement timeline-movement-top\">\n				<div class=\"timeline-badge timeline-future-movement\">\n						<p>2017</p>\n				</div>\n			</div>\n			\n			\n			<div class=\"row timeline-movement\">\n				<div class=\"timeline-badge center-right\">\n				\n				</div>\n				<div class=\"offset-sm-6 col-sm-6  timeline-item\">\n					<div class=\"row\">\n						<div class=\"offset-sm-1 col-sm-11\">\n							<div class=\"timeline-panel debits  anim animate  fadeInRight\">\n								<ul class=\"timeline-panel-ul\">\n									<div class=\"lefting-wrap\">\n										<li class=\"img-wraping\"><a href=\"#\"><img src=\"http://via.placeholder.com/250/000000\" class=\"img-responsive\" alt=\"user-image\" /></a></li>\n									</div>\n									<div class=\"righting-wrap\">\n										<li><a href=\"#\" class=\"importo\">Mussum ipsum cacilds</a></li>\n										<li><span class=\"causale\" style=\"color:#000; font-weight: 600;\">Web Designer </span> </li>\n										<li><span class=\"causale\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </span> </li>\n										<li><p><small class=\"text-muted\"><i class=\"glyphicon glyphicon-time\"></i> 12/01/2018, 13:05\"</small></p> </li>\n									</div>\n									<div class=\"clear\"></div>\n								</ul>\n							</div>\n\n						</div>\n					</div>\n				</div>\n			</div>\n			\n			\n			<div class=\"row timeline-movement\">\n				<div class=\"timeline-badge center-left\">\n					\n				</div>\n				<div class=\"col-sm-6  timeline-item\">\n					<div class=\"row\">\n						<div class=\"col-sm-11\">\n							<div class=\"timeline-panel credits  anim animate  fadeInLeft\">\n								<ul class=\"timeline-panel-ul\">\n									<div class=\"lefting-wrap\">\n										<li class=\"img-wraping\"><a href=\"#\"><img src=\"http://via.placeholder.com/250/000000\" class=\"img-responsive\" alt=\"user-image\" /></a></li>\n									</div>\n									<div class=\"righting-wrap\">\n										<li><a href=\"#\" class=\"importo\">Mussum ipsum cacilds</a></li>\n										<li><span class=\"causale\" style=\"color:#000; font-weight: 600;\">Engineer </span> </li>\n										<li><span class=\"causale\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </span> </li>\n										<li><p><small class=\"text-muted\"><i class=\"glyphicon glyphicon-time\"></i> 11/01/2018, 13:05\"</small></p> </li>\n									</div>\n									<div class=\"clear\"></div>\n								</ul>\n							</div>\n						</div>\n					</div>\n				</div>\n			</div>\n		</div>\n	</div>', '/**************Animation File Start Here (animate.css)****************/\n/**************Copy and Save this in another file (animate.css)****************/\n\n/* Animation Delay */\n.d01{ animation-delay:0.1s; -moz-animation-delay:0.1s; -webkit-animation-delay:0.1s; }\n.d02{ animation-delay:0.2s; -moz-animation-delay:0.2s; -webkit-animation-delay:0.2s; }\n.d03{ animation-delay:0.3s; -moz-animation-delay:0.3s; -webkit-animation-delay:0.3s; }\n.d04{ animation-delay:0.4s; -moz-animation-delay:0.4s; -webkit-animation-delay:0.4s; }\n.d05{ animation-delay:0.5s; -moz-animation-delay:0.5s; -webkit-animation-delay:0.5s; }\n.d06{ animation-delay:0.6s; -moz-animation-delay:0.6s; -webkit-animation-delay:0.6s; }\n.d07{ animation-delay:0.7s; -moz-animation-delay:0.7s; -webkit-animation-delay:0.7s; }\n.d08{ animation-delay:0.8s; -moz-animation-delay:0.8s; -webkit-animation-delay:0.8s; }	\n.d09{ animation-delay:0.9s; -moz-animation-delay:0.9s; -webkit-animation-delay:0.9s; }\n.d10{ animation-delay:1s; -moz-animation-delay:1s; -webkit-animation-delay:1s; }\n.d11{ animation-delay:1.1s; -moz-animation-delay:1.1s; -webkit-animation-delay:1.1s; }\n.d12{ animation-delay:1.2s; -moz-animation-delay:1.2s; -webkit-animation-delay:1.2s; }\n.d13{ animation-delay:1.3s; -moz-animation-delay:1.3s; -webkit-animation-delay:1.3s; }\n.d14{ animation-delay:1.4s; -moz-animation-delay:1.4s; -webkit-animation-delay:1.4s; }\n.d15{ animation-delay:1.5s; -moz-animation-delay:1.5s; -webkit-animation-delay:1.5s; }\n.d16{ animation-delay:1.6s; -moz-animation-delay:1.6s; -webkit-animation-delay:1.6s; }\n.d17{ animation-delay:1.7s; -moz-animation-delay:1.7s; -webkit-animation-delay:1.7s; }\n.d18{ animation-delay:1.8s; -moz-animation-delay:1.8s; -webkit-animation-delay:1.8s; }\n.d19{ animation-delay:1.9s; -moz-animation-delay:1.9s; -webkit-animation-delay:1.9s; }\n.d21{ animation-delay:2.1s; -moz-animation-delay:2.1s; -webkit-animation-delay:2.1s; }\n.d26{ animation-delay:2.6s; -moz-animation-delay:2.6s; -webkit-animation-delay:2.6s; }\n.t14{\n	animation-duration: 1.4s !important;\n}\n.t24{\n	animation-duration: 2.4s !important;\n}\n/*Animation ends*/\n.anim,.anima {\n    opacity: 0;\n}\n.anim.animated,.anima.animated {\n    opacity: 1;\n}\n\n/***CSS Animations****/\n@charset \"UTF-8\";\n\n/*!\n * animate.css -http://daneden.me/animate\n * Version - 3.5.2\n * Licensed under the MIT license - http://opensource.org/licenses/MIT\n *\n * Copyright (c) 2017 Daniel Eden\n */\n\n\n.animated {\n  animation-duration: 1s;\n  animation-fill-mode: both;\n}\n\n.animated.infinite {\n  animation-iteration-count: infinite;\n}\n\n.animated.hinge {\n  animation-duration: 2s;\n}\n\n.animated.flipOutX,\n.animated.flipOutY,\n.animated.bounceIn,\n.animated.bounceOut {\n  animation-duration: .75s;\n}\n\n@keyframes bounce {\n  from, 20%, 53%, 80%, to {\n    animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);\n    transform: translate3d(0,0,0);\n  }\n\n  40%, 43% {\n    animation-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);\n    transform: translate3d(0, -30px, 0);\n  }\n\n  70% {\n    animation-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);\n    transform: translate3d(0, -15px, 0);\n  }\n\n  90% {\n    transform: translate3d(0,-4px,0);\n  }\n}\n\n.animated.bounce {\n  animation-name: bounce;\n  transform-origin: center bottom;\n}\n\n@keyframes flash {\n  from, 50%, to {\n    opacity: 1;\n  }\n\n  25%, 75% {\n    opacity: 0;\n  }\n}\n\n.animated.flash {\n  animation-name: flash;\n}\n\n/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */\n\n@keyframes pulse {\n  from {\n    transform: scale3d(1, 1, 1);\n  }\n\n  50% {\n    transform: scale3d(1.05, 1.05, 1.05);\n  }\n\n  to {\n    transform: scale3d(1, 1, 1);\n  }\n}\n\n.animated.pulse {\n  animation-name: pulse;\n}\n\n@keyframes rubberBand {\n  from {\n    transform: scale3d(1, 1, 1);\n  }\n\n  30% {\n    transform: scale3d(1.25, 0.75, 1);\n  }\n\n  40% {\n    transform: scale3d(0.75, 1.25, 1);\n  }\n\n  50% {\n    transform: scale3d(1.15, 0.85, 1);\n  }\n\n  65% {\n    transform: scale3d(.95, 1.05, 1);\n  }\n\n  75% {\n    transform: scale3d(1.05, .95, 1);\n  }\n\n  to {\n    transform: scale3d(1, 1, 1);\n  }\n}\n\n.animated.rubberBand {\n  animation-name: rubberBand;\n}\n\n@keyframes shake {\n  from, to {\n    transform: translate3d(0, 0, 0);\n  }\n\n  10%, 30%, 50%, 70%, 90% {\n    transform: translate3d(-10px, 0, 0);\n  }\n\n  20%, 40%, 60%, 80% {\n    transform: translate3d(10px, 0, 0);\n  }\n}\n\n.animated.rubber {\n  animation-name: shake;\n}\n\n@keyframes headShake {\n  0% {\n    transform: translateX(0);\n  }\n\n  6.5% {\n    transform: translateX(-6px) rotateY(-9deg);\n  }\n\n  18.5% {\n    transform: translateX(5px) rotateY(7deg);\n  }\n\n  31.5% {\n    transform: translateX(-3px) rotateY(-5deg);\n  }\n\n  43.5% {\n    transform: translateX(2px) rotateY(3deg);\n  }\n\n  50% {\n    transform: translateX(0);\n  }\n}\n\n.animated.headShake {\n  animation-timing-function: ease-in-out;\n  animation-name: headShake;\n}\n\n@keyframes swing {\n  20% {\n    transform: rotate3d(0, 0, 1, 15deg);\n  }\n\n  40% {\n    transform: rotate3d(0, 0, 1, -10deg);\n  }\n\n  60% {\n    transform: rotate3d(0, 0, 1, 5deg);\n  }\n\n  80% {\n    transform: rotate3d(0, 0, 1, -5deg);\n  }\n\n  to {\n    transform: rotate3d(0, 0, 1, 0deg);\n  }\n}\n\n.animated.swing {\n  transform-origin: top center;\n  animation-name: swing;\n}\n\n@keyframes tada {\n  from {\n    transform: scale3d(1, 1, 1);\n  }\n\n  10%, 20% {\n    transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);\n  }\n\n  30%, 50%, 70%, 90% {\n    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);\n  }\n\n  40%, 60%, 80% {\n    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);\n  }\n\n  to {\n    transform: scale3d(1, 1, 1);\n  }\n}\n\n.animated.tada {\n  animation-name: tada;\n}\n\n/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */\n\n@keyframes wobble {\n  from {\n    transform: none;\n  }\n\n  15% {\n    transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);\n  }\n\n  30% {\n    transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);\n  }\n\n  45% {\n    transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);\n  }\n\n  60% {\n    transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);\n  }\n\n  75% {\n    transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);\n  }\n\n  to {\n    transform: none;\n  }\n}\n\n.animated.wobble {\n  animation-name: wobble;\n}\n\n@keyframes jello {\n  from, 11.1%, to {\n    transform: none;\n  }\n\n  22.2% {\n    transform: skewX(-12.5deg) skewY(-12.5deg);\n  }\n\n  33.3% {\n    transform: skewX(6.25deg) skewY(6.25deg);\n  }\n\n  44.4% {\n    transform: skewX(-3.125deg) skewY(-3.125deg);\n  }\n\n  55.5% {\n    transform: skewX(1.5625deg) skewY(1.5625deg);\n  }\n\n  66.6% {\n    transform: skewX(-0.78125deg) skewY(-0.78125deg);\n  }\n\n  77.7% {\n    transform: skewX(0.390625deg) skewY(0.390625deg);\n  }\n\n  88.8% {\n    transform: skewX(-0.1953125deg) skewY(-0.1953125deg);\n  }\n}\n\n.animated.jello {\n  animation-name: jello;\n  transform-origin: center;\n}\n\n@keyframes bounceIn {\n  from, 20%, 40%, 60%, 80%, to {\n    animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);\n  }\n\n  0% {\n    opacity: 0;\n    transform: scale3d(.3, .3, .3);\n  }\n\n  20% {\n    transform: scale3d(1.1, 1.1, 1.1);\n  }\n\n  40% {\n    transform: scale3d(.9, .9, .9);\n  }\n\n  60% {\n    opacity: 1;\n    transform: scale3d(1.03, 1.03, 1.03);\n  }\n\n  80% {\n    transform: scale3d(.97, .97, .97);\n  }\n\n  to {\n    opacity: 1;\n    transform: scale3d(1, 1, 1);\n  }\n}\n\n.animated.bounceIn {\n  animation-name: bounceIn;\n}\n\n@keyframes bounceInDown {\n  from, 60%, 75%, 90%, to {\n    animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);\n  }\n\n  0% {\n    opacity: 0;\n    transform: translate3d(0, -3000px, 0);\n  }\n\n  60% {\n    opacity: 1;\n    transform: translate3d(0, 25px, 0);\n  }\n\n  75% {\n    transform: translate3d(0, -10px, 0);\n  }\n\n  90% {\n    transform: translate3d(0, 5px, 0);\n  }\n\n  to {\n    transform: none;\n  }\n}\n\n.animated.bounceInDown {\n  animation-name: bounceInDown;\n}\n\n@keyframes bounceInLeft {\n  from, 60%, 75%, 90%, to {\n    animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);\n  }\n\n  0% {\n    opacity: 0;\n    transform: translate3d(-3000px, 0, 0);\n  }\n\n  60% {\n    opacity: 1;\n    transform: translate3d(25px, 0, 0);\n  }\n\n  75% {\n    transform: translate3d(-10px, 0, 0);\n  }\n\n  90% {\n    transform: translate3d(5px, 0, 0);\n  }\n\n  to {\n    transform: none;\n  }\n}\n\n.bounceInLeft {\n  animation-name: bounceInLeft;\n}\n\n@keyframes bounceInRight {\n  from, 60%, 75%, 90%, to {\n    animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);\n  }\n\n  from {\n    opacity: 0;\n    transform: translate3d(3000px, 0, 0);\n  }\n\n  60% {\n    opacity: 1;\n    transform: translate3d(-25px, 0, 0);\n  }\n\n  75% {\n    transform: translate3d(10px, 0, 0);\n  }\n\n  90% {\n    transform: translate3d(-5px, 0, 0);\n  }\n\n  to {\n    transform: none;\n  }\n}\n\n.animated.bounceInRight {\n  animation-name: bounceInRight;\n}\n\n@keyframes bounceInUp {\n  from, 60%, 75%, 90%, to {\n    animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);\n  }\n\n  from {\n    opacity: 0;\n    transform: translate3d(0, 3000px, 0);\n  }\n\n  60% {\n    opacity: 1;\n    transform: translate3d(0, -20px, 0);\n  }\n\n  75% {\n    transform: translate3d(0, 10px, 0);\n  }\n\n  90% {\n    transform: translate3d(0, -5px, 0);\n  }\n\n  to {\n    transform: translate3d(0, 0, 0);\n  }\n}\n\n.animated.bounceInUp {\n  animation-name: bounceInUp;\n}\n\n@keyframes bounceOut {\n  20% {\n    transform: scale3d(.9, .9, .9);\n  }\n\n  50%, 55% {\n    opacity: 1;\n    transform: scale3d(1.1, 1.1, 1.1);\n  }\n\n  to {\n    opacity: 0;\n    transform: scale3d(.3, .3, .3);\n  }\n}\n\n.animated.bounceOut {\n  animation-name: bounceOut;\n}\n\n@keyframes bounceOutDown {\n  20% {\n    transform: translate3d(0, 10px, 0);\n  }\n\n  40%, 45% {\n    opacity: 1;\n    transform: translate3d(0, -20px, 0);\n  }\n\n  to {\n    opacity: 0;\n    transform: translate3d(0, 2000px, 0);\n  }\n}\n\n.animated.bounceOutDown {\n  animation-name: bounceOutDown;\n}\n\n@keyframes bounceOutLeft {\n  20% {\n    opacity: 1;\n    transform: translate3d(20px, 0, 0);\n  }\n\n  to {\n    opacity: 0;\n    transform: translate3d(-2000px, 0, 0);\n  }\n}\n\n.animated.bounceOutLeft {\n  animation-name: bounceOutLeft;\n}\n\n@keyframes bounceOutRight {\n  20% {\n    opacity: 1;\n    transform: translate3d(-20px, 0, 0);\n  }\n\n  to {\n    opacity: 0;\n    transform: translate3d(2000px, 0, 0);\n  }\n}\n\n.animated.bounceOutRight {\n  animation-name: bounceOutRight;\n}\n\n@keyframes bounceOutUp {\n  20% {\n    transform: translate3d(0, -10px, 0);\n  }\n\n  40%, 45% {\n    opacity: 1;\n    transform: translate3d(0, 20px, 0);\n  }\n\n  to {\n    opacity: 0;\n    transform: translate3d(0, -2000px, 0);\n  }\n}\n\n.animated.bounceOutUp {\n  animation-name: bounceOutUp;\n}\n\n@keyframes fadeIn {\n  from {\n    opacity: 0;\n  }\n\n  to {\n    opacity: 1;\n  }\n}\n\n.animated.fadeIn {\n  animation-name: fadeIn;\n}\n\n@keyframes fadeInDown {\n  from {\n    opacity: 0;\n    transform: translate3d(0, -100%, 0);\n  }\n\n  to {\n    opacity: 1;\n    transform: none;\n  }\n}\n\n.animated.fadeInDown {\n  animation-name: fadeInDown;\n}\n\n@keyframes fadeInDownBig {\n  from {\n    opacity: 0;\n    transform: translate3d(0, -2000px, 0);\n  }\n\n  to {\n    opacity: 1;\n    transform: none;\n  }\n}\n\n.animated.fadeInDownBig {\n  animation-name: fadeInDownBig;\n}\n\n@keyframes fadeInLeft {\n  from {\n    opacity: 0;\n    transform: translate3d(-100%, 0, 0);\n  }\n\n  to {\n    opacity: 1;\n    transform: none;\n  }\n}\n\n.animated.fadeInLeft {\n  animation-name: fadeInLeft;\n}\n\n@keyframes fadeInLeftBig {\n  from {\n    opacity: 0;\n    transform: translate3d(-2000px, 0, 0);\n  }\n\n  to {\n    opacity: 1;\n    transform: none;\n  }\n}\n\n.animated.fadeInLeftBig {\n  animation-name: fadeInLeftBig;\n}\n\n@keyframes fadeInRight {\n  from {\n    opacity: 0;\n    transform: translate3d(100%, 0, 0);\n  }\n\n  to {\n    opacity: 1;\n    transform: none;\n  }\n}\n\n.animated.fadeInRight {\n  animation-name: fadeInRight;\n}\n\n@keyframes fadeInRightBig {\n  from {\n    opacity: 0;\n    transform: translate3d(2000px, 0, 0);\n  }\n\n  to {\n    opacity: 1;\n    transform: none;\n  }\n}\n\n.animated.fadeInRightBig {\n  animation-name: fadeInRightBig;\n}\n\n@keyframes fadeInUp {\n  from {\n    opacity: 0;\n    transform: translate3d(0, 100%, 0);\n  }\n\n  to {\n    opacity: 1;\n    transform: none;\n  }\n}\n\n.animated.fadeInUp {\n  animation-name: fadeInUp;\n}\n\n@keyframes fadeInUpBig {\n  from {\n    opacity: 0;\n    transform: translate3d(0, 2000px, 0);\n  }\n\n  to {\n    opacity: 1;\n    transform: none;\n  }\n}\n\n.animated.fadeInUpBig {\n  animation-name: fadeInUpBig;\n}\n\n@keyframes fadeOut {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n  }\n}\n\n.animated.fadeOut {\n  animation-name: fadeOut;\n}\n\n@keyframes fadeOutDown {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    transform: translate3d(0, 100%, 0);\n  }\n}\n\n.animated.fadeOutDown {\n  animation-name: fadeOutDown;\n}\n\n@keyframes fadeOutDownBig {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    transform: translate3d(0, 2000px, 0);\n  }\n}\n\n.animated.fadeOutDownBig {\n  animation-name: fadeOutDownBig;\n}\n\n@keyframes fadeOutLeft {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    transform: translate3d(-100%, 0, 0);\n  }\n}\n\n.animated.fadeOutLeft {\n  animation-name: fadeOutLeft;\n}\n\n@keyframes fadeOutLeftBig {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    transform: translate3d(-2000px, 0, 0);\n  }\n}\n\n.animated.fadeOutLeftBig {\n  animation-name: fadeOutLeftBig;\n}\n\n@keyframes fadeOutRight {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    transform: translate3d(100%, 0, 0);\n  }\n}\n\n.animated.fadeOutRight {\n  animation-name: fadeOutRight;\n}\n\n@keyframes fadeOutRightBig {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    transform: translate3d(2000px, 0, 0);\n  }\n}\n\n.animated.fadeOutRightBig {\n  animation-name: fadeOutRightBig;\n}\n\n@keyframes fadeOutUp {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    transform: translate3d(0, -100%, 0);\n  }\n}\n\n.animated.fadeOutUp {\n  animation-name: fadeOutUp;\n}\n\n@keyframes fadeOutUpBig {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    transform: translate3d(0, -2000px, 0);\n  }\n}\n\n.animated.fadeOutUpBig {\n  animation-name: fadeOutUpBig;\n}\n\n@keyframes flip {\n  from {\n    transform: perspective(400px) rotate3d(0, 1, 0, -360deg);\n    animation-timing-function: ease-out;\n  }\n\n  40% {\n    transform: perspective(400px) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -190deg);\n    animation-timing-function: ease-out;\n  }\n\n  50% {\n    transform: perspective(400px) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -170deg);\n    animation-timing-function: ease-in;\n  }\n\n  80% {\n    transform: perspective(400px) scale3d(.95, .95, .95);\n    animation-timing-function: ease-in;\n  }\n\n  to {\n    transform: perspective(400px);\n    animation-timing-function: ease-in;\n  }\n}\n\n.animated.flip {\n  -webkit-backface-visibility: visible;\n  backface-visibility: visible;\n  animation-name: flip;\n}\n\n@keyframes flipInX {\n  from {\n    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);\n    animation-timing-function: ease-in;\n    opacity: 0;\n  }\n\n  40% {\n    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);\n    animation-timing-function: ease-in;\n  }\n\n  60% {\n    transform: perspective(400px) rotate3d(1, 0, 0, 10deg);\n    opacity: 1;\n  }\n\n  80% {\n    transform: perspective(400px) rotate3d(1, 0, 0, -5deg);\n  }\n\n  to {\n    transform: perspective(400px);\n  }\n}\n\n.animated.flipInX {\n  -webkit-backface-visibility: visible !important;\n  backface-visibility: visible !important;\n  animation-name: flipInX;\n}\n\n@keyframes flipInY {\n  from {\n    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);\n    animation-timing-function: ease-in;\n    opacity: 0;\n  }\n\n  40% {\n    transform: perspective(400px) rotate3d(0, 1, 0, -20deg);\n    animation-timing-function: ease-in;\n  }\n\n  60% {\n    transform: perspective(400px) rotate3d(0, 1, 0, 10deg);\n    opacity: 1;\n  }\n\n  80% {\n    transform: perspective(400px) rotate3d(0, 1, 0, -5deg);\n  }\n\n  to {\n    transform: perspective(400px);\n  }\n}\n\n.animated.flipInY {\n  -webkit-backface-visibility: visible !important;\n  backface-visibility: visible !important;\n  animation-name: flipInY;\n}\n\n@keyframes flipOutX {\n  from {\n    transform: perspective(400px);\n  }\n\n  30% {\n    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);\n    opacity: 1;\n  }\n\n  to {\n    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);\n    opacity: 0;\n  }\n}\n\n.animated.flipOutX {\n  animation-name: flipOutX;\n  -webkit-backface-visibility: visible !important;\n  backface-visibility: visible !important;\n}\n\n@keyframes flipOutY {\n  from {\n    transform: perspective(400px);\n  }\n\n  30% {\n    transform: perspective(400px) rotate3d(0, 1, 0, -15deg);\n    opacity: 1;\n  }\n\n  to {\n    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);\n    opacity: 0;\n  }\n}\n\n.animated.flipOutY {\n  -webkit-backface-visibility: visible !important;\n  backface-visibility: visible !important;\n  animation-name: flipOutY;\n}\n\n@keyframes lightSpeedIn {\n  from {\n    transform: translate3d(100%, 0, 0) skewX(-30deg);\n    opacity: 0;\n  }\n\n  60% {\n    transform: skewX(20deg);\n    opacity: 1;\n  }\n\n  80% {\n    transform: skewX(-5deg);\n    opacity: 1;\n  }\n\n  to {\n    transform: none;\n    opacity: 1;\n  }\n}\n\n.animated.lightSpeedIn {\n  animation-name: lightSpeedIn;\n  animation-timing-function: ease-out;\n}\n\n@keyframes lightSpeedOut {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    transform: translate3d(100%, 0, 0) skewX(30deg);\n    opacity: 0;\n  }\n}\n\n.animated.lightSpeedOut {\n  animation-name: lightSpeedOut;\n  animation-timing-function: ease-in;\n}\n\n@keyframes rotateIn {\n  from {\n    transform-origin: center;\n    transform: rotate3d(0, 0, 1, -200deg);\n    opacity: 0;\n  }\n\n  to {\n    transform-origin: center;\n    transform: none;\n    opacity: 1;\n  }\n}\n\n.animated.rotateIn {\n  animation-name: rotateIn;\n}\n\n@keyframes rotateInDownLeft {\n  from {\n    transform-origin: left bottom;\n    transform: rotate3d(0, 0, 1, -45deg);\n    opacity: 0;\n  }\n\n  to {\n    transform-origin: left bottom;\n    transform: none;\n    opacity: 1;\n  }\n}\n\n.animated.rotateInDownLeft {\n  animation-name: rotateInDownLeft;\n}\n\n@keyframes rotateInDownRight {\n  from {\n    transform-origin: right bottom;\n    transform: rotate3d(0, 0, 1, 45deg);\n    opacity: 0;\n  }\n\n  to {\n    transform-origin: right bottom;\n    transform: none;\n    opacity: 1;\n  }\n}\n\n.animated.rotateInDownRight {\n  animation-name: rotateInDownRight;\n}\n\n@keyframes rotateInUpLeft {\n  from {\n    transform-origin: left bottom;\n    transform: rotate3d(0, 0, 1, 45deg);\n    opacity: 0;\n  }\n\n  to {\n    transform-origin: left bottom;\n    transform: none;\n    opacity: 1;\n  }\n}\n\n.animated.rotateInUpLeft {\n  animation-name: rotateInUpLeft;\n}\n\n@keyframes rotateInUpRight {\n  from {\n    transform-origin: right bottom;\n    transform: rotate3d(0, 0, 1, -90deg);\n    opacity: 0;\n  }\n\n  to {\n    transform-origin: right bottom;\n    transform: none;\n    opacity: 1;\n  }\n}\n\n.animated.rotateInUpRight {\n  animation-name: rotateInUpRight;\n}\n\n@keyframes rotateOut {\n  from {\n    transform-origin: center;\n    opacity: 1;\n  }\n\n  to {\n    transform-origin: center;\n    transform: rotate3d(0, 0, 1, 200deg);\n    opacity: 0;\n  }\n}\n\n.animated.rotateOut {\n  animation-name: rotateOut;\n}\n\n@keyframes rotateOutDownLeft {\n  from {\n    transform-origin: left bottom;\n    opacity: 1;\n  }\n\n  to {\n    transform-origin: left bottom;\n    transform: rotate3d(0, 0, 1, 45deg);\n    opacity: 0;\n  }\n}\n\n.animated.rotateOutDownLeft {\n  animation-name: rotateOutDownLeft;\n}\n\n@keyframes rotateOutDownRight {\n  from {\n    transform-origin: right bottom;\n    opacity: 1;\n  }\n\n  to {\n    transform-origin: right bottom;\n    transform: rotate3d(0, 0, 1, -45deg);\n    opacity: 0;\n  }\n}\n\n.animated.rotateOutDownRight {\n  animation-name: rotateOutDownRight;\n}\n\n@keyframes rotateOutUpLeft {\n  from {\n    transform-origin: left bottom;\n    opacity: 1;\n  }\n\n  to {\n    transform-origin: left bottom;\n    transform: rotate3d(0, 0, 1, -45deg);\n    opacity: 0;\n  }\n}\n\n.animated.rotateOutUpLeft {\n  animation-name: rotateOutUpLeft;\n}\n\n@keyframes rotateOutUpRight {\n  from {\n    transform-origin: right bottom;\n    opacity: 1;\n  }\n\n  to {\n    transform-origin: right bottom;\n    transform: rotate3d(0, 0, 1, 90deg);\n    opacity: 0;\n  }\n}\n\n.animated.rotateOutUpRight {\n  animation-name: rotateOutUpRight;\n}\n\n@keyframes hinge {\n  0% {\n    transform-origin: top left;\n    animation-timing-function: ease-in-out;\n  }\n\n  20%, 60% {\n    transform: rotate3d(0, 0, 1, 80deg);\n    transform-origin: top left;\n    animation-timing-function: ease-in-out;\n  }\n\n  40%, 80% {\n    transform: rotate3d(0, 0, 1, 60deg);\n    transform-origin: top left;\n    animation-timing-function: ease-in-out;\n    opacity: 1;\n  }\n\n  to {\n    transform: translate3d(0, 700px, 0);\n    opacity: 0;\n  }\n}\n\n.animated.hinge {\n  animation-name: hinge;\n}\n\n@keyframes jackInTheBox {\n  from {\n    opacity: 0;\n    transform: scale(0.1) rotate(30deg);\n    transform-origin: center bottom;\n  }\n\n  50% {\n    transform: rotate(-10deg);\n  }\n\n  70% {\n    transform: rotate(3deg);\n  }\n\n  to {\n    opacity: 1;\n    transform: scale(1);\n  }\n}\n\n.animated.jackInTheBox {\n  animation-name: jackInTheBox;\n}\n\n/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */\n\n@keyframes rollIn {\n  from {\n    opacity: 0;\n    transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg);\n  }\n\n  to {\n    opacity: 1;\n    transform: none;\n  }\n}\n\n.animated.rollIn {\n  animation-name: rollIn;\n}\n\n/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */\n\n@keyframes rollOut {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg);\n  }\n}\n\n.animated.rollOut {\n  animation-name: rollOut;\n}\n\n@keyframes zoomIn {\n  from {\n    opacity: 0;\n    transform: scale3d(.3, .3, .3);\n  }\n\n  50% {\n    opacity: 1;\n  }\n}\n\n.animated.zoomIn {\n  animation-name: zoomIn;\n}\n\n@keyframes zoomInDown {\n  from {\n    opacity: 0;\n    transform: scale3d(.1, .1, .1) translate3d(0, -1000px, 0);\n    animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);\n  }\n\n  60% {\n    opacity: 1;\n    transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);\n  }\n}\n\n.animated.zoomInDown {\n  animation-name: zoomInDown;\n}\n\n@keyframes zoomInLeft {\n  from {\n    opacity: 0;\n    transform: scale3d(.1, .1, .1) translate3d(-1000px, 0, 0);\n    animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);\n  }\n\n  60% {\n    opacity: 1;\n    transform: scale3d(.475, .475, .475) translate3d(10px, 0, 0);\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);\n  }\n}\n\n.animated.zoomInLeft {\n  animation-name: zoomInLeft;\n}\n\n@keyframes zoomInRight {\n  from {\n    opacity: 0;\n    transform: scale3d(.1, .1, .1) translate3d(1000px, 0, 0);\n    animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);\n  }\n\n  60% {\n    opacity: 1;\n    transform: scale3d(.475, .475, .475) translate3d(-10px, 0, 0);\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);\n  }\n}\n\n.animated.zoomInRight {\n  animation-name: zoomInRight;\n}\n\n@keyframes zoomInUp {\n  from {\n    opacity: 0;\n    transform: scale3d(.1, .1, .1) translate3d(0, 1000px, 0);\n    animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);\n  }\n\n  60% {\n    opacity: 1;\n    transform: scale3d(.475, .475, .475) translate3d(0, -60px, 0);\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);\n  }\n}\n\n.animated.zoomInUp {\n  animation-name: zoomInUp;\n}\n\n@keyframes zoomOut {\n  from {\n    opacity: 1;\n  }\n\n  50% {\n    opacity: 0;\n    transform: scale3d(.3, .3, .3);\n  }\n\n  to {\n    opacity: 0;\n  }\n}\n\n.animated.zoomOut {\n  animation-name: zoomOut;\n}\n\n@keyframes zoomOutDown {\n  40% {\n    opacity: 1;\n    transform: scale3d(.475, .475, .475) translate3d(0, -60px, 0);\n    animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);\n  }\n\n  to {\n    opacity: 0;\n    transform: scale3d(.1, .1, .1) translate3d(0, 2000px, 0);\n    transform-origin: center bottom;\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);\n  }\n}\n\n.animated.zoomOutDown {\n  animation-name: zoomOutDown;\n}\n\n@keyframes zoomOutLeft {\n  40% {\n    opacity: 1;\n    transform: scale3d(.475, .475, .475) translate3d(42px, 0, 0);\n  }\n\n  to {\n    opacity: 0;\n    transform: scale(.1) translate3d(-2000px, 0, 0);\n    transform-origin: left center;\n  }\n}\n\n.animated.zoomOutLeft {\n  animation-name: zoomOutLeft;\n}\n\n@keyframes zoomOutRight {\n  40% {\n    opacity: 1;\n    transform: scale3d(.475, .475, .475) translate3d(-42px, 0, 0);\n  }\n\n  to {\n    opacity: 0;\n    transform: scale(.1) translate3d(2000px, 0, 0);\n    transform-origin: right center;\n  }\n}\n\n.animated.zoomOutRight {\n  animation-name: zoomOutRight;\n}\n\n@keyframes zoomOutUp {\n  40% {\n    opacity: 1;\n    transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);\n    animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);\n  }\n\n  to {\n    opacity: 0;\n    transform: scale3d(.1, .1, .1) translate3d(0, -2000px, 0);\n    transform-origin: center bottom;\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);\n  }\n}\n\n.animated.zoomOutUp {\n  animation-name: zoomOutUp;\n}\n\n@keyframes slideInDown {\n  from {\n    transform: translate3d(0, -1000%, 0);\n    visibility: visible;\n  }\n\n  to {\n    transform: translate3d(0, 0, 0);\n  }\n}\n\n.animated.slideInDown {\n  animation-name: slideInDown;\n}\n\n@keyframes slideInLeft {\n  from {\n    transform: translate3d(-1000%, 0, 0);\n    visibility: visible;\n  }\n\n  to {\n    transform: translate3d(0, 0, 0);\n  }\n}\n\n.animated.slideInLeft {\n  animation-name: slideInLeft;\n}\n\n@keyframes slideInRight {\n  from {\n    transform: translate3d(1000%, 0, 0);\n    visibility: visible;\n  }\n\n  to {\n    transform: translate3d(0, 0, 0);\n  }\n}\n\n.animated.slideInRight {\n  animation-name: slideInRight;\n}\n\n@keyframes slideInUp {\n  from {\n    transform: translate3d(0, 1000%, 0);\n    visibility: visible;\n  }\n\n  to {\n    transform: translate3d(0, 0, 0);\n  }\n}\n\n.animated.slideInUp {\n  animation-name: slideInUp;\n}\n\n@keyframes slideOutDown {\n  from {\n    transform: translate3d(0, 0, 0);\n  }\n\n  to {\n    visibility: hidden;\n    transform: translate3d(0, 1000%, 0);\n  }\n}\n\n.animated.slideOutDown {\n  animation-name: slideOutDown;\n}\n\n@keyframes slideOutLeft {\n  from {\n    transform: translate3d(0, 0, 0);\n  }\n\n  to {\n    visibility: hidden;\n    transform: translate3d(-1000%, 0, 0);\n  }\n}\n\n.animated.slideOutLeft {\n  animation-name: slideOutLeft;\n}\n\n@keyframes slideOutRight {\n  from {\n    transform: translate3d(0, 0, 0);\n  }\n\n  to {\n    visibility: hidden;\n    transform: translate3d(1000%, 0, 0);\n  }\n}\n\n.animated.slideOutRight {\n  animation-name: slideOutRight;\n}\n\n@keyframes slideOutUp {\n  from {\n    transform: translate3d(0, 0, 0);\n  }\n\n  to {\n    visibility: hidden;\n    transform: translate3d(0, -1000%, 0);\n  }\n}\n\n.animated.slideOutUp {\n  animation-name: slideOutUp;\n}\n\n\n.testimonial-sec {\n    overflow: hidden !important;\n}\n/**************Animation CSS End Here****************/\n\n\n\n/**************Who View Your Profile CSS Start Here****************/\n#timeline {\n  list-style: none;\n  position: relative;\n  margin:50px auto;\n  width:90%;\n}\n#timeline:before {\n  top: 0;\n  bottom: 0;\n  position: absolute;\n  content: \" \";\n  width: 2px;\n  background-color: #4997cd;\n  left: 50%;\n  margin-left: -1.5px;\n}\n#timeline .clearFix {\n  clear: both;\n  height: 0;\n}\n#timeline .timeline-badge {\n	color: #fff;\n	width: 25px;\n	height: 25px;\n	font-size: 1.2em;\n	text-align: center;\n	position: absolute;\n	top: 0;\n	left: 50%;\n	margin-left: -13px;\n	background-color: #fff;\n	z-index: 6;\n	border-radius: 50%;\n	border: 2px solid #4997cd;\n}\n#timeline .timeline-badge span.timeline-balloon-date-day {\n  font-size: 1.4em;\n}\n#timeline .timeline-badge span.timeline-balloon-date-month {\n  font-size: .7em;\n  position: relative;\n  top: -10px;\n}\n#timeline .timeline-badge.timeline-filter-movement {\n  background-color: #ffffff;\n  font-size: 1.7em;\n  height: 35px;\n  margin-left: -18px;\n  width: 35px;\n  top: 40px;\n}\n#timeline .timeline-badge.timeline-filter-movement a span {\n  color: #4997cd;\n  font-size: 1.3em;\n  top: -1px;\n}\n#timeline .timeline-badge.timeline-future-movement {\n	background-color: #ffffff;\n	height: 120px;\n	width: 120px;\n	font-size: 1.7em;\n	top: -16px;\n	margin-left: -60px;\n	border: 2px solid #4997cd;\n}\n#timeline .timeline-badge.timeline-future-movement p {\n	color:#1782cc;\n	position: absolute;\n	top: 40px;\n	left: 32px;\n}\n#timeline .timeline-badge.timeline-future-movement a span {\n  color: #4997cd;\n  font-size: .9em;\n  top: 0;\n  left: 1px;\n}\n#timeline .timeline-movement {\n/*   border-bottom: dashed 1px #4997cd; */\n  position: relative;\n  margin-bottom: 10rem;\n}\n#timeline .timeline-movement.timeline-movement-top {\n  height: 60px;\n}\n/* #timeline .timeline-movement .timeline-item {\n  padding: 20px 0;\n} */\n#timeline .timeline-movement .timeline-item .timeline-panel {\n  border: 1px solid #d4d4d4;\n  border-radius: 3px;\n  background-color: #FFFFFF;\n  color: #666;\n  padding: 10px;\n  position: relative;\n  -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);\n  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);\n}\n#timeline .timeline-movement .timeline-item .timeline-panel .timeline-panel-ul {\n  list-style: none;\n  padding: 0;\n  margin: 0;\n}\n\n#timeline .timeline-movement .timeline-item .timeline-panel.credits  .timeline-panel-ul .lefting-wrap {\n	float: right;\n	width: 30%;\n	height: 130px;\n	background-color: floralwhite;\n}\n#timeline .timeline-movement .timeline-item .timeline-panel.credits  .timeline-panel-ul .righting-wrap {\n	float: left;\n	width: 70%;\n	height: 130px;\n	padding: 0 12px 0 0;\n	display: flex;\n	flex-direction: column;\n	justify-content: space-between;\n}\n#timeline .timeline-movement .timeline-item .timeline-panel.credits .timeline-panel-ul li {\n  color: #666;\n  width: 100%;\n}\n.clear {\n	clear:both;\n}\n#timeline .timeline-movement .timeline-item .timeline-panel.debits  .timeline-panel-ul .lefting-wrap {\n	float: left;\n	width: 30%;\n	height: 130px;\n	background-color: floralwhite;\n}\n#timeline .timeline-movement .timeline-item .timeline-panel.debits  .timeline-panel-ul .righting-wrap {\n	float: right;\n	width: 70%;\n	height: 130px;\n	padding: 0 0 0 12px;\n	display: flex;\n	flex-direction: column;\n	justify-content: space-between;\n}\n#timeline .timeline-movement .timeline-item .timeline-panel.debits .timeline-panel-ul li.img-wraping {\n	width: 100%;\n}\n#timeline .timeline-movement .timeline-item .timeline-panel.debits .timeline-panel-ul li.img-wraping a img, #timeline .timeline-movement .timeline-item .timeline-panel.credits .timeline-panel-ul li.img-wraping a img {\n    width: 100%;\n    height: 130px;\n}\n#timeline .timeline-movement .timeline-item .timeline-panel.debits .timeline-panel-ul li {\n	color: #666;\n	width: 100%;\n}\n#timeline .timeline-movement .timeline-item .timeline-panel.credits .timeline-panel-ul li a.importo  {\n  color: #468c1f;\n  font-size: 1.3em;\n  font-weight: 600;\n}\n#timeline .timeline-movement .timeline-item .timeline-panel.debits .timeline-panel-ul {\n  text-align: left;\n}\n#timeline .timeline-movement .timeline-item .timeline-panel.debits .timeline-panel-ul a.importo {\n  color: #e2001a;\n  font-size: 1.3em;\n  font-weight: 600;\n}\n\n/**************Who View Your Profile CSS End Here****************/\n', '\n$(document).ready(function(){\nvar $animation_elements = $(\'.anim\');\nvar $window = $(window);\n\nfunction check_if_in_view() {\nvar window_height = $window.height();\nvar window_top_position = $window.scrollTop();\nvar window_bottom_position = (window_top_position + window_height);\n\n$.each($animation_elements, function() {\nvar $element = $(this);\nvar element_height = $element.outerHeight();\nvar element_top_position = $element.offset().top;\nvar element_bottom_position = (element_top_position + element_height);\n\n//check to see if this current container is within viewport\nif ((element_bottom_position >= window_top_position) &&\n(element_top_position <= window_bottom_position)) {\n$element.addClass(\'animated\');\n} else {\n$element.removeClass(\'animated\');\n}\n});\n}\n\n$window.on(\'scroll resize\', check_if_in_view);\n$window.trigger(\'scroll\');\n});\n\n$(document).ready(function(){\n    $(\'.debits\').hover(function(){\n        $(\'.center-right\').css(\'background-color\', \'#4997cd\');\n        }, function(){\n        $(\'.center-right\').css(\'background-color\', \'#fff\');\n    }); \n});\n$(document).ready(function(){\n    $(\'.credits\').hover(function(){\n        $(\'.center-left\').css(\'background-color\', \'#4997cd\');\n        }, function(){\n        $(\'.center-left\').css(\'background-color\', \'#fff\');\n    }); \n});\n', NULL),
(2, 5, 'teste teste', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionarios`
--

CREATE TABLE `questionarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_aula` int(11) NOT NULL,
  `pergunta` varchar(100) DEFAULT '',
  `titulo1` varchar(150) DEFAULT NULL,
  `opcao1` text,
  `titulo2` varchar(150) DEFAULT NULL,
  `opcao2` text,
  `titulo3` varchar(150) DEFAULT NULL,
  `opcao3` text,
  `titulo4` varchar(150) DEFAULT NULL,
  `opcao4` text,
  `resposta` int(1) DEFAULT '0',
  `questao` varchar(150) DEFAULT NULL,
  `midia_opcao` varchar(45) DEFAULT NULL,
  `midia_pergunta` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `questionarios`
--

INSERT INTO `questionarios` (`id`, `id_aula`, `pergunta`, `titulo1`, `opcao1`, `titulo2`, `opcao2`, `titulo3`, `opcao3`, `titulo4`, `opcao4`, `resposta`, `questao`, `midia_opcao`, `midia_pergunta`) VALUES
(1, 1, 'O que é Libras', NULL, 'Libras é uma mimica', NULL, 'Libras é lingua de Sinais Brasileira', NULL, 'Libras é linguagem simples', NULL, 'Libras é universal', 2, 'Questão 1 em texto', 'texto', 'texto'),
(2, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Questão em Vídeo', NULL, NULL),
(3, 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste ', NULL, NULL),
(4, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste', NULL, NULL),
(5, 5, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste 2', NULL, NULL),
(6, 6, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste teste ', NULL, NULL),
(7, 7, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste 1', NULL, NULL),
(8, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste teste', NULL, NULL),
(9, 9, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste teste', NULL, NULL),
(10, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste', NULL, NULL),
(11, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste', NULL, NULL),
(12, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste teste', NULL, NULL),
(13, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste teste', NULL, NULL),
(14, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste teste', NULL, NULL),
(15, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'TESTE', NULL, NULL),
(16, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'TESTE', NULL, NULL),
(17, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teteteste', NULL, NULL),
(18, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste', NULL, NULL),
(19, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste', NULL, NULL),
(20, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste', NULL, NULL),
(21, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'testeste', NULL, NULL),
(22, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste teste', NULL, NULL),
(23, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste teste', NULL, NULL),
(24, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste', NULL, NULL),
(25, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste teste', NULL, NULL),
(26, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'este teste', NULL, NULL),
(27, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste teste', NULL, NULL),
(28, 11, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'teste teste', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `senha` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(1, 'flaviomilani@gmail.com', '4297f44b13955235245b2497399d7a93');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `aluno_curso`
--
ALTER TABLE `aluno_curso`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `atividade_aluno`
--
ALTER TABLE `atividade_aluno`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `duvidas`
--
ALTER TABLE `duvidas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `exercicios`
--
ALTER TABLE `exercicios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mais_videos`
--
ALTER TABLE `mais_videos`
  ADD PRIMARY KEY (`mais_video_id`);

--
-- Índices para tabela `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `niveis`
--
ALTER TABLE `niveis`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Índices para tabela `pagina_especifica`
--
ALTER TABLE `pagina_especifica`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `questionarios`
--
ALTER TABLE `questionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `aluno_curso`
--
ALTER TABLE `aluno_curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `atividades`
--
ALTER TABLE `atividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `atividade_aluno`
--
ALTER TABLE `atividade_aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `duvidas`
--
ALTER TABLE `duvidas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `exercicios`
--
ALTER TABLE `exercicios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `mais_videos`
--
ALTER TABLE `mais_videos`
  MODIFY `mais_video_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `niveis`
--
ALTER TABLE `niveis`
  MODIFY `id_nivel` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pagina_especifica`
--
ALTER TABLE `pagina_especifica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `questionarios`
--
ALTER TABLE `questionarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
