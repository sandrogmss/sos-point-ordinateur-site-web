<?php
$host = "localhost";
$dbname = "sos_point_ordinateur_site";
$user = "root";
$pass = "";

try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

    // afficher les erreurs SQL (utile en développement)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    echo "Erreur connexion : " . $e->getMessage();
    exit();
}
?>