function qtyCtrl() {
  const qtyCtrlBtns = document.querySelectorAll(".qty-ctrl-btn");

  qtyCtrlBtns.forEach((btn, idx) => {
    btn.addEventListener("click", () => {
      const input = btn.parentElement.querySelector(".qty-ctrl-inp");
      const newQty = btn.parentElement.parentElement.querySelector("#new-qty");
      let currentQty = parseInt(input.value);

      if (btn.dataset.action === "+") {
        input.value = currentQty + 1;
      } else if (btn.dataset.action === "-" && currentQty > 1) {
        input.value = currentQty - 1;
      }
      newQty.value = input.value;
    });
  });
}
qtyCtrl();
