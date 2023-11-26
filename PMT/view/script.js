function submitReview() {
  alert('function called');
  console.log('AJAX is working!');
  let formData = new FormData(document.getElementById('reviewForm'));

  let xhttp = new XMLHttpRequest();
  xhttp.open('POST', 'reviews.php', true);
  xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById('message').innerHTML = this.responseText;
      }
  };
  xhttp.send(formData);
  
}

