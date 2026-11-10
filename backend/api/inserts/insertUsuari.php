<?php
require_once '../api/corsHelper.php';
require_once '../../configs/DataBaseConnection.php';
require_once '../api/authHelper.php';



// Variable per comunicar el resultat al fitxer de validació
$insercioCorrecta = false;
$campDuplicat = null;
$missatgeError = "";

$sqlUsuari = "INSERT INTO usuaris (nom_usuari, email, contrasenya_hash, rol, telefon, poblacio) VALUES (?, ?, ?, ?, ?, ?)";
$sqlAlumne = "INSERT INTO alumnes (usuari_id, nom, cognoms, data_naixement) VALUES (?, ?, ?, ?)";
$sqlEmpresa = "INSERT INTO empreses (usuari_id, nom_empresa, codi_postal) VALUES (?, ?, ?)";
$sqlEliminarUsuari = "DELETE FROM usuaris WHERE id = ?";

$idUsuari = null;

try {
  $stmtUsuari = $conn->prepare($sqlUsuari);
  $stmtUsuari->bind_param("ssssss", $username, $email, $hashedPassword, $tipus, $telefon, $poblacio);
  $stmtUsuari->execute();

  $idUsuari = $conn->insert_id;
  $stmtUsuari->close();

  if ($tipus === 'alumne') {
    $stmtEspecific = $conn->prepare($sqlAlumne);
    $stmtEspecific->bind_param("isss", $idUsuari, $username, $cognoms, $dataNaixement);
    $stmtEspecific->execute();
    $stmtEspecific = null;
  } elseif ($tipus === 'empresa') {
    $stmtEspecific = $conn->prepare($sqlEmpresa);
    $stmtEspecific->bind_param("iss", $idUsuari, $username, $codi_postal);
    $stmtEspecific->execute();
    $stmtEspecific = null;
  } else {
    throw new Exception("El tipus d'usuari no es vàlid");
  }

  $insercioCorrecta = true;
} catch (mysqli_sql_exception $e) {
  if ($idUsuari) {
    $stmtEliminar = $conn->prepare($sqlEliminarUsuari);
    $stmtEliminar->bind_param('i', $idUsuari);
    $stmtEliminar->execute();
    $stmtEliminar->close();
  }

  if ($e->getCode() === 1062) {
    $campDuplicat = str_contains($e->getMessage(), 'email') ? 'email' : 'username';
  } else {
    $missatgeError = "Error a la base de dades: " . $e->getMessage();
  }
} catch (Exception $e) {
  if ($idUsuari) {
    $stmtEliminar = $conn->prepare($sqlEliminarUsuari);
    $stmtEliminar->bind_param('i', $idUsuari);
    $stmtEliminar->execute();
    $stmtEliminar->close();
  }
  $missatgeError = $e->getMessage();
}
