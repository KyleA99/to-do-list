/**
 * Changes the background color of task containers to light blue.
 * @function changeTaskContainerBackgroundColor
 */
function changeTaskContainerBackgroundColor() {
    const taskContainers = document.querySelectorAll(".task-container");

    taskContainers.forEach(function(container) {
        container.style.backgroundColor = "lightblue";
    });

    // Add event listeners to checkboxes
    const checkboxes = document.querySelectorAll("input[type='checkbox']");
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            toggleStrikethrough(this);
            toggleBackgroundColor(this);
        });
    });
}

/**
 * Toggles the strikethrough effect on the task description.
 * @param checkbox - The checkbox element
 */
function toggleStrikethrough(checkbox) {
    const taskContainer = checkbox.closest('.task-container');
    const taskDescription = taskContainer.querySelector('.task-description');

    if (checkbox.checked) {
        taskDescription.style.textDecoration = "line-through";
    } else {
        taskDescription.style.textDecoration = "none";
    }
}

/**
 * Toggles the background color of the task container.
 * @param checkbox - The checkbox element
 */
function toggleBackgroundColor(checkbox) {
    const taskContainer = checkbox.closest('.task-container');

    if (checkbox.checked) {
        taskContainer.style.backgroundColor = "lightgrey";
    } else {
        taskContainer.style.backgroundColor = "lightblue";
    }
}

// Call the function when the DOM content is loaded
document.addEventListener("DOMContentLoaded", changeTaskContainerBackgroundColor);
