<?php
require_once '../api/cors.php';
require_once '../../configs/DataBaseConnection.php';
require_once '../api/authHelper.php';



// Variable per comunicar el resultat al fitxer de validació
$insercioCorrecta = false;
$campDuplicat = null;
$missatgeError = "";

$SQL = "INSERT INTO usuaris (nom_usuari, email, contrasenya_hash, rol, telefon, poblacio) VALUES (?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($SQL)) {
  $stmt->bind_param("ssssss", $username, $email, $hashedPassword, $tipus, $telefon, $poblacio);

  try {
    if ($stmt->execute()) {
      $insercioCorrecta = true;
    } else {
      if ($stmt->errno === 1062) {
        $campDuplicat = str_contains($stmt->error, 'email') ? 'email' : 'username';
      } else {
        $missatgeError = "Error a la base de dades: " . $stmt->error;
      }
    }
  } catch (mysqli_sql_exception $e) {
    if ($e->getCode() === 1062) {
      $campDuplicat = str_contains($e->getMessage(), 'email') ? 'email' : 'username';
    } else {
      $missatgeError = "Error a la base de dades: " . $e->getMessage();
    }
  }

  $stmt->close();
}
