<header id="header-container" class="padding-bottom-80">
    <style type="text/css">
        div#register_response { 
                                color: red;
            
                                }
        
    </style>
    <!-- Header --> 
    <div id="header" >
        <div class="container" style="">
            
                <!-- Left Side Content -->
                <div class="wd">
            <div class="left-side">
                 
                <!-- Logo -->
                <div id="logo">
                    <a href="<?=base_url();?>">
                        <img src="<?php echo base_url('assets')?>/front-end/images/logo2.svg" data-sticky-logo="<?php echo base_url('assets')?>/front-end/images/logo3.svg" alt="">
                    </a>
                    
                </div>
                <!--logoend-->
                 <!--login-->
              <div class="right-side">
                <div class="header-widget">
                     


                    <div class="user-menu">
                        <?php
                        if ($this->ion_auth->logged_in())
                            {
                        ?> 

                        
                        <div class="user-name adm">
                            
                                <img src="<?=base_url().$this->common_model->get_image_url('users',$this->session->userdata('user_id'));?>" alt="" width="" height="35px" class="">
                           <span class="d-carrot margin-left-5">
                            <?=ucwords(substr($this->common_model->get_type_name_by_where('users',array('id'=>$this->session->userdata('user_id')),'first_name'),0,6));?>...&#9660;</span>
                        </div>
                        <ul>
                            <li><a href="<?=base_url('auth');?>" target="_blank"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                            <?php if ($this->ion_auth->is_student()){?>
                            <li><a href="<?=base_url('student/admissions')?>"><i class="fa fa-calendar-check-o"></i> Admission Status</a></li>
                            <li><a href="<?=base_url('student/bookmarks')?>"><i class="fa fa-calendar-check-o"></i> Bookmarks</a></li>
                            <li><a href="<?=base_url('student/profile')?>"><i class="fa fa-user"></i> My Profile</a></li>
                            <?php }?>

                            <li><a href="<?=base_url('auth/logout');?>"><i class="sl sl-icon-power"></i> Logout</a></li>
                        </ul>
                    <?php }else{?>
                        
                        <div class="user-name">
                            <a href="#sign-in-dialog" class="popup-with-zoom-anim ">Login/SignUp</a>
                        </div>

                    <?php }?>
                    </div>


                   
                </div>
            </div> 
               <!--end-->
               
                
                <!-- Mobile Navigation -->
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
   
                <!-- Main Navigation -->
                <nav id="navigation" class="style-1">
                    <ul id="responsive">

                        <li><a  href="<?=base_url();?>">Home</a>
                           
                        </li>

                        <li><a href="<?=base_url('about_us');?>">About Us</a>
                            
                        </li>
                         <li><a href="<?=base_url('blogs');?>">Blog</a></li>
                        <li><a href="<?=base_url('contact_us');?>">Contact Us</a></li>
           <!--             <?php
                        if ($this->ion_auth->logged_in())
                            {
                        ?>
                         <li><a  href="#"><?=ucwords($this->common_model->get_type_name_by_where('users',array('id'=>$this->session->userdata('user_id')),'first_name'));?></a>
                            <ul>
                                 <li><a href="<?=base_url('auth');?>" target="_blank"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                            <?php if ($this->ion_auth->is_student()){?>
                            <li><a href="<?=base_url('student/bookmarks')?>"><i class="fa fa-calendar-check-o"></i> Bookmarks</a></li>
                            <li><a href="<?=base_url('student/profile')?>"><i class="fa fa-user"></i> My Profile</a></li>
                            <?php }?>

                            <li><a href="<?=base_url('auth/logout');?>"><i class="sl sl-icon-power"></i> Logout</a></li>
                            </ul>
                        </li>
<?php }else{?>
                        <li><a href="#sign-in-dialog" class="popup-with-zoom-anim"><i class="sl sl-icon-login"></i> Sign In</a></li>
                      
 <?php }?>-->
                        
                    </ul>
                </nav>
                
                
                
                
                <div class="clearfix"></div>
                <!-- Main Navigation / End -->
            </div>
            
        </div>

            <!-- Right Side Content / End -->
           
            <!-- Right Side Content / End -->
            
            
            
            
          

           

            <!-- Sign In Popup -->
            
            <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

                <!--<div class="small-dialog-header">
                    <h3>Sign In</h3>
                    
                </div>-->
                <div class="">
                <div style="text-align: center; " >
                    <img src="<?php echo base_url('assets/front-end/')?>images/logo-icon.png" alt="" width="30%" class="margin-top-10 margin-bottom-10" style="">
                    <br>
                    <a href="<?php echo $this->googleplus->loginURL();?>" class="signin-google" style="border: 1px solid #000; padding: 8px 25px;  border-radius: 7px;">
                       <img src="<?php echo base_url('assets/front-end/')?>images/google.png" width="22px">&nbsp;
                        Sign in with Google
                    </a>
                    <br><br>
                    <span style="color:#000">or</span>
                     
                      
                </div>

                <!--Tabs -->
                <div class="sign-in-form style-1">
                            <div id="login_response">

                            </div>
                            <p class="form-row form-row-wide">
                                <label for="username">
                                    <i class="im im-icon-Male"></i>
                                    <input type="text" class="input-text" placeholder="Email Id" name="identity" id="identity" value="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Id'" />
                                </label>
                             </p>

                            <p class="form-row form-row-wide">
                                <label for="password">
                                    <i class="im im-icon-Lock-2"></i>
                                    <input class="input-text pswd" type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="password" id="password" onfocus="this.placeholder = ''" onblur="this.placeholder = '&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;'" />
                                </label>
                            </p>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                   <div class="checkboxes margin-top-10">
                                        <div>
                                        <input id="remember-me" type="checkbox" name="check">
                                        <label for="remember-me">Remember Me</label>
                                        </div>
                                        <input type="submit" class="button border margin-top-5 b-1-000" name="login" value="Login" onclick="return submit_login();" />
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                    <span class="lost_password pull-right margin-top-10">
										<a href="#small-dialog" class="popup-with-zoom-anim" >Forgot Password?</a>
                                        <br/>
                                       
                                        <a href="#sign-up-dialog" class="button border margin-top-5 text-center popup-with-zoom-anim"> Sign Up &nbsp;&gt;&gt;</a>
									</span>
                                </div>
                            </div>
                    
                </div>
            </div>
        </div>
            <!-- Sign Up Popup / End -->
                     <!-- Sign In Popup -->
                      
            <div id="sign-up-dialog" class="zoom-anim-dialog mfp-hide">

                <!--<div class="small-dialog-header">
                    <h3>Sign In</h3>
                    
                </div>-->
                <div class="" style="height: auto !important;">
                <div style="text-align: center; " >
                    <img src="<?php echo base_url('assets/front-end/')?>images/logo-icon.png" alt="" width="30%" class="margin-top-10 margin-bottom-10" style="">
                    <br>
                    <a href="<?php echo $this->googleplus->loginURL();?>" class="signin-google" style="border: 1px solid #000; padding: 8px 25px;  border-radius: 7px;">
                       <img src="<?php echo base_url('assets/front-end/')?>images/google.png" width="22px">&nbsp;
                        Sign in with Google
                    </a>
                    <br>
                    <span style="color:#000">or</span>
                     
                      
                </div>

                <!--Tabs -->
                <div class="sign-up-form style-1">
                        <!-- Login -->
                        
                        <!-- Register -->
                      
                            <div id="register_response">

                            </div>
                            <p class="form-row form-row-wide">
                                <label for="username2"><!--Name:-->
                                   <!-- <i class="im im-icon-Male"></i>-->
                                    <input type="text" placeholder="Full Name" class="input-text" name="name" id="name" value="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" />
                                </label>
                                <span id='name_id'></span>
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="email2"><!--Email Address:-->
                                    <!--<i class="im im-icon-Mail"></i>-->
                                    <input type="text" class="input-text" placeholder="Email Id" name="email" id="email2" value="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Id'" />
                                </label>
                                <span id='email_id'></span>
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="email2"><!--Mobile:-->
                                    <!--<i class="im im-icon-Mail"></i>-->
                                    <input type="text" class="input-text" name="phone" placeholder="Mobile Number" id="phone" value="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile Number'" />
                                </label>
                                <span id='phone_id'></span>
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="password1"><!--Password:-->
<!--
                                    <i class="im im-icon-Lock-2"></i>
-->
                                    <input class="input-text" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" type="password" name="password1" id="password1" onfocus="this.placeholder = ''" onblur="this.placeholder = '&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;'" />
                                </label>
                                <span id='pass1_id'></span>
                            </p>

                            <!--<p class="form-row form-row-wide">
                                <label for="password2">Repeat Password:
                                    <i class="im im-icon-Lock-2"></i>
                                    <input class="input-text" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" type="password" name="password_confirm" id="password2" onfocus="this.placeholder = ''" onblur="this.placeholder = '&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;'" />
                                </label>
                                <span id='pass2_id'></span>
                            </p>-->
                            
                            <a href="#sign-in-dialog" class="button border fw margin-top-10 popup-with-zoom-anim">&lt;&lt;&nbsp;Login</a>
                           
                            <input type="submit" class="button border fw margin-top-10 f-right" name="register" value="Sign Up >>" onclick="return submit_registration();" />
                            <!-- <a href="#sign-in-dialog" class="button border fw margin-top-10">Login</a> -->
                            
                     
                </div>
            </div>
        </div>
            <!-- Sign Up Popup / End -->
            <!-- forgot password Popup -->
            <div id="small-dialog" class="zoom-anim-dialog mfp-hide">

                <div class="small-dialog-header">
                    <h3>Forgot Password</h3>
                </div>

                <!--Tabs -->
                <!-- <div class="sign-in-form style-1"> -->
                <span id="forgot_response"></span>
                <p class="form-row form-row-wide">
                    <label for="username">Email:
                        <i class="im im-icon-Male"></i>
                        <input type="email" class="input-text" name="forgot_email" id="forgot_email" value="" />
                    </label>
                </p>
                <div class="form-row">
                    <input type="submit" class="button border margin-top-5" name="submit" value="Submit" onclick="return submit_forgot_pass();" />
                </div>
                <!-- </div> -->
            </div>
            <!-- forgot password Popup / End -->
        </div>
    </div>
    <!-- Header / End -->

</header>
<div class="clearfix"></div>
<script type="text/javascript">
    function submit_login() {
        var identity = $('#identity').val();
        var password = $('#password').val();
        var data_list = {
            identity: identity,
            password: password
        };
        $.ajax({
            url: '<?=base_url();?>auth/login_ajax/',
            type: 'POST',
            data: data_list,
            dataType: 'json',
            success: function(result) {
                /*alert(result.message);*/
                $('#login_response').html(result.message);
                if (result.status == 1) {
                    setInterval('location.reload()', 1500);
                }
            }
        });
    }

    function submit_registration() {
        var name = $('#name').val();
        var email = $('#email2').val();
        var phone = $('#phone').val();
        var password1 = $('#password1').val();
        var password2 = $('#password2').val();
        var data_list = {
            name: name,
            email: email,
            phone: phone,
            password1: password1,
            password_confirm: password2
        };
        $.ajax({
            url: '<?=base_url();?>auth/create_user_ajax/',
            type: 'POST',
            data: data_list,
            dataType: 'json',
            success: function(result) {
                /*alert(result);
         			alert(result.message);*/
                /*$('#register_response').html(result.message);*/
                if(result.message == 'yes'){
                    $('#name_id').html(result.name_id);
                    $('#email_id').html(result.email_id);
                    $('#phone_id').html(result.phone_id);
                    $('#pass1_id').html(result.password1);    
                }else{
                $('#register_response').html(result.message);
                }
                if (result.status == 1) {
                    setInterval('location.reload()', 3000);
                }
            }
        });
    }

    function submit_forgot_pass() {
        var identity = $('#forgot_email').val();
        var data_list = {
            identity: identity
        };
        $.ajax({
            url: '<?=base_url();?>auth/ajax_forgot_password/',
            type: 'POST',
            data: data_list,
            dataType: 'json',
            success: function(result) {
                //alert(result.message);
                $('#forgot_response').html(result.message);
                /*if(result.status == 1){
                	setInterval('location.reload()', 3000);
                }*/
            }
        });
    }
</script>