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
     $id=$_SESSION['driver_id'];
    ?>

<?php


$id=$_GET['edt'];


$qry=mysqli_query($conn,"select * from driver WHERE driver_id='$id'");
$data=mysqli_fetch_array($qry);


$query="select * from driver_license_detail where driver_id='$id'";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);


if(isset($_POST['send']))
{

$license_no=$_POST['license_no'];
$expiry_date=$_POST['expiry_date'];
    
$command="UPDATE driver_license_detail
SET license_no='$license_no',expiry_date='$expiry_date'
Where driver_id='$id'";



$edit=mysqli_query($conn,$command);
  

if($edit){
mysqli_close($conn);

     
echo '<script>alert("License information Updated.");window.location = "dash-driver.php";</script>';

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


if(
 document.forms["form"]["license_no"].value==""&&
 document.forms["form"]["expiry_date"].value==""
)
{


ferror.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should not be empty.*</span>"
lerror.innerHTML="<span style='color:rgb(50,211,56);''>"+" Select Expiry date of your licens. *</span>"

return false;


}else{

//fname
    var fname=document.forms["form"]["license_no"].value;


if(fname=="")
{

    

   ferror.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should not be empty *</span>";
  return false;

}else if(fname.match(/^(?=.*[!@#\$%\^&\*])/))
{
    ferror.innerHTML="<span style='color:rgb(50,211,56);''>"+" field should not contain characters.*</span>";
return false;

}else
{

    ferror.innerHTML=""; 
}

//lname

var lname=document.forms["form"]["expiry_date"].value;


if(lname=="")
{

    lerror.innerHTML="<span style='color:rgb(50,211,56);''>"+" Select Expiry date of your license.*</span>";
  return false;

}
else
{

    lerror.innerHTML="";  
}





}
}

</script>
<body id="page-top">
 
        <div id="wrapper">
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top" style="background: #ffffff;">
                        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button><a href="dash-driver.php" style="font-weight: 600;color: rgb(50,211,56);">Back</a>
                            <ul class="navbar-nav flex-nowrap ml-auto">
                                <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                        <form class="form-inline mr-auto navbar-search w-100">
                                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                                <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item dropdown no-arrow mx-1"></li>
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                                </li>
                                <div class="d-none d-sm-block topbar-divider" style="color: #32d338;"></div>
                                <li class="nav-item dropdown no-arrow">
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="profile.php"><span class="text-white d-none d-lg-inline mr-2 text-gray-600 small" style="color: rgb(50,211,56);font-size: 16px;"><?php echo $data['last_name'].' '.$data['first_name'] ?></span><i class="far fa-user-circle" style="font-size: 28px;color: #32d338;"></i></a>
                                       
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="container-fluid">
                     
                        <div class="row mb-3">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <div class="row mb-3 d-none">
                                   
                                   
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow mb-3">
                                            <div class="card-header py-3">
                                                <p class="m-0 font-weight-bold" style="color: rgb(50,211,56);">License Information</p>
                                            </div>
                                            <div class="card-body">
                                                <form  action="" name="form" onsubmit="return validateForm();" method="post">
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="fname"><strong>License No.</strong></label><input class="form-control" value="<?php echo $row['license_no'] ?>" type="text" id="license_no" placeholder="License No" name="license_no"><span id="ferror"></span></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group"><label for="mname"><strong>Expiry Date</strong><br></label><input class="form-control" value="<?php echo $row['expiry_date'] ?>" type="text" onfocus="(this.type='date')"  id="expiry_date" placeholder="Expiry Date" name="expiry_date"><span id="lerror"></span></div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-row">
                                                        <div class="col">
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="form-row">
                                                       
                                                        <div class="col">
                                                            <div class="form-group"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><button class="btn btn-sm" type="submit" name="send" style="background: rgb(50,211,56);color: rgb(255,255,255);"><i class="fa fa-spinner" aria-hidden="true"></i> Update</button>&nbsp;
                                                    <a class="btn btn-sm" type="submit" name="send" href="dash-driver.php" style="background: rgb(50,211,56);color: rgb(255,255,255);"><i class="fa fa-arrow-left"></i> Back&nbsp;</a>
                                                </div>
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