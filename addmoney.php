<?php
include "nav.php";
?>
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Add Money to Wallet</h4>
      
      <a class="heading-elements-toggle">
        <i class="la la-ellipsis-v font-medium-3"></i>
      </a>
      <div class="heading-elements">
        <ul class="list-inline mb-0">
          <li>
            <a data-action="collapse">
              <i class="ft-minus"></i>
            </a>
          </li>
          <li>
            <a data-action="reload">
              <i class="ft-rotate-cw"></i>
            </a>
          </li>
          <li>
            <a data-action="expand">
              <i class="ft-maximize"></i>
            </a>
          </li>
          <li>
            <a data-action="close">
              <i class="ft-x"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="row justify-content-md-center">
      <div class=" col-xl-6 col-lg-8 col-md-10">
        
        <div class="card-content collpase show">
          <div class="card-body">
            
            <form class="form form-horizontal" method="post">
              <div class="form-body">
                
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="eventRegInput5">Amount to Add</label>
                  <div class="col-md-9">
                    <input type="tel" id="eventRegInput5" class="form-control" name="amnt" placeholder="100" required>
                  </div>
                </div>

                
                <div class="form-actions center">
                  <button type="submit" class="btn btn-primary" name="save">
                    <i class="la la-check-square-o" ></i>Proceed to Add Amount                              </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <?php
    if(isset($_POST['save']))
    {
      
      $amnt=$_POST['amnt'];
      $role='student';
      date_default_timezone_set("Asia/Calcutta");
      $datetime=date("d-m-Y h:i:sa");
      $token= sha1(md5(uniqid(rand())));
      $salt = sha1(md5($email.$role));
      $query="select * from users where user_email='$mail'";
      $result=mysqli_query($conn,$query);
      if(mysqli_num_rows($result)>0)
      {
        
        
        while($row=mysqli_fetch_assoc($result))
        {
          
          $name=$row['user_name'];
          $prn=$row['user_prn'];
          $mobile=$row['user_mobile'];
          $acad=$row['user_acad_year'];
          $cast=$row['user_cast'];
          $rfid=$row['user_rfid'];
          $year=$row['user_year'];
        }
      }
      
      
      
      
      $purpose='Add '.$amnt.' to Payouth Wallet';
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
      curl_setopt($ch, CURLOPT_HEADER, FALSE);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
      curl_setopt($ch, CURLOPT_HTTPHEADER,
        array("X-Api-Key:test_98895c50f6c3acef2c56d7cb6ef",
          "X-Auth-Token:test_339777d69ce0a37daea6f30d635"));
      $payload = Array(
        "purpose" => $purpose,
        "amount" => $amnt,
        "buyer_name" => $name,
        "phone" => $mobile,
        "send_email" => true,
        "send_sms" => true,
        "email" => $mail,
        'allow_repeated_payments' => false,
        "redirect_url" => "https://payouth.ml/post.php",
        "webhook" => "https://payouth.ml/post.php"
      );
//===note =   instamojo does not localhost link in redirect_url so i use live then its tranfer the post data to localhost url 

      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
      $response = curl_exec($ch);
      curl_close($ch); 

//echo $response;
      $payment=json_decode($response,true);
      if($payment['success']==true){
    //echo "success";
    //Payment Data
        $successdata=$payment['payment_request'];
    //print_r($successdata);
        $query1="INSERT INTO wallet_transactions_bank(wallet_transaction_id,wallet_user_rfid,wallet_user_mobile,wallet_user_email,wallet_added_amount,wallet_status) VALUES ('".$successdata['id']."','$rfid','".$successdata['phone']."','".$successdata['email']."','".$successdata['amount']."','".$successdata['status']."')";
        $qr=mysqli_query($conn,$query1);
//echo $query1;
        $query2="INSERT INTO wallet_user_transactions(wallet_user_transaction_id,wallet_user_user_mobile,wallet_user_transaction_amount,wallet_user_status) VALUES ('".$successdata['id']."','".$successdata['phone']."','".$successdata['amount']."','".$successdata['status']."')";
        $qr1=mysqli_query($conn,$query2);
    //echo $query2;
    //echo $qr;
        if($qr){
          

         if($qr1){
          echo "<script>location='".$successdata['longurl']."'</script>";
        }
        
      }
      else{
        echo mysqli_error($conn);
        die();
      }
    }
    else{
      echo "failed to create order";
    }
    
    
    //Redirect($response['longurl'],302); //Go to Payment page



    

  }          
  
  
  ?>