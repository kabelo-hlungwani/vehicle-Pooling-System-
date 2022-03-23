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

    
    
    $allow=array('jpg');
    $temp=explode(".",$_FILES['photo']['name']);
    $extension=end($temp);
    $upload_file=$_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'],"cars/".$_FILES['photo']['name']);

//$qry=mysqli_query($con,"Insert into `pdf`(`file`) VALUES('".$upload_file."')");


$reg=$_POST['reg'];
$make=$_POST['make'];
$color=$_POST['color'];
$mile=$_POST['mile'];
$fuel=$_POST['fuel'];

  
$command="UPDATE  vehicle
 SET 
 registration_no='$reg',make='$make',color='$color',image='".$upload_file."', mileage='$mile', fueltype='$fuel'
 WHERE vehicle_id='$id'";



$edit=mysqli_query($conn,$command);
  

if($edit){
mysqli_close($conn);

     
echo '<script>alert("vehicle information Updated.");window.location = "tblvehicle.php";</script>';

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
<script>

    
function validateForm() 
{
var rerror=document.getElementById("rerror");
var merror=document.getElementById("merror");
var cerror=document.getElementById("cerror");
var errorpic=document.getElementById("errorpic");
var errormile=document.getElementById("errormile");
var errorfuel=document.getElementById("errorfuel");


if(
    document.forms["form"]["reg"].value==""&&   
 document.forms["form"]["make"].value==""&&
 document.forms["form"]["color"].value==""&&
 document.forms["form"]["photo"].value==""
 &&document.forms["form"]["mile"].value==""&&
 document.forms["form"]["fuel"].value==""

 )
{


    rerror.innerHTML="<span style='color:rgb(27,152,242);''>"+" please should be filled. *</span>"
    merror.innerHTML="<span style='color:rgb(27,152,242);''>"+" please should be filled. *</span>"
    cerror.innerHTML="<span style='color:rgb(27,152,242);''>"+" please should be filled. *</span>"
    errorpic.innerHTML="<span style='color:rgb(27,152,242);''>"+" please upload an image. *</span>"
    errormile.innerHTML="<span style='color:rgb(27,152,242);''>"+" Please fill the vehicle mileage. *</span>"
    errorfuel.innerHTML="<span style='color:rgb(27,152,242);''>"+" Please select fuel type. *</span>"


return false;


}else
{

    //registration_no
    var reg=document.forms["form"]["reg"].value;


if(reg=="")
{

    rerror.innerHTML="<span style='color:rgb(27,152,242);''>"+" field should not be empty *</span>";
  return false;

}
else if(reg.match(/^(?=.*[!@#\$%\^&\*])/))
{
rerror.innerHTML="<span style='color:rgb(27,152,242);''>"+" field should not contain alphabetical characters.*</span>";
return false;

}else
{

    rerror.innerHTML="";  
}


    //Make
    var make=document.forms["form"]["make"].value;


if(make=="")
{

    merror.innerHTML="<span style='color:rgb(27,152,242);''>"+" field should not be empty *</span>";
  return false;

}
else if(!make.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/))
{
lerror.innerHTML="<span style='color:rgb(27,152,242);''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

    merror.innerHTML="";  
}

    //color
    var color=document.forms["form"]["color"].value;


if(color=="")
{

    cerror.innerHTML="<span style='color:rgb(27,152,242);''>"+" field should not be empty *</span>";
  return false;

}
else if(!make.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/))
{
cerror.innerHTML="<span style='color:rgb(27,152,242);''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

    cerror.innerHTML="";  
}


//photo
var photo=document.forms["form"]["photo"].value;



if(photo=="")
{

    errorpic.innerHTML="<span style='color:red;''>"+" field should be selected *</span>";
  return false;


}else if(!(/\.(gif|jpe?g|tiff?|png|webp|bmp)$/i).test(photo))
{
    errorpic.innerHTML="<span style='color:red;''>"+" file extension should be (.jpg,.png,.jpeg,.gif).*</span>";

 
  return false;

}
else
{

    errorpic.innerHTML="";  
}
//mile

var mile=document.forms["form"]["mile"].value;


if(mile=="")
{

    errormile.innerHTML="<span style='color:rgb(27,152,242);''>"+" field should not be empty *</span>";
  return false;

}else if(!mile.match(/^[0-9]+$/))
{

cerror.innerHTML="<span style='color:rgb(27,152,242);''>"+"field should be filled with number only.*</span>";
return false;   
}
else
{

    errormile.innerHTML="";  
}



//fuel
var fuel=document.forms["form"]["fuel"].value;


if(fuel=="")
{

   errorfuel.innerHTML="<span style='color:rgb(27,152,242);''>"+" Select Fuel Type please!*</span>";
  return false;


}else
{

errorfuel.innerHTML="";  
}
}
}
</script>
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
                <h4 style="color: rgb(255,255,255);margin-bottom: 0px;font-weight: 400;font-size: 27px;">Update Vehicle Details</h4>
            </div>
            <form action="" name="form" enctype="multipart/form-data" onsubmit="return validateForm();"  method="post">
            <div class="login-box-content"></div>
            <div class="email-login" style="background-color:#ffffff;">
            <input type="text" class="email-imput form-control" style="margin-top: 10px;color: rgb(27,152,242);border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(27,152,242);border-left-color: rgb(255,255,255);"  value="<?php echo $data['registration_no'];?>" placeholder="Registration Number" name="reg" id="reg" ><span id="rerror"></span>
            <input type="text" class="email-imput form-control" style="margin-top: 10px;color: rgb(27,152,242);border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(27,152,242);border-left-color: rgb(255,255,255);"  value="<?php echo $data['make'];?>" placeholder="Make" name="make" id="make" ><span id="merror"></span>
            <input type="text" class="email-imput form-control" style="margin-top: 10px;color: rgb(27,152,242);border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(27,152,242);border-left-color: rgb(255,255,255);"  value="<?php echo $data['color'];?>" placeholder="Color"  name="color" id="color"><span id="cerror"></span>
            <br>
            <img src="cars/<?php echo $data['image'];?>" style="width: 150px;height:75px;">
            <input type="file" class="email-imput form-control" value="<?php echo $data['image'];?>" style="border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(27,152,242);border-left-color: rgb(255,255,255);" name="photo" id="photo" accept="image/x-png,image/jpeg,image/jpg"><span id="errorpic"></span>
            <input type="text" class="email-imput form-control" style="margin-top: 10px;color:rgb(27,152,242);border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(27,152,242);border-left-color: rgb(255,255,255);"  value="<?php echo $data['mileage'];?>" placeholder="Mileage" name="mile" id="mile"><span id="errormile"></span>
            <select class="email-imput form-control" style="border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(27,152,242);border-left-color: rgb(255,255,255);" name="fuel" id="fuel">
                    <option value="" selected="">Fuel Type</option>
                    <option value="Petrol">Petrol</option>
                    <option value="Diesel">Diesel</option>
                </select><span id="errorfuel"></span></div>
            <div class="submit-row" style="margin-bottom:8px;padding-top:0px;"><button class="btn btn-primary btn-block box-shadow"  value="upload" name="upload" type="submit" style="background: rgb(27,152,242);">Update</button></div>
            <div id="login-box-footer" style="padding: 10px 20px;padding-bottom: 23px;padding-top: 18px;background: rgb(27,152,242);">
                <p><a href="tblvehicle.php" style="border-bottom-color: rgb(255,255,255);color: rgb(255,255,255);">Back</a></p>
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