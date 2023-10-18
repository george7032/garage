// Generate slot buttons dynamically
const slotContainer = document.getElementById("slot-container");
for (let i = 1; i <= 20; i++) {
  const btn = document.createElement("button");
  btn.classList.add("slot-btn");
  btn.id = "btn" + i;
  btn.innerText = i;
  btn.addEventListener("click", function() {
    // Check if the user has provided their details
    

    // Disable all other buttons
    const btns = document.querySelectorAll(".slot-btn:not(.booked)");
    for (const otherBtn of btns) {
      otherBtn.disabled = true;
    }

    // Book the slot by changing the button color and disabling it
    btn.classList.add("booked");
    btn.setAttribute("data-start-time", new Date().getTime());
    var span = document.getElementById('span');


setInterval(time, 1000);

    // Display the time spent in the slot 


setInterval(time, 1000);
    const timeSpent = document.createElement("div");
    timeSpent.innerText = "Time Spent: Calculating...";
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
  const startTime = parseInt(btn.getAttribute("data-start-time"));
  const currentTime = new Date().get
  timeSpent=(currentTime-startTime)
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
