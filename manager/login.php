<!DOCTYPE html>
<html lang="en">
<?php
 
 include 'connect.php'; 
if(isset($_POST['username']) && isset($_POST['password'])){
 //Assign

$username=$_POST['username'];
$password=md5($_POST['password']);
 session_start();

//check record


$query="select * from manager where username='$username'and password='$password'";



$result=mysqli_query($conn,$query) or die(mysqli_error($conn));


$row=mysqli_fetch_array($result);


if($row['username']==$username && $row['password']==$password)
{


   
    $_SESSION['email']=$row['email'];
    $email=$_SESSION['email'];
    $_SESSION['manager_id']=$row['manager_id'];
    $id=$_SESSION['manager_id'];
   
    
echo '<script>alert("Login was successful.");window.location = "dash-manager.php";</script>';  
    

}else
{


echo '<script>alert("Wrong login credentials.");window.location = "login.php";</script>';  
 exit;

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
        var uerror=document.getElementById("uerror");
        var perror=document.getElementById("perror");
        

    

        
        if(document.forms["form"]["username"].value=="" && document.forms["form"]["password"].value=="")
        {
        
        uerror.innerHTML="<span style='color:rgb(112,3,94)''>"+" Username required *</span>"
        perror.innerHTML="<span style='color:rgb(112,3,94)''>"+" password required *</span>"
       
        
        return false;
        
        }
        else
        {



        if(document.forms["form"]["username"].value=="")
        {
        
        uerror.innerHTML="<span style='rgb(112,3,94)''>"+" Username required *</span>"
        
        return false;
        
        }else
        {
         
            uerror.innerHTML="";

        }
  
        
        if(document.forms["form"]["password"].value=="")
        {
        
        perror.innerHTML="<span style='color:rgb(112,3,94)''>"+" password required *</span>"
        
        return false;
        
        }
        else
        {

            perror.innerHTML="";


        }

//
    
        }
        
        }
        </script>
<body style="background: rgb(255,255,255);font-family: Montserrat, sans-serif;">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="../index.php" style="color: rgb(112,3,94)">VPS&nbsp;<i class="fas fa-car-alt"></i></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mr-auto">
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="height: 477.676px;color: rgb(112,3,94);">
        <hr style="background: rgb(112,3,94)">
        <form  action="" name="form" onsubmit="return validateForm();" method="post">
        <div class="d-flex flex-column justify-content-center" data-aos="fade-up-right" data-aos-delay="50" id="login-box">
            <div class="login-box-header" style="background: rgb(112,3,94)">
                <h4 style="color: rgb(255,255,255);margin-bottom: 0px;font-weight: 400;font-size: 27px;">Login(Manager)</h4>
            </div>
            <div class="login-box-content"></div>
            <div class="email-login" style="background-colorrgb(112,3,94)">
            <div><input type="text" name="username" id="username" class="email-imput form-control" style="margin-top: 10px;border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(112,3,94)border-left-color: rgb(255,255,255);color: rgb(112,3,94)" placeholder="Username" ><span id="uerror"></span></div>
            <input type="password" id="password" name="password" class="password-input form-control" style="margin-top: 10px;border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color:rgb(112,3,94)border-left-color: rgb(255,255,255);color: rgb(112,3,94)" placeholder="Password" ><span id="perror"></span></div>
            <div class="submit-row" style="margin-bottom:8px;padding-top:0px;">
            <button class="btn btn-primary btn-block box-shadow" id="submit-id-submit" type="submit" name="login" style="background: rgb(112,3,94)">Login</button></div>
            <div id="login-box-footer" style="padding: 10px 20px;padding-bottom: 23px;padding-top: 18px;background:rgb(112,3,94)">
              
                <p style="margin-bottom: 0px;color: rgb(255,255,255);">Forgot Password ?<a id="register-link-1" href="passwordrecovery.php" style="color: rgb(255,255,255);">Click Here!</a></p>
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