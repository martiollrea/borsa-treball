<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $tipus = $_POST["tipus_usuari"] ?? 'alumne';
  $errors = [];

  // Recollim totes les dades
  $username       = trim($_POST["username"] ?? '');
  $cognoms        = trim($_POST["cognoms"] ?? '');
  $email          = trim($_POST["email"] ?? '');
  $pass           = $_POST["password"] ?? '';
  $pass_repeat    = $_POST["repetir_password"] ?? '';
  $telefon        = trim($_POST["telefon"] ?? '');
  $edat           = trim($_POST["edat"] ?? '');
  $poblacio       = trim($_POST["poblacio"] ?? '');
  $codi_postal    = trim($_POST["codi_postal"] ?? '');

  $registerUrl = "../frontend/pages/forms/register.php?tipus=" . urlencode($tipus);

  // --- VALIDACIONS COMUNS (Per a tots dos tipus) ---
  if (empty($username)) {
    $errors['username'] = ($tipus === 'empresa') ? "El nom de l'empresa és obligatori." : "El nom és obligatori.";
  }

  if (empty($email)) {
    $errors['email'] = "El correu electrònic és obligatori.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "El format de l'email no és vàlid.";
  }

  if (empty($telefon)) {
    $errors['telefon'] = "El telèfon és obligatori.";
  } elseif (!preg_match('/^[0-9]{9}$/', $telefon)) {
    $errors['telefon'] = "El telèfon ha de tenir 9 dígits.";
  }

  if (empty($poblacio)) {
    $errors['poblacio'] = "La població / ubicació és obligatòria.";
  }

  if (empty($pass)) {
    $errors['password'] = "La contrasenya és obligatòria.";
  } elseif (strlen($pass) < 8) {
    $errors['password'] = "La contrasenya ha de tenir com a mínim 8 caràcters.";
  }

  if (empty($pass_repeat)) {
    $errors['repetir_password'] = "Cal repetir la contrasenya.";
  } elseif ($pass !== $pass_repeat) {
    $errors['repetir_password'] = "Les contrasenyes no coincideixen.";
  }

  // --- VALIDACIONS ESPECÍFIQUES D'ALUMNE ---
  if ($tipus === 'alumne') {
    if (empty($cognoms)) {
      $errors['cognoms'] = "Els cognoms són obligatoris.";
    }

    if (empty($edat)) {
      $errors['edat'] = "L'edat és obligatòria.";
    } elseif (!is_numeric($edat) || $edat <= 0) {
      $errors['edat'] = "L'edat ha de ser un número vàlid.";
    }
  }

  // --- VALIDACIONS ESPECÍFIQUES D'EMPRESA ---
  if ($tipus === 'empresa') {
    if (empty($codi_postal)) {
      $errors['codi_postal'] = "El codi postal és obligatori.";
    }
  }

  // SI HI HA ERRORS: Guardem a la sessió i tornem al formulari
  if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old_input'] = [
      'username'     => $username,
      'cognoms'      => $cognoms,
      'email'        => $email,
      'telefon'      => $telefon,
      'edat'         => $edat,
      'poblacio'     => $poblacio,
      'codi_postal'  => $codi_postal,
      'tipus_usuari' => $tipus
    ];

    header("Location: " . $registerUrl);
    exit();
  }

  // SI TOT ÉS CORRECTE: Iniciem la sessió
  unset($_SESSION['errors'], $_SESSION['old_input']);

  $_SESSION['username'] = $username;
  $_SESSION['tipus_usuari'] = $tipus;

  header("Location: ../frontend/index.php?status=success");
  exit();
} else {
  header("Location: ../frontend/pages/forms/register.php");
  exit();
}
