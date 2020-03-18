<?php $this->session->set_userdata('last_page',current_url());?>
<!--Category management-->

<form  class="form-horizontal" id="category-form" action="<?=base_url('admin/categories');?>" method="post" enctype="multipart/form-data">
<div class="row">
			<div class="col-lg-12">

				<div id="add-listing">

					<!-- Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Category Management</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-10">
								<h5>Add Category<i class="tip" data-tip-content="Add a new class here"></i></h5>
								<input class="search-field" type="text" value="" name="category" required=""/>
							</div>
                            <div class="col-md-2">
								
								<button type="submit" class="button preview">Submit</button>
							</div>
						</div>
                        
                        
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> List of All Categories</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12 table-responsive">
                                <table class="table table-striped table-hover" id="tableExport">
                                <thead class="thead-dark">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Category name</th>
                                  <th scope="col">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                              	<?php
                              	$res=$this->common_model->select_results_info('category',array('row_status !='=>0),"'id','DESC'")->result_array();
                              	$i=0;
                              	foreach ($res as $row) {
                              	?>
                                <tr>
                                  <th scope="row"><?=$i+1;?></th>
                                  <td><?=$row['name'];?></td>
                                    <td><a href="<?=base_url('set_row_status/').'category/id/'.$row['id'].'/0';?>" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'category/id/'.$row['id'].'/0';?>');"><i class="sl sl-icon-trash"></i></a>
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