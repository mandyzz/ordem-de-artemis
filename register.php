<?php
require 'includes/db.php';

if ($_POST) {
  $pdo->prepare(
    "INSERT INTO usuarios (nome,email,senha) VALUES (?,?,?)"
  )->execute([
    $_POST['nome'],
    $_POST['email'],
    password_hash($_POST['senha'], PASSWORD_DEFAULT)
  ]);

  header('Location: /login.php');
}
?>

<form method="post" class="auth">
  <h2>Criar conta</h2>
  <input name="nome" placeholder="Nome" required>
  <input name="email" placeholder="E-mail" required>
  <input type="password" name="senha" placeholder="Senha" required>
  <button>Cadastrar</button>
</form>
