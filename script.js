function openBookingForm(opts = {}) {
  alert("Booking Requested For: " + (opts.space || "Venue"));
}

document.getElementById("bookTop")?.addEventListener("click", () => openBookingForm());
document.getElementById("heroBook")?.addEventListener("click", () => openBookingForm());
