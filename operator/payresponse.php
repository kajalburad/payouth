<?php
include "database.php";
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
  <meta http-equiv="refresh" content="5;url=https://payouth.ml">
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
      <h1><a href="index.php">Admission Fees Status</a></h1>
      
      <?php
      $pay_id=$_REQUEST['payment_id'];
      $req=$_REQUEST['payment_request_id'];
//print_r($_REQUEST);
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payments/'.$pay_id.'/');
      curl_setopt($ch, CURLOPT_HEADER, FALSE);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
      curl_setopt($ch, CURLOPT_HTTPHEADER,
        array("X-Api-Key:test_98895c50f6c3acef2c56d7cb6ef",
          "X-Auth-Token:test_339777d69ce0a37daea6f30d635"));

      $response = curl_exec($ch);
      curl_close($ch); 

      $json=json_decode($response,TRUE);
//print_r($json);
      if($json['success']==true){
       ?>
       
       <div class="jumbotron text-xs-center">
        <h1 class="display-3">Thank You!</h1>
        <p class="lead"><strong>Your paid admission fees successfully.</strong> To use PAYOUTH complete account setup with sent email or sms</p>
        <hr>
        
        

        <?php
        $status=$json['payment'];
        $purpose=$json['purpose'];
        
        $up=mysqli_query($conn,"UPDATE admission_fees_transactions SET fees_gateway_payment_id='".$status['payment_id']."',fees_payment_type='".$status['instrument_type']."',fees_billing_instrument='".$status['billing_instrument']."',fees_paid_datetime='".$status['created_at']."',fees_status='".$status['status']."' WHERE fees_trans_id='".$req."'");

    //echo $up;
        
        ?>
        
        <p class="lead"><strong>Payment ID:</strong><?php echo $status['payment_id'];?></p>
        <p class="lead"><strong>Transaction ID:</strong><?php echo $req;?></p>
        <hr>
        <p class="alert alert-success">Dear Student you will be redirected to homepage in 5 seconds</p>
        <?php
        
      }
      else{
       echo "payment failed";
     }
     ?>
     <p class="lead">
      <a class="btn btn-primary btn-sm" href="https://payouth.ml/" role="button">Continue to Payouth</a>
    </p>
  </div>