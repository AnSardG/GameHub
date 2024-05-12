<?php
require_once('../config/model_config.php');
require_once('../app/models/database.php');

function add_user($username, $email, $password) {
    $connection = start_connection(DB_HOST, DB_USER_ADMIN, DB_PASSWORD_ADMIN, DB_NAME);
    db_query("INSERT IGNORE INTO users (username, email, pass) VALUES ('$username', '$email', '$password');", $connection);
    close_connection($connection);
}

function is_registered($username) {
    $registered = false;
    $connection = start_connection(DB_HOST, DB_USER_ADMIN, DB_PASSWORD_ADMIN, DB_NAME);
    $result = db_query("SELECT username FROM users WHERE username = '$username';", $connection);
    if(db_get_result($result) != null) {
        $registered = true;
    }
    close_connection($connection);
    return $registered;
}

function check_login($username, $password) {
    $exists = false;
    $connection = start_connection(DB_HOST, DB_USER_ADMIN, DB_PASSWORD_ADMIN, DB_NAME);
    $result = db_query("SELECT * FROM users WHERE username = '$username' AND pass = '$password';", $connection);
    if(db_get_result($result) != null) {
        $exists = true;
    }
    close_connection($connection);
    return $exists;    
}