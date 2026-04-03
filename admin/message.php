<?php
session_start();
require '../config/db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM messages WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$msg = $stmt->fetch();

if (!$msg) {
    header("Location: dashboard.php");
    exit();
}

// marquer comme lu
$sql = "UPDATE messages SET statut = 1 WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Message</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="admin-header">
    <a href="dashboard.php">← Retour</a>
    <a href="logout.php">Déconnexion</a>
</div>

<div class="container">
<div class="card">

<div class="card-title">Message</div>

<div style="padding:20px;">

<h3><?php echo $msg['nom']; ?></h3>

<p><strong>Email :</strong> <?php echo $msg['email']; ?></p>
<p><strong>Date :</strong> <?php echo $msg['date']; ?></p>

<hr>

<p><?php echo $msg['message']; ?></p>

<br>

<a class="btn btn-delete" href="delete.php?id=<?php echo $msg['id']; ?>">Supprimer</a>

</div>

</div>
</div>

</body>
</html>