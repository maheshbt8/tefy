<!-- Footer
================================================== -->
<div id="footer" class="sticky-footer footer-bg-clr bottom-space" style="background-color: #cecece;">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-4">
                <a href="<?=base_url();?>"><img src="<?php echo base_url('assets')?>/front-end/images/logo2.svg" width="150px" data-sticky-logo="<?php echo base_url('assets')?>/front-end/images/logo2.svg" alt=""></a>
				<!--<img class="footer-logo" src="images/logo.png" alt="">-->
				<br><br>
				<p class="footer">TEFY is a school search platform for parents to explore, select, apply admissions for schools and get rewarded with exciting discounts and cashbacks.</p>
			</div>

			<div class="col-md-4 col-sm-4 ">
				<h4 class="footerh4">Helpful Links</h4>
				<ul class="footer-links">
					<li><a href="<?=base_url('about-us');?>">About Us</a></li>
					<li><a href="<?=base_url('blogs');?>">Blog</a></li>
					<li><a href="<?=base_url('contact-us');?>">Contact Us</a></li>
                    <li><a href="<?=base_url('privacy-policy');?>">Privacy Policy</a></li>
                    <li><a href="<?=base_url('terms-and-conditions');?>">Terms of use</a></li>    
				</ul>


				<div class="clearfix"></div>
			</div>		

			<div class="col-md-3  col-sm-4">
				<h4 class="footerh4">Contact Us</h4>
				<div class="text-widget">

					<span><i class="fa fa-mobile" aria-hidden="true"></i> &nbsp;
					    <?=$this->db->get_where('settings', array('setting_type' => 'mobile'))->row()->description; ?>, <?=$this->db->get_where('settings', array('setting_type' => 'whatsapp_number'))->row()->description; ?> </span><br>
					<span><br> <a href="#"><span class="__cf_email__" data-><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;<?=$this->db->get_where('settings', array('setting_type' => 'system_email'))->row()->description; ?></span></a> </span><br>
				</div>

				<ul class="social-icons margin-top-20">
					<li><a class="facebook" href="<?=$this->db->get_where('settings', array('setting_type' => 'facebook'))->row()->description; ?>"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="<?=$this->db->get_where('settings', array('setting_type' => 'twiter'))->row()->description; ?>"><i class="icon-twitter"></i></a></li>
					<li><a class="instagram" href="https://www.instagram.com/"><i class="icon-instagram"></i></a></li>
					<li><a class="youtube" href="<?=$this->db->get_where('settings', array('setting_type' => 'youtube'))->row()->description; ?>"><i class="icon-youtube"></i></a></li>
					<li><a class="linkedin" href="https://in.linkedin.com/"><i class="icon-linkedin"></i></a></li>
				</ul>

			</div>

		</div>
		
		
		

	</div>
    <div class="footer-bg-cpy-clr" >
        <div class="col-md-12 footer-bg-cpy-clr">
            <!-- Copyright -->
            <div class="copyrights" >
                <span style="color: #fff;">&copy; 2020 - One7 Incredic Services Private Limited. All rights Reserved. </span>
            </div>
        </div>
	</div>
</div>