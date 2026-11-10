<?php
require_once '../api/corsHelper.php';
require_once '../../configs/DataBaseConnection.php';
require_once '../api/authHelper.php';



// Variable per comunicar el resultat al fitxer de validació
$insercioCorrecta = false;
$missatgeError = "";

$SQL = "INSERT INTO ofertes (empresa_id, descripcio, data_publciacio, data_limit, estat, titol, sector, ubicacio) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($SQL)) {
  //fer primer el get de la empresa actual
  //fer tambe el date.now() per a la pulbicacio
  $stmt->bind_param("ssssssss", $empresaId, $description, $dataPublciacio, $limitDate, $status, $title, $sector, $location);

  try {
    if ($stmt->execute()) {
      $insercioCorrecta = true;
    } else {
      $missatgeError = "Error a la base de dades: " . $stmt->error;
    }
  } catch (mysqli_sql_exception $e) {
    $missatgeError = "Error a la base de dades: " . $e->getMessage();
  }

  $stmt->close();
}
