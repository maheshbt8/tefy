<link rel="stylesheet" href="<?php echo base_url('assets')?>/css/style.css">
<link rel="stylesheet" href="<?php echo base_url('assets')?>/css/main-color.css" id="colors">
<style>
.admin-logo{
    max-width: 180px;
    align-items: center;
    margin: auto;
    display: flex;
    margin-bottom: 50px;
    margin-top: 70px;
}
</style>
   <div class="container">
       <div class="row" >
           <div class="col-md-4"></div>
            <div class="col-md-4">
                <img src="<?php echo SITEURL2;?>/assets/images/logo.png"  class="admin-logo">
                <h1><?php echo lang('reset_password_heading');?></h1>
                	<div id="infoMessage"><?php echo $message;?></div>
                           <?php echo form_open('auth/reset_password/' . $code);?>
                                <p class="form-row form-row-wide">
                                    <!-- <label for="username">Username:
                                        <i class="im im-icon-Male"></i>
                                        <?php echo form_input($identity);?>
                                    </label> -->
                                    <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
		<?php echo form_input($new_password);?>
                                </p>
                                <p class="form-row form-row-wide">
                                    <!-- <label for="password">Password:
                                        <i class="im im-icon-Lock-2"></i>
                                        <?php echo form_input($password);?>
                                    </label> -->
                                    <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
		<?php echo form_input($new_password_confirm);?>
                                    
                                </p>
                                <?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>
                                <div class="form-row">
                                        <?php echo form_submit('submit', lang('reset_password_submit_btn'));?>
                                   
                                </div>
                                
                            <?php echo form_close();?>
                        </div>
       </div>
   </div>
<!-- 
<h1><?php echo lang('reset_password_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open('auth/reset_password/' . $code);?>

	<p>
		<label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
		<?php echo form_input($new_password);?>
	</p>

	<p>
		<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
		<?php echo form_input($new_password_confirm);?>
	</p>

	<?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>

	<p><?php echo form_submit('submit', lang('reset_password_submit_btn'));?></p>

<?php echo form_close();?> -->