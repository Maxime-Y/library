<?php
ob_start(); 
include "../others/header.php";

$id = $_GET['id'];

$statement = $pdo->prepare("SELECT name FROM category WHERE id = :id");
$statement->bindParam(":id", $id, PDO::PARAM_INT);
$statement->execute();
$category = $statement->fetch(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("SELECT book.name,image_url, book.id FROM category 
                            JOIN book_category ON book_category.category_id = category.id
                            JOIN book ON book_category.book_id = book.id  
                            WHERE book_category.category_id = :id
                            ORDER BY name ASC");
$statement->bindParam(":id", $id, PDO::PARAM_INT);
$statement->execute();

$books = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<body class="page-list">

    <div class="container mt-5 book-name" style="width:60%">
        <h2 class="mb-4 text-center">Les livres de la catégorie <?= $category['name'] ?></h2>
        <div class="row">
            <?php foreach ($books as $book) : ?>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card book-case">
                            <div class="d-flex justify-content-between align-items-center ">
                                <a class="card-title no-underline fs-4 ms-3 text-shadow" href="/books/detail_book.php?id=<?= $book['id'] ?>">
                                    <?= $book['name'] ?>
                                </a>
                                <img class="book-case" src="<?= $book['image_url'] ?>" alt="<?= $book['name'] ?>" style="max-width: 60px; max-height: 100px; margin-right: 20px; margin-top:5px; margin-bottom:5px;">
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