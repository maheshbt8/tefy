
<?php $this->session->set_userdata('last_page',current_url());?>


<?php
$url=base_url('admin/users_says');
if(isset($_GET['users_says']) && $_GET['users_says'] != ''){
	$url=$url.'?users_says='.$_GET['users_says'];
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
							<!-- <h3><i class="sl sl-icon-doc"></i> Basic Informations</h3> -->
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-6">
								<h5>User Name</h5>
								<input class="search-field" type="text" value="<?=((!empty($e_data))? $e_data['name'] : set_value('name') );?>" name="name" required="" autocomplete="off" />
								<?php echo form_error('name', '<div class="error">', '</div>'); ?>
							</div>
							<div class="col-md-6">
								<h5>User Says Status</h5>
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
							<textarea type="text" class="form-control" name="desc" value="<?=((!empty($e_data))? $e_data['desc'] : set_value('desc') );?>" required=""><?=((!empty($e_data))? $e_data['desc'] : set_value('desc') );?></textarea>
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
                                  <th scope="col">Name</th>
                                  <th scope="col">Description</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                  	<?php
                  	$i=0;
                  	foreach ($users_says as $promo) {
                  	?>
                  		<tr>
                  			<td><?=$i+1;?></td>
                  			<td><?=$promo['name'];?></td>
                  			<td><?=$promo['desc'];?></td>
                  			<td><a href="<?=base_url('admin/users_says?users_says=').$promo['id'];?>" class="button gray"> Edit</a></td>
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




<script>
/*call function*/
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

