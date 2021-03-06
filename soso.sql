-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: sosospider
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

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
-- Table structure for table `nav`
--

DROP TABLE IF EXISTS `nav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nav` (
  `nav_id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_controller` varchar(255) DEFAULT NULL,
  `nav_auth` int(11) DEFAULT NULL,
  `nav_isshow` int(11) DEFAULT NULL,
  PRIMARY KEY (`nav_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nav`
--

LOCK TABLES `nav` WRITE;
/*!40000 ALTER TABLE `nav` DISABLE KEYS */;
INSERT INTO `nav` VALUES (1,'Index',2,1),(2,'User',5,1);
/*!40000 ALTER TABLE `nav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spider`
--

DROP TABLE IF EXISTS `spider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spider` (
  `spider_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `spider_remark` varchar(128) DEFAULT NULL,
  `spider_port` varchar(45) DEFAULT NULL,
  `spider_status` varchar(45) DEFAULT NULL COMMENT '01是正在爬取状态，00是暂停状态，02是无任务状态',
  `spider_url` varchar(256) DEFAULT NULL,
  `spider_ip` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`spider_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spider`
--

LOCK TABLES `spider` WRITE;
/*!40000 ALTER TABLE `spider` DISABLE KEYS */;
INSERT INTO `spider` VALUES (1,'47.107.77.9redis主服务器副爬虫4g2c','7800','02','','47.107.77.9'),(2,'39.108.106.29es主服务器爬虫副节点2g1c','7800','02','','39.108.106.29'),(3,'182.254.227.67主爬虫节点2g1c','7800','02','','182.254.227.67'),(4,'47.112.211.101主爬虫节点1g1c','7800','02','','47.112.211.101'),(5,'web主服务器1g1c','7800','02','','119.29.189.104');
/*!40000 ALTER TABLE `spider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spiderday`
--

DROP TABLE IF EXISTS `spiderday`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spiderday` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(50) NOT NULL,
  `nums` varchar(50) NOT NULL,
  `allnums` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=357 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spiderday`
--

LOCK TABLES `spiderday` WRITE;
/*!40000 ALTER TABLE `spiderday` DISABLE KEYS */;
INSERT INTO `spiderday` VALUES (1,'1555343004','0','429915'),(2,'1555343014','0','429915'),(3,'1555344042','0','429915'),(4,'1555344157','0','429915'),(5,'1555344184','0','429915'),(6,'1555344263','0','429915'),(7,'1555344362','0','429915'),(8,'1555344413','0','429915'),(9,'1555344433','0','429915'),(10,'1555344443','0','429915'),(11,'1555344739','0','429915'),(12,'1555344918','0','429915'),(13,'1555344923','0','429915'),(14,'1555344937','0','429915'),(15,'1555344952','0','429915'),(16,'1555346516','0','429915'),(17,'1555346575','0','429915'),(18,'1555346597','0','429915'),(19,'1555346776','0','429915'),(20,'1555346787','0','429915'),(21,'1555346820','0','429915'),(22,'1555346831','0','429915'),(23,'1555346844','0','429915'),(24,'1555349326','0','429915'),(25,'1555375545','0','429915'),(26,'1555375551','0','429915'),(27,'1555375613','0','429915'),(28,'1555377582','0','429915'),(29,'1555377939','0','429915'),(30,'1555378117','0','429915'),(31,'1555379365','0','429915'),(32,'1555382323','0','429915'),(33,'1555382366','0','429915'),(34,'1555384602','0','429915'),(35,'1555384607','0','429915'),(36,'1555384657','0','429915'),(37,'1555384666','0','429915'),(38,'1555384676','0','429915'),(39,'1555384699','0','429915'),(40,'1555384704','0','429915'),(41,'1555384826','0','429915'),(42,'1555384875','0','429915'),(43,'1555384879','0','429915'),(44,'1555384882','0','429915'),(45,'1555384954','0','429915'),(46,'1555384960','0','429915'),(47,'1555384967','0','429915'),(48,'1555384969','0','429915'),(49,'1555384973','0','429915'),(50,'1555385029','0','429915'),(51,'1555386698','0','429915'),(52,'1555391388','0','429915'),(53,'1555392074','0','429915'),(54,'1555393283','0','429915'),(55,'1555395240','0','429915'),(56,'1555395280','0','429915'),(57,'1555395363','0','429915'),(58,'1555395490','0','429915'),(59,'1555395497','0','429915'),(60,'1555395552','0','429915'),(61,'1555395983','0','429915'),(62,'1555396722','0','429915'),(63,'1555399398','0','429915'),(64,'1555403993','0','429915'),(65,'1555404068','5','429920'),(66,'1555404070','0','429920'),(67,'1555404072','5','429925'),(68,'1555404073','0','429925'),(69,'1555404074','0','429925'),(70,'1555404075','5','429930'),(71,'1555404076','0','429930'),(72,'1555404084','5','429935'),(73,'1555404100','15','429950'),(74,'1555404101','0','429950'),(75,'1555405429','0','429950'),(76,'1555405430','0','429950'),(77,'1555405432','0','429950'),(78,'1555405434','0','429950'),(79,'1555405435','0','429950'),(80,'1555405436','0','429950'),(81,'1555405438','0','429950'),(82,'1555405439','0','429950'),(83,'1555405439','0','429950'),(84,'1555405440','0','429950'),(85,'1555405441','0','429950'),(86,'1555405442','0','429950'),(87,'1555405443','0','429950'),(88,'1555405445','0','429950'),(89,'1555405449','0','429950'),(90,'1555405477','0','429950'),(91,'1555405479','0','429950'),(92,'1555405480','0','429950'),(93,'1555405481','0','429950'),(94,'1555405482','0','429950'),(95,'1555405509','0','429950'),(96,'1555405510','5','429955'),(97,'1555405511','0','429955'),(98,'1555405513','0','429955'),(99,'1555405514','0','429955'),(100,'1555405518','5','429960'),(101,'1555405592','71','430031'),(102,'1555405604','0','430031'),(103,'1555405613','0','430031'),(104,'1555405614','0','430031'),(105,'1555405615','0','430031'),(106,'1555405616','0','430031'),(107,'1555405617','0','430031'),(108,'1555405618','0','430031'),(109,'1555405619','0','430031'),(110,'1555405621','0','430031'),(111,'1555405622','0','430031'),(112,'1555405656','0','430031'),(113,'1555405658','0','430031'),(114,'1555405666','0','430031'),(115,'1555405696','5','430036'),(116,'1555405697','0','430036'),(117,'1555405699','0','430036'),(118,'1555405700','0','430036'),(119,'1555405701','5','430041'),(120,'1555405708','5','430046'),(121,'1555405711','5','430051'),(122,'1555405714','0','430051'),(123,'1555405749','35','430086'),(124,'1555405758','10','430096'),(125,'1555405959','21','430117'),(126,'1555405961','5','430122'),(127,'1555405962','0','430122'),(128,'1555405963','0','430122'),(129,'1555405966','5','430127'),(130,'1555405987','15','430142'),(131,'1555406123','140','430282'),(132,'1555406143','15','430297'),(133,'1555406228','85','430382'),(134,'1555406238','10','430392'),(135,'1555406272','45','430437'),(136,'1555406279','28','430465'),(137,'1555406283','12','430477'),(138,'1555406290','10','430487'),(139,'1555406363','189','430676'),(140,'1555406371','25','430701'),(141,'1555406376','5','430706'),(142,'1555406379','10','430716'),(143,'1555406420','47','430763'),(144,'1555406421','0','430763'),(145,'1555406422','0','430763'),(146,'1555406423','0','430763'),(147,'1555406424','0','430763'),(148,'1555406425','0','430763'),(149,'1555406426','0','430763'),(150,'1555406749','0','430763'),(151,'1555407121','5','430768'),(152,'1555407122','0','430768'),(153,'1555407123','5','430773'),(154,'1555407124','0','430773'),(155,'1555407126','0','430773'),(156,'1555407127','0','430773'),(157,'1555407130','5','430778'),(158,'1555407132','0','430778'),(159,'1555407134','5','430783'),(160,'1555407347','1','430784'),(161,'1555407350','0','430784'),(162,'1555407350','0','430784'),(163,'1555407353','0','430784'),(164,'1555407354','0','430784'),(165,'1555407355','0','430784'),(166,'1555407356','0','430784'),(167,'1555407374','0','430784'),(168,'1555407376','0','430784'),(169,'1555407377','0','430784'),(170,'1555407378','0','430784'),(171,'1555407379','0','430784'),(172,'1555407380','0','430784'),(173,'1555407381','0','430784'),(174,'1555407382','0','430784'),(175,'1555407383','0','430784'),(176,'1555407384','0','430784'),(177,'1555407385','0','430784'),(178,'1555407386','0','430784'),(179,'1555407387','0','430784'),(180,'1555407388','0','430784'),(181,'1555407389','0','430784'),(182,'1555407400','0','430784'),(183,'1555407401','0','430784'),(184,'1555407408','0','430784'),(185,'1555407430','0','430784'),(186,'1555407441','0','430784'),(187,'1555407442','0','430784'),(188,'1555407443','0','430784'),(189,'1555407444','0','430784'),(190,'1555407445','0','430784'),(191,'1555407446','0','430784'),(192,'1555407447','0','430784'),(193,'1555407447','0','430784'),(194,'1555407448','0','430784'),(195,'1555407449','0','430784'),(196,'1555407450','0','430784'),(197,'1555407450','0','430784'),(198,'1555407451','0','430784'),(199,'1555407454','0','430784'),(200,'1555407505','1','430785'),(201,'1555407506','0','430785'),(202,'1555407507','0','430785'),(203,'1555407507','0','430785'),(204,'1555407508','0','430785'),(205,'1555407509','0','430785'),(206,'1555407510','0','430785'),(207,'1555407511','0','430785'),(208,'1555407516','5','430790'),(209,'1555407517','0','430790'),(210,'1555407518','0','430790'),(211,'1555407519','0','430790'),(212,'1555407520','0','430790'),(213,'1555407521','0','430790'),(214,'1555407521','5','430795'),(215,'1555407522','0','430795'),(216,'1555407523','0','430795'),(217,'1555407524','0','430795'),(218,'1555407526','0','430795'),(219,'1555407527','5','430800'),(220,'1555407528','0','430800'),(221,'1555407559','30','430830'),(222,'1555407560','0','430830'),(223,'1555407598','40','430870'),(224,'1555407599','0','430870'),(225,'1555407600','0','430870'),(226,'1555407601','0','430870'),(227,'1555407602','0','430870'),(228,'1555407603','5','430875'),(229,'1555407608','0','430875'),(230,'1555407611','5','430880'),(231,'1555407623','15','430895'),(232,'1555407626','0','430895'),(233,'1555407639','15','430910'),(234,'1555407641','0','430910'),(235,'1555407671','21','430931'),(236,'1555407672','0','430931'),(237,'1555407675','0','430931'),(238,'1555407677','5','430936'),(239,'1555407747','16','430952'),(240,'1555407748','0','430952'),(241,'1555407749','0','430952'),(242,'1555407749','0','430952'),(243,'1555407750','0','430952'),(244,'1555407751','0','430952'),(245,'1555407751','0','430952'),(246,'1555407752','0','430952'),(247,'1555407753','0','430952'),(248,'1555407754','0','430952'),(249,'1555407754','0','430952'),(250,'1555407755','0','430952'),(251,'1555407756','0','430952'),(252,'1555407757','0','430952'),(253,'1555407757','0','430952'),(254,'1555407773','0','430952'),(255,'1555407804','0','430952'),(256,'1555420238','0','430952'),(257,'1555420295','0','430952'),(258,'1555439027','0','430952'),(259,'1555440404','0','430952'),(260,'1555440420','5','430957'),(261,'1555440421','5','430962'),(262,'1555440443','20','430982'),(263,'1555440458','15','430997'),(264,'1555440462','5','431002'),(265,'1555440470','5','431007'),(266,'1555443286','21','431028'),(267,'1555443429','9','431037'),(268,'1555443431','0','431037'),(269,'1555443432','0','431037'),(270,'1555443434','5','431042'),(271,'1555443435','0','431042'),(272,'1555443469','10','431052'),(273,'1555443470','0','431052'),(274,'1555443471','0','431052'),(275,'1555444407','0','431052'),(276,'1555444416','0','431052'),(277,'1555480723','0','431052'),(278,'1555488675','0','431052'),(279,'1555488679','0','431052'),(280,'1555488693','10','431062'),(281,'1555488696','0','431062'),(282,'1555488698','5','431067'),(283,'1555488699','0','431067'),(284,'1555488700','0','431067'),(285,'1555488702','5','431072'),(286,'1555488711','10','431082'),(287,'1555488712','5','431087'),(288,'1555488713','5','431092'),(289,'1555488715','0','431092'),(290,'1555489574','87','431179'),(291,'1555653080','0','431179'),(292,'1555653083','0','431179'),(293,'1555653093','5','431184'),(294,'1555653094','2','431186'),(295,'1555653095','0','431186'),(296,'1555653109','29','431215'),(297,'1555653110','0','431215'),(298,'1555653111','0','431215'),(299,'1555653112','5','431220'),(300,'1555653114','5','431225'),(301,'1555653117','10','431235'),(302,'1555653125','35','431270'),(303,'1555653221','298','431568'),(304,'1555653224','-21','431547'),(305,'1555653241','66','431613'),(306,'1555653245','10','431623'),(307,'1555653253','15','431638'),(308,'1555653258','10','431648'),(309,'1555653268','18','431666'),(310,'1555653290','47','431713'),(311,'1555653385','152','431865'),(312,'1555653846','-431864','1'),(313,'1555653847','0','1'),(314,'1555653848','0','1'),(315,'1555653849','0','1'),(316,'1555653854','0','1'),(317,'1555653855','0','1'),(318,'1555653900','0','1'),(319,'1555653901','0','1'),(320,'1555653955','0','1'),(321,'1555653956','0','1'),(322,'1555654101','23','24'),(323,'1555654102','5','29'),(324,'1555654117','21','50'),(325,'1555654127','0','50'),(326,'1555654128','0','50'),(327,'1555654129','0','50'),(328,'1555654131','0','50'),(329,'1555654132','0','50'),(330,'1555654133','0','50'),(331,'1555654135','0','50'),(332,'1555654136','0','50'),(333,'1555654137','0','50'),(334,'1555654144','0','50'),(335,'1555654192','0','50'),(336,'1555654193','0','50'),(337,'1555654233','0','50'),(338,'1555654244','0','50'),(339,'1555654244','0','50'),(340,'1555654381','2','52'),(341,'1555654382','0','52'),(342,'1555654382','0','52'),(343,'1555654383','0','52'),(344,'1555654384','0','52'),(345,'1555654385','0','52'),(346,'1555654390','0','52'),(347,'1555654391','0','52'),(348,'1555654409','0','52'),(349,'1555654412','0','52'),(350,'1555654423','0','52'),(351,'1555686182','0','52'),(352,'1555686184','0','52'),(353,'1555686185','0','52'),(354,'1555686295','0','52'),(355,'1555686524','0','52'),(356,'1555687210','0','52');
/*!40000 ALTER TABLE `spiderday` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys`
--

DROP TABLE IF EXISTS `sys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys` (
  `sys_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sys_index_nums` varchar(60) DEFAULT NULL,
  `sys_len_queue` varchar(45) DEFAULT NULL,
  `sys_task_num` varchar(45) DEFAULT NULL,
  `sys_csupervene` varchar(45) DEFAULT NULL,
  `sys_es_num` varchar(45) DEFAULT NULL,
  `sys_spider_num` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`sys_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys`
--

LOCK TABLES `sys` WRITE;
/*!40000 ALTER TABLE `sys` DISABLE KEYS */;
INSERT INTO `sys` VALUES (1,'52','0','4','100','10','5');
/*!40000 ALTER TABLE `sys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_account` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `user_auth` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'123','123','132','1'),(2,'caicai','123','caicai','5'),(3,'123','124','123','5'),(4,'caicai','caicai','caicai','5');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `web`
--

DROP TABLE IF EXISTS `web`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `web` (
  `web_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `web_key` varchar(1028) DEFAULT NULL,
  `web_addr` varchar(256) DEFAULT NULL,
  `web_index` varchar(128) DEFAULT NULL COMMENT '	',
  `web_time` varchar(45) DEFAULT NULL,
  `web_auth` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`web_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `web`
--

LOCK TABLES `web` WRITE;
/*!40000 ALTER TABLE `web` DISABLE KEYS */;
/*!40000 ALTER TABLE `web` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-22 17:57:44
