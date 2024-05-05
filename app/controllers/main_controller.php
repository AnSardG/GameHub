<?php
require_once('../app/models/model.php');
include_once('../config/api_config.php');
require_once('../config/view_config.php');
session_start();

$data = array();
$data['title'] = TITLE_HOME;
$data['header'] = HEADER_HOME;
$data['body'] = BODY_HOME;
$data['footer'] = "&copy; " . date('Y') . " GameHub. All rights reserved.";
$data['menu_bar'] = MENU_BAR;

if(isset($_GET['logout'])) {
    $_SESSION['logged'] = false;
}

if(isset($_SESSION['logged']) && $_SESSION['logged']){
    require('../app/controllers/logged_controller.php');
}

require('../app/views/layout/layout.php');
