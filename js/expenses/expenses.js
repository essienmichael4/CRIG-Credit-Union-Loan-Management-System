let expense = document.querySelector(".expense");

let total_expense = 0;

fetch("../php/expenses/fetchexpense.inc.php")
    .then(res => res.json())
    .then(data => 
        
        data.map((expenses)=>{                
            total_expense += parseFloat(expenses.item_price);

            console.log(expenses)
            console.log(total_expense)
            expense.innerHTML = `<span>GH¢</span> ${total_expense.toLocaleString()}`
        })
    )