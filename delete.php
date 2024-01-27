<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $taskId = $_GET['id'];

    $sql = "DELETE FROM tasks WHERE id=$taskId";
    $conn->query($sql);

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>
