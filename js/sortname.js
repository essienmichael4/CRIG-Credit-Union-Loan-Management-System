let sortname = document.querySelector(".namesort")
let accountsname = [];

fetch("../php/savings/getallaccountslist.inc.php")
    .then(res => res.json())
    .then(data => 
        accountsname = data.map((account)=>{
            let status = account.account_status;
            let row;
            if(status=="active" || status=="new"){
                row = `<td><button onclick="disablemember({${account.id})">${account.account_status}</button></td>`;
            }else{
                row = `<td><button onclick="activatemember(${account.id})">${account.account_status}</button></td>`;
            }

            let accountrow = `<tr>
                <td>${account.mem_code}</td>
                <td>
                    <a href='?pgname=savingdetails&account_id=${account.id}'>
                    <div class='prof_img'><img src='../assets/${account.account_pic}' alt=''></div>
                    ${account.first_name} ${account.last_name} ${account.other_names}
                    </a> 
                </td>
                <td>${account.staff_id}</td>
                <td>${account.phone}</td>
                <td>${account.balance}</td>
                ${row}
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