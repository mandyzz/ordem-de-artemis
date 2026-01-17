<?php
session_start();
require 'includes/db.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
  $stmt->execute([$_POST['email']]);
  $user = $stmt->fetch();

  if ($user && password_verify($_POST['senha'], $user['senha'])) {
    $_SESSION['usuario_id'] = $user['id'];
    $_SESSION['usuario_nome'] = $user['nome'];
    header('Location: /index.php');
    exit;
  }

  $erro = 'E-mail ou senha inválidos';
}
?>

<form method="post" class="auth">
  <h2>Entrar</h2>
  <input name="email" placeholder="E-mail" required>
  <input type="password" name="senha" placeholder="Senha" required>
  <button>Entrar</button>
  <a href="/forgot-password.php">Esqueci minha senha</a>
  <?php if ($erro): ?><p class="erro"><?= $erro ?></p><?php endif; ?>
</form>
