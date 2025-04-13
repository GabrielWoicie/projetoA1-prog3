<?php
require_once 'classes/Sessao.php';
Sessao::iniciar();
$email_lembrado = $_COOKIE['email'] ?? '';
$erroLogin = isset($_GET['erro']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if ($erroLogin): ?>
    <div class="modal" id="modalErro">
        <div class="modal-content">
            <p><strong>Erro:</strong> Login inválido.</p>
            <button class="close-btn" onclick="document.getElementById('modalErro').style.display='none'">Fechar</button>
        </div>
    </div>
    <?php endif; ?>
    <div class="container">
        <h2>Login</h2>
        <form action="processa_login.php" method="post">
            <label>Email:</label><br>
            <input type="email" name="email" required value="<?php echo htmlspecialchars($email_lembrado); ?>"><br><br>

            <label>Senha:</label><br>
            <input type="password" name="senha" required><br><br>

            <label>
                <input type="checkbox" name="lembrar" <?php echo $email_lembrado ? 'checked' : ''; ?>>
                Lembrar e-mail
            </label><br><br>

            <input type="submit" value="Entrar">
        </form>

        <p>Não tem uma conta?</p>
        <a href="cadastro.php"><strong>Cadastre-se aqui</strong></a>
    </div>
</body>
</html>
