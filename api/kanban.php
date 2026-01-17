<?php
require '../includes/auth.php';
require '../includes/db.php';

$data = json_decode(file_get_contents('php://input'), true);
$pdo->prepare(
  "INSERT INTO kanban_tasks (user_id,titulo,status)
   VALUES (?,?,?)"
)->execute([
  $usuario_id,
  $data['titulo'],
  'todo'
]);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->prepare(
      "SELECT * FROM kanban_tasks WHERE user_id = ? ORDER BY id DESC"
    );
    $stmt->execute([$usuario_id]);
    echo json_encode($stmt->fetchAll());
    exit;
  }
  