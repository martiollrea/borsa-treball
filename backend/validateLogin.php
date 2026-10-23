<?php
session_start();

$usuaris_registrats = [
  'admin' => password_hash('adminadmin', PASSWORD_DEFAULT)
];



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"] ?? '';
  $password = $_POST["password"] ?? '';


  if (empty($username) || empty($password)) {
    header("Location: login.php?error=Empleneu tots els camps");
    exit();
  }

  if (
    isset($usuaris_registrats[$username]) &&
    password_verify($password, $usuaris_registrats[$username])
  ) {
    $_SESSION['tipus_usuari'] = "alumne";
    $_SESSION['username'] = $username;
    header("Location: ../frontend/index.php");
    exit();
  } else {
    header("Location: ../frontend/pages/forms/login.php?error=" . urldecode("Credencials Incorrectes"));
    exit();
  }
} else {
  header("Location: login.php");
  exit();
}
