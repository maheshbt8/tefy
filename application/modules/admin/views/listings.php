
<?php
$this->session->set_userdata('last_page',current_url());
?>
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<div class="table-responsive">
<table class="table table-striped table-hover" id="tableExport">
        <thead>
            <tr>
                <th>Seq.</th>
                <th>School Name</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php
$i=0;
foreach ($schools as $row) {
	$where['listing_id']=$row['id'];
	$where['row_status']=1;
$rating=$this->common_model->rating_of_product('ratings', $where ,'rating');
if($rating==''){
  $rating=0;
}
?>
            <tr>
                <td><?=$i+1;?></td>
                <td><?=$row['school_name']?></td>
                <td><?=$row['address'];?></td>
                <td><?=date('M d,Y',strtotime($row['created_at']));?></td>
                <td><a href="<?=base_url('admin/edit_listing/').base64_encode(base64_encode($row['id']));?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
								<?php
								if($row['row_status']==1){
									$status=2;
									$status_type='Inactive';
								}elseif($row['row_status']==2){
									$status=1;
									$status_type='Active';
								}
								?>
								<a href="<?=base_url('set_row_status/listings/id/').$row['id'].'/'.$status?>" class="button gray"><!-- <i class="sl sl-icon-close"></i> --><?=$status_type;?></a></td>
            </tr>
        <?php $i++;}?>
        </tbody>
    </table>
</div>
	<!-- 				<ul>
<?php
$i=0;
foreach ($schools as $row) {
	$where['listing_id']=$row['id'];
	$where['row_status']=1;
$rating=$this->common_model->rating_of_product('ratings', $where ,'rating');
if($rating==''){
  $rating=0;
}
?>
						<li><a href="<?=base_url('listings-single/').base64_encode(base64_encode($row['id']));?>" target="_blank">
							<div class="list-box-listing">
								<div class="list-box-listing-img"><img src="<?=base_url('uploads/listings/thumb/').$row['id'].'.jpg';?>" alt=""></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3><?=$row['school_name'];?></h3>
										<span><?=$row['address'];?></span>
										<div class="star-rating" data-rating="<?=$rating;?>">
											<div class="rating-counter">(<?=$this->common_model->count_records('ratings',$where);?> reviews)</div>
										</div>
									</div>
								</div>
							</div></a>
							<div class="buttons-to-right">
								<a href="<?=base_url('admin/edit_listing/').base64_encode(base64_encode($row['id']));?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
								<?php
								if($row['row_status']==1){
									$status=2;
									$status_type='Inactive';
								}elseif($row['row_status']==2){
									$status=1;
									$status_type='Active';
								}
								?>
								<a href="<?=base_url('set_row_status/listings/id/').$row['id'].'/'.$status?>" class="button gray">
							</div>
						
						</li>
<?php }?>
					</ul> -->

					<!-- Pagination -->
			<!-- <div class="clearfix"></div> -->
			<!-- <div class="row">
				<div class="col-md-12">
					<div class="pagination-container margin-top-20 margin-bottom-40">
						<nav class="pagination">
							<?php echo $pagination; ?>
						</nav>
					</div>
				</div>
			</div> -->
				</div>
			</div>


