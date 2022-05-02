const passwordShow = (e)=>{
    let pwd = document.querySelector(`.${e}`);
    let pwdCross = document.querySelector(`.password`);
    if(pwd.type == "password"){
        pwd.type = "text"
        pwdCross.classList.add("active")
    } else{
        pwd.type = "password"
        pwdCross.classList.remove("active")
    }
}