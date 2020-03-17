<?php
$this->session->set_userdata('last_page',current_url());
?>
<!-- Container / Start -->
<div class="container-fluid margin-top-" >

	<div class="row">
        
            <img src="<?php echo base_url('assets')?>/front-end/images/contact.png" width="100%">
      
    </div>
</div>
<div class="container" >

	<div class="row">
        
		<!-- Contact Details -->
		<div class="col-md-4">

			<h3 class="listing-desc-headline ">Let's talk more!!!</h3>

			<!-- Contact Details -->
			<div class="sidebar-textbox">
				<!--<p>Collaboratively administrate channels whereas virtual. Objectively seize scalable metrics whereas proactive e-services.</p>-->

				<ul class="contact-details">
					<li><i class="fa fa-mobile" aria-hidden="true"></i>  <span><?=$this->db->get_where('settings', array('setting_type' => 'mobile'))->row()->description; ?>,<br> <?=$this->db->get_where('settings', array('setting_type' => 'whatsapp_number'))->row()->description; ?> </span></li>
					<!--<li><i class="im im-icon-Fax"></i> <strong>Fax:</strong> <span>(123) 123-456 </span></li>-->
					<!--<li><i class="im im-icon-Globe"></i> <strong>Web:</strong> <span><a href="#">www.tefy.in</a></span></li>-->
					<li><i class="fa fa-envelope" aria-hidden="true"></i>  <span><a href="#"><span class="__cf_email__" data-cfemail="046b62626d676144617c65697468612a676b69"><?=$this->db->get_where('settings', array('setting_type' => 'system_email'))->row()->description; ?></span></a></span></li>
				</ul>
			</div>

		</div>

		<!-- Contact Form -->
		<div class="col-md-8">

			<section id="contact">
				<h3 class="listing-desc-headline ">Contact Us</h3>

				<div id="contact-message"></div> 

					<form method="post" action="<?=base_url('home/get_in_touch')?>" autocomplete="on" novalidate="novalidate" id="form">
						    <?php
                  if($this->session->flashdata('touch_message')!=''){
                  ?>
                  <div class="notification notice closeable">
  <strong><?=$this->session->flashdata('touch_message');?></strong>
</div>
<?php }?>
					<div class="row">
						<div class="col-md-6">
							<div>
								<input name="name" type="text" id="name" placeholder="Your Name" required="required" />
							</div>
						</div>

						<div class="col-md-6">
							<div>
								<input name="email" type="email" id="email" placeholder="Email Address" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
							</div>
						</div>
					</div>

					<div>
						<input name="mobile" type="text" id="mobile" placeholder="Mobile No." required="required" />
					</div>

					<div>
						<textarea name="query" cols="40" rows="3" id="query" placeholder="Your Query" spellcheck="true" required="required"></textarea>
					</div>

					<input type="submit" class="submit button" id="submit" value="Submit Message" />

					</form>
			</section>
		</div>
		<!-- Contact Form / End -->

	</div>
<br><br>
</div>
<!-- Container / End -->
