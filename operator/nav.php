<?php
session_start();
include('database.php');
if(!isset($_SESSION['college_email']) && !isset($_SESSION['college_users_id']) )
{
  header("Location:login.php");
}
$mail=$_SESSION['college_email'];
$uid=$_SESSION['college_users_id'];
$section=$_SESSION['college_section'];
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Payouth-A smart solution for universities">
  <meta name="keywords" content="RFID based campus, smart Id,smart payment,library module,hostel module,smart lock for hostels,e-wallet,transaction system,smart-era">
  <meta name="author" content="payouth">
  <title>PAYOUTH-SMARTCAMPUS</title>
  <link rel="apple-touch-icon" href="../app-assets/images/payouth.png">
  <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/payouth.png">
  <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
  
  <!-- BEGIN: Vendor CSS-->
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/toggle/switchery.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/forms/switch.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-switch.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/charts/chartist.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
  <!-- END: Vendor CSS-->

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/components.min.css">
  <!-- END: Theme CSS-->

  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/chat-application.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/dashboard-analytics.min.css">
  <!-- END: Page CSS-->

  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

  <!-- BEGIN: Header-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light"> 
    <div class="navbar-wrapper">
      <div class="navbar-container content">
        <div class="collapse navbar-collapse show" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
            
            
            
          </ul>
          <ul class="nav navbar-nav float-right">         
            
            <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell bell-shake" id="notification-navbar-link"></i><span class="badge badge-pill badge-sm badge-danger badge-up badge-glow">5</span></a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <div class="arrow_box_right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6>
                  </li>
                  <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-share info font-medium-4 mt-2"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading info">New User Registered</h6>
                        <p class="notification-text font-small-3 text-muted text-bold-600">Shweta Mali</p><small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">3:30 PM</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-save font-medium-4 mt-2 warning"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading warning">New Transaction Done</h6>
                            <p class="notification-text font-small-3 text-muted text-bold-600">Rohit Khot</p><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">10:05 AM</time></small>
                            </div>
                          </div></a><a href="javascript:void(0)">
                            <div class="media">
                              <div class="media-left align-self-center"><i class="ft-repeat font-medium-4 mt-2 danger"></i></div>
                              <div class="media-body">
                                <h6 class="media-heading danger">Withdrawn Amount</h6>
                                <p class="notification-text font-small-3 text-muted text-bold-600">Rina Nimbokar</p><small>
                                  <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Yesterday</time></small>
                                </div>
                              </div></a><a href="javascript:void(0)">
                                <div class="media">
                                  <div class="media-left align-self-center"><i class="ft-shopping-cart font-medium-4 mt-2 primary"></i></div>
                                  <div class="media-body">
                                    <h6 class="media-heading primary">New Library User Added</h6><small>
                                      <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                                    </div>
                                  </div></a><a href="javascript:void(0)">
                                    <div class="media">
                                      <div class="media-left align-self-center"><i class="ft-heart font-medium-4 mt-2 info"></i></div>
                                      <div class="media-body">
                                        <h6 class="media-heading info">New Hostel User Added</h6><small>
                                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                                        </div>
                                      </div></a></li>
                                      <li class="dropdown-menu-footer"><a class="dropdown-item info text-right pr-1" href="javascript:void(0)">Read all</a></li>
                                    </div>
                                  </ul>
                                </li>
                                
                                <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             <span class="avatar avatar-online"><img src="../app-assets/images/users/admin.png" alt="avatar"></span></a>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="../app-assets/images/users/admin.png" alt="avatar"><span class="user-name text-bold-700 ml-1"><?php echo $mail;?></span></span></a>
                                      <div class="dropdown-divider"></div><a class="dropdown-item" href="changepass.php"><i class="ft-user"></i> Change Password</a>
                                      <div class="dropdown-divider"></div><a class="dropdown-item" href="sampletry://QrcallActivity"><i class="ft-user"></i> Scan QR Code</a>
                                      <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="ft-power"></i> Logout</a>
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </nav>
                      <!-- END: Header-->


                      <!-- BEGIN: Main Menu-->
                      <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="../app-assets/images/backgrounds/02.jpg">
                        <div class="navbar-header">
                          <ul class="nav navbar-nav flex-row">
                            <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html">&nbsp;&nbsp;&nbsp;&nbsp;<img  alt="payouth-logo" src="../app-assets/images/payouth.png" height="40px" width="170px" align="center" />
                            </a></li>
                            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
                          </ul>
                        </div>
                        <div class="navigation-background"></div>
                        <div class="main-menu-content">
                          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                            <li class=" nav-item"><a href="index.php"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
                              
                            </li>
                            <li class=" nav-item"><a href="#"><i class="ft-users"></i><span class="menu-title" data-i18n="">Users Desk</span></a>
                              <ul class="menu-content">
                                <?php
                                if($section=="admission"){

                                  ?>
                                  <li><a class="menu-item" href="admission.php">FY-DA Student Admission</a>
                                  </li>
                                  <li><a class="menu-item" href="admissionold.php">Admitted Student Admission</a>
                                  </li>
                                  <li><a class="menu-item" href="admissionsearch.php">Search Student</a>
                                  </li>
                                  <?php
                                }
                                elseif($section=="hostel"){

                                  ?>
                                  <li><a class="menu-item" href="hostel.php">Hostel Admission</a>
                                  </li>
                                  <li><a class="menu-item" href="hostelsearch.php">Search Student</a>
                                  </li>
                                  <?php
                                }
                                elseif($section=="wallet"){

                                  ?>   
                                  <li><a class="menu-item" href="wallet.php">Wallet User</a>
                                  </li>
                                  <li><a class="menu-item" href="walletsearch.php">Search Wallet User</a>
                                  </li>
                                  <?php
                                }?>
                              </ul>
                              
                            </li>
                            <?php
                            if($section=="admission"){

                              ?>   
                              
                              <li class=" nav-item"><a href="addfees.php"><i class="ft-plus-circle"></i><span class="menu-title" data-i18n=""> Add Admission Fees</span></a></li>
                              <?php
                            }?>

                            
                            
                            
                            
                            
                          </li>
                          <li class=" nav-item"><a href="#"><i class="ft-eye"></i><span class="menu-title" data-i18n="">View Transactions</span></a>
                            <ul class="menu-content">
                              <?php
                              if($section=="admission"){

                                ?>   
                                
                                <li><a class="menu-item" href="feespaid.php">Paid Transaction</a>
                                </li>
                                <li><a class="menu-item" href="feesunpaid.php">Unpaid Transactions</a>
                                </li>
                                <?php
                              }
                              elseif($section=="hostel"){

                                ?>   
                                
                                <li><a class="menu-item" href="hostelfeespaid.php">Paid Transaction</a>
                                </li>
                                <li><a class="menu-item" href="hostelfeesunpaid.php">Unpaid Transactions</a>
                                </li>
                                <?php
                              } else if($section=="wallet"){

                                ?>   
                                
                                <li><a class="menu-item" href="wallettrans.php">Wallet Transactions</a>
                                </li>
                                <?php 
                              }

                              ?>
                            </ul>
                            
                          </li>
                          
                          <li class=" nav-item"><a href="notify.php"><i class="ft-bell"></i><span class="menu-title" data-i18n="">Notify Student</span></a>
                            
                          </li>
                          
                          <br>
                          <br>
                          
                        </ul>
                        
                        
                        
                      </div>
                    </div>
                    <!-- END: Main Menu-->

                    <!-- BEGIN: Content-->
                    <div class="app-content content">
                      <div class="content-wrapper">
                        <div class="content-wrapper-before"></div>
                        <div class="content-header row">
                        </div>
                        <div class="content-body"><!-- Revenue, Hit Rate & Deals -->
                          <div class="row">
                            <!-- BEGIN: Vendor JS-->
                            <script src="../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
                            <script src="../app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
                            <script src="../app-assets/js/scripts/forms/switch.min.js" type="text/javascript"></script>
                            <!-- BEGIN Vendor JS-->

                            <!-- BEGIN: Page Vendor JS-->
                            <script src="../app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
                            <script src="../app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js" type="text/javascript"></script>
                            <!-- END: Page Vendor JS-->

                            <!-- BEGIN: Theme JS-->
                            <script src="../app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
                            <script src="../app-assets/js/core/app.min.js" type="text/javascript"></script>
                            <script src="../app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
                            <script src="../app-assets/vendors/js/jquery.sharrre.js" type="text/javascript"></script>
                            <!-- END: Theme JS-->

                            <!-- BEGIN: Page JS-->
                            <script src="../app-assets/js/scripts/pages/dashboard-analytics.min.js" type="text/javascript"></script>
                            <!-- END: Page JS-->



