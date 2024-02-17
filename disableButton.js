/**
 * Enables or disables the button based on the input value in the task input field.
 * @returns {void}
 */
const toggleButton = () => {
    const taskInput = document.getElementById("taskInput");
    const addButton = document.getElementById("addButton");

    addButton.disabled = taskInput.value.trim() === "";
}

document.getElementById("taskInput").addEventListener("keyup", toggleButton);
