<?php
include "../others/header.php";
const BR = "<br/>";
$id = $_GET['id'];

// Récupérer le nom de la catégorie
$statement = $pdo->prepare("SELECT name FROM category WHERE id = :id");
$statement->bindParam(":id", $id, PDO::PARAM_INT);
$statement->execute();

//récupère
$category = $statement->fetch(PDO::FETCH_ASSOC);


//requête 
$statement = $pdo->prepare("SELECT book.name,image_url, book.id FROM category 
                            JOIN book_category ON book_category.category_id = category.id
                            JOIN book ON book_category.book_id = book.id  
                            WHERE book_category.category_id = :id
                            ORDER BY name ASC");
$statement->bindParam(":id", $id, PDO::PARAM_INT);
$statement->execute();

// récupère
$books = $statement->fetchAll(PDO::FETCH_ASSOC);

if (empty($books)) {
    include "../others.404.php";
    die();
}
?>

<body class="page-list">

    <div class="container mt-5" style="width:60%">
        <h2 class="mb-4">Les livres de la catégorie <?= $category['name'] ?></h2>
        <div class="row">
            <?php foreach ($books as $book) : ?>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card">
                            <div class="d-flex justify-content-between align-items-center ">
                                <a class="card-title no-underline fs-4 ms-3" href="/books/detail_book.php?id=<?= $book['id'] ?>">
                                    <?= $book['name'] ?>
                                </a>
                                <img src="<?= $book['image_url'] ?>" alt="<?= $book['name'] ?>" style="max-width: 100px; max-height: 100px; margin-right: 20px;">
                            </div>
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