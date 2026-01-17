<?php require 'includes/auth.php'; include 'includes/header.php'; ?>

<section class="card">
<input id="task-title" placeholder="Nova tarefa">
<button onclick="addTask()">Adicionar</button>
<div id="kanban"></div>
</section>

<script src="/assets/js/kanban.js"></script>
<?php include 'includes/footer.php'; ?>
