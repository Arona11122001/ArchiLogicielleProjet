<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une catégorie</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Modifier une catégorie</h2>
                        <form action="index.php?action=edit_category&id=<?= $categorie['id']; ?>" method="post">
                            <div class="form-group">
                                <label for="libelle">Libellé de la catégorie :</label>
                                <input type="text" id="libelle" name="libelle" class="form-control" value="<?= htmlspecialchars($categorie['libelle']); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                        <a href="index.php?action=manage_categories" class="d-block mt-3">Retour à la gestion des catégories</a>
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
