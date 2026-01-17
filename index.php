<?php
require 'includes/auth.php';
$title = 'Dashboard';
include 'includes/header.php';
?>

<section class="card">
  <h2>Bem-vinda, <?= $_SESSION['usuario_nome']; ?></h2>
  <p>Escolha por onde deseja começar hoje.</p>
</section>

<section class="quick-actions">

  <a href="/peso.php" class="quick-card">
    <h3>Controle de Peso</h3>
    <p>Acompanhe sua evolução corporal</p>
  </a>

  <a href="/financeiro.php" class="quick-card">
    <h3>Controle Financeiro</h3>
    <p>Entradas, saídas e saldo</p>
  </a>

  <a href="/kanban.php" class="quick-card">
    <h3>Kanban</h3>
    <p>Organize suas tarefas</p>
  </a>

</section>

<?php include 'includes/footer.php'; ?>
