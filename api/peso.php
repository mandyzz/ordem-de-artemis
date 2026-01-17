<?php
require '../includes/auth.php';
require '../includes/db.php';

$data = json_decode(file_get_contents('php://input'), true);
$pdo->prepare(
  "INSERT INTO peso_registros (user_id,data,peso,cintura)
   VALUES (?,?,?,?)"
)->execute([
  $usuario_id,
  $data['data'],
  $data['peso'],
  $data['cintura']
]);
