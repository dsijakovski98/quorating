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


function getMediaType($cat_id) {
  $media_type = "";
  switch($cat_id) {
    case '1':
      $media_type = "movies";
      break;
    case '2':
      $media_type = "books";
      break;
    case '3':
      $media_type = "games";
      break;
  }

  return $media_type;
}

function getCreator($cat_id) {
  $creator = "";
  switch($cat_id) {
    case '1':
      $creator = "Director";
      break;
    case '2':
      $creator = "Author";
      break;
    case '3':
      $creator = "Developer";
      break;
  }

  return $creator;
}

function getRequestPicture($prod_id, $cat_id) {
  $q = new Queries();

  $sql = "SELECT pic_name, ext FROM media_images WHERE prod_id = ? AND category = ? LIMIT 1";
  $params = array($prod_id, $cat_id);

  $result = $q->query($sql, $params);

  $data = $q->getData($result);

  return $data['pic_name'] . '.' . $data['ext'];
}