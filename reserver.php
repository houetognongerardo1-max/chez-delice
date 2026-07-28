<?php
session_start();
require __DIR__ . '/includes/db.php';
require __DIR__ . '/includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$data = [
    'nom'        => trim($_POST['nom'] ?? ''),
    'email'      => trim($_POST['email'] ?? ''),
    'telephone'  => trim($_POST['telephone'] ?? ''),
    'date'       => trim($_POST['date'] ?? ''),
    'heure'      => trim($_POST['heure'] ?? ''),
    'personnes'  => trim($_POST['personnes'] ?? ''),
    'message'    => trim($_POST['message'] ?? ''),
];

$errors = [];

if (!csrfCheck($_POST['csrf_token'] ?? null)) {
    $errors['global'] = "Session expirée, merci de renvoyer le formulaire.";
}

if ($data['nom'] === '') {
    $errors['nom'] = "Le nom complet est requis.";
}

if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "L'adresse email n'est pas valide.";
}

if ($data['telephone'] === '') {
    $errors['telephone'] = "Le numéro de téléphone est requis.";
}

if (!isValidDate($data['date']) || $data['date'] < date('Y-m-d')) {
    $errors['date'] = "Merci de choisir une date valide, à partir d'aujourd'hui.";
}

if (!isValidTime($data['heure'])) {
    $errors['heure'] = "Merci de choisir un horaire valide.";
}

$personnes = (int) $data['personnes'];
if ($personnes < 1 || $personnes > 20) {
    $errors['personnes'] = "Le nombre de personnes doit être compris entre 1 et 20.";
}

if (!empty($errors)) {
    setOldInput($data, $errors);
    setFlash('error', "Merci de corriger les champs indiqués avant d'envoyer votre demande.");
    header('Location: index.php#reservation');
    exit;
}

$stmt = $pdo->prepare(
    'INSERT INTO reservations (nom, email, telephone, date_reservation, heure_reservation, nombre_personnes, message)
     VALUES (:nom, :email, :telephone, :date, :heure, :personnes, :message)'
);

$stmt->execute([
    'nom'       => $data['nom'],
    'email'     => $data['email'],
    'telephone' => $data['telephone'],
    'date'      => $data['date'],
    'heure'     => $data['heure'],
    'personnes' => $personnes,
    'message'   => $data['message'] !== '' ? $data['message'] : null,
]);

setFlash('success', "Merci {$data['nom']} ! Votre demande de réservation pour le " .
    (new DateTime($data['date']))->format('d/m/Y') . " à {$data['heure']} a bien été enregistrée. " .
    "Nous vous confirmerons votre table par téléphone ou par email.");

header('Location: index.php#reservation');
exit;
