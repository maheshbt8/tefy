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
?>
				<!-- Listing Item -->
				<div class="col-lg-12 col-md-12">
					<div class="listing-item-container list-layout">
						<a href="<?=base_url('listings-single/').$row['id'];?>" class="listing-item">
							
							<!-- Image -->
							<div class="listing-item-image">
								<img src="<?=base_url('uploads/listings/thumb/').$row['id'].'.jpg';?>" alt="">
								<!--<span class="tag">Eat & Drink</span>-->
							</div>
							
							<!-- Content -->
							<div class="listing-item-content">
								<div class="listing-badge now-open">Now Open</div>

								<div class="listing-item-inner">
									<h3><?=$row['school_name'];?> <!-- <i class="verified-icon"></i> --></h3>
									<span><?=$row['address'];?></span>
									<div class="star-rating" data-rating="3.5">
										<div class="rating-counter">(12 reviews)</div>
									</div>
									<div class="padding-top-5"><span><b>Vision</b>: <?=$row['vision'];?></span> </div>
								</div>

								<span class="like-icon"></span>
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
<form action="<?=base_url('listings-list');?>" methor="get">
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
									<input id="autocomplete-input" type="text" placeholder="Location" name="location">
								</div>
								<a href="#"><i class="fa fa-map-marker"></i></a>
							</div>

						</div>
					</div>
					<!-- Row / End -->
				
                    
                    <!-- More Search Options -->
					<a href="#" class="more-search-options-trigger margin-bottom-5 margin-top-20" data-open-title="Category" data-close-title="Category" id="inpt-stl"></a>

					<div class="more-search-options relative ovrflw-x" style= "display:block;" >

						<!-- Checkboxes -->
						<div class="checkboxes one-in-row margin-bottom-15">
					<?php

$category=json_decode($row['category']);
if($category!=''){
					for ($c=0; $c < count($category); $c++) {
					
	?>
							<input id="check<?=$c;?>" type="checkbox" name="category[]" value="<?=$category[$c];?>">
							<label for="check<?=$c;?>"><?=$this->common_model->get_type_name_by_where('category',array('id'=>$category[$c]))?></label>
<?php }}?>
							<!-- <input id="check-b" type="checkbox" name="check">
							<label for="check-b">Friendly workspace</label>

							<input id="check-c" type="checkbox" name="check">
							<label for="check-c">Instant Book</label>

							<input id="check-d" type="checkbox" name="check">
							<label for="check-d">Wireless Internet</label>

							<input id="check-e" type="checkbox" name="check" >
							<label for="check-e">Free parking on premises</label>

							<input id="check-f" type="checkbox" name="check" >
							<label for="check-f">Free parking on street</label>

							<input id="check-g" type="checkbox" name="check">
							<label for="check-g">Smoking allowed</label>	

							<input id="check-h" type="checkbox" name="check">
							<label for="check-h">Events</label> -->
					
						</div>
						<!-- Checkboxes / End -->

					</div>
					<!-- More Search Options / End -->

					

					<!-- More Search Options -->
					<a href="#" class="more-search-options-trigger margin-bottom-5 margin-top-20" data-open-title="Facilities" data-close-title="Facilities" id="inpt-stl"></a>

					<div class="more-search-options relative ovrflw-x" style= "display:block;" >

						<!-- Checkboxes -->
						<div class="checkboxes one-in-row margin-bottom-15">
										<?php
$facilities=json_decode($row['amenities']);
if($facilities!=''){
					for ($c=0; $c < count($facilities); $c++) {
					
	?>
							<input id="check-<?=$c;?>" type="checkbox" name="facilities[]" value="<?=$facilities[$c];?>">
							<label for="check-<?=$c;?>"><?=$this->common_model->get_type_name_by_where('facilities',array('id'=>$facilities[$c]))?></label>
<?php }}?>
							<!-- <input id="check-a" type="checkbox" name="check">
							<label for="check-a">Elevator in building</label>

							<input id="check-b" type="checkbox" name="check">
							<label for="check-b">Friendly workspace</label>

							<input id="check-c" type="checkbox" name="check">
							<label for="check-c">Instant Book</label>

							<input id="check-d" type="checkbox" name="check">
							<label for="check-d">Wireless Internet</label>

							<input id="check-e" type="checkbox" name="check" >
							<label for="check-e">Free parking on premises</label>

							<input id="check-f" type="checkbox" name="check" >
							<label for="check-f">Free parking on street</label>

							<input id="check-g" type="checkbox" name="check">
							<label for="check-g">Smoking allowed</label>	

							<input id="check-h" type="checkbox" name="check">
							<label for="check-h">Events</label> -->
					
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