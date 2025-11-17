// Open Modal
function openBookingForm(opts = {}) {
  const modal = document.getElementById('bookingModal');

  modal.classList.remove('hidden');
  modal.classList.add('flex');  // required since hidden removed

  document.getElementById('bf_space').innerText = opts.space || "Venue";

  if (opts.price) {
    document.getElementById('bookingMsg').innerText = "Estimated price: ₹" + opts.price;
  }

  if (opts.space) {
    document.getElementById('notes').placeholder =
      "Space: " + opts.space + " — Any special requests...";
  }
}

// Close Modal
function closeBookingForm() {
  const modal = document.getElementById('bookingModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
}

// Top buttons
document.getElementById('bookTop').addEventListener('click', () => openBookingForm());
document.getElementById('heroBook').addEventListener('click', () => openBookingForm());

// Quick booking form
document.getElementById('quickForm').addEventListener('submit', function (e) {
  e.preventDefault();
  const name = document.getElementById('q_name').value.trim();
  const mobile = document.getElementById('q_mobile').value.trim();
  const type = document.getElementById('q_type').value;
  const date = document.getElementById('q_date').value;

  openBookingForm({ space: type + (date ? " on " + date : "") });
});

// Main form submit
document.getElementById('bookingForm').addEventListener('submit', function (e) {
  e.preventDefault();
  document.getElementById('bookingMsg').innerText = "Booking submitted!";
  setTimeout(() => closeBookingForm(), 1500);
});
