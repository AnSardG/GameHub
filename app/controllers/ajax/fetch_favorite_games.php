<?php
require('./app/helpers/api_helper.php');

$game_ids = array_column(get_user_favorite_games($_SESSION["login_data"]["user"]), 'game_id');

if (empty($game_ids)) {
  $no_games_msg = '
    <div class="col-12 text-center mt-5 mb-5">
      <p class="display-5" style="color: #828282; font-weight:500">Start adding new games!</p>      
      <div style="margin-bottom:150%;"></div>
    </div>
  ';
  echo $no_games_msg;
  return;
}

$games = get_games($game_ids);

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

if ($i > 0 && $i < 3) {
  $i = 0;
  $game_row .= '</div>';
  echo $game_row;
  $game_row = '';
}
echo '<div style="margin-bottom:115%;"></div>';
?>

<script>
  function viewGameDetails(gameId) {
    window.location.href = 'index.php?game=' + gameId;
  }
</script>