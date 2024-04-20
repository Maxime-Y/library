<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/others/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/others/style.css">
    <title>Document</title>
    <style>
        .navbar .input-group {
            margin-top: 2%;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand fs-1 mb-2" href="/index.php/">Mangathèque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fs-3" aria-current="page" href="/categories/list_category.php">Catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-3" href="/books/list_book.php">Livres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-3" href="/authors/list_author.php">Auteurs</a>
                    </li>

                </ul>

                <div class="ms-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Connexion
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <form class="px-4 py-3" method="POST" action="login.php">
                                    <div class="mb-3">
                                        <label for="login" class="form-label">Login</label>
                                        <input type="text" class="form-control" id="login" name="login">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mot de passe</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Connexion</button>
                                </form>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/password.php">Mot de passe oublié ?</a>
                            </ul>                        
                        </li>
                        <li>
                            <form method="GET" action="/others/search.php" class="input-group">
                                <input type="search" name="search" placeholder="rechercher" required>
                                <input type="submit" name="envoyer">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <?php
    require_once 'connec.php';
    $pdo = new \PDO(DSN, USER, PASS);      
    ?>