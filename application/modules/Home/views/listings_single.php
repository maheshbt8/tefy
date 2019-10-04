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
                <!--    <ul class="listing-details-sidebar">
					<li><i class="sl sl-icon-phone"></i> (123) 123-456</li>
					 <li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li> 
					<li><i class="fa fa-envelope-o"></i> <a href="#"><span class="__cf_email__" data-cfemail="b1c5dedcf1d4c9d0dcc1ddd49fd2dedc">[email&#160;protected]</span></a></li>
				</ul>-->

				<!--	<ul class="listing-links contact-links">
						<li><a href="tel:12-345-678" class="listing-links"><i class="fa fa-phone"></i>Phone No.:  </a><?=$school['phone'];?></li>
						<li><a href="" class="listing-links"><i class="fa fa-envelope-o"></i> <span class="__cf_email__" data-cfemail="">Email: </span></a><?=$school['email'];?>
						</li>
						<li><a href="#" target="_blank"  class="listing-links"><i class="fas fa-globe"></i>Web site:  </a><?=$school['website'];?></li>
                        <li><a href="#" target="_blank"  class="listing-links"><i class="fa fa-link"></i> Full address: </a> 401, 4th Floor, New Mark House, opposite Medicover Hospital, HITEC City, Hyderabad, Telangana 500081&nbsp;&nbsp;<span class="direction-icon">(<i class="fa fa-envelope-o"></i>&nbsp;   Directions)</span></li>
					</ul>
					<div class="clearfix"></div>-->
                    <ul class="listing-links contact-links">
						<li><i class="sl sl-icon-phone"></i>&nbsp; &nbsp;&nbsp; &nbsp; <?=$school['phone'];?></li>
						<li><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;&nbsp; &nbsp;<?=$school['email'];?>
						</li>
						<li><i class="sl sl-icon-globe"></i>&nbsp;&nbsp;&nbsp; &nbsp;<?=$school['website'];?></li>
                        <li><i class="fa fa-link"></i>&nbsp;&nbsp;&nbsp; &nbsp;#401, 4th Floor, New Mark House, opposite Medicover Hospital, HITEC City, Hyderabad, Telangana 500081&nbsp;&nbsp;<span class="direction-icon">(<i class="fa fa-envelope-o"></i>&nbsp;   Directions)</span></li>
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
                         <tr class="vert-algn-none">
                            <td>Admission Procedure :&nbsp;</td>
                            <td>SADFGSDFZBFsdfgsdfgcXMZ<br>
                             SADFGSDFZBFsdfgsdfgcXMZ<br>
                             SADFGSDFZBFsdfgsdfgcXMZ<br>
                             SADFGSDFZBFsdfgsdfgcXMZ<br>
                             SADFGSDFZBFsdfgsdfgcXMZ<br></td>
                        </tr>
                        <tr>
                            <td>Social Media :</td>
                            <td>
                                <ul class="social-icons margin-top-20">
                                    <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a class="youtube" href="#"><i class="icon-youtube"></i></a></li>
                                </ul>

                            </td>
                        </tr>
                        
                    </table>
					
					
					
					<div class="clearfix"></div>

				</div>
                
                
                 <!--Transport facility -->     
                <h3 class="listing-desc-headline">Transport Facility</h3>
				
				<div class="listing-links-container">
                    
                    <style>
                        #limheight {
                                height: auto; /*your fixed height*/
                                -webkit-column-count: 4;
                                   -moz-column-count: 4;
                                        column-count: 4; /*3 in those rules is just placeholder -- can be anything*/
                            }

                            #limheight li {
                                display: inline-block; /*necessary*/
                            }
                    </style>
					<ul id = "limheight">
                        <li><a href="">Route-Route- 1</a></li>
                        <li><a href="">Route-Route- 2</a></li>
                        <li><a href="">Route-Route- 3</a></li>
                        <li><a href="">Route-Route- 4</a></li>    
                        <li><a href="">Route-Route- 5</a></li>
                        <li><a href="">Route-Route- 6</a></li>
                        <li><a href="">Route-Route- 7</a></li>
                        <li><a href="">Route-Route- 8</a></li>
                        <li><a href="">Route-Route- 9</a></li>
                        <li><a href="">Route-Route- 10</a></li>
                        <li><a href="">Route-Route- 11</a></li>
                        <li><a href="">Route-Route- 12</a></li>    
                        <li><a href="">Route-Route- 13</a></li>
                        <li><a href="">Route-Route- 14</a></li>
                        <li><a href="">Route-Route- 15</a></li>
                        <li><a href="">Route-Route- 16</a></li>
                        <li><a href="">Route-Route- 17</a></li>    
                        <li><a href="">Route-Route- 18</a></li>
                        <li><a href="">Route-Route- 19</a></li>
                        <li><a href="">Route-Route- 20</a></li>
                    </ul>
					
					
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
                   
                <ul class="amenity-list  margin-top-0">
                    
                    <li class="aminity-size aminity">
                       <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" class="amenity-img">
                       <p>Bus Bus Bus Bus</p>
                   </li>
                 <li class="aminity-size aminity">
                       <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" class="amenity-img">
                       <p>Bus Bus Bus Bus</p>
                   </li>
                 <li class="aminity-size aminity">
                       <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" class="amenity-img">
                       <p>Bus Bus Bus Bus</p>
                   </li>
                 <li class="aminity-size aminity">
                       <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" class="amenity-img">
                       <p>Bus Bus Bus Bus</p>
                   </li>
                 <li class="aminity-size aminity">
                       <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" class="amenity-img">
                       <p>Bus Bus Bus Bus</p>
                   </li>
                 <li class="aminity-size aminity">
                       <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" class="amenity-img">
                       <p>Bus Bus Bus Bus</p>
                   </li>
                 <li class="aminity-size aminity">
                       <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" class="amenity-img">
                       <p>Bus Bus Bus Bus</p>
                   </li>
                 <li class="aminity-size aminity">
                       <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" class="amenity-img">
                       <p>Bus Bus Bus Bus</p>
                   </li>
                 <li class="aminity-size aminity">
                       <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" class="amenity-img">
                       <p>Bus Bus Bus Bus</p>
                   </li>
                 <li class="aminity-size aminity">
                       <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" class="amenity-img">
                       <p>Bus Bus Bus Bus</p>
                   </li>
                 
                
                </ul>
			</div>
            


			
		
			<!-- Location -->
			<!--<div id="listing-location" class="listing-section">
				<h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Location</h3>

				<div id="singleListingMap-container">
					<div id="singleListingMap" data-latitude="<?=$school//['latitude'];?>" data-longitude="<?=$school//['longitude'];?>" data-map-icon="im im-icon-Hamburger"></div>
					<a href="#" id="streetView">Street View</a>
				</div>
			</div>-->
				
			
           
            

		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-25 sticky">
            <!-- Video -->
			<div class="listing-share  margin-bottom-40 no-border">
				<!--<button class="like-button"><span class="like-icon"></span> Bookmark this listing</button> 
				<span>159 people bookmarked this place</span>-->
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/k85mRPqvMbE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
            
            <!-- Contact -->
			 <div class="boxed-widget margin-top-35">
				<div class="hosted-by-title">
					<h4><span> </span> <a href="pages-user-profile.html">Fee Structure</a></h4>
					
				</div>
                 <h3>Tution Fee Ranges From <span>10,000</span>/- to <span>1,00,000</span>/-</h3>
                 <div>*Actual Fee may vary</div>
                 
				<!--<ul class="listing-details-sidebar">
					<li><i class="sl sl-icon-phone"></i> (123) 123-456</li>
					 <li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li> 
					<li><i class="fa fa-envelope-o"></i> <a href="#"><span class="__cf_email__" data-cfemail="b1c5dedcf1d4c9d0dcc1ddd49fd2dedc">[email&#160;protected]</span></a></li>
				</ul>-->

				<!--<ul class="listing-details-sidebar social-profiles">
					<li><a href="#" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
					<li><a href="#" class="twitter-profile"><i class="fa fa-twitter"></i> Twitter</a></li>
					 <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> 
				</ul>-->
                 
				
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
            
            <!--maps-->
            <div id="listing-location" class="listing-section">
				<h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Location</h3>

				<div id="singleListingMap-container">
					<div id="singleListingMap" data-latitude="<?=$school['latitude'];?>" data-longitude="<?=$school['longitude'];?>" data-map-icon="im im-icon-Hamburger"></div>
					<a href="#" id="streetView">Street View</a>
				</div>
			</div>


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
            
            <div class="col-md-12">
				<div class="simple-slick-carousel dots-nav">

                    <!-- Listing Item -->
                    <div class="carousel-item">
                        <a href="" class="">
                            <div class="listing-item">
                                <div class="col-md-12 listing-item ">
                                    <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" alt="">
                                 </div>
                            </div>

                        </a>
                    </div>
                    
                    <!-- Listing Item -->
                    <div class="carousel-item">
                        <a href="" class="">
                            <div class="listing-item">
                                <div class="col-md-12 listing-item ">
                                    <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" alt="">
                                 </div>
                            </div>

                        </a>
                    </div>
                    
                    <!-- Listing Item -->
                    <div class="carousel-item">
                        <a href="" class="">
                            <div class="listing-item">
                                <div class="col-md-12 listing-item ">
                                    <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" alt="">
                                 </div>
                            </div>

                        </a>
                    </div>
                    
                    <!-- Listing Item -->
                    <div class="carousel-item">
                        <a href="" class="">
                            <div class="listing-item">
                                <div class="col-md-12 listing-item ">
                                    <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" alt="">
                                 </div>
                            </div>

                        </a>
                    </div>
                    
                    <!-- Listing Item -->
                    <div class="carousel-item">
                        <a href="" class="">
                            <div class="listing-item">
                                <div class="col-md-12 listing-item ">
                                    <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" alt="">
                                 </div>
                            </div>

                        </a>
                    </div>
                    
                    
                   
                    

                </div>
                
				
			</div>
            <div class="col-md-12">
				 <!-- Achievement title -->
				<h3 class="listing-desc-headline">Records & Achievements</h3>
				
                   
                <!--<ul class="achievement-list  margin-top-0">
                    
                    <li class=" aminity">
                       
                       <i class="fas fa-award"></i><p>Bus Bus Bus Bus</p>
                   </li>
                 <li class=" aminity">
                       
                       <i class="fas fa-award"></i><p>Bus Bus Bus Bus</p>
                   </li>
                 <li class=" aminity">
                       
                       <i class="fas fa-award"></i><p>Bus Bus Bus Bus</p>
                   </li>
                 
                 
                
                </ul>-->
            
            <!-- Achievement  Carousel -->
	<div class="fullwidth-carousel-container margin-top-20 no-dots">
		<div class="testimonial-carousel testimonials">

			<!-- Item -->
			<div class="fw-carousel-review">
				<div class="testimonial-box1">
                    <img src="<?php echo base_url('assets')?>/images/achievement.png" width="60px" alt="">
					<div class="testimonial">Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation is on the runway heading towards a streamlined cloud solution user generated content.</div>
				</div>
				<!--<div class="testimonial-author">
					<img src="<?php echo base_url('assets')?>/images/happy-client-01.jpg" alt="">
					<h4>Jennie Smith <span>User</span></h4>
				</div>-->
			</div>
			
			<!-- Item -->
			<div class="fw-carousel-review">
				<div class="testimonial-box1">
                    <img src="<?php echo base_url('assets')?>/images/achievement.png" width="60px" alt="">
					<div class="testimonial">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop.</div>
				</div>
				<!--<div class="testimonial-author">
					<img src="<?php echo base_url('assets')?>/images/happy-client-02.jpg" alt="">
					<h4>Tom Baker <span>User</span></h4>
				</div>-->
			</div>

			<!-- Item -->
			<div class="fw-carousel-review">
				<div class="testimonial-box1">
                    <img src="<?php echo base_url('assets')?>/images/achievement.png" width="60px" alt="">
					<div class="testimonial">Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view.</div>
				</div>
				<!--<div class="testimonial-author">
					<img src="<?php echo base_url('assets')?>/images/happy-client-03.jpg" alt="">
					<h4>Jack Paden <span>School</span></h4>
				</div>-->
			</div>

		</div>
	</div>
	<!-- Achievement Carousel / End -->
                
				
			</div>
            
            
            
            
           
		</div>
	</div>
    <div class= "container" style="">
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
							<div class="avatar">
                                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /> 
                                <div class="comment-by">John Doe<span class="date">May 2019</span>
									
								</div>
                            </div>
							<div class="comment-content"><div class="arrow-comment"></div>
								
								<p class="more1">Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.</p>
                                <div class="star-rating" data-rating="5"></div>
								<!--<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review</a>-->
							</div>
                        </li>
                        <li>
							<div class="avatar">
                                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /> 
                                <div class="comment-by">John Doe<span class="date">May 2019</span>
									
								</div>
                            </div>
							<div class="comment-content"><div class="arrow-comment"></div>
								
								<p class="more1">Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.</p>
                                <div class="star-rating" data-rating="5"></div>
								<!--<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review</a>-->
							</div>
                        </li>
                        <li>
							<div class="avatar">
                                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /> 
                                <div class="comment-by">John Doe<span class="date">May 2019</span>
									
								</div>
                            </div>
							<div class="comment-content"><div class="arrow-comment"></div>
								
								<p class="more1">Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.</p>
                                <div class="star-rating" data-rating="5"></div>
								<!--<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review</a>-->
							</div>
                        </li>
                        <li>
							<div class="avatar">
                                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /> 
                                <div class="comment-by">John Doe<span class="date">May 2019</span>
									
								</div>
                            </div>
							<div class="comment-content"><div class="arrow-comment"></div>
								
								<p class="more1">Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.</p>
                                <div class="star-rating" data-rating="5"></div>
								<!--<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review</a>-->
							</div>
                        </li>
                        <li>
							<div class="avatar">
                                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /> 
                                <div class="comment-by">John Doe<span class="date">May 2019</span>
									
								</div>
                            </div>
							<div class="comment-content"><div class="arrow-comment"></div>
								
								<p class="more1">Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.</p>
                                <div class="star-rating" data-rating="5"></div>
								<!--<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review</a>-->
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
						<div class="sub-rating-title">Rating <i class="tip" data-tip-content="The physical condition of the business"></i></div>
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
