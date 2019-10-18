<?php
$this->session->set_userdata('last_page',current_url());
?>
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>All Schools</h2><span>List of all schools listed in TEFY</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>All Schools</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row">

		<div class="col-lg-9 col-md-8 padding-right-30">

			<!-- Sorting / Layout Switcher -->
			<div class="row margin-bottom-25">

				<div class="col-md-6 col-xs-6">
					<!-- Layout Switcher -->
					<!--<div class="layout-switcher">
						<a href="listings-grid-with-sidebar-1.html" class="grid"><i class="fa fa-th"></i></a>
						<a href="#" class="list active"><i class="fa fa-align-justify"></i></a>
					</div>-->
				</div>

				<div class="col-md-6 col-xs-6">
					<!-- Sort by -->
					<!-- <div class="sort-by">
						<div class="sort-by-select">
							<select data-placeholder="Default order" class="chosen-select-no-single">
								<option>Default Order</option>	
								<option>Highest Rated</option>
								<option>Most Reviewed</option>
								<option>Newest Listings</option>
								<option>Oldest Listings</option>
							</select>
						</div>
					</div> -->
				</div>
			</div>
			<!-- Sorting / Layout Switcher / End -->


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


									<!-- <span><?=$row['address'];?></span> -->
									<!-- <div class="star-rating" data-rating="<?=$rating;?>">
										<div class="rating-counter">(<?=$this->common_model->count_records('ratings',$where);?> reviews)</div>
									</div> -->
									<!-- <div class="padding-top-5">
                                        <span><b>Vision :</b>
                                            <span class="more2"><?=$row['vision'];?></span>
                                        </span> 
                                    </div> -->
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


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-3 col-md-4">
			<div class="sidebar">

				<!-- Widget -->
				<div class="widget margin-bottom-40">
					<h3 class="margin-top-0 margin-bottom-30">Filters</h3>
<form action="<?=base_url('listings-list');?>" method="get">
					<!-- Row -->
					<div class="row with-forms">
						<!-- Cities -->
						<div class="col-md-12">
							<input type="text" placeholder="What are you looking for?" value="" name="keyword" />
						</div>
					</div>
					<!-- Row / End -->


					

					<!-- Row -->
					<div class="row with-forms">
						<!-- Cities -->
						<div class="col-md-12">

							<div class="input-with-icon location">
								<div id="autocomplete-container">
									<input id="pac-input" type="text" placeholder="Location" name="location">
								</div>
								<a href="#"><i class="fa fa-map-marker"></i></a>
							</div>

						</div>
					</div>
					<!-- Row / End -->
				
                    <!-- More Search Options -->
					<a href="#" class="more-search-options-trigger margin-bottom-5 margin-top-20" data-open-title="Boards" data-close-title="Boards" id="inpt-stl"></a>

					<div class="more-search-options relative ovrflw-x" >

						<!-- Checkboxes -->
						<div class="checkboxes one-in-row margin-bottom-15">
					<?php

$category=$this->common_model->select_results_info('curriculum',array('row_status'=>1))->result_array();
if($category!=''){
					$c=0;foreach ($category as $cat) {
	?>
							<input id="boards<?=$c;?>" type="checkbox" name="board[]" value="<?=$cat['id'];?>">
							<label for="boards<?=$c;?>"><?=$cat['name'];?></label>
<?php $c++;}}?>
					
						</div>
						<!-- Checkboxes / End -->

					</div>
					<!-- More Search Options / End -->
<!-- More Search Options -->
					<a href="#" class="more-search-options-trigger margin-bottom-5 margin-top-20" data-open-title="Medium" data-close-title="Medium" id="inpt-stl"></a>

					<div class="more-search-options relative ovrflw-x" >

						<!-- Checkboxes -->
						<div class="checkboxes one-in-row margin-bottom-15">
					<?php

$category=$this->common_model->select_results_info('medium',array('row_status'=>1))->result_array();
if($category!=''){
					$c=0;foreach ($category as $cat) {
	?>
							<input id="medium<?=$c;?>" type="checkbox" name="medium[]" value="<?=$cat['id'];?>">
							<label for="medium<?=$c;?>"><?=$cat['name'];?></label>
<?php $c++;}}?>
					
						</div>
						<!-- Checkboxes / End -->

					</div>
					<!-- More Search Options / End -->
                    <!-- More Search Options -->
					<a href="#" class="more-search-options-trigger margin-bottom-5 margin-top-20" data-open-title="Category" data-close-title="Category" id="inpt-stl"></a>

					<div class="more-search-options relative ovrflw-x" >

						<!-- Checkboxes -->
						<div class="checkboxes one-in-row margin-bottom-15">
					<?php

$category=$this->common_model->select_results_info('category',array('row_status'=>1))->result_array();
if($category!=''){
					$c=0;foreach ($category as $cat) {
	?>
							<input id="cate<?=$c;?>" type="checkbox" name="category[]" value="<?=$cat['id'];?>">
							<label for="cate<?=$c;?>"><?=$cat['name'];?></label>
<?php $c++;}}?>
					
						</div>
						<!-- Checkboxes / End -->

					</div>
					<!-- More Search Options / End -->

					

					<!-- More Search Options -->
					<a href="#" class="more-search-options-trigger margin-bottom-5 margin-top-20" data-open-title="Facilities" data-close-title="Facilities" id="inpt-stl"></a>

					<div class="more-search-options relative ovrflw-x"  >

						<!-- Checkboxes -->
						<div class="checkboxes one-in-row margin-bottom-15">
										<?php
$facilities=$this->common_model->select_results_info('facilities',array('row_status'=>1))->result_array();
if($facilities!=''){
					$c=0;foreach ($facilities as $fac) {
					
	?>
							<input id="face-<?=$c;?>" type="checkbox" name="facilities[]" value="<?=$fac['id'];?>">
							<label for="face-<?=$c;?>"><?=$fac['name'];?></label>
<?php $c++;}}?>
						</div>
						<!-- Checkboxes / End -->
					</div>

					<!-- More Search Options / End -->


					<button class="button fullwidth margin-top-25">Update</button>
</form>

				</div>
				<!-- Widget / End -->

			</div>
		</div>
		<!-- Sidebar / End -->
	</div>
</div>