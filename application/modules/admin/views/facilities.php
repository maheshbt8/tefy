<?php $this->session->set_userdata('last_page',current_url());?>
<!--facility management-->

<form  class="form-horizontal" id="facility-form" action="<?=base_url('admin/facilities');?>" method="post" enctype="multipart/form-data">
<div class="row">
			<div class="col-lg-12">

				<div id="add-listing">

					<!-- Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Facility Management</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-6">
								<h5>Add Facility<i class="tip" data-tip-content="Add a new Facility here"></i></h5>
								<input class="search-field" type="text" value="" name="facilities_name" required=""/>
							</div>
                            <div class="col-md-4">
								<h5>Add Icon</h5>
								 <input type="file" class="form-control-file" name="facilities" required="">
							</div>
                            <div class="col-md-2">
								
								<button type="submit" class="button preview">Submit</button>
							</div>
						</div>
                        
                        
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> List of All Facilities</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
                                <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Facility name</th>
                                  <th scope="col">icon</th>
                                  <th scope="col">Actions</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                              	<?php
                              	$res=$this->common_model->select_results_info('facilities',array('row_status !='=>0),"'id','DESC'")->result_array();
                              	$i=0;
                              	foreach ($res as $row) {
                              	?>
                                <tr>
                                  <th scope="row"><?=$i+1;?></th>
                                  <td><?=$row['name'];?></td>
                                  <td><img src="<?=base_url('uploads/facilities/').$row['id'].'.'.$row['file_ext'];?>" height="40"/></td>
                                    <td><a href="<?=base_url('set_row_status/').'facilities/id/'.$row['id'].'/0';?>" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'facilities/id/'.$row['id'].'/0';?>');"><i class="sl sl-icon-trash"></i></a>
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

</form>