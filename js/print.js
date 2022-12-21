function printAccountStatement(){
    let accSection = document.querySelector(`.account-details`);
    let accActions = document.querySelector(`.accActions`);
    let navBack = document.querySelector(`.navBack`);
    let des = document.querySelectorAll(`.des`);
    let tblwrapper_header1 = document.querySelector(`.tblwrapper_header`);
    // console.log(des);

    let page = document.body.innerHTML;
    accSection.style.display = "none";
    accActions.style.display = "none";
    navBack.style.display = "none";
    tblwrapper_header1.style.display = "flex";
    
    des.forEach(de =>{
        de.style.display = "none";
    })



    let report = document.querySelector(`.wrapper`).innerHTML;
    document.body.innerHTML = report;
    window.print();
    document.body.innerHTML = page;
}

function printStatement(){
    let des = document.querySelectorAll(`.des`);
    let tblwrapper_header1 = document.querySelector(`.tblwrapper_header`);
    let page = document.body.innerHTML;
    tblwrapper_header1.style.display = "flex";
    // let accSection = document.querySelector(`.account-details`);
    des.forEach(de =>{
        de.style.display = "none";
    })

    
    let report = document.querySelector(`.wrapper`).innerHTML;
    // accSection.style.display = "none";

    document.body.innerHTML = report;
    window.print();
    document.body.innerHTML = page;
}