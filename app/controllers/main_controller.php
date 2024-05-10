<?php
require_once('../app/models/model.php');
require('../config/api_config.php');
require('../config/view_config.php');
session_start();

if(isset($_POST['logged'])) {
    require_once('../app/controllers/home_controller.php');
} else {
    require_once('../app/controllers/login_controller.php');
}

require('../app/views/layout/layout.php');
