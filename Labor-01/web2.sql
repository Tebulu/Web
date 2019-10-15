CREATE DATABASE IF NOT EXISTS`web2`
CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `web2`;

CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `csaladi_nev` varchar(45) NOT NULL default '',
  `utonev` varchar(45) NOT NULL default '',
  `bejelentkezes` varchar(12) NOT NULL default '',
  `jelszo` varchar(40) NOT NULL default '',
  PRIMARY KEY  (`id`)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO `felhasznalok` (`id`,`csaladi_nev`,`utonev`,`bejelentkezes`,`jelszo`) VALUES 
 (1,'Családi_1','Utónév_1','Login1',sha1('login1')),
 (2,'Családi_2','Utónév_2','Login2',sha1('login2')),
 (3,'Családi_3','Utónév_3','Login3',sha1('login3')),
 (4,'Családi_4','Utónév_4','Login4',sha1('login4')),
 (5,'Családi_5','Utónév_5','Login5',sha1('login5')),
 (6,'Családi_6','Utónév_6','Login6',sha1('login6')),
 (7,'Családi_7','Utónév_7','Login7',sha1('login7')),
 (8,'Családi_8','Utónév_8','Login8',sha1('login8')),
 (9,'Családi_9','Utónév_9','Login9',sha1('login9')),
 (10,'Családi_10','Utónév_10','Login10',sha1('login10'));
INSERT INTO `felhasznalok` (`id`,`csaladi_nev`,`utonev`,`bejelentkezes`,`jelszo`) VALUES 
 (11,'Családi_11','Utónév_11','Login11',sha1('login11')),
 (12,'Családi_12','Utónév_12','Login12',sha1('login12')),
 (13,'Családi_13','Utónév_13','Login13',sha1('login13')),
 (14,'Családi_14','Utónév_14','Login14',sha1('login14')),
 (15,'Családi_15','Utónév_15','Login15',sha1('login15')),
 (16,'Családi_16','Utónév_16','Login16',sha1('login16')),
 (17,'Családi_17','Utónév_17','Login17',sha1('login17')),
 (18,'Családi_18','Utónév_18','Login18',sha1('login18')),
 (19,'Családi_19','Utónév_19','Login19',sha1('login19')),
 (20,'Családi_20','Utónév_20','Login20',sha1('login20'));
INSERT INTO `felhasznalok` (`id`,`csaladi_nev`,`utonev`,`bejelentkezes`,`jelszo`) VALUES 
 (21,'Családi_21','Utónév_21','Login21',sha1('login21')),
 (22,'Családi_22','Utónév_22','Login22',sha1('login22')),
 (23,'Családi_23','Utónév_23','Login23',sha1('login23')),
 (24,'Családi_24','Utónév_24','Login24',sha1('login24')),
 (25,'Családi_25','Utónév_25','Login25',sha1('login25'));
