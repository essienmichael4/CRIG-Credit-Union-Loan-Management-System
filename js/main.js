let user = document.querySelector(".user");
let userdetails = document.querySelector(".userdetails");

user.addEventListener("click", ()=>{
    user.classList.toggle("active");

    if(user.classList.contains("active")){
        userdetails.style.display = "flex";
    }else{
        userdetails.style.display = "none";
    }
})