
<?php
	$comp_model = new SharedController;
	$current_page = get_current_url();
	$csrf_token = Csrf :: $token;
	
	$show_header = $this->show_header;
	$view_title = $this->view_title;
	$redirect_to = $this->redirect_to;

?>

	<section class="page">
		
<?php
	if( $show_header == true ){
?>

		<div  class="bg-light p-3 mb-3">
			<div class="container">
				
				<div class="row ">
					
		<div class="col-sm-6 ">
			<h3 class="record-title">User registration</h3>

		</div>

		<div class="col-sm-6 comp-grid">
			<div class="">
	<div class="text-center">
		Already have an account?  <a class="btn btn-primary" href="<?php print_link('') ?>"> Login</a>
	</div>
</div>
		</div>

				</div>
			</div>
		</div>

<?php
	}
?>

		<div  class="">
			<div class="container">
				
				<div class="row ">
					
		<div class="col-md-7 comp-grid">
			
	<?php $this :: display_page_errors(); ?>
	
	<div  class=" animated fadeIn">
		<form id="user-userregister-form" role="form" novalidate enctype="multipart/form-data" class="form form-horizontal needs-validation" action="<?php print_link("index/register?csrf_token=$csrf_token") ?>" method="post">
		<div>
		
								
								<div class="form-group ">
									<div class="row">
										<div class="col-sm-4">
											<label class="control-label" for="user_name">User Name <span class="text-danger">*</span></label>
										</div>
										<div class="col-sm-8">
											<div class="">
												<input id="ctrl-user_name"  value="<?php  echo $this->set_field_value('user_name',''); ?>" type="text" placeholder="Enter User Name"  required="" name="user_name"  data-url="api/json/user_user_name_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
									 
<div class="check-status"></div> 
												
											</div>
											 
											
										</div>
									</div>
								</div>
				
				

								
								<div class="form-group ">
									<div class="row">
										<div class="col-sm-4">
											<label class="control-label" for="password">Password <span class="text-danger">*</span></label>
										</div>
										<div class="col-sm-8">
											<div class="">
												<input id="ctrl-password"  value="<?php  echo $this->set_field_value('password',''); ?>" type="password" placeholder="Enter Password"  required="" name="password"  class="form-control " />
									 
 
												
											</div>
											 
											
										</div>
									</div>
								</div>
				
				
								
								<div class="form-group ">
									<div class="row">
										<div class="col-sm-4">
											<label class="control-label" for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
										</div>
										<div class="col-sm-8">
											<div class="">
												
<input id="-confirm"  class="form-control " type="password" name="confirm_password" required placeholder="Confirm Password" />
 
												
											</div>
											 
											
										</div>
									</div>
								</div>
				
				

								
								<div class="form-group ">
									<div class="row">
										<div class="col-sm-4">
											<label class="control-label" for="email">Email <span class="text-danger">*</span></label>
										</div>
										<div class="col-sm-8">
											<div class="">
												<input id="ctrl-email"  value="<?php  echo $this->set_field_value('email',''); ?>" type="email" placeholder="Enter Email"  required="" name="email"  data-url="api/json/user_email_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
									 
<div class="check-status"></div> 
												
											</div>
											 
											
										</div>
									</div>
								</div>
				
				

								
								<div class="form-group ">
									<div class="row">
										<div class="col-sm-4">
											<label class="control-label" for="phone_no">Phone No <span class="text-danger">*</span></label>
										</div>
										<div class="col-sm-8">
											<div class="">
												<input id="ctrl-phone_no"  value="<?php  echo $this->set_field_value('phone_no',''); ?>" type="text" placeholder="Enter Phone No"  required="" name="phone_no"  class="form-control " />
									 
 
												
											</div>
											 
											
										</div>
									</div>
								</div>
				
				


		</div>
		<div class="form-group form-submit-btn-holder text-center">
			<button class="btn btn-primary" type="submit">
				
				<i class="fa fa-send"></i>
			</button>
		</div>
	</form>
	</div>

		</div>

				</div>
			</div>
		</div>

	</section>
