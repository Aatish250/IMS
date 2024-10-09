function qtyCtrl() {
    const qtyCtrlBtns = document.querySelectorAll(".qty-ctrl-btn");
    const total = document.getElementById("total");
    const price = document.getElementById("price");
    const maxQty = document.getElementById("maxQty");
  
    qtyCtrlBtns.forEach((btn, idx) => {
        btn.addEventListener("click", (event) => {
            event.preventDefault();
            const input = btn.parentElement.querySelector('.qty-ctrl-inp');
  
            if (btn.dataset.action === "+") {
                input.value = Number(input.value) + 1;
            } else if (btn.dataset.action === "-" && currentQty > 1) {
                input.value = Number(input.value) - 1;
            }

            if(maxQty.value > 0){
                if(input.value > maxQty.value){
                    input.value = maxQty.value;
                }
                total.value = price.value * input.value;
            }
  
        });
    });
  }
  qtyCtrl();