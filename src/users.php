
        <div class="main">
            <header class="main__header flex px1">
                <h2 class="">All Users</h2>
                <form class="search" action="">
                    <input type="text" class="search__input" placeholder="Search">
                    <button class="search__btn">Search</button>
                </form>
                <div class="user flex">
                    <span class="flex">C</span>
                    <p>Michael Essien</p>
                    <i class="fas fa-angle-down"></i>
                </div>
                
                <div class="userdetails">
                    <p>codejunior</p>
                    <a href=">">edit user</a>
                    <form action="../php/logout.inc.php"><button type="submit">logout</button></form>
                </div>
            </header>
            <div class="wrapper">
                <div class="filter flex">
                    <div class="filter__actions">
                        <a class="addUser">Add User <i class="fas fa-plus"></i></a>
                    </div>
                    
                </div>
                <section class="main__table">
                    <table>
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>User Full Name</th>
                                <th>username</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th class="tc">Status</th>
                                <th class="tc">actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>CD1000234597678</td>
                                <td>
                                    <a href="">Michael Essien</a>
                                </td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>essienmichael4@gamil.com</td>
                                <td class="tc"><span class="in">logged in</span></td>
                                <td class="tc">
                                    <button class="disable">disable</button>
                                    <a href="useredit.html" class="edit">edit</a>
                                </td>
                            </tr> 
                            
                            <tr>
                                <td>CD1000234597678</td>
                                <td>
                                    <a href="">Michael Essien</a>
                                </td>
                                <td>020000000</td>
                                <td>Avenue A</td>
                                <td>23/04/2022</td>
                                <td class="tc"> <span class="out">logged out</span></td>
                                <td class="tc"><button class="enable">enable</button> <a href="useredit.html" class="edit">edit</a></td>
                            </tr> 
                        </tbody>
                    </table>
                </section>
                
            </div>

            <div class="main__user">
                <form action="">
                    <header class="flex">
                        <h3 class="title">User form</h3>
                        <i class="fas fa-times closeForm"></i>
                    </header>

                    <div class="form__group">
                        <div class="formControl flex-c">
                            <label for="">First name</label>
                            <input type="text" placeholder="First Name">
                        </div>
                        <div class="formControl flex-c">
                            <label for="">Last name</label>
                            <input type="text" placeholder="Last Name">
                        </div>
                        <div class="formControl flex-c">
                            <label for="">Other names</label>
                            <input type="text" placeholder="Other Name">
                        </div>
                        <div class="formControl flex-c">
                            <label for="">username</label>
                            <input type="text" placeholder="Username">
                        </div>
                        <div class="formControl flex-c">
                            <label for="">Email</label>
                            <input type="text" placeholder="Email">
                        </div>
                        <div class="formControl flex-c">
                            <label for="">Staff No.</label>
                            <input type="text" placeholder="Staff No.">
                        </div>
                        <div class="formControl flex-c">
                            <label for="">Phone Number</label>
                            <div>
                                <span>+233</span><input type="text" placeholder="eg. 201234567">
                            </div>
                        </div>
                        <div class="formControl flex-c">
                            <label for="">password</label>
                            <div>
                                <input type="password"><span class="ml1"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                        <div class="formControl flex-c">
                            <label for="">password repeat</label>
                            <div>
                                <input type="password"><span class="ml1"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                        <div class="formControl flex-c">
                            <label for="">Role</label>
                            <input type="text" list="role" placeholder="User">

                            <datalist id="role">
                                <option>User</option>
                                <option>Admin</option>
                                <option>Super Admin</option>
                            </datalist>
                        </div>
                        
                    </div>
                    <div class="action__btn flex">
                        <button>Add User</button>
                    </div>

                </form>
            </div>
        </div>
    </div>   
    <script src="../js/user.js"></script> 
