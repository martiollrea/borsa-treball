<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"] ?? '';
  $password = $_POST["password"] ?? '';

  if (empty($username) || empty($password)) {
    header("Location: login.php?error=Empleneu tots els camps");
    exit();
  }

  require_once '../api/selects/getUsuari.php';

  if ($selectCorrecte && $dades) {
    $usernameBBDD = $dades['nom_usuari'];
    $passwordBBDD = $dades['contrasenya_hash'];
    $rol = $dades['rol'];

    if (password_verify($password, $passwordBBDD)) {
      $_SESSION['tipus_usuari'] = $rol;
      $_SESSION['username'] = $usernameBBDD;
      $_SESSION['tokenSecret'] = bin2hex(random_bytes(32));

      header("Location: ../../frontend/index.php");
      exit();
    } else {
      header("Location: ../../frontend/pages/forms/login.php?error=" . urlencode("Credencials Incorrectes"));
      exit();
    }
  } else {
    header("Location: ../frontend/pages/forms/login.php?error=" . urldecode("Credencials Incorrectes"));
    exit();
  }
} else {
  header("Location: ../../frontend/pages/forms/login.php");
  exit();
}
