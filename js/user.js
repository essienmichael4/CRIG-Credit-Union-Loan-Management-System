const userForm = document.querySelector(".main__user");
const addUser = document.querySelector(".addUser");
const closeUserForm = document.querySelector(".closeForm");

addUser.addEventListener("click", ()=>{
    userForm.style.display = "flex";
})
closeUserForm.addEventListener("click", ()=>{
    userForm.style.display = "none";
})