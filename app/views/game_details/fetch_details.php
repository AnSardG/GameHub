<?php
if(!defined('CLIENT_ID')){
  require('../../../config/api_config.php');
}

function fetchGameDetails($game_id) {
  $api_url = 'https://api.igdb.com/v4/games/';

  $headers = [
      'Client-ID: ' . constant('CLIENT_ID'),
      'Authorization: ' . constant('ACCESS_TOKEN'),
  ];

  $fields = [
      'name',
      'platforms.name',
      'summary',
      'involved_companies.company.name',
      'screenshots.url',
  ];

  $queryParams = [
      'fields' => implode(',', $fields),
      'where id = ' . $game_id,
  ];

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $api_url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_POSTFIELDS, implode(',', $queryParams));
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  // Execute the cURL request
  $response = curl_exec($ch);

  // Close cURL
  curl_close($ch);

  // Decode JSON response
  $gameDetails = json_decode($response, true);

  return $gameDetails;
}


$gameId = isset($_GET['game_id']) ? $_GET['game_id'] : '';

// Fetch game details
$gameDetails = fetchGameDetails($gameId);

