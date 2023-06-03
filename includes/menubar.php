<style>
    .active{
        background-color: #ab0606;
    }
</style>

<section class="menu-section" style="background-color: #00008B;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li class="<?php if ($page=='profile'){echo 'active';}?>"><a href="my-profile.php">My Profile</a></li>
                             <li class="<?php if ($page=='enroll'){echo 'active';}?>"><a href="pincode-verification.php">Enroll </a></li>
                             <li class="<?php if ($page=='history'){echo 'active';}?>"><a href="enroll-history.php">Enrollment History  </a></li>
                               <li class="<?php if ($page=='change'){echo 'active';}?>"><a href="change-password.php">Change Password</a></li>
                            <li><a href="logout.php">Logout</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>