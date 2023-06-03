<?php
$page='history';
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Enrollment History</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
  
<?php if($_SESSION['login']!="")
{
 include('includes/menubar.php');
}
 ?>

    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 style="font-weight: 900;
    padding-bottom: 20px;
    border-bottom: 4px solid #ab0606;
    text-transform: uppercase;
    color: #ab0606;
    font-size: 20px;
    margin-bottom: 40px;">Enrollment History  </h1>
                    </div>
                </div>
                <div class="row" >
            
                <div class="col-md-12">
                   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Enrollment History
                        </div>
                      
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">#</th>
                                            <th style="text-align: center">Strand</th>
                                            <th style="text-align: center">Semester</th>
                                            <th style="text-align: center">Year Level</th>
                                            <th style="text-align: center">Enrollment Date</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($bd, "select session.session as session,course.courseName as strand ,courseenrolls.enrollDate as edate ,semester.semester as sem from courseenrolls join course on course.id=courseenrolls.course join session on session.id=courseenrolls.session join semester on semester.id=courseenrolls.semester  where courseenrolls.studentRegno='".$_SESSION['login']."'");


$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
    

                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['strand']);?></td>
                                            <td><?php echo htmlentities($row['sem']);?></td>
                                            <td><?php echo htmlentities($row['session']);?></td>
                                             <td><?php echo htmlentities($row['edate']);?></td>
                                            <td>
                                            <a href="print.php?id=<?php echo $row['cid']?>" target="_blank">
<button class="btn btn-primary"><i class="fa fa-print "></i> Print</button> </a>                                        


                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>





        </div>
    </div>
   
  <?php include('includes/footer.php');?>
   
    <script src="assets/js/jquery-1.11.1.js"></script>
    
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
<?php } ?>
