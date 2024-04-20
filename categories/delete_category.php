<?php
include "../others/header.php";

// Récupérer l'ID de la catégorie à supprimer
$category_id = $_GET['id'];

// Vérifier si l'ID de la catégorie est passé en paramètre
if (isset($_category_id) && !empty($_category_id)) {

    // Préparer la requête SQL pour supprimer la catégorie
    $statement = $pdo->prepare("DELETE FROM category WHERE id = :id");
    $statement->execute(["id" => $category_id]);

    // Rediriger vers la page de liste des catégories après la suppression
    header("Location: /categories/list_category.php");
    exit();
} else {
    // Si l'ID n'est pas valide, rediriger vers la page de liste des catégories
    header("Location: /categories/list_category.php");
    exit();
}
?>

<body style="background-color: #ffecb3;"></body>

<?php
include "../others/footer.php";
?>
