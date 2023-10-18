const buttons = document.querySelectorAll(".slot-button");
const form = document.querySelector("form");

let selectedButton;
let slotNumber = 1;

buttons.forEach(button => {
  button.addEventListener("click", function() {
    if (this.classList.contains("booked")) {
      return;
    }

    if (selectedButton) {
      selectedButton.classList.remove("booked");
      selectedButton.style.cursor = "pointer";
      selectedButton.style.backgroundColor = "lightgray";
    }

    this.classList.add("booked");
    this.style.cursor = "default";
    this.style.backgroundColor = "gray";
    <button onclick="window.location.href='user details.php'"></button>

    selectedButton = this;
    form.style.display = "block";
    form.elements["slotid"].value = "PN0" + slotNumber;
    slotNumber++;
  });
});

form.addEventListener("submit", function(event) {
  event.preventDefault();

  // Add code to submit the form data to the database here

  window.location = "success.html";
});
      