<?php
$login_unique_id=$this->common_model->get_type_name_by_where('users',array('id'=>$this->session->userdata('user_id')),'unique_id');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Basic Page Needs ================================================== -->
<?php
if($active_menu == 'listings_single' || $active_menu == 'blog_single'){
?>

<title><?php echo $title;?>-TEFY <?php if($active_menu == 'listings_single'){?>: Your TEFY friend has invited you to check this school at TEFY. Search schools, apply admissions and get discounts on fee.
USE Referal Code: <?php echo $login_unique_id;?>  to avail discounts on admission.<?php }?></title>
<?php }else{?>
<title>Online Search for Schools CBSE, SSC, ICSE,IB, Play, International schools, Admission and Online Pay fee | TEFY</title>
<?php }?>

<link rel="canonical" href="https://www.tefy.in"> 

 
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
<meta property="og:title" content="TEFY – A One Place Destination for School Admissions" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://www.tefy.in/" />
<meta property="og:image" content="<?php echo base_url('assets')?>/front-end/images/logo2.svg" />
<meta property="og:image:height" content="200" />
<meta property="og:image:width" content="400" />
<meta property="og:image:secure_url" content="<?php echo base_url('assets')?>/front-end/images/logo2.svg" />
<meta property="og:site_name" content="TEFY" />
<meta property="fb:admins" content="TEFY" />
<meta property="og:locale" content="en_us" />
<meta property="og:description" content="Online Search for Schools CBSE, SSC, ICSE,IB, Play, International schools, Admission and Online Pay fee | TEFY." />

<?php
if($active_menu == 'listings_single' || $active_menu == 'blog_single'){
?>
 <meta name="og:image" itemprop="image" content="<?=$og_image;?>"/>  

          <meta property="og:title" content="<?=$title;?> - TEFY" />
          <meta property="og:description" content="<?=$meta_description;?>"/>
          <meta property="og:image" content="<?=$og_image;?>" />
        <meta property="og:image:secure_url" content="<?=$og_image;?>" />
    
    
        <?php }?>
        

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="google-site-verification" content="hRlFhKey7dC5YP-qr3VlNfI1w_X0ULiPfDIzxnXf0Xw" /> 

<link rel="icon" type="image/png" href="<?php echo base_url('assets')?>/images/logo-fav.png">

<link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">


  
  
<!-- CSS
================================================== -->

<?php $this->load->view('template/site/topcss');?>
  
<script type="application/ld+json"> 
  { 
  "@context": "https://schema.org", 
  "@type": "Organization", 
  "name": "TEFY", 
  "url": "https://www.tefy.in/", 
  "logo": "<?php echo base_url('assets')?>/front-end/images/logo2.svg", 
  "contactPoint": [{ 
  "@type": "ContactPoint", 
  "telephone": "+91- 7075418792", 
  "contactType": "customer service" 
  }], 
  "sameAs": [ 
                "https://twitter.com/tefyindia", 
  
     "https://www.facebook.com/tefy.india", 
  
     "https://www.instagram.com/tefy.india", 
  
  "https://www.pinterest.com/tefyindia", 
  
  "https://www.tefy.in/blog"




  ] 
  } 

  </script>


  <script type="application/ld+json"> 
  { 
  "@context": "https://schema.org", 
  "@type": "WebSite", 
  "name": "TEFY", 
  "url": "https://www.tefy.in/", 
  "potentialAction": { 
  "@type": "SearchAction", 
  "target": "https://www.tefy.in/google-search/?search_query={search_term_string}", 
  "query-input": "required name=search_term_string" 
  } 
  } 
  </script>

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