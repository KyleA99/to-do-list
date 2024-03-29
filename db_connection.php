<?php
// Autoload classes and dependencies using Composer
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$servername = $_ENV['DB_SERVER'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

// Establishes a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

/**
 * Handles database connection errors.
 *
 * @param mysqli $conn The database connection object to check for errors.
 * @return void
 */
function handleConnectionError($conn) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
?>
