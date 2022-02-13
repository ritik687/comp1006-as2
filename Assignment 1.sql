

CREATE TABLE brands
(
brandId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
color varchar(100) not null,
brandName VARCHAR(100) NOT NULL

);



/*--------------------------------------------------*/
CREATE TABLE shoes(
shoeId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
shoeName VARCHAR(100) NOT NULL,
size Decimal(20,1) NOT NULL,    -- 20 is the size and 2 is the number of digits after the decimal point. 
image VARCHAR(100),
brandId INT NOT NULL,
FOREIGN KEY (brandId) REFERENCES brands(brandId)
);
select * from shoes;

select * from brands;