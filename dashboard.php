<?php
// Inicia a sessão e define o tempo de expiração do cookie (5min)
ini_set('session.gc_maxlifetime', 300);
session_set_cookie_params(300);

require_once 'classes/Usuario.php';  
require_once 'classes/Sessao.php';
Sessao::iniciar();

// Verifica se o usuário já está logado
$usuario = Sessao::get('usuario');
if (!$usuario) {
    header('Location: login.php');
    exit();
}

// Verifica se o cookie de e-mail está definido
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
            <!-- Se o cookie de e-mail estiver definido, exibe o e-mail -->
            <p>Você está logado com o e-mail: <strong><?= htmlspecialchars($email); ?></strong></p>
        <?php endif; ?>
        <br>
        <button class="green-button"><a href="cadastro.php">Cadastrar novo usuário</a></button>
        <button><a href="logout.php">Logout</a></button>
    </div>
</body>
</html>
