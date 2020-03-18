
<?php
$this->session->set_userdata('last_page',current_url());
?>
<div class="row">
			
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">

				<div class="dashboard-list-box margin-top-0">

					<!-- Sort by -->
					<div class="sort-by">
						<div class="sort-by-select">
							<select data-placeholder="Default order" class="chosen-select-no-single" onchange ="return get_data(this.value)">
								<option value="all">All Listings</option>	
								<?php
								foreach ($schools as $school) {
									?>
									<option value="<?=base64_encode(base64_encode($school['id']));?>" <?=(base64_encode(base64_encode($school['id'])) == $_GET['listing_id'])? 'selected' : '';?>><?=$school['school_name']?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>

					<h4>Visitor Reviews</h4> 

					<!-- Reply to review popup -->
					<!-- <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
						<div class="small-dialog-header">
							<h3>Reply to review</h3>
						</div>
						<div class="message-reply margin-top-0">
							<textarea cols="40" rows="3"></textarea>
							<button class="button">Reply</button>
						</div>
					</div> -->
				<div class="table-responsive">
<table class="table table-striped table-hover" id="tableExport">
        <thead>
            <tr>
                <th>Seq.</th>
                <th>User</th>
                <th>School</th>
                <th>Review</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php
$i=0;
foreach ($users_record as $res) {
?>
            <tr>
                <td><?=$i+1;?></td>
                <td><img src="<?=base_url().$this->common_model->get_image_url('users',$res['user_id'])?>" alt="" /><?=ucwords($this->common_model->get_type_name_by_where('users',array('id'=>$res['user_id']),'first_name'));?></td>
                <td><?=ucwords($this->common_model->get_type_name_by_where('listings',array('id'=>$res['listing_id']),'school_name'));?></td>
                <td><?=$res['review']?></td>
                <td><?=date('M d,Y',strtotime($res['created_at']));?></td>
                <td>
					<a href="<?=base_url('set_row_status/ratings/id/').$res['id'].'/0'?>" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
										
                </td>
            </tr>
        <?php $i++;}?>
        </tbody>
    </table>
</div>
				<!-- 	<ul>
<?php 
foreach ($users_record as $res) {
?>
						<li>
							<div class="comments listing-reviews">
								<ul>
									<li>
										<div class="avatar"><img src="<?=base_url().$this->common_model->get_image_url('users',$res['user_id'])?>" alt="" /></div>
										<div class="comment-content"><div class="arrow-comment"></div>
											<div class="comment-by"><?=ucwords($this->common_model->get_type_name_by_where('users',array('id'=>$res['user_id']),'first_name'));?> <div class="comment-by-listing">on <a href="#"><?=ucwords($this->common_model->get_type_name_by_where('listings',array('id'=>$res['listing_id']),'school_name'));?></a></div> <span class="date"><?=date('M Y',strtotime($res['created_at']))?></span>
												<div class="star-rating" data-rating="<?=$res['rating']?>"></div>
											</div>
											<p><?=$res['review']?></p>
											<div class="buttons-to-right">
											<a href="<?=base_url('set_row_status/ratings/id/').$res['id'].'/0'?>" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
										</div>
										</div>
									</li>
								</ul>
							</div>
						</li>
<?php }?>
					</ul> -->
				</div>

				<!-- Pagination -->
				<div class="clearfix"></div>
				<div class="pagination-container margin-top-30 margin-bottom-0">
					<!-- <nav class="pagination">
						<ul>
							<li><a href="#" class="current-page">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
						</ul>
					</nav> -->
					<?php
					//print_r($pagination);
					?>
				</div>
				<!-- Pagination / End -->

			</div>

			<!-- Listings -->
			<!-- <div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Your Reviews</h4>
					<ul>

						<li>
							<div class="comments listing-reviews">
								<ul>
									<li>
										<div class="avatar"><img src="images/reviews-avatar.jpg" alt="" /> </div>
										<div class="comment-content"><div class="arrow-comment"></div>
											<div class="comment-by">Your review <div class="comment-by-listing own-comment">on <a href="#">Tom's Restaurant</a></div> <span class="date">May 2019</span>
												<div class="star-rating" data-rating="4.5"></div>
											</div>
											<p>Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.</p>
											<a href="#" class="rate-review"><i class="sl sl-icon-note"></i> Edit</a>
										</div>

									</li>
								</ul>
							</div>
						</li>

						<li>
							<div class="comments listing-reviews">
								<ul>
									<li>
										<div class="avatar"><img src="images/reviews-avatar.jpg" alt="" /> </div>
										<div class="comment-content"><div class="arrow-comment"></div>
											<div class="comment-by">Your review <div class="comment-by-listing own-comment">on <a href="#">Think Coffee</a></div> <span class="date">May 2019</span>
												<div class="star-rating" data-rating="5"></div>
											</div>
											<p>Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.</p>
											<a href="#" class="rate-review"><i class="sl sl-icon-note"></i> Edit</a>
										</div>

									</li>
								</ul>
							</div>
						</li>

					</ul>
				</div>
			</div> -->


			<!-- Copyrights -->
			<!-- <div class="col-md-12">
				<div class="copyrights">© 2019 Listeo. All Rights Reserved.</div>
			</div> -->
		</div>

		<script type="text/javascript">
			function get_data(listing_id) {
				window.location.href = '<?=$this->session->userdata('last_page');?>?listing_id='+listing_id;
			}
		</script>