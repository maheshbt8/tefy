<div class="main-search-container centered" data-background-image="<?php echo base_url('assets')?>/images/main-search-background-01.jpg">
	<div class="main-search-inner">

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>
						Find Nearby 
						<!-- Typed words can be configured in script settings at the bottom of this HTML file -->
						<span class="typed-words"></span>
					</h2>
					<h4>Expolore top-rated attractions, activities and more</h4>
	<form action="<?=base_url('listings-list');?>" methor="get">
					<div class="main-search-input">

						<div class="main-search-input-item">
							<input type="text" placeholder="What are you looking for?" value="" name="keyword" />
						</div>

						<div class="main-search-input-item location">
							<div id="autocomplete-container">
								<input id="pac-input" type="text" placeholder="Location" name="location">
								<!-- <input id="autocomplete-input" type="text" placeholder="Location" name="location"> -->
							</div>
							<a href="#"><i class="fa fa-map-marker"></i></a>
						</div>

						<!--<div class="main-search-input-item">
							<select data-placeholder="All Categories" class="chosen-select" >
								<option>All Categories</option>	
								<option>Shops</option>
								<option>Hotels</option>
								<option>Restaurants</option>
								<option>Fitness</option>
								<option>Events</option> 
							</select>
						</div>-->

						<button class="button" onclick="window.location.href='listings-half-screen-map-list.html'">Search</button>

					</div>
					</form>
				</div>
			</div>
			
			

		</div>

	</div>
</div>


<!-- Content
================================================== -->

<!-- Category Boxes / End -->


<!-- Fullwidth Section -->
<section class="fullwidth margin-top-0 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">

	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-45">
					<strong class="headline-with-separator">Most Visited Schools</strong>
					<!--<span>Discover Top-Rated Local Businesses</span>-->
				</h3>
			</div>

			<div class="col-md-12">
				<div class="">
                    
                    
                    
                        <!-- <a href="http://localhost/tefy/listings-single/TWc9PQ==" class="listing-item-container">
                            <div class="listing-item">
                                <div class="col-md-4 col-sm-4  listing-item p--0 list-img-size" style="background-image: url(http://localhost/tefy/uploads/listings/thumb/2.jpg);object-fit: cover;">
                                    <div class="listing-badge now-open">Closed Now</div>
                                </div>
                                <div class="col-md-8 col-sm-8 ">
                                    <div class="listing-item-content">
                                        <h3>vikas high school </h3>
                                        <span class="padding-top-5  more2"><span><b>Vision</b>: ddddddd dddddd ddddddd ddddddd ddddddddddd  ddddddddd dddddd dddddd ddddddd dddddddd dddd dddddd dddddddd dddddd dddddddd dddd ddddddd dddddddd dddddddd dddddd dddddddd ddddddd dddddd dddd ddddd</span> </span>
                                        <div class="padding-top-15"><b>Board: </b>SSC</div>
                                        <div class="padding-top-5"><b>Grade:</b><span>I - X </span> </div>
                                        <div class="padding-top-5"><b>Category:</b><span>Day Care </span> </div>
                                        <div ><span class="more2"><b>Address</b>: wewe wewewewe wewewewewewew ewewewe wewewewew ewew ewewewewe wewewewewewew ewewewewew ewewewewe weweew wwwwww wwwwwwwf fffffffff fqwwwwww wwwwwwww</span> </div>
                                        
                                    </div>
                                    <span class="like-icon"></span>
                                    <div class="star-rating" data-rating="5">
                                        <div class="rating-counter">(<b>4.5</b>/5)</div>
                                    </div>
                                </div>
                            </div>

                        </a> -->
                  
                    
                    

                    <!-- Listing Item -->
                    <?php
$i=0;
foreach ($schools as $row) {
	$class=array();
	$classes=json_decode($row['class']);
	for($c=0; $c < count($classes); $c++) { 
		$class[]=$this->common_model->get_type_name_by_where('classes',array('id'=>$classes[$c]));
	}
				
	$opening_hours=json_decode($row['opening_hours']);
	$reslut=$this->common_model->get_days();

  $days=$reslut['days'];
  $loop=$reslut['timings'];
for ($i=0; $i < count($days); $i++) {
	if($days[$i] == date('l')){
	if($opening_hours->opening_time[$i]=='Closed'){
	$opening='Closed Now';
	$opening_col='now-closed';
	}else{
	if((strtotime(date('h A')) >= strtotime($opening_hours->opening_time[$i])) && (strtotime(date('h A')) <= strtotime($opening_hours->closing_time[$i]))){
		$opening='Now Open';
		$opening_col='now-open';
	}else{
		$opening='Closed Now';
		$opening_col='now-closed';
	}
	}
	}
	}
	$where['row_status']=1;
$where['listing_id']=$row['id'];
$where['row_status']=1;
$rating=round($this->common_model->rating_of_product('ratings', $where ,'rating'),1);
?>
                    <div class="carousel-item">
                        <a href="<?php if ($this->ion_auth->logged_in()){ echo base_url('listings-single/').base64_encode(base64_encode($row['id']));}else{echo '#sign-in-dialog';}?>" class="listing-item-container <?php if ($this->ion_auth->logged_in()==''){ echo 'popup-with-zoom-anim';}?>">
                            <div class="listing-item">
                                <div class="col-md-4  listing-item p--0 list-img-size">
                                    <img src="<?=base_url('uploads/listings/thumb/').$row['id'].'.jpg';?>" alt="">
                                    <div class="listing-badge <?=$opening_col;?>"><?=$opening;?></div>
                                </div>
                                <div class="col-md-8 ">
                                    <div class="listing-item-content">
                                        <h3><?=$row['school_name'];?> <!-- <i class="verified-icon"></i> --></h3>
                                        <span class="padding-top-5  more2"><span><b>Vision</b>: <?=$row['vision'];?></span> </span>
                                        <div class="padding-top-15"><b>Board: </b><?=$this->common_model->get_type_name_by_where('curriculum',array('id'=>$row['curriculum']));?></div>
                                        <div class="padding-top-5"><b>Grade: </b><span> <?=implode(', ',$class);?> </span> </div>
                                        <div class="padding-top-5"><b>Category:</b><span>Day Care </span> </div>
                                        <div ><span class="more2"><b>Address</b>: <?=$row['address'];?></span> </div>

<!--                                         <span><?=$this->common_model->get_type_name_by_where('curriculum',array('id'=>$row['curriculum']));?></span>
                                        <div class="padding-top-15"><span><b>Address</b>: <?=$row['address'];?></span> </div>
                                        <div class="padding-top-5"><span><b>Classes</b>: <?=implode(', ',$class);?></span> </div>
                                        <div class="padding-top-5 text-size"><span><b>Vision</b>: <?=$row['vision'];?></span> </div> -->
                                    </div>
                                    <?php if ($this->ion_auth->logged_in()){?>
                                    <span class="like-icon <?php if($this->common_model->get_type_name_by_where('bookmarks',array('user_id'=>$this->session->userdata('user_id'),'listing_id'=>$row['id']),'row_status')==1){echo 'liked';}?>" onclick="return add_bookmark('<?=$row['id'];?>')"></span>
                                    <?php }?>
                                    <div class="star-rating" data-rating="<?=$rating;?>">
                                    <div class="rating-counter">(<?=$rating;?>/5)</div>
                            </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    <?php $i++;}?>
                    <!-- Listing Item / End -->
                    <!-- Listing Item -->
                    <!-- <div class="carousel-item">
                        <a href="listings-single-page.html" class="listing-item-container">
                            <div class="listing-item">
                                <div class="col-md-4 listing-item p--0">
                                    <img src="<?php echo base_url('assets')?>/images/listing-item-01.jpg" alt="">
                                    <div class="listing-badge now-open">Now Open</div>
                                </div>


                                <div class="col-md-8">
                                    <div class="listing-item-content">

                                        <h3>Oxford International Schools <i class="verified-icon"></i></h3>
                                        <span>Gachibouli, Hyderabad</span>
                                        <div class="padding-top-15"><span>Board: Central Board of Secondary Education</span> </div>
                                        <div class="padding-top-5"><span>Classes: 1-12th Standard</span> </div>
                                    </div>
                                    <span class="like-icon"></span>
                                    <div class="star-rating" data-rating="4.5">
                                    <div class="rating-counter">(12 reviews)</div>
                            </div>
                                </div>
                            </div>

                        </a>
                    </div> -->
                    <!-- Listing Item / End -->
                    <!-- Listing Item -->
                    <!-- <div class="carousel-item">
                        <a href="listings-single-page.html" class="listing-item-container">
                            <div class="listing-item">
                                <div class="col-md-4 listing-item p--0">
                                    <img src="<?php echo base_url('assets')?>/images/listing-item-01.jpg" alt="">
                                    <div class="listing-badge now-open">Now Open</div>
                                </div>


                                <div class="col-md-8">
                                    <div class="listing-item-content">

                                        <h3>Oxford International Schools <i class="verified-icon"></i></h3>
                                        <span>Gachibouli, Hyderabad</span>
                                        <div class="padding-top-15"><span>Board: Central Board of Secondary Education</span> </div>
                                        <div class="padding-top-5"><span>Classes: 1-12th Standard</span> </div>
                                    </div>
                                    <span class="like-icon"></span>
                                    <div class="star-rating" data-rating="4.5">
                                    <div class="rating-counter">(12 reviews)</div>
                            </div>
                                </div>
                            </div>

                        </a>
                    </div> -->
                    <!-- Listing Item / End -->

                </div>
                <!--<a href="listings-single-page.html" class="listing-item-container">
						<div class="listing-item">
                            <div class="col-md-4 listing-item p--0">
                                <img src="<?php echo base_url('assets')?>/images/listing-item-01.jpg" alt="">
                                <div class="listing-badge now-open">Now Open</div>
                            </div>
							
							
                            <div class="col-md-8">
                                <div class="listing-item-content">
                                   
                                    <h3>Oxford International Schools <i class="verified-icon"></i></h3>
                                    <span>Gachibouli, Hyderabad</span>
                                    <div class="padding-top-15"><span>Board: Central Board of Secondary Education</span> </div>
                                    <div class="padding-top-5"><span>Classes: 1-12th Standard</span> </div>
                                </div>
                                <span class="like-icon"></span>
                                <div class="star-rating" data-rating="4.5">
				                <div class="rating-counter">(12 reviews)</div>
						</div>
                            </div>
						</div>
						
					</a>-->
				
			</div>
            <div class="col-md-12 centered-content">
				<a href="<?=base_url('listings-list');?>" class="button border margin-top-10">View All</a>
			</div>

		</div>
	</div>

</section>
<!-- Fullwidth Section / End -->
<!-- Info Section -->
<!--<section class="fullwidth padding-top-75 padding-bottom-30" data-background-color="#fff">-->
	
	<!--<div class="container">

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="headline centered headline-extra-spacing">
					<strong class="headline-with-separator">What Our Users Say</strong>
					<span class="margin-top-25">We collect reviews from our users so you can get an honest opinion of what an experience with our website are really like!</span>
				</h3>
			</div>
		</div>

	</div>-->
	<!-- Info Section / End -->

	<!-- Categories Carousel -->
	<!--<div class="fullwidth-carousel-container margin-top-20 no-dots">
		<div class="testimonial-carousel testimonials">

			
			<div class="fw-carousel-review">
				<div class="testimonial-box">
                    <img src="<?php echo base_url('assets')?>/images/happy-client-01.jpg" alt="">
					<div class="testimonial">Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation is on the runway heading towards a streamlined cloud solution user generated content.</div>
				</div>
				<div class="testimonial-author">
					<img src="<?php echo base_url('assets')?>/images/happy-client-01.jpg" alt="">
					<h4>Jennie Smith <span>User</span></h4>
				</div>
			</div>
			
			
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop.</div>
				</div>
				<div class="testimonial-author">
					<img src="<?php echo base_url('assets')?>/images/happy-client-02.jpg" alt="">
					<h4>Tom Baker <span>User</span></h4>
				</div>
			</div>

			
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial">Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view.</div>
				</div>
				<div class="testimonial-author">
					<img src="<?php echo base_url('assets')?>/images/happy-client-03.jpg" alt="">
					<h4>Jack Paden <span>School</span></h4>
				</div>
			</div>

		</div>
	</div>-->

<!--</section>-->
<!-- Categories Carousel / End -->

<!-- Recent Blog Posts -->
<section class="fullwidth margin-top-0 padding-top-75 padding-bottom-75" data-background-color="#fff">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-55">
					<strong class="headline-with-separator">From The Blog</strong>
				</h3>
			</div>
		</div>

		<div class="row">
			<!-- Blog Post Item -->
			<div class="col-md-4">
				<a href="pages-blog-post.html" class="blog-compact-item-container">
					<div class="blog-compact-item">
						<img src="<?php echo base_url('assets')?>/images/blog-compact-post-01.jpg" alt="">
						<span class="blog-item-tag">Tips</span>
						<div class="blog-compact-item-content">
							<ul class="blog-post-tags">
								<li>22 August 2019</li>
							</ul>
							<h3>Hotels for All Budgets</h3>
							<p>Sed sed tristique nibh iam porta volutpat finibus. Donec in aliquet urneget mattis lorem. Pellentesque pellentesque.</p>
						</div>
					</div>
				</a>
			</div>
			<!-- Blog post Item / End -->

			<!-- Blog Post Item -->
			<div class="col-md-4">
				<a href="pages-blog-post.html" class="blog-compact-item-container">
					<div class="blog-compact-item">
						<img src="<?php echo base_url('assets')?>/images/blog-compact-post-02.jpg" alt="">
						<span class="blog-item-tag">Tips</span>
						<div class="blog-compact-item-content">
							<ul class="blog-post-tags">
								<li>18 August 2019</li>
							</ul>
							<h3>The 50 Greatest Street Arts In London</h3>
							<p>Sed sed tristique nibh iam porta volutpat finibus. Donec in aliquet urneget mattis lorem. Pellentesque pellentesque.</p>
						</div>
					</div>
				</a>
			</div>
			<!-- Blog post Item / End -->

			<!-- Blog Post Item -->
			<div class="col-md-4">
				<a href="pages-blog-post.html" class="blog-compact-item-container">
					<div class="blog-compact-item">
						<img src="<?php echo base_url('assets')?>/images/blog-compact-post-03.jpg" alt="">
						<span class="blog-item-tag">Tips</span>
						<div class="blog-compact-item-content">
							<ul class="blog-post-tags">
								<li>10 August 2019</li>
							</ul>
							<h3>The Best Cofee Shops In Sydney Neighborhoods</h3>
							<p>Sed sed tristique nibh iam porta volutpat finibus. Donec in aliquet urneget mattis lorem. Pellentesque pellentesque.</p>
						</div>
					</div>
				</a>
			</div>
			<!-- Blog post Item / End -->

			<div class="col-md-12 centered-content">
				<a href="pages-blog.html" class="button border margin-top-10">View Blog</a>
			</div>

		</div>

	</div>
</section>
<!-- Recent Blog Posts / End -->
