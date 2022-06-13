let currentAccount = document.querySelector(".current_account");

window.addEventListener("load",()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/savings/getAllAccountBalance.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                currentAccount.textContent = data;
            }
        }
    }
    xhr.send()
})

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/savings/getAllAccountBalance.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;

                // console.log(data)
                currentAccount.textContent = data;
            }
        }
    }
    xhr.send()
}, 500000)