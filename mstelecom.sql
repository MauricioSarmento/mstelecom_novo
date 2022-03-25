-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 20-Mar-2022 às 15:40
-- Versão do servidor: 10.3.23-MariaDB-0+deb10u1
-- versão do PHP: 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mstelecom`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpf` varchar(20) COLLATE utf8_bin NOT NULL,
  `telefone` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(40) COLLATE utf8_bin NOT NULL,
  `plano` varchar(8) COLLATE utf8_bin NOT NULL,
  `rua` varchar(62) COLLATE utf8_bin NOT NULL,
  `numero` varchar(20) COLLATE utf8_bin NOT NULL,
  `complemento` varchar(60) COLLATE utf8_bin NOT NULL,
  `bairro` varchar(60) COLLATE utf8_bin NOT NULL,
  `cep` varchar(60) COLLATE utf8_bin NOT NULL,
  `data` varchar(15) COLLATE utf8_bin NOT NULL,
  `id_servidor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `cadastro`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `chamado`
--

CREATE TABLE `chamado` (
  `id` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `nome_cliente` varchar(100) DEFAULT NULL,
  `reclamacao` varchar(300) DEFAULT NULL,
  `data_abertura` varchar(50) DEFAULT NULL,
  `data_conclusao` varchar(50) DEFAULT NULL,
  `nome_tecnico` varchar(50) DEFAULT NULL,
  `obs` varchar(300) DEFAULT NULL,
  `id_serv` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chamado`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT 'admin',
  `senha` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT 'adminadminadmin',
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `id_servidor` int(11) NOT NULL,
  `priv` int(11) NOT NULL DEFAULT 2,
  `primary_serv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `usuario`, `senha`, `email`, `id_servidor`, `priv`, `primary_serv`) VALUES
(2, 'admin', 'admin', '123456789', NULL, 133, 1, 48),


-- --------------------------------------------------------

--
-- Estrutura da tabela `conf`
--

CREATE TABLE `conf` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `grafico` varchar(5) COLLATE utf8_bin NOT NULL,
  `max_login` int(11) NOT NULL,
  `hora` varchar(11) COLLATE utf8_bin NOT NULL,
  `obs` varchar(5) COLLATE utf8_bin NOT NULL,
  `financeiro` varchar(5) COLLATE utf8_bin NOT NULL,
  `servidores` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `conf`
--

INSERT INTO `conf` (`id`, `id_usuario`, `grafico`, `max_login`, `hora`, `obs`, `financeiro`, `servidores`) VALUES
(21, 133, 'NULL', 478, '10/03/2022', '', '', ''),
(22, 138, 'NULL', 478, '10/03/2022', 'NULL', 'NULL', '50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `db_clientes`
--

CREATE TABLE `db_clientes` (
  `id_cliente` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'Não informado',
  `telefone` varchar(50) DEFAULT 'Não informado',
  `data_instalacao` varchar(100) DEFAULT 'Não informado',
  `endereco` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'Não informado',
  `numero` varchar(30) DEFAULT '00',
  `complemento` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'Não informado',
  `apelido` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'Não informado',
  `plano` varchar(20) DEFAULT 'Não informado',
  `dia_vencimento` varchar(20) DEFAULT 'Não informado',
  `status_cliente` varchar(5) DEFAULT '3',
  `valor_plano` varchar(20) DEFAULT 'Não informado',
  `cpf` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `db_clientes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL DEFAULT 'Não informado',
  `usuario_cliente` varchar(100) NOT NULL,
  `id_servidor` varchar(50) NOT NULL,
  `data` varchar(50) NOT NULL DEFAULT 'Não informado',
  `Ação` varchar(50) NOT NULL DEFAULT 'Não informado',
  `admin` varchar(50) NOT NULL DEFAULT 'Não informado',
  `endereco` varchar(100) NOT NULL DEFAULT 'Não informado',
  `complemento` varchar(200) NOT NULL DEFAULT 'Não informado',
  `plano` varchar(15) NOT NULL DEFAULT 'Não informado',
  `contato` varchar(50) NOT NULL DEFAULT 'Não informado',
  `instalacao` varchar(50) NOT NULL DEFAULT 'Não informado',
  `numero` varchar(50) NOT NULL DEFAULT 'Não informado',
  `vencimento` varchar(50) NOT NULL DEFAULT 'Não informado',
  `valor` varchar(50) NOT NULL DEFAULT 'Não informado',
  `id_cliente` varchar(11) NOT NULL,
  `apelido` varchar(50) NOT NULL DEFAULT 'Não informado',
  `cpf` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_produtos`
--

CREATE TABLE `historico_produtos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cliente` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT 'não informado',
  `item` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT 'não informado',
  `valor_venda` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'não informado',
  `valor_desconto` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'não informado',
  `data` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensalidade`
--

CREATE TABLE `mensalidade` (
  `id` int(100) NOT NULL,
  `id_clientes` varchar(20) NOT NULL DEFAULT '1',
  `usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '1',
  `Jan` int(2) NOT NULL DEFAULT 1,
  `Feb` int(2) NOT NULL DEFAULT 1,
  `Mar` int(2) NOT NULL DEFAULT 1,
  `Apr` int(2) NOT NULL DEFAULT 1,
  `May` int(2) NOT NULL DEFAULT 1,
  `Jun` int(2) NOT NULL DEFAULT 1,
  `Jul` int(2) NOT NULL DEFAULT 1,
  `Aug` int(2) NOT NULL DEFAULT 1,
  `Sep` int(2) NOT NULL DEFAULT 1,
  `Oct` int(2) NOT NULL DEFAULT 1,
  `Nov` int(2) NOT NULL DEFAULT 1,
  `Dez` int(2) NOT NULL DEFAULT 1,
  `ano` varchar(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensalidade`
--

--
-- Estrutura da tabela `observacao`
--

CREATE TABLE `observacao` (
  `id` int(11) NOT NULL,
  `id_cliente_ob` int(11) NOT NULL,
  `data` varchar(30) COLLATE utf8_bin NOT NULL,
  `porta_caixa` varchar(50) COLLATE utf8_bin NOT NULL,
  `obs` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `observacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL,
  `id_servidor` varchar(20) COLLATE utf8_bin NOT NULL,
  `id_cliente` varchar(20) COLLATE utf8_bin NOT NULL,
  `nome_cliente` varchar(30) COLLATE utf8_bin NOT NULL,
  `data_dia` varchar(5) COLLATE utf8_bin NOT NULL,
  `data_mes` varchar(20) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `data_ano` varchar(20) COLLATE utf8_bin NOT NULL,
  `valor` varchar(20) COLLATE utf8_bin NOT NULL,
  `vencimento` varchar(20) COLLATE utf8_bin NOT NULL,
  `data_hora` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `pagamentos`
--
-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `item` varchar(30) DEFAULT NULL,
  `quantidade` varchar(30) DEFAULT NULL,
  `preço_compra` varchar(30) DEFAULT NULL,
  `preço_venda` varchar(30) DEFAULT NULL,
  `lucro` varchar(30) DEFAULT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `id_serv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `roteador`
--

CREATE TABLE `roteador` (
  `id` int(11) NOT NULL,
  `id_servidor` int(11) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `parcelas` varchar(40) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `data` varchar(20) NOT NULL,
  `acesso_remoto` varchar(20) NOT NULL,
  `mac` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `roteador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `servidores`
--

CREATE TABLE `servidores` (
  `id_cliente` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Nome` varchar(35) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ip_servidor` varchar(40) NOT NULL,
  `descricao` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servidores`
--

INSERT INTO `servidores` (`id_cliente`, `id`, `Nome`, `ip_servidor`, `descricao`) VALUES
(2, 133, 'Concentrador CCR1036', '172.16.0.3', ''),


-- --------------------------------------------------------

--
-- Estrutura da tabela `sociedade`
--

CREATE TABLE `sociedade` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `sociedade`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT 'admin',
  `senha` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT 'adminadminadmin',
  `ip` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `ip`) VALUES
(1, 'Mauricio Sarmento', 'admin', '123456', '172.16.0.3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `id_servidor` int(11) NOT NULL,
  `Produto` varchar(30) COLLATE utf8_bin NOT NULL,
  `valor` varchar(20) COLLATE utf8_bin NOT NULL,
  `Lucro` varchar(20) COLLATE utf8_bin NOT NULL,
  `Pagamento` varchar(20) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(40) COLLATE utf8_bin NOT NULL,
  `data` varchar(15) COLLATE utf8_bin NOT NULL,
  `quant` varchar(11) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `chamado`
--
ALTER TABLE `chamado`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_servidor` (`id_servidor`);

--
-- Índices para tabela `conf`
--
ALTER TABLE `conf`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `db_clientes`
--
ALTER TABLE `db_clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `nome_servidor` (`id_cliente`);

--
-- Índices para tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historico_produtos`
--
ALTER TABLE `historico_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mensalidade`
--
ALTER TABLE `mensalidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `observacao`
--
ALTER TABLE `observacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `item` (`item`);

--
-- Índices para tabela `roteador`
--
ALTER TABLE `roteador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `servidores`
--
ALTER TABLE `servidores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Nome` (`Nome`);

--
-- Índices para tabela `sociedade`
--
ALTER TABLE `sociedade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT de tabela `chamado`
--
ALTER TABLE `chamado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT de tabela `conf`
--
ALTER TABLE `conf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `db_clientes`
--
ALTER TABLE `db_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58506;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19895;

--
-- AUTO_INCREMENT de tabela `historico_produtos`
--
ALTER TABLE `historico_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mensalidade`
--
ALTER TABLE `mensalidade`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68229;

--
-- AUTO_INCREMENT de tabela `observacao`
--
ALTER TABLE `observacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1471;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6638;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `roteador`
--
ALTER TABLE `roteador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5156;

--
-- AUTO_INCREMENT de tabela `servidores`
--
ALTER TABLE `servidores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT de tabela `sociedade`
--
ALTER TABLE `sociedade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `id_servidor` FOREIGN KEY (`id_servidor`) REFERENCES `servidores` (`id`);

--
-- Limitadores para a tabela `db_clientes`
--
ALTER TABLE `db_clientes`
  ADD CONSTRAINT `nome_servidor` FOREIGN KEY (`id_cliente`) REFERENCES `servidores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
