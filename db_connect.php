<?php
$host = "localhost";    // server
$user = "root";         // default in XAMPP
$pass = "root";             // default password is empty
$db   = "train";        // database name (changed here)

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
} else {
    echo "✅ Connected Successfully to train database!";
}
?>
