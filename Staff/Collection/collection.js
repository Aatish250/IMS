function totalCalc() {
  var rates = document.querySelectorAll("#rate");
  var sellQty = document.getElementById("sellQty");
  const qtyCtrlBtns = document.querySelectorAll(".qty-ctrl-btn");

  rates.forEach((rate) => {
    rate.addEventListener("input", (event) => {
      event.preventDefault();
      const total = rate.parentElement.parentElement.querySelector("#total");
      total.value = sellQty.value * rate.value;
    });
  });

  qtyCtrlBtns.forEach((btn) => {
    btn.addEventListener("click", (event) => {
      event.preventDefault();
      const input = btn.parentElement.querySelector(".qty-ctrl-inp");
      const maxQty = btn.parentElement.parentElement.querySelector("#maxQty");
      const rate = btn.parentElement.parentElement.querySelector("#rate");
      const total = btn.parentElement.parentElement.querySelector("#total");

      if (btn.dataset.action === "+" && input.value < Number(maxQty.value)) {
        input.value = Number(input.value) + 1;
      } else if (btn.dataset.action === "-" && input.value > 1) {
        input.value = Number(input.value) - 1;
      }

      total.value = input.value * rate.value;
    });
  });

  totals = document.querySelectorAll("#total");
  totals.forEach((total) => {
    rate = total.parentElement.parentElement.querySelector("#rate");
    sellQty = total.parentNode.parentNode.querySelector("#sellQty");
    maxQty = total.parentNode.parentNode.querySelector("#maxQty");
    maxQty = total.parentNode.parentNode.querySelector("#maxQty");
    sellBtn = total.parentNode.parentNode.querySelector("#sellBtn");

    if (maxQty.value == 0) {
      sellQty.value = 0;
      sellBtn.style.display = "none";
    } else if (sellQty.value > maxQty.value) {
      sellQty.value = maxQty.value;
    }
    total.value = rate.value * sellQty.value;
  });
}

totalCalc();
