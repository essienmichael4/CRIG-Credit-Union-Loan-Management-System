let limited_loans__table = document.querySelector(".main__table");

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/getlimitedloans.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;

                // console.log(data)
                limited_loans__table.innerHTML = data;
            }
        }
    }
    xhr.send()
}, 500)