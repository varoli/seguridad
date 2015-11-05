-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.27-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema seguridad
--

CREATE DATABASE IF NOT EXISTS seguridad;
USE seguridad;

--
-- Definition of table `archivos`
--

DROP TABLE IF EXISTS `archivos`;
CREATE TABLE `archivos` (
  `id_archivo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_tipoArchivo` int(10) unsigned NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `ruta` varchar(45) NOT NULL,
  PRIMARY KEY (`id_archivo`),
  KEY `id_tipoArchivo` (`id_tipoArchivo`),
  CONSTRAINT `id_tipoArchivo` FOREIGN KEY (`id_tipoArchivo`) REFERENCES `tipoarchivo` (`id_tipoArchivo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archivos`
--

/*!40000 ALTER TABLE `archivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivos` ENABLE KEYS */;


--
-- Definition of table `bloqueoip`
--

DROP TABLE IF EXISTS `bloqueoip`;
CREATE TABLE `bloqueoip` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(45) NOT NULL,
  `fecha` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloqueoip`
--

/*!40000 ALTER TABLE `bloqueoip` DISABLE KEYS */;
INSERT INTO `bloqueoip` (`id`,`ip`,`fecha`) VALUES 
 (3,'::1','');
/*!40000 ALTER TABLE `bloqueoip` ENABLE KEYS */;


--
-- Definition of table `pass`
--

DROP TABLE IF EXISTS `pass`;
CREATE TABLE `pass` (
  `id_pass` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pass` varchar(40) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pass`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pass`
--

/*!40000 ALTER TABLE `pass` DISABLE KEYS */;
INSERT INTO `pass` (`id_pass`,`pass`,`estado`) VALUES 
 (1,'ee9f7f2ce3c81df28ab36ddb782110f086128c62',1);
/*!40000 ALTER TABLE `pass` ENABLE KEYS */;


--
-- Definition of table `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `id_persona` int(10) unsigned NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persona`
--

/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`id_persona`,`nombre`,`apellidos`) VALUES 
 (1,'Lizeth','Vassquez Rojas'),
 (2,'Javier','');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;


--
-- Definition of table `tipoarchivo`
--

DROP TABLE IF EXISTS `tipoarchivo`;
CREATE TABLE `tipoarchivo` (
  `id_tipoArchivo` int(10) unsigned NOT NULL,
  `descripArchivo` varchar(345) NOT NULL,
  PRIMARY KEY (`id_tipoArchivo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipoarchivo`
--

/*!40000 ALTER TABLE `tipoarchivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipoarchivo` ENABLE KEYS */;


--
-- Definition of table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
CREATE TABLE `tipousuario` (
  `id_tipoUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipousuario`
--

/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` (`id_tipoUsuario`,`rol`) VALUES 
 (1,'Alumno'),
 (2,'Administrador');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` varchar(10) NOT NULL,
  `intentosFallidos` int(10) unsigned NOT NULL,
  `id_tipoUsuario` int(10) unsigned NOT NULL,
  `id_persona` int(10) unsigned NOT NULL,
  `id_pass` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_pass` (`id_pass`),
  KEY `id_persona` (`id_persona`),
  KEY `id_tipoUsuario` (`id_tipoUsuario`),
  CONSTRAINT `id_pass` FOREIGN KEY (`id_pass`) REFERENCES `pass` (`id_pass`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_tipoUsuario` FOREIGN KEY (`id_tipoUsuario`) REFERENCES `tipousuario` (`id_tipoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`,`intentosFallidos`,`id_tipoUsuario`,`id_persona`,`id_pass`) VALUES 
 ('09120002',1,1,2,1),
 ('2011120175',0,2,1,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
