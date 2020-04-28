<?php

    require_once '../utils/include.php';
    require_page("utils/addNew.php");

    if(!isset($_POST['add'])) {   
        exit();
    }


    $name = $_POST['name'];
    $creator = $_POST['creator'];
    $category = $_POST['category'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $date_added = $_POST['date_added'];

    setNewItem($name, $creator, $category, $genre, $description, $date_added);

