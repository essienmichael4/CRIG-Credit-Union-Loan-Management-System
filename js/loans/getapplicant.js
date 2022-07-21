let accountsname = [];
let applicantname = document.querySelector(".applicant_name")
let accounts = document.querySelector("#accounts")
let savingsaccountfirst = document.querySelector("#savingsaccountfirst")
let savingsaccountsecond = document.querySelector("#savingsaccountsecond")
let savingsaccountthird = document.querySelector("#savingsaccountthird")
let savingsaccountfourth = document.querySelector("#savingsaccountfourth")
let gaurantoronename = document.querySelector(".gaurantoronename")
let gaurantortwoname = document.querySelector(".gaurantortwoname")
let gaurantorthreename = document.querySelector(".gaurantorthreename")
let gaurantorfourname = document.querySelector(".gaurantorfourname")

fetch("./../php/savings/getallaccountslist.inc.php")
    .then(res => res.json())
    .then(data => 
        accountsname = data.map((account)=>{
            let name = `${account.first_name} ${account.last_name} ${account.other_names}`;
            let memberid = account.mem_code;
            let memberphone = account.phone;
            let memberwork = account.place_of_work;
            let memberstaffid = account.staff_id;
            accounts.innerHTML += `<option>${name}</option>`;
            savingsaccountfirst.innerHTML += `<option>${name}</option>`;
            savingsaccountsecond.innerHTML += `<option>${name}</option>`;
            savingsaccountthird.innerHTML += `<option>${name}</option>`;
            savingsaccountfourth.innerHTML += `<option>${name}</option>`;
            return {name, memberid, memberphone, memberwork, memberstaffid}
        })
    )

applicantname.addEventListener("input", (e)=>{
    let useraccount = e.target.value.toLowerCase();
    let applicantsearch = document.querySelector(".applicant-search")
    let phone = document.querySelector(".phone")
    let work = document.querySelector(".work")
    let staff = document.querySelector(".staff")
    accountsname.forEach(user => {
        if(user.name.toLowerCase().includes(useraccount)){
           applicantsearch.value = user.memberid
           phone.value = user.memberphone
           work.value = user.memberwork
           staff.value = user.memberstaffid
        }
    })
    if(applicantname.value == ""){
        applicantsearch.value = ""
    }
})

gaurantoronename.addEventListener("input", (e)=>{
    let useraccount = e.target.value.toLowerCase();
    let gaurantoroneid = document.querySelector(".gaurantoroneid")
    accountsname.forEach(user => {
        if(user.name.toLowerCase().includes(useraccount)){
            gaurantoroneid.value = user.memberid
        }
    })
    if(gaurantoronename.value == ""){
        gaurantoroneid.value = ""
    }
})

gaurantortwoname.addEventListener("input", (e)=>{
    let useraccount = e.target.value.toLowerCase();
    let gaurantortwoid = document.querySelector(".gaurantortwoid")
    accountsname.forEach(user => {
        if(user.name.toLowerCase().includes(useraccount)){
            gaurantortwoid.value = user.memberid
        }
    })
    if(gaurantortwoname.value == ""){
        gaurantortwoid.value = ""
    }
})

gaurantorthreename.addEventListener("input", (e)=>{
    let useraccount = e.target.value.toLowerCase();
    let gaurantorthreeid = document.querySelector(".gaurantorthreeid")
    accountsname.forEach(user => {
        if(user.name.toLowerCase().includes(useraccount)){
            gaurantorthreeid.value = user.memberid
        }
    })
    if(gaurantorthreename.value == ""){
        gaurantorthreeid.value = ""
    }
})
gaurantorfourname.addEventListener("input", (e)=>{
    let useraccount = e.target.value.toLowerCase();
    let gaurantorfourid = document.querySelector(".gaurantorfourid")
    accountsname.forEach(user => {
        if(user.name.toLowerCase().includes(useraccount)){
            gaurantorfourid.value = user.memberid
        }
    })
    if(gaurantorfourname.value == ""){
        gaurantorfourid.value = ""
    }
})