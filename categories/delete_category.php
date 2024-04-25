<?php
ob_start(); 
include "../others/header.php";

$category_id = $_GET['id'];

if (isset($_category_id) && !empty($_category_id)) {

    $statement = $pdo->prepare("DELETE FROM category WHERE id = :id");
    $statement->execute(["id" => $category_id]);

    header("Location: /categories/list_category.php");
    exit();
} 

else {   

    header("Location: /categories/list_category.php");
    exit();
}
?>

<body style="background-color: #ffecb3;"></body>

<?php
include "../others/footer.php";
?>
