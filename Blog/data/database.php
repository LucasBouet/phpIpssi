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

$sql = "CREATE TABLE IF NOT EXISTS Articles(ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Title VARCHAR(255) NOT NULL, Content TEXT NOT NULL, Author VARCHAR(100) NOT NULL, Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP, Published BOOLEAN DEFAULT FALSE)";

if ($conn->query($sql)) {
    debug_to_console("Table Articles created successfully or already exists.");
} else {
    debug_to_console("Error creating table: " . $conn->error);
};

?>