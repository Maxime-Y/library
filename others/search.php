<?php
include "./header.php";  
?>

<body class="page-list2">
    <style>
        .page-list2 {
            position: relative;            
            background-image: radial-gradient(circle, grey 35%, #d9d6d0 100%);
        }

        .page-list2::before  {
            content: '';
            position: fixed;
            top: 0;
            width: 30%;
            height: 100%;
            background-image: url('/pictures/noein.webp');
            background-size: auto 100%;
            left: 0;
            background-position: left;
            opacity: 1;
            z-index: -1;
            mask-image: linear-gradient(to left, transparent 0%, black 100%);
        }

        .page-list2::after {
            content: '';
            position: fixed;
            top: 0;
            width: 30%;
            height: 100%;
            background-image: url('/pictures/noein.webp');
            background-size: auto 100%;
            right: 0;
            background-position: right;
            opacity: 1;
            z-index: -1;
            mask-image: linear-gradient(to right, transparent 0%, black 100%);
        }
        
    </style>

    <div class="container mt-5" style="width:60%">
        <div class="row justify-content-center">
            <div class="col-md-8 book-name">
                <?php
                
                $search = $_GET['search'] ?? '';

                $query = "SELECT book.name AS book_name, author.name AS author_name, book.publication_date, book.image_url, book.description,
                          GROUP_CONCAT(DISTINCT category.name SEPARATOR ', ') AS categories
                          FROM book
                          JOIN author ON book.author_id = author.id
                          LEFT JOIN book_category ON book.id = book_category.book_id
                          LEFT JOIN category ON book_category.category_id = category.id
                          WHERE book.name LIKE :searchStart OR book.name = :exactSearch
                          GROUP BY book.id";

                $stmt = $pdo->prepare($query);
                $searchStart = $search . '%';
                $stmt->bindParam(':searchStart', $searchStart);
                $stmt->bindParam(':exactSearch', $search);
                $stmt->execute();
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (empty($results)) {
                    echo '<div class="bg-white shadow-sm p-3 mb-0 rounded text-center">Aucuns résultats</div>';
                } 
                
                else {
                    foreach ($results as $result) {
                        echo '<div class="bg-white shadow-sm p-3 mb-0 rounded text-center">';
                        if (!empty($result['image_url'])) {
                            echo '<img src="' . htmlspecialchars($result['image_url']) . '" alt="Image du livre" class="img-fluid mx-auto d-block mb-3" style="max-height: 400px;">';
                        }
                        echo '<h4 class="fs-1">' . htmlspecialchars($result['book_name']) . '</h4>';
                        echo '<p><strong>Auteur</strong> : ' . htmlspecialchars($result['author_name']) . '</p>';
                        echo '<p><strong>Date de publication</strong> : ' . htmlspecialchars($result['publication_date']) . '</p>';
                        echo '<p><strong>Description</strong> : ' . htmlspecialchars($result['description']) . '</p>';                     
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <a href="#" id="return-to-top" style="display: none; position: fixed; bottom: 20px; right: 20px; z-index: 1000; cursor: pointer;">
        <img src="/pictures/fleche.png" alt="Retour en haut" style="width: 50px; height: 50px;" />
    </a>
</body>
