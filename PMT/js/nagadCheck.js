function isNumeric(value) {
  for (var i = 0; i < value.length; i++) {
      if (value[i] < '0' || value[i] > '9') {
          return false;
      }
  }
  return true;
}

function validateNagad() {
  var nagadNumber = document.forms["nagadForm"]["mobile-number-nagad"].value;
  var nagadPIN = document.forms["nagadForm"]["nagad-pin"].value;

  var nagadNumberError = document.getElementById('nagadNumberError');
  var nagadPINError = document.getElementById('nagadPINError');

  nagadNumberError.innerHTML = '';
  nagadPINError.innerHTML = '';

  var hasErrors = false;

  if (nagadNumber === "") {
      nagadNumberError.innerHTML = "Please enter a valid Nagad number.";
      hasErrors = true;
  }

  if (nagadPIN === "") {
      nagadPINError.innerHTML = "Please enter a valid Nagad PIN.";
      hasErrors = true;
  }

  if (nagadNumber === "" || !isNumeric(nagadNumber) || nagadNumber.length !== 11) {
      nagadNumberError.innerHTML = "Invalid Nagad number. Please enter an 11-digit number.";
      hasErrors = true;
  }

  if (nagadPIN === "" || !isNumeric(nagadPIN) || nagadPIN.length !== 6) {
      nagadPINError.innerHTML = "Invalid Nagad PIN. Please enter a 6-digit PIN.";
      hasErrors = true;
  }

  return !hasErrors;
}

function clearErrorMessages() {
  document.getElementById('nagadNumberError').innerHTML = '';
  document.getElementById('nagadPINError').innerHTML = '';
}
