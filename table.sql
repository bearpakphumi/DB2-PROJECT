
USE admin;

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS `Shipping`;
CREATE TABLE `Shipping` (
`Shipping_ID` int NOT NULL AUTO_INCREMENT,
`CustomerS_ID` int NOT NULL ,
`CartS_ID`int(20) NOT NULL,
`ProductS_ID` int(20) NOT NULL,
`Arrive_Date` varchar(20) NOT NULL,
`Shipping_Address` varchar(20) NOT NULL,
primary key (Shipping_ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Cart`;
CREATE TABLE `Cart` (
`Cart_ID` int(20) NOT NULL AUTO_INCREMENT,
`CustomerC_ID` int(20) NOT NULL,
`ProductC_ID`int(20) NOT NULL,
`Product_Amount`int(5) NOT NULL,
`Product_Price` int(10) NOT NULL,
primary key (Cart_ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Product`;
CREATE TABLE `Product` (
  `ItemID` int NOT NULL primary key AUTO_INCREMENT,
  `ItemName` varchar(60) NOT NULL,
  `ItemCategories` varchar(60) NOT NULL,
  `ItemAmount` int(10) NOT NULL,
  `ItemPrice` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Customer`;
CREATE TABLE `Customer` (
  `Customer_ID` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `birthdate` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phonenumber` int(20) NOT NULL,
  PRIMARY KEY (`Customer_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `Cart` ADD CONSTRAINT `Customer_FirstName` FOREIGN KEY (`CustomerC_ID`) REFERENCES `Customer` (`Customer_ID`);
ALTER TABLE `Cart` ADD CONSTRAINT `Buy_List` FOREIGN KEY (`ProductC_ID`) REFERENCES `Product` (`ItemID`);
ALTER TABLE `Shipping` ADD CONSTRAINT `Order_List` FOREIGN KEY (`CartS_ID`) REFERENCES `Cart` (`Cart_ID`);
ALTER TABLE `Shipping` ADD CONSTRAINT `OrderITN` FOREIGN KEY (`ProductS_ID`) REFERENCES `Product` (`ItemID`);
ALTER TABLE `Shipping` ADD CONSTRAINT `Customer_Customer` FOREIGN KEY (`CustomerS_ID`) REFERENCES `Customer` (`Customer_ID`);


INSERT INTO Product (ItemName, ItemCategories, ItemAmount, ItemPrice) VALUES ('FrenchFried', 'Meat', '2', '100');
INSERT INTO Product (ItemName, ItemCategories, ItemAmount, ItemPrice) VALUES ('Hamburger', 'Meat', '5', '50');
INSERT INTO Customer(firstname, lastname, birthdate, email, address, phonenumber) VALUES ('Erin', 'Facon', '02/05/1967', 'test@hotmail.com', 'Stamford', 0811234567);
INSERT INTO Customer(firstname, lastname, birthdate, email, address, phonenumber) VALUES ('Steven', 'Rock','04/04/1998', 'nothing@hotmail.com', 'Bangkapi', 0920873478);
INSERT INTO Cart(CustomerC_ID, ProductC_ID, Product_Amount, Product_Price) VALUES ('1', '1', '3', '300');
INSERT INTO Cart(CustomerC_ID, ProductC_ID, Product_Amount, Product_Price) VALUES ('2', '2', '5', '250');
INSERT INTO Shipping(CustomerS_ID, CartS_ID, ProductS_ID, Arrive_Date, Shipping_Address) VALUES ('1', '1', '1', '2020-02-03', 'Stamford University');
INSERT INTO Shipping(CustomerS_ID, CartS_ID, ProductS_ID, Arrive_Date, Shipping_Address) VALUES ('2', '2', '2', '2020-05-11', 'Stamford University');
