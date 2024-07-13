<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        .label-offset {
            margin-left: -290px; /* Ajustez cette valeur selon le décalage souhaité */
        }
    </style>
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-secondary text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-4 text-uppercase">Modification</h2>

                                <form method="post" action="index.php?action=edit_user&id=<?= $user['id'] ?>">
                                    <div data-mdb-input-init class="form-outline form-white mb-3">
                                        <label class="form-label label-offset" for="nom">Nom:</label>
                                        <input type="text" id="nom" name="nom" class="form-control form-control-lg" value="<?= isset($user['nom']) ? htmlspecialchars($user['nom']) : '' ?>" required />
                                    </div>
                                    <div data-mdb-input-init class="form-outline form-white mb-3">
                                        <label class="form-label label-offset" for="prenom">Prénom:</label>
                                        <input type="text" id="prenom" name="prenom" class="form-control form-control-lg" value="<?= isset($user['prenom']) ? htmlspecialchars($user['prenom']) : '' ?>" required />
                                    </div>
                                    <div data-mdb-input-init class="form-outline form-white mb-3">
                                        <label class="form-label label-offset" for="email">Email:</label>
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" value="<?= isset($user['email']) ? htmlspecialchars($user['email']) : '' ?>" required />
                                    </div>
                                    <div data-mdb-input-init class="form-outline form-white mb-3">
                                        <label class="form-label label-offset" for="password" style="margin-left: -6.5cm;">Mot de passe:</label>
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                    </div>
                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <label class="form-label label-offset" for="role" style="margin-left: -8cm;">Role:</label>
                                        <select id="role" name="role" class="form-control form-control-lg">
                                            <option value="visitor" <?= isset($user['role']) && $user['role'] === 'visitor' ? 'selected' : '' ?>>Visitor</option>
                                            <option value="editor" <?= isset($user['role']) && $user['role'] === 'editor' ? 'selected' : '' ?>>Editor</option>
                                            <option value="admin" <?= isset($user['role']) && $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Modifier</button>
                                    </div>
                                </form>

                            </div>

                            <div>
                                <a href="#!" class="text-white-50 fw-bold">Réalisé par Mor Talla & Arona Ndiaye</a>
                            </div>

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
