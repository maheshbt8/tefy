
 <!-- <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5e133cc97dc3a500126f4cd6&product=inline-share-buttons" async="async"></script> -->

 <!-- <title>ShareThis: Free Social Share Buttons &amp; Plugins for Websites &amp; Blogs</title>

<meta name="description" content="Customize, download and install our easy-to-use share buttons and other publishing tools for your website or blog. Grow your audience. Win the internet!" />
    <link rel="canonical" href="https://sharethis.com/" /> -->
<!--  <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5e133cc97dc3a500126f4cd6&product=inline-share-buttons" async="async"></script> -->
 <style type="text/css">
  .admissions_closed{
    background: #ff0000 !important;
  }
</style>

<!-- <meta property="og:title" content="Title of the page">
<meta property="og:description" content="Some Description of it.">
<meta property="og:image" content="http://tefy.in/assets/front-end/images/school-image.png">
<meta property="og:url" content="http://domain_dot_com//somePage.php"> -->
<!-- <style type="text/css">
 
#share-buttons img {
width: 35px;
padding: 5px;
border: 0;
box-shadow: 0;
display: inline;
}
 
</style> -->




<?php
if($school !=''){
$unique_id=$this->common_model->get_type_name_by_where('users',array('id'=>$this->session->userdata('user_id')),'unique_id');
$sha_referer='';
if(isset($_GET['referer']) && $_GET['referer'] !=''){
  $sha_referer=$_GET['referer'];
}
//print_r($this->session->userdata());die;
//echo $this->session->userdata('unique_id');
$share_url=urlencode(base_url('listings-single?school='.$school['school_name'].'&school_code='.$school['school_code'].'&referer='.$unique_id));
?>



<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0 ">
    <?php
          
          $gallery=$this->common_model->select_results_info('listing_banner',array('listing_id'=>$school['id']))->result_array();
          foreach ($gallery as $gal){
          ?>
          <a href="<?=base_url('uploads/listings/banners/').$school['id'].'/'.$gal['id'].'.jpg';?>" data-background-image="<?=base_url('uploads/listings/banners/').$school['id'].'/'.$gal['id'].'.jpg';?>" class="item mfp-gallery"></a>
          <?php }?>
<!--   <a href="<?php echo base_url('assets/front-end/')?>images/single-listing-01.jpg" data-background-image="<?php echo base_url('assets/front-end/')?>images/single-listing-01.jpg" class="item mfp-gallery" title="Title 1"></a>
  <a href="<?php echo base_url('assets/front-end/')?>images/single-listing-02.jpg" data-background-image="<?php echo base_url('assets/front-end/')?>images/single-listing-02.jpg" class="item mfp-gallery" title="Title 3"></a>
  <a href="<?php echo base_url('assets/front-end/')?>images/single-listing-03.jpg" data-background-image="<?php echo base_url('assets/front-end/')?>images/single-listing-03.jpg" class="item mfp-gallery" title="Title 2"></a>
  <a href="<?php echo base_url('assets/front-end/')?>images/single-listing-04.jpg" data-background-image="<?php echo base_url('assets/front-end/')?>images/single-listing-04.jpg" class="item mfp-gallery" title="Title 4"></a> -->
</div>

<?php
$this->session->set_userdata('last_page',current_url().'?school='.$_GET['school'].'&school_code='.$_GET['school_code']);

$where['listing_id']=$school['id'];
$where['row_status']=1;
$rating=round($this->common_model->rating_of_product('ratings', $where ,'rating'),1);
if($rating==''){
  $rating=0;
}
/*$classes=json_decode($school['class']);
  for($c=0; $c < count($classes); $c++) { 
    $class[]=$this->common_model->get_type_name_by_where('classes',array('id'=>$classes[$c]));
  }*/
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
/*$class_name=array();
  if($class_n=json_decode($school['class_name'])){
    $class_name=$class_n;
  }*/
  $admission_fee=array();
  if($admission_f=json_decode($school['admission_fee'])){
    $admission_fee==$admission_f;
  }
/*  $tution_fee=array();
  if($tution_f=json_decode($school['tution_fee'])){
    $tution_fee=$tution_f;
  }*/
?>
<!-- Content
================================================== -->
<div class="container">
  <div class="row sticky-wrapper">
    <div class="col-lg-8 col-md-8 padding-right-30">

      <!-- Titlebar -->
      <div id="titlebar" class="listing-titlebar">
        <div class="listing-titlebar-title">
          <h2><?=$school['school_name'];?></h2>
                    <div class="vision-txt"><b>"</b><?=$school['vision'];?><b>"</b></div>
          <span>
            <a href="#listing-location" class="listing-address">
              <i class="fa fa-map-marker"></i>
              <?=$school['landmark'];?>
            </a>
          </span>
          <div class="star-rating" data-rating="<?=$rating;?>">
            <div class="rating-counter"><a href="#listing-reviews">(<?=$this->common_model->count_records('ratings',$where);?> reviews)</a></div>
          </div>
        </div>
      </div>
<!-- I got these buttons from simplesharebuttons.com -->
<!--<div id="share-buttons">
    
    <ul class="share-buttons margin-top-40 margin-bottom-0">
            <li><a class="fb-share" href="http://www.facebook.com/sharer.php?u=<?=$share_url;?>" target="_blank"><i class="fa fa-facebook"></i> Share</a></li>
            <li><a class="twitter-share" href="https://twitter.com/share?url=<?=$share_url;?>&amp;text=<?=$school['school_name']?>&amp;hashtags=simplesharebuttons" target="_blank"><i class="fa fa-twitter"></i> Tweet</a></li>
            <li><a class="gplus-share" href="https://plus.google.com/share?url=<?=$share_url;?>" target="_blank"><i class="fa fa-google-plus"></i> Share</a></li>
            <li><a class="pinterest-share" href="https://api.whatsapp.com/send?text=<?=$share_url;?>"  target="_blank"><i class="fa fa-whatsapp"></i> whatsapp</a></li>
          </ul>
    

</div>-->
      <!-- Listing Nav -->
      <div id="listing-nav" class="listing-nav-container" style="z-index: 999;">
        <ul class="listing-nav" style="background: rgb(222, 220, 220);">
          <li><a href="#listing-overview" class="active">Overview</a></li>
          <li><a href="#listing-contact" class="active">Contact_Info</a></li>
          <li><a href="#listing-amenities">Key_info</a></li>
          <li><a href="#listing-admission">Admission</a></li>
          <li><a href="#listing-facilities">Facilities</a></li>
          <li><a href="#listing-reviews">Reviews</a></li>
          
        </ul>
      </div>
      
      <!-- Overview -->
      <div id="listing-overview" class="listing-section">

        <!-- Description -->
               <div class="show-more">
                 <?=$school['description'];?>
                </div>
                <a href="#" class="show-more-button" data-more-title="Show More" data-less-title="Show Less"><i class="fa fa-angle-down"></i></a>
      </div>
            
            <!-- Contact Info -->
      <div id="listing-contact" class="listing-section">
                <!-- Listing Contacts -->
                <h3 class="listing-desc-headline">Contact Info</h3>
                <ul class="listing-links contact-links">
                    <li>
                        <a href="tel:+91-<?=$school['phone'];?>">
                            <i class="sl sl-icon-phone"></i>&nbsp;&nbsp; &nbsp; <?=$school['phone'];?></a>
                    </li>
                    <li>
                        <a href="mailto:<?=$school['email'];?>?subject = Tefy Contct Support">
                            <i class="fa fa-envelope-o"></i>&nbsp;&nbsp;&nbsp; &nbsp; <?=$school['email'];?></a>
                    </li>
                    <li>
                        <a href="<?=$school['website'];?>" target="_blank"><i class="sl sl-icon-globe"></i>&nbsp;&nbsp;&nbsp; &nbsp; <?=$school['website'];?>  </a>
                    </li>
                    <li>
                        <a href="" target="_blank"><i class="fa fa-link"></i>&nbsp;&nbsp;&nbsp; &nbsp; <?=$school['address'];?> &nbsp;&nbsp;
                        </a>
                    </li>

                </ul>   
                
                

        
        
        <div class="clearfix"></div>


        
      </div>
        <div id="listing-amenities" class="listing-section">    
             <!-- Amenities -->
            <h3 class="listing-desc-headline">Key Information</h3>
            <div class="listing-links-container">
                        <div>
                            <span><b>Board :</b></span>
                            <span><?=$this->common_model->get_type_name_by_where('curriculum',array('id'=>$school['curriculum']),'name');?></span>
                        </div>
                        <div>
                            <span><b>Grade :</b></span>
                            <span><?=$school['class'];?></span>
                        </div>
                        <div>
                            <span><b>Medium :</b></span>
                            <span><?=$medium;?></span>
                        </div>
                        <div>
                            <span><b>School Type :</b></span>
                            <span><?=$school['school_type'];?></span>
                        </div>
                        <div>
                            <span><b>Category :</b></span>
                            <span><?=$category;?></span>
                        </div>
                        <div>
                            <span><b>Hostel :</b></span>
                            <span><?=$school['hostels'];?></span>
                        </div>
                        <br><br>
                        <div>
                            <span><b>Social Media :</b></span>
                            <span>
                                <ul class="social-icons margin-top-20">
                                        <li><a class="facebook" href="<?=(($school['facebook']!='')? $school['facebook'] : '#');?>" target="<?=(($school['facebook']!='')? '_blank' : '');?>"><i class="icon-facebook"></i></a></li>
                                        <li><a class="twitter" href="<?=(($school['twitter']!='')? $school['twitter'] : '#');?>" target="<?=(($school['twitter']!='')? '_blank' : '');?>"><i class="icon-twitter"></i></a></li>
                                        <li><a class="youtube" href="<?=(($school['youtube']!='')? $school['youtube'] : '#');?>" target="<?=(($school['youtube']!='')? '_blank' : '');?>"><i class="icon-youtube"></i></a></li>
                                </ul>
                            </span>
                        </div>
                <div class="clearfix"></div>
            </div>
        </div> 
        
        <div id="listing-admission" class="listing-section">    
            <div class="listing-links-container">
                        
                    <!--Admission Procedure -->

                        <h3 class="listing-desc-headline">Admission Procedure</h3>
                        <div class="listing-links-container">
                        <?=$school['admission_procedure'];?>
                        <!--Admission Procedure text editor content should be appear here -->

                        </div>
                        <div class="clearfix"></div>

                    <!--Transport facility -->
                        <h3 class="listing-desc-headline">Transport facility</h3>
                        <div class="listing-links-container">

                                <div class="row">
                                  <?php
                  $route=explode(',',$school['bus_routes']);
                  for($b=0;$b<count($route);$b++){
                  ?>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <?=$route[$b];?> 
                                    </div> 
                                    <?php }?>
                                </div>

                        </div>


              <div class="clearfix"></div>

            </div>
        </div> 

   <div id="listing-facilities" class="listing-section style="opacity: 0.3!important;">    
            <div class="listing-links-container">
                        
    <?php
    //echo $school['amenities'];
    /*ALTER TABLE `listings` CHANGE `amenities` `amenities` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;*/
    ?>
                        <!--Facilities -->
                        <h3 class="listing-desc-headline">Facilities</h3>
                        <div class="listing-links-container">
                            <ul class="amenity-list  margin-top-0 style="opacity: 0.3!important;">
                                 <?php
    
              $ame=json_decode($school['amenities']);
              if($ame !=''){
              for ($i=0; $i < count($ame); $i++) {
                $ameniti=$this->common_model->select_results_info('facilities',array('id'=>$ame[$i]))->row_array();
              ?>
              <li class="aminity-size aminity">
                                    <img src="<?=base_url('uploads/facilities/').$ameniti['id'].'.'.$ameniti['file_ext'];?>" class="amenity-img">
                                    <p><?=$ameniti['name'];?></p>
                                </li>
              <?php }}?>
                            </ul>                    
                        </div>

              <div class="clearfix"></div>

            </div>
        </div> 


    
      <!-- Location -->
      <!--<div id="listing-location" class="listing-section">
        <h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Location</h3>

        <div id="singleListingMap-container">
          <div id="singleListingMap" data-latitude="40.70437865245596" data-longitude="-73.98674011230469" data-map-icon="im im-icon-Hamburger"></div>
          <a href="#" id="streetView">Street View</a>
        </div>
      </div>-->
      

    </div>


    <!-- Sidebar
    ================================================== -->
    <div class="col-lg-4 col-md-4 margin-top-75 sticky">

        
      <!-- Verified Badge -->
      <?php 
      if ($this->ion_auth->logged_in()){ 
        
        if ($school['admission_status'] == 1){ 
        $url=base_url('apply_admission').'?school='.$school['school_name'].'&school_code='.$school['school_code'];
        /*$url=base_url('apply_admission').'?school='.$school['school_name'].'&school_code='.$school['school_code'].'&referer='.$sha_referer;*/
        $apply_name='Apply For Admission';
        $cls='';
        $tar='target="_blank"';
      }elseif ($school['admission_status'] == 0){ 
        $url='#';
        $apply_name='Admissions Closed';
        $cls='admissions_closed';
        $tar='';
      }
      }else{
        $url='#sign-in-dialog';
        $apply_name='Login For Admission';
        $cls='sign-in popup-with-zoom-anim';
        $tar='';
      }



      ?>

             <a href="<?=$url?>" class="<?=$cls;?>  verified-badge admiss-stick d-none" <?=$tar;?> ><i class="sl sl-icon-docs"></i><?=$apply_name; ?> </a> 
             <?php
          $promo_where='row_status = 1 AND valid_from <= "'.date('Y-m-d').'" AND valid_to >= "'.date('Y-m-d').'"';
          $promo_code=$this->common_model->select_results_info('promo_codes',$promo_where)->result_array();

         ?>
<?php if ($school['admission_status'] == 1){ ?>
               <div class="boxed-widget margin-top-10">
                    <div class="hosted-by-title">
                      <h4><span> </span> <a href="#">Offers For Admission</a></h4>
                    </div>
                    <?php foreach ($promo_code as $promo) {

                        $stat=0;
                            if($promo['promo_type']==3){
                                $sc=json_decode($promo['school']);
                                $cl=json_decode($promo['class']);
                                if (in_array($school['id'], $sc))
                                {
                                  $stat=1;
                                }
                              }elseif($promo['promo_type']==2){
                                $stat=1;
                            }
                            if($stat==1){
                        ?>
                            <h3><?=$promo['promo_label']?></h3>
                             <?php
                        }
                      }
                        ?>
                </div>
            
            <?php }?>
            
            <div class="listing-share  margin-bottom-40 margin-top-40 no-border">

                <iframe width="100%" height="315" src="<?=$school['video'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>

            <!--Fees Scection-->
            <div class="boxed-widget margin-top-35">
        <div class="hosted-by-title">
          <!--<h4><a href="#" class="Structure">Fee Structure</a></h4>-->
          <h3 class="fee-structure "> Fee Structure</h3>
        </div>
                <p>Tution fee starts from <span>Rs.<?=$school['price_from'];?>/-<!-- <?=current($tution_fee);?>/-</span><?php if(current($tution_fee)!=end($tution_fee)){?> to <span><?=end($tution_fee);?></span>/-<?php }?> --></span></p>
                <div> <span class="notverified"><b>**</b>The tution fee is applicable for <b><?=$school['class'];?></b></span><!-- <?=current($class_name).' to '.end($class_name);?> -->  </div>
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
            
            <!--Location-->
            <div class="boxed-widget margin-top-35">
        <div class="hosted-by-title">
                    <h4><span> </span> <a href="pages-user-profile.html">Location</a></h4>
        </div>
                <iframe src="<?=$school['address_url'];?>" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                
            </div>
            
            
            <!--Get in touch-->             
            <div class="boxed-widget margin-top-35">
        <div class="hosted-by-title">
          <h4><span> </span> <a href="">Get in touch</a></h4> 
        </div>
        <form action="<?=base_url('home/get_in_touch')?>" method="post" id="form" novalidate="novalidate">
                  <?php
                  if($this->session->flashdata('touch_message')!=''){
                  ?>
                  <div class="notification notice closeable">
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
            
    </div>
    <!-- Sidebar / End -->
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!--Gallery Slider -->
      <div id="listing-gallery" class="listing-section">
        <h3 class="listing-desc-headline margin-top-70">Gallery</h3>
        <div class="listing-slider-small mfp-gallery-container margin-bottom-0">
          <?php
          
          $gallery=$this->common_model->select_results_info('listing_gallery',array('listing_id'=>$school['id']))->result_array();
          foreach ($gallery as $gal){
          ?>
          <a href="<?=base_url('uploads/listings/gallery/').$school['id'].'/'.$gal['id'].'.jpg';?>" data-background-image="<?=base_url('uploads/listings/gallery/').$school['id'].'/'.$gal['id'].'.jpg';?>" class="item mfp-gallery"></a>
          <?php }?>
        </div>
      </div>
          <?php
$achievements=json_decode($school['achievements']);
if($achievements!=''){
?>    
            <!-- Records& achievements Carousel -->
            <div class="fullwidth-carousel-container margin-top-20 no-dots">
                <h3 class="listing-desc-headline margin-top-70">Records & Achievements</h3>
                <div class="testimonial-carousel testimonials">
                         <?php
  for ($i=0; $i < count($achievements); $i++) {
    if($achievements[$i]!=''){
  ?> 
                    <!-- Item -->
                    <div class="fw-carousel-review">
                        <div class="testimonial-box">
                            <img src="<?php echo base_url('assets/front-end/')?>images/achievement.png" alt="" width="60px" style=" margin: auto;" >
                            <div class="testimonialz"><?=$achievements[$i];?> </div>
                        </div>
                    </div>
<?php }}?>
                </div>
            </div>
            <!-- Categories Carousel / End -->
<?php }?>
            
            
        </div>
        
        
        <!-- Reviews Section-->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              
      <div class="container" style="">
                <!-- Reviews -->
                <div id="listing-reviews" class="listing-section">
                    <h3 class="listing-desc-headline margin-top-35 margin-bottom-20">Reviews <span>(<?=$this->common_model->count_records('ratings',$where);?>)</span></h3>

                    <!-- Rating Overview -->
                    <div class="rating-overview" style="display: block !important;">

                        <div class="row">
                            <div class="col-md-8">

                                <!-- Reviews -->
                                <div class="col-md-12">
                                    <section class="comments listing-reviews">

                                        <div id="review_list" class="message-content">
                                            
                                            
                                        </div>

                                    </section>
                                </div>

                                <div class="col-md-12">

                                    <!-- Paginate -->
                                    <div style="margin-top: 10px;" id="pagination_data"></div>

                                </div>
                                <!--  -->

                            </div>
                            <div class="col-md-4">
                                <!-- Add Review Box -->
                                <div id="add-review" class="add-review-box">

                                    <!-- Add Review -->
                                    <h3 class="listing-desc-headline margin-bottom-10">Add Review</h3>
                                   <!-- <p class="comment-notes">Your email address will not be published.</p>-->
                                    <?php if ($this->ion_auth->logged_in()){?>
<form method="post" novalidate="novalidate" action="<?=$this->session->userdata('last_page');?>" class="form-horizontal" id="form">
  <?php
                  if($this->session->flashdata('rating_message')!=''){
                  ?>
                  <div class="notification notice closeable">
  <strong><?=$this->session->flashdata('rating_message');?></strong>
</div>
<?php }?>
        <!-- Subratings Container -->
        <div class="sub-ratings-container">
          <!-- Subrating #4 -->
          <div class="add-sub-rating">
            <div class="sub-rating-title">Rating <i class="tip" data-tip-content="Give your opinion by selectingh stars"></i></div>
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

          

        </div>
        <!-- Subratings Container / End -->

        <!-- Review Comment -->
        <div id="add-comment" class="add-comment">
          <fieldset>

          
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
  <input type="hidden" id="single_school_id" value="<?=$school['id'];?>">
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

        </div>

  </div>
</div>






<div class="bottom-nav">
    <div class="bottom-menus" href="#" style="background-color: black; width: 100vw;">
        <ul>
            <a href="<?=$url?>" class="<?=$cls;?>"> 
                <li>
                  <i class="sl sl-icon-login"></i>  <?=$apply_name;?>
                </li>
            </a>
            <a href="#refer-earn" class="sign-in popup-with-zoom-anim ">
                <li>
                    Refer& Earn
                </li>
            </a>
        </ul>
    </div>
</div>

<!-- <div id="backtotop1"><a href="#"></a></div>-->


<a href="#refer-earn"  class="sign-in popup-with-zoom-anim sharenow mobi-view"></a>

	

<!-- Refer-Earn Popup -->
			<div id="refer-earn" class="zoom-anim-dialog mfp-hide ">

				<div class="small-dialog-header">
					
				</div>
                <div  style="text-align: center;" >
                    <img src="<?php echo base_url('assets/front-end/')?>images/refer-earn.jpg" alt="" width="65%" style="margin-top: -39px;"  >
                    <div>
                       <!--<h3>Refer &Earn<b> <?=$this->db->get_where('settings', array('setting_type' => 'refer_money'))->row()->description; ?></b>coins</h3>-->
                       <h3>Referral Code: <b><?=$unique_id;?></b></h3>
                       <p style="color: #000">
                       
                      Refer the school to your friend and upon his successful admission through TEFY, you will be rewarded with <b> <?=$this->db->get_where('settings', array('setting_type' => 'refer_money'))->row()->description; ?> Tefy coins</b></p>
                        
                    </div>
                    
                    
                    <div class="copy-link  margin-top-10">
                        ><button class="js-emailcopybtn" style="width: 100%; background-color: black; border: 0; border-radius: 5px; font-size: 13px;">Copy link</button>
                    </div>
                </div>
                <div id="share-buttons">
                 
                   <!--  <ul class="share-buttons margin-top-10 margin-bottom-0 " style=" text-align: center;">
                        <li><a class="fb-share" href="http://www.facebook.com/sharer.php?u=<?=$share_url;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter-share" href="https://twitter.com/share?url=<?=$share_url;?>&amp;text=<?=$school['school_name']?>&amp;hashtags=simplesharebuttons" target="_blank"><i class="fa fa-twitter"></i> </a></li>
                        <li><a class="gplus-share" href="https://plus.google.com/share?url=<?=$share_url;?>" target="_blank"><i class="fa fa-google-plus"></i> </a></li>
                        <li><a class="pinterest-share" href="https://api.whatsapp.com/send?text=<?=$share_url;?>"  target="_blank"><i class="fa fa-whatsapp"></i> </a></li>
                    </ul> -->
                </div>
                 
						

<style>
.copy-link{
    display: flex;
}

</style>
				
			</div>
			
			<!-- Refer-Earn popup End -->


      <?php }else{
        redirect('404_override');
      }?>