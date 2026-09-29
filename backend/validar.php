<?php


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["username"];
        $cognoms = $_POST["cognoms"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $telefon = $_POST["telefon"];
        $edat = $_POST["edat"];
        $poblacio = $_POST["poblacio"];
    

        if (empty($name)) {
            // Redirigir si hay un error
            header("Location: ../frontend/index.php?error=100");
            exit();
        } else {
            // Redirigir si el proceso es correcto (Patrón Post/Redirect/Get)
            header("Location: ../frontend/index.php");
            exit();
        }
    }
?>