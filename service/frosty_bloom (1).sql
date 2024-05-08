-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/04/2024 às 00:48
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12



SET @@global.time_zone = '+00:00';




/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `frosty bloom`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_produtos`
--

 CREATE TABLE cadastro_produtos (
  id INT PRIMARY KEY IDENTITY,
  nome VARCHAR(255) NOT NULL,
  descricao TEXT,
  preco DECIMAL(10,2) NOT NULL
);


-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE [cliente] (
  [nome] varchar(80) NOT NULL,
  [sobrenome] varchar(80) NOT NULL,
  [email] varchar(100) NOT NULL
);


--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro_produtos`
--
ALTER TABLE [cadastro_produtos]
  ADD CONSTRAINT fk_id
  FOREIGN KEY ([id])
  REFERENCES [outra_tabela]([coluna_referenciada]);



--
-- Índices de tabela `cliente`
--
ALTER TABLE cliente
  ADD CONSTRAINT pk_cliente_id PRIMARY KEY (id);


--






/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
