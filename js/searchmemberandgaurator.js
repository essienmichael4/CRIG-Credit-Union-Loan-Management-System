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
                
                if(data === "false"){
                    let error = "Member code incorrect or member doesn't exist";
                    // deperror.innerHTML = `<p class="err">${error}</p>`;
                    console.log(error);
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
                    let error = "Member code incorrect or member doesn't exist";
                    // deperror.innerHTML = `<p class="err">${error}</p>`;
                    console.log(error);
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
    let memcode = document.querySelector("gaurantoroneid").value;

    if(memcode == ""){
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
                    let error = "Member code incorrect or member doesn't exist";
                    // deperror.innerHTML = `<p class="err">${error}</p>`;
                    console.log(error);
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
    let memcode = document.querySelector("gaurantortwoid").value;

    if(memcode == ""){
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
                    let error = "Member code incorrect or member doesn't exist";
                    // deperror.innerHTML = `<p class="err">${error}</p>`;
                    console.log(error);
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
    let memcode = document.querySelector("gaurantorthreeid").value;

    if(memcode == ""){
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
                    let error = "Member code incorrect or member doesn't exist";
                    // deperror.innerHTML = `<p class="err">${error}</p>`;
                    console.log(error);
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
    let memcode = document.querySelector("gaurantorfourid").value;

    if(memcode == ""){
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
                    let error = "Member code incorrect or member doesn't exist";
                    // deperror.innerHTML = `<p class="err">${error}</p>`;
                    console.log(error);
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