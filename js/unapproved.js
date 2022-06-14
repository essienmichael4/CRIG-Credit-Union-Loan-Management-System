let unapproved__table = document.querySelector(".unapproved__table");

window.addEventListener("load",()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/getapprovedloans.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;

                unapproved__table.innerHTML = data;
            }
        }
    }
    xhr.send()
})

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/getapprovedloans.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                unapproved__table.innerHTML = data;
            }
        }
    }
    xhr.send()
}, 50000)

function handleGrantLoan(id){
    const processor = document.querySelector("#processor").value;
    let params = "processor="+processor+"&id="+id;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/grantloan.inc.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                
                if(data === "failure" || data == ""){
                    let toast = document.querySelector(".toast_container");
                    let toastmsg = document.querySelector(".toast_container .toast p");
                    if(toastmsg.classList.contains("success")){
                        toastmsg.classList.remove("success")
                        toastmsg.classList.add("error")
                    }
                    toastmsg.textContent = "An error occur. Please check connection";
                    toast.classList.add("active");
                    return
                }else{
                    let toast = document.querySelector(".toast_container");
                    let toastmsg = document.querySelector(".toast_container .toast p");
                    if(toastmsg.classList.contains("error")){
                        toastmsg.classList.remove("error")
                        toastmsg.classList.add("success")
                    }
                    toastmsg.textContent = "Loan grant successful. The update wil be applied soon.";
                    toast.classList.add("active");
                }
            }
        }
    }
    xhr.send(params)
}