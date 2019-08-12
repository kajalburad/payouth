<?php
include "nav.php";
?>
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Hostel Admission</h4>
      
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
                  <label class="col-md-3 label-control" for="eventRegInput5">RFID_NO</label>
                  <div class="col-md-9">
                    <input type="tel" id="eventRegInput5" class="form-control" name="rfid" placeholder="009987654" required>
                  </div>
                </div>

                
                <div class="form-actions center">
                  <button type="submit" class="btn btn-primary" name="save">
                    <i class="la la-check-square-o" ></i> Send Link
                  </button>
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
    
    $rfid=$_POST['rfid'];
    $role='student';
    date_default_timezone_set("Asia/Calcutta");
    $datetime=date("d-m-Y h:i:sa");
    $token= sha1(md5(uniqid(rand())));
    $salt = sha1(md5($email.$role));
    $query="select * from users where user_rfid='$rfid'";
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
        $email=$row['user_email'];
        $year=$row['user_year'];
      }
    }
    
    
    $queryToSelect="select hostel_fees from hostel_fees_set where hostel_acad_year='$acad'";
    $rs=mysqli_query($conn,$queryToSelect);
    if(mysqli_num_rows($rs)>0)
    {
      
      
      while($row1=mysqli_fetch_assoc($rs))
      {
        $fees=$row1['hostel_fees'];
       //echo $fees;
      }
      
    }
    
    $purpose='Hostel Admission Fees For '.$year.' year under PRN:'.$prn;
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
      "amount" => $fees,
      "buyer_name" => $name,
      "phone" => $mobile,
      "send_email" => true,
      "send_sms" => true,
      "email" => $email,
      'allow_repeated_payments' => false,
      "redirect_url" => "https://payouth.ml/admin/post.php",
      "webhook" => "https://payouth.ml/admin/post.php"
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
      $qr=mysqli_query($conn,"INSERT INTO admission_fees_transactions(fees_trans_id,fees_type,fees_user_rfid,fees_user_mobile,fees_user_email,buyer_name,fees_paid_amount,fees_status,fees_user_acad_year,random_code) VALUES ('".$successdata['id']."','hostel','$rfid','".$successdata['phone']."','".$successdata['email']."','".$successdata['buyer_name']."','".$successdata['amount']."','".$successdata['status']."','$acad','".$token."')");
    //echo $qr;
      if($qr){
        
        //echo "<script>location='".$successdata['longurl']."'</script>";
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


$key="591880d7475e9";	// key assigned for your crazydevelopers bulk sms account which is unique.
// mobile number textbox
$senderid="PYOUTH";	// senderid which is assigned to you
$type="text"; 
//$_SESSION['ottp']=$otp;
$n1="Dear student please click on following link to complete payment for hostel:".$successdata['longurl'] ;	// actual message content
$n = str_replace(' ', '%20', $n1);	// new string to accept space also


$ch=curl_init('http://sms.crazydevelopers.in/app/smsapi/index.php?key='.$key.'&type='.$type.'&contacts='.$mobile.'&senderid='.$senderid.'&msg='.$n.'');	// url to visit for sending message through api
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,"");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);
$data = curl_exec($ch);


echo "<script>alert('Payment Link Sent Successfully');</script>";
exit();




}          


?>