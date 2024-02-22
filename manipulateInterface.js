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
            const taskContainer = this.closest('.task-container');
            if (this.checked) {
                taskContainer.style.backgroundColor = "lightgrey";
            } else {
                taskContainer.style.backgroundColor = "lightblue";
            }
        });
    });
}

// Call the function when the DOM content is loaded
document.addEventListener("DOMContentLoaded", changeTaskContainerBackgroundColor);
