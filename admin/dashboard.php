<?php
session_start();
require '../config/db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// récupération des messages
$sql = "SELECT * FROM messages ORDER BY date DESC";
$stmt = $pdo->query($sql);
$messages = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="admin-header">
    <div>Admin - SOS Point Ordinateur</div>
    <a href="logout.php">Se déconnecter</a>
</div>

<div class="container">
<div class="card">

<div class="card-title">Messages reçus</div>

<?php if (count($messages) == 0) { ?>

<p style="padding:20px;">Aucun message pour le moment</p>

<?php } else { ?>

<table>

<tr>
    <th>Nom</th>
    <th>Email</th>
    <th>Message</th>
    <th>Date</th>
    <th>Statut</th>
    <th>Action</th>
</tr>

<?php foreach ($messages as $msg) { ?>

<tr>

<td><?php echo $msg['nom']; ?></td>
<td><?php echo $msg['email']; ?></td>

<td><?php echo substr($msg['message'], 0, 40) . "..."; ?></td>

<td><?php echo $msg['date']; ?></td>

<td>
<?php if ($msg['statut'] == 0) { ?>
    <span class="badge badge-red">Non lu</span>
<?php } else { ?>
    <span class="badge badge-green">Lu</span>
<?php } ?>
</td>

<td>
<a class="btn btn-view" href="message.php?id=<?php echo $msg['id']; ?>">Voir</a>
<a class="btn btn-delete" href="delete.php?id=<?php echo $msg['id']; ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
</td>

</tr>

<?php } ?>

</table>

<?php } ?>

</div>
</div>

</body>
</html>