<?php

$website = "/quorating/";

function require_page($page){
    global $website;

    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= $website;
    $path .= $page;
    require_once($path);
}

function include_page($page){
    global $website;
    
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= $website;
    $path .= $page;
    include_once($path);
}