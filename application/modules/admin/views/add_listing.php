<style>
    .d--inline{
        display: inline!important;
    }

</style>

<form method="post" action="<?=base_url('admin/add_listing');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
<div class="row">
			<div class="col-lg-12">

				<div id="add-listing">

					<!--Basic Info Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>School Name <i class="tip" data-tip-content="Name of your School"></i></h5>
								<input class="search-field" type="text" value="<?=set_value('school_name');?>" name="school_name" required="" autocomplete="off" />
								<?php echo form_error('school_name', '<div class="error">', '</div>'); ?>
							</div>
						</div>
<!-- School Code -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>School Registration Code <i class="tip" data-tip-content="Name of your School"></i></h5>
								<input class="search-field" type="text" value="<?=set_value('school_code');?>" name="school_code" required="" autocomplete="off" />
								<?php echo form_error('school_code', '<div class="error">', '</div>'); ?>
							</div>
						</div>
						<!-- Row -->
						<div class="row with-forms">

							<!-- Status -->
							<div class="col-md-6">
								<h5>Category</h5>
								<select class="form-control selectric chosen-select-no-single" id="category"  name="category[]" required=""  multiple="">
									<option value="" disabled="">Select Category</option>	
                                  <?php $res=$this->common_model->select_results_info('category',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
									<option value="<?=$row['id'];?>"><?=$row['name'];?></option>
								<?php }?>
								</select>
								<?php echo form_error('category[]', '<div class="error">', '</div>'); ?>
								<label class="error" for="category[]"></label>
							</div>


							<!-- Type -->
							<div class="col-md-6">
								<h5>Keywords <i class="tip" data-tip-content="Maximum of 15 keywords related with your business"></i></h5>
								<input type="text" placeholder="Keywords should be separated by commas"  name="keywords" required="" value="<?=set_value('keywords');?>">
								<?php echo form_error('keywords', '<div class="error">', '</div>'); ?>
							</div>
						</div>
						<!-- Row / End -->
                        
                        
						<div class="row with-forms">

							<!-- Vision -->
							<div class="col-md-12">
                                <h5>Curriculum</h5>
                            <?php $res=$this->common_model->select_results_info('curriculum',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
                            <div class="col-md-2">
								<label><input class="d--inline" type="radio" placeholder="SSC"  name="curriculum" value="<?=$row['id'];?>" required="" <?=(set_value('curriculum') == $row['id'])? 'checked' : '' ?>><?=$row['name'];?></label>
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
                                    <label><input class="d--inline" type="radio" placeholder="SSC"  name="school_type" value="Boys" required=""  <?=(set_value('school_type') == 'Boys')? 'checked' : '' ?>>Boys</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder="SSC"  name="school_type" value="Girls" required=""  <?=(set_value('school_type') == 'Girls')? 'checked' : '' ?>>Girls</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder="SSC"  name="school_type" value="Co-Education" required=""  <?=(set_value('school_type') == 'Co-Education')? 'checked' : '' ?>>Co-Education</label>
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
                                    <label><input class="d--inline" type="radio" placeholder=""  name="school_format" value="Only Day Scholars" required="" <?=(set_value('school_format') == 'Only Day Scholars')? 'checked' : '' ?>>Only Day Scholars</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="school_format" value="Only Hostel" required="" <?=(set_value('school_format') == 'Only Hostel')? 'checked' : '' ?>>Only Hostel</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="school_format" value="Both" required="" <?=(set_value('school_format') == 'Both')? 'checked' : '' ?>>Both</label>
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
                                    <label><input class="d--inline" type="radio" placeholder=""  name="hostels" value="No" required="" checked="" <?=(set_value('hostels') == 'No')? 'checked' : '' ?>>No</label>
                                </div>
                                <div class="col-md-3">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="hostels" value="Only for Boys" required="" <?=(set_value('hostels') == 'Only for Boys')? 'checked' : '' ?>>Only for Boys</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="hostels" value="Only for Girls" required="" <?=(set_value('hostels') == 'Only for Girls')? 'checked' : '' ?>>Only for Girls</label>
                                </div>
                                <div class="col-md-2">
                                    <label><input class="d--inline" type="radio" placeholder=""  name="hostels" value="For Boys & Girls" required="" <?=(set_value('hostels') == 'For Boys & Girls')? 'checked' : '' ?>>For Boys & Girls</label>
                                </div>
							</div>
							<?php echo form_error('hostels', '<div class="error">', '</div>'); ?>
                                <label class="error" for="hostels"></label>
						</div>
                        
                        <!-- Row -->
						<div class="row with-forms">

							<!--  -->
							<div class="col-md-6">
                                <h5>Classes</h5>
                                <select class="chosen-select-no-single form-control selectric"  name="class[]" required="" multiple="">
									<option label="blank" disabled="">Select Class</option>	
									 <?php $res=$this->common_model->select_results_info('classes',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
									<option value="<?=$row['id'];?>"><?=$row['name'];?></option>
								<?php }?>
									
								</select>
                             	<?php echo form_error('class[]', '<div class="error">', '</div>'); ?>
                          	
							</div>
                            
							<!--  -->
							<div class="col-md-6">
                                <h5>Medium</h5>
                                <select class="chosen-select-no-single form-control selectric"  name="medium[]" required="" multiple="">
                                	<option label="blank" disabled="">Select Medium</option>
									<?php $res=$this->common_model->select_results_info('medium',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
									<option value="<?=$row['id'];?>"><?=$row['name'];?></option>
								<?php }?>									
								</select>
                             	<?php echo form_error('medium[]', '<div class="error">', '</div>'); ?>
                          
							</div>
						</div>
						<!-- Row / End -->
                        
                        

					</div>
					<!-- Basic Info Section / End -->

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
								<input class="search-field" type="text" value="<?=set_value('founders_name');?>" name="founders_name" placeholder="Founders Name(If any)" required="" autocomplete="off" />
								<?php echo form_error('founders_name', '<div class="error">', '</div>'); ?>
							</div>
						
							<div class="col-md-6">
								<h5>Brand Name </h5>
								<input class="search-field" type="text" value="<?=set_value('brand_name');?>" name="brand_name" placeholder="Brand name" required="" autocomplete="off" />
								<?php echo form_error('brand_name', '<div class="error">', '</div>'); ?>
							</div>
					
							<div class="col-md-6">
								<h5>Number of Branches </h5>
								<input class="search-field" type="text" value="<?=set_value('no_of_branches');?>" name="no_of_branches" placeholder="Brand name" required="" autocomplete="off" />
								<?php echo form_error('no_of_branches', '<div class="error">', '</div>'); ?>
							</div>
						
							<div class="col-md-6">
								<h5>Year of Establishment of brand</h5>
								<input class="search-field" type="text" value="<?=set_value('est_year');?>" name="est_year" placeholder="" required="" autocomplete="off" />
								<?php echo form_error('est_year', '<div class="error">', '</div>'); ?>
							</div>
						
							<div class="col-md-6">
								<h5>Year of Establishment of the specific branch</h5>
								<input class="search-field" type="text" value="<?=set_value('est_branch_year');?>" name="est_branch_year" placeholder="" required="" autocomplete="off" />
								<?php echo form_error('est_branch_year', '<div class="error">', '</div>'); ?>
							</div>
						
                   
							<div class="col-md-6">
								<h5>Average Expirience of Faculty</h5>
								<input class="search-field" type="text" value="<?=set_value('faculty_exp');?>" name="faculty_exp" placeholder="" required="" autocomplete="off" />
								<?php echo form_error('faculty_exp', '<div class="error">', '</div>'); ?>
							</div>
						
                        
							<div class="col-md-6">
								<h5>Any Notable Alumni</h5>
								<input class="search-field" type="text" value="<?=set_value('alumni');?>" name="alumni" placeholder="" required="" autocomplete="off" />
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
								<input class="search-field" type="text" value="<?=set_value('principal_number');?>" name="principal_number" placeholder="" required="" autocomplete="off" />
								<?php echo form_error('principal_number', '<div class="error">', '</div>'); ?>
							</div>
                            <div class="col-md-4">
                                    <h5>Telephone Number </h5>
                                    <input class="search-field" type="text" value="<?=set_value('telephone_number');?>" name="telephone_number" placeholder="" required="" autocomplete="off" />
                                    <?php echo form_error('telephone_number', '<div class="error">', '</div>'); ?>
                                </div>

							<div class="col-md-4">
                                    <h5>Email </h5>
                                    <input class="search-field" type="text" value="<?=set_value('school_email');?>" name="school_email" placeholder="" required="" autocomplete="off" />
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
							<textarea type="text" class="form-control" name="admission_procedure" value="<?=set_value('admission_procedure');?>" required=""></textarea>
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
									<input type="text"  id="pac-input" placeholder="e.g. My School Street" name="landmark" required="" autocomplete="off" value="<?=set_value('landmark');?>">
									<input type="hidden" id="lat" name="latitude" value="<?=set_value('lat');?>">
                                         <input type="hidden" id="lng" value="<?=set_value('lng');?>" name="longitude">
                                         <input type="hidden" id="address" value="<?=set_value('address');?>" name="address">
                                         <?php echo form_error('landmark', '<div class="error">', '</div>'); ?>
								</div>
                                <!-- Address -->
								<div class="col-md-12">
									<h5>Address</h5>
									<textarea type="text" placeholder="e.g. 964 School Street" name="address" required=""><?=set_value('address');?></textarea>
									<?php echo form_error('address', '<div class="error">', '</div>'); ?>
								</div>

								<div class="col-md-12">
                                <h5>Address URL</h5>
                                <input type="url" class="form-control-file" placeholder="Eg:https://www.google.com/maps/embed?" name="address_url" required="" value="<?=set_value('address_url');?>">
                                <?php echo form_error('address_url', '<div class="error">', '</div>'); ?>
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
							<h3><i class="sl sl-icon-picture"></i> Gallery</h3>
						</div>
                        <div class="row with-forms">

							<div class="col-md-4 ">
                                <h5>Thumb Image </h5><p>(select image for list view)</p>
                                <input type="file" class="form-control-file" name="thumb" required="" >
                                
                            </div>
                            <div class="col-md-4">
                                <h5>Banner Image </h5><p>(select banner image for school page)</p>
                                <input type="file" class="form-control-file" name="banner[]" required="" multiple>
                            </div>
                            <div class="col-md-4">
                                <h5>Gallery Images </h5><p>(select multiple Images)</p>
                                <input type="file" class="form-control-file"  name="gallery[]" required="" multiple>
                            </div>    
                        </div>
                        
                        <div class="row with-forms">

							<div class="col-md-12">
                                <h5>Embed video Link(optional)</h5>
                                <input type="url" class="form-control-file" placeholder="Eg:https://www.tefy.com/embed/yfettefy" name="video" value="<?=set_value('video');?>">
                            </div>
                            
                        </div>
                            
						<!-- Dropzone -->
						<!--<div class="submit-section">
							<form action="" class="dropzone" enctype="multipart/form-data"></form>
							<form action="http://www.vasterad.com/file-upload" enctype="multipart/form-data" class="dropzone" >
								
							</form>
						</div> -->

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
								<textarea class="WYSIWYG" name="vision" cols="20" rows="2"  spellcheck="true" required="" placeholder="Enter the school vision in short note in 100 words"><?=set_value('vision');?></textarea>
								<?php echo form_error('vision', '<div class="error">', '</div>'); ?>
							</div>
						</div>
						<!-- Row / End -->
                        

						<!-- Description -->
						<div class="form">
							<h5>Description</h5>
							<textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true" required=""><?=set_value('description');?></textarea>
							<?php echo form_error('description', '<div class="error">', '</div>'); ?>
						</div>

						<!-- Row -->
						<div class="row with-forms">

							<!-- Phone -->
							<div class="col-md-4">
								<h5>Phone <span>(optional)</span></h5>
								<input type="text" name="phone" value="<?=set_value('phone');?>">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<h5>Website <span>(optional)</span></h5>
								<input type="text" name="website"value="<?=set_value('website');?>">
							</div>

							<!-- Email Address -->
							<div class="col-md-4">
								<h5>E-mail <span>(optional)</span></h5>
								<input type="text" name="email" value="<?=set_value('email');?>">
							</div>

						</div>
						<!-- Row / End -->


						<!-- Row -->
						<div class="row with-forms">

							<!-- Phone -->
							<div class="col-md-4">
								<h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook <span>(optional)</span></h5>
								<input type="text" placeholder="https://www.facebook.com/" name="facebook" value="<?=set_value('facebook');?>">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<h5 class="twitter-input"><i class="fa fa-twitter"></i> Twitter <span>(optional)</span></h5>
								<input type="text" placeholder="https://www.twitter.com/" name="twiter" value="<?=set_value('twiter');?>">
							</div>

							<!-- Email Address -->
							<div class="col-md-4">
								<h5 class="gplus-input"><i class="fa fa-youtube"></i> Youtube <span>(optional)</span></h5>
								<input type="text" placeholder="https://youtube.com/" name="youtube" value="<?=set_value('youtube');?>">
							</div>

						</div>
						<!-- Row / End -->


						<!-- Checkboxes -->
						<h5 class="margin-top-30 margin-bottom-10">Amenities <span>(optional)</span></h5>
						<div class="checkboxes in-row margin-bottom-20">
					<?php $res=$this->common_model->select_results_info('facilities',array('row_status'=>1),"'name','ASC'")->result_array();
                                  $a=0;foreach ($res as $row) {
                                  ?>
							<input id="check<?=$a;?>" type="checkbox" name="amenities[]" value="<?=$row['id'];?>">
							<label for="check<?=$a;?>"><?=$row['name'];?></label>
<?php $a++;}?>
							
					<?php echo form_error('amenities[]', '<div class="error">', '</div>'); ?>
						</div>
						<!-- Checkboxes / End -->
<div class="row with-forms">

							<div class="col-md-12">
                                <h5>Bus Routes(optional)</h5>
                                <input type="text" class="form-control-file" placeholder="Route1, Route2, Route3...." name="bus_routes" value="<?=set_value('bus_routes');?>">
                            </div>
                            <div class="col-md-12">
                                <h5>Sports & Extra-Curricuar Activities(optional)</h5>
                                <input type="text" class="form-control-file" placeholder="Cricket, Jam Section...." name="sports" value="<?=set_value('sports');?>">
                            </div>
                        </div>
					</div>
					<!-- Section / End -->


					<!-- Section -->
					
					<!-- Section / End -->


					<!-- Section -->
					<div class="add-listing-section margin-top-45">
						
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
							<!-- Switcher -->
							<label class="switch"><input type="checkbox" name="openings" name="opening_hours" checked ><span class="slider round"></span></label>
						</div>
						
						<!-- Switcher ON-OFF Content -->
						<div class="switcher-content">
<?php
$reslut=$this->common_model->get_days();

  $days=$reslut['days'];
  $loop=$reslut['timings'];
for ($i=0; $i < count($days); $i++) {
?>
<div class="row opening-day">
								<div class="col-md-2"><h5><?=$days[$i];?></h5></div>
								<div class="col-md-5">
									<select class="chosen-select" name="opening_time[]" data-placeholder="Opening Time" required="">
										<option label="Opening Time"></option>
										<option value="Closed">Closed</option>
									<?php 
									for ($j=0;$j<count($loop);$j++) {?>
										<option><?=$loop[$j];?></option>
									<?php }
									?>
									</select>
								</div>
								<div class="col-md-5">
									<select class="chosen-select" name="closing_time[]" data-placeholder="Closing Time" required="">
										<option label="Closing Time"></option>
										<option value="Closed">Closed</option>
		<?php 
									for ($j=0;$j<count($loop);$j++) {?>
										<option><?=$loop[$j];?></option>
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
										<tr class="pricing-list-item pattern">
											<td>
												<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
												<div class="fm-input ">
                                                    <input type="text" placeholder="Achievement Title" name="achievements[]" />
                                                </div>
												<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
											</td>
										</tr>
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
										<tr class="pricing-list-item pattern school_pr">
											<td>
												<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
												<div class="fm-input pricing-name"><input type="text" placeholder="Class Name" name="class_name[]" /></div>
												<div class="fm-input pricing-ingredients"><input type="text" placeholder="Admission Fee" data-unit="INR" name="admission_fee[]" /></div>
												<div class="fm-input pricing-price"><input type="text" placeholder="Tution Fee" data-unit="INR" name="tution_fee[]" /></div>
												<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
											</td>
										</tr>
									</table>
									<a href="#" class="button add-pricing-list-item1">Add Item</a>
									
								</div>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZ-5bkYW9Wb5k2JLBoaas0HSx7ZBkMwAM&libraries=places&callback=initMap"
        async defer></script>











<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/ckeditor/ckeditor.js"></script> 


<script>
    CKEDITOR.replace( 'admission_procedure' );
</script>



