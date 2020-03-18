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
                	<?php echo $message;?>
                            <?php echo form_open("auth/login");?>
                                <p class="form-row form-row-wide">
                                    <label for="username">Username:
                                        <i class="im im-icon-Male"></i>
                                        <?php echo form_input($identity);?>
                                    </label>
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="password">Password:
                                        <i class="im im-icon-Lock-2"></i>
                                        <?php echo form_input($password);?>
                                    </label>
                                    
                                </p>
                                <div class="form-row">
                                    <input type="submit" class="button border margin-top-5" name="login" value="Login" />
                                    <div class="checkboxes margin-top-10">
                                        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                                        <label for="remember-me">Remember Me</label>
                                    </div>
                                </div>
                                
                            <?php echo form_close();?>
                            <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
                        </div>
       </div>
   </div>