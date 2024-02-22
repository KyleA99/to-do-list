// Define a function to change background color of task containers
function changeTaskContainerBackgroundColor() {
    const taskContainers = document.querySelectorAll(".task-container");

    taskContainers.forEach(function(container) {
        container.style.backgroundColor = "lightblue";
    });
}

// Call the function when the DOM content is loaded
document.addEventListener("DOMContentLoaded", changeTaskContainerBackgroundColor);