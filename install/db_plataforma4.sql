-- MySQL dump 10.13  Distrib 5.5.24, for osx10.6 (i386)
--
-- Host: localhost    Database: educacion
-- ------------------------------------------------------
-- Server version	5.5.24

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
-- Table structure for table `avi_entrantes`
--
use db_monitoreo_gcba;

DROP TABLE IF EXISTS `avi_entrantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `avi_entrantes` (
  `ave_key` int(11) NOT NULL,
  `ave_tstamp` datetime NOT NULL,
  `avs_code` int(11) NOT NULL,
  `ave_headers` varchar(500) DEFAULT NULL,
  `ave_subject` varchar(200) DEFAULT NULL,
  `ave_body` varchar(8000) DEFAULT NULL,
  `ave_body_alt` varchar(8000) DEFAULT NULL,
  `ave_from` varchar(100) DEFAULT NULL,
  `ave_status` varchar(50) DEFAULT NULL,
  `ave_attachments` varchar(5) DEFAULT NULL,
  `avm_key` int(11) DEFAULT NULL,
  PRIMARY KEY (`ave_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avi_entrantes`
--

LOCK TABLES `avi_entrantes` WRITE;
/*!40000 ALTER TABLE `avi_entrantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `avi_entrantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avi_eventos`
--

DROP TABLE IF EXISTS `avi_eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avi_eventos` (
  `ave_code` varchar(50) NOT NULL,
  `cco_code` int(10) NOT NULL,
  `avr_type` varchar(50) DEFAULT NULL,
  `avr_status` varchar(20) DEFAULT NULL,
  `ave_template` varchar(100) DEFAULT NULL,
  `ave_filtro` varchar(50) DEFAULT NULL,
  `ave_filtro_valor` varchar(50) DEFAULT NULL,
  `ave_filtro2` varchar(50) DEFAULT NULL,
  `ave_filtro2_valor` varchar(50) DEFAULT NULL,
  `ave_key` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avi_eventos`
--

LOCK TABLES `avi_eventos` WRITE;
/*!40000 ALTER TABLE `avi_eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `avi_eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avi_mensajes`
--

DROP TABLE IF EXISTS `avi_mensajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avi_mensajes` (
  `avm_key` int(11) NOT NULL,
  `avm_tstamp` datetime NOT NULL,
  `avm_tstamp_send` datetime DEFAULT NULL,
  `avm_descr` varchar(100) DEFAULT NULL,
  `avm_class` varchar(100) DEFAULT NULL,
  `avm_code` varchar(100) DEFAULT NULL,
  `avm_email` varchar(100) DEFAULT NULL,
  `avm_template` varchar(100) DEFAULT NULL,
  `avm_opt` varchar(100) DEFAULT NULL,
  `avm_status` varchar(100) DEFAULT NULL,
  `avm_intentos` int(11) DEFAULT NULL,
  `avm_error` varchar(500) DEFAULT NULL,
  `tev_key` int(11) DEFAULT NULL,
  `avm_body` text,
  `avm_attachments` text,
  `avs_code` int(11) DEFAULT NULL,
  `avm_headers` varchar(512) DEFAULT NULL,
  `avm_xid` varchar(40) DEFAULT NULL,
  `avm_follow_up` varchar(200) DEFAULT NULL,
  `avm_follow_key` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`avm_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avi_mensajes`
--

LOCK TABLES `avi_mensajes` WRITE;
/*!40000 ALTER TABLE `avi_mensajes` DISABLE KEYS */;
/*!40000 ALTER TABLE `avi_mensajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avi_servers`
--

DROP TABLE IF EXISTS `avi_servers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avi_servers` (
  `avs_code` int(11) NOT NULL,
  `avs_server_type` varchar(30) DEFAULT NULL,
  `avs_host` varchar(100) DEFAULT NULL,
  `avs_user` varchar(50) DEFAULT NULL,
  `avs_password` varchar(200) DEFAULT NULL,
  `avs_account` varchar(100) DEFAULT NULL,
  `avs_direction` varchar(30) DEFAULT NULL,
  `use_code` varchar(50) DEFAULT NULL,
  `avs_status` varchar(50) DEFAULT NULL,
  `avs_tstamp` datetime DEFAULT NULL,
  `avs_account_name` varchar(100) DEFAULT NULL,
  `avs_class` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`avs_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avi_servers`
--

LOCK TABLES `avi_servers` WRITE;
/*!40000 ALTER TABLE `avi_servers` DISABLE KEYS */;
INSERT INTO `avi_servers` VALUES (1,'SMTP','cpdmta.nbia.com.ar','','','noreply@bancoindustrial.com.ar','OUT','1','ACTIVO','2011-10-28 13:37:39','Pago a Proveedores','');
/*!40000 ALTER TABLE `avi_servers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_value`
--

DROP TABLE IF EXISTS `cat_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_value` (
  `vli_code` varchar(50) NOT NULL,
  `val_value` varchar(200) NOT NULL,
  `val_order` int(11) DEFAULT NULL,
  `cas_code` varchar(50) DEFAULT NULL,
  `cas_value` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_value`
--

LOCK TABLES `cat_value` WRITE;
/*!40000 ALTER TABLE `cat_value` DISABLE KEYS */;
INSERT INTO `cat_value` VALUES ('languages','Español',1,NULL,''),('skins','default',1,NULL,''),('status_user','ACTIVO',1,NULL,''),('status_user','INACTIVO',2,NULL,''),('status_user','SUSPENDIDO',3,NULL,'');
/*!40000 ALTER TABLE `cat_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_value_list`
--

DROP TABLE IF EXISTS `cat_value_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_value_list` (
  `vli_code` varchar(50) NOT NULL,
  `vli_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_value_list`
--

LOCK TABLES `cat_value_list` WRITE;
/*!40000 ALTER TABLE `cat_value_list` DISABLE KEYS */;
INSERT INTO `cat_value_list` VALUES ('languages','Idiomas soportados'),('skins','Estilos graficos'),('status_user','Estados posibles de un usuario');
/*!40000 ALTER TABLE `cat_value_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doc_documents`
--

DROP TABLE IF EXISTS `doc_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doc_documents` (
  `doc_code` varchar(100) NOT NULL,
  `doc_storage` varchar(200) NOT NULL,
  `doc_name` varchar(200) DEFAULT NULL,
  `doc_tstamp` datetime DEFAULT NULL,
  `doc_mime` varchar(50) DEFAULT NULL,
  `doc_size` int(11) DEFAULT NULL,
  `acl_code` int(11) DEFAULT NULL,
  `use_code` varchar(50) DEFAULT NULL,
  `doc_extension` varchar(10) DEFAULT NULL,
  `doc_version` int(11) DEFAULT NULL,
  `doc_note` varchar(200) DEFAULT NULL,
  `doc_type` varchar(20) DEFAULT NULL,
  `doc_folder` varchar(200) DEFAULT NULL,
  `doc_deleted` varchar(1) DEFAULT NULL,
  `doc_public` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`doc_code`,`doc_storage`),
  UNIQUE KEY `pk_doc_documents` (`doc_code`,`doc_storage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_documents`
--

LOCK TABLES `doc_documents` WRITE;
/*!40000 ALTER TABLE `doc_documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `doc_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rss_content`
--

DROP TABLE IF EXISTS `rss_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rss_content` (
  `rss_code` varchar(50) NOT NULL,
  `rsc_code` int(11) DEFAULT NULL,
  `rsc_publish_tstamp` datetime DEFAULT NULL,
  `rsc_remove_tstamp` datetime DEFAULT NULL,
  `use_code` varchar(50) DEFAULT NULL,
  `rsc_content` varchar(5000) DEFAULT NULL,
  `rsc_title` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rss_content`
--

LOCK TABLES `rss_content` WRITE;
/*!40000 ALTER TABLE `rss_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `rss_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rss_links`
--

DROP TABLE IF EXISTS `rss_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rss_links` (
  `rss_code` varchar(50) NOT NULL,
  `rss_url` varchar(200) DEFAULT NULL,
  `rss_note` varchar(500) DEFAULT NULL,
  `rss_type` varchar(50) DEFAULT NULL,
  `rss_logo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rss_links`
--

LOCK TABLES `rss_links` WRITE;
/*!40000 ALTER TABLE `rss_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `rss_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_acl`
--

DROP TABLE IF EXISTS `sec_acl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_acl` (
  `acl_code` int(11) NOT NULL,
  `ugr_code` varchar(50) NOT NULL,
  `use_code` varchar(50) NOT NULL,
  `can_read` char(1) DEFAULT NULL,
  `can_write` char(1) DEFAULT NULL,
  `can_delete` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `sec_groups`
--

DROP TABLE IF EXISTS `sec_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_groups` (
  `gro_code` varchar(50) NOT NULL,
  `gro_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_groups`
--

LOCK TABLES `sec_groups` WRITE;
/*!40000 ALTER TABLE `sec_groups` DISABLE KEYS */;
INSERT INTO `sec_groups` VALUES 
('ControlTotal','Control total');
/*!40000 ALTER TABLE `sec_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_modules`
--

DROP TABLE IF EXISTS `sec_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_modules` (
  `smo_code` int(11) NOT NULL,
  `smo_name` varchar(100) DEFAULT NULL,
  `smo_version` varchar(50) DEFAULT NULL,
  `smo_db_version` varchar(50) DEFAULT NULL,
  `smo_status` varchar(50) DEFAULT NULL,
  `smo_path` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`smo_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_modules`
--

LOCK TABLES `sec_modules` WRITE;
/*!40000 ALTER TABLE `sec_modules` DISABLE KEYS */;
INSERT INTO `sec_modules` 
VALUES (10,'DOCMANAGER2','1.0','1.0','ACTIVO','FWK.docmgr2'),
(11,'GEOREF','1.0','1.0','ACTIVO','FWK.georef'),
(12,'MESSAGING','1.0','1.0','ACTIVO','FWK.messaging'),
(13,'RSS','1.0','1.0','ACTIVO','FWK.rss'),
(14,'SECURITY','1.0','1.0','ACTIVO','FWK.security'),
(15,'SETUP','1.0','1.0','ACTIVO','FWK.setup'),
(16,'TRANSACCIONES','1.0','1.0','ACTIVO','FWK.transactions'),
(22,'EVENTS','1.0','1.0','ACTIVO','FWK.events'),
(23,'HOME','1.0','1.0','ACTIVO','FWK.home');
/*!40000 ALTER TABLE `sec_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_parameters`
--

DROP TABLE IF EXISTS `sec_parameters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_parameters` (
  `par_code` varchar(200) NOT NULL,
  `par_value` varchar(200) DEFAULT NULL,
  `par_description` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sec_rights`
--

DROP TABLE IF EXISTS `sec_rights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_rights` (
  `rig_name` varchar(200) NOT NULL,
  `rig_description` varchar(200) DEFAULT NULL,
  `rig_check` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_rights`
--
INSERT INTO `sec_rights` VALUES 
('menu.archivo.parametros','Permiso para modificar la parametrizacion','Y'),
('menu.ayuda.faq','Permiso para consultar el FAQ','Y'),
('menu.ayuda.manual_reseller','Permiso para consultar el manual reseller','N'),
('menu.ayuda.manual_telefonia','Permiso para consultar el manual gestion telefonia','N'),
('menu.archivo.configuracion','Permiso para la gestion de modulos','Y'),
('menu.trans','Permiso para la gestion de transacciones','Y'),
('menu.trans.consulta','Permiso para la consulta de transacciones','Y'),
('menu.trans.procesos','Permiso para la consulta de procesos','Y'),
('menu.trans.eventos','Permiso para la gestion de eventos','Y'),
('menu.trans.transacciones','Permiso para la gestion de transacciones','Y'),
('menu.trans.bugtrack','Permiso para la gestion de bugs','Y'),
('menu.trans.bugtrack.new','Permiso para el ingreso de un nuevo reporte de bug','Y'),
('menu.trans.projects','Permiso para la gestion de proyectos','Y'),
('menu.trans.projects.new','Permiso para el ingreso de un nuevo proyecto','Y'),
('menu.trans.faq','Permiso para la gestion de FAQ','Y'),
('menu.trans.faq.modificar','Permiso para el modificar una pregunta del FAQ','Y'),
('menu.trans.faq.new','Permiso para el ingreso de una nueva pregunta del FAQ','Y'),
('menu.trans.faq_topic','Permiso para la gestion de temas del FAQ','Y'),
('menu.trans.faq_topic.new','Permiso para el ingreso de un nuevo tema FAQ','Y'),
('menu.trans.reportes','Permiso para ver los reportes de usuarios (control calidad)','Y'),
('menu.trans.reportes.del','Permiso para borrar los reportes de usuarios (control calidad)','Y'),
 ('menu.docs','Permiso para la gestion de documentos','Y'),
 ('menu.docs.admin','Permiso para la administracion de documentos','Y'),
('menu.docs.reclamos','Permiso para la administracion de reclamos','Y'),
('menu.archivo.rss','Permiso para la gestion de contenido rss','Y'),
('menu.archivo.messaging','Permiso para la gestion de mensajeria','Y'),
('menu.archivo.administracion','Permiso para usar funciones de administracion','Y'),('menu.archivo.configuracion.georef','Permiso para la gestion de georeferencias','Y'),('menu.archivo.notas','Permiso para usar funciones de creacion de notas','Y'),
('menu.archivo.administracion.eventos','Permiso para ver log de eventos','Y'),
('menu.archivo.administracion.home','Permiso para administrar las homepages','Y');
--
-- Table structure for table `sec_groups_rights`
--

DROP TABLE IF EXISTS `sec_groups_rights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_groups_rights` (
  `gro_code` varchar(50) NOT NULL,
  `rig_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_groups_rights`
--
INSERT INTO `sec_groups_rights` 
select 'ControlTotal' , rig_name from `sec_rights` ;
--
-- Table structure for table `sec_sessions`
--

DROP TABLE IF EXISTS `sec_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_sessions` (
  `ses_tstamp` datetime DEFAULT NULL,
  `ses_last_access` datetime DEFAULT NULL,
  `use_code` varchar(50) DEFAULT NULL,
  `ses_token` varchar(50) NOT NULL,
  `ses_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_sessions`
--

LOCK TABLES `sec_sessions` WRITE;
/*!40000 ALTER TABLE `sec_sessions` DISABLE KEYS */;
INSERT INTO `sec_sessions` VALUES ('2012-06-25 13:44:12','2012-06-25 13:44:12','1','ktqbbs87dfct5q554g6inpgmn3','ACTIVA'),('2012-06-25 13:45:35','2012-06-25 13:45:35','1','qn3r85loam8mm2biui4mnkjsl6','ACTIVA'),('2012-06-25 13:46:47','2012-06-25 13:46:47','1','bc8987hv8re2ce496vjhseoko2','ACTIVA'),('2012-06-25 13:50:40','2012-06-25 13:50:40','1','itvhgvidafipnqn2tfgu5ju901','ACTIVA'),('2012-06-25 14:37:46','2012-06-25 14:37:46','1','nd1k0moaln2qkdfifvdttelbg7','ACTIVA'),('2012-06-26 11:04:39','2012-06-26 11:04:39','1','g82t7ejaq99o2kmoongdltpsj2','ACTIVA'),('2012-06-26 15:56:07','2012-06-26 15:56:07','1','4buqhsng449ee4kpste8n6r180','ACTIVA'),('2012-06-26 16:41:33','2012-06-26 16:41:33','1','rana56peg24h17bq0iiaq158u7','ACTIVA'),('2012-06-26 16:42:57','2012-06-26 16:42:57','1','8p6pf4a6604o5r1v9q5kv4kdc6','ACTIVA');
/*!40000 ALTER TABLE `sec_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_user_groups`
--

DROP TABLE IF EXISTS `sec_user_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_user_groups` (
  `use_code` varchar(50) NOT NULL,
  `gro_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_user_groups`
--

LOCK TABLES `sec_user_groups` WRITE;
/*!40000 ALTER TABLE `sec_user_groups` DISABLE KEYS */;
INSERT INTO `sec_user_groups` 
VALUES ('1','ControlTotal');
/*!40000 ALTER TABLE `sec_user_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_users`
--

DROP TABLE IF EXISTS `sec_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_users` (
  `use_code` varchar(50) NOT NULL,
  `use_name` varchar(200) DEFAULT NULL,
  `use_phone` varchar(30) DEFAULT NULL,
  `use_email` varchar(200) DEFAULT NULL,
  `use_mobile` varchar(50) DEFAULT NULL,
  `use_extension` varchar(50) DEFAULT NULL,
  `use_login` varchar(50) DEFAULT NULL,
  `use_password` varchar(200) DEFAULT NULL,
  `use_status` varchar(20) DEFAULT NULL,
  `use_tstamp` datetime DEFAULT NULL,
  `use_language` varchar(50) DEFAULT NULL,
  `use_skin` varchar(50) DEFAULT NULL,
  `use_avatar` varchar(200) DEFAULT NULL,
  `use_phone2` varchar(30) DEFAULT NULL,
  `use_phone3` varchar(30) DEFAULT NULL,
  `use_location` varchar(100) DEFAULT NULL,
  `use_rss` varchar(100) DEFAULT NULL,
  `codcli_bej` varchar(50) DEFAULT NULL,
  `use_layout` varchar(1000) DEFAULT NULL,
  `use_data_act` datetime DEFAULT NULL,
  `use_ultima_operacion` datetime DEFAULT NULL,
  `use_passact` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_users`
--

LOCK TABLES `sec_users` WRITE;
/*!40000 ALTER TABLE `sec_users` DISABLE KEYS */;
INSERT INTO `sec_users` VALUES 
('1','Administrador','','alejandra.bano@commsys.com.ar','','','admin','6cf51a7bd9ff9424e6efda7c8c30141c188f47f3c5e9aded040c2e5173ee5a7c2916ec0d33d2a2b577e21bba613babd61a3d78fe5265fbc4d10275851080ffbd','ACTIVO','2011-10-18 16:21:59','Español','default','default.gif','','','3','','','{&quot;rpanel&quot;:&quot;open&quot;}',NULL,NULL,NULL);
/*!40000 ALTER TABLE `sec_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_usrgroup`
--

DROP TABLE IF EXISTS `sec_usrgroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_usrgroup` (
  `ugr_code` varchar(50) NOT NULL,
  `ugr_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_usrgroup`
--

LOCK TABLES `sec_usrgroup` WRITE;
/*!40000 ALTER TABLE `sec_usrgroup` DISABLE KEYS */;
INSERT INTO `sec_usrgroup` 
VALUES ('Administradores','Administrador del sistema');
/*!40000 ALTER TABLE `sec_usrgroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_usrgroup_users`
--

DROP TABLE IF EXISTS `sec_usrgroup_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_usrgroup_users` (
  `ugr_code` varchar(50) NOT NULL,
  `use_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_usrgroup_users`
--

LOCK TABLES `sec_usrgroup_users` WRITE;
/*!40000 ALTER TABLE `sec_usrgroup_users` DISABLE KEYS */;
INSERT INTO `sec_usrgroup_users` VALUES ('Administradores','1');
/*!40000 ALTER TABLE `sec_usrgroup_users` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structure for table `tra_audit`
--

DROP TABLE IF EXISTS `tra_audit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tra_audit` (
  `aud_seq` int(11) NOT NULL,
  `tra_code` varchar(50) NOT NULL,
  `aud_step` varchar(50) DEFAULT NULL,
  `use_code` varchar(50) DEFAULT NULL,
  `use_name` varchar(100) DEFAULT NULL,
  `aud_tstamp` datetime DEFAULT NULL,
  `aud_object` varchar(50) DEFAULT NULL,
  `aud_step_label` varchar(100) DEFAULT NULL,
  `aud_msg` varchar(4000) DEFAULT NULL,
  `aud_result` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tra_audit`
--

LOCK TABLES `tra_audit` WRITE;
/*!40000 ALTER TABLE `tra_audit` DISABLE KEYS */;
/*!40000 ALTER TABLE `tra_audit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tra_event_handler`
--

DROP TABLE IF EXISTS `tra_event_handler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tra_event_handler` (
  `ave_code` varchar(50) NOT NULL COMMENT 'Nombre del evento',
  `teh_object` varchar(100) NOT NULL COMMENT 'Nombre del objeto que procesa este evento',
  `teh_status` varchar(20) DEFAULT NULL COMMENT 'Estado de esta handler ACTIVO o INACTIVO',
  `teh_tstamp` datetime DEFAULT NULL COMMENT 'Fecha de actualizacion',
  `use_code` varchar(50) DEFAULT NULL COMMENT 'Operador que realizó el cambio',
  PRIMARY KEY (`ave_code`,`teh_object`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tra_event_handler`
--

LOCK TABLES `tra_event_handler` WRITE;
/*!40000 ALTER TABLE `tra_event_handler` DISABLE KEYS */;
/*!40000 ALTER TABLE `tra_event_handler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tra_events`
--

DROP TABLE IF EXISTS `tra_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tra_events` (
  `tev_object` varchar(50) NOT NULL,
  `tev_op` char(1) NOT NULL,
  `tev_code` varchar(50) NOT NULL,
  `tev_tstamp` datetime NOT NULL,
  `tev_proc_tstamp` datetime DEFAULT NULL,
  `ave_code` varchar(50) DEFAULT NULL,
  `tev_class` varchar(200) DEFAULT NULL,
  `tev_key` int(11) NOT NULL DEFAULT '0',
  `tev_proc_result` varchar(400) DEFAULT NULL,
  `tev_template` varchar(200) DEFAULT NULL,
  `tev_mail_to` varchar(200) DEFAULT NULL,
  `tev_presentation` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`tev_key`),
  UNIQUE KEY `pk_tra_events_1` (`tev_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tra_events`
--

LOCK TABLES `tra_events` WRITE;
/*!40000 ALTER TABLE `tra_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `tra_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tra_list`
--

DROP TABLE IF EXISTS `tra_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tra_list` (
  `tra_code` varchar(50) NOT NULL,
  `tra_sys` varchar(50) DEFAULT NULL,
  `cir_code` varchar(50) DEFAULT NULL,
  `tra_act_level` decimal(18,0) DEFAULT NULL,
  `tra_rol` varchar(50) DEFAULT NULL,
  `tra_status` varchar(50) DEFAULT NULL,
  `tra_doc_xml` varchar(50) DEFAULT NULL,
  `tra_route_xml` varchar(50) DEFAULT NULL,
  `tra_prop_xml` varchar(50) DEFAULT NULL,
  `tra_tstamp_in` datetime DEFAULT NULL,
  `tra_tstamp_alarm` datetime DEFAULT NULL,
  `tra_key` varchar(100) DEFAULT NULL,
  `tra_key_desc` varchar(200) DEFAULT NULL,
  `tra_viewer` varchar(100) DEFAULT NULL,
  `tra_result` varchar(50) DEFAULT NULL,
  `tra_result_msg` varchar(500) DEFAULT NULL,
  `use_code_owner` varchar(50) DEFAULT NULL,
  `uri` varchar(50) DEFAULT NULL,
  `tra_handler` varchar(100) DEFAULT NULL,
  `use_code_aut` varchar(50) DEFAULT NULL,
  `tra_engine` varchar(50) DEFAULT NULL,
  `tra_job_status` varchar(50) DEFAULT NULL,
  `tra_job_error` varchar(500) DEFAULT NULL,
  `tra_change` char(1) DEFAULT NULL,
  `tra_can_print` char(1) DEFAULT NULL,
  `tra_hide_tstamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tra_list`
--

LOCK TABLES `tra_list` WRITE;
/*!40000 ALTER TABLE `tra_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `tra_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tra_log`
--

DROP TABLE IF EXISTS `tra_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tra_log` (
  `swo_code` varchar(50) NOT NULL,
  `san_code` int(11) DEFAULT NULL,
  `trl_code` int(11) NOT NULL,
  `trl_msg` varchar(1024) DEFAULT NULL,
  `trl_read` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tra_log`
--

LOCK TABLES `tra_log` WRITE;
/*!40000 ALTER TABLE `tra_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tra_log` ENABLE KEYS */;
UNLOCK TABLES;

DROP TABLE IF EXISTS `log_accesos`;
CREATE TABLE `log_accesos`(
	lac_code int NOT NULL,
	use_code varchar(50) NULL,
	lac_tstamp datetime NULL,
	lac_operation varchar(20) NULL,
	lac_name varchar(100) NULL,
	lac_result varchar(100) NULL,
	lac_msg varchar(1000) NULL,
	lac_ip varchar(100) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `log_operaciones`;
CREATE TABLE `log_operaciones`(
	lop_code int NOT NULL,
	use_code varchar(50) NULL,
	lop_tstamp datetime NULL,
	lop_operation varchar(20) NULL,
	lop_object varchar(100) NULL,
	lop_key varchar(100) NULL,
	lop_change TEXT NULL
)  ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Table structure for table `sec_sequence`
--

DROP TABLE IF EXISTS `sec_sequence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_sequence` (
  `seq_object` varchar(100) NOT NULL,
  `seq_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;



DROP TABLE IF EXISTS `sec_failed_logins`;
CREATE TABLE `sec_failed_logins` (
  use_code varchar(50) NULL,
  sfl_tstamp datetime NULL,
  primary key(use_code, sfl_tstamp)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS sec_ultimas_claves;
CREATE TABLE sec_ultimas_claves (
  use_code varchar(50) NULL,
  suc_tstamp datetime NULL,
  use_password varchar(200) DEFAULT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS sec_pass_reset;
CREATE TABLE sec_pass_reset (
  spr_token varchar(50) NOT NULL,
  spr_tstamp datetime DEFAULT NULL,
  spr_status varchar(50) DEFAULT NULL,
  use_code varchar(50) DEFAULT NULL,
  use_name varchar(200) DEFAULT NULL,
  PRIMARY KEY (spr_token)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table `sec_sequence`
--

LOCK TABLES `sec_sequence` WRITE;
/*!40000 ALTER TABLE `sec_sequence` DISABLE KEYS */;
INSERT INTO `sec_sequence` VALUES
('dummy', 1),
('cdl_faq', 0),
('rss_content', 0),
('sec_users',1),
('sec_modules',30),
('log_operaciones',0),
('log_accesos',0),
('avi_server',0),
('avi_mensajes',0),
('sec_acl',0);

/*!40000 ALTER TABLE `sec_sequence` ENABLE KEYS */;
UNLOCK TABLES;

UPDATE sec_sequence SET seq_code=
    ifnull((SELECT use_code FROM sec_users ORDER BY use_code DESC LIMIT 1),0)
    WHERE seq_object='sec_users';

UPDATE sec_sequence SET seq_code=
    ifnull((SELECT rss_code FROM rss_content ORDER BY rss_code DESC LIMIT 1),0)
    WHERE seq_object='rss_content';
	
