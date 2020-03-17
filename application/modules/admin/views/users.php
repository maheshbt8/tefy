
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
                                  <th scope="col">Email</th>
                                  <th scope="col">Mobile</th>
                                  <th scope="col">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $i=0;
                                foreach ($users as $row) {
                                ?>
                                <?php
                if($row['row_status']==1){
                  $status=2;
                  $status_type='Inactive';
                }elseif($row['row_status']==2){
                  $status=1;
                  $status_type='Active';
                }
                ?>
                                <tr>
                                  <th scope="row"><?=$i+1;?></th>
                                  <td><?=$row['first_name'];?></td>
                                  <td><?=$row['email'];?></td>
                                  <td><?=$row['phone'];?></td>
                                    <td><!-- <a href="<?=base_url('set_row_status/').'category/id/'.$row['id'].'/0';?>" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'category/id/'.$row['id'].'/0';?>');"><i class="sl sl-icon-trash"></i></a> -->
                                      <a href="<?=base_url('set_row_status/users/id/').$row['id'].'/'.$status?>" class="button gray"><!-- <i class="sl sl-icon-close"></i> --><?=$status_type;?></a>
                                    </td>
                                </tr>
                            <?php $i++;}?>
                              </tbody>
             <tfoot>
            <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Mobile</th>
                                  <th scope="col">Actions</th>
                                </tr>
        </tfoot>
    </table>
    
    

</div>



							
                           
						</div>
                        
                        

					</div>
					
					

				</div>
			</div>

		</div>

</form>




<script>
/*call function*/
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>