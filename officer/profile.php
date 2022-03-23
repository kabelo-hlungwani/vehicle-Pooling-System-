<!DOCTYPE html>
<html>
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


$qry=mysqli_query($conn,"select * from fleet_officer WHERE officer_id='$id'");
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

  
$command="UPDATE  fleet_officer
 SET 
 first_name='$fname',middle_name='$mname',last_name='$lname', gender='$gender', phone='$phone',username='$username',email='$email'
 WHERE officer_id='$id'";



$edit=mysqli_query($conn,$command);
  

if($edit){
mysqli_close($conn);

     
echo '<script>alert("Information Updated.");window.location = "dash-officer.php";</script>';

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
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
 document.forms["form"]["fname"].value==""&&
 document.forms["form"]["lname"].value==""&&
 document.forms["form"]["gender"].value==""&&
 document.forms["form"]["phone"].value==""&&
 document.forms["form"]["email"].value==""


 )
{


ferror.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should not be empty *</span>"

lerror.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should not be empty *</span>"
gerror.innerHTML="<span style='color:rgb(50,211,56);''>"+" select gender*</span>"
cerror.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should not be empty*</span>"
error.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should not be empty *</span>"


return false;


}else{

//fname
    var fname=document.forms["form"]["fname"].value;


if(fname=="")
{

   ferror.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should not be empty *</span>";
  return false;

}else if(!fname.match(/^[a-zA-Z]*$/))
{
    ferror.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

    ferror.innerHTML=""; 
}
//mname
    var mname=document.forms["form"]["mname"].value;


if(!mname.match(/^[a-zA-Z]*$/))
{
merror.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

    merror.innerHTML=""; 
}
//lname

var lname=document.forms["form"]["lname"].value;


if(lname=="")
{

    lerror.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should not be empty *</span>";
  return false;

}
else if(!lname.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/))
{
lerror.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

    lerror.innerHTML="";  
}
//gender

var gender=document.forms["form"]["gender"].value;


if(gender=="")
{

   gerror.innerHTML="<span style='color:rgb(50,211,56);''>"+" Select gender please!*</span>";
  return false;


}else
{

gerror.innerHTML="";  
}
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



var email=document.forms["form"]["email"].value;

if(email=="")
{

   error.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should not be empty *</span>";
  return false;

}
else
if(!((email.indexOf(".") > 0) && (email.indexOf("@") > 0)) ||/[^a-zA-Z0-9.@_-]/.test(email))
{
error.innerHTML="<span style='color:rgb(50,211,56);''>"+" Invalid email.*</span>";

return false;
}else if(email.slice(-3)!="com" && email.slice(-5)!="ac.za" && email.slice(-6)!="gov.za" && email.slice(-3)!="org" && email.slice(-5)!="co.za")
{
  error.innerHTML="<span style='color:rgb(50,211,56);''>"+" Invalid email.*</span>";

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
<body id="page-top">
    <div class="container">
        <div id="wrapper">
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top" style="background: #ffffff;">
                        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button><a href="dash-officer.php" style="font-weight: 600;color: rgb(27,152,242);">Back To Account</a>
                            <ul class="navbar-nav flex-nowrap ml-auto">
                                
                                <li class="nav-item dropdown no-arrow mx-1"></li>
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                                </li>
                                <div class="d-none d-sm-block topbar-divider" style="color: #32d338;"></div>
                                <li class="nav-item dropdown no-arrow">
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="profile.php"><span class="text-white d-none d-lg-inline mr-2 text-gray-600 small" style="color: rgb(50,211,56);font-size: 16px;"><?php echo $data['last_name'].' '.$data['first_name'] ?></span><i class="far fa-user-circle" style="font-size: 28px;color: rgb(27,152,242);"></i></a>
                                        <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" style="font-size: 14px;"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-car-side fa-sm fa-fw mr-2 text-gray-400"></i>Check Available Cars</a><a class="dropdown-item" href="#"><i class="far fa-list-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;View My Bookings</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="container-fluid">
                        <h3 class="text-center text-dark mb-4">Profile</h3>
                        <div class="row mb-3">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <div class="row mb-3 d-none">
                                   
                                   
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow mb-3">
                                            <div class="card-header py-3">
                                                <p class="m-0 font-weight-bold" style="color: rgb(27,152,242);">User Information</p>
                                            </div>
                                            <div class="card-body">
                                                <form  action="" name="form" onsubmit="return validateForm();" method="post">
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="fname"><strong>First Name</strong></label><input class="form-control" value="<?php echo $data['first_name']?>" type="text" id="fname" placeholder="First Name" name="fname"><span id="ferror"></span></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group"><label for="mname"><strong>Middle Name</strong><br></label><input class="form-control" type="text" value="<?php echo $data['middle_name']?>" id="mname" placeholder="Middle Name" name="mname"><span id="merror"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="lname"><strong>Last Name</strong></label><input class="form-control" type="text" id="lname" value="<?php echo $data['last_name']?>" placeholder="Last Name" name="lname"><span id="lerror"></span></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group"><label for="phone"><strong>Phone</strong><br></label><input class="form-control" type="text" value="<?php echo $data['phone']?>" id="phone" placeholder="Phone Number" name="phone"><span id="cerror"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="gender"><strong>Gender</strong><br></label>
                                                                <div class="form-check"><input class="form-check-input" name="gender" type="radio" value="Male" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Male</label></div>
                                                                <div class="form-check"><input class="form-check-input" name="gender" type="radio" value="Female" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Female</label></div>
                                                            </div><span id="gerror"></span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>Email</strong><br></label><input class="form-control" value="<?php echo $data['email']?>" type="email" id="email" placeholder="email@email.com" name="email" readonly=""><span id="error"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                       
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>Username</strong><br></label><input class="form-control" value="<?php echo $data['username']?>" type="text" id="username"  name="username" readonly=""> </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><button class="btn btn-sm" type="submit" name="update" style="background: rgb(27,152,242);color: rgb(255,255,255);">Save Information&nbsp;</button></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.php5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="assets/js/DataTable---Fully-BSS-Editable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>