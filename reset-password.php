<?php
require 'includes/db.php';

$token = $_GET['token'] ?? '';

$stmt = $pdo->prepare(
  "SELECT * FROM password_resets WHERE token = ? AND expires_at > NOW()"
);
$stmt->execute([$token]);
$reset = $stmt->fetch() or die('Token inválido');

if ($_POST) {
  $pdo->prepare(
    "UPDATE usuarios SET senha = ? WHERE id = ?"
  )->execute([
    password_hash($_POST['senha'], PASSWORD_DEFAULT),
    $reset['user_id']
  ]);

  $pdo->prepare(
    "DELETE FROM password_resets WHERE user_id = ?"
  )->execute([$reset['user_id']]);

  header('Location: /login.php');
}
?>

<form method="post" class="auth">
  <h2>Nova senha</h2>
  <input type="password" name="senha" placeholder="Nova senha" required>
  <button>Salvar</button>
</form>
