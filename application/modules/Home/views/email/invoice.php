<!-- <html>
<body>
	<h1><?php echo sprintf(lang('email_activate_heading'), $identity);?></h1>
	<p><?php echo sprintf(lang('email_activate_subheading'), anchor('auth/activate/'. $id .'/'. $activation, lang('email_activate_link')));?></p>
</body>
</html> -->


<div style="height:100%;background: -webkit-linear-gradient(bottom, #005bea, #00c6fb);">
    <table align="center" height="70%" width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>
        <tr>
            <td align="center" width="100%">
                <table align="center" width="690" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td width="100%" height="16"></td>
                        </tr>
                        <tr>
                            <td align="center" width="100%">
                                <a href="<?=base_url();?>" target="_blank"><img src="<?=base_url('assets/images/logo2.png');?>" alt="Tefy" border="0" height="30%" width="50%" style="display:block" class="CToWUd" draggable="false">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table width="690" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#F0F0F0">
                    <tbody>
                        <tr bgcolor="#ffffff">
                            <td>
                                <table width="630" align="center" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td colspan="3" height="40"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><h1 style="font-family:Helvetica,Arial,sans-serif;color:#1f2836;font-size:30px;line-height:27px;font-weight:bold;padding:0;margin:0;font-size:36px;line-height:43px"><center>Payment Invoice</center></h1><br><br><p style="font-family:Helvetica,Arial,sans-serif;color:#1f2836;font-size:18px;line-height:27px;font-weight:bold;padding:0;margin:0">Dear <?=$name;?>,<br/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" height="12"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><p style="text-align: justify;font-family:Helvetica,Arial,sans-serif;color:#1f2836;font-size:18px;line-height:27px;font-weight:normal;padding:0;margin:0">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?=$message;?>
                    </p></td>
                </tr>
                <tr><td colspan="3" height="40"></td></tr>
                <tr><td colspan="3"><p style="text-align: justify;font-family:Helvetica,Arial,sans-serif;color:#1f2836;font-size:14px;line-height:20px;font-weight:normal;padding:0;margin:0">
                       <br/>
                        Regards<br/>The Tefy Team<br/><a href="http://tefy.com" target="_blank">www.tefy.com</a>
                        <br/><br/>
                    </p></td><td colspan="3" height="40" style="padding:0;margin:0;font-size:1;line-height:0"><hr/></td></tr>
                </table>
            </td>
        </tr>
    </tbody></table>
</td></tr> </tbody>
</table><br/><br/><br/>
</div>
