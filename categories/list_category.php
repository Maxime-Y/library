<?php
include "../others/header.php";

// Requête pour récupérer les catégories
$statement = $pdo->query("SELECT * FROM category ORDER BY name ASC");

// Récupérer les catégories
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<body class="page-list">

<div class="container mt-5" style="width:60%">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="m-0">Liste des catégories</h2>
        <a class="btn btn-success" href="/categories/insert_category.php">Ajouter catégorie</a>
    </div>

    <hr>

    <div class="list-group mt-4">
        <?php foreach ($categories as $category): ?>
            <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center mb-2">
                <a href="/categories/detail_category.php?id=<?= $category['id'] ?>" class="text-decoration-none">
                    <span class='text-dark fs-4'><?= ucfirst($category['name'])?></span>
                </a>
                <div>
                    <a href="/categories/modify_category.php?id=<?= $category['id'] ?>" class="btn btn-outline-primary me-2">Modifier</a>
                    <a href="/categories/delete_category.php?id=<?= $category['id'] ?>" class="btn btn-outline-danger">Supprimer</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
include "../others/footer.php";
?>



