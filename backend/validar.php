<?php
session_start();
$_SESSION['username'] = $_POST["username"];
$_SESSION['tipus_usuari'] = $_POST["tipus"];
$_SESSION['password'] = $_POST["password"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["username"] ?? '');
    $cognoms = trim($_POST["cognoms"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $pass = $_POST["password"] ?? '';
    $telefon = trim($_POST["telefon"] ?? '');
    $edat = trim($_POST["edat"] ?? '');
    $poblacio = trim($_POST["poblacio"] ?? '');

    if (empty($name) || empty($cognoms) || empty($email) || empty($pass) || empty($edat) || empty($poblacio)) {
        header("Location: ../frontend/index.php?error=" . urlencode("Cal omplir tots els camps obligatoris."));
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../frontend/index.php?error=" . urlencode("El format de l'email no és vàlid."));
        exit();
    }

    if (strlen($pass) < 8) {
        header("Location: ../frontend/index.php?error=" . urlencode("La contrasenya ha de tenir com a mínim 8 caràcters."));
        exit();
    }

    if (!is_numeric($edat) || $edat <= 0) {
        header("Location: ../frontend/index.php?error=" . urlencode("L'edat ha de ser un número vàlid."));
        exit();
    }

    header("Location: ../frontend/index.php?status=success");
    exit();
} else {
    header("Location: ../frontend/index.php");
    exit();
}
?>