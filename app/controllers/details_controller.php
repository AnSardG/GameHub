<?php
$_SESSION['current_page'] = 'details';

$data = array();
$data['title'] = $title['details'];
$data['header'] = $header['details'];
$data['body'] = $body['details'];
$data['footer'] = '<div class="details-footer">&copy; ' . date('Y') . ' Antonio Sard González. All rights reserved.</div>';
$data['menu_bar'] = MENU_BAR;

