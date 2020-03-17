<script type="text/javascript">
        <?php if ($this->ion_auth->is_student()){?>
        	/*alert('To Add Students You Need To Verify Your Phone Number!');*/
           var phone='<?=$this->common_model->get_type_name_by_where('users',array('id'=>$this->session->userdata('user_id')),'active_phone');?>';

           if('<?=$content;?>' !='profile' && phone == 0){
            window.location.replace('<?=base_url('student/profile')?>');
           }
<?php }?>
           
       </script>
<style>
    .d--inline{
        display: inline!important;
    }

</style>
<?php
$this->session->set_userdata('last_page',current_url());
?>
<div class="row">

			<!-- Profile -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Student Profiles</h4>
					<div class="dashboard-list-box-static">
					<table class="table table-striped table-hover"> <!--id="tableExport"-->
                        <thead>
                          <tr>
                            <th>Student Name</th>
                            <th>Father Name</th>
                            <th>Mother Name</th>
                            <th>Relation</th>
                            <th>Contact Number</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($childs as $ch) {
                            ?>
                          <tr>
                            <td><?=$ch['name'];?></td>
                            <td><?=$ch['father'];?></td>
                            <td><?=$ch['mother'];?></td>
                            <td><?=ucwords($ch['relation']);?></td>
                            <td><?=$ch['c_number'];?></td>
                            <td><a href="<?=base_url('student/childs?child=').base64_encode(base64_encode($ch['id']));?>">Edit</a></td>
                          </tr>
                      <?php }?>
                        </tbody>
                      </table>
					</div>
				</div>
			</div>
</div>
<br/>
<div class="row">
<?php if($child ==''){?>
<button class="add-stu" onclick="return show_form();">Add Student Profile</button>
<?php }?>
</div>
	<div class="row" id="student-form" style="display: none">
				<!-- Change Password -->
				<div class="col-lg-12 col-md-12">
					<div class="dashboard-list-box margin-top-0">
						<h4 class="gray"><?php if(isset($child) && $child !=''){echo 'Edit Student Profile';}else{echo 'Add Student Profile';}?></h4>
						<div class="dashboard-list-box-static">
	<form id="form" action="<?=base_url('student/childs')?>" class="form-horizontal" novalidate="novalidate" method="post">
							<!-- Change Password -->
							<div class="my-profile">
								<div class="row with-forms">

								<!-- Vision -->
								<div class="col-md-12">
									<div class="col-md-4">
								<label>Student Name</label>
								<input type="text" name="name" class="form-control" placeholder="Name " required="" value="<?=(isset($child) && $child['name']!='')? $child['name'] : '';?>">
								<input type="hidden" name="child_id" class="form-control" value="<?=(isset($child) && $child['id']!='')? $child['id'] : '';?>">
	                             <?php echo form_error('name', '<div class="error">', '</div>'); ?>
	                         		</div>
	                         		<div class="col-md-4">
								<label>Father's Name</label>
								<input type="text" name="father" class="form-control" placeholder="Father Name" value="<?=(isset($child) && $child['father']!='')? $child['father'] : '';?>" required="">
	                             <?php echo form_error('father', '<div class="error">', '</div>'); ?>
	                             	</div>
	                             	<div class="col-md-4">
								<label>Mother Name</label>
								<input type="text" name="mother" class="form-control" placeholder="Mother Name" required="" value="<?=(isset($child) && $child['mother']!='')? $child['mother'] : '';?>">
	                             <?php echo form_error('mother', '<div class="error">', '</div>'); ?>
	                             	</div>
	                             </div>
						<div class="col-md-12">
								<!-- Vision -->
								<div class="col-md-4">
									<label>Gender</label>
	                                <div class="col-md-6">
	                                    <label><input class="d--inline" type="radio"  name="gender" value="Male" required="" <?=(isset($child) && $child['gender']=='Male')? 'checked' : '';?>> Male</label>
	                                </div>
	                                <div class="col-md-6">
	                                    <label><input class="d--inline" type="radio"  name="gender" value="Female" required="" <?=(isset($child) && $child['gender']=='Female')? 'checked' : '';?>> Female</label>
	                                </div>
	                                <?php echo form_error('gender', '<div class="error">', '</div>'); ?>
	                                <label class="error" for="gender"></label>
								</div>
								
								<div class="col-md-4">
	                            <label>Date Of Birth</label>
								<input type="date" name="dob" class="form-control" placeholder="Date Of Birth" required="" value="<?=(isset($child) && $child['dob']!='')? $child['dob'] : '';?>">
	                             <?php echo form_error('dob', '<div class="error">', '</div>'); ?>
	                         	</div>
	                         	<div class="col-md-4">
	                         		<label>Contact Number</label>
								<input type="text" name="c_number" class="form-control" placeholder="Contact Number" required="" value="<?=(isset($child) && $child['c_number']!='')? $child['c_number'] : '';?>">
	                             <?php echo form_error('c_number', '<div class="error">', '</div>'); ?>
	                         	</div>
	                         </div>
	                         <div class="col-md-12">
	                         	<div class="col-md-4">
	                             <label>Previous School</label>
								<input type="text" name="previous_school" class="form-control" placeholder="Previous School" required="" value="<?=(isset($child) && $child['previous_school']!='')? $child['previous_school'] : '';?>">
	                             <?php echo form_error('previous_school', '<div class="error">', '</div>'); ?>
	                         	</div>
	                         	<div class="col-md-4">
	                             <label>Previous_class</label>
								<select name="previous_class" class="form-control" required="">
									<?php 
									foreach ($classes as $class) {
									?>
									<option value="<?=$class['id'];?>" <?=(isset($child) && $child['previous_class']==$class['id'])? 'selected' : '';?>><?=ucwords($class['name']);?></option>
								<?php }?>
								</select>
	                             <?php echo form_error('previous_class', '<div class="error">', '</div>'); ?>
	                         </div>
	                         <div class="col-md-4">
	                             <label>Joining Class</label>
								<select name="join_class" class="form-control" required="">
									<?php 
									foreach ($classes as $class) {
									?>
									<option value="<?=$class['id'];?>" <?=(isset($child) && $child['join_class']==$class['id'])? 'selected' : '';?>><?=ucwords($class['name']);?></option>
								<?php }?>
								</select>
	                             <?php echo form_error('join_class', '<div class="error">', '</div>'); ?>
	                         </div>
	                     </div>
								<!-- Vision -->
								<div class="col-md-12">
	                             <label>User Relation</label>
	                             <div class="col-md-2">
								<label><input type="radio" name="relation" class="d--inline" required="" value="father" <?=(isset($child) && $child['relation']=='father')? 'checked' : '';?>> Father</label>
							</div>
							<div class="col-md-2">
								<label><input type="radio" name="relation" class="d--inline" required="" value="mother" <?=(isset($child) && $child['relation']=='mother')? 'checked' : '';?>> Mother</label>
							</div>
							<div class="col-md-2">
								<label><input type="radio" name="relation" class="d--inline" required="" value="guardian" <?=(isset($child) && $child['relation']=='guardian')? 'checked' : '';?>> Guardian</label>
							</div>
							<div class="col-md-12">
								    <?php echo form_error('relation', '<div class="error">', '</div>'); ?>
	                              <label class="error" for="relation"></label>
							</div>
							</div>
	                         
	                         
	                             <label>Address</label>
								<input type="text" name="address" class="form-control" placeholder="Address" required="" value="<?=(isset($child) && $child['address']!='')? $child['address'] : '';?>">
	                             <?php echo form_error('address', '<div class="error">', '</div>'); ?>
	                             <label>Special Interests of the student</label>
								<input type="text" name="activities" class="form-control" placeholder="Dance, Music, Cricket ...." required="" value="<?=(isset($child) && $child['activities']!='')? $child['activities'] : '';?>">
	                             <?php echo form_error('activities', '<div class="error">', '</div>'); ?>
	                             
								<button type="submit" class="button margin-top-15">Submit</button>
							</div>
	</form>
						</div>
					</div>
				</div>


				<!-- Copyrights -->
				<!--<div class="col-md-12">
					<div class="copyrights">© 2019 Listeo. All Rights Reserved.</div>
				</div>-->

			</div>


			<!-- <script type="text/javascript">
				function show_form() {
					$('#student-form').css('display', '');
				}
			</script> -->
