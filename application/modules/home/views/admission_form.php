<!-- <div class="notification success closeable">
                <p><span>Success!</span> You did it, now relax and enjoy it.</p>
                <a class="close"></a>
            </div> -->
<?php
            if ($this->ion_auth->logged_in()=='')
              {
                redirect(base_url().str_replace(" ","-",$_GET['school']).'?school_code='.$_GET['school_code']);
                //redirect(base_url('listings-single').'?school='.$_GET['school'].'&school_code='.$_GET['school_code'].'&referer='.$_GET['referer']);
              }
            ?>
<?php
$this->session->set_userdata('last_page1',current_url().'?school='.$_GET['school'].'&school_code='.$_GET['school_code'].'&referer='.$_GET['referer']);
$this->session->set_userdata('last_admission_from',current_url().'?school='.$_GET['school'].'&school_code='.$_GET['school_code'].'&referer='.$_GET['referer']);
$school=$this->common_model->select_results_info('listings',array('school_code'=>$_GET['school_code']))->row_array();

?>

<!-- Container -->

<div class="container margin-top-40">

     <?php
        if($this->session->flashdata('admission_message')!=''){
            echo $this->session->flashdata('admission_message');
          }else{ ?>
    <form method="post" action="<?=base_url('home/apply_admission').'?school='.$_GET['school'].'&school_code='.$_GET['school_code'].'&referer='.$_GET['referer'];?>" novalidate="novalidate" id="form">
        <input type="hidden" name="school_id" value="<?=$school['id']?>"/>
	<div class="row">
        <h3 class=" booking-h3 margin-top-0 margin-bottom-30">Admission for <b><?=$school['school_name'];?></b></h3>
        <h4 class="margin-top-0 margin-bottom-20">Application Details</h4>

		<!-- Content
		================================================== -->
		<div class="col-lg-8 col-md-8 padding-right-30">

			

			<div class="row">

				

				<div class="col-md-4 margin-bottom-20">
					<select data-placeholder="Category" required name="category">
                        <option value="" disabled >--Select School Category--</option>
                        <?php
                        $category='';
  $cate=json_decode($school['category']);
  if($cate!=''){
  for($c=0; $c < count($cate); $c++) { 
    $category=$this->common_model->select_results_info('category',array('id'=>$cate[$c]))->row_array();
    ?>
        <option value="<?=$category['id'];?>"><?=$category['name'];?></option>
    <?php
  }
}
?>
                    </select>
				</div>
<div class="col-md-4 margin-bottom-20">
                    <select data-placeholder="Medium" required name="medium">
                        <option value="" disabled>--Select school medium--</option>
                        <?php
                        $medium='';
  $cate=json_decode($school['medium']);
  if($cate!=''){
  for($c=0; $c < count($cate); $c++) { 
    $category=$this->common_model->select_results_info('medium',array('id'=>$cate[$c]))->row_array();
    ?>
        <option value="<?=$category['id'];?>"><?=$category['name'];?></option>
    <?php
  }
}
?>
                    </select>
                </div>
                <div class="col-md-4 margin-bottom-20">
                    <select data-placeholder="Class" required onchange="get_my_childs('<?=$school['id'];?>',this.value)" name="class" id="list_class">
                        <option value="" disabled>--Select the class your applying for--</option>
                        <?php
                        $class=$this->common_model->select_results_info('school_class_prices',array('listing_id'=>$school['id']))->result_array();
  foreach ($class as $cls) {
    ?>
        <option value="<?=$cls['class_id'];?>"><?=$this->common_model->get_type_name_by_where('classes',array('id'=>$cls['class_id']));?></option>
    <?php
    }
    ?>
                    </select>
                </div>
                <h4 class="col-md-12 margin-top-0 margin-bottom-20">Referral  Code (If any)</h4>
                <div class="col-md-12 margin-bottom-20">
                    
                    <input type="text" name="referer" value="<?=$_GET['referer']?>">
                </div>
                <div class="col-md-12">
                    <h4 class="margin-top-0 ">Select the student profile</h4></div>
                <div class="col-md-8">
					<select data-placeholder="Select" id="my_childs" required name="child">
                        <option value="" disabled>--Select the student profile--</option>	
                    </select>
				</div>

                <div class="col-md-4">
                    <a href="<?=base_url('student/childs')?>" class="verified-badge" target="_blank"><i class="im im-icon-plus"></i> Add student profile</a>
				</div>
               <div class="col-md-12 padding-bottom-15 error"><b>*</b> Adding student profile helps you to apply admission to multiple schools with out filling the form again.</div>
                
                <div class="clearfix"></div>
                
                <!-- <h4 class="margin-top-0 margin-bottom-20">Contact Info for TEFY</h4>
				<div class="col-md-12">
					<label>Parents name</label>
					<input type="text" value="">
				</div>

				<div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label>E-Mail Address</label>
						<input type="text" value="<?=$this->session->userdata('email');?>" name="c_email">
						<i class="im im-icon-Mail"></i>
					</div>
				</div>

				<div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label>Phone</label>
						<input type="text" value="">
						<i class="im im-icon-Phone-2"></i>
					</div>
				</div> -->
                
                <h4 class="col-md-12 margin-top-20 margin-bottom-20"> Promo Code (If any) </h4>
                <div class="col-md-8 margin-bottom-20">
                    <input type="hidden" name="discount_id" value="">
					<input type="text" class="form-control" placeholder="Promo  Code" id="my_coupon" name="my_coupon">
                    <span id="coupon_message"></span>
				</div>

                <div class="col-md-4">

                    <button type="button"  class="verified-badge tf-black" onclick="return get_coupon_dis()">Apply Code</button>
				</div>
                
                <div class="col-lg-12 col-md-12 margin-top-0 text-center" >
            <input type="submit" value="Submit Application"/>
        </div>
                
                <div class="clearfix"></div>

			</div>
            
            
		
			
		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-0 margin-bottom-60">
            <div class="booking-sc-view">
                <img src="<?=base_url('uploads/listings/thumb/').$school['id'].'.jpg';?>" alt="">
                <a href="<?=base_url('listings-single').'?school='.$_GET['school'].'&school_code='.$_GET['school_code'].'&referer='.$_GET['referer'];?>" target="_blank"><h3><?=$school['school_name'].'-'.$school['school_code'];?></h3>
                <span><?=$school['landmark']?></span></a>
                
            </div>

			<!-- Booking Summary -->
			
			<div class="boxed-widget opening-hours summary margin-top-0">
				<h3 class="fee-structure "><i class="fa fa-calendar-check-o"></i> Admission Fee Summary</h3>
               <div class=" padding-bottom-15 padding-top-10 sdgh"><b>*</b>Pay  admission fee once the admission is confirmed.</div>
                <!-- <h4 class="margin-top-0 margin-bottom-20">Enter Any Promocode are referel Code</h4>
                <div class="col-md-8">
                    <input type="checkbox" name="my_walet_amount" value="1" id="my_walet_amount"> Tefy Wallet/Cashback
                    <span>Total Balance: <i class="fa fa-inr" aria-hidden="true"></i>50</span>
                </div> -->
				<ul>
					<li>Admission fee <span id="admission_fee">0</span></li>
					<li>Discount <span id="discount">0</span></li>
					<!-- <li>Taxes <span>1800</span></li> -->
					<li class="total-costs">Total<span id="grand_total">0</span></li>
				</ul>

			</div>
			<!-- Booking Summary / End -->

		</div>
        
	</div>
    </form>
    <?php }?>
</div>
<!-- Container / End -->


<!-- <script type="text/javascript">
    $("#my_walet_amount").change(function() {
    var ischecked= $(this).is(':checked');
    if(!ischecked){
    alert('uncheckd ' + $(this).val());    
    }
    if(ischecked){
    alert('checkd ' + $(this).val());    
    }
}); 
     $("input:checkbox").change(function() {
                    var ischecked= $(this).is(':checked');
                    if(!ischecked)
                      alert('uncheckd ' + $(this).val());
                }); 
</script> -->