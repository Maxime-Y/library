<?php
ob_start();

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include "header.php"; 

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$errors = [];

if (!empty($_POST)) {
    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
        $errors['username'] = "Votre pseudo n'est pas valide (alphanumérique)";
    }
    
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Votre email n'est pas valide";
    }

    if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
        $errors['password'] = "Vous devez rentrer un mot de passe valide";
    }
    $req = $pdo->prepare("SELECT name, password FROM users where id = :id");
    $req->execute($_POST['username'], $_POST['email']);

        if (isset($_POST['username']) && ($_POST['password'])){
        $errors['username'] = "Ce pseudo existe deja";
    }

    if (empty($errors)) {
        $req = $pdo->prepare("INSERT INTO users SET username = ?, password = ?, email = ?");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $req->execute([$_POST['username'], $password, $_POST['email']]);
        ob_end_clean(); 
        header('Location: ../index.php');
        exit;
    }     
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body class="page-list3">
    <div class="row h-100 justify-content-center align-items-center ">
        <div class="col-lg-4 col-md-6 col-sm-8 col-5 ">
            <h1 class="text-center h1-register">S'inscrire</h1><hr>
            <div class="list-group-item list-group-item-action d-flex align-items-center justify-content-center mb-2 mt-5">
                <form action="" method="POST" class="w-100 ">
                    <div class="form-group row">
                        <label class="register">Pseudo :</label>
                        <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
                        <?php if (isset($errors['username'])): ?>
                            <div style="color: red;"><?php echo $errors['username']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group row">
                        <label class="register">Email :</label>
                        <input type="text" name="email" class="form-control" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                        <?php if (isset($errors['email'])): ?>
                            <div style="color: red;"><?php echo $errors['email']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group row">
                        <label class="register">Mot de passe :</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group row">
                        <label class="register">Confirmez le mot de passe :</label>
                        <input type="password" name="password_confirm" class="form-control">
                        <?php if (isset($errors['password'])): ?>
                            <div style="color: red;"><?php echo $errors['password']; ?></div>
                        <?php endif; ?>
                    </div><br><br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-light">M'inscrire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>
<?php
ob_end_flush(); 
?>
