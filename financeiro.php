<?php require 'includes/auth.php'; include 'includes/header.php'; ?>

<section class="card">
<form id="financeiro-form">
  <input type="date" name="data">
  <select name="tipo">
    <option value="entrada">Entrada</option>
    <option value="saida">Saída</option>
  </select>
  <input name="categoria" placeholder="Categoria">
  <input name="valor" placeholder="Valor">
  <button>Salvar</button>
</form>
</section>

<script src="/assets/js/financeiro.js"></script>
<?php include 'includes/footer.php'; ?>
