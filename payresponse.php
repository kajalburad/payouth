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
<meta http-equiv="refresh" content="5;url=https://payouth.ml">
    <title>Wallet Amount Added</title>

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
        <h1><a href="index.php">Wallet Amount Added Status</a></h1>
       
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
  <p class="lead"><strong>Amount Added Successfully to Wallet</p>
  <hr>
 
  

<?php
 $status=$json['payment'];
 //$purpose=$json['purpose'];
 
$up=mysqli_query($conn,"UPDATE wallet_transactions_bank SET wallet_gateway_payment_id='".$status['payment_id']."',wallet_payment_type='".$status['instrument_type']."',wallet_billing_instrument='".$status['billing_instrument']."',wallet_paid_datetime='".$status['created_at']."',wallet_status='".$status['status']."' WHERE wallet_transaction_id='".$req."'");

$up1=mysqli_query($conn,"UPDATE wallet_user_transactions SET wallet_user_gateway_id='".$status['payment_id']."',wallet_user_payment_type='".$status['instrument_type']."',wallet_user_billing_instrument='".$status['billing_instrument']."',wallet_user_added_datetime='".$status['created_at']."',wallet_user_status='".$status['status']."' WHERE wallet_user_transaction_id='".$req."'");

$mbl=$status['buyer_phone'];

$amnt=$status['amount'];
         $queryToSelect="select * from wallet_amount where wallet_user_mobile='$mbl'";
         //echo $queryToSelect;
                      $result=mysqli_query($conn,$queryToSelect);
                      //echo mysqli_num_rows();
                     if(mysqli_num_rows($result)>0)
                        {
                            
                        	while($res=mysqli_fetch_assoc($result)){
                        	$balance=$res['wallet_user_balance'];                        	}
                        	$new=$balance+$amnt;
                        //	echo $new;
                        	$queryn="UPDATE wallet_amount SET wallet_user_balance='$new' WHERE wallet_user_mobile='".$mbl."'";
                        //	echo $queryn;
                            $up1=mysqli_query($conn,$queryn);
                            
                        }
                        else{
                            $queryi="INSERT INTO wallet_amount(wallet_user_mobile,wallet_user_balance)values('$mbl','$amnt')";
           //                 echo $queryi;
                        $up1=mysqli_query($conn,$queryi);
                        }
                            

    //echo $up;
    
    ?>
    
    <p class="lead"><strong>Payment ID:</strong><?php echo $status['payment_id'];?></p>
    <p class="lead"><strong>Transaction ID:</strong><?php echo $req;?></p>
  <hr>
    <p class="alert alert-success">Dear User you will be redirected to homepage in 5 seconds</p>
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