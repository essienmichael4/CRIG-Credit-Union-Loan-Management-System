let membersearch = document.querySelector('.search-applicant');
let staffsearch = document.querySelector('.search-staff');
let gaurantoronesearch = document.querySelector('.gaurantoronesearch');
let gaurantortwosearch = document.querySelector('.gaurantortwosearch');
let gaurantorthreesearch = document.querySelector('.gaurantorthreesearch');
let gaurantorfoursearch = document.querySelector('.gaurantorfoursearch');

membersearch.addEventListener("click",()=>{
    let data;
    let memcode = document.querySelector(".applicant-search").value;

    if(memcode == ""){
        return;
    }

    let params = "memcode="+memcode;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/loans/getapplicantinfobymemberid.inc.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                data = xhr.response;
                
                if(data == "false"){
                    let toast = document.querySelector(".toast_container");
                    let toastmsg = document.querySelector(".toast_container .toast .error");
                    toastmsg.textContent = "Member code incorrect or member doesn't exist";
                    toast.classList.add("active");
                    return;
                }

                data = JSON.parse(data);
                let firstname = data.first_name;
                let staff_number = data.staff_id;
                let lastname = data.last_name;
                let othernames = data.other_names;
                let phone = data.phone;
                let work = data.place_of_work;

                document.querySelector(".first_name").value = firstname;
                document.querySelector(".last_name").value = lastname;
                document.querySelector(".staff").value = staff_number;
                document.querySelector(".other_names").value = othernames;
                document.querySelector(".phone").value = phone;
                document.querySelector(".work").value = work;
            }
        }
    }
    xhr.send(params)
})

staffsearch.addEventListener("click",()=>{
    let data;
    let memcode = document.querySelector(".staff").value;

    if(memcode == ""){
        return;
    }

    let params = "memcode="+memcode;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/loans/getapplicantinfobystaffid.inc.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                data = xhr.response;

                if(data === "false"){
                    let toast = document.querySelector(".toast_container");
                    let toastmsg = document.querySelector(".toast_container .toast .error");
                    toastmsg.textContent = "Staff number is incorrect or staff does not seem to exist";
                    toast.classList.add("active");
                    return;
                }

                data = JSON.parse(data);
                let firstname = data.first_name;
                let mem_code = data.mem_code;
                let lastname = data.last_name;
                let othernames = data.other_names;
                let phone = data.phone;
                let work = data.place_of_work;

                document.querySelector(".first_name").value = firstname;
                document.querySelector(".last_name").value = lastname;
                document.querySelector(".applicant-search").value = mem_code;
                document.querySelector(".other_names").value = othernames;
                document.querySelector(".phone").value = phone;
                document.querySelector(".work").value = work;
            }
        }
    }
    xhr.send(params)
})

gaurantoronesearch.addEventListener("click",()=>{
    let data;
    let memcode = document.querySelector(".gaurantoroneid").value;

    if(memcode == ""){
        let toast = document.querySelector(".toast_container");
        let toastmsg = document.querySelector(".toast_container .toast .error");
        toastmsg.textContent = "Guarantor one member code cannot be empty";
        toast.classList.add("active");
        return;
    }

    let params = "memcode="+memcode;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/loans/getgaurantorinfo.inc.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                data = xhr.response;

                if(data === "false"){
                    let toast = document.querySelector(".toast_container");
                    let toastmsg = document.querySelector(".toast_container .toast .error");
                    toastmsg.textContent = "Guarantor member code is incorrect or it does not seem to exist";
                    toast.classList.add("active");
                    return;
                }

                data = JSON.parse(data);
                let name = `${data.first_name} ${data.last_name} ${data.other_names}`;
                let phone = data.phone;

                document.querySelector(".gaurantoronename").value = name;
                document.querySelector(".gaurantoronephone").value = phone;
            }
        }
    }
    xhr.send(params)
})

gaurantortwosearch.addEventListener("click",()=>{
    let data;
    let memcode = document.querySelector(".gaurantortwoid").value;

    if(memcode == ""){
        let toast = document.querySelector(".toast_container");
        let toastmsg = document.querySelector(".toast_container .toast .error");
        toastmsg.textContent = "Guarantor two member code cannot be empty";
        toast.classList.add("active");
        return;
    }

    let params = "memcode="+memcode;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/loans/getgaurantorinfo.inc.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                data = xhr.response;

                if(data === "false"){
                    let toast = document.querySelector(".toast_container");
                    let toastmsg = document.querySelector(".toast_container .toast .error");
                    toastmsg.textContent = "Guarantor member code is incorrect or it does not seem to exist";
                    toast.classList.add("active");
                    return;
                }

                data = JSON.parse(data);
                let name = `${data.first_name} ${data.last_name} ${data.other_names}`;
                let phone = data.phone;

                document.querySelector(".gaurantortwoname").value = name;
                document.querySelector(".gaurantortwophone").value = phone;
            }
        }
    }
    xhr.send(params)
})

gaurantorthreesearch.addEventListener("click",()=>{
    let data;
    let memcode = document.querySelector(".gaurantorthreeid").value;

    if(memcode == ""){
        let toast = document.querySelector(".toast_container");
        let toastmsg = document.querySelector(".toast_container .toast .error");
        toastmsg.textContent = "Guarantor three member code cannot be empty";
        toast.classList.add("active");
        return;
    }

    let params = "memcode="+memcode;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/loans/getgaurantorinfo.inc.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                data = xhr.response;

                if(data === "false"){
                    let toast = document.querySelector(".toast_container");
                    let toastmsg = document.querySelector(".toast_container .toast .error");
                    toastmsg.textContent = "Guarantor member code is incorrect or it does not seem to exist";
                    toast.classList.add("active");
                    return;
                }

                data = JSON.parse(data);
                let name = `${data.first_name} ${data.last_name} ${data.other_names}`;
                let phone = data.phone;

                document.querySelector(".gaurantorthreename").value = name;
                document.querySelector(".gaurantorthreephone").value = phone;
            }
        }
    }
    xhr.send(params)
})

gaurantorfoursearch.addEventListener("click",()=>{
    let data;
    let memcode = document.querySelector(".gaurantorfourid").value;

    if(memcode == ""){
        let toast = document.querySelector(".toast_container");
        let toastmsg = document.querySelector(".toast_container .toast .error");
        toastmsg.textContent = "Guarantor four member code is connot be empty";
        toast.classList.add("active");
        return;
    }

    let params = "memcode="+memcode;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/loans/getgaurantorinfo.inc.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                data = xhr.response;

                if(data === "false"){
                    let toast = document.querySelector(".toast_container");
                    let toastmsg = document.querySelector(".toast_container .toast .error");
                    toastmsg.textContent = "Guarantor member code is incorrect or it does not seem to exist";
                    toast.classList.add("active");
                    return;
                }

                data = JSON.parse(data);
                let name = `${data.first_name} ${data.last_name} ${data.other_names}`;
                let phone = data.phone;

                document.querySelector(".gaurantorfourname").value = name;
                document.querySelector(".gaurantorfourphone").value = phone;
            }
        }
    }
    xhr.send(params)
})