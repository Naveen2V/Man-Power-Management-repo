<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <title>User Details</title>
    <style>
        th,td,table{
     border:1px solid black;
   }

    body {
      background-color: rgb(230, 230, 230);
    }
    </style>
</head>
<?php
session_start();
if(!isset($_SESSION['userL'])){
  header("location:index.php");
}
    include("conn.php");

?>
<body>
  
    <div style="background-color: black;">
        <img src="vguard-logo.jpg" alt="vguard">
        <a href="main.php" style="float: right;margin:1% 2% 0% 0%;" class="btn btn-warning btn-lg"><i class="fa fa-home"></i></a>
        </div>
        <div class="container">
            <div class="text-center">
                <br>
            <?php echo "<h1 class='font-weight-bold'>Manpower Details ". date("d/m/y")." Day:".date("l")."</h1>";?>
            <br>
            <table class = "table table-striped" style="width: 100%;">
                <tr class="thead-dark">
                    <th style="width: 25%;">S.No</th>
                    <th style="width: 25%;">Id Number</th>
                    <th style="width: 25%;">Name</th>
                    <th style="width: 25%;">Department</th>
                </tr>
                
                <?php
                if(isset($_POST['departt'])){
                        $u=$_POST['departt'];
                        $q="SELECT * FROM aboutdetail where Department='$u'";
                        $run=mysqli_query($conn,$q);
                        $o=0;
                        $y=mysqli_fetch_all($run);
                        $sp=count($y);
                        if($sp!=0){
                            for($i=0;$i<$sp;$i++){
                                $o=$o+1;
                                ?>
                            <tr>
                            <td ><?php echo $o?></td>
                            <td ><?php echo $y[$i][0]?></td>
                            <td ><?php echo $y[$i][1] ?></td>
                            <td ><?php echo $y[$i][2] ?></td>
                            </tr>
                            <?php
                        }
                    }
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
      <p id="popup" style="display: none;"></p>
</body>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
    p=localStorage.getItem("Depart");
    if(p!=null){
        console.log(localStorage.getItem("Depart"));
    }
    else{
        window.location.href="main.php";
    }
    function caller(){
        p=localStorage.getItem("Depart");
        console.log("inside");
        $.ajax({
        url:"",
        data:{
            departt:p
        },
        method:"post",
        success:function(response){
            $("html").html(response);
        },
        dataType:'text'
        })
    }
caller()
</script>
</html>