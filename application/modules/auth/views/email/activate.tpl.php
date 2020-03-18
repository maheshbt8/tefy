<!-- <html>
<body>
	<h1><?php echo sprintf(lang('email_activate_heading'), $identity);?></h1>
	<p><?php echo sprintf(lang('email_activate_subheading'), anchor('auth/activate/'. $id .'/'. $activation, lang('email_activate_link')));?></p>
</body>
</html> -->


<div style="height:auto;">
    <table align="center" height="70%" width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>
        
        <tr>
            <td>
                <table  align="center" cellspacing="0" cellpadding="0" bgcolor="#F0F0F0" style="border: 1px solid  #101010;width: 50%;box-shadow: 0px 0px 7px 4px #737171;">
                    <tbody>
                       <tr>
            <td align="center" width="100%">
                <table align="center" width="690" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td width="100%" height="16"></td>
                        </tr>
                        <tr>
                            <td align="center" width="100%">
                                <a href="<?=base_url();?>" target="_blank" class="img_st"><img src="<?=base_url('assets/images/logo2.png');?>" alt="Tefy" border="0" height="40px" width="120px" style="display:block; margin-bottom: 2%;" class="CToWUd" draggable="false">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
                        <tr bgcolor="#ffffff">
                            <td>
                                <table width="630" align="center" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                       <!--  <tr>
                                            <td colspan="3" height="40"></td>
                                        </tr> -->
                                       <!--  <tr>
                                            <td colspan="3"><h1 style="font-family:Helvetica,Arial,sans-serif;color:#1f2836;font-size:30px;line-height:27px;font-weight:bold;padding:0;margin:0;font-size:36px;line-height:43px"><center><?php echo sprintf(lang('email_activate_heading'), $identity);?></center></h1><br><br><p style="font-family:Helvetica,Arial,sans-serif;color:#1f2836;font-size:18px;line-height:27px;font-weight:bold;padding:0;margin:0">Dear User,<br/>
                                            </td>
                                        </tr> -->
                                        <tr>
                                            <td colspan="3" height="12"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                            <p style="text-align: justify;font-family:Helvetica,Arial,sans-serif;color:#1f2836;font-size:18px;line-height:27px;font-weight:normal;padding:0;margin:0">
                        
                        <img src="<?=base_url('assets/front-end/images/activate-img.png');?>" width="100%" height="250px"/>

<br/><br/>
Dear User,
                        <h3 align="center" style="margin: -2px 0px -16px 0px;">We're glad you're here..!</h3>
                    </p></td>
                </tr>
                <tr><td colspan="3" height="40"></td></tr>
                <tr>
                    <td align="center"><table width="260" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td align="center" height="44" style="border-radius:3px;font-weight:bold;font-family:Helvetica,Arial,sans-serif;background-color:#0088cf"><span style="font-family:Helvetica,Arial,sans-serif;font-weight:bold">
                        <a href="<?php echo base_url('auth/activate/'. $id .'/'. $activation);?>" style="font-weight:bold;color:#ffffff;text-decoration:none;font-size:18px;line-height:44px;display:block;width:100%" target="_blank">Activate Account</a>
                    </span></td></tr></tbody></table></td>
            </tr><tr><td colspan="3"><p style="text-align: justify;font-family:Helvetica,Arial,sans-serif;color:#1f2836;font-size:14px;line-height:20px;font-weight:normal;padding:0;margin:0">
                       <br/>
                        Regards<br/>The Tefy Team<br/><a href="https://tefy.in" target="_blank">www.tefy.in</a>
                        <br/><br/>
                    </p></td><td colspan="3" height="40" style="padding:0;margin:0;font-size:1;line-height:0"><hr/></td></tr>
                </table>
            </td>
        </tr>
    </tbody></table>
</td></tr> </tbody>
</table><br/><br/><br/>
</div>
