roleBtn = document.getElementById("roleBtn");
radioStaff = document.getElementById("radioStaff");
radioAdmin = document.getElementById("radioAdmin");
radios = document.querySelectorAll(".roleRadio")

roleBtn.addEventListener("click", ()=>{
    console.log("--- Clicked ---");
    roleButtonText();
})

function roleButtonText() {
    if(radios[0].checked){
        radios[1].checked = true;
    } else {
        radios[0].checked = true;
    }
    radios.forEach(radio => {
        if(radio.checked){
            roleBtn.innerText = radio.value == "admin" ? "ADMIN" : "STAFF";
            roleBtn.style.backgroundColor = radio.value == "admin"
            ? "rgba(132, 0, 255, 0.19)"
            : "rgba(0, 255, 0, 0.188)";
        }
    });
}

roleButtonText();