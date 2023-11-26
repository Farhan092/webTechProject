function isNumeric(value) {
  for (var i = 0; i < value.length; i++) {
      if (value[i] < '0' || value[i] > '9') {
          return false;
      }
  }
  return true;
}


function validateCard() {
  var cardNumber = document.forms["paymentForm"]["card-number"].value;
  var cardPin = document.forms["paymentForm"]["card-pin"].value;


  var cardNumberError = document.getElementById('cardNumberError');
  var cardPinError = document.getElementById('cardPinError');


  cardNumberError.innerHTML = '';
  cardPinError.innerHTML = '';

  var hasErrors = false;


  if (cardNumber === "") {
      cardNumberError.innerHTML = "Please enter a valid card number.";
      hasErrors = true;
  }

  if (cardPin === "") {
      cardPinError.innerHTML = "Please enter a valid card PIN.";
      hasErrors = true;
  }

 
  if (cardNumber === "" || !isNumeric(cardNumber) || cardNumber.length !== 16) {
      cardNumberError.innerHTML = "Invalid card number. Please enter a 16-digit number.";
      hasErrors = true;
  }

  if (cardPin === "" || !isNumeric(cardPin) || cardPin.length !== 4) {
      cardPinError.innerHTML = "Invalid card PIN. Please enter a 4-digit PIN.";
      hasErrors = true;
  }

  return !hasErrors;
}

function clearErrorMessages() {
  document.getElementById('cardNumberError').innerHTML = '';
  document.getElementById('cardPinError').innerHTML = '';
}
