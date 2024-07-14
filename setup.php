<?php
$servername = "localhost";
$username = "root";
$password = //senha do seu banco de dados (your database password)
$dbname = "";//nome do seu banco de dados (your database name)
$tablename = "";//nome da sua tabela (your table name)

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Banco de dados criado ou já existe.<br>";
} else {
    echo "Erro ao criar banco de dados: " . $conn->error;
}

$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS $tablename (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    renda DECIMAL(10,2) NOT NULL,
    nascimento DATE NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabela criada ou já existe.<br>";
} else {
    echo "Erro ao criar tabela: " . $conn->error;
}

// Fecha a conexão
$conn->close();
