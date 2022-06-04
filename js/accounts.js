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