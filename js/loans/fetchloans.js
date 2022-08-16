let loan_data = document.querySelector(".loan_data")
let namesort = document.querySelector(".namesort")
let casuals = document.querySelector(".casuals")
let non_members = document.querySelector(".non_members")
let members = document.querySelector(".members")
let all_loan_data = document.querySelector(".all_loan_data")
let loansdata = [];

fetch("../php/loans/getloanslist.inc.php")
    .then(res => res.json())
    .then(data => 
        
        loansdata = data.map((loan)=>{
            let row = "";
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
                row = `<td><span class='pending'>pending</span></td>`;
            }else if(loan.loan_status == "due"){
                row = `<td><span class='due'>due</span></td>`;
            }else if(loan.loan_status == "overdue"){
                row = `<td><span class='overdue'>overdue</span></td>`;
            }else if(loan.loan_status == "paid"){
                row = `<td><span class='paid'>paid</span></td>`;
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
            ${row}
        </tr>`;
            // loan_data.innerHTML += loanrow;
            let membership = loan.member_status;
            let name = `${loan.applicant_name}`;
            return {name, memid, membership, loanrow}
        })
    )


    namesort.addEventListener("input", (e)=>{
        let useraccount = e.target.value.toLowerCase();
        let rows = "";

        loansdata.forEach((account)=>{
            if(account.name.toLowerCase().includes(useraccount)){
                rows += account.loanrow
             }
        })
        loan_data.innerHTML = rows;
    })
    
    casuals.addEventListener("click", ()=>{
        let input = "casual";
        let rows = "";

        loansdata.forEach((account)=>{
            if(account.membership.toLowerCase() == input){
                rows += account.loanrow
             }
        })
        loan_data.innerHTML = rows;
    })
    
    non_members.addEventListener("click", ()=>{
        let input = "non-member";
        let rows = "";

        loansdata.forEach((account)=>{
            if(account.membership.toLowerCase() == input){
                rows += account.loanrow
             }
        })
        loan_data.innerHTML = rows;
    })
    
    members.addEventListener("click", ()=>{
        let input = "member";
        let rows = "";

        loansdata.forEach((account)=>{
            if(account.membership.toLowerCase() == input){
                rows += account.loanrow
             }
        })
        loan_data.innerHTML = rows;
    })
    
    all_loan_data.addEventListener("click", ()=>{
        let rows = "";

        loansdata.forEach((account)=>{
                rows += account.loanrow
        })
        loan_data.innerHTML = rows;
    })