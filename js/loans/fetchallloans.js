//// Get single loan filter buttons
let all = document.querySelector(".all")
let unapproved = document.querySelector(".unapproved")
let awaiting = document.querySelector(".awaiting")
let approved = document.querySelector(".approved")
let due = document.querySelector(".due")
let overdue = document.querySelector(".overdue")
let paid = document.querySelector(".paid")

// Get all loan filter buttons
const allfilters = document.querySelectorAll(".loanfilter");

// Get the time filter buttons
const alltimes = document.querySelectorAll(".time");

let allloansdata = [];

let timefilter = "";
let loanfilter = "";

fetch("../php/loans/getallloanslist.inc.php")
    .then(res => res.json())
    .then(data => 
        
        allloansdata = data.map((loan)=>{
            let allrow = "";
            let duedate;
            let memid = loan.member_code ? loan.member_code: loan.staff_id;
            

            if(loan.first_due_date_status != "paid"){
                duedate= loan.first_due_date;
            }else if(loan.second_due_date_status != "paid"){
                duedate= loan.first_due_date;
            }else if(loan.second_due_date != "paid"){
                duedate= loan.third_due_date;
            }else if(loan.fourth_due_date_status != "paid"){
                duedate= loan.fourth_due_date;
            }else if(loan.fifth_due_date_status != "" && loan.fifth_due_date_status != "paid"){
                duedate= loan.fifth_due_date;
            }else if(loan.sixth_due_date_status != "" && loan.sixth_due_date_status != "paid"){
                duedate= loan.sixth_due_date;
            }

            if(loan.loan_status == "pending"){
                allrow = `<td><span class='pending'>pending</span></td>`;
            }else if(loan.loan_status == "due"){
                allrow = `<td><span class='due'>due</span></td>`;
            }else if(loan.loan_status == "overdue"){
                allrow = `<td><span class='overdue'>overdue</span></td>`;
            }else if(loan.loan_status == "paid"){
                allrow = `<td><span class='paid'>paid</span></td>`;
            }
            let loanrow = `<tr>
            <td>${memid}</td>
            <td><a href='?pgname=loandetails&applicant_id=${loan.id}'>${loan.applicant_name}</a></td>
            <td>${loan.phone_number}</td>
            <td>${loan.work_place}</td>
            <td>${duedate}</td>
            <td>${loan.loan_to_be_payed}</td>
            <td>${loan.loan_arrears}</td>
            <td>${loan.member_status}</td>
            ${allrow}
        </tr>`;
            let membership = loan.member_status;
            let status = loan.loan_status;
            let apporval_status = loan.approval_status;
            let loandate = loan.day_approved;
            let name = `${loan.applicant_name}`;
            return {name, loandate, memid, status, apporval_status, membership, loanrow}
        })
    )

all.addEventListener("click", ()=>{
    allfilters.forEach(filter =>{
        const activeLink = document.querySelector(".all")
        if(activeLink !== filter && filter.classList.contains("active")){
            activeLink.classList.toggle("active");
            filter.classList.toggle("active");
        }
    })

    const activetime = document.querySelector(".time.active")
    let loan_date;
    let rows = "";

    if(activetime.classList.contains("day")){
        timefilter = "day";
    }else if(activetime.classList.contains("month")){
        timefilter = "month";
    }else if(activetime.classList.contains("year")){
        timefilter = "year";
    }else{
        timefilter = "alltime";
    }

    if(timefilter == "alltime"){
        console.log("working")
        allloansdata.forEach((account)=>{
            rows += account.loanrow
        })
        loan_data.innerHTML = rows;

    }else if(timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        
        if(firstday == "" && secondday !==""){
            allloansdata.forEach((account)=>{
                secondday = new Date(secondday)
                if(loan_date == secondday){
                    loan_date = new Date(account.loandate)
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday ==""){
            firstday = new Date(firstday)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstday){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday !==""){
            firstday = new Date(firstday)
            secondday = new Date(secondday)
            console.log(firstday)
            console.log(secondday)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstday && loan_date <= secondday){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1");
        let secondmonth= document.querySelector(".monthInput2");

        if(firstmonth == "" && secondmonth !==""){
            allloansdata.forEach((account)=>{
                secondmonth = new Date(secondmonth)
                if(loan_date == secondmonth){
                    loan_date = new Date(account.loandate)
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth ==""){
            firstmonth = new Date(firstmonth)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstmonth){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth !==""){
            firstmonth = new Date(firstmonth)
            secondmonth = new Date(secondmonth)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstmonth && loan_date <= secondmonth){
                    rows += account.loanrow
                }
            })
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput");
        year = new Date(year)
        allloansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date == year){
                rows += account.loanrow
                loan_data.innerHTML = rows;
            }
        })
    }
})

unapproved.addEventListener("click", ()=>{
    allfilters.forEach(filter =>{
        const activeLink = document.querySelector(".unapproved")
        if(activeLink !== filter && filter.classList.contains("active")){
            activeLink.classList.toggle("active");
            filter.classList.toggle("active");
        }
    })

    const activetime = document.querySelector(".time.active")
    let loan_date;
    let rows = "";
    if(activetime.classList.contains("day")){
        timefilter = "day";
    }else if(activetime.classList.contains("month")){
        timefilter = "month";
    }else if(activetime.classList.contains("year")){
        timefilter = "year";
    }else{
        timefilter = "alltime";
    }

    if(timefilter == "alltime"){
        allloansdata.forEach((account)=>{
            if(account.apporval_status == "unapproved"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;

    }else if(timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        
        if(firstday == "" && secondday !==""){
            allloansdata.forEach((account)=>{
                secondday = new Date(secondday)
                if(loan_date == secondday && account.apporval_status == "unapproved"){
                    loan_date = new Date(account.loandate)
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday ==""){
            firstday = new Date(firstday)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstday && account.apporval_status == "unapproved"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday !==""){
            firstday = new Date(firstday)
            secondday = new Date(secondday)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstday && loan_date <= secondday && account.apporval_status == "unapproved"){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1");
        let secondmonth= document.querySelector(".monthInput2");

        if(firstmonth == "" && secondmonth !==""){
            allloansdata.forEach((account)=>{
                secondmonth = new Date(secondmonth)
                if(loan_date == secondmonth &&account.apporval_status == "unapproved"){
                    loan_date = new Date(account.loandate)
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth ==""){
            firstmonth = new Date(firstmonth)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstmonth &&account.apporval_status == "unapproved"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth !==""){
            firstmonth = new Date(firstmonth)
            secondmonth = new Date(secondmonth)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstmonth && loan_date <= secondmonth &&account.apporval_status == "unapproved"){
                    rows += account.loanrow
                }
            })
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput");
        year = new Date(year)
        allloansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date == year && account.apporval_status == "unapproved"){
                rows += account.loanrow
                loan_data.innerHTML = rows;
            }
        })
    }
})

approved.addEventListener("click", ()=>{
    allfilters.forEach(filter =>{
        const activeLink = document.querySelector(".approved")
        if(activeLink !== filter && filter.classList.contains("active")){
            activeLink.classList.toggle("active");
            filter.classList.toggle("active");
        }
    })

    const activetime = document.querySelector(".time.active")
    let loan_date;
    let rows = "";
    if(activetime.classList.contains("day")){
        timefilter = "day";
    }else if(activetime.classList.contains("month")){
        timefilter = "month";
    }else if(activetime.classList.contains("year")){
        timefilter = "year";
    }else{
        timefilter = "alltime";
    }

    if(timefilter == "alltime"){
        allloansdata.forEach((account)=>{
            if(account.apporval_status == "approved"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;

    }else if(timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        
        if(firstday == "" && secondday !==""){
            allloansdata.forEach((account)=>{
                secondday = new Date(secondday)
                if(loan_date == secondday && account.apporval_status == "approved"){
                    loan_date = new Date(account.loandate)
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday ==""){
            firstday = new Date(firstday)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstday && account.apporval_status == "approved"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday !==""){
            firstday = new Date(firstday)
            secondday = new Date(secondday)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstday && loan_date <= secondday && account.apporval_status == "approved"){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1");
        let secondmonth= document.querySelector(".monthInput2");

        if(firstmonth == "" && secondmonth !==""){
            allloansdata.forEach((account)=>{
                secondmonth = new Date(secondmonth)
                if(loan_date == secondmonth &&account.apporval_status == "approved"){
                    loan_date = new Date(account.loandate)
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth ==""){
            firstmonth = new Date(firstmonth)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstmonth &&account.apporval_status == "approved"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth !==""){
            firstmonth = new Date(firstmonth)
            secondmonth = new Date(secondmonth)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstmonth && loan_date <= secondmonth &&account.apporval_status == "approved"){
                    rows += account.loanrow
                }
            })
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput");
        year = new Date(year)
        allloansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date == year && account.apporval_status == "approved"){
                rows += account.loanrow
                loan_data.innerHTML = rows;
            }
        })
    }
})

awaiting.addEventListener("click", ()=>{
    allfilters.forEach(filter =>{
        const activeLink = document.querySelector(".awaiting")
        if(activeLink !== filter && filter.classList.contains("active")){
            activeLink.classList.toggle("active");
            filter.classList.toggle("active");
        }
    })

    const activetime = document.querySelector(".time.active")
    let loan_date;
    let rows = "";
    if(activetime.classList.contains("day")){
        timefilter = "day";
    }else if(activetime.classList.contains("month")){
        timefilter = "month";
    }else if(activetime.classList.contains("year")){
        timefilter = "year";
    }else{
        timefilter = "alltime";
    }

    if(timefilter == "alltime"){
        allloansdata.forEach((account)=>{
            if(account.apporval_status == "awaiting"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;

    }else if(timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        
        if(firstday == "" && secondday !==""){
            allloansdata.forEach((account)=>{
                secondday = new Date(secondday)
                if(loan_date == secondday && account.apporval_status == "awaiting"){
                    loan_date = new Date(account.loandate)
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday ==""){
            firstday = new Date(firstday)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstday && account.apporval_status == "awaiting"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday !==""){
            firstday = new Date(firstday)
            secondday = new Date(secondday)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstday && loan_date <= secondday && account.apporval_status == "awaiting"){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1");
        let secondmonth= document.querySelector(".monthInput2");

        if(firstmonth == "" && secondmonth !==""){
            allloansdata.forEach((account)=>{
                secondmonth = new Date(secondmonth)
                if(loan_date == secondmonth &&account.apporval_status == "awaiting"){
                    loan_date = new Date(account.loandate)
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth ==""){
            firstmonth = new Date(firstmonth)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstmonth &&account.apporval_status == "awaiting"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth !==""){
            firstmonth = new Date(firstmonth)
            secondmonth = new Date(secondmonth)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstmonth && loan_date <= secondmonth &&account.apporval_status == "awaiting"){
                    rows += account.loanrow
                }
            })
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput");
        year = new Date(year)
        allloansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date == year && account.apporval_status == "awaiting"){
                rows += account.loanrow
                loan_data.innerHTML = rows;
            }
        })
    }
})

due.addEventListener("click", ()=>{
    allfilters.forEach(filter =>{
        const activeLink = document.querySelector(".due")
        if(activeLink !== filter && filter.classList.contains("active")){
            activeLink.classList.toggle("active");
            filter.classList.toggle("active");
        }
    })

    const activetime = document.querySelector(".time.active")
    let loan_date;
    let rows = "";
    if(activetime.classList.contains("day")){
        timefilter = "day";
    }else if(activetime.classList.contains("month")){
        timefilter = "month";
    }else if(activetime.classList.contains("year")){
        timefilter = "year";
    }else{
        timefilter = "alltime";
    }

    if(timefilter == "alltime"){
        allloansdata.forEach((account)=>{
            if(account.status == "due"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;

    }else if(timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        
        if(firstday == "" && secondday !==""){
            allloansdata.forEach((account)=>{
                secondday = new Date(secondday)
                if(loan_date == secondday && account.status == "due"){
                    loan_date = new Date(account.loandate)
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday ==""){
            firstday = new Date(firstday)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstday && account.status == "due"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday !==""){
            firstday = new Date(firstday)
            secondday = new Date(secondday)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstday && loan_date <= secondday && account.status == "due"){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1");
        let secondmonth= document.querySelector(".monthInput2");

        if(firstmonth == "" && secondmonth !==""){
            allloansdata.forEach((account)=>{
                secondmonth = new Date(secondmonth)
                if(loan_date == secondmonth &&account.status == "due"){
                    loan_date = new Date(account.loandate)
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth ==""){
            firstmonth = new Date(firstmonth)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstmonth &&account.status == "due"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth !==""){
            firstmonth = new Date(firstmonth)
            secondmonth = new Date(secondmonth)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstmonth && loan_date <= secondmonth &&account.status == "due"){
                    rows += account.loanrow
                }
            })
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput");
        year = new Date(year)
        allloansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date == year && account.status == "due"){
                rows += account.loanrow
                loan_data.innerHTML = rows;
            }
        })
    }
})

overdue.addEventListener("click", ()=>{
    allfilters.forEach(filter =>{
        const activeLink = document.querySelector(".overdue")
        if(activeLink !== filter && filter.classList.contains("active")){
            activeLink.classList.toggle("active");
            filter.classList.toggle("active");
        }
    })
    const activetime = document.querySelector(".time.active")
    let loan_date;
    let rows = "";
    if(activetime.classList.contains("day")){
        timefilter = "day";
    }else if(activetime.classList.contains("month")){
        timefilter = "month";
    }else if(activetime.classList.contains("year")){
        timefilter = "year";
    }else{
        timefilter = "alltime";
    }

    if(timefilter == "alltime"){
        allloansdata.forEach((account)=>{
            if(account.status == "overdue"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;

    }else if(timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        
        if(firstday == "" && secondday !==""){
            allloansdata.forEach((account)=>{
                secondday = new Date(secondday)
                if(loan_date == secondday && account.status == "overdue"){
                    loan_date = new Date(account.loandate)
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday ==""){
            firstday = new Date(firstday)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstday && account.status == "overdue"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday !==""){
            firstday = new Date(firstday)
            secondday = new Date(secondday)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstday && loan_date <= secondday && account.status == "overdue"){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1");
        let secondmonth= document.querySelector(".monthInput2");

        if(firstmonth == "" && secondmonth !==""){
            allloansdata.forEach((account)=>{
                secondmonth = new Date(secondmonth)
                if(loan_date == secondmonth &&account.status == "overdue"){
                    loan_date = new Date(account.loandate)
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth ==""){
            firstmonth = new Date(firstmonth)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstmonth &&account.status == "overdue"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth !==""){
            firstmonth = new Date(firstmonth)
            secondmonth = new Date(secondmonth)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstmonth && loan_date <= secondmonth &&account.status == "overdue"){
                    rows += account.loanrow
                }
            })
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput");
        year = new Date(year)
        allloansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date == year && account.status == "overdue"){
                rows += account.loanrow
                loan_data.innerHTML = rows;
            }
        })
    }
})

paid.addEventListener("click", ()=>{
    allfilters.forEach(filter =>{
        const activeLink = document.querySelector(".paid")
        if(activeLink !== filter && filter.classList.contains("active")){
            activeLink.classList.toggle("active");
            filter.classList.toggle("active");
        }
    })

    const activetime = document.querySelector(".time.active")
    let loan_date;
    let rows = "";
    if(activetime.classList.contains("day")){
        timefilter = "day";
    }else if(activetime.classList.contains("month")){
        timefilter = "month";
    }else if(activetime.classList.contains("year")){
        timefilter = "year";
    }else{
        timefilter = "alltime";
    }

    if(timefilter == "alltime"){
        allloansdata.forEach((account)=>{
            if(account.status == "paid"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;

    }else if(timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        
        if(firstday == "" && secondday !==""){
            allloansdata.forEach((account)=>{
                secondday = new Date(secondday)
                if(loan_date == secondday && account.status == "paid"){
                    loan_date = new Date(account.loandate)
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday ==""){
            firstday = new Date(firstday)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstday && account.status == "paid"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday !==""){
            firstday = new Date(firstday)
            secondday = new Date(secondday)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstday && loan_date <= secondday && account.status == "paid"){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1");
        let secondmonth= document.querySelector(".monthInput2");

        if(firstmonth == "" && secondmonth !==""){
            allloansdata.forEach((account)=>{
                secondmonth = new Date(secondmonth)
                if(loan_date == secondmonth &&account.status == "paid"){
                    loan_date = new Date(account.loandate)
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth ==""){
            firstmonth = new Date(firstmonth)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstmonth &&account.status == "paid"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth !==""){
            firstmonth = new Date(firstmonth)
            secondmonth = new Date(secondmonth)
            allloansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstmonth && loan_date <= secondmonth &&account.status == "paid"){
                    rows += account.loanrow
                }
            })
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput");
        year = new Date(year)
        allloansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date == year && account.status == "paid"){
                rows += account.loanrow
                loan_data.innerHTML = rows;
            }
        })
    }
})

