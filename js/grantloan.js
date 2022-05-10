function handleSold(id){
    let oid = id;
    let user = document.querySelector(".user").value;

    let params = "oid="+oid+"&user="+user;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/grantloan.inc.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                // location.href = "mainbody.php?pgname=dashboard";
            }
        }
    }
    xhr.send(params)
}