<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/jquery-migrate-3.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/chosen.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/counterup.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/tooltips.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/custom.js"></script>

<script src="<?php echo base_url();?>assets/scripts/validations/jquery.validate.js"></script>
<script src="<?php echo base_url();?>assets/scripts/validations/examples.validation.js"></script>

<script type="text/javascript">
    function newMenuItem() {
            var newElem = $('tr.pricing-list-item.pattern.school_pr').first().clone();
            newElem.find('input').val('');
            newElem.appendTo('table#pricing-list-container1');
        }
        if ($("table#pricing-list-container1").is('*')) {
            $('.add-pricing-list-item1').on('click', function(e) {
                e.preventDefault();
                newMenuItem();
            });
            $(document).on("click", "#pricing-list-container1 .delete", function(e) {
                e.preventDefault();
                $(this).parent().parent().remove();
            });
            $('.add-pricing-submenu1').on('click', function(e) {
                e.preventDefault();
                var newElem = $('' +
                    '<tr class="pricing-list-item pricing-submenu">' +
                    '<td>' +
                    '<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>' +
                    '<div class="fm-input"><input type="text" placeholder="Category Title" /></div>' +
                    '<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>' +
                    '</td>' +
                    '</tr>');
                newElem.appendTo('table#pricing-list-container1');
            });
            $('table#pricing-list-container1 tbody').sortable({
                forcePlaceholderSize: true,
                forceHelperSize: false,
                placeholder: 'sortableHelper',
                zIndex: 999990,
                opacity: 0.6,
                tolerance: "pointer",
                start: function(e, ui) {
                    ui.placeholder.height(ui.helper.outerHeight());
                }
            });
        }
</script>




<!-- <script type="text/javascript">
    function delete_row(delete_url) {
        jQuery('#delete-model').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
    function set_row_status(delete_url) {
        jQuery('#row_status-model').modal('show', {backdrop: 'static'});
        document.getElementById('row_status_link').setAttribute('href' , delete_url);
    }
</script>
<div class="modal fade" id="delete-model">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                <header class="card-header">
                                                <h2 class="card-title">Are you sure?</h2>
                                            </header>
                                            <div class="card-body">
                                                <div class="modal-wrapper">
                                                    <div class="modal-icon">
                                                        <i class="fas fa-question-circle"></i>
                                                    </div>
                                                    <div class="modal-text">
                                                        <h4>Are you sure want to delete this information.?</h4>
                                                    </div>
                                                </div>
                                            </div>
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="delete_link"><?php echo 'Delete';?></a>
                    <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'Cancel';?></button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="row_status-model">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                <header class="card-header">
                                                <h2 class="card-title">Are you sure?</h2>
                                            </header>
                                            <div class="card-body">
                                                <div class="modal-wrapper">
                                                    <div class="modal-icon">
                                                        <i class="fas fa-question-circle"></i>
                                                    </div>
                                                    <div class="modal-text">
                                                        <h4>Are you sure want to Update this information.?</h4>
                                                    </div>
                                                </div>
                                            </div>
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-success" id="row_status_link"><?php echo 'Confirm';?></a>
                    <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'Cancel';?></button>
                </div>
            </div>
        </div>
    </div> -->




<script src="<?php echo base_url('assets/scripts')?>/jquery-selectric/jquery.selectric.min.js"></script>
<script >
                               // Selectric
 if (jQuery().selectric) {
   $(".selectric").selectric({
     disableOnMobile: false,
     nativeOnMobile: false
   });
 }
                       </script>

<script type="text/javascript">
$(".opening-day.js-demo-hours .chosen-select").each(function() {
	$(this).append(''+
        '<option></option>'+
        '<option>Closed</option>'+
        '<option>1 AM</option>'+
        '<option>2 AM</option>'+
        '<option>3 AM</option>'+
        '<option>4 AM</option>'+
        '<option>5 AM</option>'+
        '<option>6 AM</option>'+
        '<option>7 AM</option>'+
        '<option>8 AM</option>'+
        '<option>9 AM</option>'+
        '<option>10 AM</option>'+
        '<option>11 AM</option>'+
        '<option>12 AM</option>'+
        '<option>1 PM</option>'+
        '<option>2 PM</option>'+
        '<option>3 PM</option>'+
        '<option>4 PM</option>'+
        '<option>5 PM</option>'+
        '<option>6 PM</option>'+
        '<option>7 PM</option>'+
        '<option>8 PM</option>'+
        '<option>9 PM</option>'+
        '<option>10 PM</option>'+
        '<option>11 PM</option>'+
        '<option>12 PM</option>');
});

</script>

<script type="text/javascript">
    promo_to_check(1);
    function promo_to_check(promo_type) {
        $('#schools_list').hide();
        $('#classes_list').hide();
        if(promo_type==3){
            $('#schools_list').show();
            $('#classes_list').show();
        }
    }
</script>


<!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
<script src="<?php echo base_url('assets/front-end/')?>scripts/moment.min.js"></script>
<script src="<?php echo base_url('assets/front-end/')?>scripts/daterangepicker.js"></script>

<script>
$(function() {

    var start = moment().subtract(0, 'days');
    var end = moment().add(2, 'days');
<?php
if(!empty($e_data))
    {
        ?>
    start =moment('<?=$e_data['valid_from'];?>');
    end =moment('<?=$e_data['valid_to'];?>');
    <?php }
    ?>
    function cb(start, end) {
        $('#booking-date-search').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    cb(start, end);
    $('#booking-date-search').daterangepicker({
      "opens": "right",
      "autoUpdateInput": true,
      "alwaysShowCalendars": true,
        startDate: start,
        endDate: end
    }, cb);

    cb(start, end);

});

// Calendar animation and visual settings
$('#booking-date-search').on('show.daterangepicker', function(ev, picker) {
  $('.daterangepicker').addClass('calendar-visible calendar-animated bordered-style');
  $('.daterangepicker').removeClass('calendar-hidden');
});
$('#booking-date-search').on('hide.daterangepicker', function(ev, picker) {
  $('.daterangepicker').removeClass('calendar-visible');
  $('.daterangepicker').addClass('calendar-hidden');
});

$(window).on('load', function() {
    $('#booking-date-search').val('');
});
</script>

<script>
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

        $('#booking-date-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    
    $('#booking-date-range').daterangepicker({
        "opens": "left",
        "autoUpdateInput": false,
        "alwaysShowCalendars": true,
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, get_admission_date);

});
function get_admission_date(start,end) {
    //alert(start);
    $('#booking-date-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    window.location.href = '<?php echo base_url();?>admin/admissions?start=fdfd';
      window.location.href = '<?php echo base_url();?>admin/admissions?sd='+start.format('YYYY-MM-DD')+"&ed="+end.format('YYYY-MM-DD');
      /*+"&status_id=<?php if($_GET['status_id']!=''){echo $_GET['status_id'];}else{echo $status;}?>"*/
}
// Calendar animation and visual settings
$('#booking-date-range').on('show.daterangepicker', function(ev, picker) {
    $('.daterangepicker').addClass('calendar-visible calendar-animated bordered-style');
    $('.daterangepicker').removeClass('calendar-hidden');
});
$('#booking-date-range').on('hide.daterangepicker', function(ev, picker) {
    $('.daterangepicker').removeClass('calendar-visible');
    $('.daterangepicker').addClass('calendar-hidden');
});
    function get_admission_data(id) {
       <?php
       if($_GET['sd'] == '' && $_GET['ed'] == ''){
        $sd=date('Y-m-d', strtotime('-29 days'));
        $ed=date('Y-m-d', strtotime('+0 days'));
        ?>
        window.location.href = '<?php echo base_url();?>admin/admissions?sd=<?=$sd;?>&ed=<?=$ed;?>&admission_status='+id;
        <?php
       }elseif($_GET['sd'] != '' && $_GET['ed'] != ''){
        ?>
        window.location.href = '<?php echo base_url();?>admin/admissions?sd=<?=$_GET['sd'];?>&ed=<?=$_GET['ed'];?>&admission_status='+id;
        <?php
       }
       ?>
    }

    function admission_action_check(admission_id,status,text) {

            var ac = confirm(text);
           if(ac == true){
    if(ac == ''){
      alert('Please Select Any One');
    } else {
      $.ajax({
            url: '<?=base_url('admin/admission_status_change')?>',
            type: 'post',
            data: {admission_id : admission_id, admission_status : status},
            dataType: 'json',
            success: function(response)
            {   //alert(response.test);
                //$('#test').html(response.test);
                //alert(admission_id);alert(status);
              if(response.status==1){
                alert('Admission Status Changed Successfully');
                location.reload();
              }else if(response.status==0){
                alert('Admission Status Not Changed');
              }
            }
          });
        }
        }

    }

    function cancel_admission(admission_id){
    var reason = prompt("Enter Reason for Cancel The Admission:", "");
        if(reason != null){
    if(reason == ''){
      alert('Please Enter Reason');
    } else {
      $.ajax({
            url: '<?=base_url('admin/cancel_admission');?>',
            type: 'post',
            data: {reason : reason, admission_id : admission_id},
            dataType: 'json',
            success: function(response)
            {
              if(response.status==1){
                alert('Admission Canceled Successfully');
                location.reload();
              }else if(response.status==0){
                alert('Admission Not Canceled');
              }
            }
          });
    }
        }
  }


</script>






<script>
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

        $('#exp-date-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    
    $('#exp-date-range').daterangepicker({
        "opens": "left",
        "autoUpdateInput": false,
        "alwaysShowCalendars": true,
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, get_admission_exp_data);

});
function get_admission_exp_data(start,end) {
    //alert(start);
    $('#exp-date-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    window.location.href = '<?php echo base_url();?>admin/export_list_data?start=fdfd';
      window.location.href = '<?php echo base_url();?>admin/export_list_data?sd='+start.format('YYYY-MM-DD')+"&ed="+end.format('YYYY-MM-DD');
      /*+"&status_id=<?php if($_GET['status_id']!=''){echo $_GET['status_id'];}else{echo $status;}?>"*/
}
// Calendar animation and visual settings
$('#exp-date-range').on('show.daterangepicker', function(ev, picker) {
    $('.daterangepicker').addClass('calendar-visible calendar-animated bordered-style');
    $('.daterangepicker').removeClass('calendar-hidden');
});
$('#exp-date-range').on('hide.daterangepicker', function(ev, picker) {
    $('.daterangepicker').removeClass('calendar-visible');
    $('.daterangepicker').addClass('calendar-hidden');
});
    function get_admission_exp_data(id) {
       <?php
       if($_GET['sd'] == '' && $_GET['ed'] == ''){
        $sd=date('Y-m-d', strtotime('-29 days'));
        $ed=date('Y-m-d', strtotime('+0 days'));
        ?>
        window.location.href = '<?php echo base_url();?>admin/export_list_data?sd=<?=$sd;?>&ed=<?=$ed;?>&admission_status='+id;
        <?php
       }elseif($_GET['sd'] != '' && $_GET['ed'] != ''){
        ?>
        window.location.href = '<?php echo base_url();?>admin/export_list_data?sd=<?=$_GET['sd'];?>&ed=<?=$_GET['ed'];?>&admission_status='+id;
        <?php
       }
       ?>
    }

</script>


 <!--start Datatable with export js-->   
<script src="<?php echo base_url('assets')?>/scripts/datatables/datatables.min.js"></script>
<script src="<?php echo base_url('assets')?>/scripts/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets')?>/scripts/datatables/export-tables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets')?>/scripts/datatables/export-tables/buttons.flash.min.js"></script>
<script src="<?php echo base_url('assets')?>/scripts/datatables/export-tables/jszip.min.js"></script>
<script src="<?php echo base_url('assets')?>/scripts/datatables/export-tables/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets')?>/scripts/datatables/export-tables/vfs_fonts.js"></script>
<script src="<?php echo base_url('assets')?>/scripts/datatables/export-tables/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets')?>/scripts/datatables/datatables.js"></script>
<!--End of Datatable with export js--> 


<script type="text/javascript">
    var student_form = '<?=(isset($child) && $child != "")? "1" : "0";?>';
    if(student_form == 1){
        show_form();
    }
    function show_form() {
        $('#student-form').css('display', '');
    }
</script>

<script type="text/javascript">
    function send_otp() {
        var phone='<?=$user_details['phone'];?>';
        $.ajax({
            url: '<?=base_url('common/send_otp');?>',
            type: 'post',
            data: {phone : phone},
            dataType: 'json',
            success: function(response)
            {//alert(response.message);
              if(response.status==1){
                $('#otp_message').html(response.message);
              }else if(response.status==0){
                $('#otp_message').html(response.message);
              }
            }
          });
        $(".alert_message").fadeOut(1500);
    }
    function check_otp() {
        var otp=$('#otp').val();
        $.ajax({
            url: '<?=base_url('common/check_otp');?>',
            type: 'post',
            data: {otp : otp},
            dataType: 'json',
            success: function(response)
            {
              if(response.status==1){
                $('#otp_message').html(response.message);
                if (response.status == 1) {
                   // setInterval('location.reload()', 1500);
                   var ch_r='<?=$this->session->userdata('add_chaild');?>';
                    if(ch_r != ''){
                        window.location.href='<?=$this->session->userdata('add_chaild');?>';
                    }else{
                        setInterval('location.reload()', 1500);
                    }
                }
              }else if(response.status==0){
                $('#otp_message').html(response.message);
              }
            }
          });
        $(".alert_message").fadeOut(1500);
    }
</script>