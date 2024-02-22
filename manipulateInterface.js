/**
 * Changes the background color of task containers to light blue.
 * @function changeTaskContainerBackgroundColor
 */
function changeTaskContainerBackgroundColor() {
    const taskContainers = document.querySelectorAll(".task-container");

    taskContainers.forEach(function(container) {
        container.style.backgroundColor = "lightblue";
    });
}

// Call the function when the DOM content is loaded
document.addEventListener("DOMContentLoaded", changeTaskContainerBackgroundColor);