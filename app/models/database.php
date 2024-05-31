<?php
function start_connection($server, $user, $password, $dbname) {
    try {
        $db = new PDO("mysql:host=$server;dbname=$dbname", "$user", "$password");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        return 'Connection error: ' . $e->getMessage();
    }
}

function close_connection(&$connection) {
    $connection = null;
}

function db_query($query, $connection) {
    return $connection->query($query);
}

function db_get_result($result) {
    return $result->fetchAll(PDO::FETCH_ASSOC);
}