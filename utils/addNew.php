<?php

include '../model/queries.php';

function setNewItem($name, $creator, $category, $genre, $_description ,$date_added)
{
            $q = new Queries();
            if((int)$category==1)
            {
            $sql = "INSERT INTO movies (name, creator, category, genre, description, date_added) 
            VALUES(?, ?, ?, ?, ?, ?)";
            $params = array($name, $creator, $category, $genre, $description, $date_added);
            $result = $q->query($sql, $params);
            }
            else if((int)$category==2)
            {
                $sql = "INSERT INTO books (name, creator, category, genre, description, date_added) 
            VALUES(?, ?, ?, ?, ?, ?)";
            $params = array($name, $creator, $category, $genre, $description, $date_added);
            $result = $q->query($sql, $params);
            }
            else
            {
                $sql = "INSERT INTO games (name, creator, category, genre, description, date_added) 
            VALUES(?, ?, ?, ?, ?, ?)";
            $params = array($name, $creator, $category, $genre, $description, $date_added);
            $result = $q->query($sql, $params);
            }
}