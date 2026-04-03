<?php
$success = false;

if (isset($_GET['success'])) {
    $success = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="nav">

    <div class="logo">
        <a href="index.php">
            <img src="assets/images/logo.png">
        </a>
    </div>

    <div class="menu">
        <a href="index.php">Accueil</a>
        <a href="services.php">Services</a>
        <a href="contact.php">Contact</a>
        <a href="apropos.php">À propos</a>
    </div>

</div>

<div class="section">

<div class="card">

<div class="card-title">CONTACT</div>

<div class="contact-container">

    <!-- FORMULAIRE -->
    <div class="box contact-left">

        <h3>Envoyer un message</h3>

        <?php if ($success) { ?>
            <p style="color:green;">Message envoyé</p>
        <?php } ?>

        <form action="traitement_contact.php" method="POST">

            <input type="text" name="nom" placeholder="Nom" required>

            <input type="email" name="email" placeholder="Email" required>

            <textarea name="message" placeholder="Message" required></textarea>

            <button type="submit">Envoyer</button>

        </form>

    </div>

    <!-- INFOS -->
    <div class="box contact-right">

        <h3>Contact rapide</h3>

        <p><strong>Téléphone :</strong><br>01 34 17 10 88</p>

        <p><strong>Email :</strong><br>fabiensosordinateur@yahoo.fr</p>

        <p><strong>Adresse :</strong><br>15 bis Rue de l'Arrivée, 95880 Enghien-les-Bains</p>

    </div>

</div>

</div>

</div>

<div class="footer">
    © SOS Point Ordinateur
</div>

</body>
</html>