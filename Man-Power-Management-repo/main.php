<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Daily Attendence</title>
</head>
<style>
* {
  justify-content: center;
  align-items: center;
}

#link {
  border-width: 10px;
  border-color: black;
  background-color: #fff;
  font-size: 20px;
  border-radius: 8px;
  padding: 8px;
  text-decoration: none;
  transition: 500ms;
  margin: 150px;
}

th,
td,
table {
  border: 1px solid black;
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
  <div class="container">
    <div class="text-center" style="margin-left: 10%;">
      <?php echo "<h1 class='font-weight-bold'>Manpower Details " . date("d/m/y") . " Day:" . date("l") . "</h1>"; ?>
      <br>
      <table class="table table-striped" style="width: 100%;">
        <tr class="thead-dark">
          <th style="width: 17%;">S.No</th>
          <th style="width: 17%;">Department</th>
          <th style="width: 17%;">Strength</th>
          <th style="width: 17%;">Plan</th>
          <th style="width: 16%;">Actual Strength</th>
          <th style="width: 16%;">%</th>
          <th style="width: 16%;">About</th>
        </tr>

        <?php
        session_start();
        if (!isset($_SESSION['userL'])) {
          header("location:index.php");
        }
        error_reporting(0);
        include("conn.php");
        $q = "SELECT * FROM manpower";
        $run = mysqli_query($conn, $q);
        $o = 0;
        while ($r = mysqli_fetch_array($run)) {
          $o = $o + 1;
        ?>
        <tr>
          <td <?php echo "id=" . $o . "1" ?>><?php echo $o ?></td>
          <td <?php echo "id=" . $o . "2" ?>><?php echo $r['Department'] ?></td>
          <td <?php echo "id=" . $o . "3" ?>><?php echo $r['strength'] ?></td>
          <td <?php echo "id=" . $o . "4" ?>><?php echo $r['Plan'] ?></td>
          <td <?php echo "id=" . $o . "5" ?>><?php echo $r['Astrength'] ?></td>
          <td <?php echo "id=" . $o . "6" ?>><?php echo round(($r['Astrength'] / $r['Plan']) * 100); ?></td>

          <td <?php echo "id=" . $o . "7" ?>>
            <?php echo "<button class='btn btn-primary' value=" . $o . " onclick='makesession(this)'>More</button>" ?>
          </td>
        </tr>
        <?php
        }
        ?>
      </table>
    </div>
  </div>
  <section>
    <center>
      <br>

      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </center>
  </section>
</body>
<script>
function makesession(y) {
  f = document.getElementById(y.value + "2").innerText;
  console.log(f);
  localStorage.setItem("Depart", f);
  console.log(localStorage.getItem("Depart"));
  window.location.href = "moretable.php"
}
</script>

</html>