const day = document.querySelector(".day")
const month = document.querySelector(".month")
const year = document.querySelector(".year")
const allTime = document.querySelector(".allTime")

const day1 = document.querySelector(".dayInputfirst")
const day2 = document.querySelector(".dayInputsecond")
const monthInput1 = document.querySelector(".monthInput1")
const monthInput2 = document.querySelector(".monthInput2")
const yearInput = document.querySelector(".yearInput")

allTime.addEventListener("click", ()=>{
    if(day.classList.contains("active")){
        day.classList.remove("active");
        day1.style.display = "none"
        day2.style.display = "none"
    }
    
    if(month.classList.contains("active")){
        month.classList.remove("active");
        monthInput1.style.display = "none"
        monthInput2.style.display = "none"
    }

    if(year.classList.contains("active")){
        year.classList.remove("active");
        yearInput.style.display = "none"
    }

    allTime.classList.add("active")
})

day.addEventListener("click", ()=>{
    if(allTime.classList.contains("active")){
        allTime.classList.remove("active");
    }

    if(month.classList.contains("active")){
        month.classList.remove("active");
        monthInput1.style.display = "none"
        monthInput2.style.display = "none"
    }

    if(year.classList.contains("active")){
        year.classList.remove("active");
        yearInput.style.display = "none"
    }

    day.classList.add("active")
    if(day.classList.contains("active")){
        day1.style.display = "inline-block"
        day2.style.display = "inline-block"
    }
})

month.addEventListener("click", ()=>{
    if(allTime.classList.contains("active")){
        allTime.classList.remove("active");
    }

    if(day.classList.contains("active")){
        day.classList.remove("active");
        day1.style.display = "none"
        day2.style.display = "none"
    }

    if(year.classList.contains("active")) {
        year.classList.remove("active");
        yearInput.style.display = "none"
    }

    month.classList.add("active")
    if(month.classList.contains("active")){
        monthInput1.style.display = "inline-block"
        monthInput2.style.display = "inline-block"
    }
})

year.addEventListener("click", ()=>{
    if(allTime.classList.contains("active")){
        allTime.classList.remove("active");
    }
    
    if(day.classList.contains("active")){
        day.classList.remove("active");
        day1.style.display = "none"
        day2.style.display = "none"
    }
    
    if(month.classList.contains("active")){
        month.classList.remove("active");
        monthInput1.style.display = "none"
        monthInput2.style.display = "none"
    }

    year.classList.add("active")
    if(year.classList.contains("active")){
        yearInput.style.display = "inline-block"
    }
})