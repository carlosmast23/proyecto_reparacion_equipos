-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: reparaciones
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.38-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `establecimiento`
--

DROP TABLE IF EXISTS `establecimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `establecimiento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `establecimiento`
--

LOCK TABLES `establecimiento` WRITE;
/*!40000 ALTER TABLE `establecimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `establecimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_especifico`
--

DROP TABLE IF EXISTS `producto_especifico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto_especifico` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codigo_especifico` varchar(100) DEFAULT NULL,
  `id_producto_generico` bigint(20) NOT NULL,
  `id_establecimiento` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_especifico_FK` (`id_producto_generico`),
  KEY `producto_especifico_FK_1` (`id_establecimiento`),
  CONSTRAINT `producto_especifico_FK` FOREIGN KEY (`id_producto_generico`) REFERENCES `producto_generico` (`id`),
  CONSTRAINT `producto_especifico_FK_1` FOREIGN KEY (`id_establecimiento`) REFERENCES `establecimiento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_especifico`
--

LOCK TABLES `producto_especifico` WRITE;
/*!40000 ALTER TABLE `producto_especifico` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto_especifico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_generico`
--

DROP TABLE IF EXISTS `producto_generico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto_generico` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `id_categoria` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_generico_FK` (`id_categoria`),
  CONSTRAINT `producto_generico_FK` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_generico`
--

LOCK TABLES `producto_generico` WRITE;
/*!40000 ALTER TABLE `producto_generico` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto_generico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reparacion`
--

DROP TABLE IF EXISTS `reparacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reparacion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha_ingreso` date DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `observaciones` varchar(500) DEFAULT NULL,
  `id_producto_especifico` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reparacion_FK` (`id_producto_especifico`),
  CONSTRAINT `reparacion_FK` FOREIGN KEY (`id_producto_especifico`) REFERENCES `producto_especifico` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reparacion`
--

LOCK TABLES `reparacion` WRITE;
/*!40000 ALTER TABLE `reparacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `reparacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(500) DEFAULT NULL,
  `apellidos` varchar(500) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'reparaciones'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-22  7:13:31
