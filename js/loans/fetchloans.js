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

let timefilter = "";
let loanfilter = "";


let loan_data = document.querySelector(".loan_data")
let namesort = document.querySelector(".namesort")
let casuals = document.querySelector(".casuals")
let non_members = document.querySelector(".non_members")
let members = document.querySelector(".members")
let all_loan_data = document.querySelector(".all_loan_data")
let loansdata = [];
let allloansdata = [];

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
            let status = loan.loan_status;
            let apporval_status = loan.approval_status;
            let loandate = loan.day_approved;
            let name = `${loan.applicant_name}`;
            return {name, loandate, memid, status, apporval_status, membership, loanrow}
        })
    )

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