CREATE DATABASE resume_db;
-- DROP DATABASE resume_db;
USE resume_db;

-- rollback;

CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);
-- DROP TABLE users;
/*
INSERT INTO users VALUES 
(1,"Subash Pandey","pandeysubash404@gmail.com","d1e6989494884caca3c994c88b050cd8");
SELECT * FROM users;
*/
CREATE TABLE personal (
  id INT PRIMARY KEY,
  first_name VARCHAR(50),
  middle_name VARCHAR(50),
  last_name VARCHAR(50),
  email VARCHAR(50),
  phone_number VARCHAR(20),
  address VARCHAR(100),
  address_2 VARCHAR(100),
  city VARCHAR(50),
  state VARCHAR(50),
  zip_code VARCHAR(20),
  user_email VARCHAR(50),
  FOREIGN KEY (user_email) REFERENCES users(email)
);
SELECT * FROM personal;
-- DELETE FROM personal; 
-- DROP TABLE personal;

CREATE TABLE education (
  id INT ,
  eid INT AUTO_INCREMENT PRIMARY KEY ,
  education_level VARCHAR(50),
  school VARCHAR(50),
  city VARCHAR(50),
  start_date DATE,
  end_date DATE,
  FOREIGN KEY (id) REFERENCES personal(id)
);
SELECT * FROM education;
-- DROP TABLE education;

CREATE TABLE employment (
  id INT,
  emid INT AUTO_INCREMENT PRIMARY KEY ,
  company_name VARCHAR(50),
  job_title VARCHAR(50),
  city VARCHAR(50),
  start_date DATE,
  end_date DATE,
  FOREIGN KEY (id) REFERENCES personal(id)
);
SELECT * FROM employment;
-- DROP TABLE employment;

CREATE TABLE skills (
  id INT ,
  sid INT AUTO_INCREMENT PRIMARY KEY ,
  skill VARCHAR(255) NOT NULL,
  proficiency_level VARCHAR(255) NOT NULL,
  FOREIGN KEY (id) REFERENCES personal(id)
);
SELECT * FROM skills;
-- DROP TABLE skills;

CREATE TABLE hobbies (
  id INT,
  hid INT AUTO_INCREMENT PRIMARY KEY ,
  hobbiesname VARCHAR(255) NOT NULL,
  FOREIGN KEY (id) REFERENCES personal(id)
);
SELECT * FROM hobbies;
--   DROP TABLE hobbies;

CREATE TABLE summary (
  id INT,
  suid INT AUTO_INCREMENT PRIMARY KEY ,
  summaries TEXT NOT NULL,
  FOREIGN KEY (id) REFERENCES personal(id)
);

SELECT * FROM summary;
--  DELETE FROM summary; 
--   DROP TABLE summary;
