<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Add Employee</title>



  <?php
  session_start();
  if(!isset($_SESSION['userL'])){
    header("location:index.php");
  }
include("conn.php");
if(isset($_SESSION['userL'])){
  if (!$conn)
  { 
    die("Connection Failed: " . mysqli_connect_error());
  }
  if(isset($_POST['Save'])) 
  {
    $ID =$_POST['ID'];
    $First_name =$_POST['First_name'];
    $Last_name =$_POST['Last_name'];
    $Birthday=$_POST['Birthday'];
    $Employee_Address=$_POST['Employee_Address'];
    $Phone_Number =$_POST['Phone_Number'];
    $Alternetive_Phone_Number =$_POST['Alternetive_Phone_Number'];
    $Email = $_POST ['Email'];
    $Aadher_num=$_POST['Aadher_num'];
    $Pan_num=$_POST['Pan_num'];
    $Skill_Set=$_POST['Skill_Set'];
    $Skill_Set2=$_POST['Skill_Set2'];
    $Skill_Set3=$_POST['Skill_Set3'];
    $Skill_Set4=$_POST['Skill_Set4'];
    $Skill_Set5=$_POST['Skill_Set5'];
    $Department=$_POST['Department'];

    $sql_query = "INSERT INTO employee_list (ID,First_name,Last_name,Birthday,Employee_Address,Phone_Number,Alternetive_Phone_Number,Email,Aadher_num,Pan_num,Skill_Set,Skill_Set2,Skill_Set3,Skill_Set4,Skill_Set5,Department)
    VALUES('$ID','$First_name','$Last_name','$Birthday','$Employee_Address','$Phone_Number','$Alternetive_Phone_Number','$Email','$Aadher_num','$Pan_num','$Skill_Set','$Skill_Set2','$Skill_Set3','$Skill_Set4','$Skill_Set5','$Department')";

    if (mysqli_query($conn, $sql_query)) 
    {
        echo "<p class='alert alert-success'>New Details Entry inserted successfully !</p>";
    } 
    else
    { 
      echo "Error: " . $sql . "" . mysqli_error ($conn); 
    }
    mysqli_close($conn);
  }
}
  ?>
  <style>
    * {
      justify-content: center;
      align-items: center;
    }

    input,
    select {
      width: 100%;
      padding: 1% 0px 1% 2%;
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
    <a href="" class="btn btn-primary" id="x">Add Employee</a><br>
    <a href="search1.php" class="btn btn-success" id="x">Search Employee</a><br>
    <a href="delete.php" class="btn btn-danger" id="x">Delete Employee</a><br>
    <a href="update.php" class="btn btn-dark" id="x">Update Employee</a><br>
</nav>
</div>  
<p>&nbsp;</p>
  <h1 style="text-align: center; padding-right:8%; " >Add New Employee</h1>
<div class="container">
  <div class="row h-100 justify-content-center align-items-center">
      <div class="col-10 col-md-10 col-lg-7">
        <p>&nbsp;</p>
    <form action="addemployee.php" method="post">
      <input class="form-control" type="text" name="ID" placeholder="Enter id" required><br />
      <input class="form-control" type="text" name="First_name" placeholder="Name" required><br />
      <input class="form-control" type="text" name="Last_name" placeholder="Second name" required><br />
      <input class="form-control" for="birthday" type="date" id="birthday" name="Birthday" required><br />
      <input class="form-control" type="text" name="Employee_Address" placeholder="Employee_Address" required><br />
      <input class="form-control" type="tel" pattern="[0-9]{10}" title="Ten digits code" name="Phone_Number" placeholder="Phone No" required><br />
      <input class="form-control" type="tel" pattern="[0-9]{10}" title="Ten digits code" name="Alternetive_Phone_Number" placeholder="Alt phone" required><br />
      <input class="form-control" type="email" name="Email" placeholder="Email" required><br />
      <input class="form-control" type="tel" pattern="[0-9]{12}" title="Twelve digits code" name="Aadher_num" placeholder="Aadhar" required><br />
      <input class="form-control" type="text" name="Pan_num" placeholder="Pan no" required><br />
      <input class="form-control" type="text" name="Skill_Set" placeholder="Skill set" required><br />
      <input class="form-control" type="text" placeholder="Skill set2" name="Skill_Set2"><br />
      <input class="form-control" type="text" placeholder="Skill set3" name="Skill_Set3"><br />
      <input class="form-control" type="text" placeholder="Skill set4" name="Skill_Set4"><br />
      <input class="form-control" type="text" name="Skill_Set5" placeholder="Skill set5" size="40px"><br>
      <select class="form-control" for="Department" id="Department" name="Department">
        <option value="Production">Production</option>
        <option value="Quality">Quality</option>
        <option value="Maintenance">Maintainence</option>
        <option value="Stores">Stores</option>
        <option value="R&D">R&D</option>
        <option value="Others">Others</option>
      </select><br />
      <div class="d-flex justify-content-center">
      <input class="btn btn-primary" type="submit" name="Save" value="Save">
      </div><br>
      <div class="d-flex justify-content-center">
      <input class="btn btn-info" type="reset" name="Clear Form" value="clear">
      </div>
    </form>
  </div>
</div>
</div>
</body>
</html>