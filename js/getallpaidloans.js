let paid_loans = document.querySelector(".paid_loans");

window.addEventListener("load",()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/getallpaidloans.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;

                paid_loans.textContent = data;
            }
        }
    }
    xhr.send()
})

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/getallpaidloans.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;

                paid_loans.textContent = data;
            }
        }
    }
    xhr.send()
}, 500000)