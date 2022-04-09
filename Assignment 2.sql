create table colors(
colorId Int not null auto_increment primary key,
color varchar(100) not null
);
alter table colors auto_increment 1000;



CREATE TABLE brands
(
brandId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
brandName VARCHAR(100) NOT NULL

);




CREATE TABLE shoes(
shoeId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
shoeName VARCHAR(100) NOT NULL,
size Decimal(20,1) NOT NULL,    -- 20 is the size and 2 is the number of digits after the decimal point. 
image VARCHAR(100),
brandId INT NOT NULL,
colorId int not null,
FOREIGN KEY (brandId) REFERENCES brands(brandId),
FOREIGN KEY (colorId) references colors(colorId)
);

alter table shoes auto_increment 2000;

select* from colors;
select * from shoes;
select * from brands;



CREATE TABLE registeredUsers (
userId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL,
email Varchar(50) NOT null,
password VARCHAR(255) NOT NULL);