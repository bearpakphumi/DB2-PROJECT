
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

DROP TABLE IF EXISTS `buyer`;
CREATE TABLE `buyer` (
  `member_id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phonenumber` int(20) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


  DROP TABLE IF EXISTS `Cart`;
CREATE TABLE `Cart` (
`Buyer_ID` int(20) NOT NULL,
`Customer_Name` varchar(60) NOT NULL,
`Order_ID` int(20) NOT NULL AUTO_INCREMENT,
`IT_List_ID`int(20) NOT NULL,
`Item_List_Amount`int(5) NOT NULL,
`IT_List_Price` int(10) NOT NULL,
primary key (Order_ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  DROP TABLE IF EXISTS `Shipping`;
CREATE TABLE `Shipping` (
`Shipping_ID` int NOT NULL AUTO_INCREMENT,
`Customer_ID` int NOT NULL ,
`Arrive_Date` varchar(45) NULL,
`Order_List`int(20) NOT NULL,
`OR_IT_ID` int(20) NOT NULL,
`Shipping_Amount`int(5) NOT NULL,
primary key (Shipping_ID, Arrive_Date)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

Drop table if exists `LogActivity`;
Create table `LogActivity` (
logDateTime datetime NOT NULL,
logActivity varchar(60) NOT NULL,
logTableName varchar(60) NOT NULL,
logDetail varchar(60) NOT NULL,
logUser varchar(60) NOT NULL
);

DROP TABLE IF EXISTS `itemorder`;
CREATE TABLE `itemorder` (
  `itemid` int NOT NULL primary key AUTO_INCREMENT,
  `ItemName` varchar(60) NOT NULL,
  `ItemBranch` varchar(60) NOT NULL,
  `ItemCategories` varchar(60) NOT NULL,
  `ItemAmount` int(10) NOT NULL,
  `ItemPrice` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `Cart` ADD CONSTRAINT `Buyer_FirstName` FOREIGN KEY (`Buyer_ID`) REFERENCES `buyer` (`member_id`);
ALTER TABLE `Cart` ADD CONSTRAINT `Buy_List` FOREIGN KEY (`IT_List_ID`) REFERENCES `itemorder` (`itemid`);
ALTER TABLE `Shipping` ADD CONSTRAINT `Order_List` FOREIGN KEY (`Order_List`) REFERENCES `Cart` (`Order_ID`);
ALTER TABLE `Shipping` ADD CONSTRAINT `OrderITN` FOREIGN KEY (`OR_IT_ID`) REFERENCES `itemorder` (`itemid`);
ALTER TABLE `Shipping` ADD CONSTRAINT `Customer_Buyer` FOREIGN KEY (`Customer_ID`) REFERENCES `buyer` (`member_id`);

SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO itemorder (ItemName, ItemBranch, ItemCategories, ItemAmount, ItemPrice) VALUES ('FrenchFried', 'PotatoRich', 'Meat', '2', '100');
INSERT INTO itemorder (ItemName, ItemBranch, ItemCategories, ItemAmount, ItemPrice) VALUES ('Hamberger', 'MeatMeat', 'Meat', '5', '50');
INSERT INTO buyer(firstname, lastname, birthdate, email, address, phonenumber) VALUES ('Erin', 'Facon', '02/05/1967', 'test@hotmail.com', 'Stamford', 0811234567);
INSERT INTO buyer(firstname, lastname, birthdate, email, address, phonenumber) VALUES ('Steven', 'Rock','04/04/1998', 'nothing@hotmail.com', 'Bangkapi', 0920873478);
INSERT INTO Cart(Buyer_ID, Customer_Name, IT_List_ID, Item_List_Amount, IT_List_Price) VALUES ('1', 'Erin', '1', '3', '300');
INSERT INTO Cart(Buyer_ID, Customer_Name, IT_List_ID, Item_List_Amount, IT_List_Price) VALUES ('2', 'Steven', '2', '5', '250');
INSERT INTO Shipping(Customer_ID, Arrive_Date, Order_List, OR_IT_ID, Shipping_Amount) VALUES (1, '02/02/2020', '1', '1', '5');
INSERT INTO Shipping(Customer_ID, Arrive_Date, Order_List, OR_IT_ID, Shipping_Amount) VALUES (2, '01/03/2020', '2', '2', '2');
