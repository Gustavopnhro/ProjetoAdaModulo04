<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskName = $_POST['task_name'];
    $taskDescription = $_POST['task_description'];

    $sql = "INSERT INTO tasks (task_name, task_description) VALUES ('$taskName', '$taskDescription')";
    $conn->query($sql);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Tarefa</title>
</head>
<body>
    <h2>Adicionar Tarefa</h2>
    <form method="post" action="">
        <label for="task_name">Nome da Tarefa:</label>
        <input type="text" name="task_name" required>
        <br>
        <label for="task_description">Descrição:</label>
        <textarea name="task_description"></textarea>
        <br>
        <input type="submit" value="Adicionar Tarefa">
    </form>
    <br>
    <a href="index.php">Voltar para a Lista de Tarefas</a>
</body>
</html>
