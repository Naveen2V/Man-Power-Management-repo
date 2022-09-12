<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title></head>

    <?php
   session_start();
   if(!isset($_SESSION['userL'])){
    header("location:index.php");
  }
  include("conn.php");
if(isset($_SESSION['userL'])){
  if(isset($_POST['Delete']))
  {
    $ID = $_POST['ID'];
    $query = "DELETE FROM employee_list WHERE ID='$ID' ";
    $w=mysqli_query($conn,"SELECT * FROM employee_list WHERE ID='$ID'");
    $query_run = mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($w)){
        $ID =$row['ID'];
        $First_name =$row['First_name'];
        $Last_name =$row['Last_name'];
        $Birthday=$row['Birthday'];
        $Employee_Address=$row['Employee_Address'];
        $Phone_Number =$row['Phone_Number'];
        $Alternetive_Phone_Number =$row['Alternetive_Phone_Number'];
        $Email = $row['Email'];
        $Aadher_num=$row['Aadher_num'];
        $Pan_num=$row['Pan_num'];
        $Skill_Set=$row['Skill_Set'];
        $Skill_Set2=$row['Skill_Set2'];
        $Skill_Set3=$row['Skill_Set3'];
        $Skill_Set4=$row['Skill_Set4'];
        $Skill_Set5=$row['Skill_Set5'];
        $Department=$row['Department'];
        $sqlquery = "INSERT INTO `recovery`(ID,First_name,Last_name,Birthday,Employee_Address,Phone_Number,Alternative_Phone_Number,Email,Aadher_num,Pan_num,Skill_Set,Skill_Set2,Skill_Set3,Skill_Set4,Skill_Set5,Department)
        VALUES('$ID','$First_name','$Last_name','$Birthday','$Employee_Address','$Phone_Number','$Alternetive_Phone_Number','$Email','$Aadher_num','$Pan_num','$Skill_Set','$Skill_Set2','$Skill_Set3','$Skill_Set4','$Skill_Set5','$Department')";
        mysqli_query($conn,$sqlquery);
        if($query_run)
        {
            echo "<p class='alert alert-warning'>Employee $ID-$First_name.$Last_name Deleted Successfully</p>";
        }
        else
        {
            echo "<p class='alert alert-danger'>Employee Data not Deleted</p>";
        }
    }   
  }
}
?>

  <style>
    
    input,select {
      width: 100%;
    }
    body {
      background-color: rgb(230, 230, 230);
    }
    #x{
      width:100%;
      margin-right: 50px;
      margin-bottom: 10%;
      margin-left: 3%;
    }
  </style>
<body>
<div style="background-color: black;">
<img src="vguard-logo.jpg" alt="vguard">
<a href="index.php?ee=1" class="btn btn-info btn-lg" style="float: right;margin:1% 2% 0% 0%;">Log out</a>
<a href="main.php" style="float: right;margin:1% 2% 0% 0%;" class="btn btn-warning btn-lg"><i class="fa fa-home"></i></a>
</div>
<div class="sticky-top">
<nav class="nav flex-column" style="float:left;">
    <p>&nbsp;</p>
    <a href="addemployee.php" class="btn btn-primary" id="x">Add Employee</a><br>
    <a href="search1.php" class="btn btn-success" id="x">Search Employee</a><br>
    <a href="delete.php" class="btn btn-danger" id="x">Delete Employee</a><br>
    <a href="update.php" class="btn btn-dark" id="x">Update Employee</a><br>
</nav>
</div>
<p>&nbsp;</p>
<h1 style="text-align: center; padding-right:10%; "> Delete employee</h1>
    <div class="container">
    <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-10 col-lg-7">
      <br>
      <form action="delete.php" method="post">
         <input class="form-control" type="ID"  name ="ID" placeholder="Search for delete..."><br>
         <div class="d-flex justify-content-center" >
         <input class="btn btn-danger" type="submit" name ="Delete" value="Delete Data">
         </div>
      </form>
    </div>
    </div>
    </div>
</body>
</html>