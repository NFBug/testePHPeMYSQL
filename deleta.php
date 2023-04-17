<?php
 require("conecta.php");

 $nome = $_POST['nome'];
 $nascimento = $_POST['data'];
 $renda = $_POST['renda'];
 $excluir = $_POST['excluir'];

 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 $sql = "DELETE FROM aluno WHERE id=(select MAX(id) from aluno);";

 if ($conn->query($sql) == TRUE) {
    header("location: Cadastro.php");
}else{
    echo "Error";
}

$conn->close();

?>
