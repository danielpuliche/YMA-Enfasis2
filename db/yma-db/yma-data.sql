-- YMA Database Data
-- Version 1.0.0

SET NAMES utf8mb4;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';
SET @old_autocommit=@@autocommit;

USE yma_database;

--
-- Dumping data for table usuario
--

SET AUTOCOMMIT=0;
INSERT INTO usuario(`correo`, `nombres`, `apellidos`, `identificacion`, `password_usuario`) VALUES
('danielpuliche@gmail.com','Daniel','Puliche','1234567890','$2y$10$E4gzS2.vY157N0oSTfSFieBanwJ/ACbydzKqHeyZHVAXxn.VTMMWq'),  -- pass123
('danielpuliche@unicauca.edu.co','Daniel F','Puliche C','1230067890','$2y$10$zHBNk7edLt63EhSP0V6w7.lgMeH76xVyjbNw8QxPP8egUAYKoPYCm'),  -- password
('tramitador@test.com','Pepito','Perez','120067809','$2y$10$c5nzHCNweSCPSg11S0wYd.UcTdWTqeRWDzaC5zCuyMcRp5/1iTakK'),  -- tramitador123
('solicitante@test.com','Juanito','Alimaña','1000000809','$2y$10$yWl44LqJCGYUo9ZN.DUlIuQJJc4ekCFBwBj0ZyUKWEw6nIZT42NaS');  -- solicitante123
COMMIT;

--
-- Dumping data for table tramitador
--

SET AUTOCOMMIT=0;
INSERT INTO tramitador VALUES
('1'),
('3');
COMMIT;

--
-- Dumping data for table solicitante
--

SET AUTOCOMMIT=0;
INSERT INTO solicitante VALUES
('2','3123456789','Calle 0 # 0-00'),
('4','3000000000','Carrera 0 # 1-11');
COMMIT;