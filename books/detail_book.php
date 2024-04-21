<?php
include "../others/header.php";

//requête pour récupérer les livres
$id_book = $_GET['id'];


$book_statement = $pdo->prepare("SELECT name, publication_date, description, image_url FROM book WHERE id= :id ");
$book_statement->bindParam(":id", $id_book, PDO::PARAM_INT);
$book_statement->execute();

$book = $book_statement->fetch(PDO::FETCH_ASSOC);

if (empty($book)) {
    include "404.php";
    die();
}

//requête pour récupérer les auteurs
$author_statement = $pdo->prepare("SELECT author.name FROM book join author on author_id = author.id where book.id = :id ");
$author_statement->bindParam(":id", $id_book, PDO::PARAM_INT);
$author_statement->execute();

// récupère
$author = $author_statement->fetch(PDO::FETCH_ASSOC);

//requête pour récuperer la catégorie
$category_statement = $pdo->prepare("SELECT category.name FROM category JOIN book_category ON category.id = book_category.category_id JOIN book ON book_category.book_id = book.id  WHERE book.id = :id");
$category_statement->bindparam(":id", $id_book, PDO::PARAM_INT);
$category_statement->execute();

//recupère
$categories = $category_statement->fetchAll(PDO::FETCH_ASSOC);
?>

<body class="page-list2">

    <div class="container mt-5" style="width:70%">

        <h2 class="text-center">Informations du livre</h2>
        <?php if (!empty($book['image_url'])) : ?>
            <div class="d-flex justify-content-center mb-4">
                <img src="<?= $book['image_url'] ?>" alt="<?= $book['name'] ?>" style="max-width: 300px;">
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <h2 class="card-text text-center"><?= $book['name'] ?></h2>
                <p class="card-text text-center"><strong>Nom de l'auteur</strong>: <?= $author['name'] ?></p>
                <p class="card-text text-center"><strong>Publié en</strong>: <?= $book['publication_date'] ?></p>

                <p class="card-text text-center"><strong>Catégorie</strong>:
                    <?php
                    $categoriesName = [];
                    foreach ($categories as $category) {
                        $categoriesName[] = $category['name'];
                    }
                    echo implode(", ", $categoriesName);
                    ?>
                </p>

                <p class="card-text text-center"><strong>Description</strong>: <?= $book['description'] ?></p>
            </div>
        </div>
    </div>
    <a href="#" id="return-to-top" style="display: none; position: fixed; bottom: 20px; right: 20px; z-index: 1000; cursor: pointer;">
        <img src="/pictures/fleche.png" alt="Retour en haut" style="width: 50px; height: 50px;" />
    </a>
    <?php include "../others/footer.php"; ?>