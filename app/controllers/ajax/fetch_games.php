<?php
require('./app/helpers/api_helper.php');

$search = !empty($_GET['search']) ? $_GET['search'] : null;

if (empty($_SESSION['searched_once'])) {

    if ($search) {
        $games = get_games_by_search_string($search);
        $_SESSION['searched_once'] = true;
    } else {
        $page = $_POST['page'] ?? 1;
        $games = get_games(null, $page);
    }

    $i = 0;
    foreach ($games as $game) {
        $platforms = isset($game['platforms']) ? implode(', ', array_column($game['platforms'], 'name')) : 'N/A';
        $image = isset($game['cover']) ? str_replace("t_thumb", "t_cover_big", $game['cover']['url']) : './public/img/placeholder.jpg';
        $imageUrl = isset($game['cover']) ? 'https:' . $image : './public/img/placeholder.jpg';
        if ($i == 0) {
            $game_row = '<div class="row">';
        }
        $game_row .= '
        <div class="col-4">
          <div class="game-card" onclick="viewGameDetails(' . $game['id'] . ')">
            <img src="' . $imageUrl . '" alt="' . $game['name'] . '">
            <div class="game-details">
              <h5 class="text-truncate">' . $game['name'] . '</h5>
              <p class="text-truncate"> ' . $platforms . '</p>
            </div>
          </div>
        </div>
      ';
        $i++;
        if ($i == 3) {
            $i = 0;
            $game_row .= '</div>';
            echo $game_row;
            $game_row = '';
        }
    }
}

?>

<script>
    function viewGameDetails(gameId) {
        window.location.href = 'index.php?game=' + gameId;
    }
</script>