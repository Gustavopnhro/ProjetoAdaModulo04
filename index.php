<?php
include 'db.php';

$result = $conn->query("SELECT * FROM tasks");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Tarefas</title>
</head>
<body>
    <h2>Lista de Tarefas</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <li><?= $row['task_name']; ?> - <a href="edit.php?id=<?= $row['id']; ?>">Editar</a> | <a href="delete.php?id=<?= $row['id']; ?>">Excluir</a></li>
        <?php endwhile; ?>
    </ul>
    <a href="add.php">Adicionar Tarefa</a>
</body>
</html>
