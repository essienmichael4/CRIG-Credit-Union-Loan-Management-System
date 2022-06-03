const searchdepmember = document.querySelector(".searchdepmember")
const searchdebmember = document.querySelector(".searchdebmember")

let deperror = document.querySelector(".error.depositerror")

let depmemname = document.querySelector(".depmemname")
let depmembal = document.querySelector(".depmembal")

searchdepmember.addEventListener("click",()=>{
    let name = "";
    let balance;
    let memcode = document.querySelector(".depmemcode").value;
    let params = "memcode="+memcode;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/savings/getmembercode.inc.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                name = xhr.response;
                
                if(name === "false"){
                    let error = "Member code incorrect or member doesn't exist";
                    deperror.innerHTML = `<p class="err">${error}</p>`;
                    return
                }else{
                    depmemname.textContent = name;
                    let xhrb = new XMLHttpRequest();
                    xhrb.open("POST", "../php/savings/getmemberbalance.inc.php");
                    xhrb.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
                    xhrb.onload = () =>{
                        if(xhrb.readyState == XMLHttpRequest.DONE){
                            if(xhrb.status == 200){
                                balance = xhrb.response;
                                depmembal.textContent = balance;
                            }
                        }
                    }
                    xhrb.send(params)
                }
            }
        }
    }
    xhr.send(params)
})


let deberror = document.querySelector(".error.debiterror")

let debmemname = document.querySelector(".memname")
let debmembal = document.querySelector(".membal")

searchdebmember.addEventListener("click",()=>{
    let name = "";
    let balance;
    let memcode = document.querySelector(".debmemcode").value;
    let params = "memcode="+memcode;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/savings/getmembercode.inc.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                name = xhr.response;
                if(name === "false"){
                    let error = "Member code incorrect or member doesn't exist";
                    deberror.innerHTML = `<p class="err">${error}</p>`;
                    return
                }else{
                    debmemname.textContent = name;
                    let xhrb = new XMLHttpRequest();
                    xhrb.open("POST", "../php/savings/getmemberbalance.inc.php");
                    xhrb.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
                    xhrb.onload = () =>{
                        if(xhrb.readyState == XMLHttpRequest.DONE){
                            if(xhrb.status == 200){
                                balance = xhrb.response;
                                debmembal.textContent = balance;
                            }
                        }
                    }
                    xhrb.send(params)
                }
            }
        }
    }
    xhr.send(params)
})