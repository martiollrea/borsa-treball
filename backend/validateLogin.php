<?php 

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
  }

  if (empty($username) || empty($password)) {
    header("Location: login.php?error=Empleneu tots els camps");
  } else {
    header("Location: ../frontend/index.php");
    exit();
  }

?>