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
     $driver_id=$_SESSION['driver_id'];
    
    ?>
<?php


 $id=$_GET['edt'];


$qry=mysqli_query($conn,"select * from driver WHERE driver_id='$driver_id'");
$data=mysqli_fetch_array($qry);
//license check
$qry=mysqli_query($conn,"select * from driver WHERE driver_id='$driver_id'");
$data=mysqli_fetch_array($qry);
//vehicle
$qr=mysqli_query($conn,"select * from vehicle WHERE vehicle_id='$id'");
$get=mysqli_fetch_array($qr);

if(isset(($_POST['book'])))
{

$datefrom=$_POST['datefrom'];
$dateto=$_POST['dateto'];
$origin=$_POST['origin'];
$destination=$_POST['destination'];
$reason=$_POST['reason'];
$otherreason=$_POST['otherreason'];





$query="select * from booking where driver_id='$driver_id'";

$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

$row=mysqli_fetch_array($result);

$cmd="select * from driver_license_detail where driver_id='$driver_id'";
$output=mysqli_query($conn,$cmd) or die(mysqli_error($conn));
$line=mysqli_fetch_array($output);



if($line['driver_id']!=$driver_id)
{

    echo '<script type="text/javascript">alert("Update your license details."); window.location = "dash-driver.php";</script>';
    exit;


}else
{

    if($datefrom > $dateto)
    {
    
    
     echo '<script type="text/javascript">alert("date from cant be greater than date to."); window.location = "tblcars.php";</script>';
     exit;
    
    }else if($datefrom < date("Y-m-d"))
    {
    
    
     echo '<script type="text/javascript">alert("date from cant be less than current date."); window.location = "tblcars.php";</script>';
     exit;
    
    }else if(date("Y-m-d") > $line['expiry_date'] )
    {
    
        echo '<script type="text/javascript">alert("Your booking cannot be processed due to expired driver`s license."); window.location = "dash-driver.php";</script>';
        exit;
    
    }                      
    else{



        if($reason=='Other')
        {
            
            $command="UPDATE vehicle
            SET status='1' Where vehicle_id='$id'";
            
            
            
            $edit=mysqli_query($conn,$command);
              
            
                $sql="INSERT INTO booking(vehicle_id,driver_id, booking_From_date,booking_To_date,origin,destination,reason,booking_status,approved,del) 
                            VALUES ('$id','$driver_id','$datefrom','$dateto','$origin','$destination','$otherreason','1','0','0')";
                
                
            
                
                                    
                
                            if(mysqli_query($conn,$sql))
                            {
                    
                      echo '<script type="text/javascript">alert("booking pending approval."); window.location = "tblcars.php";</script>';
                         
                                                                         
                          }
                          else{
                            
                           die("<h3>unsuccessfully not registered </h3>".mysqli_error($conn));
                         
                         }

        }else{
           
$command="UPDATE vehicle
SET status='1' Where vehicle_id='$id'";



$edit=mysqli_query($conn,$command);
  

    $sql="INSERT INTO booking(vehicle_id,driver_id, booking_From_date,booking_To_date,origin,destination,reason,booking_status,approved,del) 
                VALUES ('$id','$driver_id','$datefrom','$dateto','$origin','$destination','$reason','1','0','0')";
    
    

    
                        
    
                if(mysqli_query($conn,$sql))
                {
        
          echo '<script type="text/javascript">alert("booking pending approval."); window.location = "tblcars.php";</script>';
             
                                                             
              }
              else{
                
               die("<h3>unsuccessfully not registered </h3>".mysqli_error($conn));
             
             }
           }

        }

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
    <link rel="stylesheet" href="assets/css/gift-product-long.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
    <link rel="stylesheet" href="assets/css/Table-with-search-1-1.css">
    <link rel="stylesheet" href="assets/css/Table-with-search-1.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search-2.css">
</head>
<script>

    
function validateForm() 
{
var terror=document.getElementById("terror");
var ferror=document.getElementById("ferror");
var origin=document.getElementById("origin");
var destination=document.getElementById("destination");
var reason=document.getElementById("reason");



if(
 document.forms["form"]["datefrom"].value==""&&
 document.forms["form"]["dateto"].value==""&&
 document.forms["form"]["origin"].value==""&&
 document.forms["form"]["destination"].value==""&&
 document.forms["form"]["reason"].value==""
 
)
{


ferror.innerHTML="<span style='color:rgb(50,211,56);''>"+" Select date from.*</span>"
lerror.innerHTML="<span style='color:rgb(50,211,56);''>"+" Select date to. *</span>"
origin.innerHTML="<span style='color:rgb(50,211,56);''>"+" please fill the field.*</span>"
destination.innerHTML="<span style='color:rgb(50,211,56);''>"+" please fill the field. *</span>"
reason.innerHTML="<span style='color:rgb(50,211,56);''>"+" please fill the field.*</span>"


return false;


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
                        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars" style="color: rgb(50,211,56);"></i></button>
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
                                    <div class="nav-item dropdown show no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="true" data-toggle="dropdown" ><span class="text-white d-none d-lg-inline mr-2 text-gray-600 small" style="color: rgb(50,211,56);font-size: 16px;"><?php echo $data['first_name'].' '.$data['last_name'] ?></span><i class="far fa-user-circle" style="font-size: 28px;color: rgb(50,211,56);"></i></a>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="container-fluid">
                        <div class="row mb-3">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="row mb-3 d-none">
                                    
                                   
                                </div>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="card shadow mb-3">
                                            <div class="card-header py-3">
                                                <p class="m-0 font-weight-bold" style="color: rgb(50,211,56);">Booking Details</p>
                                            </div>
                                            <div class="card-body">
                                                <form  action="" name="form" onsubmit="return validateForm();" method="post">
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group text-left"><img class="img-thumbnail" src="../officer/cars/<?php echo $get['image'] ?>" width="150" height="100"></div>
                                                        </div>
                                                        <div class="col">
                                                            <div><span>Registration No</span><span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="color: rgb(50,211,56);">
                                                                        <path d="M17 8L21 12M21 12L17 16M21 12L3 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg></span><span><?php echo $get['registration_no'] ?></span></div>
                                                            <div><span>Make</span><span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="color: rgb(50,211,56);">
                                                                        <path d="M17 8L21 12M21 12L17 16M21 12L3 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg></span><span><?php echo $get['make'] ?></span></div>
                                                            <div><span>Color</span><span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="color: rgb(50,211,56);">
                                                                        <path d="M17 8L21 12M21 12L17 16M21 12L3 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg></span><span><?php echo $get['color'] ?></span></div>
                                                            <div><span>Mileage Driven</span><span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="color: rgb(50,211,56);">
                                                                        <path d="M17 8L21 12M21 12L17 16M21 12L3 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg></span><span><?php echo number_format($get['mileage'],2) ?>KM</span></div>
                                                            <div><span>Mileage </span><span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="color: rgb(50,211,56);">
                                                                        <path d="M17 8L21 12M21 12L17 16M21 12L3 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg></span><span><?php echo number_format($get['max_mileage'],2) ?>KM</span></div>
                                                            <div><span>Mileage Remaining </span><span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="color: rgb(50,211,56);">
                                                                        <path d="M17 8L21 12M21 12L17 16M21 12L3 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg></span><span><?php echo number_format($get['max_mileage']-$get['mileage'],2) ?>KM</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>Booking From Date</strong><br></label><input class="form-control" required="" type="text" onfocus="(this.type='date')" id="last_name-1" id="datefrom" name="datefrom" placeholder="From date"><span id="ferror"></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>Booking To Date</strong><br></label><input class="form-control" required="" type="text" onfocus="(this.type='date')" id="last_name-1" id="dateto" name="dateto" placeholder="To date"><span id="lerror"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>Origin</strong><br></label><input class="form-control" required=""  type="text"  name="origin" id="origin" placeholder="Enter origin Here"><span id="origin"></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>Destination</strong><br></label><input class="form-control" required="" type="text" id="destination" id="destination" name="destination" placeholder="Enter destination here"><span id="destination"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>Reason</strong><br></label>
                                                        

                                                            <select class="form-control"  name="reason" id="reason" onchange='CheckColors(this.value);' required="">
                                                            <option value="">--Select Reason--</option>
                                                            <option value="Audit">Audit</option>
                                                            <option value="Meeting">Meeting</option>
                                                            <option value="Workshop">Workshop</option>
                                                            <option value="Team building">Team building</option>
                                                            <option value="Other">Other</option>

                                                            </select><span id="reason">
                                                            </div>
                                                          
                                                        </div>
                                                        <div class="col" style='display:none;' id="otherreason">
                                                            <div class="form-group"><label for="last_name"><strong>Other reason</strong><br></label><input class="form-control"   type="text"  name="otherreason" id="" placeholder="Enter reason"></div>
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="form-group"><button class="btn btn-sm" name="book" type="submit" style="background: rgb(50,211,56);color: rgb(255,255,255);" > <i class="fa fa-spinner" aria-hidden="true"></i> Book</button>
                                                    &nbsp;<a class="btn btn-sm" name="book" type="link" href="tblcars.php" style="background: rgb(50,211,56);color: rgb(255,255,255);" ><i class="fa fa-arrow-left"></i> Back</a>
                                                    &nbsp;<a class="btn btn-sm" name="book" type="link" href="tblcars.php"  onclick="return confirm('Do you wish to discard the booking?');"  style="background: rgb(50,211,56);color: rgb(255,255,255);" ><i class="fa fa-ban" aria-hidden="true"></i> Cancel</a></div>
                                                    <div class="form-group"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"></div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script type="text/javascript">
                                                            function CheckColors(val){
                                                            var element=document.getElementById('otherreason');
                                                            if(val=='Other')
                                                            element.style.display='block';
                                                            else  
                                                            element.style.display='none';
                                                            }

                                                            </script> 
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="assets/js/DataTable---Fully-BSS-Editable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
    <script src="assets/js/Table-with-search-1.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>