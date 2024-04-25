<?php
ob_start(); 
session_start();
include "header.php";
?>
<body class="page-list">
<div class="container mt-5 book-cart">
    <div class="row">
        <div class="col-12">
            <h2>Votre Sélection d'Emprunts</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Manga</th>
                        <th scope="col">Disponibilité</th>
                        <th scope="col">Durée</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                   <!-- Les mangas sélectionnés pour l'emprunt seront insérés ici par JavaScript --> 
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" onclick="confirmEmprunt()">Confirmer l'Emprunt</button>
            </div>
        </div>
    </div>
    
    
