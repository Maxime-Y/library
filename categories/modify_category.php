<?php
include "../others/header.php";

// Vérifier si l'ID est passé en paramètre
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    // Requête pour récupérer les informations de la catégorie à modifier
    $statement = $pdo->prepare("SELECT * FROM category WHERE id = :id");
    $statement->execute(['id' => $id]);
    $category = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$category) {
        // La catégorie n'existe pas
        echo "La catégorie avec l'ID $id n'existe pas dans la table category.";
        exit;
    }

    // Vérifie si le formulaire est soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $newName = $_POST['name'];

        // Vérifier si le nouveau nom existe déjà dans une autre catégorie
        $checkStatement = $pdo->prepare("SELECT id FROM category WHERE name = :newName AND id != :id");
        $checkStatement->execute(['newName' => $newName, 'id' => $id]);
        $existingCategory = $checkStatement->fetch(PDO::FETCH_ASSOC);

        if ($existingCategory) {
            // Le nouveau nom existe déjà dans une autre catégorie
            echo "Le nom de catégorie '$newName' existe déjà.";
            exit;
        }

        // Requête de mise à jour avec une requête préparée
        $updateStatement = $pdo->prepare("UPDATE category SET name = :name WHERE id = :id");
        $updateStatement->execute(['name' => $newName, 'id' => $id]);

        // Redirection après la mise à jour
        header("Location:/categoris/list_category.php");
        exit;
    }
} 
else {
    // L'ID n'est pas passé en paramètre
    echo "L'ID de la catégorie est manquant.";
    exit;
}
?>
<body class="page-list">
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-body">
            <h2 class="card-title text-center">Modifier la catégorie</h2>
            <hr>
            <form method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label"></label>
                    <input type="text" class="form-control text-center" id="name" name="name" value="<?= $category['name'] ?>">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Modifier">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include "../others/footer.php";
?>





