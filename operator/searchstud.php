<?php
include"index_first.php";
?>

<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-body"><!-- Input Validation start -->
<section class="input-validation">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Search User</h4>
          
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
                               <label for="validationServer01" class="col-md-3 label-control">RFID</label>
                            <div class="col-md-9">
                  <input type="text" class="form-control" id="validationServer01" placeholder="User name" name="uname" required autofocous="on">
                </div>
                 </div>

              <div class="form-actions center">
                              <button type="button" class="btn btn-danger mr-1">
                                <i class="ft-x"></i> Cancel
                              </button>
                              <button type="submit" class="btn btn-primary" name="save">
                                  <i class="la la-check-square-o" ></i> Search User
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
    $name=$_POST['uname'];
    $queryToSelect="select * from users where user_rfid='$name'";
    $result=mysqli_query($conn,$queryToSelect);
    if(mysqli_num_rows($result)>0)
    {
      
      
      while($row=mysqli_fetch_assoc($result))
      {
        echo "Name:".$row['user_name'];
        echo "Branch:".$row['user_branch'];
        echo "Mobile:".$row['user_mobile'];
        echo "Year:".$row['user_year'];
      }}

}
?>