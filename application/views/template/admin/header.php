<header id="header-container" class="fixed fullwidth dashboard">

	<!-- Header -->
	<div id="header" class="not-sticky">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="<?=base_url('auth');?>"><img src="<?php echo base_url('assets')?>/images/logo3.png" alt=""></a>
					<a href="<?=base_url('auth');?>" class="dashboard-logo"><img src="<?php echo base_url('assets')?>/images/logo3.png" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				<!-- Main Navigation -->
				<!-- <nav id="navigation" class="style-1">
					<ul id="responsive">

						<li><a href="<?=base_url();?>" target="_blank">Home</a></li>
						
					</ul>
				</nav> -->
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<!-- Header Widget -->
				<div class="header-widget">
					
					<!-- User Menu -->
					<div class="user-menu">
						<div class="user-name"><span><img src="<?=base_url().$this->common_model->get_image_url('users',$this->session->userdata('user_id'));?>" alt=""></span><?=ucwords($this->common_model->get_type_name_by_where('users',array('id'=>$this->session->userdata('user_id')),'first_name'));?></div>
						<ul>
							<li><a href="<?=base_url('auth');?>"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
							<?php if ($this->ion_auth->is_student()){?>
							<li><a href="<?=base_url('student/bookmarks')?>"><i class="fa fa-calendar-check-o"></i> Bookmarks</a></li>
							<li><a href="<?=base_url('student/profile')?>"><i class="fa fa-user"></i> My Profile</a></li>
							<?php }?>
							<li><a href="<?=base_url('auth/logout');?>"><i class="sl sl-icon-power"></i> Logout</a></li>
						</ul>
					</div>
					<?php
						if ($this->ion_auth->is_admin())
							{
						?>
					<a href="<?=base_url('admin/add_listing');?>" class="button border with-icon">Add Listing <i class="sl sl-icon-plus"></i></a>
				<?php }?>
				</div>
				<!-- Header Widget / End -->
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>