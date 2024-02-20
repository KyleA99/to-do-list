<?php
require_once 'db_connection.php';
require_once 'task_functions.php';

handleFormSubmission($conn);

// Fetch tasks from the database
$tasks = getTasks($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>To Do List</title>
        <link rel="stylesheet" href="styles.css">
        <script src="disableButton.js" defer></script>
    </head>

    <body>
        <div class="input-container">
            <h1>Add a Task</h1>
            <form action="index.php" method="post">
                <input type="text" id="taskInput" name="task" placeholder="Enter task">
                <button type="submit" id="addButton" name="submit" disabled>Add Task</button>
            </form>

            <h2>Tasks:</h2>
            <ul>
                <?php
                // Display tasks
                foreach ($tasks as $task) {
                ?>
                <li>
                    <div class="task-container">
                        <div class="task-description">
                            <?php echo $task['task']; ?>
                        </div>
                        <div class="checkbox-container">
                            <input type="checkbox" name="task_id[]" value="<?php echo $task['id']; ?>">
                        </div>
                    </div>
                </li>
                <?php
                }
                $conn->close();
                ?>
            </ul>
        </div>
    </body>
</html>
