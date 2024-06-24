<?php
// config.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "educational_platform";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set user preferences if not already set
if (!isset($_COOKIE['user_language'])) {
    setcookie('user_language', 'en', time() + (86400 * 30), "/"); // Default to English, expires in 30 days
}
?>
