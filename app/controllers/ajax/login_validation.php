<?php
$response = array();

$_SESSION['current_page'] = 'login';
$response['success'] = $_POST['valid'];

if ($response['success']) {
    $formData = $_POST['formData'];
    foreach ($formData as $key => $value) {
        $value = strip_tags($value);
    }

    $_SESSION['login_data'] = $formData;
}

header('Content-Type: application/json');
echo json_encode($response);
exit;
