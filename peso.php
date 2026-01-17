<?php require 'includes/auth.php'; include 'includes/header.php'; ?>

<section class="card">
<form id="peso-form">
  <input type="date" name="data" required>
  <input name="peso" placeholder="Peso">
  <input name="cintura" placeholder="Cintura">
  <button>Salvar</button>
</form>
</section>

<script src="/assets/js/peso.js"></script>
<?php include 'includes/footer.php'; ?>
