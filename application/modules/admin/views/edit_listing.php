<?php
$this->session->set_userdata('last_page',current_url());
?>
<style>
    .d--inline{
        display: inline!important;
    }

</style>




<form method="post" action="<?=base_url('admin/edit_listing/').$edit_id;?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
	<input type="hidden" name="list_type" value="list">
<div class="row">
			<div class="col-lg-12">

				<div id="add-listing">

					<!-- Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>School Name <i class="tip" data-tip-content="Name of your School"></i></h5>
								<input class="search-field" type="text" value="<?=$edit_data['school_name'];?>" name="school_name"  autocomplete="off" />
								<?php echo form_error('school_name', '<div class="error">', '</div>'); ?>
							</div>
						</div>
<!-- School Code -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>School Code <i class="tip" data-tip-content="Name of your School"></i></h5>
								<input class="search-field" type="text" value="<?=$edit_data['school_code'];?>" name="school_code" required="" autocomplete="off" />
								<?php echo form_error('school_code', '<div class="error">', '</div>'); ?>
							</div>
						</div>
						<!-- Row -->
						<div class="row with-forms">

							<!-- Status -->
							<div class="col-md-6">
								<h5>Category</h5>
								<select class="form-control selectric chosen-select-no-single" id="category" name="category[]" required=""  multiple="">
									<option value="" disabled="">Select Category</option>	
                                  <?php $res=$this->common_model->select_results_info('category',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
									<option value="<?=$row['id'];?>" <?php if(strpos($edit_data['category'],$row['id'])){ echo 'selected';} ?>><?=$row['name'];?></option>
								<?php }?>
								</select>
								<?php echo form_error('category[]', '<div class="error">', '</div>'); ?>
								<label class="error" for="category[]"></label>
							</div>

							<!-- Type -->
							<div class="col-md-6">
								<h5>Keywords <i class="tip" data-tip-content="Maximum of 15 keywords related with your business"></i></h5>
								<input type="text" placeholder="Keywords should be separated by commas"  name="keywords" required="" value="<?=$edit_data['keywords'];?>">
								<?php echo form_error('keywords', '<div class="error">', '</div>'); ?>
							</div>
						</div>
						<!-- Row / End -->
                        
                        <!-- Row -->
                     
						<div class="row with-forms">

							<!-- Vision -->
							<div class="col-md-12">
                                <h5>Curriculum</h5>
                            <?php $res=$this->common_model->select_results_info('curriculum',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
                            <div class="col-md-2">
								<label><input class="d--inline" type="radio" placeholder="SSC"  name="curriculum" value="<?=$row['id'];?>" required="" <?php if($edit_data['curriculum'] == $row['id']){ echo 'checked';} ?>><?=$row['name'];?></label>
                            </div>
                        <?php }?>                          
							</div>
							<?php echo form_error('curriculum', '<div class="error">', '</div>'); ?> 
							<label class="error" for="curriculum"></label> 
						</div>
						<!-- Row / End -->
                          <!-- Row -->
                        <div class="row with-forms">

							<!-- Vision -->
							<div class="col-md-12">
                                <h5>Co-Education Status</h5>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder="SSC"  name="school_type" value="Boys" required="" <?php if($edit_data['school_type'] == 'Boys'){ echo 'checked';} ?>>Boys</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder="SSC"  name="school_type" value="Girls" required="" <?php if($edit_data['school_type'] == 'Girls'){ echo 'checked';} ?>>Girls</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder="SSC"  name="school_type" value="Co-Education" required="" <?php if($edit_data['school_type'] == 'Co-Education'){ echo 'checked';} ?>>Co-Education</label>
                                </div>
                                
							</div>
							<?php echo form_error('school_type', '<div class="error">', '</div>'); ?>
                                <label class="error" for="school_type"></label>
						</div>
						 <!-- Row -->
                        <div class="row with-forms">

							<!-- Vision -->
							<div class="col-md-12">
                                <h5>Format Status</h5>
                                <div class="col-md-3">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="school_format" value="Only Day Scholars" required="" <?php if($edit_data['school_format'] == 'Only Day Scholars'){ echo 'checked';} ?>>Only Day Scholars</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="school_format" value="Only Hostel" required="" <?php if($edit_data['school_format'] == 'Only Hostel'){ echo 'checked';} ?>>Only Hostel</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="school_format" value="Both" required="" <?php if($edit_data['school_format'] == 'Both'){ echo 'checked';} ?>>Both</label>
                                </div>
                                
							</div>
							<?php echo form_error('school_format', '<div class="error">', '</div>'); ?>
                                <label class="error" for="school_format"></label>
						</div>
                        
                        <!-- Row -->
                        <div class="row with-forms">

							<!-- Vision -->
							<div class="col-md-12">
                                <h5>Hostel facility</h5>
                                <div class="col-md-3">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="hostels" value="No" required="" <?php if($edit_data['hostels'] == 'No'){ echo 'checked';} ?>>No</label>
                                </div>
                                <div class="col-md-3">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="hostels" value="Only for Boys" required="" <?php if($edit_data['hostels'] == 'Only for Boys'){ echo 'checked';} ?>>Only for Boys</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="hostels" value="Only for Girls" required="" <?php if($edit_data['hostels'] == 'Only for Girls'){ echo 'checked';} ?>>Only for Girls</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="hostels" value="For Boys & Girls" required="" <?php if($edit_data['hostels'] == 'For Boys & Girls'){ echo 'checked';} ?>>For Boys & Girls</label>
                                </div>
                                
							</div>
							<?php echo form_error('hostels', '<div class="error">', '</div>'); ?>
                                <label class="error" for="hostels"></label>
						</div>
                        <!-- Row -->
						<div class="row with-forms">

							<!-- Vision -->
							<!-- <div class="col-md-6">
                                <h5>Classes</h5>
                                <select class="chosen-select-no-single form-control selectric"  name="class[]" required="" multiple="">
									<option label="blank" disabled="">Select Class</option>	
									 <?php $res=$this->common_model->select_results_info('classes',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
									<option value="<?=$row['id'];?>" <?php if(strpos($edit_data['class'],$row['id'])){ echo 'selected';} ?>><?=$row['name'];?></option>
								<?php }?>
									
								</select>
                             <?php echo form_error('class[]', '<div class="error">', '</div>'); ?>
							</div> -->
							<div class="col-md-3">
                                <h5>Classes</h5>
								<input type="text" placeholder="Enter Classes to show"  name="class" required="" value="<?=$edit_data['class'];?>">
                             	<?php echo form_error('class', '<div class="error">', '</div>'); ?>
                          	
							</div>
                            <div class="col-md-3">
                                <h5>Price From</h5>
								<input type="text" placeholder="Enter Price From"  name="price_from" required="" value="<?=$edit_data['price_from'];?>">
                             	<?php echo form_error('price_from', '<div class="error">', '</div>'); ?>
                          	
							</div>
							<div class="col-md-3">
                                <h5>Transport Fee</h5>
								<input type="number" placeholder="Enter Transport Fee"  name="transport_fee" required="" value="<?=$edit_data['transport_fee'];?>">
                             	<?php echo form_error('transport_fee', '<div class="error">', '</div>'); ?>
                          	
							</div>
							<div class="col-md-3">
                                <h5>Medium</h5>
                                <select class="chosen-select-no-single form-control selectric"  name="medium[]" required="" multiple="">
                                	<option label="blank" disabled="">Select Medium</option>
									<?php $res=$this->common_model->select_results_info('medium',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
									<option value="<?=$row['id'];?>" <?php if(strpos($edit_data['medium'],$row['id'])){ echo 'selected';} ?>><?=$row['name'];?></option>
								<?php }?>									
								</select>
								<?php echo form_error('medium[]', '<div class="error">', '</div>'); ?>
                            </div>
						</div>
						<!-- Row / End -->
                        
                        

					</div>
					<!-- Section / End -->
 <!-- Addtional Information Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Additional Informations</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-6">
								<h5>Founders Name </h5>
								<input class="search-field" type="text" value="<?=$edit_data['founders_name'];?>" name="founders_name" placeholder="Founders Name(If any)" autocomplete="off" />
								<?php echo form_error('founders_name', '<div class="error">', '</div>'); ?>
							</div>
						
							<div class="col-md-6">
								<h5>Brand Name </h5>
								<input class="search-field" type="text" value="<?=$edit_data['brand_name'];?>" name="brand_name" placeholder="Brand name" autocomplete="off" />
								<?php echo form_error('brand_name', '<div class="error">', '</div>'); ?>
							</div>
					
							<div class="col-md-6">
								<h5>Number of Branches </h5>
								<input class="search-field" type="text" value="<?=$edit_data['no_of_branches'];?>" name="no_of_branches" placeholder="Brand name" autocomplete="off" />
								<?php echo form_error('no_of_branches', '<div class="error">', '</div>'); ?>
							</div>
						
							<div class="col-md-6">
								<h5>Year of Establishment of brand</h5>
								<input class="search-field" type="text" value="<?=$edit_data['est_year'];?>" name="est_year" placeholder="" autocomplete="off" />
								<?php echo form_error('est_year', '<div class="error">', '</div>'); ?>
							</div>
						
							<div class="col-md-6">
								<h5>Year of Establishment of the specific branch</h5>
								<input class="search-field" type="text" value="<?=$edit_data['est_branch_year'];?>" name="est_branch_year" placeholder="" autocomplete="off" />
								<?php echo form_error('est_branch_year', '<div class="error">', '</div>'); ?>
							</div>
						
                   
							<div class="col-md-6">
								<h5>Average Expirience of Faculty</h5>
								<input class="search-field" type="text" value="<?=$edit_data['faculty_exp'];?>" name="faculty_exp" placeholder="" autocomplete="off" />
								<?php echo form_error('faculty_exp', '<div class="error">', '</div>'); ?>
							</div>
						
                        
							<div class="col-md-6">
								<h5>Any Notable Alumni</h5>
								<input class="search-field" type="text" value="<?=$edit_data['alumni'];?>" name="alumni" placeholder="" autocomplete="off" />
								<?php echo form_error('alumni', '<div class="error">', '</div>'); ?>
							</div>
						</div>
                        

                        

					</div>
					<!--Addtional Information Section / End -->
                    
                       <!-- Addtional Information Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Contact Details of School(for our use)</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-4">
								<h5>Councellor/Principal number </h5>
								<input class="search-field" type="text" value="<?=$edit_data['principal_number'];?>" name="principal_number" placeholder="" required="" autocomplete="off" />
								<?php echo form_error('principal_number', '<div class="error">', '</div>'); ?>
							</div>
                            <div class="col-md-4">
                                    <h5>Telephone Number </h5>
                                    <input class="search-field" type="text" value="<?=$edit_data['telephone_number'];?>" name="telephone_number" placeholder="" required="" autocomplete="off" />
                                    <?php echo form_error('telephone_number', '<div class="error">', '</div>'); ?>
                                </div>

							<div class="col-md-4">
                                    <h5>Email </h5>
                                    <input class="search-field" type="text" value="<?=$edit_data['school_email'];?>" name="school_email" placeholder="" required="" autocomplete="off" />
                                    <?php echo form_error('school_email', '<div class="error">', '</div>'); ?>
                                </div>

							
						</div>
                        

                        

					</div>
					<!--Addtional Information Section / End -->
                    
                    
                     <!-- Admission Procedure Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i>  Admission Procedure</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
							<textarea type="text" class="form-control" name="admission_procedure" required=""><?=$edit_data['admission_procedure'];?></textarea>
							<?php echo form_error('admission_procedure', '<div class="error">', '</div>'); ?>
							</div>
						</div>
                        

                        

					</div>
					<!-- Admission Procedure Section / End -->
					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-location"></i> Location</h3>
						</div>

						<div class="submit-section">

							<!-- Row -->
							<div class="row with-forms">.
                                <div class="col-md-12">
									<h5>Area Landmark</h5>
									<input type="text"  id="pac-input" placeholder="e.g. My School Street" name="landmark" required="" autocomplete="off" value="<?=$edit_data['landmark'];?>">
									<input type="hidden" id="lat" value="<?=$edit_data['latitude'];?>" name="latitude">
                                         <input type="hidden" id="lng" value="<?=$edit_data['longitude'];?>" name="longitude">
                                         <input type="hidden" id="address" value="" name="address">
                                         <?php echo form_error('landmark', '<div class="error">', '</div>'); ?>
								</div>
                                <!-- Address -->
								<div class="col-md-12">
									<h5>Address</h5>
									<textarea type="text" placeholder="e.g. 964 School Street" name="address" required=""><?=$edit_data['address'];?></textarea>
									<?php echo form_error('address', '<div class="error">', '</div>'); ?>
								</div>
								<div class="col-md-12">
                                <h5>Address URL</h5>
                                <input type="url" class="form-control-file" placeholder="Eg:https://www.google.com/maps/embed?" name="address_url" value="<?=$edit_data['address_url'];?>">
                                <?php echo form_error('address_url', '<div class="error">', '</div>'); ?>
                            	</div>
                            	

							<div class="col-md-12 ">
                                <h5>Embed video Link(optional)</h5>
                                <input type="url" class="form-control-file" placeholder="Eg:https://www.tefy.com/embed/yfettefy" name="video" value="<?=$edit_data['video'];?>">
                            </div>
                            
							</div>
							<!-- Row / End -->

						</div>
					</div>
					<!-- Section / End -->
					

					<!-- Section -->
					<div class="add-listing-section margin-top-45">
                        
                        

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-docs"></i> Details</h3>
						</div>
                        
                        <!-- Row -->
						<div class="row with-forms">

							

							<!-- Vision -->
							<div class="col-md-12">
                                <h5>Vision</h5>
								<textarea class="WYSIWYG" name="vision" cols="20" rows="2"  spellcheck="true" required="" placeholder="Enter the school vision in short note in 100 words"><?=$edit_data['vision'];?></textarea>
								<?php echo form_error('vision', '<div class="error">', '</div>'); ?>
							</div>
						</div>
						<!-- Row / End -->
                        

						<!-- Description -->
						<div class="form">
							<h5>Description</h5>
							<textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true" required=""><?=$edit_data['description'];?></textarea>
							<?php echo form_error('description', '<div class="error">', '</div>'); ?>
						</div>

						<!-- Row -->
						<div class="row with-forms">

							<!-- Phone -->
							<div class="col-md-4">
								<h5>Phone <span>(optional)</span></h5>
								<input type="text" name="phone" value="<?=$edit_data['phone'];?>">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<h5>Website <span>(optional)</span></h5>
								<input type="text" name="website" value="<?=$edit_data['website'];?>">
							</div>

							<!-- Email Address -->
							<div class="col-md-4">
								<h5>E-mail <span>(optional)</span></h5>
								<input type="text" name="email" value="<?=$edit_data['email'];?>">
							</div>

						</div>
						<!-- Row / End -->


						<!-- Row -->
						<div class="row with-forms">

							<!-- Phone -->
							<div class="col-md-4">
								<h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook <span>(optional)</span></h5>
								<input type="text" placeholder="https://www.facebook.com/" name="facebook" value="<?=$edit_data['facebook'];?>">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<h5 class="twitter-input"><i class="fa fa-twitter"></i> Twitter <span>(optional)</span></h5>
								<input type="text" placeholder="https://www.twitter.com/" name="twiter" value="<?=$edit_data['twitter'];?>">
							</div>

							<!-- Email Address -->
							<div class="col-md-4">
								<h5 class="gplus-input"><i class="fa fa-youtube"></i> Youtube <span>(optional)</span></h5>
								<input type="text" placeholder="https://youtube.com/" name="youtube" value="<?=$edit_data['youtube'];?>">
							</div>

						</div>
						<!-- Row / End -->


						<!-- Checkboxes -->
						<h5 class="margin-top-30 margin-bottom-10">Facilities <span>(optional)</span></h5>
						<div class="checkboxes in-row margin-bottom-20">
					<?php $res=$this->common_model->select_results_info('facilities',array('row_status'=>1),"'name','ASC'")->result_array();
                                  $f=0;foreach ($res as $row) {
                                  ?>
							<input id="check<?=$f;?>" type="checkbox" name="amenities[]" value="<?=$row['id'];?>" <?php if(strpos($edit_data['amenities'],$row['id'])){ echo 'checked';} ?>>
							<label for="check<?=$f;?>"><?=$row['name'];?></label>
						<?php $f++;}?>
							
					<?php echo form_error('amenities[]', '<div class="error">', '</div>'); ?>
						</div>
						<!-- Checkboxes / End -->
<div class="row with-forms">

							<div class="col-md-12">
                                <h5>Bus Routes(optional)</h5>
                                <input type="text" class="form-control-file" placeholder="Route1, Route2, Route3...." name="bus_routes" value="<?=$edit_data['bus_routes'];?>">
                            </div>
                            <div class="col-md-12">
                                <h5>Sports & Extra-Curricuar Activities(optional)</h5>
                                <input type="text" class="form-control-file" placeholder="Cricket, Jam Section...." name="sports" value="<?=$edit_data['sports'];?>">
                            </div>
                        </div>
					</div>
					<!-- Section / End -->


					<!-- Section -->
					
					<!-- Section / End -->


					<!-- Section -->
					<div class="add-listing-section margin-top-45 ">
						
						<!-- Headline -->
						<div class="add-listing-headline ">
							<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
							<!-- Switcher -->
							<label class="switch"><input type="checkbox" name="openings" name="opening_hours" checked ><span class="slider round"></span></label>
						</div>
						
						<!-- Switcher ON-OFF Content -->
						<div class="switcher-content ">
<?php
$reslut=$this->common_model->get_days();

  $days=$reslut['days'];
  $loop=$reslut['timings'];
 $opening_hours=json_decode($edit_data['opening_hours']);

for ($i=0; $i < count($days); $i++) {
?>
<div class="row opening-day  ">
								<div class="col-md-2"><h5><?=$days[$i];?></h5></div>
								<div class="col-md-5">
									<select class="chosen-select" name="opening_time[]" data-placeholder="Opening Time" required="">
										<option label="Opening Time"></option>
										<option value="Closed" value="Closed" <?php if($opening_hours->opening_time[$i] == 'Closed'){echo 'selected';}?>>Closed</option>
									<?php 
									for ($j=0;$j<count($loop);$j++) {?>
										<option value="<?=$loop[$j];?>" <?php if($opening_hours->opening_time[$i] == $loop[$j]){echo 'selected';}?>><?=$loop[$j];?></option>
									<?php }
									?>
									</select>
								</div>
								<div class="col-md-5">
									<select class="chosen-select" name="closing_time[]" data-placeholder="Closing Time" required="">
										<option label="Closing Time"></option>
										<option value="Closed" <?php if($opening_hours->closing_time[$i] == 'Closed'){echo 'selected';}?>>Closed</option>
		<?php 
									for ($j=0;$j<count($loop);$j++) {?>
										<option value="<?=$loop[$j];?>" <?php if($opening_hours->closing_time[$i] == $loop[$j]){echo 'selected';}?>><?=$loop[$j];?></option>
									<?php }
									?>
									</select>
								</div>
							</div>
<?php }?>

						</div>
						<!-- Switcher ON-OFF Content / End -->

					</div>
					<!-- Section / End -->
                    
                    
                    <!-- Section -->
					<div class="add-listing-section margin-top-45">
						
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-book-open"></i>School Achievements</h3>
							<!-- Switcher -->
							<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
						</div>

						<!-- Switcher ON-OFF Content -->
						<div class="switcher-content">

							<div class="row">
								<div class="col-md-12">
									<table id="pricing-list-container">
										<?php 
							$achievements=json_decode($edit_data['achievements']);
							for($a=0;$a<count($achievements);$a++){
										?>
										<tr class="pricing-list-item pattern">
											<td>
												<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
												<div class="fm-input ">
                                                    <input type="text" placeholder="Achievement Title" name="achievements[]" value="<?=$achievements[$a];?>" /></div>
												
												<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
											</td>
										</tr>
									<?php }?>
									</table>
									<a href="#" class="button add-pricing-list-item">Add Item</a>
									
								</div>
							</div>

						</div>
						<!-- Switcher ON-OFF Content / End -->

					</div>
					<!-- Section / End -->
<!-- Section -->
					<div class="add-listing-section margin-top-45">
						
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-book-open"></i> Pricing</h3>
							<!-- Switcher -->
							<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
						</div>

						<!-- Switcher ON-OFF Content -->
						<div class="switcher-content">

							<div class="row">
								<div class="col-md-12">
									<table id="pricing-list-container1">
										<?php 
/*							$class_name=json_decode($edit_data['class_name']);
							$admission_fee=json_decode($edit_data['admission_fee']);
							$tution_fee=json_decode($edit_data['tution_fee']);
							for($a=0;$a<count($class_name);$a++){*/
								foreach ($class_price as $cl_price) {
										?>
										<tr class="pricing-list-item pattern school_pr">
											<td>
												<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
												<div class="fm-input pricing-name">
												<!-- 	<input type="text" placeholder="Class Name" name="class_name[]" value="<?=$cl_price['name'];?>" /> -->
												<select class="form-control"  name="class_name[]" required="">
									<option value="">Select Class</option>	
									 <?php $res=$this->common_model->select_results_info('classes',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
									<option value="<?=$row['id'];?>" <?=($row['id']==$cl_price['class_id'])? 'selected' : '' ;?>><?=$row['name'];?></option>
								<?php }?>
									
								</select>
                             	<?php echo form_error('class_name[]', '<div class="error">', '</div>'); ?>
												</div>
												<div class="fm-input pricing-ingredients"><input type="text" placeholder="Admission Fee" data-unit="INR" name="admission_fee[]"  value="<?=$cl_price['admission_fee'];?>" /></div>
												<div class="fm-input pricing-price"><input type="text" placeholder="Tution Fee" data-unit="INR" name="tution_fee[]"  value="<?=$cl_price['tution_fee'];?>" /></div>
												<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
											</td>
										</tr>
										<?php }?>
									</table>
									<a href="#" class="button add-pricing-list-item1">Add Item</a>
									
								</div>

								<div class="col-md-12">
                                <h5>Admission Status</h5>
                            <div class="col-md-2">
                        <label><input class="d--inline" type="radio" name="admission_status" value="1" required="" <?=($edit_data['admission_status'] == 1)? 'checked' : '' ?>>Opened</label>
                            </div>
                            <div class="col-md-2">
                        <label><input class="d--inline" type="radio" name="admission_status" value="0" required="" <?=($edit_data['admission_status'] == 0)? 'checked' : '' ?>>Closed</label>

                            </div>             
                     </div>
                     <?php echo form_error('admission_status', '<div class="error">', '</div>'); ?> 
                     <label class="error" for="admission_status"></label> 

							</div>

						</div>
						<!-- Switcher ON-OFF Content / End -->

					</div>
					<!-- Section / End -->
					<!-- <a href="#" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></a> -->
					<button type="submit" class="button preview">Submit</button>

				</div>
			</div>

		</div>

</form>

<form method="post" action="<?=base_url('admin/edit_listing/').$edit_id;?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
	<input type="hidden" name="list_type" value="gallery">
<div class="row">
			<div class="col-lg-12">

				<div id="add-listing">

					

					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-picture"></i> Gallery</h3>
						</div>
                        <div class="row with-forms">

							<div class="col-md-4 ">
                                <h5>Thumb Image </h5><p>(select image for list view)</p>
                                <input type="file" class="form-control-file" name="thumb" >
                                <div class="col-md-12">
                                	<div class="col-md-3">
                                <img src="<?=base_url('uploads/listings/thumb/'.$edit_data['id'].'.jpg');?>" class="img-fluid" style="height: 180px;">
                            	</div>
                            </div>
                            	
                            </div>
                            <div class="col-md-4">
                                <h5>Banner Image </h5><p>(select banner image for school page)</p>
                                <input type="file" class="form-control-file" name="banner[]" multiple>

                                <div class="col-md-12">
                                	<?php
                                $ban_img=$this->common_model->select_results_info('listing_banner',array('listing_id'=>$edit_data['id']))->result_array();
                                foreach ($ban_img as $ban) {
                                ?>
                                <div class="col-md-3">
                                		<a href="<?=base_url('delete_listing_img/listing_banner/'.$edit_data['id'].'/'.$ban['id']);?>"><i class="fa fa-trash"></i></a>
                                <img src="<?=base_url('uploads/listings/banners/'.$edit_data['id'].'/'.$ban['id'].'.jpg');?>" class="img-fluid" style="height: 180px;">
                            	</div>
                            <?php }?>
                            </div>
                            </div>
                            <div class="col-md-4">
                                <h5>Gallery Images </h5><p>(select multiple Images)</p>
                                <input type="file" class="form-control-file"  name="gallery[]" multiple>

                                <div class="col-md-12">
                                	<?php
                                $gal_img=$this->common_model->select_results_info('listing_gallery',array('listing_id'=>$edit_data['id']))->result_array();
                                foreach ($gal_img as $ban) {
                                ?>
                                <div class="col-md-3">
                                		<a href="<?=base_url('delete_listing_img/listing_gallery/'.$edit_data['id'].'/'.$ban['id']);?>"><i class="fa fa-trash"></i></a>
                                <img src="<?=base_url('uploads/listings/gallery/'.$edit_data['id'].'/'.$ban['id'].'.jpg');?>" class="img-fluid" style="height: 180px;">
                            	</div>
                            <?php }?>
                            </div>
                            </div>    
                        </div>
                             

					</div>
					<!-- Section / End -->
					<button type="submit" class="button preview">Submit</button>

				</div>
			</div>

		</div>

</form>




<!-- Scripts
================================================== -->

<!-- Opening hours added via JS (this is only for demo purpose) -->


<!-- DropZone | Documentation: http://dropzonejs.com -->
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/dropzone.js"></script>










<script>
      function initMap() {
       
       
        var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

       
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          console.log(place.geometry.location.lat()+', '+place.geometry.location.lng());
          //alert(place.geometry);
          $("#lat").val(place.geometry.location.lat());
           $("#lng").val(place.geometry.location.lng());
            $("#address").val(place.name);
          console.log(place.name);  
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

        });

        
      }
      
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?=$this->db->get_where('settings', array('setting_type' => 'google_api_key'))->row()->description; ?>&libraries=places&callback=initMap"
        async defer></script>















<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/ckeditor/ckeditor.js"></script> 


<script>
    CKEDITOR.replace( 'admission_procedure' );
</script>