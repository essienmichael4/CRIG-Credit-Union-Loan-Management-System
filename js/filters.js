// Get all loan filter buttons
const filters = document.querySelectorAll(".loanfilter");

// Get the time filter buttons
const times = document.querySelectorAll(".time");

// Get the table
const content = document.querySelector(".main__table");

let timefilter = "";
let loanfilter = "";


//Checks through the filter button to see which is clicked and active
filters.forEach(filter =>{
    filter.addEventListener("click", ()=>{
        const activeLink = document.querySelector(".loanfilter.active")
        if(activeLink && filter !== activeLink){
            activeLink.classList.toggle("active");
            filter.classList.toggle("active");
            if(filter.classList.contains("all")){
                loanfilter = "all";
                
            }else if(filter.classList.contains("approved")){
                loanfilter = "approved";
            }else if(filter.classList.contains("due")){
                loanfilter = "due";
            }else if(filter.classList.contains("overdue")){
                loanfilter = "overdue";
            }else{
                loanfilter = "paid";
            }

            /*Checks through the times button to see which is clicked and active and make
            a post request to retrieve the corresponding data from the database using ajax*/
            times.forEach(time =>{
                // alltime seaarch
                if(time.classList.contains("active") && time.classList.contains("allTime")){
                    timefilter = "alltime";
                    let params = "loanrequest="+loanfilter;

                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "../php/getalltimeloans.inc.php");
                    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
                    xhr.onload = () =>{
                        if(xhr.readyState == XMLHttpRequest.DONE){
                            if(xhr.status == 200){
                                let data = xhr.response;
                                content.innerHTML = data;
                            }
                        }
                    }
                    xhr.send(params)

                }else if(time.classList.contains("active") && time.classList.contains("day")){
                    // days seaarch
                    timefilter = "day";
                    let firstday= document.querySelector(".dayInput1").value;
                    let secondday= document.querySelector(".dayInput2").value;

                    if(firstday == "" && secondday !==""){
                        firstday=secondday;
                    }else if(firstday !== "" && secondday ==""){
                        secondday = firstday;
                    }

                    let params = "startday="+firstday+"&endday="+secondday+"&loanrequest="+loanfilter;

                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "../php/getalldayloans.inc.php");
                    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
                    xhr.onload = () =>{
                        if(xhr.readyState == XMLHttpRequest.DONE){
                            if(xhr.status == 200){
                                let data = xhr.response;
                                content.innerHTML = data;
                            }
                        }
                    }
                    xhr.send(params)
                }else if(time.classList.contains("active") && time.classList.contains("month")){
                    // months search
                    timefilter = "month";
                    let firstmonth= document.querySelector(".monthInput1").value;
                    let secondmonth= document.querySelector(".monthInput2").value;

                    if(firstmonth == "" && secondmonth !==""){
                        firstmonth=secondmonth;
                    }else if(firstmonth !== "" && secondmonth ==""){
                        secondmonth = firstmonth;
                    }

                    let params = "startmonth="+firstmonth+"&endmonth="+secondmonth+"&loanrequest="+loanfilter;

                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "../php/getallmonthloans.inc.php");
                    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
                    xhr.onload = () =>{
                        if(xhr.readyState == XMLHttpRequest.DONE){
                            if(xhr.status == 200){
                                let data = xhr.response;
                                content.innerHTML = data;
                            }
                        }
                    }
                    xhr.send(params)
                }else if(time.classList.contains("active") && time.classList.contains("year")){
                    timefilter = "year";
                    let year= document.querySelector(".yearInput").value;

                    let params = "year="+year+"&loanrequest="+loanfilter;

                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "../php/getallyearloans.inc.php");
                    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
                    xhr.onload = () =>{
                        if(xhr.readyState == XMLHttpRequest.DONE){
                            if(xhr.status == 200){
                                let data = xhr.response;
                                content.innerHTML = data;
                            }
                        }
                    }
                    xhr.send(params)
                }
               
            })
        }
    })
})


//Checks through the times inputs to see which is clicked and valid
times.forEach(time =>{
    
    time.addEventListener("click", ()=>{
        const activetime = document.querySelector(".time.active")
        if(activetime && time == activetime){
            if(activetime.classList.contains("day")){
                timefilter = "day";
            }else if(activetime.classList.contains("month")){
                timefilter = "month";
            }else if(activetime.classList.contains("year")){
                timefilter = "year";
            }else{
                timefilter = "alltime";
            }
        }

        filters.forEach(filter=>{
            if(filter.classList.contains("active")){
                if(filter.classList.contains("all")){
                    loanfilter = "all";
                }else if(filter.classList.contains("due")){
                    loanfilter = "due";
                }else if(filter.classList.contains("overdue")){
                    loanfilter = "overdue";
                }else if(filter.classList.contains("approved")){
                    loanfilter = "approved";
                }else{
                    loanfilter = "paid";
                }
            }
        })

        if(timefilter == "allTime"){
            timefilter = "alltime";
            let params = "loanrequest="+loanfilter;

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../php/getalltimeloans.inc.php");
            xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
            xhr.onload = () =>{
                if(xhr.readyState == XMLHttpRequest.DONE){
                    if(xhr.status == 200){
                        let data = xhr.response;
                        content.innerHTML = data;
                    }
                }
            }
            xhr.send(params)

        }else if(timefilter == "day"){
            // days seaarch
            timefilter = "day";
            let firstday= document.querySelector(".dayInput1");
            let secondday= document.querySelector(".dayInput2");

            firstday.addEventListener("input",()=>{
                firstday = firstday.value; 
                let day2 = secondday.value;
                if(secondday.value == ""){
                    day2 = firstday;
                }
                
                let params = "startday="+firstday+"&endday="+day2+"&loanrequest="+loanfilter;

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "../php/getalldayloans.inc.php");
                xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
                xhr.onload = () =>{
                    if(xhr.readyState == XMLHttpRequest.DONE){
                        if(xhr.status == 200){
                            let data = xhr.response;
                            content.innerHTML = data;
                        }
                    }
                }
                xhr.send(params)
            })
            secondday.addEventListener("input",()=>{
                secondday = secondday.value;
                let day1 = firstday.value;
                if(firstday.value == ""){
                    day1 = secondday;
                }

                let params = "startday="+day1+"&endday="+secondday+"&loanrequest="+loanfilter;

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "../php/getalldayloans.inc.php");
                xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
                xhr.onload = () =>{
                    if(xhr.readyState == XMLHttpRequest.DONE){
                        if(xhr.status == 200){
                            let data = xhr.response;
                            content.innerHTML = data;
                        }
                    }
                }
                xhr.send(params)
            })

            
        }else if(timefilter == "month"){
            // months search
            timefilter = "month";
            let firstmonth= document.querySelector(".monthInput1");
            let secondmonth= document.querySelector(".monthInput2");

            firstmonth.addEventListener("input",()=>{
                firstmonth = firstmonth.value; 
                let day2 = secondmonth.value;
                if(secondmonth.value == ""){
                    day2 = firstmonth;
                }
                
                let params = "startday="+firstmonth+"&endday="+day2+"&loanrequest="+loanfilter;

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "../php/getallmonthloans.inc.php");
                xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
                xhr.onload = () =>{
                    if(xhr.readyState == XMLHttpRequest.DONE){
                        if(xhr.status == 200){
                            let data = xhr.response;
                            content.innerHTML = data;
                        }
                    }
                }
                xhr.send(params)
            })
            secondmonth.addEventListener("input",()=>{
                secondmonth = secondmonth.value;
                let day1 = firstmonth.value;
                if(firstmonth.value == ""){
                    day1 = secondmonth;
                }

                let params = "startday="+day1+"&endday="+secondmonth+"&loanrequest="+loanfilter;

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "../php/getallmonthloans.inc.php");
                xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
                xhr.onload = () =>{
                    if(xhr.readyState == XMLHttpRequest.DONE){
                        if(xhr.status == 200){
                            let data = xhr.response;
                            content.innerHTML = data;
                        }
                    }
                }
                xhr.send(params)
            })

            
        }else if(timefilter == "year"){
            timefilter = "year";
            let year= document.querySelector(".yearInput");

            
            year.addEventListener("input",()=>{
                year = year.value;

                let params = "year="+year+"&loanrequest="+loanfilter;

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "../php/getallyearloans.inc.php");
                xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
                xhr.onload = () =>{
                    if(xhr.readyState == XMLHttpRequest.DONE){
                        if(xhr.status == 200){
                            let data = xhr.response;
                            content.innerHTML = data;
                        }
                    }
                }
                xhr.send(params)
            })
        }
    })
})