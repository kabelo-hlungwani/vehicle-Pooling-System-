<!DOCTYPE html>
<html lang="en">


<?php
    include 'connect.php';
    
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
     session_start();
     $email=$_SESSION['email'];
    ?>
<?php


$id=$_GET['edt'];


$qry=mysqli_query($conn,"select * from vehicle WHERE vehicle_id='$id'");
$data=mysqli_fetch_array($qry);


if(isset($_POST['upload']))
{

    
    

//$qry=mysqli_query($con,"Insert into `pdf`(`file`) VALUES('".$upload_file."')");




$mile=$_POST['mile'];
$max_mile=$_POST['max_mile'];
$date=$_POST['date'];
$condition=$_POST['condition'];

  
$command="UPDATE  vehicle
 SET 
 mileage='$mile',description='$condition',dos='$date',max_mileage='$max_mile'
 WHERE vehicle_id='$id'";



$edit=mysqli_query($conn,$command);
  

if($edit){
mysqli_close($conn);

     
echo '<script>alert("vehicle information Updated.");window.location = "maintain.php";</script>';

exit;

}
else
{
    echo mysqli_error();

}
}


?>



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

<body style="background: rgb(255,255,255);font-family: Montserrat, sans-serif;">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="#" style="color: rgb(27,152,242);">VPS&nbsp;<i class="fas fa-car-alt"></i></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mr-auto">
                    
                        
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="height: 477.676px;color: rgb(50,211,56);">
        <hr style="background: rgb(27,152,242);">
        <div class="d-flex flex-column justify-content-center" data-aos="fade-up-right" data-aos-delay="50" id="login-box">
            <div class="login-box-header" style="background: rgb(27,152,242);">
                <h4 style="color: rgb(255,255,255);margin-bottom: 0px;font-weight: 400;font-size: 27px;">Maintain Vehicle</h4>
            </div>
            <form action="" name="form" enctype="multipart/form-data" onsubmit="return validateForm();"  method="post">
            <div class="login-box-content"></div>
            <div class="email-login" style="background-color:#ffffff;">

            <br>
           
           
            <input type="number" required="" class="email-imput form-control" style="margin-top: 10px;color:rgb(27,152,242);border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(27,152,242);border-left-color: rgb(255,255,255);"  value="<?php echo $data['mileage'];?>" placeholder="Mileage" name="mile" id="mile"><span id="errormile"></span>
            <input type="number" required="" class="email-imput form-control" style="margin-top: 10px;color:rgb(27,152,242);border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(27,152,242);border-left-color: rgb(255,255,255);"  value="<?php echo $data['max_mileage'];?>" placeholder="Maximum Vehicle  Mileage" name="max_mile" id="max_mile" required>
            <input type="text" required="" onfocus="(this.type='date')" class="email-imput form-control" style="margin-top: 10px;color:rgb(27,152,242);border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(27,152,242);border-left-color: rgb(255,255,255);"  value="<?php echo $data['dos'];?>" placeholder="last date of service" name="date"><span id="errormile"></span>
            <select class="email-imput form-control" required="" style="border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(27,152,242);border-left-color: rgb(255,255,255);" name="condition" id="condition">
                    <option value="" selected="">Car Condition</option>
                    <option value="Poor">Poor</option>
                    <option value="Good">Good</option>
                    <option value="Excellent">Excellent</option>
                </select><span id="errorfuel"></span></div>
            <div class="submit-row" style="margin-bottom:8px;padding-top:0px;"><button class="btn btn-primary btn-block box-shadow"  value="upload" name="upload" type="submit" style="background: rgb(27,152,242);"><i class="fa fa-spinner"></i> Update</button></div>
            <div id="login-box-footer" style="padding: 10px 20px;padding-bottom: 23px;padding-top: 18px;background: rgb(27,152,242);">
                <p><a href="maintain.php" style="border-bottom-color: rgb(255,255,255);color: rgb(255,255,255);"><i class="fa fa-arrow-left"></i> Back</a></p>
            </div>
        </div>
    </div>
</form>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/JLX-Fixed-Nav-on-Scroll.js"></script>
    <script src="assets/js/WOWSlider-about-us.js"></script>
</body>

</html>