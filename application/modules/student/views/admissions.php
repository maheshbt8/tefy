
<?php
$where=array('row_status'=>'1','user_id'=>$this->session->userdata('user_id'));
            $admissions=$this->common_model->select_results_info('admissions',$where,'id DESC')->result_array();
?>
        <div class="row">
                <?php
                    //$admissions=array();
                    $i=0;
                    foreach ($admissions as $promo) {
                        $r_admission_status='';
                      $r_admission_next='';
                      $admission_btn='';
                      if($promo['admission_status']==1){
                        $r_admission_status='Application Submitted';
                        $r_admission_next=2;
                      }elseif($promo['admission_status']==2){
                        $r_admission_status='Application is being reviewed';
                        $r_admission_next=3;
                      }elseif($promo['admission_status']==3){
                        $r_admission_status='Admission Approved';
                        $r_admission_next=4;
                        $admission_btn='<a href="'.base_url('student/admission_form_view/').base64_encode(base64_encode($promo['id'])).'?formtype=make payment" class="button gray pull-right">Pay Admission Fee</a>';
                      }elseif($promo['admission_status']==4){
                        $r_admission_status='Admission Fee Payment';
                        $r_admission_next=5;
                      }elseif($promo['admission_status']==5){
                        $r_admission_status='Admission Confirmed';
                      }elseif($promo['admission_status']==6){
                        $r_admission_status='Admission Canceled';
                      }

                    ?>
            <div class="col-md-12 padding-bottom-40">
                <div class="status-head"> <?=$promo['application_id'];?> </div>
                <div class="row status-content-box">
                    <div class="col-md-6 col-sm-12">
                        <span>School Name: </span> <span><b><?=$this->common_model->get_type_name_by_where('listings',array('id'=>$promo['school_id']),'school_name');?> </b></span><br/>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <span>Status: </span> <span class="status-color"><b><?=$r_admission_status;?> </b></span>
                         <?php
                        if(isset($admission_btn) && $admission_btn != ''){
                            echo $admission_btn;
                        }
                        ?>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <span>Child Name: </span> <span><b><?=$this->common_model->get_type_name_by_where('childs',array('id'=>$promo['child_id']),'name');?> </b></span><br/>
                    </div>
                   <div class="col-md-4 col-sm-6">
                        <span>Class: </span> <span><b><?=$this->common_model->get_type_name_by_where('classes',array('id'=>$promo['class']),'name');?></b></span>
                    </div>
                   
                   
                    <div class="col-md-4 col-sm-6">
                        <span>Medium: </span> <span><b><?=$this->common_model->get_type_name_by_where('medium',array('id'=>$promo['medium']),'name');?> </b></span>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <span>Category: </span> <span><b><?=$this->common_model->get_type_name_by_where('category',array('id'=>$promo['category']),'name');?> </b></span>
                    </div>
                     <div class="col-md-4 col-sm-6">
                        <span>DOB: </span> <span><b><?=$this->common_model->get_type_name_by_where('childs',array('id'=>$promo['child_id']),'dob');?></b></span>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <span>Father's Name: </span> <span><b><?=$this->common_model->get_type_name_by_where('childs',array('id'=>$promo['child_id']),'father');?> </b></span>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <span>Mather's Name: </span> <span><b><?=$this->common_model->get_type_name_by_where('childs',array('id'=>$promo['child_id']),'mother');?></b></span>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <span>Address: </span> <span><b> <?=$this->common_model->get_type_name_by_where('childs',array('id'=>$promo['child_id']),'address');?></b></span>
                    </div>
                    <a href="<?=base_url('student/admission_form_view/').base64_encode(base64_encode($promo['id']));?>" class="button gray pull-right" target="_blank"><i class="sl sl-icon-note"></i> View</a>
                </div>

            </div>
        

<?php }?>
        </div>


<!-- <script type="text/javascript">
    function make_payment(admission_id) {
         var ask = window.confirm("Are you sure you want to Make Payment?");
    if (ask) {
        //window.alert("This post was successfully deleted.");
        window.location.href = "<?=base_url('payment/admission_payment/')?>"+admission_id;

    }
    }
</script> -->