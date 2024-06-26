<?php
ob_start(); 
include "../others/header.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $statement = $pdo->prepare("SELECT * FROM book WHERE id = :id");
    $statement->execute(['id' => $id]);
    $book = $statement->fetch(PDO::FETCH_ASSOC);

    $categoriesStatement = $pdo->query("SELECT * FROM category");
    $categories = $categoriesStatement->fetchAll(PDO::FETCH_ASSOC);

    $bookCategoriesStatement = $pdo->prepare("SELECT category_id FROM book_category WHERE book_id = :book_id");
    $bookCategoriesStatement->execute(['book_id' => $id]);
    $bookCategories = $bookCategoriesStatement->fetchAll(PDO::FETCH_COLUMN);

    $authorsStatement = $pdo->query("SELECT * FROM author");
    $authors = $authorsStatement->fetchAll(PDO::FETCH_ASSOC);
} 

else {    
    header("Location: /books/list_book.php");
    exit();
}
?>

<body class="page-list">
    <div class="container mt-5">
        <div class="mx-auto" style="max-width: 400px;">
            <div>
                <h2 class="text-center">Modifier le livre</h2>
                <hr>
                <form action="/books/update_book.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom du livre :</label>
                        <input type="text" class="form-control text-center" id="name" name="name" value="<?= $book['name'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="author_id" class="form-label">Auteur :</label>
                        <select class="form-control" id="author_id" name="author_id">
                            <?php foreach ($authors as $author) : ?>
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
                        <button type="submit" class="btn btn-secondary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a href="#" id="return-to-top" style="display: none; position: fixed; bottom: 20px; right: 20px; z-index: 1000; cursor: pointer;">
        <img src="/pictures/fleche.png" alt="Retour en haut" style="width: 50px; height: 50px;" />
    </a>
<?php include "../others/footer.php"; ?>