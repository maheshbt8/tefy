<?php
$this->session->set_userdata('last_page',current_url());
?>
<div class="main-search-container centered" data-background-image="<?=base_url('uploads/listings/banners/').$school['id'].'.jpg';?>" style="height: 300px;margin-top: 85px;">

    </div>
<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2><?=$school['school_name'];?></h2>
                    <div class="vision-txt"><b>"</b>Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision VisionVision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision Vision  <b>"</b></div>
					<span>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-map-marker"></i>
						<?=$school['address'];?>
						</a>
					</span>
					<div class="star-rating" data-rating="4.5">
						<div class="rating-counter"><a href="#listing-reviews"><B class="rating-bg" style="" >4.5</B>/5</a></div>
					</div>
				</div>
			</div>

			<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-overview" class="active">Overview</a></li>
					<!--<li><a href="#listing-pricing-list">Pricing</a></li>-->
					<li><a href="#listing-location">Location</a></li>
					<li><a href="#listing-reviews">Reviews</a></li>
					<li><a href="#add-review">Add Review</a></li>
				</ul>
			</div>
			
			<!-- Overview -->
			<div id="listing-overview" class="listing-section">

				<!-- Description -->
<?=$school['description'];?>
                <h3 class="listing-desc-headline">About-Us</h3>
                <span class="more">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </span>
				
				<h3 class="listing-desc-headline">Contact Info</h3>
				<!-- Listing Contacts -->
				<div class="listing-links-container">

					<ul class="listing-links contact-links">
						<li><a href="tel:12-345-678" class="listing-links"><i class="fa fa-phone"></i>Phone No.:  </a><?=$school['phone'];?></li>
						<li><a href="" class="listing-links"><i class="fa fa-envelope-o"></i> <span class="__cf_email__" data-cfemail="">Email: </span></a><?=$school['email'];?>
						</li>
						<li><a href="#" target="_blank"  class="listing-links"><i class="fas fa-globe"></i>Web site:  </a><?=$school['website'];?></li>
                        <li><a href="#" target="_blank"  class="listing-links"><i class="fa fa-link"></i> Full address: </a> 401, 4th Floor, New Mark House, opposite Medicover Hospital, HITEC City, Hyderabad, Telangana 500081&nbsp;&nbsp;<span class="direction-icon">(<i class="fa fa-envelope-o"></i>&nbsp;   Directions)</span></li>
					</ul>
					<div class="clearfix"></div>

					<ul class="listing-links">
						<!--<li><a href="<?=$school['facebook'];?>" target="_blank" class="listing-links-fb"><i class="fa fa-facebook-square"></i> Facebook</a></li>
						
						<li><a href="<?=$school['google_plus'];?>" target="_blank" class="listing-links-ig"><i class="fa fa-google-plus"></i> Google+</a></li>
						<li><a href="<?=$school['twitter'];?>" target="_blank" class="listing-links-tt"><i class="fa fa-twitter"></i> Twitter</a></li>-->
					</ul>
					<div class="clearfix"></div>

				</div>
				<div class="clearfix"></div>
                
                
                
                
                
           <!--Listings Key informations -->     
                <h3 class="listing-desc-headline">Key Information</h3>
				
				<div class="listing-links-container">
                    
                    <table>
                        <tr>
                            <td>Board :</td>
                            <td>SSC</td>
                        </tr>
                        <tr>
                            <td>Grade :</td>
                            <td>I-X</td>
                        </tr>
                        <tr>
                            <td>Medium :</td>
                            <td>English</td>
                        </tr>
                        <tr>
                            <td>School Type :</td>
                            <td>Co-Education</td>
                        </tr>
                         <tr>
                            <td>Category :</td>
                            <td>Play School, High School, DayScholor</td>
                        </tr>
                         <tr>
                            <td>Hostel :</td>
                            <td>Yes, Boys, Girls, Boys & Girls</td>
                        </tr>
                         <tr>
                            <td>Admission Procedure :&nbsp;</td>
                            <td>SADFGSDFZBFsdfgsdfgcXMZ<br>
                             SADFGSDFZBFsdfgsdfgcXMZ<br>
                             SADFGSDFZBFsdfgsdfgcXMZ<br>
                             SADFGSDFZBFsdfgsdfgcXMZ<br>
                             SADFGSDFZBFsdfgsdfgcXMZ<br></td>
                        </tr>
                        
                    </table>
					
					
					
					<div class="clearfix"></div>

				</div>


				<!-- Amenities -->
				<h3 class="listing-desc-headline">Amenities</h3>
				<!--<ul class="listing-features checkboxes margin-top-0">
					<?php
					//$ame=json_decode($school['amenities']);
					//for ($i=0; $i < count($ame); $i++) {
					?>
					<li><?=$this->common_model->get_type_name_by_where('facilities',array('id'=>$ame[$i]));?></li>
				<?php// }?>
				</ul>-->
				<ul class="amenity-list  margin-top-0">
                    <?php
					$ame=json_decode($school['amenities']);
					for ($i=0; $i < count($ame); $i++) {
					?>
                    <li class="aminity-size">
                       <img src="<?=base_url('uploads/facilities/').$this->common_model->get_type_name_by_where('facilities',array('id'=>$ame[$i]),'id').'.jpg';?>" class="amenity-img">
                       <p><?=$this->common_model->get_type_name_by_where('facilities',array('id'=>$ame[$i]));?></p>
                   </li>
                <?php }?>
                
                </ul>
                
                <style>svg {
  width: 70px;
  height: 70px;
}
svg:hover {
  fill: red;
}

</style>
                
                <ul class="amenity-list  margin-top-0">
                    
                    <li class="aminity-size">
                        <svg>
    <use xlink:href="#bike" />
  </svg>
                        
                       
                       <!--<img src="<?php //echo base_url('assets')?>/images/tefy1.svg" class="amenity-img">-->
                       <p>Bus Bus Bus Bus</p>
                   </li>
                 
                
                </ul>
			</div>
            <svg display="none">
  <symbol width="50" height="50" viewBox="0 0 24 24" id="bike">
    <path d="M141.73 109.96c35.64,0.14 160.63,-0.42 210.09,0.45 -14.79,7.38 -22.78,9.3 -38.55,19.75 -13.21,8.76 -37.43,34.29 -45.53,49.14 -20.94,1.32 -114.06,-0.37 -142.27,-0.66 -24.9,-0.25 -45.72,2.16 -56.83,-14.28 -11.68,-17.29 -7.27,-39.71 6.61,-49.47 3.93,-2.76 10.08,-5.13 17.33,-5.08 16.69,0.11 36.76,0.09 49.14,0.14zm107.42 280.34c0.16,-64.44 2.95,-140.57 31.57,-196.32 29.03,-56.56 75.78,-77.47 143.69,-83.25 10.95,-0.93 67,-2.58 73.43,1.1 11.89,6.79 13.77,38.58 2.7,56.75 -10.76,17.65 -31.98,8.11 -66.08,10.48 -23.29,1.62 -42.26,5.46 -58.61,16.23 -49.76,32.77 -57.05,110.94 -57.03,171.26 0.01,21.22 4.2,53.96 -4,70.51 -9.86,19.92 -38.34,22.68 -55.3,18.31 -12.98,-3.34 -10.29,-13.04 -10.31,-27.51 -0.02,-12.51 -0.09,-25.03 -0.06,-37.53zm129.91 -123.29c9.29,-1.5 34.95,-0.93 45.48,-0.37 14.64,0.77 24.64,5.14 30.18,14.62 9.7,16.6 9.02,49.91 -26.56,53.93 -23.63,2.67 -68.6,2.3 -77.05,-14.17 -4.85,-9.46 -5.36,-26.62 0.25,-36.4 4.99,-8.7 14.03,-15.39 27.71,-17.6zm-204.81 -0.46c23.26,0.12 46.62,0.13 69.88,0.09 -4.63,23.63 -7.89,41.06 -7.34,68.63 -6.81,0.45 -66.39,0.41 -68.64,-0.16 -18.93,-2.29 -34.42,-14.87 -32.17,-36.84 2.27,-22.21 17.18,-31.83 38.28,-31.71zm301.76 -266.55l-387.04 0c-48.94,0 -88.97,40.03 -88.97,88.97l0 387.03c0,48.94 40.03,88.97 88.97,88.97l387.04 0c48.94,0 88.97,-40.03 88.97,-88.97l0 -387.03c0,-48.94 -40.04,-88.97 -88.97,-88.97zm-266.36 409.45c40.99,-2.5 42.53,47.12 1.85,47.25 -14.95,0.05 -32.51,-6.23 -32.98,-22.92 -0.45,-16.06 15.43,-23.37 31.13,-24.33z"></path>
  </symbol>

  <symbol width="24" height="24" viewBox="0 0 24 24" id="bell">
    <path d="M11.5,22C11.64,22 11.77,22 11.9,21.96C12.55,21.82 13.09,21.38 13.34,20.78C13.44,20.54 13.5,20.27 13.5,20H9.5A2,2 0 0,0 11.5,22M18,10.5C18,7.43 15.86,4.86 13,4.18V3.5A1.5,1.5 0 0,0 11.5,2A1.5,1.5 0 0,0 10,3.5V4.18C7.13,4.86 5,7.43 5,10.5V16L3,18V19H20V18L18,16M19.97,10H21.97C21.82,6.79 20.24,3.97 17.85,2.15L16.42,3.58C18.46,5 19.82,7.35 19.97,10M6.58,3.58L5.15,2.15C2.76,3.97 1.18,6.79 1,10H3C3.18,7.35 4.54,5 6.58,3.58Z"></path>
  </symbol>

  <symbol width="24" height="24" viewBox="0 0 24 24" id="arrow">
    <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
  </symbol>
</svg>


			
		
			<!-- Location -->
			<div id="listing-location" class="listing-section">
				<h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Location</h3>

				<div id="singleListingMap-container">
					<div id="singleListingMap" data-latitude="<?=$school['latitude'];?>" data-longitude="<?=$school['longitude'];?>" data-map-icon="im im-icon-Hamburger"></div>
					<a href="#" id="streetView">Street View</a>
				</div>
			</div>
				
			

		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">
            <!-- Share / Like -->
			<div class="listing-share margin-top-40 margin-bottom-40 no-border">
				<button class="like-button"><span class="like-icon"></span> Bookmark this listing</button> 
				<span>159 people bookmarked this place</span>

			</div>

				
		
		<?php
			$opening_hours=json_decode($school['opening_hours']);
	$reslut=$this->common_model->get_days();

  $days=$reslut['days'];
  $loop=$reslut['timings'];
for ($i=0; $i < count($days); $i++) {
	if($days[$i] == date('l')){
	if($opening_hours->opening_time[$i]=='Closed'){
	$opening_con='Closed Now';
	}else{
	if((strtotime(date('h A')) >= strtotime($opening_hours->opening_time[$i])) && (strtotime(date('h A')) <= strtotime($opening_hours->closing_time[$i]))){
		$opening_con='Now Open';
	}else{
		$opening_con='Closed Now';
	}
	}
	}
	}
		?>

			<!-- Opening Hours -->
			<div class="boxed-widget opening-hours margin-top-35">
				<div class="listing-badge now-open"><?=$opening_con;?></div>
				<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
				<ul>
					<?php
					
for ($i=0; $i < count($days); $i++) {
	if($opening_hours->opening_time[$i]=='Closed'){
	$opening=$opening_hours->opening_time[$i];
	}else{
	$opening=$opening_hours->opening_time[$i].' - '.$opening_hours->closing_time[$i];
	}
					?>
					<li><?=$days[$i];?> <span><?=$opening;?></span></li>
				<?php }?>
				</ul>
			</div>
			<!-- Opening Hours / End -->


			<!-- Contact -->
			 <div class="boxed-widget margin-top-35">
				<div class="hosted-by-title">
					<h4><span> </span> <a href="pages-user-profile.html">Get in touch</a></h4>
					
				</div>
				<!--<ul class="listing-details-sidebar">
					<li><i class="sl sl-icon-phone"></i> (123) 123-456</li>
					 <li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li> 
					<li><i class="fa fa-envelope-o"></i> <a href="#"><span class="__cf_email__" data-cfemail="b1c5dedcf1d4c9d0dcc1ddd49fd2dedc">[email&#160;protected]</span></a></li>
				</ul>

				<ul class="listing-details-sidebar social-profiles">
					<li><a href="#" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
					<li><a href="#" class="twitter-profile"><i class="fa fa-twitter"></i> Twitter</a></li>
					 <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> 
				</ul>-->
                 <form action="<?=base_url('home/get_in_touch')?>" method="post">
                 	<?php
                 	if($this->session->flashdata('touch_message')!=''){
                 	?>
                 	<div class="alert">
  <strong><?=$this->session->flashdata('touch_message');?></strong>
</div>
<?php }?>
                 	<input type="text" placeholder="Your Name"  name="name" required="">
                    <input type="email" placeholder="Mail ID"  name="email" required="">
                    <input type="text" placeholder="Mobile No."  name="mobile" required="">
                     <textarea type="text" placeholder="Your Query"  name="query" required=""></textarea>
                 
                 <button class="button">Send Message</button>
                 </form>

				
			</div>
			<!-- Contact / End-->


			

		</div>
		<!-- Sidebar / End -->

	</div>
    
    <!--Achievements start-->
    <?php
$achievements=json_decode($school['achievements']);
if($achievements!=''){
	?>
    <div class="container">
		<div class="row">

			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-45">
					<strong class="headline-with-separator">Achievements</strong>
					<!--<span>Discover Top-Rated Local Businesses</span>-->
				</h3>
			</div>

			<div class="col-md-12">
				<div class="simple-slick-carousel dots-nav">

                    <!-- Listing Item -->
         <?php
					
					
					for ($i=0; $i < count($achievements); $i++) {
					?>
                    <div class="carousel-item">
                        <a href="" class="listing-item-container">
                            <div class="listing-item">
                                <div class="col-md-12 listing-item p--30">
                                    <img src="<?php echo base_url('assets')?>/images/listing-item-01.jpg" alt="">
                                   
                                </div>
                                <p class="txt-algn-cntr"><b><?=$achievements[$i];?></b></p>
                            </div>

                        </a>
                    </div>
                <?php }?>
                    <!-- Listing Item -->
         
                   <!--  <div class="carousel-item">
                        <a href="" class="listing-item-container">
                            <div class="listing-item">
                                <div class="col-md-12 listing-item p--30">
                                    <img src="<?php echo base_url('assets')?>/images/listing-item-01.jpg" alt="">
                                   
                                </div>
                                <p class="txt-algn-cntr"><b>Achievement title</b></p>
                            </div>

                        </a>
                    </div> -->
                    <!-- Listing Item -->
         
                    <!-- <div class="carousel-item">
                        <a href="" class="listing-item-container">
                            <div class="listing-item">
                                <div class="col-md-12 listing-item p--30">
                                    <img src="<?php echo base_url('assets')?>/images/listing-item-01.jpg" alt="">
                                   
                                </div>
                                <p class="txt-algn-cntr"><b>Achievement title</b></p>
                            </div>

                        </a>
                    </div> -->
                    <!-- Listing Item -->
         
                   <!--  <div class="carousel-item">
                        <a href="" class="listing-item-container">
                            <div class="listing-item">
                                <div class="col-md-12 listing-item p--30">
                                    <img src="<?php echo base_url('assets')?>/images/listing-item-01.jpg" alt="">
                                   
                                </div>
                                <p class="txt-algn-cntr"><b>Achievement title</b></p>
                            </div>

                        </a>
                    </div> -->
                    <!-- Listing Item -->
         
                    <!-- <div class="carousel-item">
                        <a href="" class="listing-item-container">
                            <div class="listing-item">
                                <div class="col-md-12 listing-item p--30">
                                    <img src="<?php echo base_url('assets')?>/images/listing-item-01.jpg" alt="">
                                   
                                </div>
                                <p class="txt-algn-cntr"><b>Achievement title</b></p>
                            </div>

                        </a>
                    </div> -->
                    <!-- Listing Item -->
         
                    <!-- <div class="carousel-item">
                        <a href="" class="listing-item-container">
                            <div class="listing-item">
                                <div class="col-md-12 listing-item p--30">
                                    <img src="<?php echo base_url('assets')?>/images/listing-item-01.jpg" alt="">
                                   
                                </div>
                                <p class="txt-algn-cntr"><b>Achievement title</b></p>
                            </div>

                        </a>
                    </div> -->
                    
                   
                    

                </div>
                
				
			</div>
           
		</div>
	</div>
    <?php }?>
    <!--gallery start-->
    <div class="container">
		<div class="row">

			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-45">
					<strong class="headline-with-separator">Gallery</strong>
					<!--<span>Discover Top-Rated Local Businesses</span>-->
				</h3>
			</div>

			<div class="col-md-12">
				<div class="simple-slick-carousel dots-nav">

                    <!-- Listing Item -->
         <?php
					
					$gallery=$this->common_model->select_results_info('listing_gallery',array('listing_id'=>$school['id']))->result_array();
					foreach ($gallery as $gal){
					?>
                    <div class="carousel-item">
                        <a href="" class="listing-item-container">
                            <div class="listing-item">
                                <div class="col-md-12 listing-item p--0 ">
                                    <img src="<?=base_url('uploads/listings/gallery/').$school['id'].'/'.$gal['id'].'.jpg';?>" alt="">
                                   
                                </div>
                             
                            </div>
                        </a>
                    </div>
                   
                   <?php }?>
                    

                </div>
                
				
			</div>
           
		</div>
	</div>
    <div class= "container" style="display: none;">
        <!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Reviews <span>(12)</span></h3>

				<!-- Rating Overview -->
				<div class="rating-overview">
					
						<div class="row">
							<div class="col-md-8">
								<div class="clearfix"></div>

				<!-- Reviews -->
				<section class="comments listing-reviews">
					<ul>
						<li>
							<div class="avatar"><img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by">Kathy Brown <i class="tip" data-tip-content="Person who left this review actually was a customer"></i> <span class="date">June 2019</span>
									<div class="star-rating" data-rating="5"></div>
								</div>
								<p>Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus</p>
								
								<div class="review-images mfp-gallery-container">
									<a href="images/review-image-01.jpg" class="mfp-gallery"><img src="images/review-image-01.jpg" alt=""></a>
								</div>
								<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review <span>12</span></a>
							</div>
						</li>

						<li>
							<div class="avatar"><img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /> </div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by">John Doe<span class="date">May 2019</span>
									<div class="star-rating" data-rating="4"></div>
								</div>
								<p>Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.</p>
								<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review <span>2</span></a>
							</div>
						</li>

						<li>
							<div class="avatar"><img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by">Kathy Brown<span class="date">June 2019</span>
									<div class="star-rating" data-rating="5"></div>
								</div>
								<p>Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus</p>
								
								<div class="review-images mfp-gallery-container">
									<a href="images/review-image-02.jpg" class="mfp-gallery"><img src="images/review-image-02.jpg" alt=""></a>
									<a href="images/review-image-03.jpg" class="mfp-gallery"><img src="images/review-image-03.jpg" alt=""></a>
								</div>
								<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review <span>4</span></a>
							</div>
						</li>

						<li>
							<div class="avatar"><img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /> </div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by">John Doe<span class="date">May 2019</span>
									<div class="star-rating" data-rating="5"></div>
								</div>
								<p>Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.</p>
								<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review</a>
							</div>

						</li>
					 </ul>
				</section>

				<!-- Pagination -->
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<!-- Pagination -->
						<div class="pagination-container margin-top-30">
							<nav class="pagination">
								<ul>
									<li><a href="#" class="current-page">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
							</div>
							<div class="col-md-4">
								<!-- Add Review Box -->
			<div id="add-review" class="add-review-box">

				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-10">Add Review</h3>
				<p class="comment-notes">Your email address will not be published.</p>

				<!-- Subratings Container -->
				<div class="sub-ratings-container">
					<!-- Subrating #4 -->
					<div class="add-sub-rating">
						<div class="sub-rating-title">Cleanliness <i class="tip" data-tip-content="The physical condition of the business"></i></div>
						<div class="sub-rating-stars">
							<!-- Leave Rating -->
							<div class="clearfix"></div>
							<form class="leave-rating">
								<input type="radio" name="rating" id="rating-31" value="1"/>
								<label for="rating-31" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-32" value="2"/>
								<label for="rating-32" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-33" value="3"/>
								<label for="rating-33" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-34" value="4"/>
								<label for="rating-34" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-35" value="5"/>
								<label for="rating-35" class="fa fa-star"></label>
							</form>
						</div>
					</div>	

					<!-- Uplaod Photos -->
	                <!-- <div class="uploadButton margin-top-15">
	                    <input class="uploadButton-input" type="file"  name="attachments[]" accept="image/*, application/pdf" id="upload" multiple/>
	                    <label class="uploadButton-button ripple-effect" for="upload">Add Photos</label>
	                    <span class="uploadButton-file-name"></span>
	                </div> -->
	                <!-- Uplaod Photos / End -->

				</div>
				<!-- Subratings Container / End -->

				<!-- Review Comment -->
				<form id="add-comment" class="add-comment">
					<fieldset>

						<div class="row">
							<div class="col-md-12">
								<label>Name:</label>
								<input type="text" value=""/>
							</div>
								
							<div class="col-md-12">
								<label>Email:</label>
								<input type="text" value=""/>
							</div>
						</div>

						<div>
							<label>Review:</label>
							<textarea cols="40" rows="3"></textarea>
						</div>

					</fieldset>

					<button class="button">Submit Review</button>
					<div class="clearfix"></div>
				</form>

			</div>
			<!-- Add Review Box / End -->
							</div>
						</div>
				</div>
				<!-- Rating Overview / End -->

			</div>


			



		</div>


		<!-- Sidebar / End -->

	</div>
