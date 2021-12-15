<?php 

   session_start();

   require_once 'database\config.php';

    $connect = mysqli_connect('localhost','root' ,'','sweeps_db');

 // check connection
    if(!$connect){
        echo 'Connection error: ' .mysqli_connect_error();
    } 

    /*$users = $_SESSION['admin'];

    if (empty($users)){
        session_destroy();
        header("location: login.php");
    }
    $queryAd = "SELECT * FROM `user_tbl` WHERE `user_email` = $users";
 */

    $queryCR = mysqli_query($connect,"select * from order_tbl");


    

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home- Clean Reservation</title>

        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ms-3" href="CleanReservation.html">
                <img src="img/LOGO.png" alt="" width="30" height="24">
                Sweeps
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdown">
                        <li class="dropdown-item">Username</li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item text-secondary" href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- SideNav -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Booking</div>
                            <a class="nav-link" href="CleanReservation.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-broom"></i></div>
                                Clean Reservation
                            </a>
                            <a class="nav-link" href="CleanPrices.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-bill-wave"></i></div>
                                Cleaning Prices
                            </a>
                            <a class="nav-link" href="CleanerPrices.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-check-alt"></i></div>
                                Cleaner's Prices
                            </a>
                            <a class="nav-link" href="Summary.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                                Summary
                            </a>
                            <div class="sb-sidenav-menu-heading">Accounts</div>
                            <a class="nav-link" href="UserAccounts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                                User Accounts
                            </a>
                            <!-- <a class="nav-link" href="EmployeeRecord.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder-open"></i></div>
                                Employee Records
                            </a>
                            <div class="sb-sidenav-menu-heading">Payroll System</div>
                            <a class="nav-link" href="Payroll.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                                Payroll
                            </a>
                            <a class="nav-link" href="Jobs.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                                Job's Position
                            </a> -->
                        </div>
                    </div>
                </nav>
            </div>
            <!-- SidebarContent -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Clean Reservation</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item text-secondary">User's cleaning reservation records</li>                          
                        </ol>
                        <div class="container d-flex my-4 justify-content-end">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search here..." aria-label="Search">
                                <button class="btn btn-secondary text-light" type="submit"><i class="fas fa-search"> </i></button>
                              </form>
                        </div>
                       <div class="table-responsive">
                        <div class="table-responsive">
                        <?php while ($row = mysqli_fetch_array($queryCR)) { ?>
                        <table class="table table-striped table-hover table-align-middle text-center">

                            <thead>
                              <tr class="table-dark">
                                <th scope="col">User ID</th> 
                                <th scope="col">Username</th> 
                                <th scope="col">Cleaning Type</th> 
                                <th scope="col">Time</th>
                                <th scope="col">Date</th>                             
                                <th scope="col">Description</th>                              
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                           
                              <tr>   
                                <th scope="row"><?php echo $row['user_id']; ?></th>
                                <td><?= $row['order_id']; ?></td>
                                <td><?= $row['option_mode']; ?></td>
                                <td><?= $row['start']; ?></td>
                                <td><?= $row['date']; ?></td>
                                <td><?= $row['requirements']; ?></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success">
                                        <i class="fas fa-check"> </i> Accept
                                    </button>
                                      <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeModal">
                                        <i class="fas fa-times"> </i> Decline
                                      </button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                           <?php } ?>
                       </div>
                    </div>
                            <!-- Show Desc Modal -->
                            <div class="modal fade" id="showModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Reservation Description</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        This is were Description of clean reservation of user display!
                                    </div>
                                </div>
                                </div>
                            </div>

                             <!--Decline Modal -->
                            <div class="modal fade" id="removeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Are you sure to decline this Reservation?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Declining the reservation will permanentlly decline
                                        the request.
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger">Decline</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
