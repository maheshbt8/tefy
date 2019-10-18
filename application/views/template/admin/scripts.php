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

