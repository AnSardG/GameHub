<?php
require_once('../app/models/model.php');
require('../config/api_config.php');
require('../config/view_config.php');
session_start();

if (isset($_SESSION['login_data']) && $_SESSION['login_data'] != null) {    
    $_SESSION['login'] = check_login($_SESSION['login_data']['user'], $_SESSION['login_data']['pass']);
    $_SESSION['login_failed'] = !$_SESSION['login'];    
    $_SESSION['login_data'] = null;
}

if (isset($_SESSION['register_data']) && $_SESSION['register_data'] != null) {
    $_SESSION['register_failed'] = is_registered($_SESSION['register_data']['user']);
    $_SESSION['register_data'] = null;
}

$_SESSION['login_data'] = null;
$_SESSION['register_data'] = null;
if (isset($_GET['game'])) {
    require_once('../app/controllers/details_controller.php');
} else if ((isset($_SESSION['login']) && $_SESSION['login']) && (isset($_SESSION['current_page']) && $_SESSION['current_page'] != 'home') 
&& (!isset($_GET['login']) || !isset($_GET['register']))) {
    require_once('../app/controllers/home_controller.php');
} else {
    require_once('../app/controllers/login_controller.php');
}

require('../app/views/layout/layout.php');
