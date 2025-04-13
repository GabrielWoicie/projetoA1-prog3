<?php
require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';
require_once 'classes/Sessao.php';

Sessao::iniciar();

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lembrar = isset($_POST['lembrar']);

$usuario = Autenticador::logar($email, $senha);

if ($usuario) {
    Sessao::set('usuario', $usuario);

    if ($lembrar) {
        setcookie('email', $email, time() + 3600 * 24 * 7, "/", "", false, true);
    }

    header('Location: dashboard.php');
    exit();
} else {
   header('Location: login.php?erro=1');
    exit();
}
