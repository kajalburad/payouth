<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>PAYOUTH-LOGIN</title>
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
                        Register as Merchant
                    </div>
                </div>
                <div class="card-content">

                    <div class="card-body">
                        <form class="form-horizontal" action="" method="post">
                            <fieldset class="form-group position-relative has-icon-left">
                                <input name="merchant_name" type="text" class="form-control round" id="merchant_name" placeholder="Merchant-Name" required>
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                            </fieldset>

                                <fieldset class="form-group position-relative has-icon-left">
                                <input name="merchant_mobile" type="number" class="form-control round" id="merchant-phone" placeholder="Enter Mobile Number" required>
                                <div class="form-control-position">
                                    <i class="ft-phone"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input name="merchant_email" type="email" class="form-control round" id="merchant-email" placeholder="Email Address" required>
                                <div class="form-control-position">
                                    <i class="ft-mail"></i>
                                </div>
                            </fieldset>

                              <fieldset class="form-group position-relative has-icon-left">
                                <input name=" merchant_bank_account_number" type="text" class="form-control round" id="  merchant_bank_account_number" placeholder="Merchant-Account-Number" required>
                                <div class="form-control-position">
                                    <i class="ft-type"></i>
                                </div>
                            </fieldset>
                             <fieldset class="form-group position-relative has-icon-left">
                                <input name="merchant_bank_ifsc" type="text" class="form-control round" id="  merchant_bank_ifsc" placeholder="Merchant-Bank_Ifsc" required>
                                <div class="form-control-position">
                                    <i class="ft-type"></i>
                                </div>
                            </fieldset>

                             <fieldset class="form-group position-relative has-icon-left">
                                <input name="merchant_address" type="text" class="form-control round" id="merchant_address" placeholder="Merchant-Address" required>
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                            </fieldset>
                             
                            <fieldset class="form-group position-relative has-icon-left">
                                <input name="admin_password" type="password" class="form-control round" id="user-password" placeholder="Enter Password" required>
                                <div class="form-control-position">
                                    <i class="ft-lock"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input name="admin_confirmPassword" type="password" class="form-control round" id="user-password" placeholder="Confirm Password" required>
                                <div class="form-control-position">
                                    <i class="ft-lock"></i>
                                </div>
                            </fieldset>

                            <div class="form-group text-center">
                                <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1" name="admin_register">Register</button>
                            </div>

                        </form>
                    </div>

                    <p class="card-subtitle text-muted text-right font-small-3 mx-2 my-1">
                        <span>Already a member ?
                            <a href="merchant-login.php" class="card-link">Sign In</a>
                        </span>
                    </p>
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

    include "database.php";
    if (isset($_POST['admin_register'])) 
    {
      $role=$_POST['admin_role'];
      $email=$_POST['admin_email'];
      $password=$_POST['admin_password'];
      $confirm=$_POST['admin_confirmPassword'];
      $phone=$_POST['admin_mobile'];
      date_default_timezone_set('Asia/Calcutta');
      $acc_create=date("d-m-Y h:i:sa");
      $salt = sha1(md5($email.$role));
      $password_hash=sha1(md5($password.$email));
      if($password==$confirm)
      {


                        $resource_token_id = sha1(md5(uniqid(rand())));
                        $already_user="select college_email from college_authority where college_email='$email'";
                        $res_user=mysqli_query($conn,$already_user);
                        if(mysqli_num_rows($res_user)>0)
                        {
                                          
                                           echo"<script>";
                                          echo "alert('Dear User you are already registred. Please log in');";
                                          echo 'window.location.href="https://payouth.ml/admin/login.php";';
                                          echo"</script>";
                                          
                        }
                        else
                        {


                        $query="insert into college_authority(college_section,college_mobile,college_email,college_salt,college_password,college_resource_access_token,college_acc_created_datetime,status) values('$role','$phone','$email','$salt','$password_hash','$resource_token_id','$acc_create','nonactive')";
                        $res=mysqli_query($conn,$query);
                        if ($res) 
                        {
                          
                                          $to = $email;
                                      $subject = "Verification Mail From Payouth to $to";
                                      
$headers = "From: support@payouth.ml\r\n";
$headers .= "Reply-To: support@payouth.ml\r\n";
$headers .= "Return-Path: support@payouth.ml\r\n";
$headers .= "CC: support@payouth.ml\r\n";
$headers .= "BCC: support@payouth.ml\r\n";

                                      $message = "Please click the link below to verify and activate your account.";
                                      $message .= " ". "https://payouth.ml/admin/verifymail.php?passkey=$resource_token_id";

                                      $sentmail = mail($to,$subject,$message,$headers);

                                      if($sentmail)
                                      {
                                        echo"<script>";
                                                              echo "alert('Successfully Registered. Check and Verify mail for further registration process.');";
                                                              echo 'window.location.href="https://payouth.ml/admin/login.php";';
                                                              echo"</script>";    
                                      }
                                      else
                                      {
                                      echo "Cannot send Confirmation link to your e-mail address";
                                      }
                                            
                            
                          
                        }
                        else
                        {
                                          
                                          echo "error";

                                          
                        }
                    }
                }


else
{
                      
                  echo"<script>";
                                          echo "alert('Password and Confirm Password Not Match.');";
                                         
                                          echo"</script>"; 
                      

}
}

?>