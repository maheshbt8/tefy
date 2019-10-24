<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">
<?php
						if ($this->ion_auth->is_admin())
							{
						?>
			<ul data-submenu-title="Main">
				<li class="<?=($active_menu=='dashboard')? 'active' : '';?>"><a href="<?=base_url('admin');?>"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
				<!-- <li><a href="dashboard-messages.html"><i class="sl sl-icon-envelope-open"></i> Messages <span class="nav-tag messages">2</span></a></li>
				<li><a href="dashboard-bookings.html"><i class="fa fa-calendar-check-o"></i> Bookings</a></li>
				<li><a href="dashboard-wallet.html"><i class="sl sl-icon-wallet"></i> Wallet</a></li> -->
			</ul>
			
			<ul data-submenu-title="Listings">
				<li class="<?=($active_menu=='listings')? 'active' : '';?>"><a><i class="sl sl-icon-layers"></i> My Listings</a>
					<ul>
						<li class="<?=($active_menu=='listings' && (isset($_GET['status']) && $_GET['status']==''))? 'active' : '';?>"><a href="<?=base_url('admin/listings');?>">All <!-- <span class="nav-tag green">6</span> --></a></li>
						<li class="<?=($active_menu=='listings' && (isset($_GET['status']) && $_GET['status']=='active'))? 'active' : '';?>"><a href="<?=base_url('admin/listings?status=active');?>">Active <!-- <span class="nav-tag green">6</span> --></a></li>
						<li class="<?=($active_menu=='listings' && (isset($_GET['status']) && $_GET['status']=='expired'))? 'active' : '';?>"><a href="<?=base_url('admin/listings?status=expired');?>">Expired <!-- <span class="nav-tag red">2</span> --></a></li>
					</ul>	
				</li>
				<!-- <li><a href="<?=base_url('admin/listings');?>"><i class="sl sl-icon-layers"></i> My Listings</a></li> -->
				<li class="<?=($active_menu=='categories' || $active_menu=='medium' || $active_menu=='curriculum' || $active_menu=='classes' || $active_menu=='facilities')? 'active' : '';?>"><a><i class="sl sl-icon-layers"></i> Listings-Categories</a>
					<ul>
						<li class="<?=($active_menu=='categories')? 'active' : '';?>"><a href="<?=base_url('admin/categories');?>">Categories</a></li>
						<li class="<?=($active_menu=='medium')? 'active' : '';?>"><a href="<?=base_url('admin/medium');?>">Medium</a></li>
						<li class="<?=($active_menu=='curriculum')? 'active' : '';?>"><a href="<?=base_url('admin/curriculum');?>">Curriculum</a></li>
						<li class="<?=($active_menu=='classes')? 'active' : '';?>"><a href="<?=base_url('admin/classes');?>">Classes</a></li>
						<li class="<?=($active_menu=='facilities')? 'active' : '';?>"><a href="<?=base_url('admin/facilities');?>">Facilities</a></li>
					</ul>	
				</li>
				<!-- <li><a href="dashboard-reviews.html"><i class="sl sl-icon-star"></i> Reviews</a></li>
				<li><a href="dashboard-bookmarks.html"><i class="sl sl-icon-heart"></i> Bookmarks</a></li> -->
				<li class="<?=($active_menu=='reviews')? 'active' : '';?>"><a href="<?=base_url('admin/reviews')?>"><i class="sl sl-icon-star"></i> Reviews</a></li>
				<li class="<?=($active_menu=='add_listing')? 'active' : '';?>"><a href="<?php echo SITEURL2.'/admin/add_listing';?>"><i class="sl sl-icon-plus"></i> Add Listing</a></li>
			</ul>	

<?php }elseif ($this->ion_auth->is_student()){
	?>
	<ul data-submenu-title="Main">
		<li class="<?=($active_menu=='dashboard')? 'active' : '';?>"><a href="<?=base_url('student');?>"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
		<li class="<?=($active_menu=='bookmarks')? 'active' : '';?>"><a href="<?=base_url('student/bookmarks');?>"><i class="fa fa-calendar-check-o"></i> Bookmarks</a></li>
		<!-- <li><a href="dashboard-messages.html"><i class="sl sl-icon-envelope-open"></i> Messages <span class="nav-tag messages">2</span></a></li>
		
		<li><a href="dashboard-wallet.html"><i class="sl sl-icon-wallet"></i> Wallet</a></li> -->

	</ul>

<?php }?>
			<ul data-submenu-title="Account">
<?php
	if ($this->ion_auth->is_admin())
	{
		?>
		<li class="<?=($active_menu=='profile')? 'active' : '';?>"><a href="<?=base_url('admin/profile');?>"><i class="sl sl-icon-user"></i> My Profile</a></li>
		<li class="<?=($active_menu=='categories' || $active_menu=='medium' || $active_menu=='curriculum' || $active_menu=='classes' || $active_menu=='facilities')? 'active' : '';?>"><a><i class="sl sl-icon-settings"></i> Settings</a>
					<ul>
						<li><a href="<?=base_url('admin/system_settings');?>">System Settings</a></li>
						<li><a href="<?=base_url('terms');?>">Terms & Conditions</a></li>
						<li><a href="<?=base_url('privacy');?>">Privacy Policy</a></li>
					</ul>	
				</li>
	<?php }elseif ($this->ion_auth->is_student()){?>
		<li class="<?=($active_menu=='profile')? 'active' : '';?>"><a href="<?=base_url('student/profile');?>"><i class="sl sl-icon-user"></i> My Profile</a></li>
	<?php }
	?>
				<li><a href="<?php echo SITEURL2.'/auth/logout'?>"><i class="sl sl-icon-power"></i> Logout</a></li>
			</ul>
			
		</div>
	</div>