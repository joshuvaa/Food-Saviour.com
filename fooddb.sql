/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.5.8-log : Database - food_saviour
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`food_saviour` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `food_saviour`;

/*Table structure for table `agent_registration` */

DROP TABLE IF EXISTS `agent_registration`;

CREATE TABLE `agent_registration` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `district` varchar(30) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `agent_registration` */

insert  into `agent_registration`(`aid`,`name`,`district`,`location`,`phone`,`email`) values (4,'athul','ernakulam','kaloor','5432123445','athul@gmail.com'),(5,'Prakash','Ernakulam','Kaloor','8909897867','prakash@gmail.com'),(6,'Joshy','Ernakulam','Edappally','8909878900','joshy@gmail.com');

/*Table structure for table `donations` */

DROP TABLE IF EXISTS `donations`;

CREATE TABLE `donations` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `oid` int(11) DEFAULT NULL,
  `donate_date` date DEFAULT NULL,
  `donate_description` varchar(30) DEFAULT NULL,
  `donate_status` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `donations` */

insert  into `donations`(`did`,`uid`,`aid`,`oid`,`donate_date`,`donate_description`,`donate_status`) values (2,8,4,1,'2020-07-24','dwqd','donated'),(3,9,5,2,'2021-11-21','AAAAAA','donated');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(20) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`logid`,`uid`,`username`,`password`,`type`,`status`) values (15,8,'hussain@gmail.com','123','user','1'),(16,4,'athul@gmail.com','321','agent','1'),(17,0,'admin@gmail.com','admin','admin','1'),(18,9,'vishnu@gmail.com','123456','user','1'),(19,5,'prakash@gmail.com','123456','agent','0'),(20,10,'abi@gmail.com','123456','user','1'),(21,6,'joshy@gmail.com','123456','agent','0');

/*Table structure for table `orphanage` */

DROP TABLE IF EXISTS `orphanage`;

CREATE TABLE `orphanage` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `district` varchar(30) DEFAULT NULL,
  `no_orphans` varchar(30) DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varbinary(30) DEFAULT NULL,
  `need_status` varchar(30) DEFAULT 'needed',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `orphanage` */

insert  into `orphanage`(`oid`,`aid`,`name`,`address`,`district`,`no_orphans`,`phone`,`email`,`need_status`) values (1,4,'OrphanageName','Orphanage Address Details','Ernakulam','450','1234554321','OrphanageName@gmail.com','needed'),(2,5,'ABCD','Kaloor','Ernakulam','500','9098789098','abcd@gmail.com','needed');

/*Table structure for table `user_registration` */

DROP TABLE IF EXISTS `user_registration`;

CREATE TABLE `user_registration` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `user_registration` */

insert  into `user_registration`(`uid`,`name`,`address`,`phone`,`email`,`password`) values (8,'Hussain','Hussain Addess','1234567890','hussain@gmail.com','123'),(9,'Vishnu','Kaloor, Ernakulam','9890879078','vishnu@gmail.com','123456'),(10,'Abhijith','Marine Drive','9087654567','abi@gmail.com','123456');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
