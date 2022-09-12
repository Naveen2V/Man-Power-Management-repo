<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<?php
 session_start();
 if(!isset($_SESSION['userL'])){
  header("location:index.php");
}
include("conn.php");
 if(isset($_SESSION['userL'])){
    if(isset($_POST['Update']))
    {
      $ID =$_POST['ID'];
      $First_name = $_POST['First_name'];
      $Last_name = $_POST['Last_name'];
      $Birthday = $_POST['Birthday'];
      $Employee_Address = $_POST['Employee_Address'];
      $Phone_Number = $_POST['Phone_Number'];
      $Alternetive_Phone_Number = $_POST['Alternetive_Phone_Number'];
      $Email = $_POST['Email'];
      $Aadher_num = $_POST['Aadher_num'];
      $Pan_num = $_POST['Pan_num'];
      $Skill_Set = $_POST['Skill_Set'];
      $Skill_Set2 = $_POST['Skill_Set2'];
      $Skill_Set3 = $_POST['Skill_Set3'];
      $Skill_Set4 = $_POST['Skill_Set4'];
      $Skill_Set5 = $_POST['Skill_Set5'];
      $Department = $_POST['Department'];

      $query = "UPDATE employee_list SET  First_name = '$First_name' , Last_name = '$Last_name' , Birthday = '$Birthday' , Employee_Address = '$Employee_Address' , Phone_Number = '$Phone_Number' , Alternetive_Phone_Number = '$Alternetive_Phone_Number' , Email = '$Email' , Aadher_num= '$Aadher_num' , Pan_num='$Pan_num' , Skill_Set='$Skill_Set' , Skill_Set2='$Skill_Set2' , Skill_Set3='$Skill_Set3' , Skill_Set4='$Skill_Set4' , Skill_Set5='$Skill_Set5' , Department='$Department' WHERE ID = '$ID'";
      if(mysqli_query($conn,$query))
      {
        echo "<p class='alert alert-success'>Employee Data Updated successfully</p>";
      }
      else
      {
        echo "<p class='alert alert-danger'>Employee Data Not Updated</p>";
      }
    }
 }
?>


  <style>
    input,
    select {
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
    <h1 style="text-align: center; padding-right:10%; ">Search and Update Employee</h1>
    <p>&nbsp;</p>
    <div class="container">
    <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-10 col-lg-7">
    <form action="update.php" method="post">
      <input class="form-control" type="text" name="ID" placeholder="Enter Employee ID"><br>
      <div class="d-flex justify-content-center">
      <input class="btn btn-info" type="submit" name="Search" value="Search Data">
      </div>
    </form>

    <?php
        if(isset($_POST['Search'])) 
           {
             $ID =$_POST['ID'];

             $query = "SELECT * FROM employee_list where ID='$ID'";
             $query_run = mysqli_query($conn,$query);

             while($row = mysqli_fetch_array($query_run))
             {
                ?>
                   <form action="update.php" method="post">
                <input type="hidden" name="ID" value="<?php echo $row['ID']?>"><br/>
                <input type="text" class="form-control" name="First_name"  value="<?php echo $row['First_name']?>" placeholder="Name" size="40px" required><br />
                <input type="text" class="form-control" name="Last_name"  value="<?php echo $row['Last_name']?>" placeholder="Second name" size="40px" required><br />
                <input for="birthday" class="form-control" type="date" name="Birthday"  value="<?php echo $row['Birthday']?>" id="birthday" size="40px" required><br />
                <input type="text" class="form-control" name="Employee_Address"  value="<?php echo $row['Employee_Address']?>" placeholder="Employee_Address" size="40px" required><br />
                <input type="tel" class="form-control" name="Phone_Number"  value="<?php echo $row['Phone_Number']?>" placeholder="Phone No" size="40px" required><br />
                <input type="tel" class="form-control" name="Alternetive_Phone_Number"  value="<?php echo $row['Alternetive_Phone_Number']?>" placeholder="Alt phone" size="40px" required><br />
                <input type="email" class="form-control" name="Email"  value="<?php echo $row['Email']?>" placeholder="Email" size="40px" required><br />
                <input type="text" class="form-control" name="Aadher_num"  value="<?php echo $row['Aadher_num']?>" placeholder="Aadher" size="40px" required><br/>
                <input type="text" class="form-control" name="Pan_num"  value="<?php echo $row['Pan_num']?>" placeholder="Pan no" size="40px" required><br />
                <input type="text" class="form-control" name="Skill_Set"  value="<?php echo $row['Skill_Set']?>" placeholder="Skill set" size="40px" required><br/>
                <input type="text" class="form-control" size="40px"  value="<?php echo $row['Skill_Set2']?>" placeholder="Skill set2" name="Skill_Set2"><br />
                <input type="text" class="form-control" size="40px"  value="<?php echo $row['Skill_Set3']?>" placeholder="Skill set3" name="Skill_Set3"><br />
                <input type="text" class="form-control" size="40px"  value="<?php echo $row['Skill_Set4']?>" placeholder="Skill set4" name="Skill_Set4"><br />
                <input type="text" class="form-control" name="Skill_Set5"  value="<?php echo $row['Skill_Set5']?>" placeholder="Skill set5" size="40px"><br>
                <select class="form-control" for="Department" id="Department" name="Department"  value="<?php echo $row['Department']?>">
                  <option value="Production">Production</option>
                  <option value="Quality">Quality</option>
                  <option value="Maintenance">Maintainence</option>
                  <option value="Stores">Stores</option>
                  <option value="R&D">R&D</option>
                  <option value="Others">Others</option>
                </select><br/>
                <input class="btn btn-warning" type="submit" name="Update" value="Update Data"><br><br>
                </div>
              </form>
                </div>
                </div>
                </div>
              <?php
             }
            }   
      ?>
</body>
</html>