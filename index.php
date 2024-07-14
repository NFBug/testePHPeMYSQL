<?php
    require("conecta.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  
  <form class="form" method="post" action="adiciona.php">
    <div class="field">

      <label for="nome">Seu Nome:</label>
      <input type="text" name="nome" id="nome" placeholder="Digite seu nome" >

      <label for="nascimento">Seu Nascimento:</label>
      <input type="date" id="nascimento" name="nascimento" placeholder="Digite seu nascimento" >
      
      <label for="renda">Sua renda:</label>
      <input type="text" id="renda" name="renda" placeholder="Digite sue renda" >
      
      <input type="submit" name="enviar" value="Enviar">

    </div>

    <div class="field">

      <input type="text" name="excluir" id="excluir" placeholder="Digite o ID a excluir" >
      <input type="submit" name="enviar_excluir" value="Excluir" formaction="deleta.php">

    </div>
  </form>
  
  <table>
    <tr>
      <th>Nome</th>
      <th>Renda</th>
      <th>Nascimento</th>
      <th>ID</th>
    </tr>

    <?php
      $sql = "SELECT * FROM usuarios";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {       
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>".$row["nome"]."</td>";
          echo "<td>".$row["renda"]."</td>";
          echo "<td>".$row["nascimento"]."</td>";
          echo "<td>".$row["id"]."</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='4'>0 resultados</td></tr>";
      }

      $conn->close();
    ?>
  </table>

</body>
</html>
