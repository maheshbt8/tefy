<!-- Content -->
		<div class="row">

			<!-- Item -->
			<div class="col-lg-6 col-md-6">
				<div class="dashboard-stat color-1">
					<div class="dashboard-stat-content"><h4><?=$this->common_model->count_records('listings',array('row_status'=>1));?></h4> <span>Active Listings</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Map2"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-6 col-md-6">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4><?=$this->common_model->count_records('users_groups',array('group_id'=>2));?></h4> <span>Users</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Line-Chart"></i></div>
				</div>
			</div>

			
			<!-- Item -->
			<!--<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4>95</h4> <span>Total Reviews</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Add-UserStar"></i></div>
				</div>
			</div>-->

			<!-- Item -->
			<!--<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-4">
					<div class="dashboard-stat-content"><h4>126</h4> <span>Times Bookmarked</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Heart"></i></div>
				</div>
			</div>-->
		</div>


		<div class="row">
			
			<!-- Recent Activity -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box with-icons margin-top-20">
					<h4>Recent Activities</h4>
					<ul>
						<li>
							<i class="list-box-icon sl sl-icon-layers"></i> Your listing <strong><a href="#">Hotel Govendor</a></strong> has been approved!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon sl sl-icon-star"></i> Kathy Brown left a review <div class="numerical-rating" data-rating="5.0"></div> on <strong><a href="#">Burger House</a></strong>
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon sl sl-icon-heart"></i> Someone bookmarked your <strong><a href="#">Burger House</a></strong> listing!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon sl sl-icon-star"></i> Kathy Brown left a review <div class="numerical-rating" data-rating="3.0"></div> on <strong><a href="#">Airport</a></strong>
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon sl sl-icon-heart"></i> Someone bookmarked your <strong><a href="#">Burger House</a></strong> listing!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon sl sl-icon-star"></i> John Doe left a review <div class="numerical-rating" data-rating="4.0"></div> on <strong><a href="#">Burger House</a></strong>
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon sl sl-icon-star"></i> Jack Perry left a review <div class="numerical-rating" data-rating="2.5"></div> on <strong><a href="#">Tom's Restaurant</a></strong>
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>
					</ul>
				</div>
			</div>
			
			<!-- Invoices -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box invoices with-icons margin-top-20">
					<h4>Recently Added Schools</h4>
					<ul>
						
						<?php
						$res=$this->common_model->select_results_info('listings',array('row_status'=>1),'id DESC',5)->result_array();
					foreach ($res as $row) {
						?>
						<li><i class="list-box-icon sl sl-icon-doc"></i>
							<strong><?=$row['school_name'];?></strong>
							<ul>
								<!--<li class="unpaid">Unpaid</li>-->
								<li>ID: <?=$row['school_code'];?></li>
								<li>Date: <?=date('M d,Y',strtotime($row['created_at']));?></li>
							</ul>
							<div class="buttons-to-right">
								<a href="<?=base_url('listings-single/').base64_encode(base64_encode($row['id']));?>" class="button gray" target="_blank">View Profile</a>
							</div>
						</li>
					<?php }?>
						
					</ul>
				</div>
			</div>

