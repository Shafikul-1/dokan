-- Create Database
-- CREATE DATABASE dokan;

-- Create User Table
CREATE TABLE users (
    id int AUTO_INCREMENT,
    name varchar (200),
    pass varchar (500),
    conPass varchar (500),
    date varchar (50),
    userComment TEXT,
    userRoll int,
    email varchar (200),
    img varchar (600),
    PRIMARY KEY (id)
) 

-- Insert Basic Users Data 
INSERT INTO `users`
( `name`, `pass`, `conPass`, `date`, `userComment`, `userRoll`, `email`, `img`)
VALUES
    ( 'Md Shaifkul Islam', 'shafikul', 'shafikul', '14-05-2024', 'Best', '1', 'shafikul@gmail.com', 'user-defult-icon.png'),
    ( 'Md Shifat', 'Shifat', 'Shifat', '11-05-2025', 'Best', '2', 'Shifat@gmail.com', 'user-defult-icon.png'),
    ( 'Mst Runjila', 'Runjila', 'Runjila', '08-05-2028', 'Best', '3', 'Runjila@gmail.com', 'user-defult-icon.png'),
    ( 'Md Al amin', 'Al amin', 'Al amin', '04-05-2022', 'Best', '4', 'Al-amin@gmail.com', 'user-defult-icon.png')
    

-- Product Table Create 
CREATE TABLE productDetails (
id int AUTO_INCREMENT PRIMARY KEY,
    productName varchar (600),
    productDescription text,
    productColor varchar (300),
    category int ,
    price int,
    discount FLOAT,
    tax FLOAT,
    weight FLOAT,
    brand varchar (500),
    shippingClass varchar (500),
    warranty FLOAT,
    customFields text,
    releaseDate  varchar (500),
    complianceInfo text,
    metaTitle  varchar (700),
    metaDescription  varchar (900),
    keywords varchar (500),
    productImages text,
    videos text,
    userAuth int,
    productStatus varchar (300),
    productQty int,
    deliveryComplete int
)
-- Insert Basic Product Data 
INSERT INTO productDetails 
(productName, productDescription, productColor, category, price, discount, tax, weight, brand, shippingClass, warranty, customFields, releaseDate, complianceInfo, metaTitle, metaDescription, keywords, productImages, videos, userAuth, productStatus, productQty, deliveryComplete)
VALUES
('computer', ' this is product description', '#4523600', 'electronic', '53329', '2', '4.6', '45.5', 'hp', 'shipping class details', '4', 'Csutom filed desils', '21-04-2023 12:40PM', 'Compliance information Details', 'Meta title Content', 'Meta description Content', 'Computer HP', 'product photo', 'product video', '1', 'pending', '34', '6'),
('rich', ' this is product description', '#4523600', 'food', '53329', '2', '4', '45', 'dell', 'shipping class details', '4', 'Csutom filed desils', '21-04-2023 12:40PM', 'Compliance information Details', 'Meta tatle Content', 'Meta description Content', 'Computer HP', 'product photo', 'product video', '2', 'done', ;'3', '1')


-- Create category table
CREATE TABLE productCatagory (
    id INT AUTO_INCREMENT PRIMARY KEY ,
    categoryName VARCHAR (500),
    categoryQty INT,
    categoryDescription VARCHAR (600),  
    userAuth INT
)
-- Insert Basic category Data 
INSERT INTO productCatagory (`categoryName` , `categoryQty`, `categoryDescription`,`userAuth`) VALUES
('electronic', 123, 'Other Description', 2),
('cloth', 463,'Other Description', 1),
('fesion', 2, 'Other Description',2),
('food', 87,'Other Description', 2)


-- Comment Table 
CREATE TABLE userComment (
id int AUTO_INCREMENT PRIMARY KEY,
    name varchar (300),
    comment text,
    time varchar (600),
    serAuth int,
    postId int
)
INSERT INTO `usercomment`(`name`, `comment`, `time`, `serAuth`, `postId`) VALUES 
('shafikul', 'this is a demo comment', '02-02-2024 03:12PM', 4, 34),
('Runjila', 'this is a demo comment', '22-07-2024 03:12PM', 3, 2),
('shifat', 'this is a demo comment', '11-01-2024 03:12PM', 1, 7),
('Karim', 'this is a demo comment', '03-03-2024 03:12PM', 3, 22),
('Rohim', 'this is a demo comment', '02-08-2024 03:12PM', 2, 12)