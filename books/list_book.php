<?php
ob_start(); 
include "../others/header.php";

$statement = $pdo->query("SELECT * FROM book ORDER BY name ASC");
$books = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<body class="page-list">

<div class="container mt-5 book-name" style="width:50%">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="m-0">Liste des livres</h2>
        <a class="btn btn-secondary book-case" href="/books/insert_book.php">Ajouter livre</a>
    </div>

    <hr>

    <div class="list-group mt-4 ">
        <?php foreach ($books as $book): ?>
            <div class="list-group-item list-group-item-action d-md-flex align-items-center justify-content-between mb-2 book-case">
                <img src="<?= $book['image_url'] ?>" alt="<?= $book['name'] ?>" class="book-case" style="max-width: 60px; max-height: 100px; margin-right: 20px;">
                <div>
                    <a href="/books/detail_book.php?id=<?= $book['id'] ?>" class="text-decoration-none">
                        <span class='text-dark fs-2 text-shadow'><?= $book['name'] ?></span>
                    </a>
                </div>
                <div class="d-none d-md-block">
                    <a href="/books/modify_book.php?id=<?= $book['id'] ?>" class="btn btn-outline-secondary me-2">Modifier</a>
                    <a href="/books/delete_book.php?id=<?= $book['id'] ?>" class="btn btn-outline-danger">Supprimer</a>
                </div>
            </div>
            <!--mode mobile -->
            <div class="d-md-none text-center">
                <a href="/books/modify_book.php?id=<?= $book['id'] ?>" class="btn btn-outline-secondary me-2">Modifier</a>
                <a href="/books/delete_book.php?id=<?= $book['id'] ?>" class="btn btn-outline-danger">Supprimer</a><br><br>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<a href="#" id="return-to-top" style="display: none; position: fixed; bottom: 20px; right: 20px; z-index: 1000; cursor: pointer;">
    <img src="/pictures/fleche.png" alt="Retour en haut" style="width: 50px; height: 50px;" />
</a>
<?php
include "../others/footer.php";
?>
