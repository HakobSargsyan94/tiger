CREATE DATABASE news_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE news_db;

CREATE TABLE news (
                      id INT AUTO_INCREMENT PRIMARY KEY,
                      title VARCHAR(255),
                      description TEXT,
                      link VARCHAR(255),
                      pub_date DATETIME,
                      category VARCHAR(100),
                      guid VARCHAR(255) UNIQUE
);

CREATE INDEX idx_pub_date ON news(pub_date);
CREATE INDEX idx_category ON news(category);