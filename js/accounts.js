window.addEventListener("load",()=>{
    let table = document.querySelector(".savings__table");

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/savings/getallaccounts.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                table.innerHTML = data;
            }
        }
    }
    xhr.send()
})

const getallaccounts = document.querySelector(".getallaccounts")
const getalldeposit = document.querySelector(".getalldeposit")
const getalltransactions = document.querySelector(".getalltransactions")
const getalldebit = document.querySelector(".getalldebit")
let account_title = document.querySelector(".account-title")

getallaccounts.addEventListener("click",()=>{
    let table = document.querySelector(".savings__table");

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/savings/getallaccounts.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                table.innerHTML = data;
                account_title.textContent = "Accounts";
            }
        }
    }
    xhr.send()
})

getalldeposit.addEventListener("click",()=>{
    let table = document.querySelector(".savings__table");

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/savings/getallaccountsdeposit.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                table.innerHTML = data;
                account_title.textContent = "Deposits";
            }
        }
    }
    xhr.send()
})

getalldebit.addEventListener("click",()=>{
    let table = document.querySelector(".savings__table");

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/savings/getallaccountsdebit.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                table.innerHTML = data;
                account_title.textContent = "Withdrawals";
            }
        }
    }
    xhr.send()
})

getalltransactions.addEventListener("click",()=>{
    let table = document.querySelector(".savings__table");

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/savings/getallaccountstransactions.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                table.innerHTML = data;
                account_title.textContent = "Transactions";
            }
        }
    }
    xhr.send()
})