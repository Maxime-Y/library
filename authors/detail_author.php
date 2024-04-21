<?php
include "../others/header.php";
const BR = "<br/>";

// Récupérer l'ID de l'auteur depuis l'URL
$id_author = $_GET['id'];

// Requête pour récupérer les informations de l'auteur
$author_statement = $pdo->prepare("SELECT * FROM author WHERE id = :id");
$author_statement->bindParam(":id", $id_author, PDO::PARAM_INT);
$author_statement->execute();

// récupère
$author = $author_statement->fetch(PDO::FETCH_ASSOC);

if (!$author) {
    include "../others/404.php";
    die();
}

// Requête pour récupérer les livres de l'auteur
$books_statement = $pdo->prepare("SELECT * FROM book WHERE author_id = :author_id");
$books_statement->bindParam(":author_id", $id_author, PDO::PARAM_INT);
$books_statement->execute();

// récupère
$books = $books_statement->fetchAll(PDO::FETCH_ASSOC);
?>

<body class="page-list2">

    <div class="container mt-5">
        <!-- Informations de l'auteur -->
        <h2 class="text-center">Informations de l'auteur</h2>
        <p class="text-center fs-4"><strong>Nom</strong> : <?= $author['name'] ?></p>

        <!-- Les livres de l'auteur -->
        <h2 class="text-center mt-4">Les livres de <?= $author['name'] ?></h2><br>
        <div class="row justify-content-center">
            <?php foreach ($books as $book) : ?>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 text-center">
                        <?php if (!empty($book['image_url'])) : ?>
                            <div class="d-flex justify-content-center mb-4">
                                <img src="<?= $book['image_url'] ?>" alt="<?= $book['name'] ?>" style="max-width: 300px;">
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title fs-2"><?= $book['name'] ?></h5>
                            <p class="card-text"><strong>Date de publication</strong> : <?= $book['publication_date'] ?></p>
                            <p class="card-text"><strong>Description</strong> : <?= BR . $book['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <a href="#" id="return-to-top" style="display: none; position: fixed; bottom: 20px; right: 20px; z-index: 1000; cursor: pointer;">
        <img src="/pictures/fleche.png" alt="Retour en haut" style="width: 50px; height: 50px;" />
    </a>

    <?php include "../others/footer.php"; ?>