<?php
$this->session->set_userdata('last_page',current_url().'?blog_title='.$_GET['blog_title'].'&blog='.$_GET['blog']);
?>
<form method="post" action="<?=$this->session->userdata('last_page');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
<div class="row">
			<div class="col-lg-12">

				<div id="add-listing">

					<!--Basic Info Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-6">
								<h5>Title</h5>
								<input class="search-field" type="text" value="<?=((set_value('title') !='')? set_value('title') : $blog['title'] );?>" name="title" required="" autocomplete="off" />
								<?php echo form_error('title', '<div class="error">', '</div>'); ?>
							</div>
							<div class="col-md-6">
								<h5>Thumb Image</h5>
								<input class="search-field" type="file" value="<?=set_value('title');?>" name="file" />
								<?php echo form_error('file', '<div class="error">', '</div>'); ?>
							</div>
						</div>
						<div class="add-listing-section margin-top-45">
						
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-book-open"></i>Rating For Blog</h3>
							<!-- Switcher -->
							<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
						</div>

						<!-- Switcher ON-OFF Content -->
						<div class="switcher-content">

							<div class="row">
								<div class="col-md-12">
									<table id="pricing-list-container">
										<?php
										$rat=json_decode($blog['ratings']);
                                        //print_r($rat);die;
										for($i=0;$i<count($rat->rating_for);$i++) {
										?>
										<tr class="pricing-list-item pattern">
											<td>
												<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
												<div class="fm-input ">
                                                    <input type="text" placeholder="Rating For" name="rating_for[]" required="" id="rat[]" value="<?=$rat->rating_for[$i]?>" />
                                                </div>
                                                <div class="fm-input ">
                                                    <input type="number" placeholder="Rating" min="1" max="10" name="rating[]" required="" id="rati[]" value="<?=$rat->rating[$i]?>" />
                                                </div>
												<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
											</td>
										</tr>
										<?php
										}
										?>
									</table>
									<a href="#" class="button add-pricing-list-item">Add Item</a>
									
								</div>
							</div>

						</div>
						<!-- Switcher ON-OFF Content / End -->

					</div>
						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Keywords</h5>
							<textarea type="text" class="form-control" name="keywords" value="" required=""><?=((set_value('keywords') !='')? set_value('keywords') : $blog['keywords'] );?></textarea>
							<?php echo form_error('keywords', '<div class="error">', '</div>'); ?>
							</div>
						</div>
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Short Note</h5>
							<textarea type="text" class="form-control" name="short_note" value="<?=set_value('short_note');?>" required=""><?=((set_value('short_note') !='')? set_value('short_note') : $blog['short_note'] );?></textarea>
							<?php echo form_error('short_note', '<div class="error">', '</div>'); ?>
							</div>
						</div>
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Description</h5>
							<textarea type="text" class="form-control" name="desc" value="<?=set_value('desc');?>" required=""><?=((set_value('desc') !='')? set_value('desc') : $blog['desc'] );?></textarea>
							<?php echo form_error('desc', '<div class="error">', '</div>'); ?>
							</div>
						</div>
                        

                        
<button type="submit" class="button preview">Submit</button>
					</div>
					<!-- Admission Procedure Section / End -->
                    
                    
					

				</div>
			</div>

		</div>

</form>

<script type="text/javascript" src="<?php echo base_url('assets')?>/scripts/ckeditor/ckeditor.js"></script> 


<script>
    CKEDITOR.replace('desc');
</script>
<br/><br/>
<div class="clearfix"></div>