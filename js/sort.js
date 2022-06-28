function balancesort(){
    let sorted = document.querySelector(".orderbybalance")
    // sorted.classList.toggle("asc");
    let table = document.querySelector(".savings__table");

    if(sorted.classList.contains("asc")){
        
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "../php/savings/getallaccountsascbalance.inc.php", true);
        xhr.onload = () =>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    table.innerHTML = data;
                }
            }
        }
        xhr.send()
    }else if(sorted.classList.contains("dsc")){
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "../php/savings/getallaccountsdscbalance.inc.php", true);
        xhr.onload = () =>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    table.innerHTML = data;
                }
            }
        }
        xhr.send()
    }
}
function staffsort(){
    let sorted = document.querySelector(".orderbystaff")
    // sorted.classList.toggle("asc");
    let table = document.querySelector(".savings__table");

    if(sorted.classList.contains("asc")){
        
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "../php/savings/getallaccountsascstaff.inc.php", true);
        xhr.onload = () =>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    table.innerHTML = data;
                }
            }
        }
        xhr.send()
    }else if(sorted.classList.contains("dsc")){
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "../php/savings/getallaccountsdscstaff.inc.php", true);
        xhr.onload = () =>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    table.innerHTML = data;
                }
            }
        }
        xhr.send()
    }
}
function namesort(){
    let sorted = document.querySelector(".orderbyname")
    // sorted.classList.toggle("asc");
    let table = document.querySelector(".savings__table");

    if(sorted.classList.contains("asc")){
        
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "../php/savings/getallaccountsascname.inc.php", true);
        xhr.onload = () =>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    table.innerHTML = data;
                }
            }
        }
        xhr.send()
    }else if(sorted.classList.contains("dsc")){
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "../php/savings/getallaccountsdscname.inc.php", true);
        xhr.onload = () =>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    table.innerHTML = data;
                }
            }
        }
        xhr.send()
    }
}
function idsort(){
    let sorted = document.querySelector(".orderbyid")
    // sorted.classList.toggle("asc");
    let table = document.querySelector(".savings__table");

    if(sorted.classList.contains("asc")){
        
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "../php/savings/getallaccountsasc.inc.php", true);
        xhr.onload = () =>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    table.innerHTML = data;
                }
            }
        }
        xhr.send()
    }else if(sorted.classList.contains("dsc")){
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "../php/savings/getallaccountsdsc.inc.php", true);
        xhr.onload = () =>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    table.innerHTML = data;
                }
            }
        }
        xhr.send()
    }
}