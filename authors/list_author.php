<?php
include "../others/header.php";

// Requête pour récupérer les auteurs
$statement = $pdo->query("SELECT * FROM author ORDER BY name ASC");

// Récupérer les auteurs
$authors = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<body class="page-list">

<div class="container mt-5" style="width:60%">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="m-0">Liste des auteurs</h2>
        <a class="btn btn-success" href="/authors/insert_author.php">Ajouter auteur</a>
    </div>

    <hr>

    <div class="list-group mt-4">
        <?php foreach ($authors as $author): ?>
            <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center mb-2">
                <a href="/authors/detail_author.php?id=<?= $author['id'] ?>" class="text-decoration-none">
                    <span class='text-dark fs-4'><?= $author['name'] ?></span>
                </a>
                <div>
                    <a href="/authors/modify_author.php?id=<?= $author['id'] ?>" class="btn btn-outline-primary me-2">Modifier</a>
                    <a href="/authors/delete_author.php?id=<?= $author['id'] ?>" class="btn btn-outline-danger">Supprimer</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
include "../others/footer.php";
?>


