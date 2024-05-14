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
INSERT INTO
    `users`(
        `name`, `pass`, `conPass`, `date`, `userComment`, `userRoll`, `email`, `img`
    )
VALUES
    (
        'Md Shaifkul Islam',
        'shafikul',
        'shafikul',
        '14-05-2024',
        'Best',
        '1',
        'shafikul@gmail.com',
        'user-defult-icon.png'
    ),
    (
        'Md Shaifkul Islam',
        'shafikul',
        'shafikul',
        '14-05-2024',
        'Best',
        '2',
        'shafikul@gmail.com',
        'user-defult-icon.png'
    ),
    (
        'Md Shaifkul Islam',
        'shafikul',
        'shafikul',
        '14-05-2024',
        'Best',
        '3',
        'shafikul@gmail.com',
        'user-defult-icon.png'
    ),
    (
        'Md Shaifkul Islam',
        'shafikul',
        'shafikul',
        '14-05-2024',
        'Best',
        '4',
        'shafikul@gmail.com',
        'user-defult-icon.png'
    )