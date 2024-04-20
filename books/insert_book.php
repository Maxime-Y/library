<?php
include "../others/header.php";

// Récupérer les catégories disponibles depuis la base de données
$categories = $pdo->query("SELECT * FROM category ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les auteurs disponibles depuis la base de données
$authors = $pdo->query("SELECT * FROM author ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $name = $_POST['name'] ?? '';
    $year = $_POST['year'] ?? '';
    $description = $_POST['description'] ?? '';
    $author_id = $_POST['author'] ?? '';
    $categories_ids = $_POST['categories'] ?? [];
    $imageName = $_POST['image'] ?? '';

    // Construire le chemin complet de l'image
    $image = '/pictures/' . $imageName;

    try {
        // Insertion du livre dans la base de données
        $insertBookStatement = $pdo->prepare("INSERT INTO book (name, publication_date, description, image_url, author_id) VALUES (?, ?, ?, ?, ?)");
        $insertBookStatement->execute([$name, $year, $description, $image, $author_id]);
        $book_id = $pdo->lastInsertId(); // Récupérer l'ID du livre inséré

        // Insertion des relations livre-catégorie dans la table de liaison
        foreach ($categories_ids as $category_id) {
            $insertCategoryStatement = $pdo->prepare("INSERT INTO book_category (book_id, category_id) VALUES (?, ?)");
            $insertCategoryStatement->execute([$book_id, $category_id]);
        }

        // Redirection après l'insertion
        header("Location:/books/list_book.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de l'insertion du livre : " . $e->getMessage();
    }
}
?>

<body class="page-list">
    <div class="container mt-5" style="width: 30%;">
        <h2 class="mb-4">Ajouter un livre</h2>
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
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>
<?php 
include "../others/footer.php"; 
?>

