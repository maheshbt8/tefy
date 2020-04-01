
<?php
if($promo != ''){
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
    <style type="text/css">
      @media (max-width: 767px){
.notfy {
  display:none !important;
}
}
    </style>
    <div class="notification warning closeable notfy"><strong>Switch to desktop version to print the admission form.</strong></div>
    <a href="<?=base_url('student/admissions')?>" class="button gray pull-right">Back To Admissions</a>
    <?php 
  if(empty($_GET['formtype'])){
  ?>
<a onclick="printDiv('ext_file')" value="Print" class="button gray pull-right">Print</a>
<?php }?>
</div>
</div>
<div class="panel-body" id="ext_file">
  <?php 
  if(empty($_GET['formtype'])){
  ?>
   <div class="">
    <div class="col-md-12">
        <div class="row status-content-box">
            <div class="my_pulse">  
    <div class="col-md-12" style="color:#000;">
   
    <P class="text-center para"> ADMISSION FORM</P>
    
    <div class="fr img_logo">
         <img draggable="false" src="<?=base_url('assets/images/logo2.png');?>"  style="max-height:36px;"/>
    </div>
   
    </div>
</div>
<!--
    <br/>
    <br/>
-->
       <!--  </div>-->
        <!-- <div class="row status-content-box">  -->
          
            <div class="col-md-12 bg_img_logo_tr">
                <div class="table_bor">
                <table width="100%">    
            <tbody>
    <tr>
    <td align="left">
        <h4>Application ID</h4>
      </td>
      <td align="left">
        <h4><?=$promo['application_id'];?></h4>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h4>School</h4>
      </td>
      <td align="left">
        <h4><?=$school['school_name'];?> </h4>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h4>Status</h4>
      </td>
      <td align="left">
        <h4><?=$r_admission_status;?></h4>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h4>Child Name</h4>
      </td>
      <td align="left">
        <h4><?=$child['name'];?></h4>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h4>Father Name</h4>
      </td>
      <td align="left">
        <h4><?=$child['father'];?></h4>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h4>Mother Name</h4>
      </td>
      <td align="left">
        <h4><?=$child['mother'];?></h4>
      </td>
    </tr>
<!--
    <tr>
    <td align="left">
        <h4>Applied User Name (Relation)</h4>
      </td>
      <td align="left">
        <h4><?=$this->common_model->get_type_name_by_where('users',array('id'=>$promo['user_id']),'first_name');?> (<?=$child['relation'];?>)</h4>
      </td>
    </tr>
-->
    <tr>
    <td align="left">
        <h4>Applying Class</h4>
      </td>
      <td align="left">
        <h4><?=$this->common_model->get_type_name_by_where('classes',array('id'=>$promo['class']),'name');?></h4>
      </td>
    </tr>
    <!-- <tr>
    <td align="left">
        <h4>Medium</h4>
      </td>
      <td align="left">
        <h4><?=$this->common_model->get_type_name_by_where('medium',array('id'=>$promo['medium']),'name');?></h4>
      </td>
    </tr> -->
   <!--  <tr>
    <td align="left">
        <h4>Category</h4>
      </td>
      <td align="left">
        <h4><?=$this->common_model->get_type_name_by_where('category',array('id'=>$promo['category']),'name');?></h4>
      </td>
    </tr> -->
    <tr>
    <td align="left">
        <h4>Date Of Birth</h4>
      </td>
      <td align="left">
        <h4><?=$child['dob'];?></h4>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h4>Gender</h4>
      </td>
      <td align="left">
        <h4><?=$child['gender'];?></h4>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h4>Address</h4>
      </td>
      <td align="left">
        <h4><?=$child['address'];?></h4>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h4>Contact Number</h4>
      </td>
      <td align="left">
        <h4><?=$child['c_number'];?></h4>
      </td>
    </tr>
  <!--   <tr>
    <td align="left">
        <h4>Previous School</h4>
      </td>
      <td align="left">
        <h4><?=$child['previous_school'];?></h4>
      </td>
    </tr>
    <tr>
    <td align="left">
        <h4>Previous Class</h4>
      </td>
      <td align="left">
        <h4><?=$this->common_model->get_type_name_by_where('classes',array('id'=>$child['previous_class']),'name');?></h4>
      </td>
    </tr> -->
    <tr>
    <td align="left">
        <h4>Activities</h4>
      </td>
      <td align="left">
        <h4><?=$child['activities'];?></h4>
      </td>
    </tr>
<!--
    <tr>
    <td align="left">
        <h4>Created At</h4>
      </td>
      <td align="left">
        <h4><?=$promo['created_at'];?></h4>
      </td>
    </tr>
-->
        </tbody>
    </table>                
            </div><!--boredr--> 
            
            <!--footer-->
               <div class="clear"></div>
                  <div class="fot">
                     <div class="col-md-9">
                         <p>One7 Incredic Services Pvt Ltd, Hyderabad.</p>
                         <p><i class="fa fa-phone" aria-hidden="true"></i> +917075417792, 7075418792</p>
                     </div>
                     <div class="col-md-3 fr">
                         <a href="#">www.tefy.in</a>
                         <a href="#">support@tefy.in</a>
                     </div>
                 </div>
                 
                  <!--end-->
           
        </div>           
              
                </div>
                
    </div>
   </div>
         
  <?php }elseif(isset($_GET['formtype']) && $_GET['formtype'] == 'make payment'){ ?>
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
        <h4>Admission Fee</h4>
      </td>
      <td align="left">
        <h4><?=$promo['actual_price'];?></h4>
    </td>
  </tr>
         <tr>
    <td align="left">
        <h4>Discount</h4>
      </td>
      <td align="left">
        <h4><?=$promo['discount'];?></h4>
    </td>
  </tr>
  <?php
  if($promo['walet_less']!=''){
  ?>
   <tr>
    <td align="left">
        <h4>From My Walet Deducted Amount</h4>
      </td>
      <td align="left">
        <h4><?=$promo['walet_less'];?></h4>
    </td>
  </tr>
<?php }?>
         <tr>
    <td align="left">
        <h4>Total</h4>
      </td>
      <td align="left">
        <h4><?=$promo['total'];?></h4>
    </td>
  </tr>
   <?php
                if($promo['admission_status']==3){
                  ?>
   <tr>
    <td align="left">
        <h4>Tefy Walet <br/><small>Total Balance: <i class="fa fa-inr" aria-hidden="true"></i> <?php $my_walet_balance=$this->common_model->get_type_name_by_where('users',array('id'=>$this->session->userdata('user_id')),'walet_amount'); echo (($my_walet_balance == NULL)? 0 : $my_walet_balance);?>.<small></h4>
      </td>
      <td align="left">
        <?php if($my_walet_balance != 0){?>
         <input type="checkbox" name="my_walet_amount1" id="my_walet_amount1" onclick="my_walet_amount1();" value="1"><?php }?>
    </td>
  </tr>
    <tr>
    <td align="left">
        <h4>Grand Total</h4>
      </td>
      <td align="left">
        <h4 id="grand_total"><?=$promo['total'];?></h4>
    </td>
  </tr>
<?php }?>
        </tbody>
    </table>                
            </div> 
              </div>
                <?php
                if($promo['admission_status']==3){
                        $r_admission_status='Admission Approved';
                        $r_admission_next=4;
                        $admission_btn='<center><br/><a onclick="make_payment('.$promo['id'].')" class="button gray">Make Payment</a></center>';
                        echo $admission_btn;
                      }
                ?>

    </div>
  <?php }?>
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

<script type="text/javascript">
  function my_walet_amount1() {
    var total='<?=$promo['total'];?>'
    var ischecked= $("#my_walet_amount1").is(':checked');
    if(!ischecked){
    //alert('uncheckd ' + $("#my_walet_amount1").val());
    dis=total;
    }
    if(ischecked){
    //alert('checkd ' + $("#my_walet_amount1").val());
    dis=total-'<?=$my_walet_balance;?>';  
    }
    $('#grand_total').html(dis);
  }
  /*function update_payment_dis(argument) {
    
  }*/
   /*$("#my_walet_amount").change(function() {alert('fd');
    
}); */
 function make_payment(admission_id) {
    var ask = window.confirm("Are you sure you want to Make Payment?");
    if (ask) {
      var ischecked= $("#my_walet_amount1").is(':checked');
      var chec_chec=0;
    if(ischecked){
      chec_chec=1;
    //alert('checkd ' + $("#my_walet_amount1").val());
    }
    //alert(chec_chec);
        //window.alert("This post was successfully deleted.");
    window.location.href = "<?=base_url('payment/admission_payment/')?>"+admission_id+'/'+chec_chec;

    }
    }
</script>
<?php }else{
        redirect('404_override');
      }?>