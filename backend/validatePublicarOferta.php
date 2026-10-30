<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $tokenPost = $_POST['tokenSecret'] ?? '';
  $tokenSession = $_SESSION['tokenSecret'] ?? '';

  if (empty($tokenPost) || !hash_equals($tokenSession, $tokenPost)) {
    header("Location: ../frontend/pages/forms/publicar-oferta.php?error=" . urlencode("Petició no vàlida o token expirat"));
    exit();
  }

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
