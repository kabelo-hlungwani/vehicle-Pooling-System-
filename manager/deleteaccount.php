<?php
include 'connect.php';

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 
$id=$_GET['edt'];


    $sql=" DELETE From fleet_officer WHERE officer_id='$id'";
  
    $result=mysqli_query($conn,$sql);
  


    if (!$result) {
    	echo "db access denied ".mysqli_error();
    }else{
      echo '<script>alert("Account succesfully deleted.");window.location = "../logout.php";</script>';
  }
  

?>