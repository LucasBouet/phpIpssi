<?php
$servername = "mysql";
$username = "user";
$password = "pass";
$database = "website_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

debug_to_console("Connected successfully to the database.");

$conn->close();
?>
