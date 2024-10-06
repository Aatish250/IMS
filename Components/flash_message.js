// function flashMessage(message, second) {
//   var msg = document.getElementById("flashMessage");
//   if (message != "") {
//     msg.classList.add("flash-message");
//     msg.textContent = message;
//     msg.style.display = "block";
//     setTimeout(() => {
//       msg.classList.remove("flash-message");
//       msg.style.display = "none";
//     }, second * 1000);
//   }
// }

// flashMessage("Flash Message Test");

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
