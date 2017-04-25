-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Abr-2017 às 06:01
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE `atividade` (
  `id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataTermino` date NOT NULL,
  `conteudo` varchar(45) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`id`, `turma_id`, `dataInicio`, `dataTermino`, `conteudo`, `status`) VALUES
(1, 1, '2017-04-25', '2017-04-27', 'do while', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `conteudo` varchar(45) NOT NULL,
  `nota` float NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id`, `turma_id`, `data`, `conteudo`, `nota`, `status`) VALUES
(2, 1, '2017-04-25', 'do while', 10, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `papel`
--

CREATE TABLE `papel` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `papel`
--

INSERT INTO `papel` (`id`, `descricao`) VALUES
(1, 'professor'),
(2, 'aluno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes_atividade`
--

CREATE TABLE `questoes_atividade` (
  `id` int(11) NOT NULL,
  `atividade_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `numero` int(2) NOT NULL,
  `pergunta` varchar(450) NOT NULL,
  `nivel` int(1) NOT NULL,
  `a` varchar(450) DEFAULT NULL,
  `b` varchar(450) DEFAULT NULL,
  `c` varchar(450) DEFAULT NULL,
  `d` varchar(450) DEFAULT NULL,
  `e` varchar(450) DEFAULT NULL,
  `resposta` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes_avaliacao`
--

CREATE TABLE `questoes_avaliacao` (
  `id` int(11) NOT NULL,
  `avaliacao_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `numero` int(2) NOT NULL,
  `pergunta` varchar(450) NOT NULL,
  `a` varchar(450) DEFAULT NULL,
  `b` varchar(450) DEFAULT NULL,
  `c` varchar(450) DEFAULT NULL,
  `d` varchar(450) DEFAULT NULL,
  `e` varchar(450) DEFAULT NULL,
  `resposta` char(1) DEFAULT NULL,
  `nivel` int(1) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta_atividade`
--

CREATE TABLE `resposta_atividade` (
  `idresposta` int(11) NOT NULL,
  `questoes_resposta_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `alternativa` char(1) DEFAULT NULL,
  `algoritmo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta_avaliacao`
--

CREATE TABLE `resposta_avaliacao` (
  `idresposta` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `questoes_id` int(11) NOT NULL,
  `alternativa` char(1) DEFAULT NULL,
  `algoritmo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tentativas_login`
--

CREATE TABLE `tentativas_login` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id` int(11) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `professor` varchar(50) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `ano` year(4) NOT NULL,
  `semestre` varchar(8) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id`, `codigo`, `professor`, `nome`, `ano`, `semestre`, `status`) VALUES
(1, '90876tyghj', 'Deigon Prates Araujo', 'Algoritmo I', 2017, '1', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_usuario`
--

CREATE TABLE `turma_usuario` (
  `turma_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `papel_id` int(11) NOT NULL DEFAULT '2',
  `nome` varchar(45) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `turma` varchar(45) NOT NULL,
  `ano` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `semestre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `papel_id`, `nome`, `matricula`, `username`, `email`, `turma`, `ano`, `senha`, `status`, `semestre`) VALUES
(2, 1, 'Deigon Prates Araujo', '800002585', 'Deigon', 'deigonprates@gmail.com', '1', '2017', '827ccb0eea8a706c4c34a16891f84e7b', '1', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_atividade_turma1_idx` (`turma_id`);

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_avaliacao_turma1_idx` (`turma_id`);

--
-- Indexes for table `papel`
--
ALTER TABLE `papel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questoes_atividade`
--
ALTER TABLE `questoes_atividade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questoes_copy1_atividade1_idx` (`atividade_id`),
  ADD KEY `fk_questoes_copy1_tipo1_idx` (`tipo_id`);

--
-- Indexes for table `questoes_avaliacao`
--
ALTER TABLE `questoes_avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questoes_tipo1_idx` (`tipo_id`),
  ADD KEY `fk_questoes_avaliacao1_idx` (`avaliacao_id`);

--
-- Indexes for table `resposta_atividade`
--
ALTER TABLE `resposta_atividade`
  ADD PRIMARY KEY (`idresposta`),
  ADD KEY `fk_resposta_usuario1_idx` (`usuario_id`),
  ADD KEY `fk_resposta_avaliacao_copy1_questoes_copy11_idx` (`questoes_resposta_id`);

--
-- Indexes for table `resposta_avaliacao`
--
ALTER TABLE `resposta_avaliacao`
  ADD PRIMARY KEY (`idresposta`),
  ADD KEY `fk_resposta_usuario1_idx` (`usuario_id`),
  ADD KEY `fk_resposta_questoes1_idx` (`questoes_id`);

--
-- Indexes for table `tentativas_login`
--
ALTER TABLE `tentativas_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tentativas_login_usuario1_idx` (`usuario_id`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turma_usuario`
--
ALTER TABLE `turma_usuario`
  ADD PRIMARY KEY (`turma_id`,`usuario_id`),
  ADD KEY `fk_turma_has_usuario_usuario1_idx` (`usuario_id`),
  ADD KEY `fk_turma_has_usuario_turma1_idx` (`turma_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_perfil_idx` (`papel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atividade`
--
ALTER TABLE `atividade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `papel`
--
ALTER TABLE `papel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `questoes_atividade`
--
ALTER TABLE `questoes_atividade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questoes_avaliacao`
--
ALTER TABLE `questoes_avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resposta_atividade`
--
ALTER TABLE `resposta_atividade`
  MODIFY `idresposta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resposta_avaliacao`
--
ALTER TABLE `resposta_avaliacao`
  MODIFY `idresposta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tentativas_login`
--
ALTER TABLE `tentativas_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `fk_atividade_turma1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `fk_avaliacao_turma1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `questoes_atividade`
--
ALTER TABLE `questoes_atividade`
  ADD CONSTRAINT `fk_questoes_copy1_atividade1` FOREIGN KEY (`atividade_id`) REFERENCES `atividade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_questoes_copy1_tipo1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `questoes_avaliacao`
--
ALTER TABLE `questoes_avaliacao`
  ADD CONSTRAINT `fk_questoes_avaliacao1` FOREIGN KEY (`avaliacao_id`) REFERENCES `avaliacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_questoes_tipo1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `resposta_atividade`
--
ALTER TABLE `resposta_atividade`
  ADD CONSTRAINT `fk_resposta_avaliacao_copy1_questoes_copy11` FOREIGN KEY (`questoes_resposta_id`) REFERENCES `questoes_atividade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_resposta_usuario10` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `resposta_avaliacao`
--
ALTER TABLE `resposta_avaliacao`
  ADD CONSTRAINT `fk_resposta_questoes1` FOREIGN KEY (`questoes_id`) REFERENCES `questoes_avaliacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_resposta_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tentativas_login`
--
ALTER TABLE `tentativas_login`
  ADD CONSTRAINT `fk_tentativas_login_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma_usuario`
--
ALTER TABLE `turma_usuario`
  ADD CONSTRAINT `fk_turma_has_usuario_turma1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turma_has_usuario_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_perfil` FOREIGN KEY (`papel_id`) REFERENCES `papel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
