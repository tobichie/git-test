// Declare a JavaScript variable
let userInputValue;

// Function to update the variable with user input
function updateUserInput() {
    // Get the input element by its id
    let userInputElement = document.getElementById("userInput");

    // Update the variable with the input value
    userInputValue = userInputElement.value;

    // Get the output element by its id
    let outputElement = document.getElementById("output");

    // Update the content of the output element with the user input value
    outputElement.innerHTML = "<a href=''>test</a>" + userInputValue;

}
