

// Generate slot buttons dynamically
const slotContainer = document.getElementById("slot-container");
for (let i = 1; i <= 20; i++) {
  const btn = document.createElement("button");
  btn.classList.add("slot-btn");
  btn.id = "btn" + i;
  btn.innerText = i;
  btn.addEventListener("click", function() {
    // Check if the user has provided their details
    //const userDetailsLink = document.querySelector("a[href='info.php']");
    //if (!userDetailsLink) {
    //  alert("Please provide your details before booking a slot.");
    //  return;
    //}

    // Disable all other buttons
    const btns = document.querySelectorAll(".slot-btn:not(.booked)");
    for (const otherBtn of btns) {
      otherBtn.disabled = true;
    }

    // Book the slot by changing the button color and disabling it
    btn.classList.add("booked");
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "book_slot.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        console.log(this.responseText);
    }
};
xhr.send("slot-number=" + i);

    // Display the time spent in the slot
    const now = new Date();
    const timeSpent = document.createElement("div");
    timeSpent.innerText = "Time Spent: " + now;
    btn.parentNode.appendChild(timeSpent);
  });
  slotContainer.appendChild(btn);
}

// Free a slot
const freeSlotForm = document.getElementById("free-slot-form");
freeSlotForm.addEventListener("submit", function(event) {
  event.preventDefault();
  const slotNumber = document.getElementById("slot-number").value;
  const btn = document.getElementById("btn" + slotNumber);
  btn.classList.remove("booked");
  btn.disabled = false;
  const timeSpent = btn.nextSibling;
  btn.parentNode.removeChil(timeSpent);
  // Enable all other buttons
  const btns = document.querySelectorAll(".slot-btn:not(.booked)");
  for (const otherBtn of btns) {
    otherBtn.disabled = false;
  }
});
