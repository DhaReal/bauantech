<link rel="stylesheet" href="assets/css/style2.css" >

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

                            <li class="<?php if ($page=='regis'){echo 'active';}?>"><a href="student-registration.php">Registration</a></li>
                            <li class="<?php if ($page=='year'){echo 'active';}?>"><a href="session.php">Grade Level</a></li>
                            <li class="<?php if ($page=='sem'){echo 'active';}?>"><a href="semester.php">Semester </a></li>
                            <li class="<?php if ($page=='strand'){echo 'active';}?>"><a   href="department.php">Subject</a></li>
                             <li class="<?php if ($page=='sub'){echo 'active';}?>"><a href="course.php">Strand</a></li>
                               <li class="<?php if ($page=='studs'){echo 'active';}?>"><a href="manage-students.php">Manage Students</a></li>
                               <li class="<?php if ($page=='history'){echo 'active';}?>"><a href="enroll-history.php">Enrollment History</a></li>
                               <li class="<?php if ($page=='log'){echo 'active';}?>"><a href="user-log.php">Student Logs </a></li>
                            <li><a href="logout.php">Logout</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

