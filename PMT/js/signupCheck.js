function isAllLetters(str) {
    str = str.replace(' ', '');
    for (var i = 0; i < str.length; i++) {
        var char = str[i];
        if (!(char >= 'A' && char <= 'Z') && !(char >= 'a' && char <= 'z')) {
            return false;
        }
    }
    return true;
}

function hasDotAndAt(email) {
    var dotCount = 0;
    var atCount = 0;
    for (var i = 0; i < email.length; i++) {
        var char = email[i];
        if (char === '.') {
            dotCount++;
        } else if (char === '@') {
            atCount++;
        }
    }
    return dotCount > 0 && atCount > 0;
}

function isAlphanumeric(str) {
    for (var i = 0; i < str.length; i++) {
        var char = str[i];
        if (!(char >= 'A' && char <= 'Z') && !(char >= 'a' && char <= 'z') && !(char >= '0' && char <= '9')) {
            return false;
        }
    }
    return true;
}

function isValidPassword(password) {
    var uppercaseFound = false;
    for (var i = 0; i < password.length; i++) {
        var char = password[i];
        if (char >= 'A' && char <= 'Z') {
            uppercaseFound = true;
            break;
        }
    }
    return password.length >= 8 && uppercaseFound;
}

function startsWith01(phone) {
    return phone.substr(0, 2) === "01";
}

function isValidDOB(dob) {
    return dob !== "";
}

function validatSignup() {
    console.log('function called');
    clearErrorMessages();

    let name = document.forms["signupForm"]["name"].value;
    let email = document.forms["signupForm"]["email"].value;
    let username = document.forms["signupForm"]["username"].value;
    let password = document.forms["signupForm"]["password"].value;
    let confirmPassword = document.forms["signupForm"]["confirmPassword"].value;
    let phone = document.forms["signupForm"]["phone"].value;
    let dob = document.forms["signupForm"]["dob"].value;

    let nameError = document.getElementById('nameError');
    let emailError = document.getElementById('emailError');
    let usernameError = document.getElementById('usernameError');
    let passwordError = document.getElementById('passwordError');
    let confirmPasswordError = document.getElementById('confirmPasswordError');
    let phoneError = document.getElementById('phoneError');
    let dobError = document.getElementById('dobError');
    dobError.innerHTML = '';

    nameError.innerHTML = '';
    emailError.innerHTML = '';
    usernameError.innerHTML = '';
    passwordError.innerHTML = '';
    confirmPasswordError.innerHTML = '';
    phoneError.innerHTML = '';
    dobError.innerHTML = '';

    var hasErrors = false;

    if (name === "") {
        nameError.innerHTML = "Name is required";
        hasErrors = true;
    } else if (!isAllLetters(name)) {
        nameError.innerHTML = "Name must consist of letters only";
        hasErrors = true;
    }


    if (email === "") {
        emailError.innerHTML = "Email is required";
        hasErrors = true;
    } else if (!hasDotAndAt(email)) {
        emailError.innerHTML = "Invalid email format";
        hasErrors = true;
    }


    if (username === "") {
        usernameError.innerHTML = "Username is required";
        hasErrors = true;
    } else if (!isAlphanumeric(username)) {
        usernameError.innerHTML = "Username can only contain letters and numbers";
        hasErrors = true;
    }


    if (password === "") {
        passwordError.innerHTML = "Password is required";
        hasErrors = true;
    } else if (!isValidPassword(password)) {
        passwordError.innerHTML = "Password must be 8 characters long and contain at least 1 uppercase letter";
        hasErrors = true;
    }


    if (confirmPassword === "" || confirmPassword !== password) {
        confirmPasswordError.innerHTML = "Passwords do not match";
        hasErrors = true;
    }

    if (phone === "") {
        phoneError.innerHTML = "Phone is required";
        hasErrors = true;
    } else if (!startsWith01(phone)) {
        phoneError.innerHTML = "Phone number should start with 01";
        hasErrors = true;
    }

    if (!isValidDOB(dob)) {
        dobError.innerHTML = "Date of Birth is required";
        hasErrors = true;
    }


    return !hasErrors;
}

function clearErrorMessages() {
    document.getElementById('nameError').innerHTML = '';
    document.getElementById('emailError').innerHTML = '';
    document.getElementById('usernameError').innerHTML = '';
    document.getElementById('passwordError').innerHTML = '';
    document.getElementById('confirmPasswordError').innerHTML = '';
    document.getElementById('phoneError').innerHTML = '';
}
