function flashMessage(message, second) {
  let msg = document.getElementById("flashMessage");
  let box = document.getElementById("flashBox");
  if (message != "") {
    msg.textContent = message;
    box.style.display = "block";
    setTimeout(() => {
      box.style.display = "none";
    }, second * 1000);
  } else {
    box.style.display = "none";
  }
}

function closeMessage() {
  var box = document.getElementById("flashBox");
  box.style.display = "none";
}
