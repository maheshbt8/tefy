<!DOCTYPE html>
<head>
<!-- Basic Page Needs
================================================== -->
<title><?php echo $title;?>-Tefy</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<?php $this->load->view('template/site/topcss');?>

</head>

<body class="transparent-header">

    <!-- Wrapper -->
    <div id="wrapper">
   <?php if(!empty($active_menu) && $active_menu == "home") echo $this->session->flashdata('message'); ?>
    <!-- Header Container
    ================================================== --> 
    <?php $this->load->view('template/site/header');?>
    <!-- Header Container / End -->
    
    <!-- Content
    ================================================== -->
    <?php $this->load->view($content);?>
    <!-- Header Container / End -->
    
    <!-- Footer
    ================================================== -->
    <?php $this->load->view('template/site/footer');?>
    <!-- Footer / End -->
    
    <!-- Back To Top Button -->
    <div id="backtotop"><a href="#"></a></div>
    
    </div>
    <!-- Wrapper / End -->
    
    
    <!-- Scripts
    ================================================== -->
    <?php $this->load->view('template/site/scripts');?>
    
    
    <!-- Style Switcher
    ================================================== -->
    <script src="<?php echo base_url('assets')?>/scripts/switcher.js"></script>
    
    <div id="style-switcher">
    	<h2>Color Switcher <a href="#"><i class="sl sl-icon-settings"></i></a></h2>
    	
    	<div>
    		<ul class="colors" id="color1">
    			<li><a href="#" class="main" title="Main"></a></li>
    			<li><a href="#" class="blue" title="Blue"></a></li>
    			<li><a href="#" class="green" title="Green"></a></li>
    			<li><a href="#" class="orange" title="Orange"></a></li>
    			<li><a href="#" class="navy" title="Navy"></a></li>
    			<li><a href="#" class="yellow" title="Yellow"></a></li>
    			<li><a href="#" class="peach" title="Peach"></a></li>
    			<li><a href="#" class="beige" title="Beige"></a></li>
    			<li><a href="#" class="purple" title="Purple"></a></li>
    			<li><a href="#" class="celadon" title="Celadon"></a></li>
    			<li><a href="#" class="red" title="Red"></a></li>
    			<li><a href="#" class="brown" title="Brown"></a></li>
    			<li><a href="#" class="cherry" title="Cherry"></a></li>
    			<li><a href="#" class="cyan" title="Cyan"></a></li>
    			<li><a href="#" class="gray" title="Gray"></a></li>
    			<li><a href="#" class="olive" title="Olive"></a></li>
    		</ul>
    	</div>
    		
    </div>
<!-- Style Switcher / End -->
</body>
</html>