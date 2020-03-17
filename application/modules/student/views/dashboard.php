<!-- Content -->
		<div class="row">

			<!-- Item -->
			<div class="col-lg-6 col-md-6">
				<a href="<?=base_url('student/bookmarks');?>"><div class="dashboard-stat color-1">
					<div class="dashboard-stat-content"><h4><?=$this->common_model->count_records('bookmarks',array('row_status'=>1,'user_id'=>$this->session->userdata('user_id')));?></h4> <span>Bookmarks</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Map2"></i></div>
				</div></a>
			</div>

			<!-- Item -->
			<div class="col-lg-6 col-md-6">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4><?=$this->common_model->get_type_name_by_where('users',array('id'=>$this->session->userdata('user_id')),'walet_amount');?></h4> <span>Wallet</span></div>
					<div class="dashboard-stat-icon"><i class="list-box-icon sl sl-icon-wallet"></i></div>
				</div>
			</div>

			
			<!-- Item -->
			<div class="col-lg-6 col-md-6">
                <a href="<?=base_url('student/admissions');?>">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4><?=$this->common_model->count_records('admissions',array('row_status'=>1,'admission_status !='=>0,'user_id'=>$this->session->userdata('user_id')));?></h4> <span>Admission Status</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Add-UserStar"></i></div>
				</div>
                </a>
			</div>

			<!-- Item -->
			<div class="col-lg-6 col-md-6">
				<div class="dashboard-stat color-4">
					<div class="dashboard-stat-content"><h4></h4> <span>Refer & Earn</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Heart"></i></div>
				</div>
			</div>
		</div>
        
    



