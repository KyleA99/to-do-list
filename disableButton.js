// Function to enable/disable the button based on input value
function toggleButton() {
    const taskInput = document.getElementById("taskInput");
    const addButton = document.getElementById("addButton");

    if (taskInput.value.trim() !== "") {
        addButton.disabled = false;
    } else {
        addButton.disabled = true;
    }
}

document.getElementById("taskInput").addEventListener("keyup", toggleButton);