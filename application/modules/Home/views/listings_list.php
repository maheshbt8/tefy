
<!-- Body start
================================================== -->
<div class="container margin-top-30">
	<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div >
                <?php
                $this->load->view('short_search');
                ?>
			</div>
		</div>
		
     
        
		<div class="col-lg-9 col-md-8 col-sm-8 padding-right-30">
             <h3 class="listing-desc-headline ">Schools for you</h3>
		

			<div class="row">

				<!-- Listing Item -->
				<div class="col-lg-12 col-md-12">
					<?php
					if(count($schools) > 0){
$i=0;
foreach ($schools as $row) {
	$category='';
  $cate=json_decode($row['category']);
  if($cate!=''){
  for($c=0; $c < count($cate); $c++) { 
    $categ[]=$this->common_model->get_type_name_by_where('category',array('id'=>$cate[$c]));
  }
  $category=implode(', ',$categ);
}
	$opening_hours=json_decode($row['opening_hours']);
	$reslut=$this->common_model->get_days();

  $days=$reslut['days'];
  $loop=$reslut['timings'];
for ($i=0; $i < count($days); $i++) {
	if($days[$i] == date('l')){
	if($opening_hours->opening_time[$i]=='Closed'){
	$opening='Closed Now';
	$opening_col='now-closed';
	}else{
	if((strtotime(date('h A')) >= strtotime($opening_hours->opening_time[$i])) && (strtotime(date('h A')) <= strtotime($opening_hours->closing_time[$i]))){
		$opening='Now Open';
		$opening_col='now-open';
	}else{
		$opening='Closed Now';
		$opening_col='now-closed';
	}
	}
	}
	}
	$where['row_status']=1;
$where['listing_id']=$row['id'];
$where['row_status']=1;
$rating=round($this->common_model->rating_of_product('ratings', $where ,'rating'),1);

/*$class=array();
	$classes=json_decode($row['class']);
	for($c=0; $c < count($classes); $c++) { 
		$class[]=$this->common_model->get_type_name_by_where('classes',array('id'=>$classes[$c]));
	}*/

?>

<div class="row padding-top-15 padding-bottom-15 margin-top-15 margin-bottom-15" style="background-color: #f7f7f7; border-radius: 5px;">
	<a href="<?=base_url().str_replace(" ","-",$row['school_name']).'?school_code='.$row['school_code'];?>">
		<!-- <a href="<?php echo base_url('listings-single?school=').$row['school_name'].'&school_code='.$row['school_code'];?>"> -->
                        <div class="col-md-4 col-sm-4 col-xs-3 padding-right-0">
                            <img src="<?=base_url('uploads/listings/thumb/').$row['id'].'.jpg';?>"class="" style="border-radius: 5px;" alt="">
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-9">
                            <div class="listing-item-inner">
                                <div class="listing-titlez single-line"><b><?=$row['school_name'];?></b></div>
                                <span class="vision-txt single-line margin-bottom-20">"<?=$row['vision'];?>"</span>
                            </div>
                            <?php if ($this->ion_auth->logged_in()){?>
								<span class="like-icon <?php if($this->common_model->get_type_name_by_where('bookmarks',array('user_id'=>$this->session->userdata('user_id'),'listing_id'=>$row['id']),'row_status')==1){echo 'liked';}?>" onclick="return add_bookmark('<?=$row['id'];?>')"></span><?php }?>
                        </div>

                        <div class="col-md-8 col-sm-8 col-xs-8 single-line"><b>Board:</b> <?=$this->common_model->get_type_name_by_where('curriculum',array('id'=>$row['curriculum']));?></div>
                        <div class="col-md-8 col-sm-8 col-xs-8 single-line"><b>Grade:</b> <?=$row['class'];?></div>
                        <div class="col-md-8 col-sm-8 col-xs-12 single-line"><b>Category:</b> <?=$category;?></div>
                        <div class="col-md-8 col-sm-8 col-xs-12 single-line"><b>Address:</b> <?=$row['address'];?></div>
                        <div class="col-md-8 col-sm-8 col-xs-12 single-line">
                        <?php if(isset($_GET['class']) && $_GET['class']!=''){?>       
                            <div class="resp-subtitle txtoverflow resp-tut-fee">Tution fee for <?=$this->common_model->get_type_name_by_where('classes',array('id'=>$row['class_id']));?><b>-&nbsp;<i class="fa fa-inr"></i>&nbsp; <?=$row['tution_fee'];?></b></div>
                        <?php }?>
                            <div class="star-rating" data-rating="<?=$rating;?>">
                                <div class="rating-counter">(<?=$this->common_model->count_records('ratings',$where);?> reviews)</div>
                            </div>
                        </div>
                    </a>
                    </div>
                  <!--  <div class="col-lg-12 col-md-12">
                        <section id="not-found" class="center">
                            <img src="<?=base_url('assets/front-end/');?>images/no-data.png" width="70%">
                            <p>Awww!<br> We are trying hard to onboard more schools of your choice until then we have more options for you!</p>
                        </section>
                    </div>-->
		 <!-- Listing Item -->
				
				<!-- Listing Item / End -->
<?php $i++;}}else{

	echo '<section id="not-found" class="center"><img src="'.base_url('assets/front-end/').'images/no-data.png" width="70%"><p>Awww!<br> We are trying hard to onboard more schools of your choice until then we have more options for you!</p>
    <a href="'.base_url('listings-list').'" class="button border margin-top-10">View all schools</a>
    </section>';
}?>
					
                    
                    
                    
                  
                        
                        
				
				</div>
				<!-- Listing Item / End -->

				

				

			</div>

			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-top-20 margin-bottom-40">
						<nav class="pagination">
							
							<?php echo $pagination; ?>
						</nav>
					</div>
				</div>
			</div>
			<!-- Pagination / End -->

		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-3 col-md-4 col-sm-4">
      
		    <div id="side-filter" class="side-filter">
             
                <?php
                $this->load->view('list_filter');
                ?>
			</div>
			 
			<div id="filter-dialog" class=" zoom-anim-dialog mfp-hide filter-dialog1">
           
                <?php
                $this->load->view('list_filter');
                ?>
			</div>
		</div>
		<!-- Sidebar / End --> 
        

	</div>
</div>

            

<div class="bottom-nav">
<div class="bottom-menus" href="#" style="background-color: black; width: 100vw;">
    <ul>
        <a href="#filter-dialog" class="sign-in popup-with-zoom-anim"> 
            <li class="mw-100">
              <i class="sl sl-icon-filter"></i>  Apply Filters
            </li>
        </a>
        
    </ul>
     
      </div>
</div>
  
<!-- <?php
echo "<pre>";
print_r($_GET);
?> -->