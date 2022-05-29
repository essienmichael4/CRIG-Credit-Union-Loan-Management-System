let currentStartDay = document.querySelector(".currentStartDay");
let secondduemonth = document.querySelector(".secondduemonth");
let thirdduemonth = document.querySelector(".thirdduemonth");
let fourthduemonth = document.querySelector(".fourthduemonth");

currentStartDay.addEventListener("input", ()=>{
    let currentStartDate = currentStartDay.value;

    let date = new Date(currentStartDate);
    let dueone = date.setDate(date.getDate()+ 30);
    let duetwo = date.setDate(date.getDate()+ 30);
    let duethree = date.setDate(date.getDate()+ 30);

    dueone = new Date(dueone)
    duetwo = new Date(duetwo)
    duethree = new Date(duethree)

    dueone = dueone.toISOString().slice(0,10)
    duetwo = duetwo.toISOString().slice(0,10)
    duethree = duethree.toISOString().slice(0,10)

    secondduemonth.value = dueone
    thirdduemonth.value = duetwo
    fourthduemonth.value = duethree
})

const ext = document.querySelector(".extension");
const hiddenone = document.querySelector(".hidefirst");
const hiddentwo = document.querySelector(".hidesec");

ext.addEventListener("click",()=>{
    hiddenone.classList.toggle("hiddenone")
    hiddentwo.classList.toggle("hiddentwo")
})