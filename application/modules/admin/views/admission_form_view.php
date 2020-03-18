
<?php
$child=$this->common_model->select_results_info('childs',array('id'=>$promo['child_id']))->row_array();
$school=$this->common_model->select_results_info('listings',array('id'=>$promo['school_id']))->row_array();
if($promo['admission_status']==1){
                        $r_admission_status='Application Submitted';
                        $r_admission_next=2;
                        $admission_btn='<a onclick="return admission_action_check('.$promo['id'].',2,&quot;Are You Sure Want To Change: Application is being reviewed &quot;)" class="btn btn-sm btn-success">Accept</a>';
                      }elseif($promo['admission_status']==2){
                        $r_admission_status='Application is being reviewed';
                        $r_admission_next=3;
                        $admission_btn='<a onclick="return admission_action_check('.$promo['id'].',3,"Are You Sure Want To Change: Application Approved")" class="btn btn-sm btn-success">Approved</a>';
                      }elseif($promo['admission_status']==3){
                        $r_admission_status='Admission Approved';
                        $r_admission_next=4;
                        $admission_btn='<a onclick="return admission_action_check('.$promo['id'].',4,"Are You Sure Want To Change: Application Fee Payment")" class="btn btn-sm btn-success">Fee Payment</a>';
                      }elseif($promo['admission_status']==4){
                        $r_admission_status='Admission Fee Payment';
                        $r_admission_next=5;
                        $admission_btn='<a onclick="return admission_action_check('.$promo['id'].',5,"Are You Sure Want To Change: Application Confirmation")" class="btn btn-sm btn-success">Admission Confirm</a>';
                      }elseif($promo['admission_status']==5){
                        $r_admission_status='Admission Confirmation';
                      }elseif($promo['admission_status']==6){
                        $r_admission_status='Admission Canceled';
                      }

?>

<div class="row">
   <!--  <input type="button"class="btn btn-success"  onclick="downloadDiv('ext_file')" value="Download"> -->
   <div class="col-md-12">
<a href="<?=base_url('admin/admissions')?>" class="button gray pull-right">Back To Admissions</a>
<a onclick="printDiv('ext_file')" value="Print" class="button gray pull-right">Print</a>
</div>
</div>
<div class="panel-body" id="ext_file">
    <div class="col-md-12">
        <div class="row status-content-box">
            <div class="my_pulse">  
    <div class="col-md-12" style="background-color: #000;">
    <center style="padding:5px;"><img draggable="false" src="<?=base_url('assets/images/logo3.png');?>"  style="max-height:55px; margin: 2px;"/></center>
    </div>
</div>
    <br/>
    <br/>
       <!--  </div>-->
        <!-- <div class="row status-content-box">  -->
            <div class="col-md-12">
                <table width="100%" border="0">    
            <tbody>
<tr>
    <td align="left">
        <h3>Application ID</h3>
      </td>
      <td align="left">
        <h3><?=$promo['application_id'];?></h3>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h3>School</h3>
      </td>
      <td align="left">
        <h3><?=$school['school_name'];?> </h3>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h3>Status</h3>
      </td>
      <td align="left">
        <h3><?=$r_admission_status;?></h3>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h3>Child Name</h3>
      </td>
      <td align="left">
        <h3><?=$child['name'];?></h3>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h3>Father Name</h3>
      </td>
      <td align="left">
        <h3><?=$child['father'];?></h3>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h3>Mother Name</h3>
      </td>
      <td align="left">
        <h3><?=$child['mother'];?></h3>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h3>Applied User Name (Relation)</h3>
      </td>
      <td align="left">
        <h3><?=$this->common_model->get_type_name_by_where('users',array('id'=>$promo['user_id']),'first_name');?> (<?=$child['relation'];?>)</h3>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h3>Applying Class</h3>
      </td>
      <td align="left">
        <h3><?=$this->common_model->get_type_name_by_where('classes',array('id'=>$promo['class']),'name');?></h3>
      </td>
    </tr>
    <!-- <tr>
    <td align="left">
        <h3>Medium</h3>
      </td>
      <td align="left">
        <h3><?=$this->common_model->get_type_name_by_where('medium',array('id'=>$promo['medium']),'name');?></h3>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h3>Category</h3>
      </td>
      <td align="left">
        <h3><?=$this->common_model->get_type_name_by_where('category',array('id'=>$promo['category']),'name');?></h3>
      </td>
    </tr> -->
    <tr>
    <td align="left">
        <h3>Date Of Birth</h3>
      </td>
      <td align="left">
        <h3><?=$child['dob'];?></h3>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h3>Gender</h3>
      </td>
      <td align="left">
        <h3><?=$child['gender'];?></h3>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h3>Address</h3>
      </td>
      <td align="left">
        <h3><?=$child['address'];?></h3>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h3>Contact Number</h3>
      </td>
      <td align="left">
        <h3><?=$child['c_number'];?></h3>
      </td>
    </tr>
   <!--  <tr>
    <td align="left">
        <h3>Previous School</h3>
      </td>
      <td align="left">
        <h3><?=$child['previous_school'];?></h3>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h3>Previous Class</h3>
      </td>
      <td align="left">
        <h3><?=$this->common_model->get_type_name_by_where('classes',array('id'=>$child['previous_class']),'name');?></h3>
      </td>
    </tr> -->
    <tr>
    <td align="left">
        <h3>Referer</h3>
      </td>
      <td align="left">
        <h3><?=$this->common_model->get_type_name_by_where('users',array('id'=>$promo['referer_id']),'first_name').'-'.$this->common_model->get_type_name_by_where('users',array('id'=>$promo['referer_id']),'unique_id');?></h3>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h3>Activities</h3>
      </td>
      <td align="left">
        <h3><?=$child['activities'];?></h3>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h3>Created At</h3>
      </td>
      <td align="left">
        <h3><?=$promo['created_at'];?></h3>
      </td>
    </tr>
              <!-- <tr>
    <td align="left">
        <h3>Application ID</h3>
        <h3>School</h3>
        <h3>Status</h3>
        <h3>Child Name</h3>
        <h3>Father Name</h3>
        <h3>Mother Name</h3>
        <h3>Applied User Name (Relation)</h3>
        <h3>Applying Class</h3>
        <h3>Medium</h3>
        <h3>Category</h3>
        <h3>Date Of Birth</h3>
        <h3>Gender</h3>
        <h3>Address</h3>
        <h3>Contact Number</h3>
        <h3>Previous School</h3>
        <h3>Previous Class</h3>
        <h3>Activities</h3>
        <h3>Created At</h3>
    </td>
    <td align="left">
        <h3><?=$promo['application_id'];?></h3>
        <h3><?=$school['school_name'];?> </h3>
        <h3><?=$r_admission_status;?></h3>
        <h3><?=$child['name'];?></h3>
        <h3><?=$child['father'];?></h3>
        <h3><?=$child['mother'];?></h3>
        <h3><?=$this->common_model->get_type_name_by_where('users',array('id'=>$promo['user_id']),'first_name');?> (<?=$child['relation'];?>)</h3>
        <h3><?=$this->common_model->get_type_name_by_where('classes',array('id'=>$promo['class']),'name');?></h3>
        <h3><?=$this->common_model->get_type_name_by_where('medium',array('id'=>$promo['medium']),'name');?></h3>
        <h3><?=$this->common_model->get_type_name_by_where('category',array('id'=>$promo['category']),'name');?></h3>
        <h3><?=$child['dob'];?></h3>
        <h3><?=$child['gender'];?></h3>
        <h3><?=$child['address'];?></h3>
        <h3><?=$child['c_number'];?></h3>
        <h3><?=$child['previous_school'];?></h3>
        <h3><?=$child['activities'];?></h3>
        <h3><?=$promo['created_at'];?></h3>
        <h3></h3>
    </td>
            </tr> -->
        </tbody>
    </table>                
            </div>
                   
                    
                </div>
    </div>
<div class="col-md-12">
        <div class="row status-content-box">
            <div class="my_pulse"> 
            
    <div class="col-md-12" style="background-color: #000;">
    <center style="padding:5px;"><h1 style="color: #fff;">Invoice</h1></center> 
    </div>
</div>
    <br/>
    <br/>
       <!--  </div>-->
        <!-- <div class="row status-content-box">  -->
            <div class="col-md-12">
                <table width="100%" border="0">    
            <tbody>
              <tr>
    <td align="left">
        <h3>Actual Price</h3>
      </td>
      <td align="left">
        <h3><?=$promo['actual_price'];?></h3>
    </td>
  </tr>
         <tr>
    <td align="left">
        <h3>Discount</h3>
      </td>
      <td align="left">
        <h3><?=$promo['discount'];?></h3>
    </td>
  </tr>
  <?php
  if($promo['walet_less']!=''){
  ?>
   <tr>
    <td align="left">
        <h3>From User Walet Deducted Amount</h3>
      </td>
      <td align="left">
        <h3><?=$promo['walet_less'];?></h3>
    </td>
  </tr>
<?php }?>
         <tr>
    <td align="left">
        <h3>Total</h3>
      </td>
      <td align="left">
        <h3><?=$promo['total'];?></h3>
    </td>
  </tr>
        </tbody>
    </table>                
            </div>
                   
                    
                </div>
    </div>
</div>
<script type="text/javascript">
   function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
</script>
<script type="text/javascript">
    function downloadDiv() {
        var options = {
  };
  var pdf = new jsPDF('p', 'pt', 'a4');
  pdf.addHTML($("#ext_file"), 15, 15, options, function() {
    pdf.save('<?='Receipt_'.date('YmdHis',strtotime($order_info['receipt_created_at']));?>.pdf');
  });
    }
    $('#download').click(function() {//alert('fdf');
  var options = {
  };
  var pdf = new jsPDF('p', 'pt', 'a4');
  pdf.addHTML($("#ext_file"), 15, 15, options, function() {
    pdf.save('<?='Receipt_'.date('YmdHis',strtotime($order_info['receipt_created_at']));?>.pdf');
  });
});
</script>