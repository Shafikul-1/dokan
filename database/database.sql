-- Create Database
-- CREATE DATABASE dokan;
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

-- Insert Basic Users Data 
INSERT INTO
    `users`(
        `name`,
        `pass`,
        `conPass`,
        `date`,
        `userComment`,
        `userRoll`
    )
VALUES
    (
        'Md Shaifkul Islam',
        'shafikul',
        'shafikul',
        '555',
        'Best',
        '1'
    ),
    (
        'Md Shaifkul Islam',
        'shafikul',
        'shafikul',
        '555',
        'Best',
        '2'
    ),
    (
        'Md Shaifkul Islam',
        'shafikul',
        'shafikul',
        '555',
        'Best',
        '3'
    ),
    (
        'Md Shaifkul Islam',
        'shafikul',
        'shafikul',
        '555',
        'Best',
        '4'
    )