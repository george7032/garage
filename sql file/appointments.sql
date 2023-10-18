CREATE TABLE appointments (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 service VARCHAR(30) NOT NULL UNIQUE,
  schedule VARCHAR(255) NOT NULL,
  numberplate VARCHAR(255) NOT NULL,
  amount VARCHAR (255) NOT NULL,
  status VARCHAR (255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
