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
  <link rel="apple-touch-icon" href="../app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/png" href="../app-assets/images/payouth.png">
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
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
              <li><a class="menu-item" href="admission.php">Add Users</a>
              </li>
              <li><a class="menu-item" href="admissionold.php">Pay Fees</a>
              </li>
              <li><a class="menu-item" href="admissionsearch.php">Search Users</a>
              </li>

              <?php
            }
            elseif ($section=="hostel") {
              ?>
              <li><a class="menu-item" href="hostel.php">Add Users</a>
              </li>
              <li><a class="menu-item" href="hostelsearch.php">Search Users</a>
              </li>
              

              <?php  
            }
            else{
              ?>
              <li><a class="menu-item" href="walletsearch.php">Search Users</a></li>
            </li>
            
            <?php
          }
          ?>
          
          
        </ul>
        
      </li>




      <?php
      if($section=="admission"){

        ?>
        <li class=" nav-item"><a href="admissionfees.php"><i class="ft-plus-circle"></i><span class="menu-title" data-i18n=""> Add Admission Fees</span></a></li>
        
        <?php
      }
      elseif ($section=="hostel") {
        ?>
        <li class=" nav-item"><a href="hostelfees.php"><i class="ft-plus-circle"></i><span class="menu-title" data-i18n="">Add Hostel Fees</span></a></li>
        <?php  
      }
      ?>
      
      
      <li class=" nav-item"><a href="#"><i class="ft-eye"></i><span class="menu-title" data-i18n="">View Transactions</span></a>
        <ul class="menu-content">

          <?php
          if($section=="admission"){

            ?>
            <li><a class="menu-item" href="admissiontrans.php">Admission Transactions</a>
            </li>
            
            <?php
          }
          elseif ($section=="hostel") {
            ?>
            <li><a class="menu-item" href="hosteltrans.php">Hostel Transactions</a>
            </li>
            
            <?php  
          }
          else{
            ?>
            <li><a class="menu-item" href="wallettrans.php">Wallet Transactions</a>
             
            </li>             
            <?php
          }
          ?>
          


          
        </ul>
        
      </li>
      
      <li class=" nav-item"><a href="sendnotification.php"><i class="ft-bell"></i><span class="menu-title" data-i18n="">Send Notifications</span></a>
        
      </li>

      <li class=" nav-item"><a href="logout.php"><i class="ft-user-x
        "></i><span class="menu-title" data-i18n="">Logout</span></a>
        
      </li>
      <br>
      <br>
      
    </ul>
    
    
    
  </div>
</div>
<!-- END: Main Menu-->

<!-- End: Customizer-->



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

</body>
<!-- END: Body-->


</html>