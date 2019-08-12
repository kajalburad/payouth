<?php
session_start();
include "database.php";
if(isset($_GET['passkey']))
{
    $code=$_GET['passkey'];
    $queryToSelect="select * from college_authority where college_resource_access_token='$code' and status='nonactive'";
    $result=mysqli_query($conn,$queryToSelect);
    if(mysqli_num_rows($result)>0)
    {
      
      
      while($row=mysqli_fetch_assoc($result))
      {
        $id=$row['college_users_id'];
       // echo $id;
        $mob=$row['college_mobile'];
        
        
      }
      $cnt=0;
      if($cnt==0){
          
      
$key="591880d7475e9";	// key assigned for your crazydevelopers bulk sms account which is unique.
$mobile=$GLOBALS['mob']; // mobile number textbox
$senderid="PYOUTH";	// senderid which is assigned to you
$type="text"; 
$otp=rand(100000,999999);
//$_SESSION['ottp']=$otp;
$n1="Welcome to Payouth Admin Verification. Your Verification Code:".$otp;	// actual message content
$n = str_replace(' ', '%20', $n1);	// new string to accept space also


$ch=curl_init('http://sms.crazydevelopers.in/app/smsapi/index.php?key='.$key.'&type='.$type.'&contacts='.$mobile.'&senderid='.$senderid.'&msg='.$n.'');	// url to visit for sending message through api
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch,CURLOPT_POST,1);
 curl_setopt($ch,CURLOPT_POSTFIELDS,"");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);
 $data = curl_exec($ch);

          $cnt++;
      }
      
      
      
    }	// 

    else
    {
         echo"<script>";
                        echo "alert('Your mail is already verified');";
                        echo 'window.location.href="https://payouth.ml/admin/login.php";';
                        echo"</script>"; 
    }
}
else
{
                        echo"<script>";
                        echo "alert('Invalid Passkey or Some Failure. Please try again.');";
                        echo 'window.location.href="https://payouth.ml/admin/login.php";';
                        echo"</script>";  
}


?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Verify Otp</title>
    <link rel="apple-touch-icon" href="../app-assets/images/payouth.png">
    <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/payouth.png">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/toggle/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/forms/switch.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-switch.min.css">
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
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/login-register.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="text-center mb-1">
                            <img src="../app-assets/images/payouth.png">
                    </div>
    
                    <div class="font-large-1  text-center">
                        OTP Verification
                    </div>
                </div>
                <div class="card-content">

                    <div class="card-body">
                        <form class="form-horizontal" action="" method="post">
                            
                                <input name="passed_otp" type="hidden" class="form-control round" id="user-phone" value="<?php echo $otp?>">
                                
                           
                            <fieldset class="form-group position-relative has-icon-left">
                                <input name="admin_mobile" type="number" class="form-control round" id="user-phone" value="<?php echo $mob?>" disabled="">
                                <div class="form-control-position">
                                    <i class="ft-phone"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input name="admin_otp" type="number" class="form-control round" id="user-phone" placeholder="Enter Mobile Number" required>
                                <div class="form-control-position">
                                    <i class="ft-phone"></i>
                                </div>
                            </fieldset>
                            
                            <div class="form-group text-center">
                                <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1" name="admin_register">Verify OTP</button>
                            </div>

                        
                    </div>
</form>
                </div>
            </div>
        </div>
    </div>
</section>
        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="../app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
    <script src="../app-assets/js/scripts/forms/switch.min.js" type="text/javascript"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
    <script src="../app-assets/js/core/app.min.js" type="text/javascript"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/forms/form-login-register.min.js" type="text/javascript"></script>
    <!-- END: Page JS-->

  </body>
  
</html>



<?php
   
// Check if image file is a actual image or fake image
    if (isset($_POST['admin_register'])) 
    {
        $otpp=$_POST['admin_otp'];
        $gotp=$_POST['passed_otp'];
        echo "frm".$otpp;
        echo $gotp;
        if($otpp==$gotp){
            
            
                $query="update college_authority set status='active' where college_resource_access_token='$code'";
      $res=mysqli_query($conn,$query);
      
      

        echo"<script>";
                        echo "alert('Successfully Registered. Your account is activated');";
                        echo 'window.location.href="https://payouth.ml/admin/login.php";';
                        echo"</script>"; 
    
     }
     else
     {
        ?>
        <p class="card-subtitle text-muted text-right font-small-3 mx-2 my-1">
      
                        <span>Wrong OTP
                           
                        </span>
                        
                    </p>
        
        
        <?php
     }
    
            
    }
      
?>