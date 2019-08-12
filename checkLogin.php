<?php
session_start();
include 'admin/database.php';

  if(isset($_POST['login']))
  {
     
   $username=$_POST['uname'];
 
   $status="active";
    
    $password=$_POST['upass'];
    $password_hash=sha1(md5($password));
    
$query="SELECT * FROM users WHERE user_email='".$username."' AND user_password  = '".$password_hash."'";

$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0)
{ 
  $row=mysqli_fetch_array($res);
  $_SESSION['users_email']=$row['user_email'];
  $_SESSION['users_id']=$row['user_id'];
$_SESSION['users_mobile']=$row['user_mobile'];
header("Location:".$_SESSION['current_page']);
}
else
{
  echo'<script type="text/javascript">';
  echo"alert('Invalid Credentials.');";
  echo'window.location.href="login.php"';
  
  echo'</script>';
}
 
  }?>