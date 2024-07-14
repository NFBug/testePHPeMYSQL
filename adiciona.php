<?php
require("conecta.php");

$nome = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$renda = $_POST['renda'];

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if (!preg_match('/^[0-9]+([\.|,][0-9]+)?$/', $renda)) {
    echo "Erro: A renda deve conter apenas valores numéricos válidos.";
    exit;
}

$data_formatada = date("Y-m-d", strtotime($nascimento));
$renda_formatada = str_replace(',', '.', $renda);
$renda_formatada = floatval($renda_formatada);

$sql = $conn->prepare("INSERT INTO usuarios (nome, renda, nascimento) VALUES (?, ?, ?)");
$sql->bind_param("sds", $nome, $renda_formatada, $data_formatada);

if ($sql->execute() === TRUE) {
    header("location: index.php");
} else {
    echo "Erro: " . $conn->error;
}

$sql->close();
$conn->close();
?>
