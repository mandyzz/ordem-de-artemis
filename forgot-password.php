<?php
require 'includes/db.php';
require 'includes/mail.php';

$msg = '';

if ($_POST) {
  $stmt = $pdo->prepare("SELECT id,nome FROM usuarios WHERE email = ?");
  $stmt->execute([$_POST['email']]);
  $user = $stmt->fetch();

  if ($user) {
    $token = bin2hex(random_bytes(32));
    $pdo->prepare(
      "INSERT INTO password_resets (user_id,token,expires_at)
       VALUES (?,?,DATE_ADD(NOW(), INTERVAL 1 HOUR))"
    )->execute([$user['id'], $token]);

    $link = "https://seudominio.com/reset-password.php?token=$token";
    enviarEmail($_POST['email'], 'Recuperar senha',
      "<p>Olá, {$user['nome']}</p><a href='$link'>Redefinir senha</a>");
  }

  $msg = 'Se o e-mail existir, você receberá instruções.';
}
?>

<form method="post" class="auth">
  <h2>Recuperar senha</h2>
  <input name="email" placeholder="E-mail" required>
  <button>Enviar</button>
  <p><?= $msg ?></p>
</form>
