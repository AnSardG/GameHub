<?php
try {        
    $db = new PDO("mysql:host=mysql", "root", "root");
    // Configure error mode to throw exception instead of warnings
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlScript = file_get_contents("../app/models/scripts/database_setup.sql");
    $db->exec($sqlScript);        
} catch (PDOException $e) {
    echo "Error installing database locally: " . $e->getMessage();
}