<?php
include "others/header.php";
?>

<body>

    <style>
        body {
            background-image: url('/pictures/image.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center 20px;
            height: 130vh;
        }

        .custom_h1 {
            font-size: 60px;
            color: white;
            text-shadow: 3px 3px black;
            animation: zoomIn 2s ease-out;
        }

        footer {
            text-align: center;
            bottom: 0;
            width: 100%;
            background-color: transparent;
            color: white;
            font-size: 1em;
        }

        @keyframes zoomIn {
            from {
                transform: scale(0);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Media query pour les petits écrans */
        @media screen and (max-width: 600px) {
            .custom_h1 {
                font-size: 30px;
                color: white;
                text-shadow: 3px 3px black;
                animation: zoomIn 2s ease-out;
                /* Ajout de l'animation */
            }

            body {
                background-image: url('/pictures/image.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                height: 130vh;                
            }
        }
    </style>

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6 text-center">
                <h1 class="custom_h1">Bienvenue sur ma mangathèque</h1>
            </div>
        </div>
    </div>

    <?php
    include "others/footer.php";
    ?>