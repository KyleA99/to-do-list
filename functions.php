<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$servername = $_ENV['DB_SERVER'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

// Establishing a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Function to handle database connection errors
function handleConnectionError($conn) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

// Function to get tasks from the database
function getTasks($conn) {
    $tasks = array();

    // SQL query to select all tasks from the 'todos' table
    $sql = "SELECT * FROM todos";
    // Execute the query
    $result = $conn->query($sql);

    // If there are rows returned from the query, fetch tasks and add them to the $tasks array
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
    }

    return $tasks;
}

// Function to add a task to the database
function addTask($conn, $task) {
    // SQL query to insert the new task into the 'todos' table with the current timestamp
    $sql = "INSERT INTO todos (task, created_at) VALUES ('$task', NOW())";
    // Execute the SQL query to add the task to the database
    $conn->query($sql);
}

// Function to handle form submission
function handleFormSubmission($conn) {
    if (isset($_POST['submit'])) {
        $task = $_POST['task'];
        addTask($conn, $task);

        // Redirect back to index.php to prevent form resubmission
        header("Location: index.php");
        exit();
    }
}

handleFormSubmission($conn);

handleConnectionError($conn);

$conn->close();
?>
