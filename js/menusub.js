const loan_sub = document.querySelector(".loan_sub");
const saving_sub = document.querySelector(".saving_sub");

loan_sub.addEventListener("click", ()=>{
    const loan_sub_menus = document.querySelector(".loan_sub_menus");
    loan_sub_menus.classList.toggle("hide");
})
saving_sub.addEventListener("click", ()=>{
    const saving_sub_menus = document.querySelector(".saving_sub_menus");
    saving_sub_menus.classList.toggle("hide");
})