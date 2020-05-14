DROP DATABASE  IF  EXISTS `Project`;

CREATE DATABASE  IF NOT EXISTS `Project`;
USE `Project`;

DROP TABLE IF EXISTS `ITEM`;
CREATE TABLE `ITEM` (
`Item_Name` varchar(45) NOT NULL,
`Item_Branch`varchar(45) NOT NULL,
`Item_Categories` varchar(45) NOT NULL,
`Item_Price` int(10) NOT NULL,
primary key (Item_Name, Item_Branch)
  ) ;
  
  DROP TABLE IF EXISTS `Cart`;
CREATE TABLE `Cart` (
`Order_ID` varchar(45) NOT NULL,
`IT_List_Name`varchar(45) NOT NULL,
`Item_List_Amount`int(5) NOT NULL,
`IT_List_Price` int(10) NOT NULL,
primary key (Order_ID, IT_List_Name)
);

  DROP TABLE IF EXISTS `Customer`;
CREATE TABLE `Customer` (
`Member_ID` varchar(45) NOT NULL,
`Customer_Name` varchar(45) NOT NULL,
`Customer_Address` varchar(45) NOT NULL,
`Customer_Contact` varchar(45) NOT NULL,
`Bank_Account`int(20) NOT NULL,
`Bank_Name`int(20) NOT NULL,
`Customer_Cart`varchar(45) NOT NULL,
primary key (Member_ID, Customer_Name, Customer_Address)
  ) ;
  
  DROP TABLE IF EXISTS `Shipping`;
CREATE TABLE `Shipping` (
`Shipping_ID` varchar(45) NOT NULL,
`CustomerD_Name` varchar(45) NOT NULL,
`CustomerD_Address` varchar(45) NOT NULL,
`Arrive_Date` varchar(45) NULL,
`Order_List`varchar(45) NOT NULL,
`OR_IT_Name` varchar(45) NOT NULL,
`Shipping_Amount`int(5) NOT NULL,
primary key (Shipping_ID, Arrive_Date)
  ) ;
  
    DROP TABLE IF EXISTS `Supplier`;
CREATE TABLE `Supplier` (
`Box_ID` varchar(45) NOT NULL,
`Delivery_Date` varchar(45) NULL,
`ItemS_Name` varchar(45) NOT NULL,
`ItemS_Branch` varchar(45) NOT NULL,
`Delivery_Amount`varchar(45) NOT NULL,
`Customer_Order_Name` varchar(45) NOT NULL,
`Customer_Order_Address` varchar(45) NOT NULL,
primary key (Box_ID, ItemS_Name)
  ) ;

ALTER TABLE `Customer` ADD CONSTRAINT `Buy_Date` FOREIGN KEY (`Customer_Cart`) REFERENCES `Cart` (`Order_ID`);
ALTER TABLE `Cart` ADD CONSTRAINT `Buy_List` FOREIGN KEY (`IT_List_Name`) REFERENCES `Item` (`Item_Name`);
ALTER TABLE `Shipping` ADD CONSTRAINT `Order_List` FOREIGN KEY (`Order_List`) REFERENCES `Cart` (`Order_ID`);
ALTER TABLE `Shipping` ADD CONSTRAINT `OrderITN` FOREIGN KEY (`OR_IT_Name`) REFERENCES `Item` (`Item_Name`);
ALTER TABLE `Supplier` ADD CONSTRAINT `ITName` FOREIGN KEY (`ItemS_Name`) REFERENCES `Item` (`Item_Name`);

INSERT INTO ITEM VALUES ('FrenchFried', 'PotatoRich', 'Food', '100');
INSERT INTO ITEM VALUES ('Hamberger', 'MeatMeat', 'Food', '50');
INSERT INTO ITEM VALUES ('Tissue', 'ClearClean', 'Cleaning', '15');
INSERT INTO ITEM VALUES ('Lunchbox', 'AnyUseC', 'Tool', '20');
INSERT INTO ITEM VALUES ('Shrimp', 'SeaC', 'Food', '80');
INSERT INTO ITEM VALUES ('Noodle', 'KFood', 'Food', '60');

INSERT INTO Cart VALUES ('C001', 'FrenchFried', '3', '300');
INSERT INTO Cart VALUES ('C001', 'Hamberger', '5', '250');
INSERT INTO Cart VALUES ('C001', 'Lunchbox', '20', '1600');
INSERT INTO Cart VALUES ('C002', 'Tissue', '30', '450');
INSERT INTO Cart VALUES ('C002', 'Noodle', '15', '900');
INSERT INTO Cart VALUES ('C002', 'Shrimp', '4', '320');
INSERT INTO Cart VALUES ('C002', 'FrenchFried', '2', '200');

INSERT INTO Customer VALUES ('M001', 'Erin', '79 Bangkapi', '0937741202', '8761033812', 'A Bank', 'C001');
INSERT INTO Customer VALUES ('M002', 'Steven', '144 Bangkapi', '0824254077', '491909862347', 'B Bank', 'C002');

INSERT INTO Shipping VALUES ('S001', 'Erin', '79 Bangkapi', '02/02/2020', 'C001', 'FrenchFried', '3');
INSERT INTO Shipping VALUES ('S002', 'Erin', '79 Bangkapi', '02/02/2020', 'C001', 'Hamberger', '5');
INSERT INTO Shipping VALUES ('S003', 'Steven', '144 Bangkapi', '01/03/2020', 'C002', 'FrenchFried', '2');
INSERT INTO Shipping VALUES ('S004', 'Steven', '144 Bangkapi', '31/03/2020', 'C002', 'Tissue', '30');
INSERT INTO Shipping VALUES ('S005', 'Erin', '79 Bangkapi', '01/05/2020', 'C001', 'Lunchbox', '20');
INSERT INTO Shipping VALUES ('S006', 'Steven', '144 Bangkapi', '30/06/2020', 'C002', 'Noodle', '15');
INSERT INTO Shipping VALUES ('S007', 'Steven', '144 Bangkapi', '30/06/2020', 'C002', 'Shrimp', '4');


INSERT INTO Supplier VALUES ('B001','02/02/2020', 'FrenchFried', 'PotatoRich', '3', 'Erin', '79 Bangkapi');
INSERT INTO Supplier VALUES ('B001', '02/02/2020', 'Hamberger', 'MeatMeat', '5', 'Erin', '79 Bangkapi');
INSERT INTO Supplier VALUES ('B002', '01/03/2020', 'FrenchFried', 'PotatoRich', '2', 'Steven', '144 Bangkapi');
INSERT INTO Supplier VALUES ('B003', '31/03/2020', 'Tissue', 'ClearClean', '30', 'Steven', '144 Bangkapi');
INSERT INTO Supplier VALUES ('B004', '01/05/2020', 'Lunchbox', 'AnyUseC', '20', 'Erin', '79 Bangkapi');
INSERT INTO Supplier VALUES ('B005', '30/06/2020', 'Noodle', 'KFood', '15', 'Steven', '144 Bangkapi');
INSERT INTO Supplier VALUES ('B005', '30/06/2020', 'Shrimp', 'SeaC', '4', 'Steven', '144 Bangkapi');