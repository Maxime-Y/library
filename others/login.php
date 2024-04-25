<?php
ob_start();
include "header.php";
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        $pdo = new PDO(DSN, USER, PASS);

        
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        
        if ($user && password_verify($password, $user['password'])) {
            
            $_SESSION['user_id'] = $user['id'];
            header('Location:/others/connected.php'); 
            exit;
        } 
        
        else {
            $error = "Identifiants incorrects.";
            header('Location:/index.php');
        }
    } 
    
    else {
        $error = "Tous les champs sont requis.";
        header('Location:/index.php');
    }
}


?>
<?php if (!empty($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
<?php endif; ?>
