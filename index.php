<?php
session_start();
error_reporting(1);
include("includes/config.php");
if(isset($_POST['submit']))
{
    $regno=$_POST['regno'];
    $password=md5($_POST['password']);
$query=mysqli_query($bd, "SELECT * FROM students WHERE StudentRegno='$regno' and password='$password'");
if(mysqli_num_rows($query)>0)
{
$num=mysqli_fetch_array($query);
$extra="my-profile.php";//
$_SESSION['login']=$_POST['regno'];
$_SESSION['id']=$num['studentRegno'];
$_SESSION['sname']=$num['studentName'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($bd, "insert into userlog(studentRegno,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid Reg no or Password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Student Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style2.css" >
</head>
<body>
    <?php include('includes/header.php');?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="font-weight: 900;
    padding-bottom: 20px;
    border-bottom: 4px solid #ab0606;
    text-transform: uppercase;
    color: #ab0606;
    font-size: 20px;
    margin-bottom: 40px;">Please Login To Enter </h4>

                </div>

            </div>
             
            <form name="admin" method="post">
            <div class="row">
                <div class="col-md-6">
                     <label>Enter Registration number : </label>
                        <input type="text" name="regno" class="form-control"  />
                        <label>Enter Password :  </label>
                        <input type="password" name="password" class="form-control"  />
                        <hr />
                        <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </button>&nbsp;

                        <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span><br><br>
                        <label style="font-size:20px; color: #ab0606 ;">New Here? Please fill out this <a href="https://drive.google.com/file/d/10Y4ZJRea1ImmDwAgxyyg4kdA0B7Z7ZPh/view?usp=share_link">Form</a>!</label>
                    <br><label>Send Here: bauantech@yahoo.com.ph </label></br></br></br>
                        
                </div>
                </form> 
                 <div class="col-md-6">
                    <div class="body">
                    <div class="slider">
      <div class="slides">
        <!--radio buttons start-->
        
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">

        <!--radio buttons end-->
        <!--slide images start-->
        <div class="slide first">
          <img src="1.jpg" alt="">
        </div>
        <div class="slide">
          <img src="2.jpg" alt="">
        </div>
        <div class="slide">
          <img src="3.jpg" alt="">
        </div>
        <div class="slide">
          <img src="4.jpg" alt="">
        </div>
        <!--slide images end-->
        <!--automatic navigation start-->
        <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
          <div class="auto-btn4"></div>
        </div>
        <!--automatic navigation end-->
      </div>
      <!--manual navigation start-->
      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
      </div>
      <!--manual navigation end-->
    </div>
    <!--image slider end-->
</div>

    <script type="text/javascript">
    var counter = 1;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 4){
        counter = 1;
      }
    }, 5000);
    </script>

                   <!-- <img src="1.jpg" width="600" height="400">-->
                 </div>

            </div>
        </div>
    </div>
 
    <?php include('includes/footer.php');?> 
   
    <script src="assets/js/jquery-1.11.1.js"></script>

    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
