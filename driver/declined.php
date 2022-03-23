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
          $id=$_SESSION['driver_id'];
      }

      $qry="SELECT * from driver where email='$email'";

      $res=mysqli_query($conn,$qry);
    
      $data=mysqli_fetch_array($res);

   



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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search-2.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
    <link rel="stylesheet" href="assets/css/Table-with-search-1-1.css">
    <link rel="stylesheet" href="assets/css/Table-with-search-1.css">
</head>

<body id="page-top">
 
        <div id="wrapper">
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
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="profile.php"><span class="text-white d-none d-lg-inline mr-2 text-gray-600 small" style="color: rgb(50,211,56);font-size: 16px;"><?php echo $data['last_name'].' '.$data['first_name'] ?></span><i class="far fa-user-circle" style="font-size: 28px;color: rgb(50,211,56);"></i></a>
                                     
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="container-fluid">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="m-0 font-weight-bold" style="color:  rgb(50,211,56);">Declined bookings</p>
                            </div>

                            <?PHP
              
             

               

                              

              $query="SELECT * from booking,vehicle where booking.driver_id='$id' and booking.vehicle_id=vehicle.vehicle_id and booking.decline='1'";
              $result=mysqli_query($conn,$query);
              
              $rows=mysqli_num_rows($result);
              
             
              
              if ($rows>0) {
                
                ?>
                            <div class="card-body">
                                <section class="mt-4">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12 search-table-col" style="margin-top: 0px;font-family: Montserrat, sans-serif;font-size: 13px;">
                                                <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
                                                <div class="table-responsive table-bordered table table-hover table-bordered results">
                                                    <table class="table table-bordered table-hover"style="font-size:12px">
                                                        <thead class="bill-header cs" style="background: rgb(50,211,56);">
                                                            <tr>
                                                                <th id="trs-hd" class="col-lg-1">Vehicle#</th>
                                                                <th id="trs-hd-1" class="col-lg-1"><br>Car&nbsp;Registration&nbsp;No.<br></th>
                                                                <th id="trs-hd" class="col-lg-2"><br>Make<br></th>
                                                                <th id="trs-hd" class="col-lg-3">Color<br></th>
                                                                <th id="trs-hd" class="col-lg-2"><br>Image<br></th>
                                                                <th id="trs-hd" class="col-lg-2"><br>Mileage<br></th>
                                                                <th id="trs-hd" class="col-lg-2"><br>From<br></th>
                                                                <th id="trs-hd" class="col-lg-2"><br>To<br></th>
                                                                <th id="trs-hd-2" class="col-lg-2"><br>Fuel&nbsp;Type<br></th> 
                                                                <th id="trs-hd" class="col-lg-2"><br>Origin<br></th>
                                                                <th id="trs-hd" class="col-lg-2"><br>Destination<br></th>
                                                                <th id="trs-hd" class="col-lg-2"><br>Reason<br></th>
                                                               
                                                                <th id="trs-hd-2" class="col-lg-2"><br>Booking Status<br></th>
                                                            
                                                               
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="warning no-result">
                                                                <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                                                            </tr>
                                                            <?php
                                                            $x=1;
                                                            while ($rows=mysqli_fetch_array($result)) {
                                                          ?>
                                                            <tr>
                                                                <td><?php echo $x;  ?></td>
                                                                <td><?php echo $rows['registration_no'];  ?></td>
                                                                <td><?php echo $rows['make'];  ?></td>
                                                                <td><?php echo $rows['color'];  ?></td>
                                                                <td><img src="../officer/cars/<?php echo $rows['image'];?>" style="width: 125px;height:75px;"></td>
                                                                <td><?php echo $rows['mileage'];  ?></td>
                                                             
                                                                <td><?php echo $rows['booking_From_date'];  ?></td>
                                                                <td><?php echo $rows['booking_To_date'];  ?></td>
                                                                <td><?php echo $rows['fueltype'];  ?></td>
                                                                <td><a  target="_blank" href="<?php echo $rows['origin'];  ?>">View on map</a></td>
                                                                <td><a  target="_blank" href="<?php echo $rows['destination'];  ?>">View on map</a></td>
                                                              
                                                                <td><?php echo $rows['reason'];  ?></td>
                                                                <td>Declined (<?php echo $rows['comment']?>)</td>
                                                                
                                                                
                                                            </tr>

                                                            <?php
                                                            $x++;
                  
                }
                ?>
                                                        </tbody>
                                                    </table>


                                                    <?php
                                                }else{
                                                  ?>
                                                   <h3 style="text-align:center;color: rgb(50,211,56);font-size:14px">No record(s)</h3>
                                                  <?php
                                                } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
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
<p style="text-align:center;">
<a class="btn btn" style="background-color:rgb(50,211,56);color:rgb(255,255,255)" href="dash-driver.php"> <i class="fa fa-arrow-left"></i> Back</a>
           


          
        </p>
</html>