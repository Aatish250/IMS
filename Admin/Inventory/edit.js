const qtyCtrlBtns = document.querySelectorAll(".qty-ctrl-btn");
const qty = document.getElementById('qty');

isIncreasing = false;
isDecreasing = false;
inBtn = false;

qtyCtrlBtns.forEach((btn) => {

    btn.addEventListener("click", (e)=>{
        e.preventDefault();
    })

    btn.addEventListener("mouseover", ()=>{ inBtn = true; })
    
    btn.addEventListener("mouseout", ()=>{ inBtn = isIncreasing = isDecreasing = false; })
    
    btn.addEventListener("mouseup", ()=>{
        if(btn.dataset.action == "+")
            isIncreasing = false;
        else if (btn.dataset.action == "-" && qty.value > 1)
            isDecreasing = false;
    })
    
    btn.addEventListener("mousedown", ()=>{
        if(btn.dataset.action == "+"){
            isIncreasing = true;
            qtyChng()
        }
        else if (btn.dataset.action == "-"){
            isDecreasing = true;
            qtyChng();
        }
    })
    
})

function qtyChng(){
    if(isIncreasing && inBtn){
        setTimeout(qtyChng,250);
        qty.value++;
    } else if(isDecreasing && inBtn && qty.value > 0){
        setTimeout(qtyChng,250);
        qty.value--;
    }
}