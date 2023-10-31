<?php
$servername = "localhost";
$username = "root";
$password = "qwe123";
$dbname = "FairyDatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
