<?php
include 'connect.php';

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  if(!isset($_SESSION)) 
  { 
      session_start(); 
      $email=$_SESSION['email'];
      $idd=$_SESSION['driver_id'];
  }
$id=$_GET['edt'];



$query="select * from booking,vehicle,driver where booking.vehicle_id=vehicle.vehicle_id and driver.driver_id=booking.driver_id and booking.booking_id='$id' and booking.driver_id='$idd'";

$result1=mysqli_query($conn,$query) or die(mysqli_error($conn));
$row=mysqli_fetch_array($result1);

$vid=$row['vehicle_id'];



    $sql=" UPDATE  booking
           SET del='1'
           WHERE booking_id='$id'";
  
    $result=mysqli_query($conn,$sql);
    //vehicle
    $sql2=" UPDATE  vehicle
           SET status='0'
           WHERE vehicle_id='$vid'";
  
    $result2=mysqli_query($conn,$sql2);
  


    if (!$result && $result2) {
    	echo "db access denied ".mysqli_error();
    }else{
      echo '<script>alert("Trip Complete.");window.location = "dash-driver.php";</script>';
  }
  

?>