<header id="header-container" class="fixed fullwidth dashboard">

	<!-- Header -->
	<div id="header" class="not-sticky">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side w--100">
				
				<!-- Logo -->
				<div id="logo">
					<a href="<?=base_url('auth');?>"><img src="<?php echo base_url('assets')?>/front-end/images/logo2.svg" alt=""></a>
					<a href="<?=base_url('auth');?>" class="dashboard-logo"><img src="<?php echo base_url('assets')?>/front-end/images/logo3.svg" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<!--<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
-->
				<!-- Main Navigation -->
				<!-- <nav id="navigation" class="style-1">-->
					<ul style="">

						<li class="hom1"><a href="<?=base_url();?>" target="_blank" style="color: black"><i class="fa fa-home" aria-hidden="true"></i><span class="name-line-hide-resp">Home</span></a></li>
						
						<li class="hom1 margin-top-0">
						    <div class="user-menu">
                                <div class="user-name"><img src="<?=base_url().$this->common_model->get_image_url('users',$this->session->userdata('user_id'));?>" alt="" style="height: 35px;">&nbsp;<a class="name-line-hide-resp"><?=ucwords(substr($this->common_model->get_type_name_by_where('users',array('id'=>$this->session->userdata('user_id')),'first_name'),0,6));?>...</a></div>
						<ul>
							<li><a href="<?=base_url('auth');?>"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
							<?php if ($this->ion_auth->is_student()){?>
							<li><a href="<?=base_url('student/admissions')?>"><i class="fa fa-calendar-check-o"></i> Admission Status</a></li>
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
					<!-- <a href="<?=base_url('admin/add_listing');?>" class="button border with-icon">Add Listing <i class="sl sl-icon-plus"></i></a> -->
				<?php }?>
						</li>
						
					</ul>
				<!--</nav> -->
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->

		
		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>