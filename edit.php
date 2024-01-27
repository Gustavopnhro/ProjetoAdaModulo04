<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $taskId = $_GET['id'];

    $result = $conn->query("SELECT * FROM tasks WHERE id = $taskId");
    $task = $result->fetch_assoc();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task_id'])) {
    $taskId = $_POST['task_id'];
    $taskName = $_POST['task_name'];
    $taskDescription = $_POST['task_description'];

    $sql = "UPDATE tasks SET task_name='$taskName', task_description='$taskDescription' WHERE id=$taskId";
    $conn->query($sql);

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
</head>
<body>
    <h2>Editar Tarefa</h2>
    <form method="post" action="">
        <input type="hidden" name="task_id" value="<?= $taskId; ?>">
        <label for="task_name">Nome da Tarefa:</label>
        <input type="text" name="task_name" value="<?= $task['task_name']; ?>" required>
        <br>
        <label for="task_description">Descrição:</label>
        <textarea name="task_description"><?= $task['task_description']; ?></textarea>
        <br>
        <input type="submit" value="Atualizar Tarefa">
    </form>
    <br>
    <a href="index.php">Voltar para a Lista de Tarefas</a>
</body>
</html>
