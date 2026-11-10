<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}



if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $tipus = $_POST["tipus_usuari"] ?? '';
  $errors = [];

  if (!in_array($tipus, ['alumne', 'empresa'], true)) {
    $tipus = 'alumne';
    $errors['tipus_usuari'] = "El tipus d'usuari no es vàlid";
  }

  // Recollir dades
  $username = trim($_POST["username"] ?? '');
  $cognoms = trim($_POST["cognoms"] ?? '');
  $email = trim($_POST["email"] ?? '');
  $pass = $_POST["password"] ?? '';
  $pass_repeat = $_POST["repetir_password"] ?? '';
  $telefon = trim($_POST["telefon"] ?? '');
  $dataNaixement = ($_POST['data_naixement']) ?? '';
  $poblacio = trim($_POST["poblacio"] ?? '');
  $codi_postal = trim($_POST["codi_postal"] ?? '');

  $registerUrl = "../../frontend/pages/forms/register.php?tipus=" . urlencode($tipus);

  // Validacions comuns
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

  $errorContrasenya = isset($errors['password']) || isset($errors['repetir_password']);

  // Validacions alumne
  if ($tipus === 'alumne') {
    if (empty($cognoms)) {
      $errors['cognoms'] = "Els cognoms són obligatoris.";
    }

    //validar format
    if (empty($dataNaixement)) {
      $errors['data_naixement'] = "La data de naixement és obligatòria.";
    } elseif (new DateTime($dataNaixement) >= new DateTime('today')) {
      $errors['data_naixement'] = "Ha de ser una data valida";
    }
  }

  // Validacions empresa
  if ($tipus === 'empresa') {
    if (empty($codi_postal)) {
      $errors['codi_postal'] = "El codi postal és obligatori.";
    }
  }

  // Lògica per omplir old_input (amb contrasenyes només si la seva validació és correcta)
  $guardarOldInput = function () use ($username, $cognoms, $email, $telefon, $dataNaixement, $poblacio, $codi_postal, $tipus, $pass, $pass_repeat, $errorContrasenya) {
    $old = [
      'username' => $username,
      'cognoms' => $cognoms,
      'email' => $email,
      'telefon' => $telefon,
      'data_naixement' => $dataNaixement,
      'poblacio' => $poblacio,
      'codi_postal' => $codi_postal,
      'tipus_usuari' => $tipus
    ];

    if (!$errorContrasenya) {
      $old['password'] = $pass;
      $old['repetir_password'] = $pass_repeat;
    }

    return $old;
  };

  // ERRORS DE VALIDACIÓ: Guardem a la sessió i tornem al formulari
  if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old_input'] = $guardarOldInput();

    header("Location: " . $registerUrl);
    exit();
  }

  // TOT CORRECTE: Iniciem la sessió
  $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

  require_once '../api/inserts/insertUsuari.php';

  if ($insercioCorrecta) {
    unset($_SESSION['errors'], $_SESSION['old_input']);
    $_SESSION['username'] = $username;
    $_SESSION['tipus_usuari'] = $tipus;

    header("Location: ../../frontend/index.php?status=success");
    exit();
  } else {
    if ($campDuplicat === 'username') {
      $_SESSION['errors'] = ['username' => "Aquest nom d'usuari no està disponible"];
    } elseif ($campDuplicat === 'email') {
      $_SESSION['errors'] = ['email' => "Aquest email ja ha estat enregistrat"];
    } else {
      $_SESSION['errors'] = ['database' => $missatgeError ?? "No s'ha pogut guardar l'usuari a la base de dades."];
    }

    // Com que les contrasenyes eren vàlides, es mantindran a la sessió
    $_SESSION['old_input'] = $guardarOldInput();

    header("Location: " . $registerUrl);
    exit();
  }
} else {
  header("Location: ../frontend/pages/forms/register.php");
  exit();
}
