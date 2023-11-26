
function validateForm() {
  var amount = document.getElementsByName("amount")[0].value;
  var errorSpan = document.getElementById("amountError");

  if (amount === "") {
      errorSpan.innerHTML = "Please enter the amount before proceeding.";
      return false;
  }

  for (var i = 0; i < amount.length; i++) {
      if (amount[i] < '0' || amount[i] > '9') {
          errorSpan.innerHTML = "Please enter a valid  amount.";
          return false;
      }
  }

  if (amount <= 0) {
      errorSpan.innerHTML = "Please enter a valid amount.";
      return false;
  } else {
      errorSpan.innerHTML = "";
  }

  return true;
}
