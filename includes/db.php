<?php

$localConfig = __DIR__ . '/db.local.php';

if (is_file($localConfig)) {
    require $localConfig;
} else {
    $host = '127.0.0.1';
    $db   = 'chez_delice';
    $user = 'root';
    $pass = '';
}
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    http_response_code(500);
    exit('Connexion à la base de données impossible. Vérifiez que MySQL est démarré et que la base "chez_delice" existe.');
}
