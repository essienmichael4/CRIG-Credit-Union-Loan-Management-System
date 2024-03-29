    
        <div class="toast_container ">
            <div class="toast">
                <p class="error"></p>
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="wrapper">
            <div class="savings__card">
                <div class="card">
                    <p>All Funds</p>
                    <h4 class="all_funds"></h4>
                </div>
                <div class="card">
                    <p>Current Account</p>
                    <h4 class="current_account"></h4>
                </div>
                <div class="card">
                    <p>Loans</p>
                    <h4 class="arrears"></h4>
                </div>
                <div class="card">
                    <p>Interest</p>
                    <h4 class="interest"></h4>
                </div>                    
            </div>

            <div class="filter savings flex">
                <a class="btn-action loan_btn">loans</a>
                <div class="filter__time">
                    <a class="time allTime active">All Time</a>
                    <input type="date" class="dayInput1">
                    <input type="date" class="dayInput2">
                    <input type="month" class="monthInput1">
                    <input type="month" class="monthInput2">
                    <input type="month" class="yearInput">
                    
                    <a class="time day">D</a>
                    <a class="time month">M</a>
                    <a class="time year">Y</a>
                </div>
            </div>
            <div class=" account-details">
                <h2 class="account-title">Analytics</h2>
                <div class="actions">
                    <div class="searchname">
                        <input type="text" class="namesort">
                        <i class="fas fa-search"></i>
                    </div>
                    <button class="getallaccounts">Accounts</button>
                    <button class="getalltransactions">Transactions</button>
                    <button class="getalldeposit">Deposits</button>
                    <button class="getalldebit">Withdrawals</button>
                </div>
            </div>
            <section class="savings__table">
                
            </section>
        </div>
    </div>
</div>
<script src="../js/searchUtils.js"></script>
<script src="../js/allaccounts.js"></script>
<script src="../js/filters.js"></script>
<script src="../js/getcurrentaccount.js"></script>
<script src="../js/getallarrears.js"></script>
<script src="../js/allfunds.js"></script>
<script src="../js/getinterest.js"></script>
<script src="../js/sort.js"></script>
<script src="../js/sortnameanalytics.js"></script>

<script>
    let toast = document.querySelector(".toast_container");
    
    setInterval(()=>{
        setTimeout(()=>{
            toast.classList.remove("active");
        }, 5000)
        
    },9000)

    function disablemember(id){
        let params = "id="+id+"&user="+user;

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../php/savings/disablemember.inc.php");
        xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        xhr.onload = () =>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    location.href = "routes.php?pgname=analytics";
                }
            }
        }
        xhr.send(params)
    }

    function activatemember(id){
        let params = "id="+id+"&user="+user;

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../php/savings/activatemember.inc.php");
        xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        xhr.onload = () =>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    location.href = "routes.php?pgname=analytics";
                }
            }
        }
        xhr.send(params)
    }
</script>