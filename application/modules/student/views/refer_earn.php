  <div class="row">
<div class="col-md-8 col-md-offset-2">
				
                <div  style="text-align: center;" >
                    <img src="<?php echo base_url('assets/front-end/')?>images/refer-earn.jpg" alt="" width="50%"  >
                    <div>
                        <!--<h3>Refer & Earn<b> <?=$this->db->get_where('settings', array('setting_type' => 'refer_money'))->row()->description; ?></b>coins</h3>-->
                        
                        <h2>Referral Code: <b><?=$this->common_model->get_type_name_by_where('users',array('id'=>$this->session->userdata('user_id')),'unique_id');?> </b></h2>
                       <p style="color: #000">
                      Refer a school to your friend and upon his successful admission through TEFY, you will be rewarded with <b><?=$this->db->get_where('settings', array('setting_type' => 'refer_money'))->row()->description; ?> Tefy coins</b> by using referral code.</p>
                        
                    </div>
                    
                    
                  <!--  <div class="copy-link  margin-top-10">
                        ><button class="js-emailcopybtn" style="width: 100%; background-color: black; border: 0; border-radius: 5px; font-size: 13px;">Copy link</button>
                    </div>-->
                </div>
                <div id="share-buttons">
                    <ul class="share-buttons margin-top-10 margin-bottom-0 " style=" text-align: center;">
                        <li><a class="fb-share" href="http://www.facebook.com/sharer.php?u=<?=$share_url;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter-share" href="https://twitter.com/share?url=<?=$share_url;?>&amp;text=<?=$school['school_name']?>&amp;hashtags=simplesharebuttons" target="_blank"><i class="fa fa-twitter"></i> </a></li>
                        <li><a class="gplus-share" href="https://plus.google.com/share?url=<?=$share_url;?>" target="_blank"><i class="fa fa-google-plus"></i> </a></li>
                        <li><a class="pinterest-share" href="https://api.whatsapp.com/send?text=<?=$share_url;?>"  target="_blank"><i class="fa fa-whatsapp"></i> </a></li>
                    </ul>
                </div>
                 
						

<style>
.copy-link{
    display: flex;
}

</style>
				</div>
			</div>