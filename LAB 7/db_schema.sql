-- Run these commands in phpMyAdmin or your MySQL prompt to set up the database.

CREATE DATABASE content;

USE content;

CREATE TABLE users (
    user_id MEDIUMINT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(15) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(40),
    password CHAR(60) NOT NULL,
    registration_date DATETIME NOT NULL,
    PRIMARY KEY (user_id)
);

-- Sample data (20 users)
INSERT INTO users (first_name, last_name, username, email, password, registration_date) VALUES
('John', 'Doe', 'johndoe', 'john.doe@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-01-15 10:30:00'),
('Jane', 'Smith', 'janesmith', 'jane.smith@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-01-18 14:22:30'),
('Michael', 'Johnson', 'mikej', 'michael.j@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-02-03 09:15:45'),
('Emily', 'Williams', 'emilyw', 'emily.williams@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-02-10 16:40:12'),
('David', 'Brown', 'davidb', 'david.brown@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-02-14 11:05:33'),
('Sarah', 'Davis', 'sarahd', 'sarah.davis@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-03-01 08:20:19'),
('James', 'Miller', 'jamesm', 'james.miller@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-03-08 13:55:28'),
('Lisa', 'Wilson', 'lisaw', 'lisa.wilson@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-03-15 15:10:41'),
('Robert', 'Moore', 'robertm', 'robert.moore@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-04-02 10:45:07'),
('Jennifer', 'Taylor', 'jennifert', 'jennifer.taylor@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-04-12 12:30:55'),
('William', 'Anderson', 'williama', 'william.anderson@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-04-20 09:00:00'),
('Jessica', 'Thomas', 'jessicat', 'jessica.thomas@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-05-05 14:15:23'),
('Christopher', 'Jackson', 'chrisj', 'chris.jackson@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-05-18 11:22:44'),
('Amanda', 'White', 'amandaw', 'amanda.white@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-06-01 16:05:12'),
('Daniel', 'Harris', 'danielh', 'daniel.harris@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-06-10 08:50:38'),
('Ashley', 'Martin', 'ashleym', 'ashley.martin@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-07-03 13:40:29'),
('Matthew', 'Thompson', 'mattt', 'matt.thompson@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-07-15 10:12:05'),
('Melissa', 'Garcia', 'melissag', 'melissa.garcia@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-08-01 15:35:47'),
('Andrew', 'Martinez', 'andrewm', 'andrew.martinez@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-08-20 09:25:16'),
('Michelle', 'Robinson', 'micheller', 'michelle.robinson@email.com', '$2y$10$abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP', '2025-09-05 12:18:52');