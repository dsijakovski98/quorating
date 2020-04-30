<?php

if(!@include_once('model/queries.php')) {
    include_once('../model/queries.php');
  }

function getRequests() {
    $q = new Queries();
    
    $sql = "SELECT * FROM media_requests";
    $params = array();

    $result = $q->query($sql, $params);
    $data = $q->getAllData($result);

    return $data;
}

function getRequestData($request, $table_name) {
  $q = new Queries();

  $sql = "SELECT * FROM {$table_name} WHERE id = ? LIMIT 1";
  $params = array($request['prod_id']);

  $result = $q->query($sql, $params);
  $data = $q->getData($result);

  return $data;
}