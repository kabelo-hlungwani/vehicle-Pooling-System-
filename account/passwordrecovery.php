<!DOCTYPE html>
<html lang="en">

<?php



if(isset($_POST['username']) && isset($_POST['phone']) &&isset($_POST['password'])){
 //Assign
 $cellno=$_POST['phone'];
$email=$_POST['username'];
$password=md5($_POST['password']);
//check record

include 'connect.php';


//master
$query1="select * from master where username='$email'and phone='$cellno'";
$result1=mysqli_query($conn,$query1) or die(mysqli_error($conn));
$row1=mysqli_fetch_array($result1);

//manager
$query2="select * from manager where username='$email'and phone='$cellno'";
$result2=mysqli_query($conn,$query2) or die(mysqli_error($conn));
$row2=mysqli_fetch_array($result2);

//officer
$query3="select * from 	fleet_officer where username='$email'and phone='$cellno'";
$result3=mysqli_query($conn,$query3) or die(mysqli_error($conn));
$row3=mysqli_fetch_array($result3);

//driver
$query4="select * from driver where username='$email'and phone='$cellno'";
$result4=mysqli_query($conn,$query4) or die(mysqli_error($conn));
$row4=mysqli_fetch_array($result4);



if($row1['username']==$email && $row1['phone']==$cellno)//master
{
     

    $command="UPDATE  master SET password='$password'
    WHERE master.username='$email'";
    
    
    $edit=mysqli_query($conn,$command);    
    
    if($edit){
    mysqli_close($conn);
    
 
    
 echo '<script type="text/javascript">alert("New password master stored."); window.location = "login.php";</script>';
    
    exit;
    
    }
  }
elseif($row2['username']==$email && $row2['phone']==$cellno)//manager
{
     

    $command="UPDATE  manager SET password='$password'
    WHERE manager.username='$email'";
    
    
    $edit=mysqli_query($conn,$command);    
    
    if($edit){
    mysqli_close($conn);
    
 
    
 echo '<script type="text/javascript">alert("New password manager stored."); window.location = "login.php";</script>';
    
    exit;
    
    }
  }
elseif($row3['username']==$email && $row3['phone']==$cellno)//officer
{
     

    $command="UPDATE  fleetofficer SET password='$password'
    WHERE fleetofficer.username='$email'";
    
    
    $edit=mysqli_query($conn,$command);    
    
    if($edit){
    mysqli_close($conn);
    
 
    
 echo '<script type="text/javascript">alert("New password officer stored."); window.location = "login.php";</script>';
    
    exit;
    
    }
  }
elseif($row4['username']==$email && $row4['phone']==$cellno)//driver
{
     

    $command="UPDATE  driver SET password='$password'
    WHERE driver.username='$email'";
    
    
    $edit=mysqli_query($conn,$command);    
    
    if($edit){
    mysqli_close($conn);
    
 
    
 echo '<script type="text/javascript">alert("New password driver stored."); window.location = "login.php";</script>';
    
    exit;
    
    }
  

}else
{

    echo '<script type="text/javascript">alert("Username and Phone number doesnt match."); window.location = "passwordrecovery.php";</script>';
     
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
var terror=document.getElementById("terror");
var ferror=document.getElementById("ferror");
var merror=document.getElementById("merror");
var lerror=document.getElementById("lerror");
var gerror=document.getElementById("gerror");
var cerror=document.getElementById("cerror");
var error=document.getElementById("error");

var errormessage=document.getElementById("errorpass");
var ierror=document.getElementById("ierror");

if(
 document.forms["form"]["phone"].value==""&&
 document.forms["form"]["username"].value==""&&
 document.forms["form"]["password"].value==""

 )
{


cerror.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should not be empty*</span>"
error.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should not be empty *</span>"
errormessage.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should not be empty *</span>"

return false;


}else{

//phone
var cellno=document.forms["form"]["phone"].value;

if(cellno=="")
{

   cerror.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should not be empty *</span>";
  return false;

}
if(cellno.substring(0,3)!='071'&& cellno.substring(0,3)!='072'&&
   cellno.substring(0,3)!='073'&& cellno.substring(0,3)!='074'&&
   cellno.substring(0,3)!='076'&& cellno.substring(0,3)!='060'&&
   cellno.substring(0,3)!='078'&& cellno.substring(0,3)!='079'&&
   cellno.substring(0,3)!='061'&& cellno.substring(0,3)!='062'&&
   cellno.substring(0,3)!='063'&& cellno.substring(0,3)!='064'&&
   cellno.substring(0,3)!='065'&& cellno.substring(0,3)!='066'&&
   cellno.substring(0,3)!='067'&& cellno.substring(0,3)!='068'&&
   cellno.substring(0,3)!='081'&& cellno.substring(0,3)!='082'&&
   cellno.substring(0,3)!='083'&& cellno.substring(0,3)!='084')
   {

 cerror.innerHTML="<span style='color:rgb(50,211,56);''>"+" Begin of the Mobile phone number invalid. *</span>"
    return false;
   
}
else if(cellno.substring(0,1)!="0")
{


cerror.innerHTML="<span style='color:rgb(50,211,56);''>"+" Mobile Phone number must start with 0.*</span>";
return false;
}
else
if(!cellno.match(/^[0-9]+$/))
{

cerror.innerHTML="<span style='color:rgb(50,211,56);''>"+"field should be filled with number only.*</span>";
return false;   
}
else
if(cellno.toString().length!=10)
{
cerror.innerHTML="<span style='color:rgb(50,211,56);''>"+"field should be 10 characters.*</span>";    

return false;   
}
else
{
cerror.innerHTML="";

}
//email



var email=document.forms["form"]["username"].value;

if(email=="")
{

   error.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should not be empty *</span>";
  return false;

}
else
{
error.innerHTML="";
}

//password
var passd=document.forms["form"]["password"].value;
var cpassd=document.forms["form"]["cpassword"].value;




var cerrormessage=document.getElementById("cerrorpass");
var pass=document.getElementById("password").value;

if(pass=="")
{

   errormessage.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should not be empty *</span>";
  return false;

}else
{
errormessage.innerHTML="";
}
//contain atleast 1 lowercase

if(!pass.match(/^(?=.*[a-z])/))
{
  errormessage.innerHTML="<span style='color:rgb(50,211,56);''>"+" Password should contain atleast 1 lowercase alphabetical character.*</span>";
return false;
}
else
{
errormessage.innerHTML="";
}
//contain atleast 1 uppercase
if(!pass.match(/^(?=.*[A-Z])/))
{
  errormessage.innerHTML="<span style='color:rgb(50,211,56);''>"+" Password should contain atleast 1 uppercase alphabetical character.*</span>";
return false;
}
else
{
errormessage.innerHTML="";
}
//contain atleast 1 numeric
if(!pass.match(/^(?=.*[0-9])/))
{
  errormessage.innerHTML="<span style='color:rgb(50,211,56);''>"+" Password should contain atleast 1 numeric character.*</span>"
return false;
}
else
{
errormessage.innerHTML="";
}
//contain special character
if(!pass.match(/^(?=.*[!@#\$%\^&\*])/))
{
  errormessage.innerHTML="<span style='color:rgb(50,211,56);''>"+" Password should contain special character.*</span>";
return false;
}
else
{
errormessage.innerHTML="";
}
//contain 8 or more characters
if(!pass.match(/^(?=.{8,})/))
{
  errormessage.innerHTML="<span style='color:rgb(50,211,56);''>"+" Password shouldcontain 8 or more characters.*</span>";
return false;
}
else
{
errormessage.innerHTML="";
}
//confirm password
//step 1
if(cpassd==""){

cerrormessage.innerHTML="<span style='color:rgb(50,211,56);''>"+" confirm Password.*</span>";
return false;   
}else
{

cerrormessage.innerHTML="";
}




if(cpassd!=passd){

errormessage.innerHTML="<span style='color:rgb(50,211,56);''>"+" Password doesnt match.*</span>"
cerrormessage.innerHTML="<span style='color:rgb(50,211,56);''>"+" Password doesnt match.*</span>"
return false;   
}else
{
errormessage.innerHTML=""
cerrormessage.innerHTML=""
}





}
}

</script>
<body style="background: rgb(255,255,255);font-family: Montserrat, sans-serif;">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="../index.php" style="color: rgb(50,211,56);">VPS&nbsp;<i class="fas fa-car-alt"></i></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php" style="color: rgb(50,211,56);font-weight: 600;">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../about.php" style="color: rgb(50,211,56);font-weight: 600;">About</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="height: 477.676px;">
        <hr style="background: #32d338;">
        <form  action="" name="form" onsubmit="return validateForm();" method="post">
        <div class="d-flex flex-column justify-content-center" data-aos="fade-up-right" id="login-box">
            <div class="login-box-header" style="background: rgb(50,211,56);">
                <h4 style="color: rgb(255,255,255);margin-bottom: 0px;font-weight: 400;font-size: 27px;">Password Recovery</h4>
            </div>
            
            <div class="login-box-content"></div>
            <div class="email-login" style="background-color:#ffffff;">
        
                <div style="padding-top: 15px;">
                   
                    <span id="gerror"></span>
                </div><input type="text" name="username" id="username" class="email-imput form-control" style="margin-top: 10px;border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(50,211,56);border-left-color: rgb(255,255,255);"  placeholder="Username" ><span id="error"></span>
                      <input type="text" name="phone" id="phone" class="email-imput form-control" style="margin-top: 10px;border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(50,211,56);border-left-color: rgb(255,255,255);"  placeholder="Phone" ><span id="cerror"></span>
                      <input type="password" name="password" id="password" class="password-input form-control" style="margin-top: 10px;border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(50,211,56);border-left-color: rgb(255,255,255);"  placeholder="New Password" ><span id="errorpass"></span>
                      <input type="password" name="cpassword" id="cpassword" class="password-input form-control" style="margin-top: 10px;border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(50,211,56);border-left-color: rgb(255,255,255);"  placeholder="Comfirm New Password" ><span id="cerrorpass"></span>
            </div>
            <div class="submit-row" style="margin-bottom:8px;padding-top:0px;">
            <input class="btn btn-primary btn-block box-shadow" id="submit-id-submit" type="submit" name="save" value="Save Password" style="background: rgb(50,211,56);"></div>
            <div id="login-box-footer" style="padding: 10px 20px;padding-bottom: 23px;padding-top: 18px;background: #32d338;">
                <p style="margin-bottom: 0px;color: rgb(255,255,255);"> Login ?<a id="register-link" href="login.php" style="color: rgb(255,255,255);">Click Here!</a></p>
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