function todayDate() {
  return new Date().toISOString().split("T")[0];
}

let listLimit = document.getElementById("listLimit");
let startDate = document.getElementById("startDate");
let endDate = document.getElementById("endDate");
let filterForm = document.getElementById("filterForm");

startDate.value = startDate.value ? startDate.value : todayDate();
endDate.value = endDate.value ? endDate.value : todayDate();

startDate.max = todayDate();
endDate.max = todayDate();
endDate.min = startDate.value;

listLimit.addEventListener("change", () => {
  filterForm.submit();
});

startDate.addEventListener("change", () => {
  if (startDate.value > todayDate()) {
    startDate.value = todayDate();
  }
  if (startDate.value > endDate.value) {
    endDate.value = startDate.value;
  }
  endDate.min = startDate.value;
  filterForm.submit();
});

endDate.addEventListener("change", () => {
  if (endDate.value > todayDate()) {
    endDate.value = todayDate();
  }
  if (startDate.value > endDate.value) {
    startDate.value = endDate.value;
  }
  filterForm.submit();
});

const qtyCtrlBtns = document.querySelectorAll(".qty-ctrl-btn");
const total = document.getElementById("total");
const price = document.getElementById("price");
const qty = document.getElementById("qty");

qtyCtrlBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    const input = btn.parentElement.querySelector(".qty-ctrl-inp");
    let currentQty = parseInt(input.value);

    if (btn.dataset.action === "+") {
      // input.value = currentQty + 1;
      price.value ? (input.value = currentQty + 1) : 1;
    } else if (btn.dataset.action === "-" && currentQty > 1) {
      input.value = currentQty - 1;
    }
    total.value = price.value ? price.value * input.value : "";
  });
});

price.addEventListener("input", () => {
  total.value = price.value ? price.value * qty.value : "";
});
