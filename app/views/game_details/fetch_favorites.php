<?php
if(!defined('CLIENT_ID')){
    require('../../../config/api_config.php');
}

if (empty($_SESSION["login_data"]["user"]) || empty($_POST['data']['game_id'])) {
    return;
}

$username = $_SESSION["login_data"]["user"];
$gameId = intval($_POST['game_id']);

if (check_favorite($username, $gameId)) {
    add_favorite_game( $username, $gameId);
} else {
    remove_favorite_game($username, $gameId);
}