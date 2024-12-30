roleBtn = document.getElementById("roleBtn");
radioStaff = document.getElementById("radioStaff");
radioAdmin = document.getElementById("radioAdmin");
radios = document.querySelectorAll(".roleRadio");

roleBtn.addEventListener("click", () => {
  roleButtonText();
});

function roleButtonText() {
  if (radios[0].checked) {
    radios[1].checked = true;
  } else {
    radios[0].checked = true;
  }
  radios.forEach((radio) => {
    if (radio.checked) {
      roleBtn.innerText = radio.value == "admin" ? "ADMIN" : "STAFF";
      roleBtn.style.backgroundColor =
        radio.value == "admin"
          ? "rgba(132, 0, 255, 0.425)"
          : "rgba(0, 255, 0, .425)";
      roleBtn.style.border =
        radio.value == "admin"
          ? "2px solid rgba(132, 0, 255, .425)"
          : "2px solid rgba(0, 255, 0, 0.425)";
      roleBtn.style.borderRadius = "5px";
    }
  });
}

function togglePassword() {
  const passwordField = document.getElementById("password");
  const eyeIcon = document.querySelector("#eyeIcon");
  if (passwordField.type === "password") {
    passwordField.type = "text";
    eyeIcon.className = "fa fa-eye-slash";
  } else {
    passwordField.type = "password";
    eyeIcon.className = `fa fa-eye`;
  }
}

roleButtonText();
