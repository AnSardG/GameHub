<?php
require('../../../config/model_config.php');
session_start();

$response = array();

$_SESSION['current_page'] = 'login';
$_SESSION['login'] = $_POST['valid'];    
$response['success'] = $_POST['valid'];

if ($response['success']) {    
    
} else {
    
}

header('Content-Type: application/json');
echo json_encode($response);
exit;
?>
