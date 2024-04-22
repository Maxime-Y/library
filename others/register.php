<?php

include "./header.php";
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

if (!empty($_POST)) {

    $errors = [];

    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
        $errors['username'] = "Votre pseudo n'est pas valide (alphanumérique)";
    }
    debug($errors);
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Votre email n'est pas valide";
    }

    if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
        $errors['password'] = "Vous devez rentrer un mot de passe valide";
    }

    if (empty('$errors')) {
        $req = $pdo->prepare("INSERT INTO users SET username = ?, password = ?, email = ?");
    }
}

?>

<body class="page-list3">


    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6 col-sm-8 col-5">
            <h1 class="text-center mt-5">S'inscrire</h1>
            <div class="list-group-item list-group-item-action d-flex align-items-center justify-content-center mb-2 mt-5">
                <form action="" method="POST" class="w-100">
                    <div class="form-group row">
                        <label class="register">Pseudo :</label>
                        <input type="text" name="username" class="form-control" />
                    </div>
                    <div class="form-group row">
                        <label class="register">Email :</label>
                        <input type="text" name="email" class="form-control" />
                    </div>
                    <div class="form-group row">
                        <label class="register">Mot de passe :</label>
                        <input type="password" name="password" class="form-control" />
                    </div>
                    <div class="form-group row">
                        <label class="register">Confirmez le mot de passe :</label>
                        <input type="password" name="password_confirm" class="form-control" />
                    </div><br><br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-light">M'inscrire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



<?php
include "../others/footer.php";
?>