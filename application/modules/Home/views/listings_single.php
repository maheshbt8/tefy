
<div class="main-search-container centered" data-background-image="<?=base_url('uploads/listings/banners/').$school['id'].'.jpg';?>" style="height: 300px">

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
					<span>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-map-marker"></i>
						<?=$school['address'];?>
						</a>
					</span>
					<div class="star-rating" data-rating="4.5">
						<div class="rating-counter"><a href="#listing-reviews">(12 reviews)</a></div>
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
				
				
				<!-- Listing Contacts -->
				<div class="listing-links-container">

					<ul class="listing-links contact-links">
						<li><a href="tel:12-345-678" class="listing-links"><i class="fa fa-phone"></i> <?=$school['phone'];?></a></li>
						<li><a href="http://www.vasterad.com/cdn-cgi/l/email-protection#81ece0e8edc1e4f9e0ecf1ede4afe2eeec" class="listing-links"><i class="fa fa-envelope-o"></i> <span class="__cf_email__" data-cfemail="3f525e56537f5a475e524f535a115c5052"><?=$school['email'];?></span></a>
						</li>
						<li><a href="#" target="_blank"  class="listing-links"><i class="fa fa-link"></i> <?=$school['website'];?></a></li>
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


				<!-- Amenities -->
				<h3 class="listing-desc-headline">Amenities</h3>
				<ul class="listing-features checkboxes margin-top-0">
					<?php
					$ame=json_decode($school['amenities']);
					for ($i=0; $i < count($ame); $i++) {
					?>
					<li><?=$this->common_model->get_type_name_by_where('facilities',array('id'=>$ame[$i]));?></li>
				<?php }?>
				</ul>
			</div>


			
		
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

				
		
		

			<!-- Opening Hours -->
			<div class="boxed-widget opening-hours margin-top-35">
				<div class="listing-badge now-open">Now Open</div>
				<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
				<ul>
					<?php
					$opening_hours=json_decode($school['opening_hours']);
					$reslut=$this->common_model->get_days();

  $days=$reslut['days'];
  $loop=$reslut['timings'];
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
                 <form>
                    <input type="text" placeholder="Mail ID"  name="mail" required="">
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
    <div class= "container">
        <!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Reviews <span>(12)</span></h3>

				<!-- Rating Overview -->
				<div class="rating-overview">
					<div class="rating-overview-box">
						<span class="rating-overview-box-total">4.2</span>
						<span class="rating-overview-box-percent">out of 5.0</span>
						<div class="star-rating" data-rating="5"></div>
					</div>

					<div class="rating-bars">
							<div class="rating-bars-item">
								<span class="rating-bars-name">Service 1<i class="tip" data-tip-content="Quality of customer service and attitude to work with you"></i></span>
								<span class="rating-bars-inner">
									<span class="rating-bars-rating" data-rating="4.2">
										<span class="rating-bars-rating-inner"></span>
									</span>
									<strong>4.2</strong>
								</span>
							</div>
							<div class="rating-bars-item">
								<span class="rating-bars-name">Service 2 <i class="tip" data-tip-content="Overall experience received for the amount spent"></i></span>
								<span class="rating-bars-inner">
									<span class="rating-bars-rating" data-rating="2.8">
										<span class="rating-bars-rating-inner"></span>
									</span>
									<strong>2.8</strong>
								</span>
							</div>
							<div class="rating-bars-item">
								<span class="rating-bars-name">Service 3 <i class="tip" data-tip-content="Visibility, commute or nearby parking spots"></i></span>
								<span class="rating-bars-inner">
									<span class="rating-bars-rating" data-rating="3.7">
										<span class="rating-bars-rating-inner"></span>
									</span>
									<strong>3.7</strong>
								</span>
							</div>
							<div class="rating-bars-item">
								<span class="rating-bars-name">Service 4 <i class="tip" data-tip-content="The physical condition of the business"></i></span>
								<span class="rating-bars-inner">
									<span class="rating-bars-rating" data-rating="4.0">
										<span class="rating-bars-rating-inner"></span>
									</span>
									<strong>4.5</strong>
								</span>
							</div>
					</div>
				</div>
				<!-- Rating Overview / End -->


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
				<!-- Pagination / End -->
			</div>


			<!-- Add Review Box -->
			<div id="add-review" class="add-review-box">

				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-10">Add Review</h3>
				<p class="comment-notes">Your email address will not be published.</p>

				<!-- Subratings Container -->
				<div class="sub-ratings-container">

					<!-- Subrating #1 -->
					<div class="add-sub-rating">
						<div class="sub-rating-title">Service <i class="tip" data-tip-content="Quality of customer service and attitude to work with you"></i></div>
						<div class="sub-rating-stars">
							<!-- Leave Rating -->
							<div class="clearfix"></div>
							<form class="leave-rating">
								<input type="radio" name="rating" id="rating-1" value="1"/>
								<label for="rating-1" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-2" value="2"/>
								<label for="rating-2" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-3" value="3"/>
								<label for="rating-3" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-4" value="4"/>
								<label for="rating-4" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-5" value="5"/>
								<label for="rating-5" class="fa fa-star"></label>
							</form>
						</div>
					</div>

					<!-- Subrating #2 -->
					<div class="add-sub-rating">
						<div class="sub-rating-title">Value for Money <i class="tip" data-tip-content="Overall experience received for the amount spent"></i></div>
						<div class="sub-rating-stars">
							<!-- Leave Rating -->
							<div class="clearfix"></div>
							<form class="leave-rating">
								<input type="radio" name="rating" id="rating-11" value="1"/>
								<label for="rating-11" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-12" value="2"/>
								<label for="rating-12" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-13" value="3"/>
								<label for="rating-13" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-14" value="4"/>
								<label for="rating-14" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-15" value="5"/>
								<label for="rating-15" class="fa fa-star"></label>
							</form>
						</div>
					</div>

					<!-- Subrating #3 -->
					<div class="add-sub-rating">
						<div class="sub-rating-title">Location <i class="tip" data-tip-content="Visibility, commute or nearby parking spots"></i></div>
						<div class="sub-rating-stars">
							<!-- Leave Rating -->
							<div class="clearfix"></div>
							<form class="leave-rating">
								<input type="radio" name="rating" id="rating-21" value="1"/>
								<label for="rating-21" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-22" value="2"/>
								<label for="rating-22" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-23" value="3"/>
								<label for="rating-23" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-24" value="4"/>
								<label for="rating-24" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-25" value="5"/>
								<label for="rating-25" class="fa fa-star"></label>
							</form>
						</div>
					</div>
					
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
	                <div class="uploadButton margin-top-15">
	                    <input class="uploadButton-input" type="file"  name="attachments[]" accept="image/*, application/pdf" id="upload" multiple/>
	                    <label class="uploadButton-button ripple-effect" for="upload">Add Photos</label>
	                    <span class="uploadButton-file-name"></span>
	                </div>
	                <!-- Uplaod Photos / End -->

				</div>
				<!-- Subratings Container / End -->

				<!-- Review Comment -->
				<form id="add-comment" class="add-comment">
					<fieldset>

						<div class="row">
							<div class="col-md-6">
								<label>Name:</label>
								<input type="text" value=""/>
							</div>
								
							<div class="col-md-6">
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

<<<<<<< HEAD

		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">

				
			<!-- Verified Badge -->
			<!-- <div class="verified-badge with-tip" data-tip-content="Listing has been verified and belongs the business owner or manager.">
				<i class="sl sl-icon-check"></i> Verified Listing
			</div> -->

			<!-- Message Vendor -->
		<!-- 	<div id="booking-widget-anchor" class="boxed-widget booking-widget message-vendor margin-top-35">
				<h3><i class="fa fa-envelope-o"></i> Message to School</h3>
				<div class="row with-forms  margin-top-0">

					<div class="col-lg-12">
						<input type="text" placeholder="First and Last Name" value="Tom Smith">
						<input type="text" placeholder="Email" value="mail@example.com">
						<input type="text" placeholder="Phone" value="+12 345 678 910">
						<textarea name="" id="" cols="10" rows="2" placeholder="Message"></textarea>
					</div> -->
					
					<!-- Preferred Contact Methos Radios -->
				<!-- 	<div class="col-lg-12">
						<div class="preferred-contact-method">
							<h5>Preferred contact method</h5>

							<div class="preferred-contact-radios">
								<div class="radio">
									<input id="radio-1" name="radio" type="radio" checked>
									<label for="radio-1"><span class="radio-label"></span> Email</label>
								</div>

								<div class="radio">
									<input id="radio-2" name="radio" type="radio">
									<label for="radio-2"><span class="radio-label"></span> Phone</label>
								</div>
							</div>

						</div>
					</div>

				</div> -->

				<!-- Recaptcha Holder -->
				<!-- <div class="captcha-holder"> -->
					<!-- Recaptcha goes here -->
				<!-- </div> -->
				
				<!-- Book Now -->
				<!-- <a href="#" class="button book-now fullwidth margin-top-5">Request Pricing</a>
			</div> -->
			<!-- Book Now / End -->
		

			<!-- Opening Hours -->
			<div class="boxed-widget opening-hours margin-top-35">
				<div class="listing-badge now-open">Now Open</div>
				<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
				<ul>
					<?php
					$opening_hours=json_decode($school['opening_hours']);
					$reslut=$this->common_model->get_days();

  $days=$reslut['days'];
  $loop=$reslut['timings'];
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
			<!-- <div class="boxed-widget margin-top-35">
				<div class="hosted-by-title">
					<h4><span>Hosted by</span> <a href="pages-user-profile.html">Tom Perrin</a></h4>
					<a href="pages-user-profile.html" class="hosted-by-avatar"><img src="images/dashboard-avatar.jpg" alt=""></a>
				</div>
				<ul class="listing-details-sidebar">
					<li><i class="sl sl-icon-phone"></i> (123) 123-456</li> -->
					<!-- <li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li> -->
				<!-- 	<li><i class="fa fa-envelope-o"></i> <a href="#"><span class="__cf_email__" data-cfemail="b1c5dedcf1d4c9d0dcc1ddd49fd2dedc">[email&#160;protected]</span></a></li>
				</ul> -->

				<!-- <ul class="listing-details-sidebar social-profiles">
					<li><a href="#" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
					<li><a href="#" class="twitter-profile"><i class="fa fa-twitter"></i> Twitter</a></li> -->
					<!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
				<!-- </ul> -->

				<!-- Reply to review popup -->
				<!-- <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
					<div class="small-dialog-header">
						<h3>Send Message</h3>
					</div>
					<div class="message-reply margin-top-0">
						<textarea cols="40" rows="3" placeholder="Your message to Tom"></textarea>
						<button class="button">Send Message</button>
					</div>
				</div>

				<a href="#small-dialog" class="send-message-to-owner button popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Send Message</a>
			</div> -->
			<!-- Contact / End-->


			<!-- Share / Like -->
			<div class="listing-share margin-top-40 margin-bottom-40 no-border">
				<button class="like-button"><span class="like-icon"></span> Bookmark this listing</button> 
				<span>159 people bookmarked this place</span>

					<!-- Share Buttons -->
					<ul class="share-buttons margin-top-40 margin-bottom-0">
						<li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
						<li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
						<li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
						<!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
					</ul>
					<div class="clearfix"></div>
			</div>

		</div>
		<!-- Sidebar / End -->

	</div>
=======
   </div>
>>>>>>> cce3b196e8341000ed44c69b618888d9795db89d
</div>