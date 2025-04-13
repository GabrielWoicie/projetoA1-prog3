<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Cadastro</h2>
        <form action="processa_cadastro.php" method="post">
            <label>Nome:</label><br>
            <input type="text" name="nome" required><br><br>

            <label>Email:</label><br>
            <input type="email" name="email" required><br><br>

            <label>Senha:</label><br>
            <input type="password" name="senha" required><br><br>

            <input type="submit" value="Cadastrar">
            <button><a href="login.php">Ir para Login</a></button>
        </form>
    </div>
</body>
</html>
