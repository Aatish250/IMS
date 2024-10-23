
// ---------- program for quantity control buttons and quantity validation --------------
const qtyCtrlBtns = document.querySelectorAll(".qty-ctrl-btn");

qtyCtrlBtns.forEach((btn, idx) => {
    btn.addEventListener("click", () => {
        const input = btn.parentElement.querySelector('.qty-ctrl-inp');
        const newQty = grandParentElement(btn, '#new-qty');
        const maxQty = btn.parentElement.querySelector("#maxQty");
        let currentQty = parseInt(input.value);

        // console.log(maxQty.value +">"+currentQty+ " = " + String(Number(maxQty.value) > currentQty     ))
        if (btn.dataset.action === "+" && currentQty < maxQty.value) {
            input.value = currentQty + 1;
        } else if (btn.dataset.action === "-" && currentQty > 1) {
            input.value = currentQty - 1;
        }
        newQty.value = input.value;
    });
});

// ---------- program for issue select tag --------------
const isuSels = document.querySelectorAll("#isuSel");

isuSels.forEach((isuSel)=>{
    var newIsuSel = grandParentElement(isuSel, "#new-isuSel");
    var isuTxt = grandParentElement(isuSel, "#isuTxt");
    // newIsuTxt.style.display = isuSel.value != "other" ? "none" : "block";
    // var newIsuTxt = grandParentElement(isuSel, "#new-isuTxt");
    isuTxt.style.visibility = isuSel.value != "other" ? "hidden" : "visible";

    isuSel.addEventListener("change",()=>{
        newIsuSel = grandParentElement(isuSel, "#new-isuSel");
        isuTxt = grandParentElement(isuSel, "#isuTxt");
        // newIsuTxt = grandParentElement(isuSel, "#new-isuTxt");

        newIsuSel.value = isuSel.value;
        
        // newIsuTxt.style.display = isuSel.value != "other" ? "none" : "block";
        isuTxt.style.visibility = isuSel.value != "other" ? "hidden" : "visible";
    })


})

function grandParentElement(childElement, element) {
    return childElement.parentElement.parentElement.querySelector(element);
}

// ------------ program for onInput text ----------------
const isuTxts = document.querySelectorAll("#isuTxt");

isuTxts.forEach((isuTxt) => {
    isuTxt.addEventListener("input", ()=>{
        newIsuTxt = grandParentElement(isuTxt, "#new-isuTxt");
        newIsuTxt.value = isuTxt.value;
    })
})