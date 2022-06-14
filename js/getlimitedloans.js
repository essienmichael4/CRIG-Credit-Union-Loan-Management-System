let limited_loans__table = document.querySelector(".main__table");

window.addEventListener("load",()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/getlimitedloans.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                limited_loans__table.innerHTML = data;
            }
        }
    }
    xhr.send()
})

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/getlimitedloans.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;

                limited_loans__table.innerHTML = data;
            }
        }
    }
    xhr.send()
}, 50000)