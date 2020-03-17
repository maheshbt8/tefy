<!DOCTYPE html>

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
                    <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2><?=$title;?></h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="<?=base_url();?>">Home</a></li>
                            <li><?=$title;?></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
                <!-- start: page -->
                    <?php if($this->session->flashdata('error_message')!=''){
                                        echo '<div class="notification error closeable">'.$this->session->flashdata('error_message').'</div>';
                                    }elseif($this->session->flashdata('success_message')!=''){
                                        echo '<div class="notification success closeable">'.$this->session->flashdata('success_message').'</div>';
                                    }?>
                                    <!-- <div class="row">
            <div class="col-md-12">
                <div class="notification error closeable margin-bottom-30">
                    <p>Your listing <strong>Hotel Govendor</strong> has been approved!</p>
                    <a class="close"></a>
                </div>
            </div>
        </div> -->
        		<?php $this->load->view($content);?>
        			<!-- Copyrights -->
        			<!--<div class="col-md-12 fixed-bottom">
        				<div class="copyrights">© 2019 - One7 Incredic Services Private Limited. All rights Reserved.</div>
        			</div>-->
        	</div>
        
        </div>
        <!-- Dashboard / End -->
    </div>
    <!-- Wrapper / End -->

<!-- Scripts
================================================== -->
<?php $this->load->view('template/admin/scripts');?>
<script>
         $(document).ready(function()  {
<?php if($this->session->flashdata('error_message')!='' || $this->session->flashdata('success_message')!=''){?>
   setTimeout(function() {
       $(".alert_message").fadeOut(1500);
   },1500);
 <?php }?>
       });
       </script>
       
</body>
</html>