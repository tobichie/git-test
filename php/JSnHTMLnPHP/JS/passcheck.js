// setze username und passwort der Variablen gleich

if (!window.location.href.includes("../../logins/logins.php")) {
    function processPassID() {
        let username
        let password
        let strength = 0
        let tips = ""
        let format = /@/;
        username = document.getElementById("usercheck")
        username = username.value
        password = document.getElementById("passcheck")
        password = password.value
        console.log(username)
        console.log(password)

        // is password over 6 character
        if (password.length < 8) {
            tips += "Make the password longer. "
        } else {
            strength += 1
        }
        // is it upper and lower case
        if (password.match(/[a-z]/) && password.match(/[A-Z]/)) {
            strength += 1;
        } else {
            tips += "Use both lowercase and uppercase letters. ";
        }
        // does it include numbers
        if (password.match(/\d/)) {
            strength += 1;
        } else {
            tips += "Include at least one number. ";
        }
        // does it include special characters
        if (password.match(/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/)) { // or use RegEx
            strength += 1
        } else {
            tips += "Use Special Characters."
        }

        console.log(strength)
        if (strength < 2) {
            console.log("Easy to guess. " + tips)
            let blockentry = true
        } else if (strength === 2) {
            console.log("Medium difficulty. " + tips)
        } else if (strength === 3) {
            tips = "Difficult " + tips
            console.log(tips)
        } else if (strength === 4) {
            console.log("Extremely difficult. " + tips)
        }
        let passwordValue

        function updateUserInput() {
            // Get the input element by its id
            let passwordElement = document.getElementById("passcheck");

            // Update the variable with the input value
            passwordValue = passwordElement.value;

            // Get the output element by its id
            let outputElement = document.getElementById("output");

            // Update the content of the output element with the user input value
            outputElement.innerHTML = tips;

        }

        updateUserInput()
        return tips
    }

    function processUserID() {
        let username
        let tips = ""
        let usernameValue
        username = document.getElementById("usercheck")
        username = username.value

        if (username.length < 5) {
            tips += "Username must consist of at least 5 characters. "
        }
        if (username.length > 10) {
            tips += "Maximum length is 10 characters. "
        }
        if (username.match(/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/)) {
            tips += "Only letters and numbers allowed. "
        }

        let usernameElement = document.getElementById("usercheck")
        usernameValue = usernameElement.value
        let outputElement = document.getElementById("userOutput")

        outputElement.innerHTML = tips


    }
}