<?php
session_start();

$response = array();

$_SESSION['current_page'] = 'register';
$response['success'] = $_POST['valid'];

if ($response['success']) {    
    $formData = $_POST['formData'];
    foreach ($formData as $key => $value) {
        $value = strip_tags($value);
    }

    $_SESSION['register_data'] = $formData;
}

header('Content-Type: application/json');
echo json_encode($response);
exit;
?>
