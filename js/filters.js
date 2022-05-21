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
                    let secondday= document.querySelector(".dayInputs").value;

                    if(firstday == "" && secondday !==""){
                        firstday=secondday;
                    }else if(firstday !== "" && secondday ==""){
                        secondday = firstday;
                    }

                    let params = "startday="+firstday+"&endday="+secondday+"&loanreqest="+loanfilter;

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
                    let secondmonth= document.querySelector(".monthInputs").value;

                    if(firstmonth == "" && secondmonth !==""){
                        firstmonth=secondmonth;
                    }else if(firstmonth !== "" && secondmonth ==""){
                        secondmonth = firstmonth;
                    }

                    let params = "startmonth="+firstmonth+"&endmonth="+secondmonth+"&loanreqest="+loanfilter;

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

                    let params = "year="+year+"&loanreqest="+loanfilter;

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
        const activeLink = document.querySelector(".loanfilter.active")
        if(activeLink && time !== activeLink){
            activeLink.classList.toggle("active");
            time.classList.toggle("active");
            if(time.classList.contains("all")){
                loantime = "all";
                
            }else if(time.classList.contains("approved")){
                loantime = "approved";
            }else if(time.classList.contains("due")){
                loantime = "due";
            }else if(time.classList.contains("overdue")){
                loantime = "overdue";
            }else{
                loantime = "paid";
            }

            /*Checks through the times button to see which is clicked and active and make
            a post request to retrieve the corresponding data from the database using ajax*/
            filters.forEach(filter =>{
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
                    let secondday= document.querySelector(".dayInputs").value;

                    if(firstday == "" && secondday !==""){
                        firstday=secondday;
                    }else if(firstday !== "" && secondday ==""){
                        secondday = firstday;
                    }

                    let params = "startday="+firstday+"&endday="+secondday+"&loanreqest="+loanfilter;

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
                    let secondmonth= document.querySelector(".monthInputs").value;

                    if(firstmonth == "" && secondmonth !==""){
                        firstmonth=secondmonth;
                    }else if(firstmonth !== "" && secondmonth ==""){
                        secondmonth = firstmonth;
                    }

                    let params = "startmonth="+firstmonth+"&endmonth="+secondmonth+"&loanreqest="+loanfilter;

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

                    let params = "year="+year+"&loanreqest="+loanfilter;

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