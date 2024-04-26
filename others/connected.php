<?php
ob_start();
include "header.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: ./index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT username FROM users WHERE id = :id");
$stmt->execute(['id' => $_SESSION['user_id']]);
$user = $stmt->fetch();

$username = $user ? $user['username'] : 'Utilisateur inconnu';
?>


<body class="connected">
    <video autoplay muted loop class="bg-video">
        <source src="/pictures/bleach.mp4" type="video/mp4">
    </video>
    <div class="content text-center">
        <h1 class="h1_connected mb-4">Bienvenue à toi, <?php echo htmlspecialchars($username); ?></h1>
        <div class="d-flex justify-content-center">
            <div class="cube-wrapper mx-2">
                <a href="/books/list_book.php" class="cube-link d-flex justify-content-center align-items-center fs-3">Livres</a>
            </div>
            <div class="cube-wrapper mx-2">
                <a href="/categories/list_category.php" class="cube-link d-flex justify-content-center align-items-center fs-3">Catégories</a>
            </div>
            <div class="cube-wrapper mx-2">
                <a href="/authors/list_author.php" class="cube-link d-flex justify-content-center align-items-center fs-3">Auteurs</a>
            </div>
        </div>

        <div class="marquee">
        <p class="scrolling-text">Retrouvez les dernières nouveautées à ajouter à votre panier et en exclusivitée mondiale la sortie du premier tome d' "ancular un héro pas comme les autres"</p>
    </div>
    </div>