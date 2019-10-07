<?php
$this->session->set_userdata('last_page',current_url());
?>
<div class="row">

			<!-- Profile -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Profile Details</h4>
					<div class="dashboard-list-box-static">
						<form action="<?=base_url('admin/profile');?>" method="post"  enctype="multipart/form-data">
						<!-- Avatar -->
						<div class="edit-profile-photo">
							<img src="<?=base_url('uploads/users/').$user_details['id'].'.jpg';?>" alt="">
							<div class="change-photo-btn">
								<div class="photoUpload">
								 <span><i class="fa fa-upload"></i> Upload Photo</span>
								 <input type="file" class="upload" name="user_profile"/>
								</div>
							</div>
						</div>
	
						<!-- Details -->
						<div class="my-profile">

							<label>Your Name</label>
							<input value="<?=$user_details['username'];?>" type="text" name="username" required="" >

							<label>Phone</label>
							<input value="<?=$user_details['phone'];?>" type="text" name="phone" required="" >

							<label>Email</label>
							<input value="<?=$user_details['email'];?>" type="email" name="email" required="">
							<!--<label>Notes</label>
							<textarea name="notes" id="notes" cols="30" rows="10">Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper</textarea>

							<label><i class="fa fa-twitter"></i> Twitter</label>
							<input placeholder="https://www.twitter.com/" type="text">

							<label><i class="fa fa-facebook-square"></i> Facebook</label>
							<input placeholder="https://www.facebook.com/" type="text">

							<label><i class="fa fa-google-plus"></i> Google+</label>
							<input placeholder="https://www.google.com/" type="text">-->
						</div>
	
						<button type="submit" class="button margin-top-15">Save Changes</button>
						</form>
					</div>
				</div>
			</div>

			<!-- Change Password -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Change Password</h4>
					<div class="dashboard-list-box-static">
<form id="form" action="<?=base_url('admin/change_password')?>" class="form-horizontal" novalidate="novalidate" method="post">
						<!-- Change Password -->
						<div class="my-profile">
							<label class="margin-top-0">Current Password</label>
							<input type="password" name="old" class="form-control" placeholder="Current Password" required="" value="">
                             <?php echo form_error('old', '<div class="error">', '</div>'); ?>

							<label>New Password</label>
							<input type="password" name="new" class="form-control" placeholder="Password" required="" value="">
                             <?php echo form_error('new', '<div class="error">', '</div>'); ?>
							

							<label>Confirm New Password</label>
							<input type="password" name="new_confirm" class="form-control" placeholder="Password Confirm" required="" value="">
                             <?php echo form_error('new_confirm', '<div class="error">', '</div>'); ?>

							<button type="submit" class="button margin-top-15">Change Password</button>
						</div>
</form>
					</div>
				</div>
			</div>


			<!-- Copyrights -->
			<!--<div class="col-md-12">
				<div class="copyrights">© 2019 Listeo. All Rights Reserved.</div>
			</div>-->

		</div>