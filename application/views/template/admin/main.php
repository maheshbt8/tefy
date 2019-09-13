<!DOCTYPE html>

<!-- Mirrored from www.vasterad.com/themes/listeo_082019/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Aug 2019 16:17:55 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title><?php echo $title;?>-Tefy</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<?php $this->load->view('template/admin/topcss');?>

</head>

<body>
    <!-- Wrapper -->
    <div id="wrapper">
    
        <!-- Header Container
        ================================================== -->
        <?php $this->load->view('template/admin/header');?>
        <!-- Header Container / End -->
        
        
        <!-- Dashboard -->
        <div id="dashboard">
        
        	<!-- Navigation
        	================================================== -->
        	<?php $this->load->view('template/admin/side_menu');?>	
        	<!-- Navigation / End -->
        
        
        	<!-- Content
        	================================================== -->
        	<div class="dashboard-content">
        		<?php $this->load->view($content);?>
        			<!-- Copyrights -->
        			<div class="col-md-12">
        				<div class="copyrights">© 2019 TEFY. All Rights Reserved.</div>
        			</div>
        	</div>
        
        </div>
        <!-- Dashboard / End -->
    </div>
    <!-- Wrapper / End -->

<!-- Scripts
================================================== -->
<?php $this->load->view('template/admin/scripts');?>

</body>
</html>