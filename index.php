<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>To Do List</title>
        <!-- <link rel="stylesheet" href="styles.css"> -->
    </head>

    <body>
        <div class="input-container">
            <h1>Add a Task</h1>
            <form action="functions.php" method="post">
                <input type="text" name="task" placeholder="Enter task">
                <button type="submit" name="submit">Add Task</button>
            </form>
        </div>
    </body>
</html>

<?php
// PHP code for processing form submission or other tasks goes here
?>
