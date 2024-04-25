<?php
ob_start(); 
include "../others/header.php";

$book_id = $_GET['id'];

if (isset($book_id) && !empty($book_id)) {
    try {
        
        $deleteRelationsStatement = $pdo->prepare("DELETE FROM book_category WHERE book_id = :book_id");
        $deleteRelationsStatement->execute(["book_id" => $book_id]);
     
        $deleteBookStatement = $pdo->prepare("DELETE FROM book WHERE id = :id");
        $deleteBookStatement->execute(["id" => $book_id]);
        
        header("Location: /books/list_book.php");
        exit();
        
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression du livre : " . $e->getMessage();
    }

} else {
   
    header("Location:/books/list_book.php");
    exit();
}

include "../others/footer.php";
?>



