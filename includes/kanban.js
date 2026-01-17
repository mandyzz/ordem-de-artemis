const input = document.getElementById('task-title');
const board = document.getElementById('kanban');

async function addTask() {
  if (!input.value.trim()) return;

  await fetch('/api/kanban.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ titulo: input.value })
  });

  input.value = '';
  loadTasks();
}

async function loadTasks() {
  const res = await fetch('/api/kanban.php');
  const tasks = await res.json();

  board.innerHTML = '';

  tasks.forEach(task => {
    const el = document.createElement('div');
    el.className = 'card';
    el.innerText = task.titulo;
    board.appendChild(el);
  });
}

loadTasks();
