--
-- Database: `lt2`
--
DROP DATABASE IF EXISTS `team7db`;
CREATE DATABASE `team7db`;
USE `team7db`;

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `profile` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
);

INSERT INTO account (username, name, password, profile) VALUES ('john', 'John Lee', 'john123', 'admin');
INSERT INTO account (username, name, password, profile) VALUES ('apple', 'Apple Tan', 'apple123', 'admin');
INSERT INTO account (username, name, password, profile) VALUES ('jerry', 'Jerry Lim', 'jerry123', 'user');
INSERT INTO account (username, name, password, profile) VALUES ('maggie', 'Maggie Chew','maggie123', 'user');
INSERT INTO account (username, name, password, profile) VALUES ('jordan', 'Jordan Kim', 'jordan123', 'user');
INSERT INTO account (username, name, password, profile) VALUES ('danny', 'Danny Ang','danny123', 'driver');


DROP TABLE IF EXISTS `request`;
CREATE TABLE `request` (
  `requestid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `address_from` varchar(100) NOT NULL,
  `postal_from` int(6) NOT NULL,
  `address_to` varchar(100) NOT NULL,
  `postal_to` int(6) NOT NULL,
  `date` int(6) NOT NULL,
  `time` varchar(15),
  `priority` int(1) NOT NULL,
  PRIMARY KEY (`requestid`),
  FOREIGN KEY (`username`) REFERENCES account(username)
);

INSERT INTO request (requestid, username, address_from, postal_from, address_to, postal_to, date, time, priority) VALUES ('1', 'john', '19 Tanglin Rd #02-49', 247909, '1 Rochor Canal Road #01-42 Sim Lim Square', 188504, 041019, 1230, 0);
INSERT INTO request (requestid, username, address_from, postal_from, address_to, postal_to, date, priority) VALUES ('2', 'apple', '167 Geylang Road #03-04', 389242, '6 Everton Pk #01-08', 080006, 041019, 1);
INSERT INTO request (requestid, username, address_from, postal_from, address_to, postal_to, date, priority) VALUES ('3', 'maggie', '14 Scotts Road', 228213, '13 Hougang Ave 7 #01-519', 538798, 041019, 1);
INSERT INTO request (requestid, username, address_from, postal_from, address_to, postal_to, date, time, priority) VALUES ('4', 'danny', '212 Hougang Street 21 #03-339', 530212, '458 Macpherson Road', 368176, 041019, 1515, 0);
INSERT INTO request (requestid, username, address_from, postal_from, address_to, postal_to, date, time, priority) VALUES ('5', 'john', '53, Ubi Ave 3', 408863, '101 Boon Keng Road 06-20', 339773, 041019, 1015, 0);
INSERT INTO request (requestid, username, address_from, postal_from, address_to, postal_to, date, priority) VALUES ('6', 'maggie', '30, Old Toh Tuck Road, 02-01', 597654, 'Lucky Plaza 304 Orchard Road #b1-12', 238863, 041019, 0);
INSERT INTO request (requestid, username, address_from, postal_from, address_to, postal_to, date, priority) VALUES ('7', 'jordan', '161 Lor 1 Toa Payoh #01-1600', 310161, 'Zhujiao Centre (Tekka Market) 665 Buffalo Road #01-172', 210665, 041019, 0);

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `scheduleid` int(11) NOT NULL AUTO_INCREMENT,
  `requestid` int(11) NOT NULL,
  `date` int(6) NOT NULL,
  `start_time` varchar(15) NOT NULL,
  `end_time` varchar(15) NOT NULL,
  PRIMARY KEY (`scheduleid`),
  FOREIGN KEY (`requestid`) REFERENCES request(requestid)
);

INSERT INTO schedule (scheduleid, requestid, date, start_time, end_time) VALUES ('1', 1, 041019, 1400, 1515);
INSERT INTO schedule (scheduleid, requestid, date, start_time, end_time) VALUES ('2', 2, 041019, 1520, 1600);
INSERT INTO schedule (scheduleid, requestid, date, start_time, end_time) VALUES ('3', 4, 041019, 1520, 1600);