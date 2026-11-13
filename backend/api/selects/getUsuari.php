<?php
require_once '../../configs/DataBaseConnection.php';

// Variable per comunicar el resultat al fitxer de validació
$selectCorrecte = false;
$missatgeError = "";
$dades = null;

$sql = "SELECT nom_usuari, contrasenya_hash, rol FROM usuaris WHERE nom_usuari = ?";

if ($stmt = $conn->prepare($sql)) {
  $stmt->bind_param("s", $username);

  try {
    if ($stmt->execute()) {
      $response = $stmt->get_result();
      $dades = $response->fetch_assoc();

      $selectCorrecte = true;
    } else {
      $missatgeError = "Error a la base de dades: " . $stmt->error;
    }
  } catch (mysqli_sql_exception $e) {
    $missatgeError = "Error a la base de dades: " . $e->getMessage();
  } catch (Exception $e) {
    $missatgeError = $e->getMessage();
  }

  $stmt->close();
} else {
  $missatgeError = "Error preparant la consulta: " . $conn->error;
}
