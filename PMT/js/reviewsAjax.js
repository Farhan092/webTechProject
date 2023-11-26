
function submitReview() {
  console.log('function called');
  var rating = document.getElementById('rating').value;
  var review = document.getElementById('review').value;
  var serviceType = document.getElementById('service-type').value;

  var xhttp = new XMLHttpRequest();

  xhttp.open('POST', '../model/reviewsModel.php', true);

  xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById('reviewMessage').innerHTML = this.responseText;
      }
  }

  xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  var action = 'insertReview';
    var params = 'action=' + action + '&rating=' + rating + '&review=' + review + '&service-type=' + serviceType;


  xhttp.send(params);
}
