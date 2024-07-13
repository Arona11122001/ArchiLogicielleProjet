<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Article</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Modifier Article</h2>
                        <form action="index.php?action=edit_article&id=<?= $article['id'] ?>" method="post">
                            <div class="form-group">
                                <label for="titre">Titre :</label>
                                <input type="text" id="titre" name="titre" class="form-control" value="<?= $article['titre'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="contenu">Contenu :</label>
                                <textarea id="contenu" name="contenu" class="form-control" rows="6" required><?= $article['contenu'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categorie">Catégorie :</label>
                                <select id="categorie" name="categorie" class="form-control">
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="<?= $category['id'] ?>" <?= ($category['id'] == $article['categorie']) ? 'selected' : '' ?>>
                                            <?= $category['libelle'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
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
