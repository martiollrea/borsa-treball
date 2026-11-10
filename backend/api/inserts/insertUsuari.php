<?php
require_once '../api/corsHelper.php';
require_once '../../configs/DataBaseConnection.php';
require_once '../api/authHelper.php';



// Variable per comunicar el resultat al fitxer de validació
// $insercioCorrecta = false;
// $campDuplicat = null;
// $missatgeError = "";

// $SQL = "INSERT INTO usuaris (nom_usuari, email, contrasenya_hash, rol, telefon, poblacio) VALUES (?, ?, ?, ?, ?, ?)";

// if ($stmt = $conn->prepare($SQL)) {
//   $stmt->bind_param("ssssss", $username, $email, $hashedPassword, $tipus, $telefon, $poblacio);

//   try {
//     if ($stmt->execute()) {
//       $insercioCorrecta = true;
//       //aqui posar el if ($tipus === alumne)
//     } else {
//       if ($stmt->errno === 1062) {
//         $campDuplicat = str_contains($stmt->error, 'email') ? 'email' : 'username';
//       } else {
//         $missatgeError = "Error a la base de dades: " . $stmt->error;
//       }
//     }
//   } catch (mysqli_sql_exception $e) {
//     if ($e->getCode() === 1062) {
//       $campDuplicat = str_contains($e->getMessage(), 'email') ? 'email' : 'username';
//     } else {
//       $missatgeError = "Error a la base de dades: " . $e->getMessage();
//     }
//   }

//   $stmt->close();
// }

// -----------------------------------------------------------------------------------------------------
$insercioCorrecta = false;
$campDuplicat = null;
$missatgeError = "";

$sqlUsuari = "INSERT INTO usuaris (nom_usuari, email, contrasenya_hash, rol, telefon, poblacio) VALUES (?, ?, ?, ?, ?, ?)";
$sqlAlumne = "INSERT INTO alumnes (id_usuari, nom, cognoms, edat) VALUES (?, ?, ?)";
$sqlEmpresa = "INSERT INTO empreses (id_usuari, codi_postal) VALUES (?, ?)";

try {
  $stmtUsuari = $conn->prepare($sqlUsuari);
  $stmtUsuari->bind_param("ssssss", $username, $email, $hashedPassword, $tipus, $telefon, $poblacio);

  $stmtUsuari->execute();

  $idUsuari = $conn->insert_id;

  if ($stmtUsuari->errno === 1062) {
    $campDuplicat = str_contains($stmtUsuari->error, 'email') ? 'email' : 'username';
  } else {
    $missatgeError = "Error a la base de dades 1: " . $stmtUsuari->error . "IDUSUARI: " . $idUsuari;
  }

  $stmtUsuari->close();
  $stmtUsuari = null;

  if ($tipus === 'alumne') {
    $stmtEspecific = $conn->prepare($sqlAlumne);
    $stmtEspecific->bind_param("ssss", $idUsuari, $username, $cognoms, $edat);
  } elseif ($tipus === 'empresa') {
    $stmtEspecific = $conn->prepare($sqlEmpresa);
    $stmtEspecific->bind_param("ssss", $idUsuari, $codi_postal);
  } else {
    throw new Exception("El tipus d'usuari no es vàlid");
  }

  if ($stmtEspecific->execute()) {
    $stmtEspecific->close();
    $stmtEspecific = null;

    $insercioCorrecta = true;
  } else {
    $missatgeError = "Error en la base de dades 2: " . $stmtEspecific->error;

    $sqlEliminar = "DELETE FROM usuaris WHERE id_usuari = ?";
    $stmtEliminar = $conn->prepare($sqlEliminar);
    $stmtEliminar->bind_param('i', $idUsuari);
    $stmtEliminar->execute();
    $stmtEliminar->close();
  }
} catch (mysqli_sql_exception $e) {
  if ($e->getCode() === 1062) {
    $campDuplicat = str_contains($e->getMessage(), 'email') ? 'email' : 'username';
  } else {
    $missatgeError = "Error a la base de dades: " . $e->getMessage();
  }
}
