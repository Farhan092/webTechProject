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

function validateChangePassword() {
  clearErrorMessages();

  let currentPassword = document.forms["changePasswordForm"]["currentPassword"].value;
  let newPassword = document.forms["changePasswordForm"]["newPassword"].value;
  let retypedPassword = document.forms["changePasswordForm"]["retypedPassword"].value;

  let currentPasswordError = document.getElementById('currentPasswordError');
  let newPasswordError = document.getElementById('newPasswordError');
  let retypedPasswordError = document.getElementById('retypedPasswordError');

  currentPasswordError.innerHTML = '';
  newPasswordError.innerHTML = '';
  retypedPasswordError.innerHTML = '';

  var hasErrors = false;

  if (currentPassword === "") {
      currentPasswordError.innerHTML = "Current Password is required";
      hasErrors = true;
  }

  if (newPassword === "") {
      newPasswordError.innerHTML = "New Password is required";
      hasErrors = true;
  } else if (!isValidPassword(newPassword)) {
      newPasswordError.innerHTML = "New Password must be 8 characters long and contain at least 1 uppercase letter";
      hasErrors = true;
  }

  if (retypedPassword === "" || retypedPassword !== newPassword) {
      retypedPasswordError.innerHTML = "Retyped Password does not match the New Password";
      hasErrors = true;
  }

  return !hasErrors;
}

function clearErrorMessages() {
  document.getElementById('currentPasswordError').innerHTML = '';
  document.getElementById('newPasswordError').innerHTML = '';
  document.getElementById('retypedPasswordError').innerHTML = '';
}
