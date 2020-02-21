-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Nov-2019 às 17:09
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_ceruleanexecution`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(8) UNSIGNED ZEROFILL NOT NULL COMMENT 'Armazena o id da categoria',
  `nome` varchar(45) NOT NULL COMMENT 'Armazena o nome da categoria',
  `descricao` text NOT NULL COMMENT 'Armazena a descrição da categoria'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que armazena as categorias dos produtos e suas informações,';

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `descricao`) VALUES
(00000001, 'Artigos de festa', 'Sempre a disposição para personalizar seus itens de festa, para que fiquem a sua cara.'),
(00000002, 'Vestuário', 'Uma seleção de vestuário a partir do seu gosto e preferência, sempre com a qualidade Color Personalizações!'),
(00000003, 'Escritório', 'Um café logo pela manhã é sempre bom, ainda mais se for em seu escritório totalmente personalizado.'),
(00000004, 'Ecológico', 'Também pra os mais conscientizados com a natureza, temos nossa classificação de produtos ecológicos.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(8) UNSIGNED ZEROFILL NOT NULL COMMENT 'Armazena Id do Cliente',
  `inscricao_estadual` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Armazena a inscrição estadual do cliente',
  `nome` varchar(45) NOT NULL COMMENT 'Armazena o nome do cliente',
  `email` varchar(60) NOT NULL COMMENT 'Armazena o email do cliente',
  `telefone` bigint(20) UNSIGNED NOT NULL COMMENT 'Armazena o telefone do cliente',
  `rua` varchar(45) NOT NULL COMMENT 'Armazena o nome da rua do cliente',
  `bairro` varchar(25) NOT NULL COMMENT 'Armazena o nome do bairro do cliente',
  `numero` int(10) UNSIGNED NOT NULL COMMENT 'Armazena o número da residência do cliente',
  `cidade` varchar(45) NOT NULL COMMENT 'Armazena o nome da cidade do cliente',
  `estado` char(2) NOT NULL COMMENT 'Armazena o nome do estado do cliente',
  `cep` int(10) UNSIGNED NOT NULL COMMENT 'Armazena o CEP do cliente',
  `cpf` bigint(11) UNSIGNED ZEROFILL DEFAULT NULL COMMENT 'Armazena o CPF do cliente',
  `cnpj` bigint(14) UNSIGNED ZEROFILL DEFAULT NULL COMMENT 'Armazena o CNPJ do cliente',
  `telefone2` bigint(20) UNSIGNED NOT NULL COMMENT 'Armazena o telefone secundário do cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela para armazenar dados dos clientes da Color Personalizações.';

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `inscricao_estadual`, `nome`, `email`, `telefone`, `rua`, `bairro`, `numero`, `cidade`, `estado`, `cep`, `cpf`, `cnpj`, `telefone2`) VALUES
(00000001, NULL, 'Afonso Oliveira', 'afonso_oliver_king@gmail.com', 30289009, 'Rua das Andorinhas', 'Vila Semi-Nova', 1332, 'Innerville', 'SC', 12345670, 12434567809, NULL, 99873405),
(00000002, NULL, 'Andressa da Silva Sandero', 'andr_silvandrera@yahoo.com', 30287009, 'Rua rio barbado', 'Costas do Silva', 235, 'Innerville', 'SC', 12667100, 12567645665, NULL, 88045600),
(00000003, NULL, 'Alexander Gullander Padonni', 'alex_gulla-pado@hotmail.com', 30284556, 'Rua matagal', 'Refloresta', 1543, 'Innerville', 'SC', 12400596, 12456544346, NULL, 80065886),
(00000004, NULL, 'Santana Lima Nunes', 'santalimanu@hotmail.com', 30281256, 'Rua XXV de dezembro', 'descentralizado', 133, 'Innerville', 'SC', 12466761, 12407964567, NULL, 99812365);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `matricula` int(8) UNSIGNED ZEROFILL NOT NULL COMMENT 'Armazena a matricula dos funcionários.',
  `nome` varchar(45) NOT NULL COMMENT 'Armazena o nome dos funcionários.',
  `usuario` varchar(30) NOT NULL COMMENT 'Armazena o usuário para uso do software, funcionários.',
  `senha` varchar(32) NOT NULL COMMENT 'Armazena o senha para uso do software, funcionários.',
  `cpf` bigint(20) UNSIGNED NOT NULL COMMENT 'Armazena CPF dos funcionários',
  `email` varchar(60) NOT NULL COMMENT 'Armazena email dos funcionários.',
  `nivel` tinyint(3) UNSIGNED NOT NULL COMMENT 'Armazena o nível de acesso dos funcionários ao software.',
  `rua` varchar(45) NOT NULL COMMENT 'Armazena a rua do endereço dos funcionários.',
  `bairro` varchar(25) NOT NULL COMMENT 'Armazena o bairro do endereço dos funcionários.',
  `numero` int(10) UNSIGNED NOT NULL COMMENT 'Armazena o número do endereço dos funcionários.',
  `cidade` varchar(45) NOT NULL COMMENT 'Armazena a cidade do endereço dos funcionários.',
  `estado` char(2) NOT NULL COMMENT 'Armazena o estado do endereço dos funcionários.',
  `cep` int(10) UNSIGNED NOT NULL COMMENT 'Armazena o CEP do endereço dos funcionários.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que armazena os dados dos funcionarios';

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`matricula`, `nome`, `usuario`, `senha`, `cpf`, `email`, `nivel`, `rua`, `bairro`, `numero`, `cidade`, `estado`, `cep`) VALUES
(00000001, 'Maurilio', 'adm1', '827ccb0eea8a706c4c34a16891f84e7b', 12175432301, 'adm@adm.com', 1, 'MSN', 'Costa e Silva', 235, 'Joinville', 'SC', 55440970),
(00000002, 'André', 'executor1', '827ccb0eea8a706c4c34a16891f84e7b', 12312312302, 'executor@executor.com', 2, 'Yahoo', 'Floresta', 212, 'Joinville', 'SC', 13316509),
(00000003, 'Alice', 'atendente1', '827ccb0eea8a706c4c34a16891f84e7b', 12175432301, 'atendente@atendente.com', 3, 'Wikipedia', 'Centro', 1543, 'Joinville', 'SC', 55440970);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamentos`
--

CREATE TABLE `orcamentos` (
  `id` int(8) UNSIGNED ZEROFILL NOT NULL COMMENT 'Armazena o id do orçamento',
  `desconto` decimal(8,2) UNSIGNED DEFAULT NULL COMMENT 'Armazena o possivel desconto do preço do orçamento',
  `parcelas` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Armazena as possiveis parcelas em que o cliente pode pagar ',
  `preco_total` decimal(8,2) UNSIGNED NOT NULL COMMENT 'Armazena o preço total do orçamento',
  `clientes_id` int(8) UNSIGNED ZEROFILL NOT NULL COMMENT 'Armazena o id do cliente que solicitou o orçamento',
  `funcionarios_matricula` int(8) UNSIGNED ZEROFILL NOT NULL COMMENT 'Armazena a matrícula do funcionário responsável',
  `status` tinyint(1) UNSIGNED NOT NULL,
  `dt_emissao` date NOT NULL,
  `local` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que armazena os orçamentos feitos pelos atendentes.';

--
-- Extraindo dados da tabela `orcamentos`
--

INSERT INTO `orcamentos` (`id`, `desconto`, `parcelas`, `preco_total`, `clientes_id`, `funcionarios_matricula`, `status`, `dt_emissao`, `local`) VALUES
(00000001, '0.00', 5, '123.45', 00000002, 00000001, 2, '2019-11-29', '12'),
(00000002, '1.00', 4, '39.60', 00000001, 00000001, 1, '2019-11-29', 'Rua das Andorinhas, Vila Semi-Nova, 1332');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamentos_tem_produtos`
--

CREATE TABLE `orcamentos_tem_produtos` (
  `produtos_id` int(8) UNSIGNED ZEROFILL NOT NULL COMMENT 'Armazena o id do produto.',
  `orcamentos_id` int(8) UNSIGNED ZEROFILL NOT NULL COMMENT 'Armazena o id do orçamento',
  `descricao` text NOT NULL COMMENT 'Armazena a descrição da ação',
  `quantidade` int(4) UNSIGNED NOT NULL COMMENT 'Armazena a quantidade de produtos',
  `preco_unico` decimal(6,2) UNSIGNED NOT NULL COMMENT 'Armazena o preço do produto na época em que ele foi colocado no orçamento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que armazena as informações da relação produto e orçamentos';

--
-- Extraindo dados da tabela `orcamentos_tem_produtos`
--

INSERT INTO `orcamentos_tem_produtos` (`produtos_id`, `orcamentos_id`, `descricao`, `quantidade`, `preco_unico`) VALUES
(00000001, 00000001, 'Símbolo de Ying-Yang', 5, '4.89'),
(00000003, 00000002, 'Símbolo Judiciário', 4, '3.90'),
(00000004, 00000002, 'Simbolo Judiciário', 3, '8.00'),
(00000012, 00000001, 'Desenho do Ben10 de frente', 10, '9.90');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordens_de_servicos`
--

CREATE TABLE `ordens_de_servicos` (
  `id` int(8) UNSIGNED ZEROFILL NOT NULL COMMENT 'Armazena o id das ordens de serviço',
  `data_entrega` date NOT NULL COMMENT 'Armazena a data de entrega da ordem de serviço',
  `status` tinyint(1) NOT NULL COMMENT 'Armazena as informações do status da Ordem De Serviço',
  `funcionarios_matricula` int(8) UNSIGNED ZEROFILL NOT NULL COMMENT 'Armazena a matriculo do funcionario que irá executar a ordem de serviço',
  `orcamentos_id` int(8) UNSIGNED ZEROFILL NOT NULL COMMENT 'Armazena o id do orçamento de que a ordem de serviço se originou'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela em que é armazenado os dados das ordens de serviço';

--
-- Extraindo dados da tabela `ordens_de_servicos`
--

INSERT INTO `ordens_de_servicos` (`id`, `data_entrega`, `status`, `funcionarios_matricula`, `orcamentos_id`) VALUES
(00000001, '2019-12-20', 1, 00000002, 00000001);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(8) UNSIGNED ZEROFILL NOT NULL COMMENT 'Armazena o id do produto',
  `nome` varchar(45) NOT NULL COMMENT 'Armazena o nome do produto',
  `fornecedor` varchar(45) NOT NULL COMMENT 'Armazena o nome do fornecedor do produto',
  `preco_unidade` decimal(6,2) UNSIGNED NOT NULL COMMENT 'Armazena o preço unitário do produto',
  `imagens` varchar(255) DEFAULT NULL COMMENT 'Guarda os endereços das imagens dos produtos',
  `categorias_id` int(8) UNSIGNED ZEROFILL NOT NULL COMMENT 'Armazena o id da categoria em que o produto está'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que armazena os produtos vendidos e as suas informações.';

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `fornecedor`, `preco_unidade`, `imagens`, `categorias_id`) VALUES
(00000001, 'Taça de plástico dourada', 'Cuppiaraci inc.', '4.89', 'C:\\xampp\\htdocs\\CeruleanColor\\img\\dourada.png', 00000001),
(00000003, 'Taça de plástico colorida', 'Cuppiaraci inc.', '3.90', 'C:\\xampp\\htdocs\\CeruleanColor\\img\\taca_cores.png', 00000001),
(00000004, 'Camisa Polo', 'Apocalyptically Clean Sale', '8.00', 'C:\\xampp\\htdocs\\CeruleanColor\\img\\camisa_polo.png', 00000002),
(00000005, 'Camiseta', 'Apocalyptically Clean Sale', '6.99', 'C:\\xampp\\htdocs\\CeruleanColor\\img\\camisa.png', 00000002),
(00000006, 'Boné', 'Apocalyptically Clean Sale', '9.90', 'C:\\xampp\\htdocs\\CeruleanColor\\img\\bone.png', 00000002),
(00000007, 'Chaveiro de plástico', 'Stocks Rising & stock Disappearing', '3.90', 'C:\\xampp\\htdocs\\CeruleanColor\\img\\chaveiro.png', 00000003),
(00000008, 'Agenda capa dura', 'Stocks Rising & stock Disappearing', '12.99', 'C:\\xampp\\htdocs\\CeruleanColor\\img\\principal.png', 00000003),
(00000009, 'Caneta de plástico', 'Stocks Rising & stock Disappearing', '3.00', 'C:\\xampp\\htdocs\\CeruleanColor\\img\\caneta.png', 00000003),
(00000010, 'Squeeze de plástico', 'Stocks Rising & stock Disappearing', '9.90', 'C:\\xampp\\htdocs\\CeruleanColor\\img\\squeeze.png', 00000003),
(00000011, 'Régua de plástico', 'Stocks Rising & stock Disappearing', '2.50', 'C:\\xampp\\htdocs\\CeruleanColor\\img\\regua.png', 00000003),
(00000012, 'Caderno de capa dura', 'Stocks Rising & stock Disappearing', '9.90', 'C:\\xampp\\htdocs\\CeruleanColor\\img\\caderno.png', 00000003),
(00000013, 'Caneca de plástico', 'Stocks Rising & stock Disappearing', '5.99', 'C:\\xampp\\htdocs\\CeruleanColor\\img\\caneca.png', 00000003),
(00000014, 'Lápis', 'Stocks Rising & stock Disappearing', '2.50', 'C:\\xampp\\htdocs\\CeruleanColor\\img\\lapis_eco.png', 00000003),
(00000015, 'Lápis ecológico', 'Organic for Dinamics', '4.50', 'C:\\xampp\\htdocs\\CeruleanColor\\img\\lapis_eco.png', 00000004),
(00000016, 'Agenda Ecológica', 'Organic for Dinamics', '16.99', 'C:\\xampp\\htdocs\\CeruleanColor\\img\\agenda_eco.png', 00000004),
(00000017, 'Caneta ecológica', 'Organic for Dinamics', '4.00', 'C:\\xampp\\htdocs\\CeruleanColor\\img\\canetas_eco.png', 00000004);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`matricula`);

--
-- Índices para tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orcamentos_clientes_idx` (`clientes_id`),
  ADD KEY `fk_orcamentos_funcionarios1_idx` (`funcionarios_matricula`);

--
-- Índices para tabela `orcamentos_tem_produtos`
--
ALTER TABLE `orcamentos_tem_produtos`
  ADD PRIMARY KEY (`produtos_id`,`orcamentos_id`),
  ADD KEY `fk_produtos_has_orcamentos_orcamentos1_idx` (`orcamentos_id`),
  ADD KEY `fk_produtos_has_orcamentos_produtos1_idx` (`produtos_id`);

--
-- Índices para tabela `ordens_de_servicos`
--
ALTER TABLE `ordens_de_servicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ordem_de_servico_funcionarios1_idx` (`funcionarios_matricula`),
  ADD KEY `fk_ordem_de_servico_orcamentos1_idx` (`orcamentos_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produtos_categorias1_idx` (`categorias_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Armazena o id da categoria', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Armazena Id do Cliente', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `matricula` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Armazena a matricula dos funcionários.', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  MODIFY `id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Armazena o id do orçamento', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ordens_de_servicos`
--
ALTER TABLE `ordens_de_servicos`
  MODIFY `id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Armazena o id das ordens de serviço', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Armazena o id do produto', AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD CONSTRAINT `fk_orcamentos_clientes` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orcamentos_funcionarios1` FOREIGN KEY (`funcionarios_matricula`) REFERENCES `funcionarios` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `orcamentos_tem_produtos`
--
ALTER TABLE `orcamentos_tem_produtos`
  ADD CONSTRAINT `fk_produtos_has_orcamentos_orcamentos1` FOREIGN KEY (`orcamentos_id`) REFERENCES `orcamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produtos_has_orcamentos_produtos1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ordens_de_servicos`
--
ALTER TABLE `ordens_de_servicos`
  ADD CONSTRAINT `fk_ordem_de_servico_funcionarios1` FOREIGN KEY (`funcionarios_matricula`) REFERENCES `funcionarios` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ordem_de_servico_orcamentos1` FOREIGN KEY (`orcamentos_id`) REFERENCES `orcamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_categorias1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
