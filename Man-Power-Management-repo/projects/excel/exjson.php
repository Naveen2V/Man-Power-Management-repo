<?php 
    $local='localhost';
    $user="root";
    $pass="";
    $connSQL=mysqli_connect($local,$user,$pass);
    if(isset($_POST['DBCreate']))
    {
        $f=$_POST['DBCreate'];
        $f1=$_POST['TBCreate'];
        $f2=$_POST['InsertCreate'];
        if($f!=="NO"){
            mysqli_query($connSQL,$f);
        }
        mysqli_query($connSQL,$f1);
        mysqli_query($connSQL,$f2);
    }
    
?>