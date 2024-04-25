<?php
ob_start(); 
session_start();
include "../others/header.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $statement = $pdo->prepare("SELECT * FROM category WHERE id = :id");
    $statement->execute(['id' => $id]);
    $category = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$category) {
      
        echo "La catégorie avec l'ID $id n'existe pas dans la table category.";
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $newName = $_POST['name'];

        $checkStatement = $pdo->prepare("SELECT id FROM category WHERE name = :newName AND id != :id");
        $checkStatement->execute(['newName' => $newName, 'id' => $id]);
        $existingCategory = $checkStatement->fetch(PDO::FETCH_ASSOC);

        if ($existingCategory) {
          
            echo "Le nom de catégorie '$newName' existe déjà.";
            exit;
        }

        $updateStatement = $pdo->prepare("UPDATE category SET name = :name WHERE id = :id");
        $updateStatement->execute(['name' => $newName, 'id' => $id]);
       
        header("Location:/categories/list_category.php");
        exit;
    }
} 
else {
    
    echo "L'ID de la catégorie est manquant.";
    exit;
}
?>
<body class="page-list">

<div class="container mt-5">
    <div class="mx-auto" style="max-width: 400px;">
        <div class="card-body">
            <h2 class="text-center">Modifier la catégorie</h2>
            <hr>
            <form method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label"></label>
                    <input type="text" class="form-control text-center" id="name" name="name" value="<?= $category['name'] ?>">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-secondary" value="Modifier">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include "../others/footer.php";
?>





