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
gamer1gamer1
    /*
    CREATE TABLE IF NOT EXISTS games ( 
        id INT NOT NULL AUTO_INCREMENT,
        api_id INT,
        title VARCHAR(255) NOT NULL,
        corporation VARCHAR(255),
        game_description TEXT,
        favorite_votes INT,
        PRIMARY KEY (id)
    );


    CREATE TABLE IF NOT EXISTS devices (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    );

    CREATE TABLE IF NOT EXISTS game_devices (
        game_id INT,
        device_id INT,
        FOREIGN KEY (game_id) REFERENCES games(id),
        FOREIGN KEY (device_id) REFERENCES devices(id),
        PRIMARY KEY (game_id, device_id)
    );

    */

    CREATE TABLE IF NOT EXISTS user_favorite_games (
        user_id INT,
        game_id INT,
        FOREIGN KEY (user_id) REFERENCES users(id),
        FOREIGN KEY (game_id) REFERENCES games(id),
        PRIMARY KEY (user_id, game_id)
    );

-- Create admin user

CREATE USER IF NOT EXISTS 'admin_gamehub' IDENTIFIED BY 'admin';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, ALTER, EXECUTE ON *.* TO 'admin_gamehub'@'%';

-- Insert data

USE gamehub;

INSERT IGNORE INTO users (username, email, pass) VALUES
    ('test', 'test@gamehub.com', 'test');