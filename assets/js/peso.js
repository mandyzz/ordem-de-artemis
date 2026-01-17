const pesoForm = document.getElementById('peso-form');

if (pesoForm) {
  pesoForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const dados = Object.fromEntries(new FormData(pesoForm));

    await fetch('/api/peso.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(dados)
    });

    pesoForm.reset();
    alert('Registro salvo com sucesso');
  });
}
