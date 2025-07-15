CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  role ENUM('admin', 'lecturer', 'student') DEFAULT 'student'
);

CREATE TABLE units (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100)
);

CREATE TABLE courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  description TEXT,
  unit_id INT,
  lecturer_id INT,
  FOREIGN KEY (unit_id) REFERENCES units(id),
  FOREIGN KEY (lecturer_id) REFERENCES users(id)
);

CREATE TABLE files (
  id INT AUTO_INCREMENT PRIMARY KEY,
  course_id INT,
  filename VARCHAR(255),
  filepath VARCHAR(255),
  uploaded_by INT,
  approved BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (course_id) REFERENCES courses(id),
  FOREIGN KEY (uploaded_by) REFERENCES users(id)
);

CREATE TABLE comments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  course_id INT,
  user_id INT,
  content TEXT,
  timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (course_id) REFERENCES courses(id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);
