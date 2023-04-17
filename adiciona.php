<?php 
require("conecta.php");

$nome = $_POST['nome'];
$nascimento = $_POST['data'];
$renda = $_POST['renda'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO aluno (nome,nascimento,renda) VALUES ('$nome', '$nascimento', '$renda')"; 


if ($conn->query($sql) == TRUE) {
    header("location: Cadastro.php");
}else{
    echo "Error";
}


$conn->close();

?>