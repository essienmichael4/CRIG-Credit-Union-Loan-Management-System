const person_btn = document.querySelector(".person_btn");

person_btn.addEventListener("click", ()=>{
    const personal__details = document.querySelector(".personal__details");
    person_btn.classList.toggle("active");
    personal__details.classList.toggle("active");
})