<?php
include "../others/header.php";

// Vérifiez si un ID de livre est présent dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Requête pour récupérer les informations du livre à modifier
    $statement = $pdo->prepare("SELECT * FROM book WHERE id = :id");
    $statement->execute(['id' => $id]);
    $book = $statement->fetch(PDO::FETCH_ASSOC);

    // Requête pour récupérer toutes les catégories de la base de données
    $categoriesStatement = $pdo->query("SELECT * FROM category");
    $categories = $categoriesStatement->fetchAll(PDO::FETCH_ASSOC);

    // Requête pour récupérer les catégories associées à ce livre
    $bookCategoriesStatement = $pdo->prepare("SELECT category_id FROM book_category WHERE book_id = :book_id");
    $bookCategoriesStatement->execute(['book_id' => $id]);
    $bookCategories = $bookCategoriesStatement->fetchAll(PDO::FETCH_COLUMN);

    // Requête pour récupérer tous les auteurs de la base de données
    $authorsStatement = $pdo->query("SELECT * FROM author");
    $authors = $authorsStatement->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Redirection si l'ID du livre est manquant
    header("Location: /books/list_book.php");
    exit();
}
?>

<body class="page-list">
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-body">
                <h2 class="card-title text-center">Modifier le livre</h2>
                <hr>
                <form action="/books/update_book.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom du livre :</label>
                        <input type="text" class="form-control text-center" id="name" name="name" value="<?= $book['name'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="author_id" class="form-label">Auteur :</label>
                        <select class="form-control" id="author_id" name="author_id">
                            <?php foreach ($authors as $author): ?>
                                <option value="<?= $author['id'] ?>" <?= $author['id'] == $book['author_id'] ? 'selected' : '' ?>>
                                    <?= $author['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="publication_date" class="form-label">Année de publication :</label>
                        <input type="text" class="form-control text-center" id="publication_date" name="publication_date" value="<?= $book['publication_date'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="book_image" class="form-label">Image de couverture :</label>
                        <input type="file" class="form-control" id="book_image" name="book_image">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Catégories :</label>
                        <?php foreach ($categories as $category) : ?>
                            <div class='form-check'>
                                <input class='form-check-input' type='checkbox' id='category<?= $category['id'] ?>' name='categories[]' value='<?= $category['id'] ?>' <?= in_array($category['id'], $bookCategories) ? 'checked' : '' ?>>
                                <label class='form-check-label' for='category<?= $category['id'] ?>'><?= $category['name'] ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description :</label>
                        <textarea class="form-control text-center" id="description" name="description"><?= $book['description'] ?></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include "../others/footer.php"; ?>
