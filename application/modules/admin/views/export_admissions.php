<?php 
if($_GET['sd']!='' && $_GET['ed']!='' && $_GET['admission_status']!='' && $_GET['school']!=''){
    $this->session->set_userdata('last_page', current_url().'?sd='.$_GET['sd'].'&ed='.$_GET['ed'].'&admission_status='.$_GET['admission_status'].'&school='.$_GET['school']);
        }elseif($_GET['sd']!='' && $_GET['ed']!='' && $_GET['admission_status']=='' && $_GET['school']!=''){
    $this->session->set_userdata('last_page', current_url().'?sd='.$_GET['sd'].'&ed='.$_GET['ed'].'&school='.$_GET['school']);
        }elseif($_GET['sd']!='' && $_GET['ed']!='' && $_GET['admission_status']!='' && $_GET['school']==''){
          $this->session->set_userdata('last_page', current_url().'?sd='.$_GET['sd'].'&ed='.$_GET['ed'].'&admission_status='.$_GET['admission_status']);
        }elseif($_GET['sd']!='' && $_GET['ed']!='' && $_GET['admission_status']=='' && $_GET['school']==''){
          $this->session->set_userdata('last_page', current_url().'?sd='.$_GET['sd'].'&ed='.$_GET['ed']);
        }elseif($_GET['sd']=='' && $_GET['ed']=='' && $_GET['admission_status']=='' && $_GET['school']!=''){
    $this->session->set_userdata('last_page', current_url().'?school='.$_GET['school']);
        }elseif($_GET['sd']=='' && $_GET['ed']=='' && $_GET['admission_status']!='' && $_GET['schools']==''){
    $this->session->set_userdata('last_page', current_url().'?admission_status='.$_GET['admission_status']);
        }else{$this->session->set_userdata('last_page', current_url());}
?>
   <?php
if(($_GET['sd']!='' && $_GET['ed']!='' && $_GET['status_id']!='') || ($_GET['sd']!='' && $_GET['ed']!='' && $_GET['status_id']=='') || ($_GET['sd']=='' && $_GET['ed']=='' && $_GET['status_id']!='')){
			$sd=$_GET['sd'];
            $ed=$_GET['ed'];
            $admission_status=$_GET['admission_status'];
        }else{
            $sd=date('Y-m-d', strtotime('-29 days'));
            $ed=date('Y-m-d', strtotime('+0 days'));
            $admission_status='1';
            $school='';
        }
        /*'created_at>='=>$currmonth.' 00:00:00','created_at<='=>$currmonth.' 23:59:59'*/
        if($sd != '0NaN-NaN-NaN' && $ed != '0NaN-NaN-NaN'){
          if($school != ''){
$where=array('created_at >='=>$sd.' 00:00:00','created_at <='=>$ed.' 23:59:59','admission_status'=>$admission_status,'school_id'=>$school,'row_status'=>'1');
}else{
  $where=array('created_at >='=>$sd.' 00:00:00','created_at <='=>$ed.' 23:59:59','admission_status'=>$admission_status,'row_status'=>'1');
}
}elseif($school!=''){
$where=array('school_id'=>$school,'row_status'=>'1');
}else{
$where=array('admission_status'=>$admission_status,'row_status'=>'1');
}
            $admissions=$this->common_model->select_results_info('admissions',$where)->result_array();
          //  echo $this->db->last_query();
//print_r($admissions);die;
            ?>
            <?php
            $admissions=$this->admin_model->get_school_list($_GET['admission_status'],$_GET['sd'],$_GET['ed'],$_GET['school']);
            ?>
		<div class="row">
			
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					
					<!-- Booking Requests Filters  -->
					<div class="booking-requests-filter">
<!-- Sort by -->
            <div class="sort-by">
              <div class="sort-by-select">
                <select data-placeholder="Default order" class="chosen-select-no-single"  onchange="return get_admission_exp_data(this.value)">
                  <option value="">All Schools</option>
                  <?php
                  $schools=$this->common_model->select_results_info('listings',array('row_status'=>1))->result_array();
                  foreach ($schools as $sch) {
                    ?>
                  <option value="<?=$sch['id'];?>" <?=(($sch['id']==1)? 'selected' : '')?>><?=$sch['school_name'];?></option>  
                    <?php
                  }
                  ?>
                </select>
              </div>
            </div>
						<!-- Sort by -->
						<div class="sort-by">
							<div class="sort-by-select">
								<select data-placeholder="Default order" class="chosen-select-no-single"  onchange="return get_admission_exp_data(this.value)">
									<option value="1" <?=(($admission_status==1)? 'selected' : '')?>>Application Submitted</option>
									<option value="2" <?=(($admission_status==2)? 'selected' : '')?>>Application is being reviewed</option>
									<option value="3" <?=(($admission_status==3)? 'selected' : '')?>>Admission Approved</option>
									<option value="4" <?=(($admission_status==4)? 'selected' : '')?>>Admission Fee Payment</option>
									<option value="5" <?=(($admission_status==5)? 'selected' : '')?>>Admission Confirmation</option>
									<option value="6" <?=(($admission_status==6)? 'selected' : '')?>>Admission Canceled</option>	
								</select>
							</div>
						</div>
						<!-- <input type="text" name="" id="booking-date-range"> -->
						<!-- Date Range -->
						<div id="exp-date-range">
						    <span></span>
						</div>
            <!-- <a onclick="printDiv('ext_file')" value="Print" class="button gray pull-right">Print</a> -->
					</div>

					<h4></h4>
					<div class="row">
			<div class="col-lg-12">

				<div id="add-listing">

					<!-- Section -->
					<div class="add-listing-section">
						<!-- Headline -->
					

						<!-- Title -->
						<div class="row with-forms">
              <div class="table-responsive" id="ext_file">
    
        <table id="tableExport" class="table table-striped table-hover" style="width:100%">
        <thead class="thead-dark">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Application ID</th>
                                  <th scope="col">Applied User Name (Relation)</th>
                                  <th scope="col">School</th>
                                  <th scope="col">Student Name</th>
                                  <th scope="col">Father Name</th>
                                  <th scope="col">Mother Name</th>
                                  <th scope="col">Applying Class</th>
                                  <th scope="col">Medium</th>
                                  <th scope="col">Category</th>
                                  <th scope="col">Date Of Birth</th>
                                  <th scope="col">Gender</th>
                                  <th scope="col">Address</th>
                                  <th scope="col">Contact Number</th>
                                  <th scope="col">Previous School</th>
                                  <th scope="col">Previous Class</th>
                                  <th scope="col">Activities</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Created At</th>
                                  <!-- <th scope="col">Action</th> -->
                                </tr>
                              </thead>
                              <tbody>
                  	<?php
                  	//$admissions=array();
                  	$i=0;
                  	foreach ($admissions as $promo) {
                      $child=$this->common_model->select_results_info('childs',array('id'=>$promo['child_id']))->row_array();
$school=$this->common_model->select_results_info('listings',array('id'=>$promo['school_id']))->row_array();
                      $r_admission_status='';
                      $r_admission_next='';
                      $admission_btn='';
                      if($promo['admission_status']==1){
                        $r_admission_status='Application Submitted';
                        $r_admission_next=2;
                        $admission_btn='<a onclick="return admission_action_check('.$promo['id'].',2,&quot;Are You Sure Want To Change: Application is being reviewed &quot;)"  class="button gray pull-right">Accept</a>';
                      }elseif($promo['admission_status']==2){
                        $r_admission_status='Application is being reviewed';
                        $r_admission_next=3;
                        $admission_btn='<a onclick="return admission_action_check('.$promo['id'].',3,&quot;Are You Sure Want To Change: Application Approved &quot;)"  class="button gray pull-right">Approved</a>';
                      }elseif($promo['admission_status']==3){
                        $r_admission_status='Admission Approved';
                        $r_admission_next=4;
                      }elseif($promo['admission_status']==4){
                        $r_admission_status='Admission Fee Payment';
                        $r_admission_next=5;
                        $admission_btn='<a onclick="return admission_action_check('.$promo['id'].',5,&quot;Are You Sure Want To Change: Application Confirmation &quot;)" class="button gray pull-right">Admission Confirm</a>';
                      }elseif($promo['admission_status']==5){
                        $r_admission_status='Admission Confirmed';
                      }elseif($promo['admission_status']==6){
                        $r_admission_status='Admission Canceled';
                      }

                  	?>
                  		<tr>
                  			<td><?=$i+1;?></td>
                  			<td><?=$promo['application_id'];?></td>
                  			<td><?=$this->common_model->get_type_name_by_where('users',array('id'=>$promo['user_id']),'first_name');?> (<?=$child['relation'];?>)</td>
                  			<td><?=$school['school_name'];?></td>
                        <td><?=$child['name'];?></td>
                        <td><?=$child['father'];?></td>
                        <td><?=$child['mother'];?></td>
                        <td><?=$this->common_model->get_type_name_by_where('classes',array('id'=>$promo['class']),'name');?></td>
                        <td><?=$this->common_model->get_type_name_by_where('medium',array('id'=>$promo['medium']),'name');?></td>
                        <td><?=$this->common_model->get_type_name_by_where('category',array('id'=>$promo['category']),'name');?></td>
                        <td><?=$child['dob'];?></td>
                        <td><?=$child['gender'];?></td>
                        <td><?=$child['address'];?></td>
                        <td><?=$child['c_number'];?></td>
                        <td><?=$child['previous_school'];?></td>
                        <td><?=$this->common_model->get_type_name_by_where('classes',array('id'=>$child['previous_class']),'name');?></td>
                        <td><?=$child['activities'];?></td>
                  			<td><?=$r_admission_status;?></td>
                  			<td><?=$promo['created_at'];?></td>
                  			<!-- <td>
                          <a href="<?=base_url('admin/admission_form_view/').$promo['id'];?>" class="button gray pull-right" target="_blank"><i class="sl sl-icon-note"></i> View</a>
                          
                          <?php
                          if($promo['admission_status']==1 || $promo['admission_status']==2 || $promo['admission_status']==3){
                          ?>
                          <a onclick="return cancel_admission('<?=$promo['id'];?>')"  class="button gray pull-right">Cancel</a>
                        <?php }?>
                          <?php
                          if($admission_btn!=''){
                            echo $admission_btn;
                          }
                          ?>
                        </td> -->
                  		</tr>
                  <?php $i++;}?>
                              </tbody>
    </table>
    
    

</div>



							
                           
						</div>
                        
                        

					</div>
					
					

				</div>
			</div>

		</div>
				</div>
			</div>
		</div>


<!-- <script type="text/javascript">
   function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
</script> -->