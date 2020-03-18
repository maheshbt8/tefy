<div class="row">
    <form method="post" action="<?=base_url('admin/system_settings');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
            <div class="col-lg-6">
                    <!-- Section -->
                    <div class="add-listing-section margin-top-35">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-location"></i> System Settings</h3>
                        </div>

                        <div class="submit-section">

                            <!-- Row -->
                            <div class="row with-forms">.
                                <div class="col-md-12">
                                    <h5>System Name</h5>
                                     <input type="text" name="system_name" class="form-control" placeholder="System Name" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'system_name'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>System Title</h5>
                                     <input type="text" name="system_title" class="form-control" placeholder="System Name" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'system_title'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>System Email</h5>
                                     <input type="text" name="system_email" class="form-control" placeholder="System Name" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'system_email'))->row()->description; ?>">
                                </div>
                                <!-- <div class="col-md-12">
                                    <h5>Email Password</h5>
                                     <input type="text" name="email_password" class="form-control" placeholder="System Name" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'email_password'))->row()->description; ?>">
                                </div> -->
                                <div class="col-md-12">
                                    <h5>Mobile Number</h5>
                                     <input type="text" name="mobile" class="form-control" placeholder="System Name" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'mobile'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>WhatsApp Number</h5>
                                     <input type="text" name="whatsapp_number" class="form-control" placeholder="System Name" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'whatsapp_number'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>Address</h5>
                                    <textarea name="address" rows="5" class="form-control" placeholder="Enter Address" required=""><?=$this->db->get_where('settings', array('setting_type' => 'address'))->row()->description; ?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <h5>Facebook Link</h5>
                                      <input type="url" name="fb" class="form-control" placeholder="eg.: https://facebook.com" value="<?=$this->db->get_where('settings', array('setting_type' => 'facebook'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>Twiter Link</h5>
                                    <input type="url" name="twiter" class="form-control" placeholder="eg.: https://twiter.com" value="<?=$this->db->get_where('settings', array('setting_type' => 'twiter'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>Youtube Link</h5>
                                    <input type="url" name="youtube" class="form-control" placeholder="eg.: https://youtube.com" value="<?=$this->db->get_where('settings', array('setting_type' => 'youtube'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>Instagram</h5>
                                      <input type="url" name="instagram" class="form-control" placeholder="eg.: https://instagram.com" value="<?=$this->db->get_where('settings', array('setting_type' => 'instagram'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>Linkedin</h5>
                                      <input type="url" name="linkedin" class="form-control" placeholder="eg.: https://linkedin.com" value="<?=$this->db->get_where('settings', array('setting_type' => 'linkedin'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>Pinterest</h5>
                                      <input type="url" name="pinterest" class="form-control" placeholder="eg.: https://pinterest.com" value="<?=$this->db->get_where('settings', array('setting_type' => 'pinterest'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>Tumblr</h5>
                                      <input type="url" name="tumblr" class="form-control" placeholder="eg.: https://tumblr.com" value="<?=$this->db->get_where('settings', array('setting_type' => 'tumblr'))->row()->description; ?>">
                                </div>
                            </div>
                            <!-- Row / End -->

                        </div>
                    </div>
                    <!-- Section / End -->
                    <!-- <a href="#" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></a> -->
                    <button type="submit" class="button preview">Submit</button>

            </div>
</form>
<form method="post" action="<?=base_url('admin/system_settings');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
            <div class="col-lg-6">
                    <!-- Section -->
                    <div class="add-listing-section margin-top-35">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-location"></i> Email Settings</h3>
                        </div>

                        <div class="submit-section">

                            <!-- Row -->
                            <div class="row with-forms">.
                                <div class="col-md-12">
                                    <h5>SMTP PORT</h5>
                                    <input type="text" name="smtp_port" class="form-control" placeholder="SMTP PORT" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'smtp_port'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>SMTP HOST</h5>
                                    <input type="text" name="smtp_host" class="form-control" placeholder="SMTP HOST" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'smtp_host'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>SMTP Username</h5>
                                    <input type="text" name="smtp_username" class="form-control" placeholder="SMTP Username" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'smtp_username'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>SMTP Password</h5>
                                    <input type="text" name="smtp_password" class="form-control" placeholder="SMTP Password" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'smtp_password'))->row()->description; ?>">
                                </div>
                            </div>
                            <!-- Row / End -->

                        </div>
                    </div>
                    <!-- Section / End -->
                    <!-- <a href="#" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></a> -->
                    <button type="submit" class="button preview">Submit</button>

            </div>
</form>
   <form method="post" action="<?=base_url('admin/system_settings');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
            <div class="col-lg-6">
                    <!-- Section -->
                    <div class="add-listing-section margin-top-35">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-location"></i> SMS Settings</h3>
                        </div>

                        <div class="submit-section">

                            <!-- Row -->
                            <div class="row with-forms">.
                                <div class="col-md-12">
                                    <h5>Username</h5>
                                    <input type="text" name="sms_username" class="form-control" placeholder="System Name" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'sms_username'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>Sender</h5>
                                    <input type="text" name="sms_sender" class="form-control" placeholder="System Title" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'sms_sender'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>Hash Key</h5>
                                    <input type="text" name="sms_hash" class="form-control" placeholder="System Title" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'sms_hash'))->row()->description; ?>">
                                </div>
                            </div>
                            <!-- Row / End -->

                        </div>
                    </div>
                    <!-- Section / End -->
                    <!-- <a href="#" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></a> -->
                    <button type="submit" class="button preview">Submit</button>

            </div>
</form>
<form method="post" action="<?=base_url('admin/system_settings');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
            <div class="col-lg-6">
                    <!-- Section -->
                    <div class="add-listing-section margin-top-35">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-location"></i> Google Login</h3>
                        </div>

                        <div class="submit-section">

                            <!-- Row -->
                            <div class="row with-forms">.
                                <div class="col-md-12">
                                    <h5>Client ID</h5>
                                    <input type="text" name="google_client_id" class="form-control" placeholder="Client ID" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'google_client_id'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>Client Secret</h5>
                                    <input type="text" name="google_client_secret" class="form-control" placeholder="Client Secret" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'google_client_secret'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>Api Key</h5>
                                    <input type="text" name="google_api_key" class="form-control" placeholder="Api Key" value="<?=$this->db->get_where('settings', array('setting_type' => 'google_api_key'))->row()->description; ?>">
                                </div>
                            </div>
                            <!-- Row / End -->

                        </div>
                    </div>
                    <!-- Section / End -->
                    <!-- <a href="#" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></a> -->
                    <button type="submit" class="button preview">Submit</button>

            </div>
</form>
<form method="post" action="<?=base_url('admin/system_settings');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
            <div class="col-lg-6">
                    <!-- Section -->
                    <div class="add-listing-section margin-top-35">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-location"></i> CashFree</h3>
                        </div>

                        <div class="submit-section">

                            <!-- Row -->
                            <div class="row with-forms">.
                                <div class="col-md-12">
                                    <h5>Mode</h5>
                                    <input type="text" name="cashfree_payment_mode" class="form-control" placeholder="Mode" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'cashfree_payment_mode'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>Secret Key</h5>
                                    <input type="text" name="cashfree_secret_key" class="form-control" placeholder="Secret Key" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'cashfree_secret_key'))->row()->description; ?>">
                                </div>
                                <div class="col-md-12">
                                    <h5>Api Key</h5>
                                    <input type="text" name="cashfree_appId" class="form-control" placeholder="Api Key" value="<?=$this->db->get_where('settings', array('setting_type' => 'cashfree_appId'))->row()->description; ?>">
                                </div>
                            </div>
                            <!-- Row / End -->

                        </div>
                    </div>
                    <!-- Section / End -->
                    <!-- <a href="#" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></a> -->
                    <button type="submit" class="button preview">Submit</button>

            </div>
</form>
 <form method="post" action="<?=base_url('admin/system_settings');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
            <div class="col-lg-6">
                    <!-- Section -->
                    <div class="add-listing-section margin-top-35">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-location"></i> Refer & Earn</h3>
                        </div>

                        <div class="submit-section">

                            <!-- Row -->
                            <div class="row with-forms">.
                                <div class="col-md-12">
                                    <h5>For Refer</h5>
                                    <input type="text" name="refer_money" class="form-control" placeholder="Refer Money" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'refer_money'))->row()->description; ?>" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                                </div>
                            </div>
                            <!-- Row / End -->

                        </div>
                    </div>
                    <!-- Section / End -->
                    <!-- <a href="#" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></a> -->
                    <button type="submit" class="button preview">Submit</button>

            </div>
</form>
        </div>





