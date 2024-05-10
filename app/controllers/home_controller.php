<?php
$data = array();
$data['title'] = $title['home'];
$data['header'] = $header['home'];
$data['body'] = $body['home'];
$data['footer'] = "&copy; " . date('Y') . " GameHub. All rights reserved.";
$data['menu_bar'] = $menu_bar['main'];

if(isset($_GET['logout'])) {
    $_SESSION['logged'] = false;
}

if(isset($_SESSION['logged']) && $_SESSION['logged']){
    require('../app/controllers/logged_controller.php');
}