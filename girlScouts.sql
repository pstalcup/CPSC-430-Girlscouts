DROP DATABASE IF EXISTS `S12-cpsc430G3`;
CREATE DATABASE IF NOT EXISTS `S12-cpsc430G3`;
USE `S12-cpsc430G3`;

CREATE TABLE IF NOT EXISTS `products` (
  `productId` INT(5) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `types` ENUM('Cookie', 'Nut') NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` float(5) NOT NULL,
  `description` varchar(70) NOT NULL,
  `quantity` int(5) NOT NULL
);

CREATE TABLE IF NOT EXISTS `transactions`(
  TID INT(10) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  girlId INT(5) NOT NULL
);

CREATE TABLE IF NOT EXISTS `sales`(
  `transactionId` INT(10) NOT NULL REFERENCES transactions(TID),
  `quantity` INT(5) DEFAULT 0 NOT NULL,
  `productId` INT(3) NOT NULL REFERENCES products(productId)  
);

CREATE TABLE IF NOT EXISTS `girls`(
  `girlId` INT(3) AUTO_INCREMENT PRIMARY KEY,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `DOB` varchar(9) NOT NULL,
  `address` varchar(70) NOT NULL,
  `city` varchar(40) NOT NULL,
  `st` varchar(2) NOT NULL,
  `zip` int(5) NOT NULL,
  `sales` INT(5) DEFAULT 0
) ;

CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(40) NOT NULL PRIMARY KEY,
  `password` varchar(20) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `DOB` varchar(9) NOT NULL,
  `address` varchar(70) NOT NULL,
  `st` varchar(2) NOT NULL,
  `zip` int(5) NOT NULL,
  `phoneNum` int(10) NOT NULL,
  `cellNum` int(10) NOT NULL,
  `licenseNum` varchar(12),
  `ssNum` varchar(10),
  `girlId` int(3) DEFAULT 0
);

CREATE TABLE IF NOT EXISTS `requests`(
`email` varchar(50) NOT NULL,
`daughter` varchar(70) NOT NULL,

FOREIGN KEY(email) 
REFERENCES users(email)
);

CREATE TABLE IF NOT EXISTS `events`(
`eventId` int(5) AUTO_INCREMENT PRIMARY KEY,
`dateOfEvent` DATE NOT NULL,
`timeOfEvent` TIME NOT NULL,
`name` varchar(50) NOT NULL,
`description` blob,
`location` blob NOT NULL
);

CREATE TABLE IF NOT EXISTS `attending`(
`eventId` int(5) NOT NULL,
`girlId` int(5) NOT NULL,

FOREIGN KEY(eventId) REFERENCES events(eventId)
FOREIGN KEY(girlId) REFERENCES girls(girlId)
); //there is an error here that prevents the table 'attending' from being created.

INSERT INTO users (email, password, firstname, lastname, DOB, address, st, zip, phonenum, cellnum)
VALUES ('japwahl@gmail.com', 'password', 'Jennifer', 'Polack-Wahl','00-00-0000', 'N/A', 'VA', '22401', '555-555-5555', '555-555-5555');

SHOW TABLES;
