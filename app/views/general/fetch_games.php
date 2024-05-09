<?php
if(!defined('CLIENT_ID')){
  require('../../../config/api_config.php');
}

$page = isset($_POST['page']) ? $_POST['page'] : 1;
$limit = 15;
$apiUrl = 'https://api.igdb.com/v4/games';
$headers = [
  'Client-ID: ' . constant('CLIENT_ID'),
  'Authorization: ' . constant('ACCESS_TOKEN'),
];
$queryParams = [
  'fields' => 'name, platforms.name, cover.url',
  'order' => 'total_rating_count:desc',
  'limit' => $limit,
  'offset' => ($page - 1) * $limit,
];

$apiUrl .= '?' . http_build_query($queryParams);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$games = json_decode($response, true);

$i = 0;
foreach ($games as $game) {
  $platforms = isset($game['platforms']) ? implode(', ', array_column($game['platforms'], 'name')) : 'N/A';
  $imageUrl = isset($game['cover']) ? 'https:' . $game['cover']['url'] : 'img/placeholder.jpg';
  if ($i == 0) {
    $game_row = '<div class="row">';
  }
  $game_row .= '
    <div class="col-4">
      <div class="game-card">
        <img src="' . $imageUrl . '" alt="' . $game['name'] . '">
        <div class="game-details">
          <h5 class="text-truncate">' . $game['name'] . '</h5>
          <p class="text-truncate"> '. $platforms . '</p>
        </div>
      </div>
    </div>
  ';
  $i++;
  if($i == 3) {
    $i = 0;
    $game_row .= '</div>';
    echo $game_row;
    $game_row = '';
  }
}
?>