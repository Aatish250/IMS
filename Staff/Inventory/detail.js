// ---------------- [ + - ] buttons js V1 ---------------

// const qtyCtrlBtns = document.querySelectorAll(".qty-ctrl-btn");
// const total = document.getElementById("total");
// const price = document.getElementById("price");
// const stock = document.getElementById("stock");
// const qty = document.getElementById('qty');

// qtyCtrlBtns.forEach((btn) => {
//     btn.addEventListener("click", (event)=>{
//         event.preventDefault();

//         if(btn.dataset.action == "+")
//             qty.value++;
//         else if (btn.dataset.action == "-" && qty.value > 1)
//             qty.value--;

//         total.value = qty.value * price.value
//     })
// })
    
// price.addEventListener("input", ()=>{
//     total.value = qty.value * price.value

// })


// ---------------- [ + - ] buttons js V2 ---------------

const total = document.getElementById("total");
const price = document.getElementById("price");
const qty = document.getElementById('qty');

price.addEventListener("input", ()=>{
    total.value = qty.value * price.value
    
})

const qtyCtrlBtns = document.querySelectorAll(".qty-ctrl-btn");
const stock = document.getElementById("stock");

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
        else if (btn.dataset.action == "-")
            isDecreasing = false;
    })

    btn.addEventListener("mousedown", (event)=>{
        if(btn.dataset.action == "+"){
            isIncreasing = true;
            qtyChng();
        }
        else if (btn.dataset.action == "-"){
            isDecreasing = true;
            qtyChng();
        }

        
    })
})
    
function qtyChng(){
    if(inBtn){
        if(stock.value > 0){
            if(isIncreasing && qty.value < Number(stock.value)){
                setTimeout(qtyChng,250);
                qty.value++;
            } else if(isDecreasing && qty.value > 1){
                setTimeout(qtyChng,250);
                qty.value--;
            }
            total.value = qty.value * price.value;
        } else {
            if(isIncreasing){
                setTimeout(qtyChng,250);
                qty.value++;
            } else if(isDecreasing && qty.value > 1){
                setTimeout(qtyChng,250);
                qty.value--;
            }
        }
    }
}

// ----------------- issue button click --------------

const isuBtn = document.getElementById("isuBtn");
const isuDiv = document.getElementById("isuDiv");
const isuTxt = document.getElementById("isuTxt");
const isuSel = document.getElementById("isuSel");
isuDiv.style.display = 'none';

isuTxt.style.display = 'none';
isuClicked = false;

isuBtn.addEventListener("click", (e)=>{
    e.preventDefault();
    isuDiv.style.display = (isuClicked) ? 'block' : 'none';
    isuClicked = (isuClicked) ? false : true; 
})

isuSel.addEventListener("change", ()=>{
    isuTxt.style.display = (isuSel.value == 'other') ? 'block' : 'none';
})
