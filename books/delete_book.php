<?php
include "../others/header.php";

// Récupérer l'ID du livre à supprimer
$book_id = $_GET['id'];

// Vérifier si l'ID du livre est passé en paramètre
if (isset($book_id) && !empty($book_id)) {
    try {
        // Supprimer d'abord les relations dans la table book_category
        $deleteRelationsStatement = $pdo->prepare("DELETE FROM book_category WHERE book_id = :book_id");
        $deleteRelationsStatement->execute(["book_id" => $book_id]);

        // Ensuite, supprimer le livre de la table book
        $deleteBookStatement = $pdo->prepare("DELETE FROM book WHERE id = :id");
        $deleteBookStatement->execute(["id" => $book_id]);

        // Rediriger vers la page de liste des livres après la suppression
        header("Location: /books/list_book.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression du livre : " . $e->getMessage();
    }
} else {
    // Si l'ID n'est pas valide, rediriger vers la page de liste des livres
    header("Location: /books/list_book.php");
    exit();
}

include "../others/footer.php";
?>



