<?php

    require_once '../model/queries.php';

    $q = new Queries();

    $sql = "SELECT m_name, m_description FROM movies";
    $params = array();

    $result = $q->query($sql, $params);

    $data = $result->fetchAll();

    var_dump($data);
