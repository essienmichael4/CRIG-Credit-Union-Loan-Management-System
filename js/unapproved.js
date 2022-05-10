let unapproved__table = document.querySelector(".unapproved__table");

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/getapprovedloans.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;

                // console.log(data)
                unapproved__table.innerHTML = data;
            }
        }
    }
    xhr.send()
}, 500)