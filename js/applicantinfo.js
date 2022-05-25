const userForm = document.querySelector(".payment");
const addUser = document.querySelector(".paybtn");
const closeUserForm = document.querySelector(".closeForm");

addUser.addEventListener("click", ()=>{
    userForm.style.display = "flex";
})
closeUserForm.addEventListener("click", ()=>{
    userForm.style.display = "none";
})