/* 
 * Student Info: Name=Xinkai Li, ID=16271
 * Subject: CS526B_HW3_Fall_2016
 * Author: PeterLi
 * Filename: restaurantdb.sql
 * Date and Time: 2016-11-11 22:11:25
 * Project Name: HW3
 */
/**
 * Author:  PeterLi
 * Created: 2016-11-11
 */

DROP DATABASE IF EXISTS restaurantdb;

CREATE DATABASE restaurantdb;

USE restaurantdb;
 
CREATE TABLE categories (
  categoryID       INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categoryID)
);

CREATE TABLE foods (
  foodID           INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryID      INT(11)        NOT NULL,
  foodName         VARCHAR(255)   NOT NULL,
  foodPrice        DECIMAL(10,2)  NOT NULL,
  imagePath         VARCHAR(255)    NOT NULL,
  PRIMARY KEY (foodID)
);


INSERT INTO categories VALUES
(1, 'Breakfast'),
(2, 'Lunch'),
(3, 'Dinner'),
(4, 'Drink');


INSERT INTO foods VALUES
(1, 1, 'Bread', '1.00','img/bread.png'),
(2, 1, 'Cookie', '2.00','img/cookie.png'),
(3, 2, 'Noodle', '5.00','img/noodle.png'),
(4, 2, 'Rice', '4.00','img/rice.png'),
(5, 3, 'Chicken', '8.00','img/chicken.png'),
(6, 3, 'Beef', '9.00','img/beef.png'),
(7, 4, 'Coke', '1.00','img/coke.png'),
(8, 4, 'DietCoke', '1.00','img/dietcoke.png');


GRANT SELECT, INSERT, DELETE, UPDATE
ON restaurantdb.*
TO admin@localhost
IDENTIFIED BY 'pass@word';


GRANT SELECT
ON foods
TO admin@localhost
IDENTIFIED BY 'pass@word';
