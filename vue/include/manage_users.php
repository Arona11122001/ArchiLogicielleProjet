<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Utilisateurs</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
        .btn-group-manage {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }
        /* Styles for handling token overflow */
        .token-list {
            max-width: 300px; /* Adjust max-width as needed */
            word-break: break-all; /* Break long tokens into multiple lines */
        }
        .truncated-text {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .token-actions {
            white-space: nowrap; /* Ensure actions stay on the same line */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card bg-light">
            <div class="card-body">
                <h1 class="card-title text-center">Gérer les utilisateurs</h1>

                <!-- Bouton pour ajouter un utilisateur -->
                <div class="btn-group-manage">
                    <?php if (Auth::isAdmin()) : ?>
                        <button class="btn btn-custom-orange mx-2" onclick="window.location.href='index.php?action=add_user'">Ajouter un utilisateur</button>
                    <?php endif; ?>
                </div>

                <!-- Tableau des utilisateurs -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Email</th>
                                <th scope="col">Rôle</th>
                                <th scope="col">Jeton</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($utilisateurs as $user): ?>
                                <tr>
                                    <td><?= htmlspecialchars($user['email']) ?></td>
                                    <td><?= htmlspecialchars($user['role']) ?></td>
                                    <td class="token-list">
                                        <div class="token-actions mb-2">
                                            <form action="index.php?action=add_token&id=<?= $user['id'] ?>" method="POST">
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <?php if (!empty($user['tokens'])): ?>
                                            <ul>
                                                <?php foreach ($user['tokens'] as $token): ?>
                                                    <li class="truncated-text"><?= htmlspecialchars(substr($token['token'], 0, 5)) ?>...</li>
                                                    <li class="token-actions">
                                                        <a href="index.php?action=delete_token&user_id=<?= $user['id'] ?>&token=<?= $token['token'] ?>" class="btn btn-danger btn-sm">Supprimer ce jeton</a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php else: ?>
                                            Aucun jeton
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (Auth::isAdmin()) : ?>
                                            <a href="index.php?action=edit_user&id=<?= $user['id'] ?>" class="btn btn-primary btn-sm">Modifier</a>
                                            <a href="index.php?action=delete_user&id=<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</a>
                                        <?php endif; ?>
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

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
