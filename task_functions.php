<?php
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
?>
