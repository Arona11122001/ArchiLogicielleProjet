<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Ajouter un article</h2>
                        <form action="index.php?action=add_article" method="post">
                            <div class="form-group">
                                <label for="titre">Titre :</label>
                                <input type="text" id="titre" name="titre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="contenu">Contenu :</label>
                                <textarea id="contenu" name="contenu" class="form-control" rows="6" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categorie">Catégorie :</label>
                                <select id="categorie" name="categorie" class="form-control">
                                    <?php foreach ($categories as $categorie) : ?>
                                        <option value="<?= $categorie['id'] ?>" <?= (isset($categoryId) && $categoryId == $categorie['id']) ? 'selected' : '' ?>>
                                            <?= $categorie['libelle'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
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
