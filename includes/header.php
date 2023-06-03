<?php
include("includes/config.php");
error_reporting(0);
?>
<?php if($_SESSION['login']!="")
{?>
<header style="background-color: #00008B;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Welcome: </strong><?php echo htmlentities($_SESSION['sname']);?>
                    &nbsp;&nbsp;
                    

            </div>
        </div>
    </header>
    <?php } ?>

    <div class="navbar navbar-inverse set-radius-zero" style="background-image: url('header2.jpg'); background-size: cover;">
        <div class="container" style="background-image: url('bg.png'); background-size: cover">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="color:#fff; font-size:24px;4px; line-height:24px; ">

                BAUAN TECHNICAL INTEGRATED HIGH SCHOOL
                </a>

            </div>

            <div class="left-div">
                <img src="logo.png" width="100" height="100">
        </div>
            </div>
        </div>
