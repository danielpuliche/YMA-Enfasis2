-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2022 at 01:34 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yma_database`
--
CREATE DATABASE IF NOT EXISTS `yma_database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `yma_database`;

-- --------------------------------------------------------

--
-- Table structure for table `documento`
--

DROP TABLE IF EXISTS `documento`;
CREATE TABLE `documento` (
  `documento_id` smallint(5) UNSIGNED NOT NULL,
  `tramite_id` smallint(5) UNSIGNED NOT NULL,
  `file` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `solicitante`
--

DROP TABLE IF EXISTS `solicitante`;
CREATE TABLE `solicitante` (
  `solicitante_id` smallint(5) UNSIGNED NOT NULL,
  `telefono` varchar(14) NOT NULL,
  `direccion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `solicitante`
--

INSERT INTO `solicitante` (`solicitante_id`, `telefono`, `direccion`) VALUES
(2, '3123456789', 'Calle 0 # 0-00'),
(4, '3000000000', 'Carrera 0 # 1-11'),
(7, '1', 'Calle 1'),
(11, '2', 'Calle 2');

-- --------------------------------------------------------

--
-- Table structure for table `tramitador`
--

DROP TABLE IF EXISTS `tramitador`;
CREATE TABLE `tramitador` (
  `tramitador_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tramitador`
--

INSERT INTO `tramitador` (`tramitador_id`) VALUES
(1),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `tramite`
--

DROP TABLE IF EXISTS `tramite`;
CREATE TABLE `tramite` (
  `tramite_id` smallint(5) UNSIGNED NOT NULL,
  `solicitante_id` smallint(5) UNSIGNED NOT NULL,
  `tramitador_id` smallint(5) UNSIGNED DEFAULT NULL,
  `eps` varchar(20) DEFAULT NULL,
  `regimen` enum('Contributivo','Subsidiado') DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `precio_ini` double DEFAULT NULL,
  `estado_tramite` enum('Espera','Negociacion','Proceso','Finalizado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tramite`
--

INSERT INTO `tramite` (`tramite_id`, `solicitante_id`, `tramitador_id`, `eps`, `regimen`, `precio`, `precio_ini`, `estado_tramite`) VALUES
(1, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Negociacion'),
(2, 4, 3, 'Nueva EPS', 'Contributivo', 8000, NULL, 'Proceso'),
(3, 4, 1, 'Sanitas', 'Subsidiado', 5000, NULL, 'Finalizado'),
(4, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Proceso'),
(5, 2, 3, 'Sanitas', 'Contributivo', 9000, NULL, 'Finalizado'),
(6, 7, 1, 'Emmsanar', 'Subsidiado', 5000, NULL, 'Finalizado'),
(7, 7, 1, 'Sanitas', 'Contributivo', 10000, NULL, 'Finalizado'),
(8, 7, 3, 'Emmsanar', 'Contributivo', 5000, NULL, 'Finalizado'),
(9, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Proceso'),
(10, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Negociacion'),
(11, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Proceso'),
(12, 4, 3, 'Nueva EPS', 'Contributivo', 8000, NULL, 'Proceso'),
(13, 4, 1, 'Sanitas', 'Subsidiado', 5000, NULL, 'Proceso'),
(14, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Proceso'),
(15, 2, 3, 'Sanitas', 'Contributivo', 9000, NULL, 'Finalizado'),
(16, 7, 1, 'Emmsanar', 'Subsidiado', 5000, NULL, 'Finalizado'),
(17, 7, 1, 'Sanitas', 'Contributivo', 10000, NULL, 'Finalizado'),
(18, 7, 3, 'Emmsanar', 'Contributivo', 5000, NULL, 'Negociacion'),
(19, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Proceso'),
(20, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Proceso'),
(21, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Finalizado'),
(22, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Proceso'),
(23, 4, 3, 'Nueva EPS', 'Contributivo', 8000, NULL, 'Proceso'),
(24, 4, 1, 'Sanitas', 'Subsidiado', 5000, NULL, 'Proceso'),
(25, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Negociacion'),
(26, 2, 3, 'Sanitas', 'Contributivo', 9000, NULL, 'Negociacion'),
(27, 7, 1, 'Emmsanar', 'Subsidiado', 5000, NULL, 'Finalizado'),
(28, 7, 1, 'Sanitas', 'Contributivo', 10000, NULL, 'Finalizado'),
(29, 7, 3, 'Emmsanar', 'Contributivo', 5000, NULL, 'Finalizado'),
(30, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Proceso'),
(31, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Finalizado'),
(32, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Proceso'),
(33, 4, 3, 'Nueva EPS', 'Contributivo', 8000, NULL, 'Proceso'),
(34, 4, 1, 'Sanitas', 'Subsidiado', 5000, NULL, 'Proceso'),
(35, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Finalizado'),
(36, 2, 3, 'Sanitas', 'Contributivo', 9000, NULL, 'Finalizado'),
(37, 7, 1, 'Emmsanar', 'Subsidiado', 5000, NULL, 'Finalizado'),
(38, 7, 1, 'Sanitas', 'Contributivo', 10000, NULL, 'Finalizado'),
(39, 7, 3, 'Emmsanar', 'Contributivo', 5000, NULL, 'Finalizado'),
(40, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Proceso'),
(41, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Proceso'),
(42, 2, 3, 'Sanitas', 'Contributivo', 5000, NULL, 'Proceso'),
(43, 4, 3, 'Sanitas', 'Subsidiado', 11000, NULL, 'Proceso'),
(44, 4, 3, 'Sanitas', 'Subsidiado', 7000, NULL, 'Proceso'),
(45, 4, 3, 'Coomeva', 'Subsidiado', 8000, NULL, 'Proceso'),
(46, 4, NULL, 'Coomeva', 'Contributivo', 8500, 8500, 'Espera'),
(47, 4, 3, 'Coomeva', 'Contributivo', 10000, 7000, 'Proceso'),
(48, 4, 3, 'Nueva EPS', 'Subsidiado', 8000, 7000, 'Proceso');

-- --------------------------------------------------------

--
-- Table structure for table `tramite_citamedica`
--

DROP TABLE IF EXISTS `tramite_citamedica`;
CREATE TABLE `tramite_citamedica` (
  `tramite_citamedica_id` smallint(5) UNSIGNED NOT NULL,
  `especialidad` enum('Alergología','Anestesiología','Angiología','Cardiología','Endocrinología','Estomatología','Farmacología Clínica','Gastroenterología','Genética','Geriatría','Hematología','Hepatología','Infectología','Medicina aeroespacial','Medicina del deporte','Medicina familiar y comunitaria','Medicina física y rehabilitación','Medicina forense','Medicina intensiva','Medicina interna','Medicina preventiva y salud pública','Medicina del trabajo','Nefrología','Neumología','Neurología','Nutriología','Oncología radioterápica','Pediatría','Psiquiatría','Reumatología','Toxicología') DEFAULT NULL,
  `fecha_disponible` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tramite_citamedica`
--

INSERT INTO `tramite_citamedica` (`tramite_citamedica_id`, `especialidad`, `fecha_disponible`) VALUES
(1, 'Alergología', '2022-03-01'),
(2, 'Genética', '2022-03-01'),
(3, 'Hematología', '2022-03-01'),
(4, 'Neumología', '2022-03-01'),
(5, 'Hepatología', '2022-03-01'),
(6, 'Nefrología', '2022-03-01'),
(7, 'Medicina intensiva', '2022-03-01'),
(8, 'Reumatología', '2022-03-01'),
(9, 'Alergología', '2022-03-01'),
(10, 'Genética', '2022-03-01'),
(11, 'Hematología', '2022-03-01'),
(12, 'Neumología', '2022-03-01'),
(13, 'Hepatología', '2022-03-01'),
(14, 'Nefrología', '2022-03-01'),
(15, 'Medicina intensiva', '2022-03-01'),
(16, 'Reumatología', '2022-03-01'),
(17, 'Toxicología', '2022-03-01'),
(18, 'Hepatología', '2022-03-01'),
(19, 'Nutriología', '2022-03-01'),
(20, 'Pediatría', '2022-03-01'),
(21, 'Reumatología', '2022-03-01'),
(43, 'Neurología', '2022-03-18'),
(44, 'Reumatología', '2022-03-25'),
(45, 'Medicina física y rehabilitación', '2022-04-02'),
(47, 'Medicina del deporte', '2022-03-04'),
(48, 'Genética', '2022-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `tramite_medicamentos`
--

DROP TABLE IF EXISTS `tramite_medicamentos`;
CREATE TABLE `tramite_medicamentos` (
  `tramite_medicamentos_id` smallint(5) UNSIGNED NOT NULL,
  `medicamentos` varchar(100) NOT NULL,
  `direccion_recogida` varchar(50) NOT NULL,
  `direccion_entrega` varchar(50) NOT NULL,
  `fecha_entrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tramite_medicamentos`
--

INSERT INTO `tramite_medicamentos` (`tramite_medicamentos_id`, `medicamentos`, `direccion_recogida`, `direccion_entrega`, `fecha_entrega`) VALUES
(22, 'Aspirina', 'Carrera 9 # 7-77', 'Calle 72 D Nte # 5F Este - 09', '2022-03-01'),
(23, 'Acetaminofen', 'Carrera 9 # 7-77', 'Calle 72 D Nte # 5F Este - 09', '2022-03-01'),
(24, 'Ibuprofeno', 'Carrera 9 # 7-77', 'Calle 72 D Nte # 5F Este - 09', '2022-03-01'),
(25, 'Aspirina', 'Calle 72 D Nte # 5F Este - 09', 'Carrera 9 # 7-77', '2022-03-01'),
(26, 'Ibuprofeno', 'Calle 72 D Nte # 5F Este - 09', 'Carrera 9 # 7-77', '2022-03-01'),
(27, 'Aspirina', 'Carrera 9 # 7-77', 'Calle 72 D Nte # 5F Este - 09', '2022-03-01'),
(28, 'Aspirina', 'Carrera 9 # 7-77', 'Calle 72 D Nte # 5F Este - 09', '2022-03-01'),
(29, 'Acetaminofen', 'Calle 72 D Nte # 5F Este - 09', 'Carrera 9 # 7-77', '2022-03-01'),
(30, 'Ibuprofeno', 'Carrera 9 # 7-77', 'Calle 72 D Nte # 5F Este - 09', '2022-03-01'),
(31, 'Aspirina', 'Calle 72 D Nte # 5F Este - 09', 'Carrera 9 # 7-77', '2022-03-01'),
(32, 'Aspirina', 'Calle 72 D Nte # 5F Este - 09', 'Carrera 9 # 7-77', '2022-03-01'),
(33, 'Aspirina', 'Carrera 9 # 7-77', 'Calle 72 D Nte # 5F Este - 09', '2022-03-01'),
(34, 'Acetaminofen', 'Carrera 9 # 7-77', 'Calle 72 D Nte # 5F Este - 09', '2022-03-01'),
(35, 'Ibuprofeno', 'Calle 72 D Nte # 5F Este - 09', 'Carrera 9 # 7-77', '2022-03-01'),
(36, 'Aspirina', 'Carrera 9 # 7-77', 'Calle 72 D Nte # 5F Este - 09', '2022-03-01'),
(37, 'Aspirina', 'Carrera 9 # 7-77', 'Calle 72 D Nte # 5F Este - 09', '2022-03-01'),
(38, 'Aspirina', 'Carrera 9 # 7-77', 'Calle 72 D Nte # 5F Este - 09', '2022-03-01'),
(39, 'Acetaminofen', 'Calle 72 D Nte # 5F Este - 09', 'Carrera 9 # 7-77', '2022-03-01'),
(40, 'Aspirina', 'Carrera 9 # 7-77', 'Calle 72 D Nte # 5F Este - 09', '2022-03-01'),
(41, 'Ibuprofeno', 'Calle 72 D Nte # 5F Este - 09', 'Carrera 9 # 7-77', '2022-03-01'),
(42, 'Acetaminofen', 'Carrera 9 # 7-77', 'Calle 72 D Nte # 5F Este - 09', '2022-03-01'),
(46, 'Ibuprofeno', 'Calle 2', 'Carrera 5', '2022-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `usuario_id` smallint(5) UNSIGNED NOT NULL,
  `correo` varchar(50) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `identificacion` varchar(15) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `password_usuario` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `correo`, `nombres`, `identificacion`, `apellidos`, `password_usuario`) VALUES
(1, 'fredyromero@gmail.com', 'Fredy', '1234567890', 'Romero', '$2y$10$E4gzS2.vY157N0oSTfSFieBanwJ/ACbydzKqHeyZHVAXxn.VTMMWq'),
(2, 'danielpuliche@unicauca.edu.co', 'Daniel F', '1230067890', 'Puliche C', '$2y$10$zHBNk7edLt63EhSP0V6w7.lgMeH76xVyjbNw8QxPP8egUAYKoPYCm'),
(3, 'tramitador@test.com', 'Pepito', '120067809', 'Perez', '$2y$10$c5nzHCNweSCPSg11S0wYd.UcTdWTqeRWDzaC5zCuyMcRp5/1iTakK'),
(4, 'solicitante@test.com', 'Juanito', '1000000809', 'Alimaña', '$2y$10$yWl44LqJCGYUo9ZN.DUlIuQJJc4ekCFBwBj0ZyUKWEw6nIZT42NaS'),
(7, 'carlost@test.com', 'Carlos', '1', 'Torres', '$2y$10$azUlyIia0tMiIaiTAQ.nM.YGfO6ctZUCkona2Bhprb/uIOC4kqlxK'),
(11, 'carlostorres@test.com', 'Carlos', '2', 'Torres', '$2y$10$5eJVHb/OE.PtDQx2pzhWF.7nF4/SZZA5G2GMChFYG1K0Wk03c47pG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`documento_id`),
  ADD KEY `tramite_id` (`tramite_id`);

--
-- Indexes for table `solicitante`
--
ALTER TABLE `solicitante`
  ADD PRIMARY KEY (`solicitante_id`);

--
-- Indexes for table `tramitador`
--
ALTER TABLE `tramitador`
  ADD PRIMARY KEY (`tramitador_id`);

--
-- Indexes for table `tramite`
--
ALTER TABLE `tramite`
  ADD PRIMARY KEY (`tramite_id`),
  ADD KEY `solicitante_id` (`solicitante_id`),
  ADD KEY `tramitador_id` (`tramitador_id`);

--
-- Indexes for table `tramite_citamedica`
--
ALTER TABLE `tramite_citamedica`
  ADD PRIMARY KEY (`tramite_citamedica_id`);

--
-- Indexes for table `tramite_medicamentos`
--
ALTER TABLE `tramite_medicamentos`
  ADD PRIMARY KEY (`tramite_medicamentos_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documento`
--
ALTER TABLE `documento`
  MODIFY `documento_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tramite`
--
ALTER TABLE `tramite`
  MODIFY `tramite_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `documento_ibfk_1` FOREIGN KEY (`tramite_id`) REFERENCES `tramite` (`tramite_id`) ON UPDATE CASCADE;

--
-- Constraints for table `solicitante`
--
ALTER TABLE `solicitante`
  ADD CONSTRAINT `solicitante_ibfk_1` FOREIGN KEY (`solicitante_id`) REFERENCES `usuario` (`usuario_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tramitador`
--
ALTER TABLE `tramitador`
  ADD CONSTRAINT `tramitador_ibfk_1` FOREIGN KEY (`tramitador_id`) REFERENCES `usuario` (`usuario_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tramite`
--
ALTER TABLE `tramite`
  ADD CONSTRAINT `tramite_ibfk_1` FOREIGN KEY (`solicitante_id`) REFERENCES `solicitante` (`solicitante_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tramite_ibfk_2` FOREIGN KEY (`tramitador_id`) REFERENCES `tramitador` (`tramitador_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tramite_citamedica`
--
ALTER TABLE `tramite_citamedica`
  ADD CONSTRAINT `tramite_citamedica_ibfk_1` FOREIGN KEY (`tramite_citamedica_id`) REFERENCES `tramite` (`tramite_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tramite_medicamentos`
--
ALTER TABLE `tramite_medicamentos`
  ADD CONSTRAINT `tramite_medicamentos_ibfk_1` FOREIGN KEY (`tramite_medicamentos_id`) REFERENCES `tramite` (`tramite_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
