// Modal instance
let bookingModal;

document.addEventListener("DOMContentLoaded", () => {
  bookingModal = new bootstrap.Modal(document.getElementById("bookingModal"));
});

// Open modal on button click
document.getElementById("heroBook").onclick = () => bookingModal.show();
document.getElementById("bookTop").onclick = () => bookingModal.show();

// Quick form → open modal
document.getElementById("quickForm").onsubmit = (e) => {
  e.preventDefault();
  bookingModal.show();
};
