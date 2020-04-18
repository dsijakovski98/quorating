<?php

    require_once '../model/queries.php';

    $q = new Queries();

    $sql = "SELECT g_name, g_description, g_genre FROM games";
    $params = array();

    $result = $q->query($sql, $params);

    $data = $result->fetchAll();

    
    $genres = array();

    foreach($data as $row) {
        $game_genres = explode(',', $row['g_genre']);
        foreach($game_genres as $genre) {
            if(in_array(ucfirst(ltrim($genre)), $genres) == false){
                $genres[] = ucfirst(ltrim($genre));
            }
        }
    }
