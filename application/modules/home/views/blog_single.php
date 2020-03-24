
<!-- <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5e133cc97dc3a500126f4cd6&product=inline-share-buttons" async="async"></script> -->
<?php
$this->session->set_userdata('last_page',current_url().'?title='.$_GET['title'].'&blog='.$_GET['blog'].'&created='.$_GET['created']);
$this->common_model->update_results_info('blogs',array('id'=>$blog['id']),array('views'=>($blog['views']+1)));

$share_url=urlencode(base_url('blog?title='.$_GET['title'].'&blog='.$_GET['blog'].'&created='.$_GET['created']));
?>
<?php
                    $where['blog_id']=$blog['id'];
                    $where['row_status']=1;
                    ?>
<!--
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6">

				<h2>Blog</h2>

			


			</div>
           
		</div>
	</div>
</div>
-->


<!-- Content
================================================== -->
<div class="container">

	<!-- Blog Posts -->
	<div class="blog-page">
	<div class="row">


		<!-- Post Content -->
		<div class="col-lg-9 col-md-8 padding-right-30">


			<!-- Blog Post -->
			<div class="blog-post single-post">
				
				<!-- Img -->
				<img class="post-img" src="<?=base_url('uploads/blogs/').$blog['id'].'.jpg';?>" alt="">

				
				<!-- Content -->
				<div class="post-content">

					<h3><?=ucwords($blog['title']);?></h3>

					<ul class="post-meta">
						<li><?=date('M d,Y',strtotime($blog['created_at']));?></li>
						<li><a href="#"><?=$this->common_model->thousandsCurrencyFormat($blog['views']);?> Views</a></li>
						<li><a href="#"><?=$this->common_model->count_records('blog_reviews',$where);?> Comments</a></li>
					</ul>
                    <div class="row">
                    	<?php
                    		$category='';
  $cate=json_decode($blog['ratings']);
  //print_r($cate->rating_for);
  if($cate->rating_for!=''){
  /*for($c=0; $c < count($cate); $c++) { 
    $categ[]=$this->common_model->get_type_name_by_where('category',array('id'=>$cate[$c]));
  }
  $category=implode(', ',$categ);*/$r=0;
  foreach ($cate->rating_for as $rat) {
  ?>
                        <div class="col-md-4 col-sm-4">
                            <p><b><?=$rat?></b><span class="star-rating" data-rating="<?=$cate->rating[$r];?>"></span></p>
                        </div>
  <?php
$r++;}}
                    	?>
<div class="row">
                            <span class="col-auto"><strong>Share :</strong></span>
                            <span class="col">
                                <!-- AddToAny BEGIN -->
                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                    <a class="a2a_button_facebook"></a>
                                    <a class="a2a_button_twitter"></a>
                                    <a class="a2a_button_email"></a>
                                    <a class="a2a_button_whatsapp"></a>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                                <!-- AddToAny END -->
                            </span>
                            
                        </div>
<!-- <div class="col-md-12 col-sm-12">
	<ul class="share-buttons margin-top-40 margin-bottom-0">
            <li><a class="fb-share" href="http://www.facebook.com/sharer.php?u=<?=$share_url;?>" target="_blank"><i class="fa fa-facebook"></i> Share</a></li>
            <li><a class="twitter-share" href="https://twitter.com/share?url=<?=$share_url;?>&amp;text=<?=$blog['title']?>&amp;hashtags=simplesharebuttons" target="_blank"><i class="fa fa-twitter"></i> Tweet</a></li>
            <li><a class="gplus-share" href="https://plus.google.com/share?url=<?=$share_url;?>" target="_blank"><i class="fa fa-google-plus"></i> Share</a></li>
            <li><a class="pinterest-share" href="https://api.whatsapp.com/send?text=<?=$share_url;?>"  target="_blank"><i class="fa fa-whatsapp"></i> whatsapp</a></li>
          </ul>
      </div> -->
                    </div>
                    <!-- Overview -->
      <div id="listing-overview" class="listing-section">

        <!-- Description -->
               <div class="">
                 <?=$blog['desc'];?>
                </div>
                <!--<a href="#" class="show-more-button" data-more-title="Show More" data-less-title="Show Less"><i class="fa fa-angle-down"></i></a>-->
      </div>
                    
					
					<div class="clearfix"></div>

				</div>
			</div>
			
			

		
			<div class="clearfix"></div>


			

	</div>
	<!-- Content / End -->



	<!-- Widgets -->
	<div class="col-lg-3 col-md-4">
		<div class="sidebar right">

			


			<!-- Widget -->
			<div class="widget margin-top-40">

				<h3>Popular Posts</h3>
				<ul class="widget-tabs">
<?php
$query = $this->db->order_by('id','DESC')->where('id !=',$blog['id'])->where('row_status',1)->get('blogs', 4, 0)->result_array();
                            foreach ($query as $b) {
                          $url=base_url('blog?title='.$b['title'].'&blog='.$b['id'].'&created='.$b['created_at']);
                            ?>
					<!-- Post #1 -->
					<li>
						<a href="<?=$url;?>">
						<div class="widget-content">
								<div class="widget-thumb"><img src="<?=base_url('uploads/blogs/').$b['id'].'.jpg';?>" alt="">
							</div>
							
							<div class="widget-text">
								<h5><?=$b['title'];?> </h5>
								<span><?=date('M d,Y',strtotime($b['created_at']));?></span>
							</div>
							<div class="clearfix"></div>
						</div>
					</a>
					</li>
				<?php }?>

				</ul>

			</div>
			<!-- Widget / End-->


			<div class="clearfix"></div>
			<div class="margin-bottom-40"></div>
		</div>
	</div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              
      <div class="container" style="">
                <!-- Reviews -->
                <div id="listing-reviews" class="listing-section">
                    
                    <h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Comments <span>(<?=$this->common_model->count_records('blog_reviews',$where);?>)</span></h3>

                    <!-- Rating Overview -->
                    <div class="rating-overview" style="display: block !important;">

                        <div class="row">
                            <div class="col-md-8">

                                <!-- Reviews -->
                                <div class="col-md-12">
                                    <section class="comments listing-reviews">

                                        <div id="comment_list" class="message-content">
                                            
                                            
                                        </div>

                                    </section>
                                </div>

                                <div class="col-md-12">

                                    <!-- Paginate -->
                                    <div style="margin-top: 10px;" id="pagination_data2"></div>

                                </div>
                                <!--  -->

                            </div>
                            <div class="col-md-4">
                                <!-- Add Review Box -->
                                <div id="add-review" class="add-review-box">

                                    <!-- Add Review -->
                                    <h3 class="listing-desc-headline margin-bottom-10">Add Comment</h3>
                                    <p class="comment-notes">Your email address will not be published.</p>
                                    <?php if ($this->ion_auth->logged_in()){?>
<form method="post" novalidate="novalidate" action="<?=$this->session->userdata('last_page');?>" class="form-horizontal" id="form">
  <?php
                  if($this->session->flashdata('rating_message')!=''){
                  ?>
                  <div class="notification notice closeable">
  <strong><?=$this->session->flashdata('rating_message');?></strong>
</div>
<?php }?>

        <!-- Review Comment -->
        <div id="add-comment" class="add-comment">
          <fieldset>

          
            <div>
              <label>Comment:</label>
              <textarea cols="40" rows="3" name="review" required="" id="my_review"></textarea>
               <input type="hidden" id="single_blog_id" value="<?=$blog['id'];?>">
            </div>

          </fieldset>

          <button class="button">Submit Comment</button>
          <div class="clearfix"></div>
        </div>
</form><?php }else{?>
    <input type="hidden" id="single_blog_id" value="<?=$blog['id'];?>">
  <a href="<?=base_url('auth');?>">If you want to give comment please login</a>
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
	<!-- Sidebar / End -->


</div>
</div>