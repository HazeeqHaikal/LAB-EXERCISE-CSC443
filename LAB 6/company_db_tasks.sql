-- ---------------------------------------------------------
-- TASK 1: Create database companyDB
-- ---------------------------------------------------------
CREATE DATABASE IF NOT EXISTS companyDB;
USE companyDB;

-- ---------------------------------------------------------
-- TASK 2: Create table DEPARTMENT and EMPLOYEE
-- ---------------------------------------------------------

-- Create DEPARTMENT table first (Parent table)
CREATE TABLE DEPARTMENT (
    DEPT_NO CHAR(2) NOT NULL,
    DEPT_NAME VARCHAR(40),
    PRIMARY KEY (DEPT_NO)
);

-- Create EMPLOYEE table second (Child table)
-- Note: EMP_NUM is set as PK, DEPT_NO is FK referencing DEPARTMENT
CREATE TABLE EMPLOYEE (
    EMP_NUM VARCHAR(5) NOT NULL,
    EMP_NAME VARCHAR(40),
    EMP_SALARY DECIMAL(10, 2),
    EMP_DOB DATE,
    EMP_GENDER CHAR(1),
    DEPT_NO CHAR(2),
    PRIMARY KEY (EMP_NUM),
    FOREIGN KEY (DEPT_NO) REFERENCES DEPARTMENT(DEPT_NO)
);

-- ---------------------------------------------------------
-- TASK 3: Display the created table structure
-- ---------------------------------------------------------
DESC DEPARTMENT;
DESC EMPLOYEE;

-- ---------------------------------------------------------
-- TASK 4: Insert sample data (Referring to Figure 1 & 2)
-- ---------------------------------------------------------

-- Insert data into DEPARTMENT
INSERT INTO DEPARTMENT (DEPT_NO, DEPT_NAME) VALUES
('FN', 'Finance'),
('IT', 'Information Technology'),
('HR', 'Human Resource');

-- Insert data into EMPLOYEE
INSERT INTO EMPLOYEE (EMP_NUM, EMP_NAME, EMP_SALARY, EMP_DOB, EMP_GENDER, DEPT_NO) VALUES
('E1', 'Ahmad Zaki', 3500.50, '1993-01-12', 'M', 'IT'),
('E2', 'Siti Mariam', 4200.00, '1980-05-21', 'F', 'HR'),
('E3', 'John Lim', 3900.00, '1992-03-08', 'M', 'IT'),
('E4', 'Nur Aisyah', 4100.00, '1995-11-13', 'F', 'FN'),
('E5', 'Faizal Rahim', 4500.00, '1975-07-18', 'M', 'HR'),
('E6', 'Kavitha Devi', 3800.00, '1994-09-30', 'F', 'IT'),
('E7', 'Daniel Wong', 4300.00, '1993-12-25', 'M', 'FN'),
('E8', 'Laila Hassan', 4700.00, '1991-04-04', 'F', 'HR'),
('E9', 'Muthu Kumar', 3600.00, '1996-06-16', 'M', 'IT'),
('E10', 'Zarina Idris', 4000.00, '1992-02-28', 'F', 'IT'),
('E11', 'Chong Wei', 5200.00, '1979-10-13', 'M', 'FN'),
('E12', 'Farah Nadia', 3900.00, '1993-08-07', 'F', 'HR'),
('E13', 'Hafizuddin', 3500.00, '1997-03-15', 'M', 'IT'),
('E14', 'Joanne Lee', 4900.00, '1990-01-01', 'F', 'FN'),
('E15', 'Rashid Omar', 3700.00, '1994-10-19', 'M', 'HR');

-- ---------------------------------------------------------
-- TASK 5: View entire data in DEPARTMENT and EMPLOYEE table
-- ---------------------------------------------------------
SELECT * FROM DEPARTMENT;
SELECT * FROM EMPLOYEE;

-- ---------------------------------------------------------
-- TASK 6: Produce reports
-- ---------------------------------------------------------

-- 6a. Find the number of employees based on department name.
SELECT 
    d.DEPT_NAME, 
    COUNT(e.EMP_NUM) AS Number_Of_Employees
FROM DEPARTMENT d
LEFT JOIN EMPLOYEE e ON d.DEPT_NO = e.DEPT_NO
GROUP BY d.DEPT_NAME;

-- 6b. List all employee information who has the lowest salary.
SELECT * FROM EMPLOYEE 
WHERE EMP_SALARY = (SELECT MIN(EMP_SALARY) FROM EMPLOYEE);

-- 6c. List all employees who working in "Finance" and "Human Resource" department.
SELECT 
    e.EMP_NAME, 
    d.DEPT_NAME
FROM EMPLOYEE e
JOIN DEPARTMENT d ON e.DEPT_NO = d.DEPT_NO
WHERE d.DEPT_NAME IN ('Finance', 'Human Resource');

-- 6d. List employee name whose age is more than 40 years old.
-- Note: This calculates age dynamically based on the current date.
SELECT 
    EMP_NAME,
    TIMESTAMPDIFF(YEAR, EMP_DOB, CURDATE()) AS Age
FROM EMPLOYEE
WHERE TIMESTAMPDIFF(YEAR, EMP_DOB, CURDATE()) > 40;