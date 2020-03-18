<?php 
if($_GET['sd']!='' && $_GET['ed']!='' && $_GET['admission_status']!=''){
    $this->session->set_userdata('last_page', current_url().'?sd='.$_GET['sd'].'&ed='.$_GET['ed'].'&admission_status='.$_GET['admission_status']);
        }elseif($_GET['sd']!='' && $_GET['ed']!='' && $_GET['admission_status']==''){
    $this->session->set_userdata('last_page', current_url().'?sd='.$_GET['sd'].'&ed='.$_GET['ed']);
        }elseif($_GET['sd']=='' && $_GET['ed']=='' && $_GET['admission_status']!=''){
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
        }
        /*'created_at>='=>$currmonth.' 00:00:00','created_at<='=>$currmonth.' 23:59:59'*/
        if($sd != '0NaN-NaN-NaN' && $ed != '0NaN-NaN-NaN'){
$where=array('created_at >='=>$sd.' 00:00:00','created_at <='=>$ed.' 23:59:59','admission_status'=>$admission_status,'row_status'=>'1');
}else{
$where=array('admission_status'=>$admission_status,'row_status'=>'1');
}
            $admissions=$this->common_model->select_results_info('admissions',$where)->result_array();
          //  echo $this->db->last_query();
//print_r($admissions);die;
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
								<select data-placeholder="Default order" class="chosen-select-no-single"  onchange="return get_admission_data(this.value)">
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
						<div id="booking-date-range">
						    <span></span>
						</div>
					</div>

					<!-- Reply to review popup -->
					<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
						<div class="small-dialog-header">
							<h3>Send Message</h3>
						</div>
						<div class="message-reply margin-top-0">
							<textarea cols="40" rows="3" placeholder="Your Message to Kathy"></textarea>
							<button class="button">Send</button>
						</div>
					</div>

					<h4></h4>
					<div class="row">
			<div class="col-lg-12">

				<div id="add-listing">

					<!-- Section -->
					<div class="add-listing-section">
						<!-- Headline -->
						<div class="add-listing-headline">
<a href="<?=base_url('admin/export_list_data');?>" class="btn btn-success pull-right">Export Data</a>
						</div>

						<!-- Title -->
						<div class="row with-forms">
              <div class="">
    
        <table  class="table table-striped table-hover" id="tableExport" style="width:100%">
        <thead class="thead-dark">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Application ID</th>
                                  <th scope="col">User ID</th>
                                  <th scope="col">School</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Created At</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                  	<?php
                  	//$admissions=array();
                  	$i=0;
                  	foreach ($admissions as $promo) {
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
                        //$admission_btn='<a onclick="return admission_action_check('.$promo['id'].',4,&quot;Are You Sure Want To Change: Application Fee Payment &quot;)" class="btn btn-sm btn-success">Fee Payment</a>';
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
                  			<td><?=$this->common_model->get_type_name_by_where('users',array('id'=>$promo['user_id']),'first_name');?></td>
                  			<td><?=$this->common_model->get_type_name_by_where('listings',array('id'=>$promo['school_id']),'school_name');?></td>
                  			<td><?=$r_admission_status;?></td>
                  			<td><?=$promo['created_at'];?></td>
                  			<td>
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
                        </td>
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




<script>
/*call function*/
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

