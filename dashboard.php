<?php
require_once 'classes/Usuario.php';  
require_once 'classes/Sessao.php';
Sessao::iniciar();

$usuario = Sessao::get('usuario');
if (!$usuario) {
    header('Location: login.php');
    exit();
}

$nome = Sessao::get('usuario') ? Sessao::get('usuario')->getNome() : null;
$email = Sessao::get('usuario') ? Sessao::get('usuario')->getEmail() : null;
$email_cookie = $_COOKIE['email'] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Bem-vindo, <?php echo $nome; ?>!</h2>
        <?php if ($email_cookie): ?>
            <p>Você está logado com o e-mail: <strong><?= htmlspecialchars($email); ?></strong></p>
        <?php endif; ?>
        <br>
        <button class="green-button"><a href="cadastro.php">Cadastrar novo usuário</a></button>
        <button><a href="logout.php">Logout</a></button>
    </div>
</body>
</html>
