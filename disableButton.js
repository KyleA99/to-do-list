// Function to enable/disable the button based on input value
const toggleButton = () => {
    const taskInput = document.getElementById("taskInput");
    const addButton = document.getElementById("addButton");

    addButton.disabled = taskInput.value.trim() === "";
}

document.getElementById("taskInput").addEventListener("keyup", toggleButton);
