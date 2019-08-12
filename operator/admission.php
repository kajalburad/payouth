<?php
include "nav.php";
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
?>
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Add New Users</h4>
      
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
                 <label for="validationServer01" class="col-md-3 label-control">Name</label>
                 <div class="col-md-9">
                  <input type="text" class="form-control" id="validationServer01" placeholder="User name" name="uname" required>
                </div>
              </div>
              <div class="form-group row">
               <label for="validationServer01" class="col-md-3 label-control" required>Mobile</label>
               <div class="col-md-9">
                <input type="text" id="eventRegInput2" class="form-control" placeholder="Mobile" name="mobile">
              </div>
            </div>

            <div class="form-group row">
              <label for="validationServer01" class="col-md-3 label-control" required>Email</label>
              <div class="col-md-9">
                <input type="text" id="eventRegInput3" class="form-control" placeholder="Email" name="email">
              </div>
            </div>


            <div class="form-group row">
              <label for="validationServer01" class="col-md-3 label-control" required>User Role</label>
              <div class="col-md-9">
                <select class="select2 form-control" id="default-select" name="role">
                  <option value="student">Student</option>
                  <option value="staff">Staff</option>
                </select>
              </div>
            </div>

            
            
            <div class="form-group row">
              <label class="col-md-3 label-control" for="eventRegInput4">PRN</label>
              <div class="col-md-9">
                <input type="text" id="eventRegInput4" class="form-control" placeholder="2017btecs00207" name="prn" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="eventRegInput5">RFID_NO</label>
              <div class="col-md-9">
                <input type="tel" id="eventRegInput5" class="form-control" name="rfid" placeholder="009987654" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="validationServer01" class="col-md-3 label-control" required>Branch</label>
              <div class="col-md-9">
                <select class="select2 form-control" id="default-select" name="branch">
                  <option value="cse">CSE</option>
                  <option value="mech">Mechanical</option>
                  <option value="elec">Electrical</option>
                  <option value="civil">Civil</option>
                  <option value="it">IT</option>
                  <option value="electronics">Electronics</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="validationServer01" class="col-md-3 label-control" required>Year</label>
              <div class="col-md-9">
                <select class="select2 form-control" id="default-select" name="year">
                  <option value="1">FIRST</option>
                  <option value="2">SECOND</option>
                  <option value="3">THIRD</option>
                  <option value="4">FOURTH</option>
                  
                </select>
              </div>
            </div>

          </div>
          
          
          
          
          
          
          <div class="form-group row">
            <label for="validationServer01" class="col-md-3 label-control" required>Cast</label>
            <div class="col-md-9">
              <select class="select2 form-control" id="default-select" name="cast">
                <option value="">--Select Cast--</option>
                <option value="OPEN">OPEN</option>
                <option value="OBC">OBC</option>
                <option value="SC">SC</option>
                
              </select>
            </div>
          </div>

        </div>
        
        <input type="hidden" id="eventRegInput6" class="form-control" name="acad_year" value="2018-19">
        
      </div>

      <div class="form-actions center">
        <button type="submit" class="btn btn-primary" name="save">
          <i class="la la-check-square-o" ></i> Add User
        </button>
        <button type="button" class="btn btn-danger mr-1">
          <i class="ft-x"></i> Cancel
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
  $headers = "From: shubhamgadiya7374@gmail.com\r\n";
  $headers .= "Reply-To: shubhamgadiya7374@gmail\r\n";
  $headers .= "Return-Path: shubhamgadiya7374@gmail\r\n";
  $headers .= "CC: shubhamgadiya7374@gmail\r\n";
  $headers .= "BCC: shubhamgadiya7374@gmail\r\n";
  $subject="Payouth Account Creation";
  $name=$_POST['uname'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $role=$_POST['role'];
  $prn=$_POST['prn'];
  $rfid=$_POST['rfid'];
  $branch=$_POST['branch'];
  $year=$_POST['year'];
  $acad=$_POST['acad_year'];
  $cast=$_POST['cast'];
  date_default_timezone_set("Asia/Calcutta");
  $datetime=date("d-m-Y h:i:sa");
  $token= sha1(md5(uniqid(rand())));
  $salt = sha1(md5($email.$role));
  $query="insert into users(user_name,user_mobile,user_email,user_role,user_prn,user_rfid,user_branch,user_year,user_acad_year,user_acc_created_datetime,user_token,user_resource_access_token,	user_cast)values('$name','$mobile','$email','$role','$prn','$rfid','$branch','$year','$acad','$datetime','$salt','$token','$cast')";
  
  $res=mysqli_query($conn,$query);

  if($res)
  {
    $url='https://payouth.ml/activateAccount.php?passkey='.$token;
    if($role=="staff"){
     
      
      $url='https://payouth.ml/activateAccount.php?passkey='.$token;
$key="591880d7475e9";	// key assigned for your crazydevelopers bulk sms account which is unique.
// mobile number textbox
$senderid="PYOUTH";	// senderid which is assigned to you
$type="text"; 
//$_SESSION['ottp']=$otp;
$n1="Dear Staff click on link to complete account setup:".$url;	// actual message content
$n = str_replace(' ', '%20', $n1);	// new string to accept space also


$ch=curl_init('http://sms.crazydevelopers.in/app/smsapi/index.php?key='.$key.'&type='.$type.'&contacts='.$mobile.'&senderid='.$senderid.'&msg='.$n.'');	// url to visit for sending message through api
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,"");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);
$data = curl_exec($ch);
mail($email,$subject,$n1,$headers);


echo "<script>alert('Staff Added Successfully');</script>";   
}
if($role=="student"){
  
  if($year==1 || $year==2){
    
   
    $queryToSelect="select admission_fees from admission_fees_set where admission_user_cast='$cast' and admission_acad_year='$acad'";
    $rs=mysqli_query($conn,$queryToSelect);
    if(mysqli_num_rows($rs)>0)
    {
      
      
      while($row=mysqli_fetch_assoc($rs))
      {
        $fees=$row['admission_fees'];
        
      }
      
    }
    
    $purpose='Admission Fees For '.$year.' year under PRN:'.$prn;
    
    
    
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
      $qr=mysqli_query($conn,"INSERT INTO admission_fees_transactions(fees_trans_id,fees_type,fees_user_rfid,fees_user_mobile,fees_user_email,buyer_name,fees_paid_amount,fees_status,fees_user_acad_year,random_code) VALUES ('".$successdata['id']."','admission','$rfid','".$successdata['phone']."','".$successdata['email']."','".$successdata['buyer_name']."','".$successdata['amount']."','".$successdata['status']."','$acad','".$token."')");
      echo $qr;
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
    
    
    
    
/*        
    $qr=mysqli_query($conn,"INSERT INTO admission_fees_transactions(fees_type,fees_user_rfid,fees_user_mobile,fees_user_email,fees_paid_amount,fees_status,fees_user_acad_year,random_code) VALUES ('$purpose','$rfid','$mobile','$email','$fees','pending','$acad','".$token."')");
  echo $qr;      
        
include '../instamojo.php';

$api = new Instamojo\Instamojo('32eb68752e11b5c104d23d88198db2e7', '6e025540989153b27df2073e8a660040','https://www.instamojo.com/api/1.1/');


try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $fees,
        "buyer_name" => $name,
        "phone" => $mobile,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        'allow_repeated_payments' => false,
        "redirect_url" => "https://payouth.ml/admin/thankyou.php",
        "webhook" => "https://payouth.ml/admin/webhook.php"
        ));
    //print_r($response);

    $pay_ulr = $response['longurl'];
    
    //Redirect($response['longurl'],302); //Go to Payment page
*/

$key="591880d7475e9";	// key assigned for your crazydevelopers bulk sms account which is unique.
// mobile number textbox
$senderid="PYOUTH";	// senderid which is assigned to you
$type="text"; 
//$_SESSION['ottp']=$otp;
$n1="Dear FY/DA student please click on following link to complete payment:".$successdata['longurl']." and after that click on next link to complete account setup:".$url;	// actual message content
$n = str_replace(' ', '%20', $n1);	// new string to accept space also


$ch=curl_init('http://sms.crazydevelopers.in/app/smsapi/index.php?key='.$key.'&type='.$type.'&contacts='.$mobile.'&senderid='.$senderid.'&msg='.$n.'');	// url to visit for sending message through api
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,"");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);
$data = curl_exec($ch);
mail($email,$subject,$n1,$headers);

echo "<script>alert('User Created Successfully and payment link sent');</script>";
exit();

}

}          


}
}     


?>