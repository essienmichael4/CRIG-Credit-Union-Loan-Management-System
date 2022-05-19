let paid_loans = document.querySelector(".paid_loans");

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/getallpaidloans.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;

                // console.log(data)
                paid_loans.innerHTML = data;
            }
        }
    }
    xhr.send()
}, 500)