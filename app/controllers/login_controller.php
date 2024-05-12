<?php
$_SESSION['current_page'] = 'login';

if(isset($_POST['register-sent'])) {
    output_data_to_js($_POST['user'], $_POST['email'], $_POST['pass'], $_POST['pass-repeat']);
}

$data = array();

if (isset($_GET['login']) || isset($login_failed) || isset($_POST['login-sent'])) {  

    if(isset($_SESSION['register_data']) && $_SESSION['register_data'] != null) {
        if(is_registered($_SESSION['register_data']['user'])) {
            add_user($_SESSION['register_data']['user'], $_SESSION['register_data']['email'], $_SESSION['register_data']['pass']);
        }
    }

    $data['title'] = $title['login'];
    $data['header'] = $header['login'];
    $data['body'] = $body['login'];
} else {
    $data['title'] = $title['register'];
    $data['header'] = $header['register'];
    $data['body'] = $body['register'];    
}

$data['footer'] = "&copy; " . date('Y') . " GameHub. All rights reserved.";
$data['menu_bar'] = MENU_BAR;

function output_data_to_js($user, $email, $pass, $pass_repeat) {
    echo "<script>";
    echo "var formData = {";
    echo "  user: '$user',";
    echo "  email: '$email',";
    echo "  pass: '$pass',";
    echo "  pass_repeat: '$pass_repeat'";
    echo "};";
    echo "</script>";
}