<?php
include "admin/database.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Thank You, Mojo</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>

  <body>
    <div class="container">

      <div class="page-header">
        <h1><a href="index.php">Admission Fees</a></h1>
        <p class="lead">You have successfullly paid the fees</p>
      </div>

      <h3 style="color:#6da552">Thank You, Payment success!!</h3>
  

 <?php

include '../instamojo.php';

$api = new Instamojo\Instamojo('32eb68752e11b5c104d23d88198db2e7', '6e025540989153b27df2073e8a660040','https://www.instamojo.com/api/1.1/');

$payid = $_GET["payment_request_id"];

try {
    $response = $api->paymentRequestStatus($payid);


    if($response['payments'][0]['status']=="Credit"){
            echo "<h4>Payment ID: " . $response['payments'][0]['payment_id'] . "</h4>" ;
    echo "<h4>Payment Name: " . $response['payments'][0]['buyer_name'] . "</h4>" ;
    echo "<h4>Payment Email: " . $response['payments'][0]['buyer_email'] . "</h4>" ;
    
    $code=$response['purpose'];
      
      
       $query="UPDATE admission_fees_transactions SET fees_gateway_payment_id='".$response['payments'][0]['payment_id']."',fees_payment_type='".$response['payments'][0]['instrument_type']."',fees_billing_instrument='".$response['payments'][0]['billing_instrument']."',fees_status='Credit',fees_paid_datetime='".$response['payments'][0]['created_at']."' where fees_type='".$code."'";
      $res1=mysqli_query($conn,$query);
     echo $query;
      

    }
    
    else{
    echo"<script>alert('payment failed');</script>";
    echo "<script>window.location.href='https://payouth.ml/login.php';</script>";
    }
    

  echo "<pre>";
   print_r($response);
echo "</pre>";
    ?>


    <?php
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}



  ?>


      
    </div> <!-- /container -->


  </body>
</html>