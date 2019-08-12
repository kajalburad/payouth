<?php
include "nav.php";
?>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Send/Pay Money</h4>
          
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
                              <label class="col-md-3 label-control" for="eventRegInput5">Amount</label>
                              <div class="col-md-9">
                                  <input type="tel" id="eventRegInput5" class="form-control" name="amnt" placeholder="100" required>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="eventRegInput5">Mobile No</label>
                              <div class="col-md-9">
                                  <input type="tel" id="eventRegInput5" class="form-control" name="mobile_no" placeholder="+919999911111" required>
                                </div>
                            </div>

                  
              <div class="form-actions center">
                              <button type="submit" class="btn btn-primary" name="save">
                                  <i class="la la-check-square-o" ></i>Proceed to Send Money                             </button>
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
    $merchant=$_POST['mobile_no'];
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
    
    $res=mysqli_query($conn,"Select * from wallet_amount where wallet_user_mobile='+91$mobile'");
    $wallet_balance=0;
    while($row=mysqli_fetch_assoc($res)){
        $wallet_balance=$row['wallet_user_balance'];
    }
    if($wallet_balance>=$amnt){
            $query="Insert into wallet_amount_transfer(`wallet_transaction_id`, `wallet_transaction_datetime`, `wallet_user_mobile`, `wallet_amount_to_transfer`, `wallet_merchant_mobile`) VALUES('$token','$datetime','+91$mobile','$amnt','$merchant')";
            $query1="Update wallet_amount set wallet_user_balance=(`wallet_user_balance`-$amnt) where wallet_user_mobile='+91$mobile'";
            $query2="Update wallet_amount set wallet_user_balance=(`wallet_user_balance`+$amnt) where wallet_user_mobile='$merchant'";
            mysqli_query($conn,$query);
            mysqli_query($conn,$query1);
            mysqli_query($conn,$query2);
            echo "<script>alert('Money Transferred Successfully');</script>";
    }else{
            echo "<script>alert('Insufficient funds to transfer');</script>";
    }

    
    
              
}              
   
        
          
                  
                  
?>