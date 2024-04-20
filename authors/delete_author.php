<?php
include "../others/header.php";

// Récupérer l'ID de l'auteur à supprimer
$author_id = $_GET['id'];

// Vérifier si l'ID de l'auteur est passé en paramètre
if (isset($author_id) && !empty($author_id)) {

    // Préparer la requête SQL pour supprimer l'auteur
    $statement = $pdo->prepare("DELETE FROM author WHERE id = :id");
    $statement->execute(["id" => $author_id]);

    // Rediriger vers la page de liste des auteurs après la suppression
    header("Location: /authors/list_author.php");
    exit();
} 
else {
    // Si l'ID n'est pas valide, rediriger vers la page de liste des auteurs
    header("Location: /authors/list_author.php");
    exit();
}

include "../others/footer.php";
?>
