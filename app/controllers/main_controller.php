<?php
require_once('./app/models/model.php');
require('./config/api_config.php');
require('./config/view_config.php');
session_start();

if (!empty($_SESSION['login_data'])) {

    $_SESSION['login'] = check_login($_SESSION['login_data']['user'], $_SESSION['login_data']['pass']);

}

if (isset($_GET['game'])) {

    require_once('./app/controllers/details_controller.php');

} else if (!empty($_GET['logout'])) {

    $_SESSION['login'] = 0;
    $_SESSION['login_data'] = null;
    require_once('./app/controllers/login_controller.php');

} else if (!empty($_SESSION['login'])) {

    require_once('./app/controllers/home_controller.php');

} else {

    require_once('./app/controllers/login_controller.php');

}

require('./app/views/layout/layout.php');