<?php
if (empty($_POST["username"]) || empty($_POST['game_id'])) {
    return;
}

$username = $_POST["username"];
$gameId = intval($_POST['game_id']);

if (!check_favorite($username, $gameId)) {
    add_favorite_game($username, $gameId);
} else {
    remove_favorite_game($username, $gameId);
}