<?php
include "nav.php";
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
?>
<?php if($section=="admission"){
    
    ?>
    <div class="card pull-up bg-gradient-directional-warning col-md-3">
        <div class="card-header bg-hexagons-warning">
            <h4 class="card-title white">Total Admitted Students</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            
        </div>
        <div class="card-content collapse show bg-hexagons-warning">
            <div class="card-body">
                <div class="media d-flex">
                   <div class="media-body ">
                      <?php
                      $queryToSelect="select * from users where user_role='student' ";
                      $result=mysqli_query($conn,$queryToSelect);
                      if(mysqli_num_rows($result)>0)
                      {
                        $cnt=mysqli_num_rows($result);
                    }
                    ?>     
                    <h3 class="font-large-2 white"><?php echo $cnt;?></h3>
                    <a class="btn btn-sm btn-white warning box-shadow-1 round btn-min-width " href="admissionsearch.php" target="_blank">Student Search<i class="ft-bar-chart pl-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-1"></div>
<div class="card pull-up bg-gradient-directional-success col-md-3">
    <div class="card-header bg-hexagons-success">
        <h4 class="card-title white">Fees Paid Student</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        
    </div>
    <div class="card-content collapse show bg-hexagons-success">
        <div class="card-body">
            <div class="media d-flex">
                <?php
                $queryToSelect="select * from admission_fees_transactions where fees_status='Credit' and fees_type='admission'";
                $result=mysqli_query($conn,$queryToSelect);
                if(mysqli_num_rows($result)>0)
                {
                    $cnt1=mysqli_num_rows($result);
                }
                ?>
                <div class="media-body">
                    <h3 class="font-large-2 white"><?php echo $cnt1;?></h3>
                    <a class="btn btn-sm btn-white success box-shadow-1 round btn-min-width " href="feespaid.php" target="_blank">Search Paid Fees<i class="ft-bar-chart pl-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-1"></div>
<div class="card pull-up bg-gradient-directional-danger col-md-3">
    <div class="card-header bg-hexagons-danger">
        <h4 class="card-title white">Fees Unpaid Students</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        
    </div>
    <div class="card-content collapse show bg-hexagons-danger">
        <div class="card-body">
         
            <h3 class="font-large-2 white"><?php echo $cnt-$cnt1;?></h3>
            
            <a class="btn btn-sm btn-white danger box-shadow-1 round btn-min-width " href="feesunpaid.php" target="_blank">Search Unpaid Fees<i class="ft-bar-chart pl-1"></i></a>
        </div>
    </div>
</div>
</div>
</div>








<!--/ Revenue, Hit Rate & Deals -->
<!-- Emails Products & Avg Deals -->
<div class="row">
    
    <div class="col-md-12 col-lg-8">
        <div class="card">
            <div class="card-header p-1">
                <h4 class="card-title float-left">Current Admission Fees&nbsp; &nbsp; <span class="blue-grey lighten-2 font-small-3 mb-0">Year</span></h4>
                <?php
                $queryToSelect="select * from admission_fees_set where admission_user_cast='OPEN'";
                $result=mysqli_query($conn,$queryToSelect);
                if(mysqli_num_rows($result)>0)
                {
                    while($res=mysqli_fetch_assoc($result))
                    {
                        $open=$res['admission_fees'];
                    }
                }
                ?>     
                
            </div>
            <div class="card-content collapse show">
                <div class="card-footer text-center p-1">
                    <div class="row">
                        <div class="col-md-4 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                            <p class="blue-grey lighten-2 mb-0">Open</p>
                            <p class="font-medium-5 text-bold-400"><?php echo $open;?></p>
                        </div>
                        <?php
                        $queryToSelect="select * from admission_fees_set where admission_user_cast='OBC'";
                        $result=mysqli_query($conn,$queryToSelect);
                        if(mysqli_num_rows($result)>0)
                        {
                            while($res=mysqli_fetch_assoc($result))
                            {
                                $open=$res['admission_fees'];
                            }
                        }
                        ?>            
                        <div class="col-md-4 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                            <p class="blue-grey lighten-2 mb-0">OBC</p>
                            <p class="font-medium-5 text-bold-400"><?php echo $open;?></p>
                        </div>
                        <?php
                        $queryToSelect="select * from admission_fees_set where admission_user_cast='SC'";
                        $result=mysqli_query($conn,$queryToSelect);
                        if(mysqli_num_rows($result)>0)
                        {
                            while($res=mysqli_fetch_assoc($result))
                            {
                                $open=$res['admission_fees'];
                            }
                        }
                        ?>  
                        <div class="col-md-4 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                            <p class="blue-grey lighten-2 mb-0">SC</p>
                            <p class="font-medium-5 text-bold-400"><?php echo $open;?></p>
                        </div>
                        
                    </div>
                    <hr>
                    <span class="text-muted"><a href="admissionfees.php" class="danger darken-2">Admission Fees</a>   Report</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card pull-up border-top-info border-top-3 rounded-0">
            <div class="card-header">
                <h4 class="card-title">First Year Students</h4>
            </div>
            <?php
            $queryToSelect="select * from users where user_year='1'";
            $result=mysqli_query($conn,$queryToSelect);
            if(mysqli_num_rows($result)>0)
            {
                $cnt=mysqli_num_rows($result);
            }
            else{
                $cnt=0;
            }
            ?>  
            <div class="card-content collapse show">
                <div class="card-body p-1">
                    <h4 class="font-large-1 text-bold-400"><?php echo $cnt;?><i class="ft-users float-right"></i></h4>
                </div>
                
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-4">
        <div class="card pull-up border-top-info border-top-3 rounded-0">
            <div class="card-header">
                <h4 class="card-title">Second Year Students</h4>
            </div>
            <?php
            $queryToSelect="select * from users where user_year='2'";
            $result=mysqli_query($conn,$queryToSelect);
            if(mysqli_num_rows($result)>0)
            {
                $cnt=mysqli_num_rows($result);
            }
            else{
                $cnt=0;
            }
            ?>  
            <div class="card-content collapse show">
                <div class="card-body p-1">
                    <h4 class="font-large-1 text-bold-400"><?php echo $cnt;?><i class="ft-users float-right"></i></h4>
                </div>
                
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-4">
        <div class="card pull-up border-top-info border-top-3 rounded-0">
            <div class="card-header">
                <h4 class="card-title">Third Year Students</h4>
            </div>
            <?php
            $queryToSelect="select * from users where user_year='3'";
            $result=mysqli_query($conn,$queryToSelect);
            if(mysqli_num_rows($result)>0)
            {
                $cnt=mysqli_num_rows($result);
            }
            else{
                $cnt=0;
            }
            ?>  

            <div class="card-content collapse show">
                <div class="card-body p-1">
                    <h4 class="font-large-1 text-bold-400"><?php echo $cnt;?><i class="ft-users float-right"></i></h4>
                </div>
                
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-4">
        <div class="card pull-up border-top-info border-top-3 rounded-0">
            <div class="card-header">
                <h4 class="card-title">B.Tech Students</h4>
            </div>
            <?php
            $queryToSelect="select * from users where user_year='4'";
            $result=mysqli_query($conn,$queryToSelect);
            if(mysqli_num_rows($result)>0)
            {
                $cnt=mysqli_num_rows($result);
            }
            else{
                $cnt=0;
            }
            ?>  
            <div class="card-content collapse show">
                <div class="card-body p-1">
                    <h4 class="font-large-1 text-bold-400"><?php echo $cnt;?><i class="ft-users float-right"></i></h4>
                </div>
                
            </div>
        </div>
    </div>
<?php }elseif($section=="hostel"){   ?>

  <div class="card pull-up bg-gradient-directional-warning col-md-3">
    <div class="card-header bg-hexagons-warning">
        <h4 class="card-title white">Total Admitted Students</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        
    </div>
    <div class="card-content collapse show bg-hexagons-warning">
        <div class="card-body">
            <div class="media d-flex">
               <div class="media-body ">
                  <?php
                  $queryToSelect="select * from users where user_role='student' and hostel='1'";
                  $result=mysqli_query($conn,$queryToSelect);
                  if(mysqli_num_rows($result)>0)
                  {
                    $cnt=mysqli_num_rows($result);
                }
                ?>     
                <h3 class="font-large-2 white"><?php echo $cnt;?></h3>
                <a class="btn btn-sm btn-white warning ox-shadow-1 round btn-min-width " href="hostelsearch.php" target="_blank">Student Search<i class="ft-bar-chart pl-1"></i></a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="col-md-1"></div>
<div class="card pull-up bg-gradient-directional-success col-md-3">
    <div class="card-header bg-hexagons-success">
        <h4 class="card-title white">Fees Paid Student</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        
    </div>
    <div class="card-content collapse show bg-hexagons-success">
        <div class="card-body">
            <?php
            $queryToSelect="select * from admission_fees_transactions where fees_status='Credit' and fees_type='hostel'";
            $result=mysqli_query($conn,$queryToSelect);
            if(mysqli_num_rows($result)>0)
            {
                $cnt1=mysqli_num_rows($result);
            }
            ?>
            <div class="media-body">
                <h3 class="font-large-2 white"><?php echo $cnt1;?></h3>           <a class="btn btn-sm btn-white success box-shadow-1 round btn-min-width " href="hostelfeespaid.php" target="_blank">Search Paid Fees<i class="ft-bar-chart pl-1"></i></a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="col-md-1"></div>
<div class="card pull-up bg-gradient-directional-danger col-md-3">
    <div class="card-header bg-hexagons-danger">
        <h4 class="card-title white">Fees Unpaid Students</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        
    </div>
    <div class="card-content collapse show bg-hexagons-danger">
        <div class="card-body">
            <div class="media d-flex">
                
                <div class="media-body">
                    <h3 class="font-large-2 white"><?php echo $cnt-$cnt1;?></h3>
                    <a class="btn btn-sm btn-white danger box-shadow-1 round btn-min-width " href="hostelfeesunpaid.php" target="_blank">Search Unpaid Fees<i class="ft-bar-chart pl-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="row">


 <div class="col-md-12 col-lg-4">
    <div class="card pull-up border-top-info border-top-3 rounded-0">
        <div class="card-header">
            <h4 class="card-title">First Year Students</h4>
        </div>
        <?php
        $queryToSelect="select * from users where user_year='1' and hostel='1'";
        $result=mysqli_query($conn,$queryToSelect);
        if(mysqli_num_rows($result)>0)
        {
            $cnt=mysqli_num_rows($result);
        }
        else{
            $cnt=0;
        }
        ?>  
        <div class="card-content collapse show">
            <div class="card-body p-1">
                <h4 class="font-large-1 text-bold-400"><?php echo $cnt;?><i class="ft-users float-right"></i></h4>
            </div>
            
        </div>
    </div>
</div>

<div class="col-md-12 col-lg-4">
    <div class="card pull-up border-top-info border-top-3 rounded-0">
        <div class="card-header">
            <h4 class="card-title">Second Year Students</h4>
        </div>
        <?php
        $queryToSelect="select * from users where user_year='2' and hostel='1'";
        $result=mysqli_query($conn,$queryToSelect);
        if(mysqli_num_rows($result)>0)
        {
            $cnt=mysqli_num_rows($result);
        }
        else{
            $cnt=0;
        }
        ?>  
        <div class="card-content collapse show">
            <div class="card-body p-1">
                <h4 class="font-large-1 text-bold-400"><?php echo $cnt;?><i class="ft-users float-right"></i></h4>
            </div>
            
        </div>
    </div>
</div>

<div class="col-md-12 col-lg-4">
    <div class="card pull-up border-top-info border-top-3 rounded-0">
        <div class="card-header">
            <h4 class="card-title">Third Year Students</h4>
        </div>
        <?php
        $queryToSelect="select * from users where user_year='3' and hostel='1'";
        $result=mysqli_query($conn,$queryToSelect);
        if(mysqli_num_rows($result)>0)
        {
            $cnt=mysqli_num_rows($result);
        }
        else{
            $cnt=0;
        }
        ?>  
        <div class="card-content collapse show">
            <div class="card-body p-1">
                <h4 class="font-large-1 text-bold-400"><?php echo $cnt;?><i class="ft-users float-right"></i></h4>
            </div>
            
        </div>
    </div>
</div>

<div class="col-md-12 col-lg-4">
    <div class="card pull-up border-top-info border-top-3 rounded-0">
        <div class="card-header">
            <h4 class="card-title">B.Tech Students</h4>
        </div>
        <?php
        $queryToSelect="select * from users where user_year='4' and hostel='1'";
        $result=mysqli_query($conn,$queryToSelect);
        if(mysqli_num_rows($result)>0)
        {
            $cnt=mysqli_num_rows($result);
        }
        else{
            $cnt=0;
        }
        ?>  
        <div class="card-content collapse show">
            <div class="card-body p-1">
                <h4 class="font-large-1 text-bold-400"><?php echo $cnt;?><i class="ft-users float-right"></i></h4>
            </div>
            
        </div>
    </div>
</div>
<?php
} else {
    ?>

    <div class="card pull-up bg-gradient-directional-warning col-md-3">
        <div class="card-header bg-hexagons-warning">
            <h4 class="card-title white">Total Admitted Students</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            
        </div>
        <div class="card-content collapse show bg-hexagons-warning">
            <div class="card-body">
                <div class="media d-flex">
                   <div class="media-body ">
                      <?php
                      $queryToSelect="select * from users where user_role='student'";
                      $result=mysqli_query($conn,$queryToSelect);
                      if(mysqli_num_rows($result)>0)
                      {
                        $cnt=mysqli_num_rows($result);
                    }
                    ?>     
                    <h3 class="font-large-2 white"><?php echo $cnt;?></h3>
                    <a class="btn btn-sm btn-white warning    box-shadow-1 round btn-min-width " href="admissionsearch.php" target="_blank">Student Search<i class="ft-bar-chart pl-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-1"></div>
<div class="card pull-up bg-gradient-directional-success col-md-3">
    <div class="card-header bg-hexagons-success">
        <h4 class="card-title white">Fees Paid Student</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        
    </div>
    <div class="card-content collapse show bg-hexagons-success">
        <div class="card-body">
            <div class="media d-flex">
                
                <div class="media-body">
                    <h3 class="font-large-2 white">12,515</h3>
                    <a class="btn btn-sm btn-white success box-shadow-1 round btn-min-width " href="feespaid.php" target="_blank">Search Paid Fees<i class="ft-bar-chart pl-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-1"></div>
<div class="card pull-up bg-gradient-directional-danger col-md-3">
    <div class="card-header bg-hexagons-danger">
        <h4 class="card-title white">Fees Unpaid Students</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        
    </div>
    <div class="card-content collapse show bg-hexagons-danger">
        <div class="card-body">
            <div class="media d-flex">
                
                <div class="media-body">
                    <h3 class="font-large-2 white">12,515</h3>
                    <a class="btn btn-sm btn-white danger box-shadow-1 round btn-min-width " href="feesunpaid.php" target="_blank">Search Unpaid Fees<i class="ft-bar-chart pl-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>








<!--/ Revenue, Hit Rate & Deals -->
<!-- Emails Products & Avg Deals -->
<div class="row">
    <div class="col-md-12 col-lg-8">
        <div class="card">
            <div class="card-header p-1">
                <h4 class="card-title float-left">Current Admission Fees&nbsp; &nbsp; <span class="blue-grey lighten-2 font-small-3 mb-0">Year</span></h4>
                
            </div>
            <div class="card-content collapse show">
                <div class="card-footer text-center p-1">
                    <div class="row">
                        <div class="col-md-4 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                            <p class="blue-grey lighten-2 mb-0">Open</p>
                            <p class="font-medium-5 text-bold-400">80000</p>
                        </div>
                        <div class="col-md-4 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                            <p class="blue-grey lighten-2 mb-0">OBC</p>
                            <p class="font-medium-5 text-bold-400">40000</p>
                        </div>
                        <div class="col-md-4 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                            <p class="blue-grey lighten-2 mb-0">SC</p>
                            <p class="font-medium-5 text-bold-400">5000</p>
                        </div>
                        
                    </div>
                    <hr>
                    <span class="text-muted"><a href="admissionfees.php" class="danger darken-2">Admission Fees</a>   Report</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card pull-up border-top-info border-top-3 rounded-0">
            <div class="card-header">
                <h4 class="card-title">First Year Students</h4>
            </div>
            <div class="card-content collapse show">
                <div class="card-body p-1">
                    <h4 class="font-large-1 text-bold-400">600<i class="ft-users float-right"></i></h4>
                </div>
                
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-4">
        <div class="card pull-up border-top-info border-top-3 rounded-0">
            <div class="card-header">
                <h4 class="card-title">Second Year Students</h4>
            </div>
            <div class="card-content collapse show">
                <div class="card-body p-1">
                    <h4 class="font-large-1 text-bold-400">600<i class="ft-users float-right"></i></h4>
                </div>
                
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-4">
        <div class="card pull-up border-top-info border-top-3 rounded-0">
            <div class="card-header">
                <h4 class="card-title">Third Year Students</h4>
            </div>
            <div class="card-content collapse show">
                <div class="card-body p-1">
                    <h4 class="font-large-1 text-bold-400">600<i class="ft-users float-right"></i></h4>
                </div>
                
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-4">
        <div class="card pull-up border-top-info border-top-3 rounded-0">
            <div class="card-header">
                <h4 class="card-title">B.Tech Students</h4>
            </div>
            <div class="card-content collapse show">
                <div class="card-body p-1">
                    <h4 class="font-large-1 text-bold-400">600<i class="ft-users float-right"></i></h4>
                </div>
                
            </div>
        </div>
    </div>
    <?php
}?>

</div>
<!--/ Emails Products & Avg Deals -->

<!--/ Products sell and New Orders -->
<!-- Total earning & Recent Sales  -->

<!--/ Total earning & Recent Sales  -->
</div>
</div>
</div>
<!-- END: Content-->
</div>


<!-- BEGIN: Customizer-->
<div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-xl-block"><a class="customizer-close" href="#"><i class="ft-x font-medium-3"></i></a><a class="customizer-toggle bg-primary box-shadow-3" href="#" id="customizer-toggle-setting"><i class="ft-settings font-medium-3 spinner white"></i></a><div class="customizer-content p-2">
	<h5 class="mt-1 mb-1 text-bold-500">Navbar Color Options</h5>
	<div class="navbar-color-options clearfix">
		<div class="gradient-colors mb-1 clearfix">
			<div class="bg-gradient-x-purple-blue navbar-color-option" data-bg="bg-gradient-x-purple-blue" title="bg-gradient-x-purple-blue"></div>
			<div class="bg-gradient-x-purple-red navbar-color-option" data-bg="bg-gradient-x-purple-red" title="bg-gradient-x-purple-red"></div>
			<div class="bg-gradient-x-blue-green navbar-color-option" data-bg="bg-gradient-x-blue-green" title="bg-gradient-x-blue-green"></div>
			<div class="bg-gradient-x-orange-yellow navbar-color-option" data-bg="bg-gradient-x-orange-yellow" title="bg-gradient-x-orange-yellow"></div>
			<div class="bg-gradient-x-blue-cyan navbar-color-option" data-bg="bg-gradient-x-blue-cyan" title="bg-gradient-x-blue-cyan"></div>
			<div class="bg-gradient-x-red-pink navbar-color-option" data-bg="bg-gradient-x-red-pink" title="bg-gradient-x-red-pink"></div>
		</div>
		<div class="solid-colors clearfix">
			<div class="bg-primary navbar-color-option" data-bg="bg-primary" title="primary"></div>
			<div class="bg-success navbar-color-option" data-bg="bg-success" title="success"></div>
			<div class="bg-info navbar-color-option" data-bg="bg-info" title="info"></div>
			<div class="bg-warning navbar-color-option" data-bg="bg-warning" title="warning"></div>
			<div class="bg-danger navbar-color-option" data-bg="bg-danger" title="danger"></div>
			<div class="bg-blue navbar-color-option" data-bg="bg-blue" title="blue"></div>
		</div>
	</div>

	<hr>

	<h5 class="my-1 text-bold-500">Layout Options</h5>
	<div class="row">
		<div class="col-12">
			<div class="d-inline-block custom-control custom-radio mb-1 col-4">
				<input type="radio" class="custom-control-input bg-primary" name="layouts" id="default-layout" checked>
				<label class="custom-control-label" for="default-layout">Default</label>
			</div>
			<div class="d-inline-block custom-control custom-radio mb-1 col-4">
				<input type="radio" class="custom-control-input bg-primary" name="layouts" id="fixed-layout">
				<label class="custom-control-label" for="fixed-layout">Fixed</label>
			</div>
			<div class="d-inline-block custom-control custom-radio mb-1 col-4">
				<input type="radio" class="custom-control-input bg-primary" name="layouts" id="static-layout">
				<label class="custom-control-label" for="static-layout">Static</label>
			</div>
			<div class="d-inline-block custom-control custom-radio mb-1">
				<input type="radio" class="custom-control-input bg-primary" name="layouts" id="boxed-layout">
				<label class="custom-control-label" for="boxed-layout">Boxed</label>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="d-inline-block custom-control custom-checkbox mb-1">
				<input type="checkbox" class="custom-control-input bg-primary" name="right-side-icons" id="right-side-icons">
				<label class="custom-control-label" for="right-side-icons">Right Side Icons</label>
			</div>
		</div>
	</div>

	<hr>

	<h5 class="mt-1 mb-1 text-bold-500">Sidebar menu Background</h5>
	<!-- <div class="sidebar-color-options clearfix">
		<div class="bg-black sidebar-color-option" data-sidebar="menu-dark" title="black"></div>
		<div class="bg-white sidebar-color-option" data-sidebar="menu-light" title="white"></div>
	</div> -->
	<div class="row sidebar-color-options ml-0">
		<label for="sidebar-color-option" class="card-title font-medium-2 mr-2">White Mode</label>
		<div class="text-center mb-1">
			<input type="checkbox" id="sidebar-color-option" class="switchery" data-size="xs"/>
		</div>
		<label for="sidebar-color-option" class="card-title font-medium-2 ml-2">Dark Mode</label>
	</div>

	<hr>

	<label for="collapsed-sidebar" class="font-medium-2">Menu Collapse</label>
	<div class="float-right">
		<input type="checkbox" id="collapsed-sidebar" class="switchery" data-size="xs"/>
	</div>
	
	<hr>

	<!--Sidebar Background Image Starts-->
	<h5 class="mt-1 mb-1 text-bold-500">Sidebar Background Image</h5>
	<div class="cz-bg-image row">
		<div class="col mb-3">
			<img src="../app-assets/images/backgrounds/04.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
		</div>
		<div class="col mb-3">
			<img src="../app-assets/images/backgrounds/01.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
		</div>
		<div class="col mb-3">
			<img src="../app-assets/images/backgrounds/02.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
		</div>
		<div class="col mb-3">
			<img src="../app-assets/images/backgrounds/05.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
		</div>
	</div>
	<!--Sidebar Background Image Ends-->

	<!--Sidebar BG Image Toggle Starts-->
	<div class="sidebar-image-visibility">
		<div class="row ml-0">
			<label for="toggle-sidebar-bg-img" class="card-title font-medium-2 mr-2">Hide Image</label>
			<div class="text-center mb-1">
				<input type="checkbox" id="toggle-sidebar-bg-img" class="switchery" data-size="xs" checked/>
			</div>
			<label for="toggle-sidebar-bg-img" class="card-title font-medium-2 ml-2">Show Image</label>
		</div>
	</div>
	<!--Sidebar BG Image Toggle Ends-->

	<hr>

	
</div>
</div>
<!-- End: Customizer-->


<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
  <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2019  &copy; Copyright <a class="text-bold-800 grey darken-2" href="https://payouth.ml" target="_blank">PAYOUTH</a></span>
    
  </div>
</footer>
<!-- END: Footer-->




</body>
<!-- END: Body-->


</html>