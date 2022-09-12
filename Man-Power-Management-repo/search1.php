<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--alert message -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <title>Search For Skill Set</title>
  <?php
    include("conn.php");
    if (isset($_GET['delete1'])) {
        $ID = $_GET['delete1'];
        $query = "DELETE FROM employee_list WHERE sqlid='$ID'";
        $w = mysqli_query($conn, "SELECT * FROM employee_list WHERE sqlid=$ID");
        while ($row = mysqli_fetch_array($w)) {
            $ID = $row['ID'];
            $First_name = $row['First_name'];
            $Last_name = $row['Last_name'];
            $Birthday = $row['Birthday'];
            $Employee_Address = $row['Employee_Address'];
            $Phone_Number = $row['Phone_Number'];
            $Alternetive_Phone_Number = $row['Alternetive_Phone_Number'];
            $Email = $row['Email'];
            $Aadher_num = $row['Aadher_num'];
            $Pan_num = $row['Pan_num'];
            $Skill_Set = $row['Skill_Set'];
            $Skill_Set2 = $row['Skill_Set2'];
            $Skill_Set3 = $row['Skill_Set3'];
            $Skill_Set4 = $row['Skill_Set4'];
            $Skill_Set5 = $row['Skill_Set5'];
            $Department = $row['Department'];
            $sqlquery = "INSERT INTO `recovery`(ID,First_name,Last_name,Birthday,Employee_Address,Phone_Number,Alternative_Phone_Number,Email,Aadher_num,Pan_num,Skill_Set,Skill_Set2,Skill_Set3,Skill_Set4,Skill_Set5,Department)
                VALUES('$ID','$First_name','$Last_name','$Birthday','$Employee_Address','$Phone_Number','$Alternetive_Phone_Number','$Email','$Aadher_num','$Pan_num','$Skill_Set','$Skill_Set2','$Skill_Set3','$Skill_Set4','$Skill_Set5','$Department')";
            mysqli_query($conn, $sqlquery);
            $query_run = mysqli_query($conn, $query);
            if ($query_run) {
                echo '<div class="alert alert-warning alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Employee ' . $ID . '-' . $First_name . ' ' . $Last_name . ' Data Deleted Successfully</strong>
                        </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Employee Data not Deleted</strong>
                        </div>';
            }
        }
    }
    ?>
  <style>
  th,
  td,
  table {
    border: 1px solid whitesmoke;
  }

  body {
    background-color: rgb(230, 230, 230);
  }

  #x {
    width: 100%;
    margin-right: 50px;
    margin-bottom: 10%;
    margin-left: 3%;
  }
  </style>

<body>
  <div style="background-color: black;">
    <img src="vguard-logo.jpg" alt="vguard">
    <a href="index.php?ee=1" class="btn btn-info btn-lg" style="float: right;margin:1% 2% 0% 0%;">Log out</a>
    <a href="main.php" style="float: right;margin:1% 2% 0% 0%;" class="btn btn-warning btn-lg"><i
        class="fa fa-home"></i></a>
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
  </div>

  <form action="search1.php" method="POST">
    <br>
    <div class="d-flex justify-content-center">
      <div class="container-xxl">
        <div class="form-outline mb-4">
          <input type="text" class="form-control" id="myInput" onkeyup="search1()" placeholder="Search..."
            name="search"><br>
        </div>
        <div class="text-center">
          <table class="table table-striped" style="width: 100%;" id="myTable">
            <tr class="thead-dark">
              <th style="width: 12.5%;">ID</th>
              <th style="width: 12.5%;">Name</th>
              <th style="width: 20%;">Phone Number</th>
              <th style="width: 12.5%;">Email</th>
              <th style="width: 12.5%;">Skill_Set</th>
              <th style="width: 12.5%;">Department</th>
              <th style="width: 20%;">Action</th>
            </tr>
            <?php
                        session_start();
                        if (!isset($_SESSION['userL'])) {
                            header("location:index.php");
                        }
                        $query = mysqli_query($conn, "SELECT * FROM employee_list;");
                        print_r(mysqli_fetch_all($query));
            while ($row = mysqli_fetch_array($query)) {
                $id = $row['ID'];
                $Fn = $row['First_name'];
                $ln = $row['Last_name'];
                $ph = $row['Phone_Number'];
                $E = $row['Email'];
                $S1 = $row['Skill_Set'];
                $S2 = $row['Skill_Set2'];
                $S3 = $row['Skill_Set3'];
                $S4 = $row['Skill_Set4'];
                $S5 = $row['Skill_Set5'];
                $DD = $row['Department'];
                $w = array($S1, $S2, $S3, $S4, $S5)
                        ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $Fn . " " . $ln ?></td>
              <td><?php echo $ph ?></td>
              <td><?php echo $E ?></td>
              <td>
                <?php $w = array_filter($w);
                                    for ($i = 0; $i < count($w) - 1; $i++) {
                                        echo ($w[$i] . ",");
                                    }
                                    if (count($w) != 0) {
                                        echo $w[count($w) - 1];
                                    } ?>
              </td>
              <td><?php echo $DD ?></td>
              <td><a href="tempfile.php?edit=<?php echo $row['sqlid']; ?>" class="btn btn-info"><i
                    class="bi bi-pencil-fill"></i></a>
                <a href="search1.php?delete1=<?php echo $row['sqlid'] ?>"
                  onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger"><i
                    class="bi bi-trash-fill"></i></a>
              </td>
            </tr>
            <?php
                        }
                        ?>
          </table>
  </form>
  </div>
  </div>
  </div>
</body>
<script src="jquery.js"></script>
<script>
function search1() {
  var arr = [0, 1, 4, 5];
  var input, table, tr, td, i, txtValue, j, p = 0;
  input = document.getElementById("myInput").value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    for (j = 0; j < 4; j++) {
      td = tr[i].getElementsByTagName("td")[arr[j]];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().includes(input)) {
          p += 1;
          tr[i].style.display = "";
          break;
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
}
</script>

</html>