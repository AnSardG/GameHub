<?php
$_SESSION['current_page'] = 'login';

if(isset($_POST['register-sent'])) {
    output_data_to_js($_POST['user'], $_POST['email'], $_POST['pass'], $_POST['pass-repeat']);
}

$_SESSION['login_failed'] = false;

$data = array();

if(!empty($_GET['registered'])) {

    if(!empty($_SESSION['register_data']) && !is_registered($_SESSION['register_data']['user'])) {

        add_user($_SESSION['register_data']['user'], $_SESSION['register_data']['email'], $_SESSION['register_data']['pass']);
        $_SESSION['register_data'] = null;
        $registered = true;

    } else {

        $registered = false;

    }
}

if(!empty($_GET['logged'])) {

    $_SESSION['login_failed'] = !empty($_SESSION['login_data']) && !check_login($_SESSION['login_data']['user'], $_SESSION['login_data']['pass']);
    $_SESSION['login_data'] = null;
    $logged_in = true;

}

if ((isset($_GET['login']) || !empty($_SESSION['login_failed']) || !empty($logged_in) || !empty($registered)) && empty($_GET['register'])) {

    $data['title'] = $title['login'];
    $data['header'] = $header['login'];
    $data['body'] = $body['login'];

} else {

    $_SESSION['register_failed'] = !empty($_SESSION['register_data']) && is_registered($_SESSION['register_data']['user']);

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