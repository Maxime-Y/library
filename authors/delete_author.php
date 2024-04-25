<?php
ob_start(); 
session_start();
include "../others/header.php";


$author_id = $_GET['id'];


if (isset($author_id) && !empty($author_id)) {

    
    $statement = $pdo->prepare("DELETE FROM author WHERE id = :id");
    $statement->execute(["id" => $author_id]);

    
    header("Location:/authors/list_author.php");
    exit();
} 
else {
   
    header("Location:/authors/list_author.php");
    exit();
}

include "../others/footer.php";
?>
