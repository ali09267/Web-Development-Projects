create database task02;
use task02;

DROP TABLE IF EXISTS STUDENT;
DELETE FROM STUDENT;
SET SQL_SAFE_UPDATES = 0;

CREATE TABLE STUDENT(
std_ID INT PRIMARY KEY AUTO_INCREMENT,
std_Name VARCHAR(50),
rollNo INT,
email varchar(50),
dept VARCHAR(30),
batch int,
phone varchar(11),
gender ENUM('Male', 'Female', 'Other'),
imgPath varchar(255));

SELECT*FROM STUDENT;
