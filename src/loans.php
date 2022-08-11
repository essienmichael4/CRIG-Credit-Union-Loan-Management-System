            <div class="wrapper">
                <div class="savings__card">
                    <div class="card">
                        <p>All Loans</p>
                        <h4 class="all_loans_total"></h4>
                    </div>
                    <div class="card">
                        <p>All Paid Loans</p>
                        <h4 class="paid_loans"></h4>
                    </div>
                    <div class="card">
                        <p>Unpaid Loans</p>
                        <h4 class="arrears"></h4>
                    </div>
                    <div class="card">
                        <p>Interest</p>
                        <h4 class="interest"></h4>
                    </div>
                    
                </div>
                <div class="filter flex">
                    <div class="filter__actions">
                        <a href="?pgname=apply" class="active">Loan Application <i class="fas fa-plus"></i></a>
                        <a class="loanfilter all active">All Loans</a>
                        <a class="loanfilter unapproved">Unapproved</a>
                        <a class="loanfilter unapproved">Awaiting Approval</a>
                        <a class="loanfilter approved">Approved</a>
                        <a class="loanfilter due">Due</a>
                        <a class="loanfilter overdue">Overdue</a>
                        <a class="loanfilter paid">Paid</a>
                        
                    </div>
                    <div class="filter__time">
                        <a class="time allTime active">All Time</a>
                        <input type="date" class="dayInputfirst">
                        <input type="date" class="dayInputsecond">
                        <input type="month" class="monthInput1">
                        <input type="month" class="monthInput2">
                        <input type="month" class="yearInput">
                        
                        <a class="time day">D</a>
                        <a class="time month">M</a>
                        <a class="time year">Y</a>
                    </div>
                </div>
                <div class=" account-details">
                    <h2 class="account-title"></h2>
                    <div class="actions">
                        <div class="searchname">
                            <input type="text" class="namesort">
                            <i class="fas fa-search"></i>
                        </div>
                        <button class="getalldebit">All</button>
                        <button class="getallaccounts">Members</button>
                        <button class="getalltransactions">Non-Mebers</button>
                        <button class="getalldeposit">Casuals</button>
                        <!-- <a class="loanfilter members">Members</a>
                        <a class="loanfilter nonmembers">Non-Mebers</a>
                        <a class="loanfilter casual">Casuals</a> -->
                    </div>
                </div>
                <section class="savings__table">
                    
                </section>
            </div>
        </div>
    </div>
    <script src="../js/searchUtils.js"></script>
    <script src="../js/getallloans.js"></script>
    <script src="../js/filters.js"></script>
    <!-- <script src="../js/getlimitedloans.js"></script> -->
    <script src="../js/getallarrears.js"></script>
    <script src="../js/getallloantotal.js"></script>
    <script src="../js/getallpaidloans.js"></script>
    <script src="../js/getinterest.js"></script>
