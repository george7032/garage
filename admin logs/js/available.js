const slotButtons = document.querySelectorAll('.slot-button');

slotButtons.forEach((button) => {
  button.addEventListener('click', (event) => {
    slotButtons.forEach((slotButton) => {
      slotButton.classList.remove('booked');
    });

    event.target.classList.add('booked');
    event.target.setAttribute('disabled', true);

    // Redirect to user details page
    window.location.href = 'User details.html';
  });
});
// Get the slot number from the URL parameters
const params = new URLSearchParams(window.location.search);
const slotNumber = params.get("slot number");

// Set the slot number in the HTML and the hidden input
document.getElementById("slot number").innerHTML = `Selected slot: ${slotNumber}`;
document.getElementById("slot number-input").value = slotNumber;
