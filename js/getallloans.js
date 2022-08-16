let all_loans__table = document.querySelector(".loan_data");

window.addEventListener("load",()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/getallloans.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                all_loans__table.innerHTML = data;
            }
        }
    }
    xhr.send()
})