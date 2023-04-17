<?php
    require("conecta.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>cadastro</title>
    <link rel="stylesheet" href="CssDoPhp.css">
</head>
<body>
    <form class="form" method="post" action="adiciona.php">
        <div class="field">
            <label for="nome">Seu Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome" >
<br>
            <label for="nascimento">Seu Nascimento:</label>
            <input type="date" id="data" name="data" placeholder="Digite seu nascimento" >
<br>
            <label for="renda">Sua renda:</label>
            <input type="number" id="renda" name="renda" placeholder="Digite sue renda" >
          </div>
<br>
            <input type="submit" name="enviar" value="enviar">
    </form>

    <form class="form" method ="post" action="del.php">
            <label for="excluir">excluir:</label>
            <input type="text" id="excluir" name="excluir" placeholder="Digite o nome" >
            <input type="submit" name="enviar" value="excluir">
  </form>

  <form class="form" method ="post" action="deleta.php">
            <br>
            <input type="submit" name="enviar" value="excluir último">
  </form>


  <fieldset>
    <table>
      <form class='form' method ='post' action='DelDireto.php'>
        <?php
          $sql = "SELECT * FROM aluno";
          $result = $conn->query($sql);
        

          if ($result->num_rows > 0) {       
            while($row = $result->fetch_assoc()) {
              $id=$row["id"];
              echo "<li id='$id' name='$id'>";
              echo "nome: ".$row["nome"]." renda: $".$row["renda"]." nascimento: ".$row["nascimento"]." ID: ".$id;
              echo "</li>";
          }
        
          } else {
            echo "0 results";
          }

          $conn->close();
        ?>
      </form>
    </table>
      </fieldset>
</body>
</html>
