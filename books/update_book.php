<?php
include "../others/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $author_id = $_POST['author_id'];
    $publication_date = $_POST['publication_date'];
    $description = $_POST['description'];
    $categories = isset($_POST['categories']) ? $_POST['categories'] : [];

    // Gérer l'image téléchargée
    if ($_FILES['book_image']['name']) {
        $imagePath = "../pictures/" . $_FILES['book_image']['name'];
        move_uploaded_file($_FILES['book_image']['tmp_name'], $imagePath);
    } else {
        // Conserver l'image existante si aucune nouvelle n'est téléchargée
        $imagePath = $pdo->query("SELECT image_url FROM book WHERE id = $id")->fetchColumn();
    }

    // Mettre à jour les informations du livre
    $statement = $pdo->prepare("UPDATE book SET name = :name, author_id = :author_id, publication_date = :publication_date, description = :description, image_url = :image_url WHERE id = :id");
    $statement->execute(['name' => $name, 'author_id' => $author_id, 'publication_date' => $publication_date, 'description' => $description, 'image_url' => $imagePath, 'id' => $id]);

    // Supprimer et réinsérer les catégories associées
    $pdo->prepare("DELETE FROM book_category WHERE book_id = :id")->execute(['id' => $id]);
    foreach ($categories as $categoryId) {
        $pdo->prepare("INSERT INTO book_category (book_id, category_id) VALUES (:id, :category_id)")->execute(['id' => $id, 'category_id' => $categoryId]);
    }

    header("Location: /books/list_book.php");
    exit();
} else {
    echo "Aucune donnée n'a été soumise ou l'ID du livre est manquant.";
    exit();
}
?>




