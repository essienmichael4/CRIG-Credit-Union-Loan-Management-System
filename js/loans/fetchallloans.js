namesort.addEventListener("input", (e)=>{
    let useraccount = e.target.value.toLowerCase();
    let btnfilter;
    let rows = "";

    allfilters.forEach(filter =>{
        if(filter.classList.contains("active")){
            if(filter.classList.contains("unapproved")){
                btnfilter = "unapproved";
            }else if(filter.classList.contains("awaiting")){
                btnfilter = "awaiting";
            }else if(filter.classList.contains("approved")){
                btnfilter = "approved";
            }else if(filter.classList.contains("due")){
                btnfilter = "due";
            }else if(filter.classList.contains("overdue")){
                btnfilter = "overdue";
            }else{
                btnfilter = "all";
            }
        }else{
            btnfilter = "thisyear";
        }
    })

    alltimes.forEach(time =>{
        if(time.classList.contains("active")){
            if(time.classList.contains("day")){
                timefilter = "day";
            }else if(time.classList.contains("month")){
                timefilter = "month";
            }else if(time.classList.contains("year")){
                timefilter = "year";
            }else{
                timefilter = "alltime";
            }
        }else{
            timefilter = "thisyear";
        }
    })

    if(btnfilter == "thisyear" && timefilter == "thisyear"){
        let autoyear = new Date();
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getFullYear() == autoyear.getFullYear()){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;
    }else if(timefilter == "thisyear"){
        if(btnfilter == "unapproved"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && account.apporval_status == "unapproved" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "approved"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && account.apporval_status == "approved" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "awaiting"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && account.apporval_status == "awaiting" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "due"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && account.status == "due" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "overdue"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && account.status == "overdue" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "paid"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && account.status == "paid" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;
    }else if( timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        loansdata = allloansdata

        if(btnfilter == "unapproved"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date == secondday && account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date == firstday && account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date >= firstday && loan_date <= secondday && account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }
            loan_data.innerHTML = rows;
        }else if(btnfilter == "approved"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date == secondday && account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date == firstday && account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date >= firstday && loan_date <= secondday && account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "awaiting"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date == secondday && account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date == firstday && account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date >= firstday && loan_date <= secondday && account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "due"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date == secondday && account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date == firstday && account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date >= firstday && loan_date <= secondday && account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "overdue"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date == secondday && account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date == firstday && account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date >= firstday && loan_date <= secondday && account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "paid"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date == secondday && account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date == firstday && account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date >= firstday && loan_date <= secondday && account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1").value;
        let secondmonth= document.querySelector(".monthInput2").value;
        loansdata =allloansdata;

        if(btnfilter == "unapproved"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth() == secondmonth.getMonth() &&account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth().getMonth() == firstmonth.getMonth().getMonth() &&account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "approved"){
            if(firstmonth == "" && secondmonth !==""){
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth() == secondmonth.getMonth() &&account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth() == firstmonth.getMonth() &&account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "awaiting"){
            if(firstmonth == "" && secondmonth !==""){
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth().getMonth() == secondmonth.getMonth().getMonth() &&account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth() == firstmonth.getMonth() &&account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "due"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth() == secondmonth.getMonth() &&account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth() == firstmonth.getMonth() &&account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "overdue"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth() == secondmonth.getMonth() &&account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth() == firstmonth.getMonth() &&account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "paid"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth() == secondmonth.getMonth() &&account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth() == firstmonth.getMonth() &&account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput").value;
        loansdata =allloansdata;
        year = new Date(year)
        if(btnfilter == "unapproved"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "unapproved"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "approved"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "approved"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "awaiting"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "awaiting"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "due"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getFullYear() == year.getFullYear() && account.status == "due"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "overdue"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getFullYear() == year.getFullYear() && account.status == "overdue"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "paid"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.name.toLowerCase().includes(useraccount) || account.memid.toLowerCase().includes(useraccount) && loan_date.getFullYear() == year.getFullYear() && account.status == "paid"){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;
    }
})

casuals.addEventListener("click", ()=>{
    let input = "casual";
    let rows = "";

    // loansdata.forEach((account)=>{
    //     if(account.membership.toLowerCase() == input){
    //         rows += account.loanrow
    //      }
    // })
    // loan_data.innerHTML = rows;
    allfilters.forEach(filter =>{
        if(filter.classList.contains("active")){
            if(filter.classList.contains("unapproved")){
                btnfilter = "unapproved";
            }else if(filter.classList.contains("awaiting")){
                btnfilter = "awaiting";
            }else if(filter.classList.contains("approved")){
                btnfilter = "approved";
            }else if(filter.classList.contains("due")){
                btnfilter = "due";
            }else if(filter.classList.contains("overdue")){
                btnfilter = "overdue";
            }else{
                btnfilter = "all";
            }
        }else{
            btnfilter = "thisyear";
        }
    })

    alltimes.forEach(time =>{
        if(time.classList.contains("active")){
            if(time.classList.contains("day")){
                timefilter = "day";
            }else if(time.classList.contains("month")){
                timefilter = "month";
            }else if(time.classList.contains("year")){
                timefilter = "year";
            }else{
                timefilter = "alltime";
            }
        }else{
            timefilter = "thisyear";
        }
    })

    if(btnfilter == "thisyear" && timefilter == "thisyear"){
        let autoyear = new Date();
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(account.membership.toLowerCase() == input && loan_date.getFullYear() == autoyear.getFullYear()){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;
    }else if(timefilter == "thisyear"){
        if(btnfilter == "unapproved"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.apporval_status == "unapproved" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "approved"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.apporval_status == "approved" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "awaiting"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.apporval_status == "awaiting" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "due"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.status == "due" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "overdue"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.status == "overdue" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "paid"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.status == "paid" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;
    }else if( timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        loansdata = allloansdata

        if(btnfilter == "unapproved"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }
            loan_data.innerHTML = rows;
        }else if(btnfilter == "approved"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "awaiting"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "due"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "overdue"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "paid"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1").value;
        let secondmonth= document.querySelector(".monthInput2").value;
        loansdata =allloansdata;

        if(btnfilter == "unapproved"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == secondmonth.getMonth() &&account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth().getMonth() == firstmonth.getMonth().getMonth() &&account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "approved"){
            if(firstmonth == "" && secondmonth !==""){
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == secondmonth.getMonth() &&account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == firstmonth.getMonth() &&account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "awaiting"){
            if(firstmonth == "" && secondmonth !==""){
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth().getMonth() == secondmonth.getMonth().getMonth() &&account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == firstmonth.getMonth() &&account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "due"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == secondmonth.getMonth() &&account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == firstmonth.getMonth() &&account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "overdue"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == secondmonth.getMonth() &&account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == firstmonth.getMonth() &&account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "paid"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == secondmonth.getMonth() &&account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == firstmonth.getMonth() &&account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput").value;
        loansdata =allloansdata;
        year = new Date(year)
        if(btnfilter == "unapproved"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "unapproved"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "approved"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "approved"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "awaiting"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "awaiting"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "due"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.status == "due"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "overdue"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.status == "overdue"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "paid"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.status == "paid"){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;
    }
})

non_members.addEventListener("click", ()=>{
    let input = "non-member";
    let rows = "";

    allfilters.forEach(filter =>{
        if(filter.classList.contains("active")){
            if(filter.classList.contains("unapproved")){
                btnfilter = "unapproved";
            }else if(filter.classList.contains("awaiting")){
                btnfilter = "awaiting";
            }else if(filter.classList.contains("approved")){
                btnfilter = "approved";
            }else if(filter.classList.contains("due")){
                btnfilter = "due";
            }else if(filter.classList.contains("overdue")){
                btnfilter = "overdue";
            }else{
                btnfilter = "all";
            }
        }else{
            btnfilter = "thisyear";
        }
    })

    alltimes.forEach(time =>{
        if(time.classList.contains("active")){
            if(time.classList.contains("day")){
                timefilter = "day";
            }else if(time.classList.contains("month")){
                timefilter = "month";
            }else if(time.classList.contains("year")){
                timefilter = "year";
            }else{
                timefilter = "alltime";
            }
        }else{
            timefilter = "thisyear";
        }
    })

    if(btnfilter == "thisyear" && timefilter == "thisyear"){
        let autoyear = new Date();
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(account.membership.toLowerCase() == input && loan_date.getFullYear() == autoyear.getFullYear()){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;
    }else if(timefilter == "thisyear"){
        if(btnfilter == "unapproved"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.apporval_status == "unapproved" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "approved"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.apporval_status == "approved" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "awaiting"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.apporval_status == "awaiting" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "due"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.status == "due" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "overdue"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.status == "overdue" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "paid"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.status == "paid" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;
    }else if( timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        loansdata = allloansdata

        if(btnfilter == "unapproved"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }
            loan_data.innerHTML = rows;
        }else if(btnfilter == "approved"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "awaiting"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "due"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "overdue"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "paid"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1").value;
        let secondmonth= document.querySelector(".monthInput2").value;
        loansdata =allloansdata;

        if(btnfilter == "unapproved"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == secondmonth.getMonth() &&account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth().getMonth() == firstmonth.getMonth().getMonth() &&account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "approved"){
            if(firstmonth == "" && secondmonth !==""){
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == secondmonth.getMonth() &&account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == firstmonth.getMonth() &&account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "awaiting"){
            if(firstmonth == "" && secondmonth !==""){
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth().getMonth() == secondmonth.getMonth().getMonth() &&account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == firstmonth.getMonth() &&account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "due"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == secondmonth.getMonth() &&account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == firstmonth.getMonth() &&account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "overdue"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == secondmonth.getMonth() &&account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == firstmonth.getMonth() &&account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "paid"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == secondmonth.getMonth() &&account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == firstmonth.getMonth() &&account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput").value;
        loansdata =allloansdata;
        year = new Date(year)
        if(btnfilter == "unapproved"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "unapproved"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "approved"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "approved"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "awaiting"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "awaiting"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "due"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.status == "due"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "overdue"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.status == "overdue"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "paid"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.status == "paid"){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;
    }
})

members.addEventListener("click", ()=>{
    let input = "member";
    let rows = "";

    allfilters.forEach(filter =>{
        if(filter.classList.contains("active")){
            if(filter.classList.contains("unapproved")){
                btnfilter = "unapproved";
            }else if(filter.classList.contains("awaiting")){
                btnfilter = "awaiting";
            }else if(filter.classList.contains("approved")){
                btnfilter = "approved";
            }else if(filter.classList.contains("due")){
                btnfilter = "due";
            }else if(filter.classList.contains("overdue")){
                btnfilter = "overdue";
            }else{
                btnfilter = "all";
            }
        }else{
            btnfilter = "thisyear";
        }
    })

    alltimes.forEach(time =>{
        if(time.classList.contains("active")){
            if(time.classList.contains("day")){
                timefilter = "day";
            }else if(time.classList.contains("month")){
                timefilter = "month";
            }else if(time.classList.contains("year")){
                timefilter = "year";
            }else{
                timefilter = "alltime";
            }
        }else{
            timefilter = "thisyear";
        }
    })

    if(btnfilter == "thisyear" && timefilter == "thisyear"){
        let autoyear = new Date();
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(account.membership.toLowerCase() == input && loan_date.getFullYear() == autoyear.getFullYear()){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;
    }else if(timefilter == "thisyear"){
        if(btnfilter == "unapproved"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.apporval_status == "unapproved" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "approved"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.apporval_status == "approved" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "awaiting"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.apporval_status == "awaiting" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "due"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.status == "due" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "overdue"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.status == "overdue" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "paid"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && account.status == "paid" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;
    }else if( timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        loansdata = allloansdata

        if(btnfilter == "unapproved"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }
            loan_data.innerHTML = rows;
        }else if(btnfilter == "approved"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "awaiting"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "due"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "overdue"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "paid"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == secondday && account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date == firstday && account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date >= firstday && loan_date <= secondday && account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1").value;
        let secondmonth= document.querySelector(".monthInput2").value;
        loansdata =allloansdata;

        if(btnfilter == "unapproved"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == secondmonth.getMonth() &&account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth().getMonth() == firstmonth.getMonth().getMonth() &&account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "approved"){
            if(firstmonth == "" && secondmonth !==""){
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == secondmonth.getMonth() &&account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == firstmonth.getMonth() &&account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "awaiting"){
            if(firstmonth == "" && secondmonth !==""){
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth().getMonth() == secondmonth.getMonth().getMonth() &&account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == firstmonth.getMonth() &&account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "due"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == secondmonth.getMonth() &&account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == firstmonth.getMonth() &&account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "overdue"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == secondmonth.getMonth() &&account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == firstmonth.getMonth() &&account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "paid"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == secondmonth.getMonth() &&account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() == firstmonth.getMonth() &&account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(account.membership.toLowerCase() == input && loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput").value;
        loansdata =allloansdata;
        year = new Date(year)
        if(btnfilter == "unapproved"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "unapproved"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "approved"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "approved"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "awaiting"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "awaiting"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "due"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.status == "due"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "overdue"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.status == "overdue"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "paid"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.membership.toLowerCase() == input && loan_date.getFullYear() == year.getFullYear() && account.status == "paid"){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;
    }
})

all_loan_data.addEventListener("click", ()=>{
    let rows = "";

    allfilters.forEach(filter =>{
        if(filter.classList.contains("active")){
            if(filter.classList.contains("unapproved")){
                btnfilter = "unapproved";
            }else if(filter.classList.contains("awaiting")){
                btnfilter = "awaiting";
            }else if(filter.classList.contains("approved")){
                btnfilter = "approved";
            }else if(filter.classList.contains("due")){
                btnfilter = "due";
            }else if(filter.classList.contains("overdue")){
                btnfilter = "overdue";
            }else{
                btnfilter = "all";
            }
        }else{
            btnfilter = "thisyear";
        }
    })

    alltimes.forEach(time =>{
        if(time.classList.contains("active")){
            if(time.classList.contains("day")){
                timefilter = "day";
            }else if(time.classList.contains("month")){
                timefilter = "month";
            }else if(time.classList.contains("year")){
                timefilter = "year";
            }else{
                timefilter = "alltime";
            }
        }else{
            timefilter = "thisyear";
        }
    })

    if(btnfilter == "thisyear" && timefilter == "thisyear"){
        let autoyear = new Date();
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date.getFullYear() == autoyear.getFullYear()){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;
    }else if(timefilter == "thisyear"){
        if(btnfilter == "unapproved"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.apporval_status == "unapproved" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "approved"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.apporval_status == "approved" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "awaiting"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.apporval_status == "awaiting" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "due"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.status == "due" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "overdue"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.status == "overdue" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "paid"){
            let autoyear = new Date();
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(account.status == "paid" && loan_date.getFullYear() == autoyear.getFullYear()){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;
    }else if( timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        loansdata = allloansdata

        if(btnfilter == "unapproved"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(loan_date == secondday && account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date == firstday && account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date >= firstday && loan_date <= secondday && account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }
            loan_data.innerHTML = rows;
        }else if(btnfilter == "approved"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(loan_date == secondday && account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date == firstday && account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date >= firstday && loan_date <= secondday && account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "awaiting"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(loan_date == secondday && account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date == firstday && account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date >= firstday && loan_date <= secondday && account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "due"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(loan_date == secondday && account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date == firstday && account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date >= firstday && loan_date <= secondday && account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "overdue"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(loan_date == secondday && account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date == firstday && account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date >= firstday && loan_date <= secondday && account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "paid"){
            if(firstday == "" && secondday !==""){
                loansdata.forEach((account)=>{
                    secondday = new Date(secondday)
                    loan_date = new Date(account.loandate)
                    if(loan_date == secondday && account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday ==""){
                firstday = new Date(firstday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date == firstday && account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstday !== "" && secondday !==""){
                firstday = new Date(firstday)
                secondday = new Date(secondday)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date >= firstday && loan_date <= secondday && account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1").value;
        let secondmonth= document.querySelector(".monthInput2").value;
        loansdata =allloansdata;

        if(btnfilter == "unapproved"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth() == secondmonth.getMonth() &&account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth().getMonth() == firstmonth.getMonth().getMonth() &&account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "unapproved"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "approved"){
            if(firstmonth == "" && secondmonth !==""){
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth() == secondmonth.getMonth() &&account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth() == firstmonth.getMonth() &&account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "approved"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "awaiting"){
            if(firstmonth == "" && secondmonth !==""){
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth().getMonth() == secondmonth.getMonth().getMonth() &&account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth() == firstmonth.getMonth() &&account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "awaiting"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "due"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth() == secondmonth.getMonth() &&account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth() == firstmonth.getMonth() &&account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "due"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "overdue"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth() == secondmonth.getMonth() &&account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth() == firstmonth.getMonth() &&account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "overdue"){
                        rows += account.loanrow
                    }
                })
            }
        }else if(btnfilter == "paid"){
            if(firstmonth == "" && secondmonth !==""){
                loansdata.forEach((account)=>{
                    secondmonth = new Date(secondmonth)
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth() == secondmonth.getMonth() &&account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth ==""){
                firstmonth = new Date(firstmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth() == firstmonth.getMonth() &&account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }else if(firstmonth !== "" && secondmonth !==""){
                firstmonth = new Date(firstmonth)
                secondmonth = new Date(secondmonth)
                loansdata.forEach((account)=>{
                    loan_date = new Date(account.loandate)
                    if(loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "paid"){
                        rows += account.loanrow
                    }
                })
            }
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput").value;
        loansdata =allloansdata;
        year = new Date(year)
        if(btnfilter == "unapproved"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "unapproved"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "approved"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "approved"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "awaiting"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "awaiting"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "due"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getFullYear() == year.getFullYear() && account.status == "due"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "overdue"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getFullYear() == year.getFullYear() && account.status == "overdue"){
                    rows += account.loanrow
                }
            })
        }else if(btnfilter == "paid"){
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getFullYear() == year.getFullYear() && account.status == "paid"){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;
    }
})

all.addEventListener("click", ()=>{
    allfilters.forEach(filter =>{
        const activeLink = document.querySelector(".all")
        if(activeLink !== filter && filter.classList.contains("active")){
            activeLink.classList.toggle("active");
            filter.classList.toggle("active");
        }else{
            activeLink.classList.toggle("active");
        }
    })


    alltimes.forEach(time =>{
        if(time.classList.contains("active")){
            if(time.classList.contains("day")){
                timefilter = "day";
            }else if(time.classList.contains("month")){
                timefilter = "month";
            }else if(time.classList.contains("year")){
                timefilter = "year";
            }else{
                timefilter = "alltime";
            }
        }else{
            timefilter = "thisyear";
        }
    })

    // const activetime = document.querySelector(".time.active")
    let loan_date;
    let rows = "";

    // if(activetime.classList.contains("day")){
    //     timefilter = "day";
    // }else if(activetime.classList.contains("month")){
    //     timefilter = "month";
    // }else if(activetime.classList.contains("year")){
    //     timefilter = "year";
    // }else{
    //     timefilter = "alltime";
    // }

    if(timefilter == "alltime"){
        loansdata =allloansdata;
        loansdata.forEach((account)=>{
            rows += account.loanrow
        })
        loan_data.innerHTML = rows;

    }else if(timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        loansdata =allloansdata;

        if(firstday == "" && secondday !==""){
            
            loansdata.forEach((account)=>{
                secondday = new Date(secondday)
                loan_date = new Date(account.loandate)
                if(loan_date == secondday){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday ==""){
            firstday = new Date(firstday)
            loansdata.forEach((account)=>{
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
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstday && loan_date <= secondday){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1").value;
        let secondmonth= document.querySelector(".monthInput2").value;
        loansdata =allloansdata;

        if(firstmonth == "" && secondmonth !==""){
            secondmonth = new Date(secondmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() == secondmonth.getMonth()){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth ==""){
            firstmonth = new Date(firstmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() == firstmonth.getMonth()){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth !==""){
            firstmonth = new Date(firstmonth)
            secondmonth = new Date(secondmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth()){
                    rows += account.loanrow
                }
            })
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput").value;
        loansdata =allloansdata;
        year = new Date(year)
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date.getFullYear() == year.getFullYear()){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;
    }else{
        let autoyear = new Date();
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date.getFullYear() == autoyear.getFullYear()){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;
    }
})

unapproved.addEventListener("click", ()=>{
    allfilters.forEach(filter =>{
        const activeLink = document.querySelector(".unapproved")
        if(activeLink !== filter && filter.classList.contains("active")){
            activeLink.classList.toggle("active");
            filter.classList.toggle("active");
        }else{
            activeLink.classList.toggle("active");
        }
    })

    alltimes.forEach(time =>{
        if(time.classList.contains("active")){
            if(time.classList.contains("day")){
                timefilter = "day";
            }else if(time.classList.contains("month")){
                timefilter = "month";
            }else if(time.classList.contains("year")){
                timefilter = "year";
            }else{
                timefilter = "alltime";
            }
        }else{
            timefilter = "thisyear";
        }
    })
    let loan_date;
    let rows = "";

    if(timefilter == "alltime"){
        loansdata = allloansdata
        loansdata.forEach((account)=>{
            if(account.apporval_status == "unapproved"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;

    }else if(timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        loansdata = allloansdata
        
        if(firstday == "" && secondday !==""){
            loansdata.forEach((account)=>{
                secondday = new Date(secondday)
                loan_date = new Date(account.loandate)
                if(loan_date == secondday && account.apporval_status == "unapproved"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday ==""){
            firstday = new Date(firstday)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstday && account.apporval_status == "unapproved"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday !==""){
            firstday = new Date(firstday)
            secondday = new Date(secondday)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstday && loan_date <= secondday && account.apporval_status == "unapproved"){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1").value;
        let secondmonth= document.querySelector(".monthInput2").value;
        loansdata = allloansdata

        if(firstmonth == "" && secondmonth !==""){
            loansdata.forEach((account)=>{
                secondmonth = new Date(secondmonth)
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() == secondmonth.getMonth() &&account.apporval_status == "unapproved"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth ==""){
            firstmonth = new Date(firstmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth().getMonth() == firstmonth.getMonth().getMonth() &&account.apporval_status == "unapproved"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth !==""){
            firstmonth = new Date(firstmonth)
            secondmonth = new Date(secondmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "unapproved"){
                    rows += account.loanrow
                }
            })
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput").value;
        loansdata = allloansdata
        year = new Date(year)
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "unapproved"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;
    }else{
        let autoyear = new Date();
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date.getFullYear() == autoyear.getFullYear() && account.apporval_status == "unapproved") rows += account.loanrow
        })
        loan_data.innerHTML = rows;
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

    alltimes.forEach(time =>{
        if(time.classList.contains("active")){
            if(time.classList.contains("day")){
                timefilter = "day";
            }else if(time.classList.contains("month")){
                timefilter = "month";
            }else if(time.classList.contains("year")){
                timefilter = "year";
            }else{
                timefilter = "alltime";
            }
        }else{
            timefilter = "thisyear";
        }
    })

    let loan_date;
    let rows = "";

    if(timefilter == "alltime"){
        loansdata = allloansdata
        loansdata.forEach((account)=>{
            if(account.apporval_status == "approved"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;

    }else if(timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        loansdata = allloansdata
        
        if(firstday == "" && secondday !==""){
            loansdata.forEach((account)=>{
                secondday = new Date(secondday)
                loan_date = new Date(account.loandate)
                if(loan_date == secondday && account.apporval_status == "approved"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday ==""){
            firstday = new Date(firstday)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstday && account.apporval_status == "approved"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday !==""){
            firstday = new Date(firstday)
            secondday = new Date(secondday)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstday && loan_date <= secondday && account.apporval_status == "approved"){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1").value;
        let secondmonth= document.querySelector(".monthInput2").value;
        loansdata = allloansdata

        if(firstmonth == "" && secondmonth !==""){
            secondmonth = new Date(secondmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() == secondmonth.getMonth() &&account.apporval_status == "approved"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth ==""){
            firstmonth = new Date(firstmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() == firstmonth.getMonth() &&account.apporval_status == "approved"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth !==""){
            firstmonth = new Date(firstmonth)
            secondmonth = new Date(secondmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "approved"){
                    rows += account.loanrow
                }
            })
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput").value;
        loansdata = allloansdata

        year = new Date(year)
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "approved"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;
    }else{
        let autoyear = new Date();
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date.getFullYear() == autoyear.getFullYear() && account.apporval_status == "approved") rows += account.loanrow
        })
        loan_data.innerHTML = rows;
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

    alltimes.forEach(time =>{
        if(time.classList.contains("active")){
            if(time.classList.contains("day")){
                timefilter = "day";
            }else if(time.classList.contains("month")){
                timefilter = "month";
            }else if(time.classList.contains("year")){
                timefilter = "year";
            }else{
                timefilter = "alltime";
            }
        }else{
            timefilter = "thisyear";
        }
    })

    let loan_date;
    let rows = "";

    if(timefilter == "alltime"){
        loansdata = allloansdata
        loansdata.forEach((account)=>{
            if(account.apporval_status == "awaiting"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;

    }else if(timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        loansdata = allloansdata
        
        if(firstday == "" && secondday !==""){
            loansdata.forEach((account)=>{
                secondday = new Date(secondday)
                loan_date = new Date(account.loandate)
                if(loan_date == secondday && account.apporval_status == "awaiting"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday ==""){
            firstday = new Date(firstday)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstday && account.apporval_status == "awaiting"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday !==""){
            firstday = new Date(firstday)
            secondday = new Date(secondday)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstday && loan_date <= secondday && account.apporval_status == "awaiting"){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1").value;
        let secondmonth= document.querySelector(".monthInput2").value;
        loansdata = allloansdata

        if(firstmonth == "" && secondmonth !==""){
            secondmonth = new Date(secondmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth().getMonth() == secondmonth.getMonth().getMonth() &&account.apporval_status == "awaiting"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth ==""){
            firstmonth = new Date(firstmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() == firstmonth.getMonth() &&account.apporval_status == "awaiting"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth !==""){
            firstmonth = new Date(firstmonth)
            secondmonth = new Date(secondmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.apporval_status == "awaiting"){
                    rows += account.loanrow
                }
            })
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput").value;
        loansdata = allloansdata
        year = new Date(year)
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date.getFullYear() == year.getFullYear() && account.apporval_status == "awaiting"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;
    }else{
        let autoyear = new Date();
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date.getFullYear() == autoyear.getFullYear() && account.apporval_status == "awaiting") rows += account.loanrow
        })
        loan_data.innerHTML = rows;
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


    alltimes.forEach(time =>{
        if(time.classList.contains("active")){
            if(time.classList.contains("day")){
                timefilter = "day";
            }else if(time.classList.contains("month")){
                timefilter = "month";
            }else if(time.classList.contains("year")){
                timefilter = "year";
            }else{
                timefilter = "alltime";
            }
        }else{
            timefilter = "thisyear";
        }
    })

    let loan_date;
    let rows = "";

    if(timefilter == "alltime"){
        loansdata = allloansdata
        loansdata.forEach((account)=>{
            if(account.status == "due"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;

    }else if(timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        loansdata = allloansdata
        
        if(firstday == "" && secondday !==""){
            loansdata.forEach((account)=>{
                secondday = new Date(secondday)
                loan_date = new Date(account.loandate)
                if(loan_date == secondday && account.status == "due"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday ==""){
            firstday = new Date(firstday)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstday && account.status == "due"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday !==""){
            firstday = new Date(firstday)
            secondday = new Date(secondday)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date >= firstday && loan_date <= secondday && account.status == "due"){
                    rows += account.loanrow
                }
            })
        }
        loan_data.innerHTML = rows;

    }else if(timefilter == "month"){
        let firstmonth= document.querySelector(".monthInput1").value;
        let secondmonth= document.querySelector(".monthInput2").value;
        loansdata = allloansdata

        if(firstmonth == "" && secondmonth !==""){
            loansdata.forEach((account)=>{
                secondmonth = new Date(secondmonth)
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() == secondmonth.getMonth() &&account.status == "due"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth ==""){
            firstmonth = new Date(firstmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() == firstmonth.getMonth() &&account.status == "due"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth !==""){
            firstmonth = new Date(firstmonth)
            secondmonth = new Date(secondmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "due"){
                    rows += account.loanrow
                }
            })
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput").value;
        loansdata = allloansdata
        year = new Date(year)
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date.getFullYear() == year.getFullYear() && account.status == "due"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;
    }else{
        let autoyear = new Date();
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date.getFullYear() == autoyear.getFullYear() && account.status == "due") rows += account.loanrow
        })
        loan_data.innerHTML = rows;
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
    
    alltimes.forEach(time =>{
        if(time.classList.contains("active")){
            if(time.classList.contains("day")){
                timefilter = "day";
            }else if(time.classList.contains("month")){
                timefilter = "month";
            }else if(time.classList.contains("year")){
                timefilter = "year";
            }else{
                timefilter = "alltime";
            }
        }else{
            timefilter = "thisyear";
        }
    })

    let loan_date;
    let rows = "";

    if(timefilter == "alltime"){
        loansdata = allloansdata
        loansdata.forEach((account)=>{
            if(account.status == "overdue"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;

    }else if(timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        loansdata = allloansdata
        
        if(firstday == "" && secondday !==""){
            loansdata.forEach((account)=>{
                secondday = new Date(secondday)
                loan_date = new Date(account.loandate)
                if(loan_date == secondday && account.status == "overdue"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday ==""){
            firstday = new Date(firstday)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstday && account.status == "overdue"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday !==""){
            firstday = new Date(firstday)
            secondday = new Date(secondday)
            loansdata.forEach((account)=>{
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
        loansdata = allloansdata

        if(firstmonth == "" && secondmonth !==""){
            loansdata.forEach((account)=>{
                secondmonth = new Date(secondmonth)
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() == secondmonth.getMonth() &&account.status == "overdue"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth ==""){
            firstmonth = new Date(firstmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() == firstmonth.getMonth() &&account.status == "overdue"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth !==""){
            firstmonth = new Date(firstmonth)
            secondmonth = new Date(secondmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "overdue"){
                    rows += account.loanrow
                }
            })
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput").value;
        loansdata = allloansdata
        year = new Date(year)
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date.getFullYear() == year.getFullYear() && account.status == "overdue"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;
    }else{
        let autoyear = new Date();
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date.getFullYear() == autoyear.getFullYear() && account.status == "overdue") rows += account.loanrow
        })
        loan_data.innerHTML = rows;
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

    alltimes.forEach(time =>{
        if(time.classList.contains("active")){
            if(time.classList.contains("day")){
                timefilter = "day";
            }else if(time.classList.contains("month")){
                timefilter = "month";
            }else if(time.classList.contains("year")){
                timefilter = "year";
            }else{
                timefilter = "alltime";
            }
        }else{
            timefilter = "thisyear";
        }
    })

    let loan_date;
    let rows = "";

    if(timefilter == "alltime"){
        loansdata = allloansdata
        loansdata.forEach((account)=>{
            if(account.status == "paid"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;

    }else if(timefilter == "day"){
        let firstday= document.querySelector(".dayInputfirst").value;
        let secondday= document.querySelector(".dayInputsecond").value;
        loansdata = allloansdata
        
        if(firstday == "" && secondday !==""){
            loansdata.forEach((account)=>{
                secondday = new Date(secondday)
                loan_date = new Date(account.loandate)
                if(loan_date == secondday && account.status == "paid"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday ==""){
            firstday = new Date(firstday)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date == firstday && account.status == "paid"){
                    rows += account.loanrow
                }
            })
        }else if(firstday !== "" && secondday !==""){
            firstday = new Date(firstday)
            secondday = new Date(secondday)
            loansdata.forEach((account)=>{
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
        loansdata = allloansdata

        if(firstmonth == "" && secondmonth !==""){
            loansdata.forEach((account)=>{
                secondmonth = new Date(secondmonth)
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() == secondmonth.getMonth() &&account.status == "paid"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth ==""){
            firstmonth = new Date(firstmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() == firstmonth.getMonth() &&account.status == "paid"){
                    rows += account.loanrow
                }
            })
        }else if(firstmonth !== "" && secondmonth !==""){
            firstmonth = new Date(firstmonth)
            secondmonth = new Date(secondmonth)
            loansdata.forEach((account)=>{
                loan_date = new Date(account.loandate)
                if(loan_date.getMonth() >= firstmonth.getMonth() && loan_date.getMonth() <= secondmonth.getMonth() &&account.status == "paid"){
                    rows += account.loanrow
                }
            })
        }

        loan_data.innerHTML = rows;

    }else if(timefilter == "year"){
        let year= document.querySelector(".yearInput").value;
        loansdata = allloansdata
        year = new Date(year)
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date.getFullYear() == year.getFullYear() && account.status == "paid"){
                rows += account.loanrow
            }
        })
        loan_data.innerHTML = rows;
    }else{
        let autoyear = new Date();
        loansdata.forEach((account)=>{
            loan_date = new Date(account.loandate)
            if(loan_date.getFullYear() == autoyear.getFullYear() && account.status == "paid") rows += account.loanrow
        })
        loan_data.innerHTML = rows;
    }
})

