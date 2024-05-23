<?php
if(!defined('CLIENT_ID')){
  require('../../../config/api_config.php');
}

function fetchGameDetails($game_id) {
  $curl = curl_init();
  $fields = 'fields name, platforms.name, summary, involved_companies.company.name, screenshots.url; where id = ' . $game_id . ';';

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.igdb.com/v4/games',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $fields,
    CURLOPT_HTTPHEADER => array(
      'Client-ID: ' . constant('CLIENT_ID'),
      'Authorization: ' . constant('ACCESS_TOKEN'),
      'Accept: application/json',
      'Content-Type: application/json'      
    ),
  ));
  
  $response = curl_exec($curl);
  $httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  
  curl_close($curl);  

  if($httpStatus != 200) {
    return false;
  }
  // Decode JSON response
  $gameDetails = json_decode($response, true);

  return $gameDetails;
}


$gameId = !empty($_GET['game']) ? $_GET['game'] : '';

// Fetch game details
$gameDetails = fetchGameDetails($gameId);

