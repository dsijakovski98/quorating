<?php
include 'queries.php';
function setRatings()
{
    if(isset($_SESSION['user_id']))
    {
        $user_id=$_POST['user_id'];
        $categorie_id=$_POST['categorie_id'];
        $prod_id=$_POST['prod_id'];
        $rating=$_POST['rating'];
        $r_date=$_POST['r_date'];

        $q = new Queries();
        $sql = "INSERT INTO user_rate 
        (user_id,categorie_id,prod_id,rating,r_date) VALUES
        (:user_id,:categorie_id,:prod_id,:rating,:r_date)";
        $params = array($user_id,$catrgorie_id,$prod_id,$rating,$r_date);
        $result = $q->query($sql, $params); 
    }
}