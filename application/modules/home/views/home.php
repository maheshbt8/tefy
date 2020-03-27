<!--Banner
================================================== -->
<div class="main-search-container  alt-search-box centered" data-background-image="<?php echo base_url('assets/front-end/')?>images/bg-1.png"  data-img-width="" data-img-height="100%">
    <div class="main-search-inner">

        <div class="container">
            <div class="row">
               <div class="col-md-6">
                    <form action="<?=base_url('listings-list');?>" methor="get" novalidate="novalidate" class="form-horizontal" id="form">
                    <div class="main-search-input">

                        <div class="main-search-input-headline">
                            <h1>Search, Explore schools and Apply admissions</h1>
                            <!-- <h4>“Choose schools, Apply admissions and get rewarded</h4> -->
                        </div>
                        
                        <div class="main-search-input-item location">
                            <div>
                                <input type="text" placeholder="School Name/Board/Daycare/Playschool..." name="keyword" autocomplete="off">
                            </div>
                        </div>
                        <div class="main-search-input-item location">
                            <div id="autocomplete-container">
                                <input id="pac-input" type="text" placeholder="Area you are looking in?" name="location" autocomplete="off" title="Please Enter Your Location....!">
                                <input type="hidden" name="lat" id="lat">
                                <input type="hidden" name="lng" id="lng">
                                <input type="hidden" name="address" id="address">
                            </div>
                            <a href="#" onclick="get_my_location()"><i class="fa fa-map-marker"></i></a>
                        </div>
                        <button class="button">Search</button>
                    </div>
                </form>
                </div>
                <div class="col-md-6">
                    <img class="banner-image" src="<?php echo base_url('assets/front-end/')?>images/school-image.png" alt="">
                </div>
            </div>
            
        </div>

    </div>
</div>


<!-- Content 
================================================== -->



<!-- Categories Carousel -->
    <div class="fullwidth-carousel-container  no-dots polygon1">
        <h3 class="headline centered margin-top-25">
            <strong class="headline-with-separator">Browse by Category</strong>
        </h3>
        <div class="category-carousel testimonials">



             <?php
        $curl=$this->common_model->select_results_info('curriculum',array('row_status'=>1));
        foreach ($curl as $cur) {
        ?>
                        <!-- Item -->
                        
                            <div class="fw-carousel-review">
                                <div class="icon-box-2 header-size">

                                    <!--<h2>Find </h2>-->
                                    <h2><b><?=$cur['name'];?>  Schools</b></h2>
                                    <h2>in Hyderabad</h2>
                                    <div class=" centered-content">
                                        <a href="<?=base_url('listings-list?board%5B%5D='.$cur['id']);?>" class=" search-hov  margin-top-10">Search Now ></a>
                                    </div>
                               </div>
                               
                            </div>
                        
                            <?php }?>
            <?php
        $curl=$this->common_model->select_results_info('category',array('row_status'=>1));
        foreach ($curl as $cur) {
        ?>
                        <!-- Item -->
                       
                            <div class="fw-carousel-review">
                                 <div class="icon-box-2 header-size">

                                    <!--<h2>Find </h2>-->
                                    <h2><b><?=$cur['name'];?></b></h2>
                                    <h2>in Hyderabad</h2>
                                    <div class=" centered-content">
                                        <a href="<?=base_url('listings-list?board%5B%5D='.$cur['id']);?>" class=" search-hov margin-top-10">Search Now ></a>
                                    </div>


                                </div>
                            </div>
                       
                            <?php }?>


        </div>
        
        <div class="col-md-12 centered-content">
            <a href="<?=base_url('listings-list');?>" class="button border margin-top-10">View all schools</a>
        </div>
        
    </div>
    <!-- Categories Carousel / End -->


  













<!-- Most Visited Places -->
<!--<section class="fullwidth border-top  padding-top-75 padding-bottom-60" data-background-color="#000">

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline centered margin-bottom-45 ">
                    <strong class="headline-with-separator headline-with-separator1 cl-white">What we do</strong>
                    <span>We at TEFY, are young minds driven to make a child’s educational experience a cakewalk. So it’s about time that you gallop to find a perfect school for your precious child. You hit up google, but it’s so generic! Parents, with the limited googled information available to them, make a choice with their fingers crossed.<a class="what" href="<?=base_url('about_us');?>">
                    (Read more)</a></span>
                </h3>
            </div>
        </div>
    </div>

    


</section>-->
<!-- Fullwidth Section / End --> 
<section class="fullwidth padding-top-75 padding-bottom-30" data-background-color="rgb(237, 237, 237)">
    <!-- Info Section -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="headline centered headline-extra-spacing">
                    <strong class="headline-with-separator">The <b>TEFY</b> Path</strong>
                   <h3>&nbsp;</h3>
                </h3>
            </div>
            <div class="col-md-3 col-xs-6 col-sm-6 text-center">
              
                <img class="col-md-12 " src="<?php echo base_url('assets/front-end/')?>apply-admission2.png">
                <div class="col-md-12 "><h5 class="title-whatwedo">Search Schools</h5></div>
            </div>
            <div class="col-md-3 col-xs-6 col-sm-6  text-center">
                <img class="col-md-12" src="<?php echo base_url('assets/front-end/')?>apply-admission31.png">
                <div class="col-md-12 "><h5 class="title-whatwedo">Apply Admission</h5></div>
            </div>
            <div class="col-md-3 col-xs-6 col-sm-6  text-center">
                <img class="col-md-12 " src="<?php echo base_url('assets/front-end/')?>apply-admission4.png">
                <div class="col-md-12"><h5 class="title-whatwedo">Pay Fee</h5></div>
            </div>
            <div class="col-md-3 col-xs-6 col-sm-6  text-center">
                <img class="col-md-12 " src="<?php echo base_url('assets/front-end/')?>apply-admission5.png">
                <div class="col-md-12 "><h5 class="title-whatwedo">Get Cashbacks</h5></div>
            </div>
           
            
        </div>
    </div>
</section>



    
<section class="fullwidth padding-top-75 padding-bottom-30" data-background-color="#fff">
    <!-- Info Section -->
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="headline centered headline-extra-spacing">
                    <strong class="headline-with-separator">What Our Users Say</strong>
                    <span class="margin-top-25">We collect reviews from our users so you can get an honest opinion of what an experience with our website are really like!</span>
                </h3>
            </div>
        </div>

    </div>
    <!-- Info Section / End -->

    <!-- Categories Carousel -->
    <div class="fullwidth-carousel-container margin-top-20 no-dots">
        <div class="testimonial-carousel testimonials">

 <?php
        $curl=$this->common_model->select_results_info('users_says',array('row_status'=>1));
        foreach ($curl as $cur) {
        ?>
            <!-- Item -->
            <div class="fw-carousel-review">
                <div class="testimonial-box">
                    <div class="testimonial"><?=$cur['desc'];?></div>
                </div>
                <div class="testimonial-author">
                    
                    <h4><img src="<?php echo base_url('uploads/users/user.jpg')?>" alt="" class="user-ico"><?=$cur['name'];?> <!-- <span>Restaurant Owner</span> --></h4>
                </div>
            </div>
<?php }?>
      
        </div>
    </div>
    <!-- Categories Carousel / End -->

</section>




<!-- Recent Blog Posts -->
<section class="fullwidth margin-top-0 padding-top-0 padding-bottom-75" data-background-color="#fff">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h3 class="headline centered margin-bottom-55">
                    <strong class="headline-with-separator">From The Blog</strong>
                </h3>
            </div>
        </div>
        
        
        <!-- Categories Carousel -->
        <div class="fullwidth-carousel-container margin-top-20 no-dots">
            <div class="testimonial-carousel testimonials">
                <?php
                $blogs = $this->db->order_by('id','DESC')->where('row_status',1)->get('blogs', 10, 0)->result_array();
foreach ($blogs as $blog) {
?>
                <!-- Item -->
                 <div class="fw-carousel-review">
                     <a href="<?=base_url('blog?title='.$blog['title'].'&blog='.$blog['id'].'&created='.$blog['created_at']);?>" class="blog-compact-item-container">
                        <div class="blog-compact-item">
                            <img src="<?=base_url('uploads/blogs/').$blog['id'].'.jpg';?>" alt="">
                            <!--<span class="blog-item-tag">Tips</span>-->
                            <div class="blog-compact-item-content">
                                <ul class="blog-post-tags">
                                    <li><?=date('d M Y',strtotime($blog['created_at']));?></li>
                                </ul>
                                <h3><?=ucwords($blog['title']);?></h3>
                                <p><?=$blog['short_note'];?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }?>
            </div>

        

            <div class="col-md-12 centered-content">
                <a href="<?=base_url('blogs');?>" class="button border margin-top-10">View Blog</a>
            </div>

        </div>

    </div>
</section>
<!-- Recent Blog Posts / End -->


<!-- Flip banner -->
<a href="<?=base_url('listings-list');?>" class="flip-banner parallax" data-background="<?php echo base_url('assets/front-end/')?>images/slider-bg-02.jpg" data-color="#000" data-color-opacity="0.85" data-img-width="2500" data-img-height="1666">
    <div class="flip-banner-content">
        <!-- <h2 class="flip-visible">Explore top-rated Schools nearby you</h2> -->
        <!--<h2 class="flip-hidden">Browse all School <i class="sl sl-icon-arrow-right"></i></h2>-->
        <h2 class="flip-visible">Browse All Schools <i class="sl sl-icon-arrow-right"></i></h2>
        <h2 class="flip-hidden">Browse All Schools <i class="sl sl-icon-arrow-right"></i></h2>-->
    </div>
</a>
<!-- Flip banner / End