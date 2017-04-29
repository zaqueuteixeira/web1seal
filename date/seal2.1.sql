-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Abr-2017 às 06:24
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seal2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `papel_id` int(11) NOT NULL DEFAULT '2',
  `nome` varchar(45) NOT NULL,
  `username` varchar(50) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `ano` year(4) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `semestre` int(1) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `ativo` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `papel_id`, `nome`, `username`, `matricula`, `email`, `ano`, `senha`, `semestre`, `status`, `ativo`) VALUES
(1, 2, 'Deigon Prates Araujo', 'Deigon', '800002585', 'deigon_prates@hotmail.com', 2013, '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_atividades`
--

CREATE TABLE `alunos_atividades` (
  `alunos_id` int(11) NOT NULL,
  `avaliacoes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE `atividades` (
  `id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL DEFAULT '2',
  `conteudo` varchar(65) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataTermino` date NOT NULL,
  `nota` float NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`id`, `turma_id`, `tipo_id`, `conteudo`, `dataInicio`, `dataTermino`, `nota`, `status`) VALUES
(1, 1, 1, 'do while', '2017-05-27', '2017-05-27', 11, 1),
(2, 1, 2, 'qualquer coisa', '2017-04-27', '2017-04-28', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `descricao`) VALUES
(1, 'objetiva'),
(2, 'subjetiva');

-- --------------------------------------------------------

--
-- Estrutura da tabela `monitores`
--

CREATE TABLE `monitores` (
  `id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `papel_id` int(11) NOT NULL DEFAULT '3',
  `matricula` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `semestre` int(11) NOT NULL,
  `ano` year(4) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ativo` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1',
  `username` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `monitores`
--

INSERT INTO `monitores` (`id`, `turma_id`, `papel_id`, `matricula`, `email`, `nome`, `semestre`, `ano`, `senha`, `ativo`, `status`, `username`) VALUES
(1, 1, 3, '80000123', 'teste@tete.com', 'teste', 1, 2017, '827ccb0eea8a706c4c34a16891f84e7b', 0, 1, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis`
--

CREATE TABLE `niveis` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `niveis`
--

INSERT INTO `niveis` (`id`, `descricao`) VALUES
(1, 'fácil'),
(2, 'médio '),
(3, 'difícil ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `papeis`
--

CREATE TABLE `papeis` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `papeis`
--

INSERT INTO `papeis` (`id`, `descricao`) VALUES
(1, 'professor'),
(2, 'aluno'),
(3, 'monitor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `username` varchar(50) NOT NULL,
  `papel_id` int(11) NOT NULL DEFAULT '1',
  `matricula` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ativo` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `nome`, `username`, `papel_id`, `matricula`, `senha`, `email`, `ativo`, `status`) VALUES
(1, 'Cimara Souza', 'Cimara', 1, '80000666', '827ccb0eea8a706c4c34a16891f84e7b', 'cimara@ifbaiano.edu.br', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores_turmas`
--

CREATE TABLE `professores_turmas` (
  `professor_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE `questoes` (
  `id` int(11) NOT NULL,
  `nivel_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `atividade_id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `pergunta` blob NOT NULL,
  `alternativa_a` blob,
  `alternativa_b` blob,
  `alternativa_c` blob,
  `alternativa_d` blob,
  `alternativa_e` blob,
  `status` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `alunos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `questoes_id` int(11) NOT NULL,
  `resposta` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solucoes`
--

CREATE TABLE `solucoes` (
  `id` int(11) NOT NULL,
  `questoes_id` int(11) NOT NULL,
  `solucao` blob NOT NULL,
  `alternativa` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tentativas_login`
--

CREATE TABLE `tentativas_login` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipos`
--

INSERT INTO `tipos` (`id`, `descricao`) VALUES
(1, 'atividade avaliativa '),
(2, 'atividade para estudos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(11) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `professor` varchar(50) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `ano` year(4) NOT NULL,
  `semestre` int(1) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `codigo`, `professor`, `nome`, `ano`, `semestre`, `status`) VALUES
(1, 'algo66f6ds', 'Cimara Souza', 'algoritmo I', 2017, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula_UNIQUE` (`matricula`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_aluno_papel1_idx` (`papel_id`);

--
-- Indexes for table `alunos_atividades`
--
ALTER TABLE `alunos_atividades`
  ADD KEY `fk_alunos_has_avaliacoes_avaliacoes1_idx` (`avaliacoes_id`),
  ADD KEY `fk_alunos_has_avaliacoes_alunos_idx` (`alunos_id`);

--
-- Indexes for table `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_avaliacoes_turma1_idx` (`turma_id`),
  ADD KEY `fk_avaliacoes_tipo1_idx` (`tipo_id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitores`
--
ALTER TABLE `monitores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maticula_UNIQUE` (`matricula`),
  ADD KEY `fk_monitor_turma1_idx` (`turma_id`),
  ADD KEY `fk_monitor_papel1_idx` (`papel_id`);

--
-- Indexes for table `niveis`
--
ALTER TABLE `niveis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papeis`
--
ALTER TABLE `papeis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificacao_UNIQUE` (`matricula`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_professor_papel1_idx` (`papel_id`);

--
-- Indexes for table `professores_turmas`
--
ALTER TABLE `professores_turmas`
  ADD KEY `fk_professor_has_turma_turma1_idx` (`turma_id`),
  ADD KEY `fk_professor_has_turma_professor1_idx` (`professor_id`);

--
-- Indexes for table `questoes`
--
ALTER TABLE `questoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questoes_nivel1_idx` (`nivel_id`),
  ADD KEY `fk_questoes_atividade1_idx` (`atividade_id`),
  ADD KEY `fk_questoes_categoria1_idx` (`categoria_id`);

--
-- Indexes for table `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_matricula_turma1_idx` (`turma_id`),
  ADD KEY `fk_matricula_alunos1_idx` (`alunos_id`);

--
-- Indexes for table `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_respostas_questoes1_idx` (`questoes_id`);

--
-- Indexes for table `solucoes`
--
ALTER TABLE `solucoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gabaritos_questoes1_idx` (`questoes_id`);

--
-- Indexes for table `tentativas_login`
--
ALTER TABLE `tentativas_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `alunos_atividades`
--
ALTER TABLE `alunos_atividades`
  MODIFY `alunos_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `atividades`
--
ALTER TABLE `atividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `monitores`
--
ALTER TABLE `monitores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `niveis`
--
ALTER TABLE `niveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `papeis`
--
ALTER TABLE `papeis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `professores_turmas`
--
ALTER TABLE `professores_turmas`
  MODIFY `professor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questoes`
--
ALTER TABLE `questoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `solucoes`
--
ALTER TABLE `solucoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tentativas_login`
--
ALTER TABLE `tentativas_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `fk_aluno_papel1` FOREIGN KEY (`papel_id`) REFERENCES `papeis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `alunos_atividades`
--
ALTER TABLE `alunos_atividades`
  ADD CONSTRAINT `fk_alunos_has_avaliacoes_alunos` FOREIGN KEY (`alunos_id`) REFERENCES `alunos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alunos_has_avaliacoes_avaliacoes1` FOREIGN KEY (`avaliacoes_id`) REFERENCES `atividades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `atividades`
--
ALTER TABLE `atividades`
  ADD CONSTRAINT `fk_avaliacoes_tipo1` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_avaliacoes_turma1` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `monitores`
--
ALTER TABLE `monitores`
  ADD CONSTRAINT `fk_monitor_papel1` FOREIGN KEY (`papel_id`) REFERENCES `papeis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_monitor_turma1` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professores`
--
ALTER TABLE `professores`
  ADD CONSTRAINT `fk_professor_papel1` FOREIGN KEY (`papel_id`) REFERENCES `papeis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professores_turmas`
--
ALTER TABLE `professores_turmas`
  ADD CONSTRAINT `fk_professor_has_turma_professor1` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_professor_has_turma_turma1` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `questoes`
--
ALTER TABLE `questoes`
  ADD CONSTRAINT `fk_questoes_atividade1` FOREIGN KEY (`atividade_id`) REFERENCES `atividades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_questoes_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_questoes_nivel1` FOREIGN KEY (`nivel_id`) REFERENCES `niveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `fk_matricula_alunos1` FOREIGN KEY (`alunos_id`) REFERENCES `alunos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matricula_turma1` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `fk_respostas_questoes1` FOREIGN KEY (`questoes_id`) REFERENCES `questoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `solucoes`
--
ALTER TABLE `solucoes`
  ADD CONSTRAINT `fk_gabaritos_questoes1` FOREIGN KEY (`questoes_id`) REFERENCES `questoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
