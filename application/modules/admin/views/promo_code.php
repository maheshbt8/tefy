
<?php $this->session->set_userdata('last_page',current_url());?>
<?php
$url=base_url('admin/promo_code');
if(isset($_GET['promo_code']) && $_GET['promo_code'] != ''){
	$url=$url.'?promo_code='.$_GET['promo_code'];
}
?>
<!--Category management-->
<form method="post" action="<?=$url;?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
<div class="row">
			<div class="col-lg-12">

				<div id="add-listing">

					<!--Basic Info Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-4">
								<h5>Promo Title</h5>
								<input class="search-field" type="text" value="<?=((!empty($e_data))? $e_data['promo_title'] : set_value('promo_title') );?>" name="promo_title" required="" autocomplete="off" />
								<?php echo form_error('promo_title', '<div class="error">', '</div>'); ?>
							</div>
							<div class="col-md-4">
								<h5>Promo Code</h5>
								<input class="search-field" type="text" value="<?=((!empty($e_data))? $e_data['promo_code'] : set_value('promo_code') );?>" name="promo_code" required="" autocomplete="off" />
								<?php echo form_error('promo_code', '<div class="error">', '</div>'); ?>
							</div>
							<div class="col-md-4">
								<h5>Promo Type</h5>
								<select class="search-field" name="promo_type" required="" onchange="return promo_to_check(this.value)">
									<option value="1" <?=((set_value('promo_type')==1 || (!empty($e_data) && $e_data['promo_type']==1))? 'selected' : '');?>>Tefy</option>
									<option value="2" <?=((set_value('promo_type')==2 || (!empty($e_data) && $e_data['promo_type']==2))? 'selected' : '');?>>All Schools</option>
									<option value="3" <?=((set_value('promo_type')==3 || (!empty($e_data) && $e_data['promo_type']==3))? 'selected' : '');?>>Few Schools</option>
								</select>
								<?php echo form_error('promo_type', '<div class="error">', '</div>'); ?>
							</div>
						</div>
						<div class="row with-forms">
							<div class="col-md-6" id="schools_list">
								<h5>School</h5>
								<select class="form-control chosen-select-no-single" name="school[]" required=""  multiple="">
									<?php
									$schools=$this->common_model->select_results_info('listings',array('row_status'=>1))->result_array();
									foreach ($schools as $school) {
									?>
									<option value="<?=$school['id'];?>" <?=((set_value('school[]')== $school['id'])? 'selected' : '');?>><?=$school['school_name'];?></option>
								<?php }?>
								</select>								<?php echo form_error('title', '<div class="error">', '</div>'); ?>
							</div>
							<div class="col-md-6" id="classes_list">
								<h5>Class</h5>
								<select class="form-control chosen-select-no-single" name="class[]" required=""  multiple="">
									<?php
									$classes=$this->common_model->select_results_info('classes',array('row_status'=>1))->result_array();
									foreach ($classes as $class) {
									?>
									<option value="<?=$class['id'];?>" <?=((set_value('class[]')== $class['id'])? 'selected' : '');?>><?=$class['name'];?></option>
								<?php }?>
								</select>								<?php echo form_error('class[]', '<div class="error">', '</div>'); ?>
							</div>
							<div class="col-md-6">
								<h5>Valid Date</h5>
								<input class="search-field"  placeholder="From - To" id="booking-date-search" value="<?=((!empty($e_data))? $e_data['valid_from'] : set_value('date') );?>" name="date" required="" autocomplete="off" />
								<?php echo form_error('date', '<div class="error">', '</div>'); ?>
							</div>
							<div class="col-md-6">
								<h5>Promo Label</h5>
								<input class="search-field"  placeholder="Promo Label" value="<?=((!empty($e_data))? $e_data['promo_label'] : set_value('promo_label') );?>" name="promo_label" required="" autocomplete="off" />
								<?php echo form_error('promo_label', '<div class="error">', '</div>'); ?>
							</div>
							<div class="col-md-4">
								<h5>Discount Type</h5>
								<select class="search-field" name="discount_type" required="">
									<option value="1" <?=((set_value('discount_type')==1 || (!empty($e_data) && $e_data['discount_type']==1))? 'selected' : '');?>>Amount</option>
									<option value="2" <?=((set_value('discount_type')==2 || (!empty($e_data) && $e_data['discount_type']==2))? 'selected' : '');?>>Percentage</option>
								</select>
								<?php echo form_error('discount_type', '<div class="error">', '</div>'); ?>
							</div>
							<div class="col-md-4">
								<h5>Discount</h5>
								<input class="search-field"  placeholder="Discount" value="<?=((!empty($e_data))? $e_data['discount'] : set_value('discount') );?>" name="discount" required="" autocomplete="off" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" />
								<?php echo form_error('discount', '<div class="error">', '</div>'); ?>
							</div>
							<div class="col-md-4">
								<h5>Promo Status</h5>
								<select class="search-field" name="row_status" required="">
									<option value="1" <?=((set_value('row_status')==1 || (!empty($e_data) && $e_data['row_status']==1))? 'selected' : '');?>>Active</option>
									<option value="2" <?=((set_value('row_status')==2 || (!empty($e_data) && $e_data['row_status']==2))? 'selected' : '');?>>Inactive</option>
								</select>
								<?php echo form_error('row_status', '<div class="error">', '</div>'); ?>
							</div>
						</div>
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Description</h5>
							<textarea type="text" class="form-control" name="desc" value="<?=set_value('desc');?>" required=""><?=((!empty($e_data))? $e_data['desc'] : set_value('desc') );?></textarea>
							<?php echo form_error('desc', '<div class="error">', '</div>'); ?>
							</div>
						</div>
                        

                        
<button type="submit" class="button preview">Submit</button>
					</div>
					<!-- Admission Procedure Section / End -->
                    
                    
					

				</div>
			</div>

		</div>

</form>

<!-- <script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/ckeditor/ckeditor.js"></script> 


<script>
    CKEDITOR.replace('desc');
</script>
<br/><br/> -->
<div class="clearfix"></div>

<div class="row">
			<div class="col-lg-12">

				<div id="add-listing">

					<!-- Section -->
					<div class="add-listing-section">
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> List of All Users</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
              <div class="">
    
        <table class="table table-striped table-hover" id="tableExport" style="width:100%">
        <thead class="thead-dark">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Code</th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Validity Date</th>
                                  <th scope="col">Label</th>
                                  <th scope="col">Discount</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                  	<?php
                  	$i=0;
                  	foreach ($promos as $promo) {
                  	?>
                  		<tr>
                  			<td><?=$i+1;?></td>
                  			<td><?=$promo['promo_title'];?></td>
                  			<td><?=$promo['promo_code'];?></td>
                  			<td><?=$promo['promo_type'];?></td>
                  			<td><?=$promo['valid_from'].' to '.$promo['valid_to'];?></td>
                  			<td><?=$promo['promo_label'];?></td>
                  			<td><?=$promo['discount'];?></td>
                  			<td><a href="<?=base_url('admin/promo_code?promo_code=').$promo['id'];?>" class="button gray"> Edit</a></td>
                  		</tr>
                  <?php $i++;}?>
                              </tbody>
             <tfoot>
           <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Code</th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Validity Date</th>
                                  <th scope="col">Label</th>
                                  <th scope="col">Discount</th>
                                  <th scope="col">Action</th>
                                </tr>
        </tfoot>
    </table>
    
    

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

