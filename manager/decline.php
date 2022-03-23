<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>VPS</title><link rel="icon" href="assets/img/carlogo.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Article-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="assets/css/JLX-Fixed-Nav-on-Scroll.css">
    <link rel="stylesheet" href="assets/css/Login-Box-En.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Social-Menu-Sticky.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/WOWSlider-about-us-1.css">
    <link rel="stylesheet" href="assets/css/WOWSlider-about-us-2.css">
    <link rel="stylesheet" href="assets/css/WOWSlider-about-us.css">
</head>
<?php


include 'connect.php';

$id=$_GET['edt'];



if(isset($_POST['comment']))
{
  $comment=$_POST['comment'];





    $command="UPDATE booking
    SET decline='1',comment='$comment'
    Where booking_id='$id'";
    

    $query="select * from booking,vehicle,driver where booking.vehicle_id=vehicle.vehicle_id and driver.driver_id=booking.driver_id and booking.booking_id='$id' and booking.booking_id='$id'";

$result1=mysqli_query($conn,$query) or die(mysqli_error($conn));
$row=mysqli_fetch_array($result1);

$vid=$row['vehicle_id'];
     //vehicle
     $sql2=" UPDATE  vehicle
     SET status='0'
     WHERE vehicle_id='$vid'";

$result2=mysqli_query($conn,$sql2);
    
    
    $edit=mysqli_query($conn,$command);
      
    
    if($edit&&$result2){
    mysqli_close($conn);
    
         
    echo '<script>alert("Booking declined.");window.location = "tblbooking.php";</script>';
    
    exit;
    
    }
    else
    {
        echo mysqli_error();
    
    }
    

}
   



?>
<body style="background: rgb(255,255,255);font-family: Montserrat, sans-serif;">
   
    <div class="container" style="height: 477.676px;color: rgb(75,2,59);">
        <hr style="background: rgb(75,2,59);">
        <form  action="" name="form" onsubmit="return validateForm();" method="post">
        <div class="d-flex flex-column justify-content-center" data-aos="fade-up-right" data-aos-delay="50" id="login-box">
            <div class="login-box-header" style="background: rgb(75,2,59);">
                <h4 style="color: rgb(255,255,255);margin-bottom: 0px;font-weight: 400;font-size: 27px;">Decline Booking</h4>
            </div>
            <div class="login-box-content"></div>
            <div class="email-login" style="background-color:#ffffff;">
            <div>
            <div class="form-group">
              <label for="">Comment</label>
              <textarea  style="margin-top: 10px;border-top-color: rgb(75,2,59);border-right-color: rgb(75,2,59);border-bottom-color: rgb(75,2,59);border-left-color: rgb(75,2,59);color: rgb(75,2,59);" placeholder="Comment Here!" class="form-control" name="comment" id="" rows="3" required=""></textarea></div>
            <div class="submit-row" style="margin-bottom:8px;padding-top:0px;">
            <button class="btn btn-primary btn-block box-shadow" id="submit-id-submit" type="submit" name="login" style="background: rgb(75,2,59);"><i class="fa fa-send"></i> send</button></div>
            
</div>
</div>
<div id="login-box-footer" style="padding: 10px 20px;padding-bottom: 23px;padding-top: 18px;background: rgb(75,2,59);">
              
                <p style="margin-bottom: 0px;color: rgb(255,255,255);"><a id="register-link-1" href="tblbooking.php" style="color: rgb(255,255,255);"><i class="fa fa-arrow-left"></i> Back</a></p>
            </div>
        </div>
    </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/JLX-Fixed-Nav-on-Scroll.js"></script>
    <script src="assets/js/WOWSlider-about-us.js"></script>
</body>

</html>