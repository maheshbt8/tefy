<!DOCTYPE html>
<html lang="en">
<head>
<!-- Basic Page Needs ================================================== -->
<?php
if($active_menu == 'listings_single' || $active_menu == 'blog_single'){
?>
<title><?php echo $title;?>-TEFY</title>
<?php }else{?>
<title>Online Search for Schools CBSE, SSC, ICSE,IB, Play, International schools, Admission and Online Pay fee | TEFY</title>
<?php }?>

<link rel=”canonicalize” href=”https://www.tefy.in”> 

 
<meta charset="utf-8">
<?php
if(isset($meta_description) && !empty($meta_description)){
    echo '<meta name="description" content="'.$meta_description.'">';
}else{
  ?>
  <meta name="description" content="TEFY- A unique school search platform, find List of nearby pre-schools, Montessori, Play schools, Day care, nursery, primary, High, CBSE, ICSE, IB, IGCSE, International, Residential & boarding schools- Admissions, Fee payment, Reviews, Fees ,Results ,Feedback & application forms." /> 
  <?php
}
if(isset($meta_keywords) && !empty($meta_keywords)){
    echo '<meta name="keywords" content="'.$meta_keywords.'">';
}
?>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="google-site-verification" content="hRlFhKey7dC5YP-qr3VlNfI1w_X0ULiPfDIzxnXf0Xw" /> 

<link rel="icon" type="image/png" href="<?php echo base_url('assets')?>/images/logo-fav.png">

<link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">


  
  
<!-- CSS
================================================== -->

<?php $this->load->view('template/site/topcss');?>
  
  <script type="application/ld+json"> 

{ 

 "@context" : "http://schema.org", 

 "@type" : "Organization", 

 "name" : "tefy", 

 "url" : "https://www.tefy.com", 

 "sameAs" : [ 

   "https://twitter.com/tefyindia", 

   "https://www.facebook.com/tefy.india", 

   "https://www.instagram.com/tefy.india", 

   "https://www.pinterest.com/tefyindia", 

   "https://www.tefy.in/blog" 

  ], 

} 

}</script> 
  <!-- Global site tag (gtag.js) - Google Analytics --> 

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158327011-1"></script> 

<script> 

  window.dataLayer = window.dataLayer || []; 

  function gtag(){dataLayer.push(arguments);} 

  gtag('js', new Date()); 

 

  gtag('config', 'UA-158327011-1'); 

</script> 
   
<!-- <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5e133cc97dc3a500126f4cd6&product=inline-share-buttons" async="async"></script> -->
<!-- <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5e133cc97dc3a500126f4cd6&product=image-share-buttons&cms=website' async='async'></script> -->
</head>

<body class="transparent-header">

    <!-- Wrapper -->
    <div id="wrapper">
   <?php if(!empty($active_menu) && $active_menu == "home" && $this->session->flashdata('message')!='') echo '<div class="notification notice closeable">'.$this->session->flashdata('message').'</div>'; ?>
    <!-- Header Container
    ================================================== --> 
    <?php $this->load->view('template/site/header');?>
    <!-- Header Container / End --> 
    <div class="clearfix"></div>
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
    <script>
         $(document).ready(function()  {
<?php if($this->session->flashdata('message')!=''){?>
   setTimeout(function() {
       $(".alert_message").fadeOut(1500);
   },1500);
 <?php }?>
       });
       </script>
       
</body>
</html>