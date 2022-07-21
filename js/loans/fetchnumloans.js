let all_loans = document.querySelector(".all_loans");
let due_loans = document.querySelector(".due_loans");
let awaiting_approval = document.querySelector(".awaiting_approval");
let overdue_loans = document.querySelector(".overdue_loans");
let paidLoans = document.querySelector(".paid_loan");
let loanInterest = document.querySelector(".loan_interest")

let loans = 0;
let due = 0;
let awaiting = 0;
let overdue = 0;
let paid = 0;
let interest = 0;

fetch("../php/loans/getloanslist.inc.php")
    .then(res => res.json())
    .then(data => 
        
        data.map((account)=>{
            loans +=1;

            if(account.loan_status == "due"){
                due += 1;
            }
            if(account.approval_status == "awaiting approval"){
                awaiting += 1;
                loans -=1;
            }
            if(account.loan_status == "overdue"){
                overdue += 1;
            }
            if(account.loan_status == "paid"){
                paid += 1;
            }
                
            interest += parseFloat(account.loan_interest);
            console.log(account.applicant_name)

            all_loans.innerHTML = `${loans} <span>loans</span>`
            due_loans.innerHTML = `${due} <span>due</span>`
            awaiting_approval.innerHTML = `${awaiting} <span>loans awaiting approval</span>`
            paidLoans.innerHTML = `${paid} <span>loans paid</span>`
            overdue_loans.innerHTML = `${overdue} <span>loans overdue</span>`
            loanInterest.innerHTML = `<span>GH¢</span> ${interest.toLocaleString()}`
        })
    )