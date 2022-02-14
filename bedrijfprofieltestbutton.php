<?php
include "backend/db.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    global $mysqli;
    $query = "DELETE * FROM `comments_business` WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s',$id);
    $stmt->execute();
    header('bedrijfprofieltest.php?custof=1&membof=1&m=1');
}