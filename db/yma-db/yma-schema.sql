-- YMA Database Schema
-- Version 1.0.0

SET NAMES utf8mb4;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

-- Limpieza y creación de DB

DROP SCHEMA IF EXISTS yma_database;
CREATE SCHEMA yma_database;
USE yma_database;

--
-- Table structure for table `usuario`
--

CREATE TABLE usuario (
  usuario_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  correo VARCHAR(50) NOT NULL UNIQUE,
  nombres VARCHAR(45) NOT NULL,
  apellidos VARCHAR(45) NOT NULL,
  password_usuario VARCHAR(60) COLLATE utf8mb4_bin,
   PRIMARY KEY (usuario_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `tramitador`
--

CREATE TABLE tramitador (
  usuario_id SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY (usuario_id),
  FOREIGN KEY (usuario_id) REFERENCES usuario (usuario_id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `solicitante`
--

CREATE TABLE solicitante (
  usuario_id SMALLINT UNSIGNED NOT NULL,
  telefono VARCHAR(14) NOT NULL,
  direccion VARCHAR(45) NOT NULL,
  PRIMARY KEY (usuario_id),
  FOREIGN KEY (usuario_id) REFERENCES usuario (usuario_id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `tramite`
--

CREATE TABLE tramite (
  tramite_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  solicitante_id SMALLINT UNSIGNED NOT NULL,
  tramitador_id SMALLINT UNSIGNED NOT NULL,
  eps VARCHAR(20),
  regimen ENUM('Contributivo','Subsidiado'),
  precio DOUBLE(6,2),
  estado_tramite ENUM('Espera','Negociacion','Proceso','Finalizado') NOT NULL,
  PRIMARY KEY (tramite_id),
  FOREIGN KEY (solicitante_id) REFERENCES solicitante(usuario_id) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (tramitador_id) REFERENCES tramitador(usuario_id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `tramite_citamedica`
--

CREATE TABLE tramite_citamedica (
  tramite_citamedica_id SMALLINT UNSIGNED NOT NULL,
  especialidad ENUM('1','2'),
  fecha_disponible DATE NOT NULL,
  PRIMARY KEY (tramite_citamedica_id),
  FOREIGN KEY (tramite_citamedica_id) REFERENCES tramite(tramite_id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `tramite_medicamentos`
--

CREATE TABLE tramite_medicamentos (
  tramite_medicamentos_id SMALLINT UNSIGNED NOT NULL,
  medicamentos VARCHAR(100) NOT NULL,
  direccion_recogida VARCHAR(50) NOT NULL,
  direccion_entrega VARCHAR(50) NOT NULL,
  fecha_entrega DATE NOT NULL,
  PRIMARY KEY (tramite_medicamentos_id),
  FOREIGN KEY (tramite_medicamentos_id) REFERENCES tramite(tramite_id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `documento`
--

CREATE TABLE documento (
  documento_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  tramite_id SMALLINT UNSIGNED NOT NULL,
  file MEDIUMBLOB NOT NULL,
  PRIMARY KEY (documento_id),
  FOREIGN KEY (tramite_id) REFERENCES tramite (tramite_id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;