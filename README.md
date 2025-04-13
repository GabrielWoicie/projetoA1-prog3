# Aluno

- Gabriel Woiciechowski (416573)
- Campus: Chapecó 
- Curso: Sistemas de Informação

# Projeto A1 - Sistema de Login com Sessão e Cookies (PHP)

Este é um pequeno sistema de login em PHP desenvolvido como parte de um exercício de aprendizado (A1 - Prog 3). Ele não utiliza banco de dados, apenas simula autenticação com um array e faz uso de sessões, cookies e boas práticas de segurança.

---

## ⚙️ Requisitos

- PHP 7.4+ ou superior
- [XAMPP](https://www.apachefriends.org/pt_br/index.html)
- Navegador atualizado
- Visual Studio Code (opcional)

---

## 🚀 Como rodar o projeto localmente

1. **Clonar ou copiar os arquivos:**

- Copie a pasta inteira do projeto para dentro do diretório: C:\xampp\htdocs\

2. **Iniciar o XAMPP:**

- Abra o XAMPP Control Panel.
- Inicie o módulo **Apache**.

3. **Acessar no navegador:**

- http://localhost/projetoA1-prog3/index.php

---

## 📁 Estrutura de arquivos

/projetoA1-prog3/
    /classes/
        Usuario.php
        Sessao.php
        Autenticador.php
    /data/
        usuarios.json
    index.php              (Redireciona para login)
    cadastro.php           (Formulário de cadastro)
    processa_cadastro.php  (Processa cadastro)
    login.php              (Formulário de login)
    processa_login.php     (Processa login)
    dashboard.php          (Tela protegida)
    logout.php             (Destroi sessão e cookies)

---

## 🧠 Como funciona

### 1. Cadastro (`cadastro.php`)

- Formulário para nome, e-mail e senha.
- Dados são validados e sanitizados.
- Senha é armazenada com `password_hash`.
- Usuário é instanciado e registrado na simulação via classe `Autenticador`.

### 2. Login (`login.php` / `processa_login.php`)

- Usuário informa e-mail e senha.
- Se for válido, é criada uma **sessão** com os dados do usuário.
- Se a opção "Lembrar e-mail" for marcada, o e-mail é armazenado em um **cookie**.
- Sessão válida por 5 minutos.

### 3. Dashboard (`dashboard.php`)

- Acessível apenas com sessão válida.
- Exibe nome do usuário da sessão.
- Exibe e-mail da sessão ou do cookie (se disponível).
- Botão de logout.

### 4. Logout (`logout.php`)

- Destroi a sessão.
- Mantém o cookie do e-mail (se existir).

---

## 🔐 Segurança aplicada

- Sanitização de entradas com `filter_input()`.
- Prevenção de XSS com `htmlspecialchars()`.
- Senhas protegidas com `password_hash()` e `password_verify()`.
- Cookies com flag `HttpOnly`.

---

## ✍️ Autor

Projeto desenvolvido por Gabriel Woiciechowski.


