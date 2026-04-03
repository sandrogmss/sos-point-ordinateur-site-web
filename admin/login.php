<?php
session_start();
require '../config/db.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE login = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$login]);

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admin'] = $login;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Identifiants incorrects";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="login-box">

<h2>Connexion</h2>

<?php if ($error != "") { ?>
<p class="error"><?php echo $error; ?></p>
<?php } ?>

<form method="POST">

<input type="text" name="login" placeholder="Login" required>

<input type="password" id="password" name="password" placeholder="Mot de passe" required>

<button type="button" onclick="togglePassword()">Voir</button>

<br><br>

<button type="submit">Se connecter</button>

</form>

</div>

<script>
function togglePassword() {
    var input = document.getElementById("password");

    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}
</script>

</body>
</html>