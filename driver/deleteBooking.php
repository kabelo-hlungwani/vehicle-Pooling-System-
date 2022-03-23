<?php
include 'connect.php';

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 
    $id=$_GET['edt'];


    $cmd="SELECT booking.vehicle_id as vid FROM driver,booking,vehicle where driver.driver_id=booking.driver_id AND booking.vehicle_id=vehicle.vehicle_id AND booking.booking_id='$id'";
    $res=mysqli_query($conn,$cmd) or die(mysqli_error($conn));
    $row=mysqli_fetch_array($res);
    $vid=$row['vid'];

    
    
    $sql=" DELETE From booking WHERE booking_id='$id'";
    $result=mysqli_query($conn,$sql);
  
    $sql2=" UPDATE  vehicle
    SET status='0'
    WHERE vehicle_id='$vid'";
    $result2=mysqli_query($conn,$sql2);


    if (!$result&&!$result2) {
    	echo "db access denied ".mysqli_error();
    }else{
      echo '<script>alert("Booking cancelled.");window.location = "pendingBooking.php";</script>';
  }
  

?>