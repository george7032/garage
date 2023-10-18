function loadData(url) {
	var container = document.getElementById('data-container');
	container.innerHTML = '<div class="loader"></div>';

	var xhr = new XMLHttpRequest();
	xhr.open('GET', url, true);
	xhr.onload = function() {
		if (this.status == 200) {
			container.innerHTML = this.responseText;
		}
	};
	xhr.send();
}

function loadData(url) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("data-container").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}
