<?php
$page='strand';
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
  $department=$_POST['department'];
  $strand=$_POST['strand'];
  $semester=$_POST['sem'];
  
$ret=mysqli_query($bd, "insert into department(department,strand,semester) values('$department','$strand','$semester')");
if($ret)
{
$_SESSION['msg']="Department Created Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Department not created";
}
}
if(isset($_GET['del']))
      {
              mysqli_query($bd, "delete from department where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Department deleted !!";
      }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Subject</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
    
<?php if($_SESSION['alogin']!="")
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
    margin-bottom: 40px;">Manage Subjects  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Subject 
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="dept" method="post">
   <div class="form-group">
    <label for="department">Add Subject  </label>
    <input type="text" class="form-control" id="department" name="department" placeholder="Subject" required />
  </div>

  <div class="form-group">
    <label for="Strand">Strand  </label>
    <select class="form-control" name="strand" required="required">
   <option value="">Select Strand</option>   
   <?php 
$sql=mysqli_query($bd, "select * from course");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['courseName']);?></option>
<?php } ?>

    </select> 
  </div> 



<div class="form-group">
    <label for="Semester">Semester  </label>
    <select class="form-control" name="sem" required="required">
   <option value="">Select Semester</option>   
   <?php 
$sql=mysqli_query($bd, "select * from semester");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['semester']);?></option>
<?php } ?>

    </select> 
  </div>

 <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Subject
                        </div>
                       
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">#</th>
                                            <th style="text-align: center">Subject</th>
                                            
                                            
                                            <th style="text-align: center">Creation Date</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($bd, "select * from department");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['department']);?></td>
                                            
                                            
                                            <td><?php echo htmlentities($row['creationDate']);?></td>
                                            <td>
  <a href="department.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn btn-danger">Delete</button>
</a>
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
