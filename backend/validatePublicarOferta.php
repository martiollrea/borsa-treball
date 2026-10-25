<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST["title"];
  $description = $_POST["description"];
  $sector = $_POST["sector"];
  $date = $_POST["date"];

  if (empty($title) || empty($description) || empty($sector)) {
    header("Location: publicar-oferta.php?error=Empleneu tots els camps");
    exit();
  } else {
    header("Location: ../frontend/index.php");
    exit();
  }
} else {
  header("Location: publicar-oferta.php");
  exit();
}
