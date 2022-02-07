-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 11/02/2012 às 15h50min
-- Versão do Servidor: 5.1.54
-- Versão do PHP: 5.3.5-1ubuntu7.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `sovinos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Login do usuário do Administrador',
  `senha` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Senha do usuário Administrador',
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nome do usuário Administrador',
  `criado_em` datetime DEFAULT NULL COMMENT 'Data da crição do usuário Administrador',
  `status` tinyint(4) NOT NULL COMMENT 'Status do usuário Administrador: 0 - Inativo | 1 - Ativo',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela para armazenar informações dos usuários administrador' AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `login`, `senha`, `nome`, `criado_em`, `status`) VALUES
(1, 'adrpnt', '012409', 'Adriano Vasconcelos', '2011-11-27 10:19:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título da imagem do banner',
  `img_src` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Caminho ou nome da imagem',
  `ordem` tinyint(4) NOT NULL COMMENT 'Ordem que a imagem do banner aparecerá no frontend',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Status da imagem do Banner: 0 Inativa | 1 Ativa',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela para armazenar informações das imagens do Banner' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nome da categoria',
  `num_leiloes` int(11) NOT NULL DEFAULT '0' COMMENT 'Número de Leilões conidos nessa categoria',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela para armazenar informações das categorias de leiloes' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL COMMENT 'Id do usuário Cliente que realizou a compra',
  `id_pacote` int(11) NOT NULL COMMENT 'Id do pacote de lances que foi comprado',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Status da Compra: 0 Aguardando Pagamento | 1 Análise | 2 Paga | 3 disponivél | 4 Disputa | 5 Devolvida | 6 Cancelada',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela para armazenar informações das compras realizadas no ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracoes`
--

CREATE TABLE IF NOT EXISTS `configuracoes` (
  `nome_site` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nome do Site',
  `url_site` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Url do Site',
  `email_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_tam_max` int(11) DEFAULT NULL,
  `email_pagseguro` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tokien_pagseguro` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qtd_noticias` int(11) DEFAULT NULL,
  `formato_moeda` int(11) DEFAULT NULL,
  `casas_decimais` int(11) DEFAULT NULL,
  `simbolo_monetário` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `moeda` int(11) DEFAULT NULL,
  `formato_data` int(11) DEFAULT NULL,
  `qtd_banners` int(11) DEFAULT NULL,
  `logo` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keywords` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela para armazenar as configurações gerais';

-- --------------------------------------------------------

--
-- Estrutura da tabela `depoimentos`
--

CREATE TABLE IF NOT EXISTS `depoimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_leilao` int(11) NOT NULL COMMENT 'Id do leilão ao qual pertece o depoimento',
  `id_usuario` int(11) NOT NULL COMMENT 'Id do usuário Cliente que fez o depoimento',
  `depoimento` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Conteúdo do depoimento',
  `data_depoimento` datetime NOT NULL COMMENT 'Data e hora em que foi feito o depoimento',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Status do depoimento: 0 Desaprovado | 1 Aprovado',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela para armazenar informações dos depoimentos' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lances`
--

CREATE TABLE IF NOT EXISTS `lances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_leilao` int(11) NOT NULL COMMENT 'Id do leilão ao qual o lance pertence',
  `id_usuario` int(11) NOT NULL COMMENT 'Id do usuário Cliente que deu o lance',
  `valor_lance` double(10,2) NOT NULL COMMENT 'Valor do lance',
  `lance_em` datetime NOT NULL COMMENT 'Data e hora em que foi dado o lance',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela para armazenar informações dos lances feitos em todos' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `leiloes`
--

CREATE TABLE IF NOT EXISTS `leiloes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL COMMENT 'Id do usuário administrador que criou o leilão',
  `id_categoria` int(11) NOT NULL COMMENT 'Id da categoria ao qual o leilão pertence',
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título do leilão',
  `descricao` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Descrição sobre o leilão e o item ofertado',
  `comeca_em` datetime NOT NULL COMMENT 'Data e hora em que o leilão começará',
  `finaliza_em` datetime NOT NULL COMMENT 'Data e hora em que o leilão termina',
  `quantidade_item` int(11) NOT NULL COMMENT 'Quantidade de itens ofertados no leilão',
  `valor_item` double(10,2) NOT NULL COMMENT 'Valor dos itens ofertados no leilão',
  `num_lances` int(11) NOT NULL COMMENT 'Número de lances feitos',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Status do leilão',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela para armazenar informações dos leilões cadastrados' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nome que aparecerá no frontend',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'URL do item do menu',
  `ordem` tinyint(4) NOT NULL COMMENT 'Ordem que o item do menu aparecerá no frontend',
  `status` tinyint(4) NOT NULL COMMENT 'Status do item do Menu: 0 Inativo | 1 Ativo',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela para armazenar informações dos itens do menu do site' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título da notícia',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Forma amigavél do título da notícia',
  `conteudo` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Conteúdo da notícia',
  `data_postagem` datetime NOT NULL COMMENT 'Data e hora em que a notícia foi postada',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Status da notícia: 0 Inativa | 1 Ativa',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela para armazenar informações das notícias postadas no s' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacotes`
--

CREATE TABLE IF NOT EXISTS `pacotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_lances` int(11) NOT NULL COMMENT 'Número de lances contido no pacote de lances',
  `preco` double(10,2) NOT NULL COMMENT 'Preço do pacote de lances',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela para armazenar informações dos pacotes de lances' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE IF NOT EXISTS `pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_compra` int(11) NOT NULL COMMENT 'Id da compra paga',
  `data_pagamento` datetime NOT NULL COMMENT 'Data e Hora do pagamento',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela para armazenar informações dos pagamentos' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas`
--

CREATE TABLE IF NOT EXISTS `paginas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título da página',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Forma amigavél do título da página',
  `conteudo` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Conteúdo da página',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Status da página: 0 Inativo | 1 Ativo',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela para armazenar informações das páginas de conteúdo do' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Login do usuário Cliente',
  `senha` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Senha do usuário Cliente',
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nome do usuário Cliente',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'E-mail do usuário Cliente',
  `cpf` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT 'CPF do usuário Cliente',
  `telefone` char(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Telefone do usuário Cliente',
  `sexo` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Sexo do usuário Cliente',
  `estado_civil` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Estado Civil do usuário Cliente: s solteiro | c casado | d divorciado | v viúvo',
  `data_nascimento` date NOT NULL COMMENT 'Data do Nascimento do usuário Cliente',
  `endereco` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Endereço do usuário Cliente',
  `numero` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Número do endereço do usuário Cliente',
  `complemento` text COLLATE utf8_unicode_ci COMMENT 'Complemento do endereço',
  `cep` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'CEP do usuário Cliente',
  `bairro` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Bairro do usuário Cliente',
  `cidade` int(11) NOT NULL COMMENT 'Cidade do usuário Cliente',
  `estado` int(11) NOT NULL COMMENT 'Estado do usuário Cliente',
  `criado_em` datetime NOT NULL COMMENT 'Data do cadastro do usuário Cliente',
  `ultimo_login` datetime NOT NULL COMMENT 'Data e hora do último login do usuário Cliente',
  `aceita_newsletter` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Se o usuário aceita ou não receber newsletter: 0 não | 1 sim',
  `num_lances` int(11) NOT NULL DEFAULT '0' COMMENT 'Número de lances que o usuário possui',
  `ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'IP do usuário Cliente',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Status do usuário Cliente: 0 - Inativo | 1 - Ativo',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela para armazenar informações dos usuários Clientes' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vencedores`
--

CREATE TABLE IF NOT EXISTS `vencedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lance` int(11) NOT NULL COMMENT 'Id do lance ganhador',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela para armazenar informações dos usuário Clientes que g' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
