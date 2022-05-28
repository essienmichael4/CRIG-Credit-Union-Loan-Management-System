let all_loans_total = document.querySelector(".all_loans_total");

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/getallloanstotal.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;

                // console.log(data)
                all_loans_total.textContent = `GH¢ ${data}`;
            }
        }
    }
    xhr.send()
}, 500)