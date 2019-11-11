<?php
            if ($this->ion_auth->logged_in()=='')
              {
                redirect('home');
              }
            ?>
<div class="simple-slick-carousel1 dots-nav">
  <?php
          
          $gallery=$this->common_model->select_results_info('listing_banner',array('listing_id'=>$school['id']))->result_array();
          foreach ($gallery as $gal){
          ?>
      <!-- Listing Item -->
    <div class="carousel-item">
        <div class="main-search-container centered" data-background-image="<?=base_url('uploads/listings/banners/').$school['id'].'/'.$gal['id'].'.jpg';?>" style="height:300px; margin-top: 85px;">

        </div>
    </div>
    <!-- Listing Item / End -->          
        <?php }?>
</div>


<?php
$this->session->set_userdata('last_page',current_url());
$where['listing_id']=$school['id'];
$where['row_status']=1;
$rating=round($this->common_model->rating_of_product('ratings', $where ,'rating'),1);
if($rating==''){
  $rating=0;
}
$classes=json_decode($school['class']);
  for($c=0; $c < count($classes); $c++) { 
    $class[]=$this->common_model->get_type_name_by_where('classes',array('id'=>$classes[$c]));
  }
  $medium='';
  $medi=json_decode($school['medium']);
  if($medi!=''){
  for($c=0; $c < count($medi); $c++) { 
    $mediu[]=$this->common_model->get_type_name_by_where('medium',array('id'=>$medi[$c]));
  }
  $medium=implode(', ',$mediu);
}
 $category='';
  $cate=json_decode($school['category']);
  if($cate!=''){
  for($c=0; $c < count($cate); $c++) { 
    $categ[]=$this->common_model->get_type_name_by_where('category',array('id'=>$cate[$c]));
  }
  $category=implode(', ',$categ);
}
$class_name=array();
  if($class_n=json_decode($school['class_name'])){
    $class_name=$class_n;
  }
  $admission_fee=array();
  if($admission_f=json_decode($school['admission_fee'])){
    $admission_fee==$admission_f;
  }
  $tution_fee=array();
  if($tution_f=json_decode($school['tution_fee'])){
    $tution_fee=$tution_f;
  }
?>
<!-- <div class="main-search-container centered" data-background-image="<?=base_url('uploads/listings/banners/').$school['id'].'/4.jpg';?>" style="height: 300px;margin-top: 85px;"> -->

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
          <?php
          
         /* echo "<pre>";
          print_r($school);*/
          ?>
                    <div class="vision-txt"><b>"</b><?=$school['vision'];?><b>"</b></div>
					<span>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-map-marker"></i>
						<?=$school['landmark'];?>
						</a>
					</span>
					<div class="star-rating" data-rating="<?=$rating;?>">
						<div class="rating-counter"><a href="#listing-reviews"><B class="rating-bg" style="" ><?=$rating;?></B>/5</a></div>
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

                <h3 class="listing-desc-headline">About-Us</h3>
                <span class="more">
                  <?=$school['description'];?>
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
                        <li><a href="tel:+91-<?=$school['phone'];?>"><i class="sl sl-icon-phone"></i>&nbsp; &nbsp;&nbsp; &nbsp; <?=$school['phone'];?></a></li>
						<li><a href="mailto:<?=$school['email'];?>?subject = Tefy Contct Support"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;&nbsp; &nbsp;<?=$school['email'];?>
                        </a></li>
						<li><a href="http://<?=$school['website'];?>" target="_blank"><i class="sl sl-icon-globe"></i>&nbsp;&nbsp;&nbsp; &nbsp;<?=$school['website'];?></a></li>
                        <li><i class="fa fa-link"></i>&nbsp;&nbsp;&nbsp; &nbsp;<?=$school['address'];?>&nbsp;&nbsp;<span class="direction-icon"><!-- (<i class="fa fa-envelope-o"></i>&nbsp;   Directions) --></span></li>
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
                            <td><?=$this->common_model->get_type_name_by_where('curriculum',array('id'=>$school['curriculum']),'name');?></td>
                        </tr>
                        <tr>
                            <td>Grade :</td>
                            <td><?=implode(', ',$class);?></td>
                        </tr>
                        <tr>
                            <td>Medium :</td>
                            <td><?=$medium;?></td>
                        </tr>
                        <tr>
                            <td>School Type :</td>
                            <td><?=$school['school_type'];?></td>
                        </tr>
                         <tr>
                            <td>Category :</td>
                            <td><?=$category;?></td>
                        </tr>
                         <tr>
                            <td>Hostel :</td>
                            <td><?=$school['hostels'];?></td>
                        </tr>
                         <tr class="vert-algn-none">
                            <td>Admission Procedure :&nbsp;</td>
                            <td>
                              <?=$school['admission_procedure'];?>
                            </td>
                        </tr>
                        <tr>
                            <td>Social Media :</td>
                            <td>
                                <ul class="social-icons margin-top-20">
                                    <li><a class="facebook" href="<?=$school['facebook'];?>" target="_blank"><i class="icon-facebook"></i></a></li>
                                    <li><a class="twitter" href="<?=$school['twitter'];?>" target="_blank"><i class="icon-twitter"></i></a></li>
                                    <li><a class="youtube" href="<?=$school['youtube'];?>" target="_blank"><i class="icon-youtube"></i></a></li>
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
              <?php
              $route=explode(',',$school['bus_routes']);
              for($b=0;$b<count($route);$b++){
              ?>
                        <li><?=$route[$b];?></li>
                      <?php }?>
                    </ul>
					
					
					<div class="clearfix"></div>

				</div>
                
                


				<!-- Amenities -->
				<h3 class="listing-desc-headline">Facilities</h3>
				<!--<ul class="listing-features checkboxes margin-top-0">
					<?php
					//$ame=json_decode($school['amenities']);
					//for ($i=0; $i < count($ame); $i++) {
					?>
					<li><?=$this->common_model->get_type_name_by_where('facilities',array('id'=>$ame[$i]));?></li>
				<?php// }?>
				</ul>-->
				<!-- <ul class="amenity-list  margin-top-0">
                    <?php
					$ame=json_decode($school['amenities']);
					for ($i=0; $i < count($ame); $i++) {
					?>
                    <li class="aminity-size">
                       <img src="<?=base_url('uploads/facilities/').$this->common_model->get_type_name_by_where('facilities',array('id'=>$ame[$i]),'id').'.jpg';?>" class="amenity-img">
                       <p><?=$this->common_model->get_type_name_by_where('facilities',array('id'=>$ame[$i]));?></p>
                   </li>
                <?php }?>
                
                </ul> -->
                   
                <ul class="amenity-list  margin-top-0">
                    <?php
          $ame=json_decode($school['amenities']);
          for ($i=0; $i < count($ame); $i++) {
            $ameniti=$this->common_model->select_results_info('facilities',array('id'=>$ame[$i]))->row_array();
          ?>
                    <li class="aminity-size aminity">
                       <img src="<?=base_url('uploads/facilities/').$ameniti['id'].'.'.$ameniti['file_ext'];?>" class="amenity-img">
                       <p><?=$ameniti['name'];?></p>
                   </li>
                   <?php }?>
                 <!-- <li class="aminity-size aminity">
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
                   </li> -->
                 
                
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
                <iframe width="100%" height="315" src="<?=$school['video'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
            
            <!-- Contact -->
			 <div class="boxed-widget margin-top-35">
				<div class="hosted-by-title">
					<h4><span> </span> <a href="pages-user-profile.html">Fee Structure</a></h4>
					
				</div>
                 <h3>Tution Fee Ranges From <span><?=current($tution_fee);?>/-</span><?php if(current($tution_fee)!=end($tution_fee)){?> to <span><?=end($tution_fee);?></span>/-<?php }?></h3>
                 <div><!-- *Actual Fee may vary -->*<?=current($class_name).' - '.end($class_name);?></div>
                 
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
  $opening_col='now-closed';
	}else{
	if((strtotime(date('h A')) >= strtotime($opening_hours->opening_time[$i])) && (strtotime(date('h A')) <= strtotime($opening_hours->closing_time[$i]))){
		$opening_con='Now Open';
    $opening_col='now-open';
	}else{
		$opening_con='Closed Now';
    $opening_col='now-closed';
	}
	}
	}
	}
		?>

			<!-- Opening Hours -->
			<div class="boxed-widget opening-hours margin-top-35">
				<div class="listing-badge <?=$opening_col;?>"><?=$opening_con;?></div>
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

        <div class="col-md-12">
          <iframe src="<?=$school['address_url'];?>" width="450" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
				<!-- <div id="singleListingMap-container">
					<div id="singleListingMap" data-latitude="<?=$school['latitude'];?>" data-longitude="<?=$school['longitude'];?>" data-map-icon="im im-icon-Hamburger"></div>
					<a href="#" id="streetView">Street View</a>

				</div> -->
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
<?php
          
          $gallery=$this->common_model->select_results_info('listing_gallery',array('listing_id'=>$school['id']))->result_array();
          foreach ($gallery as $gal){
          ?>
                    <!-- Listing Item -->
                    <div class="carousel-item">
                        <!-- <a href="" class=""> -->
                            <div class="listing-item">
                                <div class="col-md-12 listing-item ">
                                    <img src="<?=base_url('uploads/listings/gallery/').$school['id'].'/'.$gal['id'].'.jpg';?>" alt="">
                                 </div>
                            </div>

                       <!--  </a> -->
                    </div>
                    <?php }?>
                    <!-- Listing Item -->
                    <!-- <div class="carousel-item">
                        <a href="" class="">
                            <div class="listing-item">
                                <div class="col-md-12 listing-item ">
                                    <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" alt="">
                                 </div>
                            </div>

                        </a>
                    </div> -->
                    
                    <!-- Listing Item -->
                    <!-- <div class="carousel-item">
                        <a href="" class="">
                            <div class="listing-item">
                                <div class="col-md-12 listing-item ">
                                    <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" alt="">
                                 </div>
                            </div>

                        </a>
                    </div> -->
                    
                    <!-- Listing Item -->
                    <!-- <div class="carousel-item">
                        <a href="" class="">
                            <div class="listing-item">
                                <div class="col-md-12 listing-item ">
                                    <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" alt="">
                                 </div>
                            </div>

                        </a>
                    </div> -->
                    
                    <!-- Listing Item -->
                 <!--    <div class="carousel-item">
                        <a href="" class="">
                            <div class="listing-item">
                                <div class="col-md-12 listing-item ">
                                    <img src="https://image.shutterstock.com/image-vector/contact-icons-communication-icon-buttons-260nw-1066514957.jpg" alt="">
                                 </div>
                            </div>

                        </a>
                    </div> -->
                    
                    
                   
                    

                </div>
                
				
			</div>
            <div class="col-md-12">
				 <!-- Achievement title -->
				<h3 class="listing-desc-headline">Rewards & Achievements</h3>
				
                   
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
       <?php
$achievements=json_decode($school['achievements']);
if($achievements!=''){
  ?>       
            <!-- Achievement  Carousel -->
	<div class="fullwidth-carousel-container margin-top-20 no-dots">
		<div class="testimonial-carousel testimonials">
<?php
          for ($i=0; $i < count($achievements); $i++) {
          ?>
			<!-- Item -->
			<div class="fw-carousel-review">
				<div class="testimonial-box1">
                    <img src="<?php echo base_url('assets')?>/images/achievement.png" width="60px" alt="">
					<div class="testimonial">
            <?=$achievements[$i];?>     
          </div>
				</div>
				<!--<div class="testimonial-author">
					<img src="<?php echo base_url('assets')?>/images/happy-client-01.jpg" alt="">
					<h4>Jennie Smith <span>User</span></h4>
				</div>-->
			</div>
			<?php }?>

		</div>
	</div>
	<!-- Achievement Carousel / End -->
         <?php }?>       
				
			</div>
            
            
            
            
           
		</div>
        
	</div>
    <div class= "container" style="">
        <!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Reviews <span>(<?=$this->common_model->count_records('ratings',$where);?>)</span></h3>

				<!-- Rating Overview -->
				<div class="rating-overview" style="display: block !important;">
					
						<div class="row">
							<div class="col-md-8">

				<!-- Reviews -->
        <div class="col-md-12">
				<section class="comments listing-reviews">
          <!-- <article class="h-mb2" id="review_3035260">
  <header class="e-box -background-light -stacked -radius-top h-p1">

    <div class="review-header">
      <div class="review-header__rating">
        <div class="h-mr1">
          <div class="rating-basic">
    <div class="rating-basic__star-rating">
        <i class="e-icon -icon-star "></i>
        <i class="e-icon -icon-star -color-grey-medium"></i>
        <i class="e-icon -icon-star -color-grey-medium"></i>
        <i class="e-icon -icon-star -color-grey-medium"></i>
        <i class="e-icon -icon-star -color-grey-medium"></i>
    </div>

</div>

        </div>
          <p class="t-body h-m0">
            for <strong>Documentation Quality</strong>
          </p>
      </div>

      <div class="review-header__reviewer">
        <p class="t-body -size-m h-m0">
            by <a class="t-link -decoration-reversed" href="/user/gato06">gato06</a>
            <span class="review-header__date">
              <a class="t-link -decoration-reversed -color-inherit" href="/ratings/3035260">2 months ago</a>
            </span>
        </p>


      </div>
    </div>
</header>    <div class="e-box h-p2 -stacked -radius-none">

      <p class="t-body h-my1">Hello, I always liked to buy here, you can see the history that I have of purchases on your website, but this time I had a bad experience, buy this code and after reviewing the manual it is very ambiguous and makes one have to guess some settings, and tried to ask the seller for support in his forum and hear Skype, but his answer is that it is a hosting error, I asked him that if he needs any configuration the hosting and only deletes my messages, then he went to Skype to tell me it was a mistake of hosting that he could not go to repair, but I never asked him to repair my hosting, only to tell me if I needed anything special, the treatment of this seller has been very bad and I felt like an ignorant, the experience with This seller has been pessimistic and could not configure the application, without basic quality support you can not configure this application, Evanto as a responsible company and with good quality, must demand a standard basic support with good quality and not someone who just kicks your butt after you buy the code.</p>
</div>
    <div class="e-box -background-light -radius-bottom h-p2">
      <div class="media fixed-layout">
        <div class="media__item">
              <img width="50" height="50" alt="qboxus" src="https://s3.envato.com/files/262672290/qboxus.jpg">

        </div>
        <div class="media__body">
          <p class="t-body h-mb1"><strong>Author response</strong></p>
          <p class="t-body h-my1">hello gato06, we are not sure where you have contacted and who you talked to. we are really sorry for the bad experience you have. please add us on skype and let us help you. and if you are not satisfied with the product, we are happy to refund you
<br>skype: hello@qboxus.com
<br>Thank you</p>
        </div>
    </div>

</div></article> -->
          <!-- <ul id="review_list">
          </ul> -->
          <div id="review_list" class="message-content">

              <!-- <div class="message-bubble">
                <div class="message-avatar"><img src="http://localhost/tefy/uploads/users/user.jpg" alt=""><br/>Mahesh Reddy</div>
                <div class="message-text"><p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae.</p></div>
              </div>

              <div class="message-bubble me">
                <div class="message-avatar"><img src="http://localhost/tefy/uploads/users/user.jpg" alt=""></div>
                <div class="message-text"><p><b>Mahesh Reddy</b></p><p>Nam ut hendrerit orci, ac gravida orci. Cras tristique rutrum libero at consequat. Vestibulum vehicula neque maximus sapien iaculis, nec vehicula sapien fringilla.</p></div>
              </div>

              <div class="message-bubble me">
                <div class="message-avatar"><img src="http://localhost/tefy/uploads/users/user.jpg" alt=""></div>
                <div class="message-text"><p>Accumsan et porta ac, volutpat id ligula. Donec neque neque, blandit eu pharetra in, tristique id enim.</p></div>
              </div>

              <div class="message-bubble">
                <div class="message-avatar"><img src="http://localhost/tefy/uploads/users/user.jpg" alt=""></div>
                <div class="message-text"><p>Vivamus lobortis vel nibh nec maximus. Donec dolor erat, rutrum ut feugiat sed, ornare vitae nunc. Donec massa nisl, bibendum id ultrices sed, accumsan sed dolor.</p></div>
              </div>

              <div class="message-bubble me">
                <div class="message-avatar"><img src="http://localhost/tefy/uploads/users/user.jpg" alt=""></div>
                <div class="message-text"><p>Nunc pulvinar, velit sit amet tristique tristique, nisi odio luctus odio, vel vulputate purus enim vestibulum est. Pellentesque non mollis ipsum, vitae tristique sapien.</p></div>
              </div>

              <div class="message-bubble">
                <div class="message-avatar"><img src="http://localhost/tefy/uploads/users/user.jpg" alt=""></div>
                <div class="message-text"><p>Donec eget consequat magna. Integer luctus neque vel nulla malesuada imperdiet. </p></div>
              </div>

              <div class="message-bubble me">
                <div class="message-avatar"><img src="http://localhost/tefy/uploads/users/user.jpg" alt=""></div>
                <div class="message-text"><p>Accumsan et porta ac, volutpat id ligula. Donec neque neque, blandit eu pharetra in, tristique id enim nulla magna interdum leo, sed tincidunt purus elit vitae magna. Donec eget consequat magna. Integer luctus neque vel nulla malesuada imperdiet. .</p></div>
              </div>

              <div class="message-bubble">
                <div class="message-avatar"><img src="http://localhost/tefy/uploads/users/user.jpg" alt=""></div>
                <div class="message-text"><p>Nulla eget erat consequat quam feugiat dapibus eget sed mauris.</p></div>
              </div> -->
              
              <!-- Reply Area -->
              <!-- <div class="clearfix"></div> -->
              
            </div>
       <!--     <ul>
             <li>
              <div class="avatar">
                                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /> 
                                <div class="comment-by">John Doe<span class="date">May 2019</span>
                  
                </div>
                            </div>
              <div class="comment-content"><div class="arrow-comment"></div>
                
                <p class="more1">Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.</p>
                                <div class="star-rating" data-rating="3"></div>
              </div>
                        </li>
           </ul> -->
        </section>
      </div>

					<div class="col-md-12">
						<!-- Pagination -->
						<!-- <div class="pagination-container margin-top-30">
							<nav class="pagination">
								<ul>
									<li><a href="#" class="current-page">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
								</ul>
							</nav>
						</div> -->
            <!-- Posts List -->
  
 
   <!-- Paginate -->
   <div style='margin-top: 10px;' id='pagination_data'></div>
  <!--  <div class="pagination-container margin-top-30">
              <nav class="pagination">
                <ul>
                  <li><a href="#" class="current-page">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
                </ul>
              </nav>
            </div> -->
					</div>
				<!--  -->
				
				</div>
							<div class="col-md-4">
								<!-- Add Review Box -->
			<div id="add-review" class="add-review-box">

				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-10">Add Review</h3>
				<p class="comment-notes">Your email address will not be published.</p>
        <?php if ($this->ion_auth->logged_in()){?>
<form method="post" novalidate="novalidate" action="<?=base_url('listings-single/').$list_enc_id;?>" class="form-horizontal" id="form">
  <?php
                  if($this->session->flashdata('rating_message')!=''){
                  ?>
                  <div class="alert">
  <strong><?=$this->session->flashdata('rating_message');?></strong>
</div>
<?php }?>
				<!-- Subratings Container -->
				<div class="sub-ratings-container">
					<!-- Subrating #4 -->
					<div class="add-sub-rating">
						<div class="sub-rating-title">Rating <i class="tip" data-tip-content="The physical condition of the business"></i></div>
						<div class="sub-rating-stars">
							<!-- Leave Rating -->
							<div class="clearfix"></div>
							<div class="leave-rating">
								<input type="radio" name="rating" id="rating-31" value="5" required=""  />
								<label for="rating-31" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-32" value="4" required=""/>
								<label for="rating-32" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-33" value="3" required=""/>
								<label for="rating-33" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-34" value="2" required=""/>
								<label for="rating-34" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-35" value="1" required="" checked="" />
								<label for="rating-35" class="fa fa-star"></label>
							</div>
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
				<div id="add-comment" class="add-comment">
					<fieldset>

					<!-- 	<div class="row">
							<div class="col-md-12">
								<label>Name:</label>
								<input type="text" value=""/>
							</div>
								
							<div class="col-md-12">
								<label>Email:</label>
								<input type="text" value=""/>
							</div>
						</div> -->

						<div>
							<label>Review:</label>
							<textarea cols="40" rows="3" name="review" required="" id="my_review"></textarea>
               <input type="hidden" id="single_school_id" value="<?=$school['id'];?>">
						</div>

					</fieldset>

					<button class="button">Submit Review</button>
					<div class="clearfix"></div>
				</div>
</form><?php }else{?>
  <a href="<?=base_url('auth');?>">If you want to give rating please login</a>
<?php }?>
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


  
  <script type="text/javascript">
        function submit_review() {
        var rating = $("input[name=rating]").val();
        var review=('#my_review').val();
        var single_school_id=('#single_school_id').val();
        var data_list={ rating: rating, review: review, single_school_id:single_school_id};
 $.ajax({
                    url:'<?=base_url('home/ajax_add_review/').$list_enc_id;?>',
                    type:'POST',
                    data: data_list,
                    success:function(result){
              $('#forgot_response').html(result);
                    }
  });
}
  </script>