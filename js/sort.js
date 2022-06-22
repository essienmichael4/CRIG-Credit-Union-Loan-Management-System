function sort(){
    let sorted = document.querySelector(".orderby")
    sorted.classList.toggle("asc");
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
    }else{
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
    }
}