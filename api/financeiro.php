<?php
require '../includes/auth.php';
require '../includes/db.php';

$data = json_decode(file_get_contents('php://input'), true);
$pdo->prepare(
  "INSERT INTO financeiro_registros (user_id,data,tipo,categoria,valor)
   VALUES (?,?,?,?,?)"
)->execute([
  $usuario_id,
  $data['data'],
  $data['tipo'],
  $data['categoria'],
  $data['valor']
]);
