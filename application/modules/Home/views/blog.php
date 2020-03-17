<div id="titlebar" class="gradient bg--black">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8">

				<h2 class="white font--family">The TEFY Guide</h2>
            </div>
            <div class="col-md-4 col-sm-4">
                <!--Search Widget -->
                <div class="widget">
                	<!--<form>-->
                    <div class="search-blog-input">
                        <div class="input"><input class="search-field search-height" type="text" placeholder="Search Articles" value="" onkeyup="get_search_blog(this.value);"/></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- Widget / End -->
            </div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">

	<!-- Blog Posts -->
	<div class="blog-page">
	<div class="row">


		<!-- Post Content -->
		<div class="col-lg-12 col-md-12 ">


			






			<!-- Related Posts -->
			<div class="clearfix"></div>
			
			<div class="row" id="my_blogs">
<!-- <?php
foreach ($blogs as $blog) {
?>
				<div class="col-md-4 col-sm-4">
					<a href="<?=base_url('blog?title='.$blog['title'].'&blog='.$blog['id'].'&created='.$blog['created_at']);?>">
						<div class="blog-compact-item">
							<img src="<?=base_url('uploads/blogs/').$blog['id'].'.jpg';?>" alt="">
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
<?php }?> -->
				
                
			</div>
			<!-- Related Posts / End -->


			

		
			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-top-20 margin-bottom-40">
						<!-- <nav class="pagination">
							<?php echo $pagination; ?>
						</nav> -->
						<div style="margin-top: 10px;" id="pagination_data1"></div>
					</div>
				</div>
			</div>
			<!-- Pagination / End -->


			

	</div>
	<!-- Content / End -->



	
        
	</div>
	<!-- Sidebar / End -->


</div>
</div>
