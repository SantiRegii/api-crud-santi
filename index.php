<?php
require 'db.php';

// Obtener todas las tareas
$stmt = $db->query("SELECT * FROM tasks ORDER BY id DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas Limpio</title>
    <style>
        :root {
            --primary: #4f46e5;
            --bg: #f3f4f6;
            --text: #111827;
        }

        body {
            font-family: system-ui, sans-serif;
            background: var(--bg);
            color: var(--text);
            padding: 2rem;
            display: flex;
            justify-content: center;
        }

        .card {
            background: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary);
            text-align: center;
        }

        form {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        input {
            flex: 1;
            padding: 0.5rem;
            border: 1px solid #d1d5db;
            border-radius: 0.25rem;
        }

        button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .completed {
            text-decoration: line-through;
            color: #9ca3af;
        }

        .delete {
            color: #ef4444;
            text-decoration: none;
            font-size: 0.875rem;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>🛠️ Mi CRUD Limpio</h1>
        <form action="actions.php?action=create" method="POST">
            <input type="text" name="title" placeholder="Nueva tarea..." required>
            <button type="submit">Añadir</button>
        </form>
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li>
                    <span class="<?= $task['completed'] ? 'completed' : '' ?>">
                        <?= htmlspecialchars($task['title']) ?>
                    </span>
                    <a href="actions.php?action=delete&id=<?= $task['id'] ?>" class="delete">Eliminar</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>