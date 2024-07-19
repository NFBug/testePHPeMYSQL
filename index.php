<?php
    require("conecta.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
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
      
      <input type="submit" name="enviar" value="enviar">

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
      <th></th>
    </tr>

    <?php
      $sql = "SELECT * FROM usuarios";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {       
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($row["nome"]) . "</td>";
          echo "<td>" . htmlspecialchars($row["renda"]) . "</td>";
          echo "<td>" . htmlspecialchars($row["nascimento"]) . "</td>";
          echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
          echo "<td>";
          echo "<form method='post' action='deleta.php'>";
          echo "<input type='hidden' id='excluir' name='excluir' value='" . htmlspecialchars($row["id"]) . "'>";
          echo "<input type='submit' value='Apagar'>";
          echo "</form>";
          echo "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5'>0 resultados</td></tr>";
      }

      $conn->close();
    ?>
  </table>

</body>
</html>
