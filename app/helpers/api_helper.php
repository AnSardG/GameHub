<?php

function api_request($endpoint, $fields, $request_type, $query_params = null)
{

    if (empty($endpoint) || empty($fields) || empty($request_type)) {
        return '';
    }

    $curl = curl_init();

    if ($query_params) {
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
            'Authorization: ' . constant('ACCESS_TOKEN'),
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

function get_games($ids = null, $page = null, $limit = 15)
{
    $queryParams = [
        'fields' => 'name, platforms.name, cover.url',
        'order' => 'total_rating_count:desc',
        'limit' => $limit,
    ];

    if ($ids) {
        if (is_array($ids)) {
            $ids_in = '(' . implode(',', $ids) . ')';
        } else {
            $ids_in = '(' . $ids . ')';
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

function get_games_by_search_string($search)
{
    $response = api_request(
        'search',
        'fields game.id; sort total_rating_count desc; where name ~ *"' . $search . '"* & published_at > 0;',
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