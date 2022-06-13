let currentAccount = document.querySelector(".current_account");

// window.addEventListener("load",()=>{
//     let xhr = new XMLHttpRequest();
//     xhr.open("GET", "../php/savings/getCurrentAccountBalance.inc.php", true);
//     xhr.onload = () =>{
//         if(xhr.readyState == XMLHttpRequest.DONE){
//             if(xhr.status == 200){
//                 let data = xhr.response;
//                 currentAccount.innerHTML = data;
//             }
//         }
//     }
//     xhr.send()
// })