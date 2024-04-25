<?php
ob_start(); 
session_start();
require_once 'connec.php';
$pdo = new \PDO(DSN, USER, PASS);
require "functions.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/others/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <a class="navbar-brand fs-1 mb-2" href="/index.php/"><img src="../pictures/mangas.png" style="width:200px; height:80px"></img></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fs-3 me-3" aria-current="page" href="/categories/list_category.php"><i class="fa-solid fa-list me-2"></i>Catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-3 me-3" href="/books/list_book.php"><i class="fa-solid fa-book me-2"></i>Livres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-3 me-3" href="/authors/list_author.php"><i class="fa-solid fa-pen-nib me-2"></i>Auteurs</a>
                </li>
            </ul>

            <div class="ms-auto">
                <ul class="navbar-nav">
                    <li>
                        <form method="GET" action="/others/search.php" class="input-group search-form search">
                            <input type="search" name="search" placeholder="rechercher" class="form-control search-input" required>
                            <button type="submit" class="btn btn-secondary search-button">Rechercher</button>
                        </form>
                    </li>                  
                    <li class="nav-item mt-2 ms-5">
                        <a class="nav-link fs-5" href="/others/cart.php"><i class="fa-solid fa-cart-shopping"></i> Panier</a>
                    </li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item mt-2 ms-5">
                            <a href="/others/logout.php" class="btn btn-secondary">Déconnexion</a>
                        </li>
                    <?php else:?>
                        <li class="nav-item dropdown mt-2 ms-4">
                            <a class="nav-link dropdown-toggle fs-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Connexion
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end mt-5" aria-labelledby="navbarDropdown">
                                <form class="px-4 py-3" method="POST" action="/others/login.php">
                                    <div class="mb-3">
                                        <label for="login" class="form-label">Login</label>
                                        <input type="text" class="form-control" id="login" name="login">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mot de passe</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <button type="submit" class="btn btn-secondary">Connexion</button>
                                </form>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/others/register.php">S'inscrire</a>
                                <a class="dropdown-item" href="/others/lost_password.php">Mot de passe oublié ?</a>
                            </ul>
                        </li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </div>
</nav>
