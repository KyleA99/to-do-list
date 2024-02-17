// Function to enable/disable the button based on input value
function toggleButton() {
    var taskInput = document.getElementById("taskInput");
    var addButton = document.getElementById("addButton");

    // Enable the button if there is text in the input field, otherwise disable it
    if (taskInput.value.trim() !== "") {
        addButton.disabled = false;
    } else {
        addButton.disabled = true;
    }
}

// Attach the toggleButton function to the input field's keyup event
document.getElementById("taskInput").addEventListener("keyup", toggleButton);