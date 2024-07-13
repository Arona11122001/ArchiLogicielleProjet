<?php
require_once 'modele/dao/CategorieDao.php';
require_once 'modele/dao/ArticleDao.php';
require_once 'Auth.php'; 

$categorieDao = new CategorieDao();
$articleDao = new ArticleDao(); 

$categories = $categorieDao->getAllCategories();
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Récupération du nombre total d'articles 
$totalArticles = $articleDao->getTotalArticlesCount();
$totalPages = ceil($totalArticles / 5);

// Récupération des articles en fonction de la page actuelle
$articlesPerPage = 5;

// Vérification si une catégorie est spécifiée dans l'URL
if (isset($_GET['category'])) {
    $categoryId = $_GET['category'];
    $articles = $articleDao->getArticlesByCategory($categoryId);
} else {
    $articles = $articleDao->getArticlesByPage($page, $articlesPerPage);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background */
            font-family: 'Arial', sans-serif; /* Custom font */
        }
        .container {
            padding-top: 50px;
        }
        .card {
            border-radius: 1rem;
        }
        .btn-custom-orange {
            background-color: #ffc107;
            color: white;
        }
        .btn-custom-orange:hover {
            background-color: #e0a800;
        }
        .btn-custom-red {
            background-color: #dc3545;
            color: white;
        }
        .btn-custom-red:hover {
            background-color: #c82333;
        }
        .btn-custom-green {
            background-color: #28a745;
            color: white;
        }
        .btn-custom-green:hover {
            background-color: #218838;
        }
        .btn-group-category {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        .btn-group-manage {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }
        .btn-category {
            margin: 2px;
        }
         .logout-btn {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        border-radius: 0.25rem;
        background-color: #dc3545;
        color: white;
        border: none;
        transition: background-color 0.3s, transform 0.3s;
    }
    .btn-custom-green {
      background-color: #28a745;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
    }

    .btn-custom-green i {
      vertical-align: middle;
    }
    .logout-btn:hover {
        background-color: #c82333;
        transform: scale(1.05);
    }

    .logout-btn i {
        margin-right: 0.5rem;
    }
    .btn-action {
        width: 40px; /* Define a fixed width */
        height: 40px; /* Define a fixed height */
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.25rem; /* Keep the border-radius consistent */
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="card bg-light">
        <div class="d-flex justify-content-end">
        <button class="btn btn-danger logout-btn" onclick="window.location.href='index.php?action=logout'">
    <i class="bi bi-box-arrow-right"></i> 
</button>

</div>
            <div class="card-body">
                <h1 class="card-title text-center">Liste des articles</h1>
                

                <!-- Barre de navigation des catégories -->
                <div class="d-flex justify-content-between mb-4">
                    <div class="btn-group-category">
                        <button class="btn btn-primary btn-category" onclick="window.location.href='index.php?action=home'">Tous</button>
                        <?php foreach ($categories as $category) : ?>
                            <button class="btn btn-primary btn-category" onclick="window.location.href='index.php?action=filter&category=<?= $category['id'] ?>'"><?= $category['libelle'] ?></button>
                        <?php endforeach; ?>
                    </div>
                    <div class="btn-group-manage">
                        <?php if (Auth::isEditor() || Auth::isAdmin()) : ?>
                            <button class="btn btn-warning mx-2" onclick="window.location.href='index.php?action=manage_categories'">Gérer les Catégories</button>
                        <?php endif; ?>
                        <?php if (Auth::isAdmin()) : ?>
                            <button class="btn btn-custom-orange mx-2" onclick="window.location.href='index.php?action=manage_users'">Gérer les Utilisateurs</button>
                        <?php endif; ?>
                    </div>
                </div>

               <!-- Articles filtrés par catégorie ou tous les articles -->
<?php if (!empty($articles)) : ?>
    <?php foreach ($articles as $article) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><a href="index.php?action=detail&id=<?= $article['id'] ?>"><?= $article['titre'] ?></a></h5>
                <p class="card-text"><?= substr($article['contenu'], 0, 100) ?>...</p>
                <p class="card-text"><small class="text-muted">Catégorie: <?= $article['categorie'] ?></small></p>

                <?php if (Auth::isEditor() || Auth::isAdmin()) :  ?>
                    <a href="index.php?action=edit_article&id=<?= $article['id'] ?>" class="btn btn-custom-green btn-action"><i class="fas fa-pen"></i></a>
                    <a href="index.php?action=delete_article&id=<?= $article['id'] ?>" class="btn btn-custom-red btn-action"><i class="fas fa-trash-alt"></i></a>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p class="text-center">Aucun article trouvé.</p>
<?php endif; ?>


                <!-- Bouton pour ajouter un article dans la catégorie courante -->
                <?php if (Auth::isAdmin() && isset($_GET['category'])) : ?>
                    <button class="btn btn-primary mt-3" onclick="window.location.href='index.php?action=add_article&category=<?= $_GET['category'] ?>'">Ajouter un article</button>
                <?php endif; ?>

                <!-- Pagination -->
                <div class="d-flex justify-content-between mt-4">
                    <?php if ($page > 1) : ?>
                        <button class="btn btn-secondary" onclick="window.location.href='index.php?action=home&page=<?= $page - 1 ?>'">Précédent</button>
                    <?php endif; ?>
                    <?php if ($page < $totalPages) : ?>
                        <button class="btn btn-secondary" onclick="window.location.href='index.php?action=home&page=<?= $page + 1 ?>'">Suivant</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
