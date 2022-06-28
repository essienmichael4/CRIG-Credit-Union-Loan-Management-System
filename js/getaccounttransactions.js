window.addEventListener("load",()=>{
    let table = document.querySelector(".savings__table");
    let memcode = document.querySelector(".account_code").value;

    let params = "memcode="+memcode;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/savings/getallaccounttransactions.inc.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                table.innerHTML = xhr.response;
            }
        }
    }
    xhr.send(params)
});

const getalldeposit = document.querySelector(".getalldeposit")
const getalltransactions = document.querySelector(".getalltransactions")
const getalldebit = document.querySelector(".getalldebit")

getalltransactions.addEventListener("click",()=>{
    let table = document.querySelector(".savings__table");
    let memcode = document.querySelector(".account_code").value;

    let params = "memcode="+memcode;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/savings/getallaccounttransactions.inc.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                table.innerHTML = xhr.response;
            }
        }
    }
    xhr.send(params)
});

getalldeposit.addEventListener("click",()=>{
    let table = document.querySelector(".savings__table");
    let memcode = document.querySelector(".account_code").value;

    let params = "memcode="+memcode;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/savings/getallaccountdeposit.inc.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                table.innerHTML = xhr.response;
            }
        }
    }
    xhr.send(params)
});

getalldebit.addEventListener("click",()=>{
    let table = document.querySelector(".savings__table");
    let memcode = document.querySelector(".account_code").value;

    let params = "memcode="+memcode;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/savings/getallaccountdebit.inc.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                table.innerHTML = xhr.response;
            }
        }
    }
    xhr.send(params)
});

