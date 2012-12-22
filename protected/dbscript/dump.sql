CREATE DATABASE  IF NOT EXISTS `classattendance` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `classattendance`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: classattendance
-- ------------------------------------------------------
-- Server version	5.5.28

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
-- Table structure for table `tbl_attend`
--

DROP TABLE IF EXISTS `tbl_attend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_attend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseId` int(11) NOT NULL,
  `courseStatus` varchar(45) NOT NULL,
  `studentId` int(11) DEFAULT NULL,
  `timeIn` time DEFAULT NULL,
  `timeOut` time DEFAULT NULL,
  `day` date DEFAULT NULL,
  `week` int(11) DEFAULT NULL,
  `attendStatus` varchar(45) DEFAULT NULL,
  `sectionGroup` char(6) NOT NULL,
  `coursestudyId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_attend_student_idx` (`studentId`),
  KEY `fk_attend_courseId_idx` (`courseId`),
  KEY `fk_attend_coursestudyId_idx` (`coursestudyId`),
  CONSTRAINT `fk_attend_coursestudyId` FOREIGN KEY (`coursestudyId`) REFERENCES `tbl_coursestudy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_attend_courseId` FOREIGN KEY (`courseId`) REFERENCES `tbl_course` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_attend_studentId` FOREIGN KEY (`studentId`) REFERENCES `tbl_student` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_attend`
--

LOCK TABLES `tbl_attend` WRITE;
/*!40000 ALTER TABLE `tbl_attend` DISABLE KEYS */;
INSERT INTO `tbl_attend` VALUES (1,2,'Lecture',4,'08:05:00','09:30:00','2012-12-19',1,'Attend','500002',23),(2,2,'Lecture',5,'08:02:00','09:30:00','2012-12-19',1,'Attend','500001',19),(4,2,'Lecture',4,'08:10:00','09:30:00','2012-12-20',1,'Attend','500002',23),(5,2,'Lecture',5,'08:05:00','09:30:00','2012-12-20',1,'Attend','500001',19),(6,2,'Lecture',8,'08:20:00','09:30:00','2012-12-20',1,'Late','500001',19),(7,2,'Lecture',4,'08:16:00','09:30:00','2012-12-26',2,'Late','500002',23),(8,2,'Lecture',5,'08:46:00','09:30:00','2012-12-26',2,'Absent','500001',19),(9,2,'Lecture',8,'08:45:01','09:30:00','2012-12-26',2,'Absent','500001',19);
/*!40000 ALTER TABLE `tbl_attend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_course`
--

DROP TABLE IF EXISTS `tbl_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseCode` char(5) NOT NULL,
  `courseName` varchar(45) NOT NULL,
  `numOfweek` int(11) NOT NULL,
  `semesterId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `courseCode_UNIQUE` (`courseCode`),
  KEY `fk_course_semester_idx` (`semesterId`),
  KEY `fk_idx` (`semesterId`),
  CONSTRAINT `fk_course_semester` FOREIGN KEY (`semesterId`) REFERENCES `tbl_semester` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course`
--

LOCK TABLES `tbl_course` WRITE;
/*!40000 ALTER TABLE `tbl_course` DISABLE KEYS */;
INSERT INTO `tbl_course` VALUES (1,'CS123','Web application',16,1),(2,'CS124','Theory',16,1),(3,'CS401','Special Topic 1',16,1),(5,'CS222','Polang',16,2);
/*!40000 ALTER TABLE `tbl_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_courseinfo`
--

DROP TABLE IF EXISTS `tbl_courseinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_courseinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseId` int(11) NOT NULL,
  `courseStatus` varchar(45) NOT NULL,
  `sectionGroup` char(6) NOT NULL,
  `timeBegin` time NOT NULL,
  `timeOut` time NOT NULL,
  `build` varchar(10) NOT NULL,
  `room` char(4) NOT NULL,
  `studyDay` varchar(30) NOT NULL,
  `teacherId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_courseinfo_course_idx` (`courseId`),
  KEY `fk_courseinfo_teacher_idx` (`teacherId`),
  CONSTRAINT `fk_courseinfo_course` FOREIGN KEY (`courseId`) REFERENCES `tbl_course` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_courseinfo_teacher` FOREIGN KEY (`teacherId`) REFERENCES `tbl_teacher` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_courseinfo`
--

LOCK TABLES `tbl_courseinfo` WRITE;
/*!40000 ALTER TABLE `tbl_courseinfo` DISABLE KEYS */;
INSERT INTO `tbl_courseinfo` VALUES (1,1,'Lecture','400001','08:00:00','09:30:00','SC','4012','อังคาร-พฤหัสบดี',3),(2,3,'Lecture','600001','08:00:00','09:30:00','LC2','301','จันทร์',3),(3,2,'Lecture','500001','08:00:00','09:30:00','LC2','301','จันทร์',2),(7,1,'Laboratory','400001','08:00:00','09:30:00','SC','4012','อังคาร-พฤหัสบดี',2),(8,2,'Lecture','500002','08:00:00','09:30:00','SC','3022','อังคาร-พฤหัสบดี',3);
/*!40000 ALTER TABLE `tbl_courseinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_courserule`
--

DROP TABLE IF EXISTS `tbl_courserule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_courserule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseId` int(11) NOT NULL,
  `lateTime` time NOT NULL,
  `absenceTime` time NOT NULL,
  `condition` int(2) NOT NULL,
  `courseStatus` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rule_courseId_idx` (`courseId`),
  CONSTRAINT `fk_rule_courseId` FOREIGN KEY (`courseId`) REFERENCES `tbl_course` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_courserule`
--

LOCK TABLES `tbl_courserule` WRITE;
/*!40000 ALTER TABLE `tbl_courserule` DISABLE KEYS */;
INSERT INTO `tbl_courserule` VALUES (1,1,'08:15:00','08:45:00',90,'Lecture'),(2,3,'08:15:00','08:45:00',70,'Lecture'),(4,3,'08:15:00','08:45:00',60,'Laboratory'),(6,2,'08:15:00','08:45:00',70,'Lecture');
/*!40000 ALTER TABLE `tbl_courserule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_coursestudy`
--

DROP TABLE IF EXISTS `tbl_coursestudy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_coursestudy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `sectionGroup` char(6) NOT NULL,
  `courseinfoId` int(11) DEFAULT NULL,
  `courseStatus` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_study_courseId_idx` (`courseId`),
  KEY `fk_study_studentId_idx` (`studentId`),
  KEY `fk_study_courseIdinfo_idx` (`courseId`),
  KEY `fk_study_info_courseId_idx` (`courseId`),
  KEY `fk_study_courseinfoId` (`courseinfoId`),
  CONSTRAINT `fk_study_courseId` FOREIGN KEY (`courseId`) REFERENCES `tbl_course` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_study_courseinfoId` FOREIGN KEY (`courseinfoId`) REFERENCES `tbl_courseinfo` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_study_studentId` FOREIGN KEY (`studentId`) REFERENCES `tbl_student` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_coursestudy`
--

LOCK TABLES `tbl_coursestudy` WRITE;
/*!40000 ALTER TABLE `tbl_coursestudy` DISABLE KEYS */;
INSERT INTO `tbl_coursestudy` VALUES (17,1,4,'400001',1,'Lecture'),(18,3,4,'600001',2,'Lecture'),(19,2,5,'500001',3,'Lecture'),(20,3,5,'600001',2,'Lecture'),(21,1,4,'400001',1,'Laboratory'),(22,1,8,'400001',1,'Lecture'),(23,2,4,'500002',3,'Lecture'),(24,2,8,'500001',3,'Lecture');
/*!40000 ALTER TABLE `tbl_coursestudy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_semester`
--

DROP TABLE IF EXISTS `tbl_semester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_semester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semester` char(1) NOT NULL COMMENT '1=semester 1\\n2=semester 2\\n3=summer',
  `year` year(4) NOT NULL,
  `openDate` date NOT NULL,
  `endDate` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_semester`
--

LOCK TABLES `tbl_semester` WRITE;
/*!40000 ALTER TABLE `tbl_semester` DISABLE KEYS */;
INSERT INTO `tbl_semester` VALUES (1,'1',2012,'2012-12-09','2012-12-28','ภาคเรียนที่ 1 ปีการศึกษา 2555',''),(2,'2',2012,'2012-12-09','2012-12-31','ภาคเรียนที่ 2 ปีการศึกษา 2555','\0');
/*!40000 ALTER TABLE `tbl_semester` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_staff`
--

DROP TABLE IF EXISTS `tbl_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staffCode` char(10) NOT NULL,
  `staffName` varchar(45) NOT NULL,
  `staffLastname` varchar(45) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `staffCode_UNIQUE` (`staffCode`),
  KEY `fk_staff_userId_idx` (`userId`),
  CONSTRAINT `fk_staff_userId` FOREIGN KEY (`userId`) REFERENCES `tbl_user` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_staff`
--

LOCK TABLES `tbl_staff` WRITE;
/*!40000 ALTER TABLE `tbl_staff` DISABLE KEYS */;
INSERT INTO `tbl_staff` VALUES (5,'manow','มะนาว','นะคะ',18);
/*!40000 ALTER TABLE `tbl_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_student`
--

DROP TABLE IF EXISTS `tbl_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentCode` char(10) NOT NULL,
  `studentName` varchar(45) NOT NULL,
  `studentLastname` varchar(45) NOT NULL,
  `studentStatus` varchar(45) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `studentCode_UNIQUE` (`studentCode`),
  KEY `fk_idx` (`userId`),
  CONSTRAINT `fk_student_user` FOREIGN KEY (`userId`) REFERENCES `tbl_user` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_student`
--

LOCK TABLES `tbl_student` WRITE;
/*!40000 ALTER TABLE `tbl_student` DISABLE KEYS */;
INSERT INTO `tbl_student` VALUES (4,'5209610038','วรรัตน์','ศุภวรรณาวิวัฒน์','Study',6),(5,'5209610000','สมจิต','ใจดี','Study',7),(8,'5209610039','น้องเนย','รักษ์โลก','Study',13);
/*!40000 ALTER TABLE `tbl_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_teacher`
--

DROP TABLE IF EXISTS `tbl_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacherCode` char(10) NOT NULL,
  `teacherName` varchar(45) NOT NULL,
  `teacherLastname` varchar(45) NOT NULL,
  `teacherStatus` varchar(45) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teacherCode_UNIQUE` (`teacherCode`),
  KEY `fk_teacher_userId_idx` (`userId`),
  CONSTRAINT `fk_teacher_userId` FOREIGN KEY (`userId`) REFERENCES `tbl_user` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_teacher`
--

LOCK TABLES `tbl_teacher` WRITE;
/*!40000 ALTER TABLE `tbl_teacher` DISABLE KEYS */;
INSERT INTO `tbl_teacher` VALUES (2,'nopnapa','นพนภา','แรงเงา','Taught',8),(3,'munin','มุนินทร์','นางเอก','Taught',9),(5,'Ho','คุณนาย','โฮ','Taught',15);
/*!40000 ALTER TABLE `tbl_teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(10) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'admin','admin','admin'),(6,'5209610038','5209610038','student'),(7,'5209610000','5209610000','student'),(8,'nopnapa','nopnapa','teacher'),(9,'munin','munin','teacher'),(13,'5209610039','5209610039','student'),(15,'Ho','ho','teacher'),(18,'manow','manow','staff');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-12-22 19:59:48
