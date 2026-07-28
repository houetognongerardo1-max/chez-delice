<?php
session_start();
require __DIR__ . '/../includes/db.php';
require __DIR__ . '/../includes/functions.php';

if (!empty($_SESSION['admin_id'])) {
    header('Location: reservations.php');
    exit;
}

$error = null;
$token = csrfToken();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfCheck($_POST['csrf_token'] ?? null)) {
        $error = "Session expirée, merci de réessayer.";
    } else {
        $username = trim($_POST['username'] ?? '');
        $password = (string) ($_POST['password'] ?? '');

        $stmt = $pdo->prepare('SELECT id, password_hash FROM admins WHERE username = :username');
        $stmt->execute(['username' => $username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password_hash'])) {
            session_regenerate_id(true);
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $username;
            header('Location: reservations.php');
            exit;
        }

        $error = "Identifiants incorrects.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Connexion admin — Chez Délice</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Jost:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/admin.css">
</head>
<body class="admin-body">

<main class="admin-login">
  <form class="admin-card" method="post" novalidate>
    <p class="section-tag">Espace admin</p>
    <h1>Connexion</h1>
    <input type="hidden" name="csrf_token" value="<?= e($token) ?>">

    <?php if ($error): ?>
      <p class="form-alert form-alert--error"><?= e($error) ?></p>
    <?php endif; ?>

    <div class="form-row">
      <label for="username">Identifiant</label>
      <input type="text" id="username" name="username" required autofocus>
    </div>
    <div class="form-row">
      <label for="password">Mot de passe</label>
      <input type="password" id="password" name="password" required>
    </div>

    <button type="submit" class="btn btn--primary btn--block">Se connecter</button>
    <a href="../index.php" class="admin-back-link">← Retour au site</a>
  </form>
</main>

</body>
</html>
