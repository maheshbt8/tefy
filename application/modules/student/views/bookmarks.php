<div class="col-lg-12 col-md-12 padding-left-30">

			<h3 class="margin-top-0 margin-bottom-40">Bookmarked Schools</h3>

			
			<!-- Listings Container / End -->
			<div class="row">
				<div class="col-lg-12 col-md-12 padding-right-30">



			<div class="row">
<?php
$i=0;
foreach ($schools as $row) {
	$category='';
  $cate=json_decode($row['category']);
  if($cate!=''){
  for($c=0; $c < count($cate); $c++) { 
    $categ[]=$this->common_model->get_type_name_by_where('category',array('id'=>$cate[$c]));
  }
  $category=implode(', ',$categ);
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

$class=array();
	$classes=json_decode($row['class']);
	for($c=0; $c < count($classes); $c++) { 
		$class[]=$this->common_model->get_type_name_by_where('classes',array('id'=>$classes[$c]));
	}

?>
                <!-- Listing Item -->
				<div class="col-lg-12 col-md-12">
					<div class="listing-item-container list-layout">
						<a href="<?php if ($this->ion_auth->logged_in()){ echo base_url('listings-single/').base64_encode(base64_encode($row['id']));}else{echo '#sign-in-dialog';}?>" class="listing-item <?php if ($this->ion_auth->logged_in()==''){ echo 'popup-with-zoom-anim';}?>">
							
							<!-- Image -->
							<div class="listing-item-image">
								<img src="<?=base_url('uploads/listings/thumb/').$row['id'].'.jpg';?>" alt="">
								<!--<span class="tag">Eat & Drink</span>-->
							</div>
							
							<!-- Content -->
							<div class="listing-item-content">
								<div class="listing-badge <?=$opening_col;?>"><?=$opening;?></div>

								<div class="listing-item-inner">
									<h3><?=$row['school_name'];?> <!-- <i class="verified-icon"></i> --></h3>

									<span class="padding-top-5  more2"><span><b>Vision</b>: <?=$row['vision'];?></span> </span>
                                        <div class="padding-top-15"><b>Board: </b><?=$this->common_model->get_type_name_by_where('curriculum',array('id'=>$row['curriculum']));?></div>
                                        <div class="padding-top-5"><b>Grade: </b><span> <?=implode(', ',$class);?> </span> </div>
                                        <div class="padding-top-5"><b>Category: </b><span> <?=$category;?> </span> </div>
                                        <div ><span class="more3"><b>Address</b>: <?=$row['address'];?></span> </div>
                                    <div class="star-rating" data-rating="<?=$rating;?>">
                                        <div class="rating-counter">(<b><?=$rating;?></b>/5)</div>
                                    </div>


									<span><?=$row['address'];?></span>
									<!-- <div class="star-rating" data-rating="<?=$rating;?>">
										<div class="rating-counter">(<?=$this->common_model->count_records('ratings',$where);?> reviews)</div>
									</div> -->
									<div class="padding-top-5">
                                        <span><b>Vision :</b>
                                            <span class="more2"><?=$row['vision'];?></span>
                                        </span> 
                                    </div>
								</div>
								<?php if ($this->ion_auth->logged_in()){?>
								<span class="like-icon <?php if($this->common_model->get_type_name_by_where('bookmarks',array('user_id'=>$this->session->userdata('user_id'),'listing_id'=>$row['id']),'row_status')==1){echo 'liked';}?>" onclick="return add_bookmark('<?=$row['id'];?>')"></span><?php }?>
							</div>
						</a>
					</div>
				</div>
				<!-- Listing Item / End -->
<?php $i++;}?>
			</div>

			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-top-20 margin-bottom-40">
						<nav class="pagination">
							<!-- <ul>
								<li><a href="#" class="current-page">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
							</ul> -->
							<?php echo $pagination; ?>
						</nav>
					</div>
				</div>
			</div>
			<!-- Pagination / End -->

		</div>
			</div>
				
			<!-- Reviews -->
			

		</div>






		  <script type="text/javascript">
    function add_bookmark(listing_id){ 
  $.ajax({
            url: '<?php echo base_url();?>home/add_bookmark/' + listing_id ,
            success: function(response)
            {
              //alert(response);
                /*jQuery('#plans_list').html(response);*/
            }
    });
    }
  </script>