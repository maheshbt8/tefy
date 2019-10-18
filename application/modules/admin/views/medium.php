<?php $this->session->set_userdata('last_page',current_url());?>
<!--Medium management-->

<form  class="form-horizontal" id="medium-form" action="<?=base_url('admin/medium');?>" method="post" enctype="multipart/form-data">
<div class="row">
			<div class="col-lg-12">

				<div id="add-listing">

					<!-- Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Medium Management</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-10">
								<h5>Add Medium<i class="tip" data-tip-content="Add a new class here"></i></h5>
								<input class="search-field" type="text" value="" name="medium" required=""/>
							</div>
                            <div class="col-md-2">
								
								<button type="submit" class="button preview">Submit</button>
							</div>
						</div>
                        
                        
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> List of All Mediums</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
                                <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Medium name</th>
                                  <th scope="col">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                              	<?php
                              	$res=$this->common_model->select_results_info('medium',array('row_status !='=>0),"'id','DESC'")->result_array();
                              	$i=0;
                              	foreach ($res as $row) {
                              	?>
                                <tr>
                                  <th scope="row"><?=$i+1;?></th>
                                  <td><?=$row['name'];?></td>
                                    <td><a href="<?=base_url('set_row_status/').'medium/id/'.$row['id'].'/0';?>" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'medium/id/'.$row['id'].'/0';?>');"><i class="sl sl-icon-trash"></i></a>
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