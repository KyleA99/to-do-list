<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>To Do List</title>
        <!-- <link rel="stylesheet" href="styles.css"> -->
        <script src="disableButton.js" defer></script>
    </head>

    <body>
        <div class="input-container">
            <h1>Add a Task</h1>
            <form action="functions.php" method="post">
                <input type="text" id="taskInput" name="task" placeholder="Enter task">
                <button type="submit" id="addButton" name="submit" disabled>Add Task</button>
            </form>

            <h2>Tasks:</h2>
            <ul>
                <?php
                    include "functions.php";

                    // Establishing a connection to the database
                    $conn = new mysqli($_ENV['DB_SERVER'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
                    
                    // Check for database connection errors
                    handleConnectionError($conn);

                    // Fetch tasks from the database
                    $tasks = getTasks($conn);

                    // Display tasks
                    foreach ($tasks as $task) {
                        echo "<li>" . $task['task'] . "</li>";
                    }

                    $conn->close();
                ?>
            </ul>
        </div>
    </body>
</html>
