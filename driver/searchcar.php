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
<html>
<?php





$qry=mysqli_query($conn,"select * from driver WHERE driver_id='$id'");
$data=mysqli_fetch_array($qry);

$reg=$_POST['reg_number'];
$menu=$_POST['menu'];

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

<body id="page-top">
    <div class="container">
        <div id="wrapper">
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top" style="background: #ffffff;">
                        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars" style="color: rgb(50,211,56);"></i></button><a href="tblcars.php" style="font-weight: 600;color: rgb(50,211,56);">Back</a>
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
                                <form class="form-inline mr-auto navbar-search w-100" action="searchcar.php" method="post">
                                           
                                           
                                            <div class="input-group">
                                        <select name="menu" id="" style="font-size:13px" required  class="bg-light form-control border-0 small">

                                            <option  class="bg-light form-control border-0 small"  value="">Select Field to search</option>
                                            <option  class="bg-light form-control border-0 small" value="registration_no">Registration</option>
                                            <option  class="bg-light form-control border-0 small" value="model">Model</option>
                                            <option  class="bg-light form-control border-0 small" value="make">Make</option>
                                        </select>
                                        &nbsp;
                                        </div>
                                     
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" name="reg_number" required="" placeholder="Search box">
                                               
                                               </div> &nbsp;
                                        <div class="input-group"><input class="form-control border-0 small" type="submit" style="color:rgb(255,255,255);background:rgb(50,211,56);"name="search" value="search" required="" placeholder="Search by Registration">
                                               
                                               </div> 
                                               <div class="d-none d-sm-block topbar-divider" style="color: #32d338;"></div>
                                        </form>
                                <li class="nav-item dropdown no-arrow">
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown"><span class="text-white d-none d-lg-inline mr-2 text-gray-600 small" style="color: rgb(50,211,56);font-size: 16px;">Filter</span><i class="fas fa-sort-amount-down" style="font-size: 28px;color: rgb(50,211,56);"></i></a>
                                        <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" style="font-size: 14px;text-align: left;">
                                        <a class="dropdown-item" href="petrol.php"><i class="fas fa-funnel-dollar fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Petrol</a>
                                        <a class="dropdown-item" href="diesel.php"><i class="fas fa-funnel-dollar fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Diesel</a>
                                         
                                    </div>
                                   
                                       
                                    </div>
                                </li>
                            </ul>
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
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" ><span class="text-white d-none d-lg-inline mr-2 text-gray-600 small" style="color: rgb(50,211,56);font-size: 16px;"><?php echo $data['last_name'].' '.$data['first_name']?></span><i class="far fa-user-circle" style="font-size: 28px;color: rgb(50,211,56);"></i></a>
                                       
                                      
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <?PHP
              
             

              

                              

              $query="SELECT * from vehicle where $menu LIKE '%".$reg."%'";
              $result=mysqli_query($conn,$query);
              
              $rows=mysqli_num_rows($result);
              
             
              
              if ($rows>0) {
                
                ?>
                    <div class="container-fluid" data-aos="fade-up-right">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="m-0 font-weight-bold" style="color: rgb(50,211,56);">Car searched by <?php echo $menu.' ('.$reg.')' ?></p>
                            </div>
                            <div class="card-body">
                            <?php
                            $x=1;
                    while ($rows=mysqli_fetch_array($result)) {
                  ?>
                                <div class="gift row">
                                    <div class="gift__img col-sm-3 col-12"><img src="../officer/cars/<?php echo $rows['image']; ?>">
                                        <div class="gift__rating"><span class="gift__rating-number" style="color: rgb(118,118,118);font-weight: 600;font-family: Montserrat, sans-serif;">Vehicle#:&nbsp;</span><span class="gift__rating-number" style="color: rgb(65,204,0);font-weight: 600;font-family: Montserrat, sans-serif;"><?php echo $x ?></span></div>
                                    </div>
                                    <div class="gift__info col-sm-9 col-12">
                                        <h4 class="gift__name" style="color: rgb(50,211,56);font-size: 15px;"><?php echo $rows['make'] ?> (<?php echo $rows['registration_no'] ?>)</h4>
                                        <div class="gift__details"></div>
                                        <div class="gift__bottom row">
                                            <div class="gift__price-wrap col-12 col-sm-6">
                                                <div class="gift__normal-price"><span>Color:&nbsp;</span><span><?php echo $rows['color'] ?> </span></div>
                                                <div class="gift__today-price"><span style="font-weight: 600;">Mileage:&nbsp;</span><span class="gift__data" style="font-weight: 400;font-size: 14px;font-family: Montserrat, sans-serif;color: rgb(50,211,56);"><strong><?php echo number_format($rows['mileage'],2) ?> Km</strong></span></div>
                                                <div class="gift__quantity-left"><span>Fuel Type: </span><span class="gift__data"><?php echo $rows['fueltype'] ?> </span></div>
                                                <div class="gift__quantity-left"><span style="font-weight: 600;">Condition : </span><span class="gift__data"><?php echo $rows['description'] ?> </span></div>
                                                <div class="gift__quantity-left"><span style="font-weight: 600;">Status: </span><span style="font-weight: 400;font-size: 14px;font-family: Montserrat, sans-serif;color: rgb(50,211,56);" class="gift__data"><?php  if($rows['status']==0){ echo 'Available';}else{ echo 'Taken';} ?> </span></div>
                                            </div>
                                            <div class="gift__cta-wrap col-12 col-sm-6"><a class="flux_cta gift__cta" href="DoBook.php?edt=<?php echo $rows['vehicle_id']?>" style="font-weight: 600;font-family: Montserrat, sans-serif;background: rgb(50,211,56);font-size: 15px;"  onclick="return confirm('The vehicle has (<?php echo number_format($rows['max_mileage']-$rows['mileage']) ?>) KM left do you wish to continue with the booking?');" >Book</a></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $x++;
                  
                }
                ?>
                <?php
              }else{
                ?>
                 <h3 style="text-align:center;color: rgb(50,211,56);font-size:14px">0 found record(s) please search again</h3>
                <?php
              } ?>
                               
                               
                            </div>
                        </div>
                    </div>
                </div>
            
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

</html>