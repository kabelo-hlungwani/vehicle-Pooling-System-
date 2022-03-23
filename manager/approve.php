<?php


include 'connect.php';

$id=$_GET['edt'];

   
$command="UPDATE booking
SET approved='1'
Where booking_id='$id'";



$edit=mysqli_query($conn,$command);
  

if($edit){
mysqli_close($conn);

     
echo '<script>alert("Booking approved.");window.location = "tblbooking.php";</script>';

exit;

}
else
{
    echo mysqli_error();

}



?>