let allAccounts = document.querySelector(".all_accounts");
let newAccountsCreated = document.querySelector(".new_accounts");
let new_members = document.querySelector(".new_members");
let registration = document.querySelector(".registration_fee")

let all = 0;
let newaccounts = 0;
let registrationFee = 0;
let accountrow = ""
fetch("../php/savings/getallaccountslist.inc.php")
    .then(res => res.json())
    .then(data => 
        
        data.map((account)=>{
            
            if(account.account_status == "active" || account.account_status == "new"){
                all = all + 1;
            }
                
            registrationFee = registrationFee + parseFloat(account.registration_fee)
            
            if(account.account_status == "new"){
                newaccounts = newaccounts + 1;
                accountrow = `<tr>
                <td><a href='?pgname=savingdetails&account_id=${account.id}'>${account.first_name} ${account.last_name} ${account.other_names}</a> </td>
                    <td>${account.mem_code}</td>
                    <td>${account.balance}</td>
                </tr>`
            }

            

            allAccounts.innerHTML = `${all}<span>accounts</span>`
            newAccountsCreated.innerHTML = `${newaccounts} <span>members</span>`
            registration.innerHTML = `<span>GH¢</span> ${registrationFee.toLocaleString()}`
            new_members.innerHTML += accountrow
        })
    )