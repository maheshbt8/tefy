


<div class="row">
    <form method="post" action="<?=base_url('admin/system_settings');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
            <div class="col-lg-6">
                    <!-- Section -->
                    <div class="add-listing-section margin-top-35">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-location"></i> Location</h3>
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
                                <div class="col-md-12">
                                    <h5>Email Password</h5>
                                     <input type="text" name="email_password" class="form-control" placeholder="System Name" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'email_password'))->row()->description; ?>">
                                </div>
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
                            </div>
                            <!-- Row / End -->

                        </div>
                    </div>
                    <!-- Section / End -->
                    <!-- <a href="#" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></a> -->
                    <button type="submit" class="button preview">Submit</button>

            </div>
</form>
   <form method="post" action="<?=base_url('admin/add_listing');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
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
        </div>





