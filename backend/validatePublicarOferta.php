<?php 

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $sector = $_POST["sector"];
    $date = $_POST["date"];
  }

  if (empty($title) || empty($description)) {
    header("Location: publicar-oferta.php?error=Empleneu tots els camps");
  } else {
    header("Location: ../frontend/index.php");
    exit();
  }

?>