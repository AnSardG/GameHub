<?php
if(!defined('CLIENT_ID')){
  require('../../../config/api_config.php');
}

$search = !empty($_GET['search']) ? $_GET['search'] : null;

if($search) {
    $games = get_games_by_search_string($search);
} else {
    $page = $_POST['page'] ?? 1;
    $games = get_games(null, $page);
}

$i = 0;
foreach ($games as $game) {
  $platforms = isset($game['platforms']) ? implode(', ', array_column($game['platforms'], 'name')) : 'N/A';
  $image = str_replace("t_thumb", "t_cover_big", $game['cover']['url']);
  $imageUrl = isset($game['cover']) ? 'https:' . $image : 'img/placeholder.jpg';
  if ($i == 0) {
    $game_row = '<div class="row">';
  }
  $game_row .= '
    <div class="col-4">
      <div class="game-card" onclick="viewGameDetails(' . $game['id'] . ')">
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

function get_games_by_search_string($search) {
    $response = api_request(
    'search',
    'fields game.id; sort total_rating_count desc; where name ~ *"'. $search .'"* & published_at > 0;',
    'POST'
    );

    $result = json_decode($response, true);
    $games_ids = array();
    if (!empty($result)) {
        foreach ($result as $game) {
            $games_ids[] = $game['game']['id'];
        }

        return get_games($games_ids);
    }
}

function get_games($ids = null, $page = null) {
    $limit = 15;
    $queryParams = [
        'fields' => 'name, platforms.name, cover.url',
        'order' => 'total_rating_count:desc',
        'limit' => $limit,
    ];

    if ($ids) {
        if (is_array($ids)) {
            $ids_in = '(' . implode(',', $ids) . ')';
        }else {
            $ids_in = '(' .  $ids . ')';
        }

        $queryParams['fields'] .= '; where id = ' . $ids_in . ';';
    }

    if ($page) {
        $queryParams['offset'] = ($page - 1) * $limit;
    }

    $response = api_request(
            'games',
        'name, platforms.name, cover.url',
        'GET', $queryParams);

    return json_decode($response, true);
}

function api_request($endpoint, $fields, $request_type, $query_params = null) {

    if(empty($endpoint) || empty($fields) || empty($request_type)) {
        return '';
    }

    $curl = curl_init();

    if($query_params) {
        $endpoint .= '?' . http_build_query($query_params);
    }

    $curl_array = array(
        CURLOPT_URL => constant('API_HOST') . $endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $request_type,
        CURLOPT_HTTPHEADER => array(
            'Client-ID: ' . constant('CLIENT_ID'),
            'Authorization: '. constant('ACCESS_TOKEN'),
            'Accept: application/json',
            'Content-Type: application/json'
        )
    );

    if ($request_type == 'POST') {
        $curl_array[CURLOPT_POSTFIELDS] = $fields;
    }

    curl_setopt_array($curl, $curl_array);
    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}

?>

<script>
  function viewGameDetails(gameId) {  
    window.location.href = 'index.php?game=' + gameId;
  }
</script>