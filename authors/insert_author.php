<?php
ob_start(); 
session_start();
include "../others/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST["name"];
  
    $statement = $pdo->prepare("INSERT INTO author (name) SELECT :name FROM DUAL WHERE NOT EXISTS (SELECT * FROM category WHERE name = :name)");
    $statement->execute(["name" => $name]);

    header("Location:/authors/list_author.php");
    exit();
}
?>

<body class="page-list">

<div class="container mt-5">
    <h2 class="text-center">Ajouter un auteur</h2>
    <form method="POST" action="">
        <div class="mb-3 d-flex justify-content-center">
            <div style="width: 50%;">
                <label for="name" class="form-label"></label>
                <input type="text" class="form-control text-center" id="name" name="name" required>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-secondary">Ajouter</button>
        </div>
    </form>
</div>

<?php
include "../others/footer.php";
?>