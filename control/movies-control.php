<?php

    require_once '../model/queries.php';

    $q = new Queries();

    $sql = "SELECT m_name, m_description, m_genre FROM movies";
    $params = array();

    $result = $q->query($sql, $params);

    $data = $result->fetchAll();

    // $genres = array("Drama", "Crime", "Comedy", "Romance", "Action", "Horror", "Family", "Documentary", "Animation", "Musical", "Adult", "Thriller");

    $genres = array();

    foreach($data as $row) {
        $movie_genres = explode(',', $row['m_genre']);
        foreach($movie_genres as $genre) {
            if(in_array(ucfirst(ltrim($genre)), $genres) == false){
                $genres[] = ucfirst(ltrim($genre));
            }
        }
    }
