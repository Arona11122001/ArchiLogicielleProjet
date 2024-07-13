<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($article['titre']) ? htmlspecialchars($article['titre']) : 'Titre non défini' ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <?php if (!empty($article)) : ?>
                            <h2 class="card-title"><?= htmlspecialchars($article['titre']); ?></h2>
                            <p><?= nl2br(htmlspecialchars($article['contenu'])); ?></p>
                            <p>Catégorie: <?= htmlspecialchars($article['categorie']); ?></p>
                        <?php else : ?>
                            <p>L'article n'existe pas ou n'est pas disponible.</p>
                        <?php endif; ?>
                        <a href="index.php?action=home" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Retour à l'accueil</a>
                    </div>
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
