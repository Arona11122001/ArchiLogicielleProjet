<!-- vue/include/manage_categories.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les catégories</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card rounded-3">
                        <div class="card-body p-4">

                            <h4 class="text-center my-3 pb-3">Gérer les catégories</h4>

                            <a href="index.php?action=add_category" class="btn btn-warning mb-4">Ajouter une catégorie</a>

                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Libellé</th>
                                        <th scope="col" style="padding-left: 2cm;">Actions</th> <!-- Décalage de 2cm -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $category): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($category['libelle']); ?></td>
                                        <td>
                                            <a href="index.php?action=edit_category&id=<?php echo $category['id']; ?>"
                                                class="btn btn-success">Modifier</a>
                                            <a href="index.php?action=delete_category&id=<?php echo $category['id']; ?>"
                                                class="btn btn-danger ms-1">Supprimer</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <a href="index.php?action=index.php" class="btn btn-link"> < Retour à l'accueil</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
