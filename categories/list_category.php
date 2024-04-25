<?php
ob_start(); 
include "../others/header.php";

$statement = $pdo->query("SELECT * FROM category ORDER BY name ASC");

$categories = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<body class="page-list">

    <div class="container mt-5 book-name" style="width:50%">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="m-0">Liste des catégories</h2>
            <a class="btn btn-secondary book-case" href="/categories/insert_category.php">Ajouter catégorie</a>
        </div>

        <hr>

        <div class="list-group mt-4 ">
            <?php foreach ($categories as $category) : ?>
                <div class="list-group-item list-group-item-action d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-2 book-case">
                    <a href="/categories/detail_category.php?id=<?= $category['id'] ?>" class="text-decoration-none mb-2 mb-md-0">
                        <span class='text-dark fs-4 text-shadow'><?= ucfirst($category['name']) ?></span>
                    </a>
                    <div class="d-flex flex-row flex-md-row justify-content-between">
                        <a href="/categories/modify_category.php?id=<?= $category['id'] ?>" class="btn btn-outline-secondary me-2">Modifier</a>
                        <a href="/categories/delete_category.php?id=<?= $category['id'] ?>" class="btn btn-outline-danger">Supprimer</a>
                    </div>
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