<?php
// Turn on error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include Composer's autoloader
require_once __DIR__ . '/vendor/autoload.php';

// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Database connection parameters
$servername = $_ENV['DB_SERVER'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

// Establishing a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for database connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get tasks from the database
function getTasks() {
    global $conn;
    $tasks = array(); // Initialize an empty array to hold tasks

    // SQL query to select all tasks from the 'todos' table
    $sql = "SELECT * FROM todos";
    $result = $conn->query($sql); // Execute the query

    // If there are rows returned from the query, fetch tasks and add them to the $tasks array
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
    }

    return $tasks; // Return the array containing tasks fetched from the database
}

// If form is submitted, add task to the database
if (isset($_POST['submit'])) { // Check if the 'submit' button has been clicked
    $task = $_POST['task']; // Retrieve the task description from the form

    // SQL query to insert the new task into the 'todos' table with the current timestamp
    $sql = "INSERT INTO todos (task, created_at) VALUES ('$task', NOW())";
    $conn->query($sql); // Execute the SQL query to add the task to the database

    // Redirect back to index.php to prevent form resubmission
    header("Location: index.php"); 
    exit(); // Make sure script execution stops after redirection
}
?>
