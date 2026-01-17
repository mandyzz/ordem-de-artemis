const financeiroForm = document.getElementById('financeiro-form');

if (financeiroForm) {
  financeiroForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const dados = Object.fromEntries(new FormData(financeiroForm));

    await fetch('/api/financeiro.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(dados)
    });

    financeiroForm.reset();
    alert('Movimentação registrada');
  });
}
