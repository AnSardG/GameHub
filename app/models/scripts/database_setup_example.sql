-- Database creation
    CREATE DATABASE IF NOT EXISTS gamehub;
    USE gamehub;

-- Tables creation
    CREATE TABLE IF NOT EXISTS users (
        id INT NOT NULL AUTO_INCREMENT,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        pass VARCHAR(255) NOT NULL,        
        PRIMARY KEY (id),
        UNIQUE(username)
    );

    CREATE TABLE IF NOT EXISTS user_favorite_games (
        username VARCHAR(255),
        game_id INT,
        FOREIGN KEY (username) REFERENCES users(username)
    );

-- Create admin user

CREATE USER IF NOT EXISTS 'admin_gamehub' IDENTIFIED BY 'admin';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, ALTER, EXECUTE ON *.* TO 'admin_gamehub'@'%';

-- Insert data

USE gamehub;

INSERT IGNORE INTO users (username, email, pass) VALUES
    ('test', 'test@gamehub.com', 'test');