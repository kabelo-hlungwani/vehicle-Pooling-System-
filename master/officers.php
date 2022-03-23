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
          $id=$_SESSION['master_id'];
      }

      $qry="SELECT * from master where email='$email'";

      $res=mysqli_query($conn,$qry);
    
      $data=mysqli_fetch_array($res);

   



    ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Officers</title><link rel="icon" href="assets/img/carlogo.png">
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
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="profile.php"><span class="text-white d-none d-lg-inline mr-2 text-gray-600 small" style="color: rgb(50,211,56);font-size: 16px;"><?php echo $data['last_name'].' '.$data['first_name'] ?></span><i class="far fa-user-circle" style="font-size: 28px;color: rgb(21,132,38);"></i></a>
                                     
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="container-fluid">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="m-0 font-weight-bold" style="color:  rgb(21,132,38);">Fleet Officers</p>
                            </div>

                            <?PHP
              
             

               

                              

              $query="SELECT * from fleet_officer";
              $result=mysqli_query($conn,$query);
              
              $rows=mysqli_num_rows($result);
              
             
              
              if ($rows>0) {
                
                ?>
                            <div class="card-body">
                                <section class="mt-4">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12 search-table-col" style="margin-top: 0px;font-family: Montserrat, sans-serif;font-size: 13px;">
                                                <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" focus="" placeholder="Search by Name Or Surname."></div><span class="counter pull-right"></span>
                                                <div class="table-responsive table-bordered table table-hover table-bordered results">
                                                    <table class="table table-bordered table-hover">
                                                        <thead class="bill-header cs" style="background: rgb(21,132,38);">
                                                            <tr>
                                                              
                                                                <th id="trs-hd-1" style="text-align:left;">First name</th>
                                                                <th id="trs-hd-1" style="text-align:left;">Middle name</th>
                                                                <th id="trs-hd-1" style="text-align:left;">Last name</th>
                                                                <th id="trs-hd" style="text-align:left;">Gender</th>
                                                                <th id="trs-hd" style="text-align:left;">Phone</th>
                                                           
                                                                <th id="trs-hd" style="text-align:left;">Email</th>
                                                                <th id="trs-hd-2" style="text-align:left;">Username</th>
                                                                <th id="trs-hd" ><i class="fa fa-cog"></i> Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="warning no-result">
                                                                <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                                                            </tr>
                                                            <?php
                                                            while ($rows=mysqli_fetch_array($result)) {
                                                          ?>
                                                            <tr>
                                                           
                                                                <td><?php echo $rows['first_name'];  ?></td>
                                                                <td><?php echo $rows['middle_name'];  ?></td>
                                                                <td><?php echo $rows['last_name'];  ?></td>
                                                                <td><?php echo $rows['gender'];  ?></td>
                                                                <td><?php echo $rows['phone'];  ?></td>
                                                             
                                                                <td><?php echo $rows['email'];  ?></td>
                                                                <td><?php echo $rows['username'];  ?></td>
                                                               
                                                                <td><a class="btn btn-danger btn-sm border-white" title="Edit Officer" href="editOfficers.php?edt=<?php echo $rows['officer_id'];?>" style="margin-left: 5px;background: rgb(21,132,38);" type="submit"><i class="fa fa-edit"></i></a>
                                                                <a class="btn btn-danger btn-sm border-white" title="Delete Officer" href="delofficers.php?edt=<?php echo $rows['officer_id'];?>" style="margin-left: 5px;background: rgb(21,132,38);" type="submit"><i class="fa fa-trash"></i></a></td>
                                                            </tr>

                                                            <?php
                  
                }
                ?>
                                                        </tbody>
                                                    </table>


                                                    <?php
                                                }else{
                                                  ?>
                                                  <h3>No record(s)</h3>
                                                  <?php
                                                } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <p style="text-align:center;">
            <a class="btn btn" style="background-color:rgb(21,132,38);color:rgb(255,255,255)" href="dash-master.php"> <i class="fa fa-arrow-left"></i> Back</a>

    
        </p>  
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

</html>