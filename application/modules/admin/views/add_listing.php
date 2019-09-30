<style>
    .d--inline{
        display: inline!important;
    }

</style>


<form method="post" action="<?=base_url('admin/add_listing');?>" enctype="multipart/form-data" class="form-horizontal" id="form">
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
								<input class="search-field" type="text" value="" name="school_name" required="" autocomplete="off" />
							</div>
						</div>
<!-- School Code -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>School Code <i class="tip" data-tip-content="Name of your School"></i></h5>
								<input class="search-field" type="text" value="" name="school_code" required="" autocomplete="off" />
							</div>
						</div>
						<!-- Row -->
						<div class="row with-forms">

							<!-- Status -->
							<div class="col-md-6">
								<h5>Category</h5>
								<select class="form-control selectric chosen-select-no-single"  name="category[]" required=""  multiple="">
									<option value="" disabled="">Select Category</option>	
                                  <?php $res=$this->common_model->select_results_info('category',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
									<option value="<?=$row['id'];?>"><?=$row['name'];?></option>
								<?php }?>
								</select>
							</div>

							<!-- Type -->
							<div class="col-md-6">
								<h5>Keywords <i class="tip" data-tip-content="Maximum of 15 keywords related with your business"></i></h5>
								<input type="text" placeholder="Keywords should be separated by commas"  name="keywords" required="">
							</div>
						</div>
						<!-- Row / End -->
                        
                        <!-- Row -->
                        <div class="row with-forms">

							<!-- Vision -->
							<div class="col-md-12">
                                <h5>Curriculum</h5>
                            <div class="col-md-2">
								<label><input class="d--inline" type="radio" placeholder="SSC"  name="school_type" value="Boys" required="">Boys</label>
								<label><input class="d--inline" type="radio" placeholder="SSC"  name="school_type" value="Girls" required="">Girls</label>
								<label><input class="d--inline" type="radio" placeholder="SSC"  name="school_type" value="Co-Education" required="">co-education</label>
                            </div>        
							</div>
						</div>
						<div class="row with-forms">

							<!-- Vision -->
							<div class="col-md-12">
                                <h5>Curriculum</h5>
                            <?php $res=$this->common_model->select_results_info('curriculum',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
                            <div class="col-md-2">
								<label><input class="d--inline" type="radio" placeholder="SSC"  name="curriculum" value="<?=$row['id'];?>" required=""><?=$row['name'];?></label>
                            </div>
                        <?php }?>                          
							</div>
						</div>
						<!-- Row / End -->
                        
                        <!-- Row -->
						<div class="row with-forms">

							<!-- Vision -->
							<div class="col-md-12">
                                <h5>Classes</h5>
                                <select class="chosen-select-no-single form-control selectric"  name="class[]" required="" multiple="">
									<option label="blank" disabled="">Select Class</option>	
									 <?php $res=$this->common_model->select_results_info('classes',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
									<option value="<?=$row['id'];?>"><?=$row['name'];?></option>
								<?php }?>
									
								</select>
                             
                          
							</div>
						</div>
						<!-- Row / End -->
                        
                        

					</div>
					<!-- Section / End -->

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
									<input type="text"  id="pac-input" placeholder="e.g. My School Street" name="landmark" required="" autocomplete="off">
									<input type="hidden" id="lat" value="" name="latitude">
                                         <input type="hidden" id="lng" value="" name="longitude">
                                         <input type="hidden" id="address" value="" name="address">
								</div>
                                <!-- Address -->
								<div class="col-md-12">
									<h5>Address</h5>
									<textarea type="text" placeholder="e.g. 964 School Street" name="address" required=""></textarea>
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
                                <input type="file" class="form-control-file" name="banner" required="">
                            </div>
                            <div class="col-md-4">
                                <h5>Gallery Images </h5><p>(select multiple Images)</p>
                                <input type="file" class="form-control-file"  name="gallery[]" required="" multiple>
                            </div>    
                        </div>
                        
                        <div class="row with-forms">

							<div class="col-md-12 ">
                                <h5>Embed video Link(optional)</h5>
                                <input type="url" class="form-control-file" placeholder="Eg:https://www.tefy.com/embed/yfettefy" name="video">
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
								<textarea class="WYSIWYG" name="vision" cols="20" rows="2"  spellcheck="true" required="" placeholder="Enter the school vision in short note in 100 words"></textarea>
							</div>
						</div>
						<!-- Row / End -->
                        

						<!-- Description -->
						<div class="form">
							<h5>Description</h5>
							<textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true" required=""></textarea>
						</div>

						<!-- Row -->
						<div class="row with-forms">

							<!-- Phone -->
							<div class="col-md-4">
								<h5>Phone <span>(optional)</span></h5>
								<input type="text" name="phone">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<h5>Website <span>(optional)</span></h5>
								<input type="text" name="website">
							</div>

							<!-- Email Address -->
							<div class="col-md-4">
								<h5>E-mail <span>(optional)</span></h5>
								<input type="text" name="email">
							</div>

						</div>
						<!-- Row / End -->


						<!-- Row -->
						<div class="row with-forms">

							<!-- Phone -->
							<div class="col-md-4">
								<h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook <span>(optional)</span></h5>
								<input type="text" placeholder="https://www.facebook.com/" name="facebook">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<h5 class="twitter-input"><i class="fa fa-twitter"></i> Twitter <span>(optional)</span></h5>
								<input type="text" placeholder="https://www.twitter.com/" name="twiter">
							</div>

							<!-- Email Address -->
							<div class="col-md-4">
								<h5 class="gplus-input"><i class="fa fa-google-plus"></i> Google Plus <span>(optional)</span></h5>
								<input type="text" placeholder="https://plus.google.com/" name="google_plus">
							</div>

						</div>
						<!-- Row / End -->


						<!-- Checkboxes -->
						<h5 class="margin-top-30 margin-bottom-10">Amenities <span>(optional)</span></h5>
						<div class="checkboxes in-row margin-bottom-20">
					<?php $res=$this->common_model->select_results_info('facilities',array('row_status'=>1),"'name','ASC'")->result_array();
                                  foreach ($res as $row) {
                                  ?>
							<input id="check-a" type="checkbox" name="amenities[]" value="<?=$row['id'];?>">
							<label for="check-a"><?=$row['name'];?></label>
<?php }?>
							
					
						</div>
						<!-- Checkboxes / End -->

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
                                                    <input type="text" placeholder="Achievement Title" name="achievements[]" /></div>
												
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















