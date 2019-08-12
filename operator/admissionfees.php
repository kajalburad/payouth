<?php
include"index_first.php";
?>
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-body"><!-- Input Validation start -->
<section class="input-validation">
  <div class="row">

		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-round-controls">Round Style Form Control</h4>
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
				<div class="card-content collapse show">
					<div class="card-body">

						<div class="card-text">
							<p>This is a variation to the default form control styling. In this example all the form controls has round styling.
								To apply round style add class
								<code>round</code> to any form control.</p>
						</div>

						<form class="form">
							<div class="form-body">

								<div class="form-group">
									<label for="complaintinput1">Company Name</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="company name" name="companyname">
								</div>

								<div class="form-group">
									<label for="complaintinput2">Employee Name</label>
									<input type="text" id="complaintinput2" class="form-control round" placeholder="employee name" name="employeename">
								</div>

								<div class="form-group">
									<label for="complaintinput3">Date of Complaint</label>
									<input type="date" id="complaintinput3" class="form-control round" name="complaintdate">
								</div>


								<div class="form-group">
									<label for="complaintinput4">Supervisor's Name</label>
									<input type="text" id="complaintinput4" class="form-control round" placeholder="supervisor name" name="supervisorname">
								</div>


								<div class="form-group">
									<label for="complaintinput5">Complaint Details</label>
									<textarea id="complaintinput5" rows="5" class="form-control round" name="complaintdetails" placeholder="details"></textarea>
								</div>


								<div class="form-group">
									<label for="complaintinput6">Signature</label>
									<input type="text" id="complaintinput6" class="form-control round" placeholder="signature" name="signature">
								</div>
							</div>

							<div class="form-actions">
								<button type="button" class="btn btn-danger mr-1">
									<i class="ft-x"></i> Cancel
								</button>
								<button type="submit" class="btn btn-primary">
									<i class="la la-check-square-o"></i> Save
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>