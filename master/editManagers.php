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


$qry=mysqli_query($conn,"select * from manager WHERE manager_id='$id'");
$data=mysqli_fetch_array($qry);


if(isset($_POST['update']))
{

    
    
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$username=$_POST['username'];
$phone=$_POST['phone'];

  
$command="UPDATE  manager
 SET 
 first_name='$fname',middle_name='$mname',last_name='$lname', gender='$gender', phone='$phone',username='$username',email='$email'
 WHERE manager_id='$id'";



$edit=mysqli_query($conn,$command);
  

if($edit){
mysqli_close($conn);

     
echo '<script>alert(" Manager information Updated.");window.location = "managers.php";</script>';

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
var terror=document.getElementById("terror");
var ferror=document.getElementById("ferror");
var merror=document.getElementById("merror");
var lerror=document.getElementById("lerror");
var gerror=document.getElementById("gerror");
var cerror=document.getElementById("cerror");
var error=document.getElementById("error");

var uerror=document.getElementById("uerror");
var ierror=document.getElementById("ierror");

if(
 document.forms["form"]["fname"].value==""&&
 document.forms["form"]["lname"].value==""&&
 document.forms["form"]["gender"].value==""&&
 document.forms["form"]["phone"].value==""&&
 document.forms["form"]["email"].value==""&&
 document.forms["form"]["username"].value==""

 )
{


ferror.innerHTML="<span style='color:rgb(21,132,38);''>"+" field should not be empty *</span>"

lerror.innerHTML="<span style='color:rgb(21,132,38);''>"+" field should not be empty *</span>"
gerror.innerHTML="<span style='color:rgb(21,132,38);''>"+" select gender*</span>"
cerror.innerHTML="<span style='color:rgb(21,132,38);''>"+" field should not be empty*</span>"
error.innerHTML="<span style='color:rgb(21,132,38);''>"+" field should not be empty *</span>"
uerror.innerHTML="<span style='color:rgb(21,132,38);''>"+" field should not be empty *</span>"


return false;


}else{

//fname
    var fname=document.forms["form"]["fname"].value;


if(fname=="")
{

   ferror.innerHTML="<span style='color:rgb(21,132,38);''>"+" field should not be empty *</span>";
  return false;

}else if(!fname.match(/^[a-zA-Z]*$/))
{
    ferror.innerHTML="<span style='color:rgb(21,132,38);''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

    ferror.innerHTML=""; 
}
//mname
    var mname=document.forms["form"]["mname"].value;


if(!mname.match(/^[a-zA-Z]*$/))
{
merror.innerHTML="<span style='color:rgb(21,132,38);''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

    merror.innerHTML=""; 
}
//lname

var lname=document.forms["form"]["lname"].value;


if(lname=="")
{

    lerror.innerHTML="<span style='color:rgb(21,132,38);''>"+" field should not be empty *</span>";
  return false;

}
else if(!lname.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/))
{
lerror.innerHTML="<span style='color:rgb(21,132,38);''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

    lerror.innerHTML="";  
}
//gender

var gender=document.forms["form"]["gender"].value;


if(gender=="")
{

   gerror.innerHTML="<span style='color:rgb(21,132,38);''>"+" Select gender please!*</span>";
  return false;


}else
{

gerror.innerHTML="";  
}
//phone
var cellno=document.forms["form"]["phone"].value;

if(cellno=="")
{

   cerror.innerHTML="<span style='color:rgb(21,132,38);''>"+" field should not be empty *</span>";
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

 cerror.innerHTML="<span style='color:rgb(21,132,38);''>"+" Begin of the Mobile phone number invalid. *</span>"
    return false;
   
}
else if(cellno.substring(0,1)!="0")
{


cerror.innerHTML="<span style='color:rgb(21,132,38);''>"+" Mobile Phone number must start with 0.*</span>";
return false;
}
else
if(!cellno.match(/^[0-9]+$/))
{

cerror.innerHTML="<span style='color:rgb(21,132,38);''>"+"field should be filled with number only.*</span>";
return false;   
}
else
if(cellno.toString().length!=10)
{
cerror.innerHTML="<span style='color:rgb(21,132,38);''>"+"field should be 10 characters.*</span>";    

return false;   
}
else
{
cerror.innerHTML="";

}
//email



var email=document.forms["form"]["email"].value;

if(email=="")
{

   error.innerHTML="<span style='color:rgb(21,132,38);''>"+" field should not be empty *</span>";
  return false;

}
else
if(!((email.indexOf(".") > 0) && (email.indexOf("@") > 0)) ||/[^a-zA-Z0-9.@_-]/.test(email))
{
error.innerHTML="<span style='color:rgb(21,132,38);''>"+" Invalid email.*</span>";

return false;
}else if(email.slice(-3)!="com" && email.slice(-5)!="ac.za" && email.slice(-6)!="gov.za" && email.slice(-3)!="org" && email.slice(-5)!="co.za")
{
  error.innerHTML="<span style='color:rgb(21,132,38);''>"+" Invalid email.*</span>";

return false;
}
else
{
error.innerHTML="";
}

//password

var pass=document.getElementById("username").value;

if(pass=="")
{

  uerror.innerHTML="<span style='color:rgb(21,132,38);''>"+" field should not be empty *</span>";
  return false;

}else
{
  uerror.innerHTML="";
}
//contain atleast 1 lowercase

if(!pass.match(/^(?=.*[a-z])/))
{
  uerror.innerHTML="<span style='color:rgb(21,132,38);''>"+" Username should contain atleast 1 lowercase alphabetical character.*</span>";
return false;
}
else
{
  uerror.innerHTML="";
}
//contain atleast 1 uppercase
if(!pass.match(/^(?=.*[A-Z])/))
{
  uerror.innerHTML="<span style='color:rgb(21,132,38);''>"+" Username should contain atleast 1 uppercase alphabetical character.*</span>";
return false;
}
else
{
  uerror.innerHTML="";
}
//contain atleast 1 numeric
if(!pass.match(/^(?=.*[0-9])/))
{
  uerror.innerHTML="<span style='color:rgb(21,132,38);''>"+" Username should contain atleast 1 numeric character.*</span>"
return false;
}
else
{
  uerror.innerHTML="";
}
//contain special character

//contain 8 or more characters
if(!pass.match(/^(?=.{8,})/))
{
  uerror.innerHTML="<span style='color:rgb(21,132,38);''>"+" Username shouldcontain 8 or more characters.*</span>";
return false;
}
else
{
  uerror.innerHTML="";
}





}
}

</script>
<body style="background: rgb(255,255,255);font-family: Montserrat, sans-serif;">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
       
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mr-auto">
               
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="height: 477.676px;">
        <hr style="background: #32d338;">
        <form  action="" name="form" onsubmit="return validateForm();" method="post" >
        <div class="d-flex flex-column justify-content-center" data-aos="fade-up-right" id="login-box">
            <div class="login-box-header" style="background: rgb(21,132,38);">
                <h4 style="color: rgb(255,255,255);margin-bottom: 0px;font-weight: 400;font-size: 27px;">Update Manager Details</h4>
            </div>
            
            <div class="login-box-content"></div>
            <div class="email-login" style="background-color:#ffffff;">
         
                <input type="text" name="fname" id="fname" value="<?php echo $data['first_name']?>"  class="email-imput form-control" style="margin-top: 10px;border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(21,132,38);border-left-color: rgb(255,255,255);"  placeholder="First Name" ><span id="ferror"></span>
                <input type="text" name="mname" id="mname" value="<?php echo $data['middle_name']?>" class="email-imput form-control" style="margin-top: 10px;border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(21,132,38);border-left-color: rgb(255,255,255);"  placeholder="Middle Name (Optional)" ><span id="merror"></span>
                <input type="text" name="lname" id="lname" value="<?php echo $data['last_name']?>" class="email-imput form-control" style="margin-top: 10px;border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(21,132,38);border-left-color: rgb(255,255,255);"  placeholder="Last Name" ><span id="lerror"></span>

                <div style="padding-top: 15px;"><label >Gender</label>
                    <div class="form-check" ><input class="form-check-input" name="gender"  value="Male" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Male</label></div>
                    <div class="form-check" ><input class="form-check-input" name="gender" value="Female" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Female</label></div>
                    <span id="gerror"></span>
                </div><input type="text" name="phone" id="phone" value="<?php echo $data['phone']?>" class="email-imput form-control" style="margin-top: 10px;border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(21,132,38);border-left-color: rgb(255,255,255);"  placeholder="Phone" ><span id="cerror"></span>
                      <input type="email" name="email" id="email" value="<?php echo $data['email']?>" class="email-imput form-control" style="margin-top: 10px;border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(21,132,38);border-left-color: rgb(255,255,255);"  placeholder="Email" ><span id="error"></span>
                      <input type="text" name="username" value="<?php echo $data['username']?>" id="username" readonly="" class="email-imput form-control" style="margin-top: 10px;border-top-color: rgb(255,255,255);border-right-color: rgb(255,255,255);border-bottom-color: rgb(21,132,38);border-left-color: rgb(255,255,255);"  placeholder="Username" ><span id="uerror"></span>
                      
            </div>
            <div class="submit-row" style="margin-bottom:8px;padding-top:0px;">
            <input class="btn btn-primary btn-block box-shadow" id="submit-id-submit" type="submit" name="update" value="Update" style="background: rgb(21,132,38);"></div>
            <div id="login-box-footer" style="padding: 10px 20px;padding-bottom: 23px;padding-top: 18px;background: rgb(21,132,38);">
                <p style="margin-bottom: 0px;color: rgb(255,255,255);"><a id="register-link" href="managers.php" style="color: rgb(255,255,255);">Back</a></p>
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