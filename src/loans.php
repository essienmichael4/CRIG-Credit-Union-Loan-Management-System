        <div class="main">
            <header class="main__header flex px1">
                <h2 class="">Loans</h2>
                <form class="search" action="">
                    <input type="text" class="search__input" placeholder="Search">
                    <button class="search__btn">Search</button>
                </form>
                <div class="user flex">
                    <span class="flex">C</span>
                    <p><?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?></p>
                    <i class="fas fa-angle-down"></i>
                </div>
                
                <div class="userdetails">
                    <p><?=$_SESSION["username"]?></p>
                    <a href=">">edit user</a>
                    <form action="../php/logout.inc.php"><button type="submit">logout</button></form>
                </div>
            </header>
            <div class="wrapper">
                <div class="filter flex">
                    <div class="filter__actions">
                        <a href="?pgname=apply" class="active">Loan Application <i class="fas fa-plus"></i></a>
                        <a class="loanfilter all active">All Loans</a>
                        <a class="loanfilter approved">Approved</a>
                        <a class="loanfilter due">Due</a>
                        <a class="loanfilter overdue">Overdue</a>
                        <a class="loanfilter paid">Paid</a>
                    </div>
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
                <section class="main__table">
                    <!-- <table>
                        <thead>
                            <tr>
                                <th>Applicant ID</th>
                                <th>Applicant Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th class="tc">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="awaiting">awiating approval</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="pending">pending</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="approved">approved</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="due">due</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="overdue">overdue</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span  class="paid">paid</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="pending">pending</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="approved">approved</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="due">due</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="overdue">overdue</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span  class="paid">paid</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="pending">pending</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="approved">approved</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="due">due</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="overdue">overdue</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span  class="paid">paid</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="awaiting">awiating approval</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="awaiting">awiating approval</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="awaiting">awiating approval</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="awaiting">awiating approval</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="awaiting">awiating approval</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"><span class="awaiting">awiating approval</span></td>
                            </tr> 
                            <tr>
                                <td>CD1000234597678</td>
                                <td>Michael Essien</td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td>GH¢ 1,500.00</td>
                                <td class="tc"> <span class="awaiting">awiating approval</span></td>
                            </tr> 
                        </tbody>
                    </table> -->
                </section>
            </div>
        </div>
    </div>
    <script src="../js/searchUtils.js"></script>
    <script src="../js/getallloans.js"></script>
    <script src="../js/filters.js"></script>
