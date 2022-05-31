const withdrawal_btn = document.querySelector(".withdrawal_btn");
const deposite_btn = document.querySelector(".deposite_btn");
const deposite_close = document.querySelector(".deposite_close");
const withdrawal_close = document.querySelector(".withdrawal_close");

withdrawal_btn.addEventListener("click", ()=>{
    const withdraw_form = document.querySelector(".withdraw_form");
    withdraw_form.classList.toggle("active");
})
withdrawal_close.addEventListener("click", ()=>{
    const withdraw_form = document.querySelector(".withdraw_form");
    withdraw_form.classList.toggle("active");
})

deposite_btn.addEventListener("click", ()=>{
    const deposite_form = document.querySelector(".deposite_form");
    deposite_form.classList.toggle("active");
})
deposite_close.addEventListener("click", ()=>{
    const deposite_form = document.querySelector(".deposite_form");
    deposite_form.classList.toggle("active");
})