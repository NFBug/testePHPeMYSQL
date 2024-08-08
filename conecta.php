<?php
$servername = "localhost";
$username = "root";
$password = "";//senha do seu banco de dados (your database password)
$dbname = "";//nome do seu banco de dados (your database name)

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

return $conn;
?>
