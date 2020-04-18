<?php

    require_once '../model/queries.php';

    $q = new Queries();

    $sql = "SELECT b_name, b_description, b_genre FROM books";
    $params = array();

    $result = $q->query($sql, $params);

    $data = $result->fetchAll();

    
    $genres = array();

    foreach($data as $row) {
        $book_genres = explode(',', $row['b_genre']);
        foreach($book_genres as $genre) {
            if(in_array(ucfirst(ltrim($genre)), $genres) == false){
                $genres[] = ucfirst(ltrim($genre));
            }
        }
    }
