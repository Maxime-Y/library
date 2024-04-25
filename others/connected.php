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
    <div class="content">
        <h1 class="h1_connected">Bienvenue à toi, <?php echo htmlspecialchars($username); ?></h1>
    </div>
</body>

</html>