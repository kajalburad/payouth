
<?php
include('index_first.php');

?>
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/datatables.min.css">
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title"><b>Search</b></h3>
      </div>
    </div>
    <div class="content-body"><!-- DOM - jQuery events table -->
      <section id="file-export">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Search and Export</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                  </ul>
                </div>
              </div>
              <script>
                
              </script>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">

                  <div class="table-responsive">
                   <table class="table table-striped table-bordered file-export">
                    <thead>
                      <tr>
                       <th>Fees Transaction ID</th>
                       <th>Fees Payment Gateway ID</th>
                       
                       <th>Fees Type</th>
                       <th>Fees User RFID</th>
                       <th>Fees User Mobile</th>
                       <th>Fees User Email</th>
                       <th>Fees Amount Paid</th>
                       <th>Fees Payment Type</th>
                       <th>Fees Billing Instrument</th>
                       <th>Fees Status</th>
                       <th>Fees Paid DateTime</th>
                       <th>Fees user Acd-Year</th>
                       

                     </tr>
                   </thead>
                   <?php
                   $queryToSelect="select * from admission_fees_transactions";
                   $result=mysqli_query($conn,$queryToSelect);
                   if(mysqli_num_rows($result)>0)
                   {
                    
                     ?>     
                     
                     
                     <tbody>
                      <?php
                      while($row=mysqli_fetch_assoc($result))
                        {?>
                          <tr>
                            <td><?php 
                            echo $row['fees_transaction_id'];?></td>
                            <td><?php echo $row['fees_gateway_payment_id'];?></td>
                            
                            
                            <td><?php echo $row['fees_type'];?></td>
                            <td><?php echo $row['fees_user_rfid'];?></td>
                            <td><?php echo $row['fees_user_mobile'];?></td>
                            <td><?php echo $row['fees_user_email'];?></td>
                            <td><?php echo $row['fees_paid_amount'];?></td>
                            
                            <td><?php echo $row['fees_payment_type'];?></td>
                            <td><?php echo $row['fees_billing_instrument'];?></td>
                            <td><?php echo $row['fees_status'];?></td>
                            <td><?php echo $row['fees_paid_datetime'];?></td>
                            <td><?php echo $row['fees_user_acad_year'];?></td>
                            
                          </tr>    
                        </tbody>
                        <?php
                        
                      }}?>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Footer callback table -->

    </div>
  </div>
</div>
<!-- BEGIN: Vendor JS-->
<script src="../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="../app-assets/js/scripts/forms/switch.min.js" type="text/javascript"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="../app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/tables/buttons.flash.min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/tables/jszip.min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/tables/pdfmake.min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/tables/vfs_fonts.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/tables/buttons.html5.min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/tables/buttons.print.min.js" type="text/javascript"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="../app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
<script src="../app-assets/js/core/app.min.js" type="text/javascript"></script>
<script src="../app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/jquery.sharrre.js" type="text/javascript"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="../app-assets/js/scripts/tables/datatables/datatable-advanced.min.js" type="text/javascript"></script>