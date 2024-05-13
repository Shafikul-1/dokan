-- Create Database
CREATE DATABASE dokan;

-- Create User Table
CREATE TABLE users (
    id int AUTO_INCREMENT,
    name varchar (200),
    pass varchar (500),
    conPass varchar (500),
    date varchar (20),
    userComment TEXT,
    userRoll int,
    PRIMARY KEY (id)
)