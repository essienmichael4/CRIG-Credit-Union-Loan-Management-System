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

applicantname.addEventListener("click", (e)=>{
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

gaurantoronename.addEventListener("click", (e)=>{
    let useraccount = e.target.value.toLowerCase();
    let gaurantoroneid = document.querySelector(".gaurantoroneid")
    let gaurantoronephone = document.querySelector(".gaurantoronephone")

    accountsname.forEach(user => {
        if(user.name.toLowerCase().includes(useraccount)){
            gaurantoroneid.value = user.memberid
            gaurantoronephone.value = user.memberphone
        }
    })
    if(gaurantoronename.value == ""){
        gaurantoroneid.value = ""
        gaurantoronephone.value = ""
    }
})

gaurantortwoname.addEventListener("click", (e)=>{
    let useraccount = e.target.value.toLowerCase();
    let gaurantortwoid = document.querySelector(".gaurantortwoid")
    let gaurantortwophone = document.querySelector(".gaurantortwophone")
    
    accountsname.forEach(user => {
        if(user.name.toLowerCase().includes(useraccount)){
            gaurantortwoid.value = user.memberid
            gaurantortwophone.value = user.memberphone
        }
    })
    if(gaurantortwoname.value == ""){
        gaurantortwoid.value = ""
        gaurantortwophone.value = ""
    }
})

gaurantorthreename.addEventListener("click", (e)=>{
    let useraccount = e.target.value.toLowerCase();
    let gaurantorthreeid = document.querySelector(".gaurantorthreeid")
    let gaurantorthreephone = document.querySelector(".gaurantorthreephone")
    accountsname.forEach(user => {
        if(user.name.toLowerCase().includes(useraccount)){
            gaurantorthreeid.value = user.memberid
            gaurantorthreephone.value = user.memberphone
        }
    })
    if(gaurantorthreename.value == ""){
        gaurantorthreeid.value = ""
        gaurantorthreephone.value = ""
    }
})
gaurantorfourname.addEventListener("click", (e)=>{
    let useraccount = e.target.value.toLowerCase();
    let gaurantorfourid = document.querySelector(".gaurantorfourid")
    let gaurantorfourphone = document.querySelector(".gaurantorfourphone")
    accountsname.forEach(user => {
        if(user.name.toLowerCase().includes(useraccount)){
            gaurantorfourid.value = user.memberid
            gaurantorfourphone.value = user.memberphone
        }
    })
    if(gaurantorfourname.value == ""){
        gaurantorfourid.value = ""
        gaurantorfourphone.value = ""
    }
})