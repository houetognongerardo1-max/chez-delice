<?php
session_start();
require __DIR__ . '/../includes/db.php';
require __DIR__ . '/../includes/functions.php';

if (empty($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
    if (csrfCheck($_POST['csrf_token'] ?? null)) {
        $stmt = $pdo->prepare('DELETE FROM reservations WHERE id = :id');
        $stmt->execute(['id' => (int) $_POST['id']]);
        setFlash('success', 'Réservation supprimée.');
    }
    header('Location: reservations.php');
    exit;
}

$flash = getFlash();
$token = csrfToken();
$reservations = $pdo->query(
    'SELECT * FROM reservations ORDER BY date_reservation DESC, heure_reservation DESC LIMIT 200'
)->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Réservations — Espace admin Chez Délice</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Jost:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/admin.css">
</head>
<body class="admin-body">

<header class="admin-header">
  <div class="container admin-header__inner">
    <a href="../index.php" class="logo">Chez <span>Délice</span></a>
    <div class="admin-header__user">
      Connecté en tant que <strong><?= e($_SESSION['admin_username']) ?></strong>
      <a href="logout.php" class="btn btn--ghost btn--sm">Déconnexion</a>
    </div>
  </div>
</header>

<main class="container admin-main">
  <p class="section-tag">Espace admin</p>
  <h1 class="section-title">Réservations reçues</h1>

  <?php if ($flash): ?>
    <p class="form-alert form-alert--<?= e($flash['type']) ?>"><?= e($flash['message']) ?></p>
  <?php endif; ?>

  <?php if (empty($reservations)): ?>
    <p class="admin-empty">Aucune réservation pour le moment.</p>
  <?php else: ?>
    <div class="admin-table-wrap">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Client</th>
            <th>Contact</th>
            <th>Date &amp; heure</th>
            <th>Personnes</th>
            <th>Message</th>
            <th>Reçue le</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($reservations as $r): ?>
            <tr>
              <td><?= e($r['nom']) ?></td>
              <td><?= e($r['email']) ?><br><?= e($r['telephone']) ?></td>
              <td><?= e((new DateTime($r['date_reservation']))->format('d/m/Y')) ?> à <?= e(substr($r['heure_reservation'], 0, 5)) ?></td>
              <td><?= e((string) $r['nombre_personnes']) ?></td>
              <td><?= $r['message'] !== null ? e($r['message']) : '—' ?></td>
              <td><?= e((new DateTime($r['created_at']))->format('d/m/Y H:i')) ?></td>
              <td>
                <form method="post" onsubmit="return confirm('Supprimer cette réservation ?');">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="id" value="<?= e((string) $r['id']) ?>">
                  <input type="hidden" name="csrf_token" value="<?= e($token) ?>">
                  <button type="submit" class="admin-delete-btn" aria-label="Supprimer">✕</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</main>

</body>
</html>
