<?php
require_once 'Usuario.php';

class Autenticador {
    private static $caminhoArquivo = __DIR__ . '/../data/usuarios.json';

    public static function registrar(Usuario $usuario) {
        $usuarios = self::carregarUsuarios();
        $usuarios[$usuario->getEmail()] = serialize($usuario);
        file_put_contents(self::$caminhoArquivo, json_encode($usuarios));
    }

    public static function logar($email, $senha) {
        $usuarios = self::carregarUsuarios();

        if (isset($usuarios[$email])) {
            $usuario = unserialize($usuarios[$email]);
            if ($usuario->autenticar($email, $senha)) {
                return $usuario;
            }
        }

        return null;
    }

    private static function carregarUsuarios() {
        if (!file_exists(self::$caminhoArquivo)) return [];
        $json = file_get_contents(self::$caminhoArquivo);
        return json_decode($json, true) ?? [];
    }
}
