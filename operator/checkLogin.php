<?php
session_start();


include 'database.php';

  if(isset($_POST['login']))
  {
     
   $username=$_POST['uname'];
 
   $status="active";
    
    $password=$_POST['upass'];
    $password_hash=sha1(md5($password.$username));
    
$query="SELECT * FROM college_authority WHERE college_email='".$username."' AND college_password  = '".$password_hash."' and status='".$status."'";

$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0)
{ 
  $row=mysqli_fetch_array($res);
  $_SESSION['college_email']=$row['college_email'];
  $_SESSION['college_users_id']=$row['college_users_id'];
$_SESSION['college_section']=$row['college_section'];
//$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
//echo $_SESSION['current_page'];
 
header("Location: ". $_SESSION['current_page']);
}
else
{
  echo'<script type="text/javascript">';
  echo"alert('Invalid Credentials.');";
  echo'window.location.href="login.php"';
  
  echo'</script>';
}
 
  }?>