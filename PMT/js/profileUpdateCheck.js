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

function validateProfileUpdate() {
  clearErrorMessages();

  let name = document.forms["updateProfileForm"]["name"].value;
  let email = document.forms["updateProfileForm"]["email"].value;
  let phone = document.forms["updateProfileForm"]["phone"].value;
  let dob = document.forms["updateProfileForm"]["dob"].value;

  let nameError = document.getElementById('nameError');
  let emailError = document.getElementById('emailError');
  let phoneError = document.getElementById('phoneError');
  let dobError = document.getElementById('dobError');

  nameError.innerHTML = '';
  emailError.innerHTML = '';
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
  document.getElementById('phoneError').innerHTML = '';
  document.getElementById('dobError').innerHTML = '';
}
