<?php
ob_start(); 
include "../others/header.php";

$categories = $pdo->query("SELECT * FROM category ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);

$authors = $pdo->query("SELECT * FROM author ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $name = $_POST['name'] ?? '';
    $year = $_POST['year'] ?? '';
    $description = $_POST['description'] ?? '';
    $author_id = $_POST['author'] ?? '';
    $categories_ids = $_POST['categories'] ?? [];
    $imageName = $_POST['image'] ?? '';

    
    $image = '/pictures/' . $imageName;

    try {
       
        $insertBookStatement = $pdo->prepare("INSERT INTO book (name, publication_date, description, image_url, author_id) VALUES (?, ?, ?, ?, ?)");
        $insertBookStatement->execute([$name, $year, $description, $image, $author_id]);
        $book_id = $pdo->lastInsertId();

       
        foreach ($categories_ids as $category_id) {
            $insertCategoryStatement = $pdo->prepare("INSERT INTO book_category (book_id, category_id) VALUES (?, ?)");
            $insertCategoryStatement->execute([$book_id, $category_id]);
        }

       
        header("Location:/books/list_book.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de l'insertion du livre : " . $e->getMessage();
    }
}
?>

<body class="page-list">
    <div class="container mt-5" style="width: 30%;">
        <h2 class="mb-4 text-center">Ajouter un livre</h2><hr>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nom du livre :</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Année de publication :</label>
                <input type="text" class="form-control" id="year" name="year" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Auteur :</label>
                <select class="form-select" id="author" name="author" required>
                    <option value="">Sélectionner un auteur</option>
                    <?php foreach ($authors as $author) : ?>
                        <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="categories" class="form-label">Catégories :</label><br>
                <?php foreach ($categories as $category) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="category<?= $category['id'] ?>" name="categories[]" value="<?= $category['id'] ?>">
                        <label class="form-check-label" for="category<?= $category['id'] ?>">
                            <?= $category['name'] ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image :</label>
                <select class="form-select" id="image" name="image" required>
                    <option value="">Sélectionner une image</option>
                    <?php
                    $imageDir = $_SERVER['DOCUMENT_ROOT'] . '/pictures/';
                    $images = glob($imageDir . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);
                    sort($images);
                    foreach ($images as $imagePath) {
                        $imageName = basename($imagePath);
                        echo "<option value='$imageName'>$imageName</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-secondary">Ajouter</button>
            </div>
        </form>
    </div>
    <a href="#" id="return-to-top" style="display: none; position: fixed; bottom: 20px; right: 20px; z-index: 1000; cursor: pointer;">
        <img src="/pictures/fleche.png" alt="Retour en haut" style="width: 50px; height: 50px;" />
    </a>
<?php 
include "../others/footer.php"; 
?>

