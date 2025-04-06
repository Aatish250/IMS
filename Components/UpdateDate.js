// Update the date and time in every heading of the pages
function updateDate() {
  const now = new Date();
  // Format the date
  const formattedDate = now.toLocaleDateString("en-US", {
    month: "long",
    day: "numeric",
    year: "numeric",
  });
  // Format the time
  const formattedTime = now.toLocaleTimeString("en-US", {
    hour: "numeric",
    minute: "numeric",
    hour12: true,
  });
  const fullDate = `${formattedDate}, ${formattedTime}`;

  const display = document.getElementById("display-date");
  display.textContent = fullDate;
}
updateDate();
setInterval(updateDate, 60000);
