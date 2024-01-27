<?php
$servername = "mysql";
$username = "myuser";
$password = "password";
$dbname = "tasksdb";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Erro na conexão com o servidor MySQL: " . $conn->connect_error);
}

$sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $dbname";
if (!$conn->query($sqlCreateDatabase) === TRUE) {
    die("Erro ao criar o banco de dados: " . $conn->error);
}

$conn->close();

// Agora, conecte-se ao banco de dados recém-criado
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Criação da tabela
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task_name VARCHAR(255) NOT NULL,
    task_description TEXT,
    task_status INT DEFAULT 0
)";

if (!$conn->query($sqlCreateTable) === TRUE) {
    die("Erro ao criar a tabela: " . $conn->error);
}

?>
