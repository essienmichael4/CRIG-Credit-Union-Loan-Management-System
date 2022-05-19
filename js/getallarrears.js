let arrears = document.querySelector(".arrears");

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/getallarrears.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;

                // console.log(data)
                arrears.innerHTML = data;
            }
        }
    }
    xhr.send()
}, 500)