
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
                    <form><button type="submit">logout</button></form>
                </div>
            </header>
            <div class="wrapper">
                <section class="apply">
                    <h3 class="title">Edit User</h3>
                    <form class="form apply__form">
                        <div class="form__group less">
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
                            <button>Approve</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>    
