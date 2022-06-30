let sortname = document.querySelector(".namesort")
let accountsname = [];

fetch("../php/savings/getallaccountslist.inc.php")
    .then(res => res.json())
    .then(data => 
        accountsname = data.map((account)=>{
            let accountrow = `<tr>
                <td>${account.mem_code}</td>
                <td><a href='?pgname=savingdetails&account_id=${account.id}'>${account.first_name} ${account.last_name} ${account.other_names}</a> </td>
                <td>${account.staff_id}</td>
                <td>${account.phone}</td>
                <td>${account.balance}</td>
                <td>${account.account_status}</td>
            </tr>`

            let name = `${account.first_name} ${account.last_name} ${account.other_names}`;
            let memberid = account.mem_code;
            return {name, memberid, accountrow}
        })
    )
    
    
sortname.addEventListener("input", (e)=>{
    let useraccount = e.target.value.toLowerCase();
    let accounttable = document.querySelector(".accounttable")
    let rows = "";
    
    accountsname.forEach(user => {
        if(user.name.toLowerCase().includes(useraccount) || user.memberid.toLowerCase().includes(useraccount)){
           rows += user.accountrow
        }
    })
    accounttable.innerHTML = rows;
})