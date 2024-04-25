<?php
include "others/header.php";
?>

<body>

    <style>

        body {
            background-image: url('/pictures/image.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center 80px;
            height: 100vh;
        }

        .custom_h1 {
            background-color:rgba(217, 220, 224, 0.5);
            background-size:60px;            
            font-size: 90px;
            color: white;            
            animation: zoomInAndRotate 3s ease-out;
            -webkit-text-stroke: 2px black;            
        }

        footer {
            text-align: center;
            bottom: 0;
            width: 100%;
            background-color: transparent;
            color: white;
            font-size: 1em;
        }

        @keyframes zoomInAndRotate {
    from {
        transform: scale(0) rotate(0deg);
        opacity: 0;
    }
    to {
        transform: scale(1) rotate(3600deg);
        opacity: 1;
    }
}

        /* Media query pour les petits écrans */
        @media screen and (max-width: 600px) {

            .custom_h1 {
                font-size: 50px;
                color: white;
                text-shadow: 3px 3px black;
                animation: zoomInAndRotate 3s ease-out;
                
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