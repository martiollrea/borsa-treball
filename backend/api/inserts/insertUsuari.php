<?php
require_once '../api/cors.php';
require_once '../../configs/DataBaseConnection.php';
require_once '../api/authHelper.php';



// Variable per comunicar el resultat al fitxer de validació
$insercioCorrecta = false;

$SQL = "INSERT INTO usuaris (nom_usuari, email, contrassenya_hash, rol, telefon, poblacio) VALUES (?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($SQL)) {
  $stmt->bind_param("ssssss", $username, $email, $hashedPassowrd, $tipus, $telefon, $poblacio);

  if ($stmt->execute()) {
    $insercioCorrecta = true;
  }

  $stmt->close();
}
