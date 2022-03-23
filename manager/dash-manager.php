<!DOCTYPE html>
<html>
<?php
    include 'connect.php';
    //cart Check
   
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
     
      if(!isset($_SESSION)) 
      { 
          session_start(); 
          $email=$_SESSION['email'];
          $id=$_SESSION['manager_id'];
      }

      $qry="SELECT count(vehicle_id) as totalcars from vehicle";

      $res=mysqli_query($conn,$qry);
    
      $data=mysqli_fetch_array($res);

      $cmd="SELECT count(driver_id) as totalbookings from driver";

      $fetch=mysqli_query($conn,$cmd);
    
      $line=mysqli_fetch_array($fetch);


      $cmd1="SELECT count(driver_id) as totalbookings from booking";

      $fetch1=mysqli_query($conn,$cmd1);
    
      $line1=mysqli_fetch_array($fetch1);


      //fleet Officers
      $cmd2="SELECT count(officer_id) as totalofficers from fleet_officer";

      $fetch2=mysqli_query($conn,$cmd2);
    
      $line2=mysqli_fetch_array($fetch2);



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
 <?PHP
              
             

               

                              

              $query="SELECT * from manager where manager_id='$id'";
              $result=mysqli_query($conn,$query);
              
              $rows=mysqli_num_rows($result);
              
             
              
              if ($rows>0) {
                
                ?>
<body id="page-top" style="font-family: Montserrat, sans-serif;">
  
        <div id="wrapper">
        <nav class="navbar navbar-light align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: rgb(112,3,94);">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-car-side"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>VPS</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                                <?php
                    while ($rows=mysqli_fetch_array($result)) {
                  ?>
                     
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" ><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    
                    <li class="nav-item"><a class="nav-link" href="tblbooking.php?edt=<?php echo $rows['manager_id'];?>"><i class="far fa-list-alt fa-sm fa-fw mr-2 text-gray-400"></i><span>Approval</span></a></li>
                    
                    <li class="nav-item"><a class="nav-link" href="report.php?edt=<?php echo $rows['manager_id'];?>"><i class="far fa-list-alt fa-sm fa-fw mr-2 text-gray-400"></i><span>Report</span></a></li>
                   
                    <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-globe"></i><span>Tracker</span></a></li>
                   
                
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top" style="background: #ffffff;">
                        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                            <ul class="navbar-nav flex-nowrap ml-auto">
                               

                               
                                <li class="nav-item dropdown no-arrow mx-1"></li>
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                                </li>

           <div class="d-none d-sm-block topbar-divider" style="color: #32d338;"></div>
                                <li class="nav-item dropdown no-arrow">
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="profile.php"><span class="text-white d-none d-lg-inline mr-2 text-gray-600 small" style="color: rgb(50,211,56);font-size: 16px;"><?php echo $rows['last_name'].' '. $rows['first_name'];?></span><i class="far fa-user-circle" style="font-size: 28px;color: rgb(112,3,94);"></i></a>
                                        <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" style="font-size: 14px;">
                                        <a class="dropdown-item" href="profile.php?edt=<?php echo $rows['manager_id'];?>"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="container-fluid">
                        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                            <h3 class="text-dark mb-0">Manager Dashboard</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div class="card shadow border-left-primary py-2">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Vehicles </span></div>
                                                <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $data['totalcars'];  ?></span></div>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-car-alt fa-2x text-gray-300" style="color: rgb(50,211,56);"></i></div>
                                        </div><a class="card-link"  href="tblcars.php?edt=<?php echo $rows['manager_id'];?>">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div class="card shadow border-left-success py-2">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Bookings</span></div>
                                                <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $line1['totalbookings'];  ?></span></div>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-file-alt fa-2x text-gray-300"></i></div>
                                        </div><a class="card-link" href="report.php?edt=<?php echo $rows['manager_id'];?>"><span>View</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div class="card shadow border-left-info py-2">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Drivers</span></div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php echo $line['totalbookings'];  ?></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                        </div><a class="card-link" href="tbldriver.php?edt=<?php echo $rows['manager_id'];?>"><span>View</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div class="card shadow border-left-info py-2">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Fleet Officers</span></div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php echo $line2['totalofficers'];  ?></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                        </div><a class="card-link" href="tblofficers.php?edt=<?php echo $rows['manager_id'];?>"><span>View</span></a>
                                    </div>
                                </div>
                            </div>
                          
                        <div class="row">
                            <div class="col">
                                <div class="row" style="height: 324px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                  
                }
                ?>

<?php
              }else{
                ?>
                <h3>No record(s)</h3>
                <?php
              } ?>

                
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