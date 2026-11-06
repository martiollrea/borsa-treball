<?php
//@ TODO: xifrar aquesta info en un futur
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "borsa_treball";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
