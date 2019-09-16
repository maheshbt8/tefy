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

					<div class="main-search-input">

						<div class="main-search-input-item">
							<input type="text" placeholder="What are you looking for?" value=""/>
						</div>

						<div class="main-search-input-item location">
							<div id="autocomplete-container">
								<input id="autocomplete-input" type="text" placeholder="Location">
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
				<div class="simple-slick-carousel dots-nav">

                    <!-- Listing Item -->
                    <?php
$i=0;
foreach ($schools as $row) {
?>
                    <div class="carousel-item">
                        <a href="<?=base_url('listings-single/').$row['id'];?>" class="listing-item-container">
                            <div class="listing-item">
                                <div class="col-md-4 listing-item p--0">
                                    <img src="<?php echo base_url('assets')?>/images/listing-item-01.jpg" alt="">
                                    <div class="listing-badge now-open">Now Open</div>
                                </div>


                                <div class="col-md-8">
                                    <div class="listing-item-content">

                                        <h3><?=$row['school_title'];?> <i class="verified-icon"></i></h3>
                                        <span>Gachibouli, Hyderabad</span>
                                        <div class="padding-top-15"><span>Address: <?=$row['address'];?></span> </div>
                                        <div class="padding-top-5"><span>Classes: <?=$row['category'];?></span> </div>
                                    </div>
                                    <span class="like-icon"></span>
                                    <div class="star-rating" data-rating="4.5">
                                    <div class="rating-counter">(12 reviews)</div>
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

			<!-- Item -->
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial">Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation is on the runway heading towards a streamlined cloud solution user generated content.</div>
				</div>
				<div class="testimonial-author">
					<img src="<?php echo base_url('assets')?>/images/happy-client-01.jpg" alt="">
					<h4>Jennie Smith <span>User</span></h4>
				</div>
			</div>
			
			<!-- Item -->
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop.</div>
				</div>
				<div class="testimonial-author">
					<img src="<?php echo base_url('assets')?>/images/happy-client-02.jpg" alt="">
					<h4>Tom Baker <span>User</span></h4>
				</div>
			</div>

			<!-- Item -->
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
	</div>
	<!-- Categories Carousel / End -->

</section>


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