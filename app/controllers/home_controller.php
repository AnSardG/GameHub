<?php
$_SESSION['current_page'] = 'home';
$_SESSION['searched_once'] = false;

$data = array();
$data['title'] = $title['home'];
$data['header'] = $header['home'];
$data['body'] = $body['home'];
$data['footer'] = "&copy; " . date('Y') . " Antonio Sard González. All rights reserved.";
$data['menu_bar'] = MENU_BAR;



