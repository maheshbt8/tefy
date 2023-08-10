<form action="<?=base_url('listings-list');?>" methor="get">
 <h3 class="listing-desc-headline ">Filters</h3>
<div class="sidebar">

				<!-- Widget -->
				<div class="widget margin-bottom-20 padding-top-15">
					

					
                     <div class="toggle-wrap">
                        <span class="trigger "><a href="#">Fee & Class<i class="sl sl-icon-plus"></i></a></span>
                        <div class="toggle-container padding-left-15 padding-right-15"> 
                             <!-- Area Range -->
                            <div class="range-slider">
                                <input class="distance-radius" type="range" min="0" max="1000000" step="1000" value="<?=$_GET['tution_fee']?>" data-title="Tution Fees Upto" name="tution_fee">
                            </div>
                              <!-- Row -->
                            <div class="row with-forms">
                                <!-- Board -->
                                <div class="col-md-12">
                                   <!-- <h4>Class</h4>-->
                                    <select  name="class">
                                        <option value="">Select Class</option>
                                                            <?php
                $category=$this->common_model->select_results_info('classes',array('row_status'=>1))->result_array();
                if($category!=''){
                $c=0;foreach ($category as $cat) {
                ?>
                                       <option value="<?=$cat['id'];?>" <?=(($_GET['class']==$cat['id'])? 'selected' : '')?>>
                                        <?=$cat['name'];?>
                                       </option>
        <?php $c++;}}?>
                                    </select>
        <!-- 							<div id="ck-button">
                                        <?php
                $category=$this->common_model->select_results_info('classes',array('row_status'=>1))->result_array();
                if($category!=''){
                $c=0;foreach ($category as $cat) {
                ?>
                                       <label>
                                          <input type="radio" value="<?=$cat['id'];?>" name="class[]"><span><?=$cat['name'];?></span>
                                       </label>
        <?php $c++;}}?>
                                    </div> -->
                                </div>
                            </div>
                            <!-- Row / End -->
                        </div>
                    </div>
                    
                    <div class="toggle-wrap">
                        <span class="trigger "><a href="#">Board<i class="sl sl-icon-plus"></i></a></span>
                        <div class="toggle-container padding-0"> 
                            <!-- Row -->
                            <div class="row with-forms">
                                <!-- Board -->
                                <div class="col-md-12">
                                  <!--  <h4>Board</h4>-->
                                    <div id="ck-button">
                                        <?php
                $category=$this->common_model->select_results_info('curriculum',array('row_status'=>1))->result_array();
                if($category!=''){
                $c=0;foreach ($category as $cat) {
                ?>
                                       <label>
                                          <input type="checkbox" value="<?=$cat['id'];?>" name="board[]"  <?=(($_GET['board'][$c]==$cat['id'])? 'checked' : '')?>><span><?=$cat['name'];?></span>
                                       </label>
        <?php $c++;}}?>
                                    </div>
                                </div>
                            </div>
                            <!-- Row / End -->
                        </div>
                    </div>

                    <div class="toggle-wrap">
                        <span class="trigger "><a href="#">Medium<i class="sl sl-icon-plus"></i></a></span>
                        <div class="toggle-container padding-0"> 
                            <!-- Row -->
                            <div class="row with-forms">
                                <!-- Medium -->
                                <div class="col-md-12">
                                   <!-- <h4>Medium</h4>-->
                                    <div id="ck-button">
                                        <?php
                $category=$this->common_model->select_results_info('medium',array('row_status'=>1))->result_array();
                if($category!=''){
                $c=0;foreach ($category as $cat) {
                ?>
                                       <label>
                                          <input type="checkbox" name="medium[]" value="<?=$cat['id'];?>" <?=(($_GET['medium'][$c]==$cat['id'])? 'checked' : '')?>><span><?=$cat['name'];?></span>
                                       </label>
                                       <?php $c++;}}?>
                                    </div>
                                </div>
                            </div>
                            <!-- Row / End -->
                        </div>
                    </div>

					
                    <div class="toggle-wrap">
                        <span class="trigger "><a href="#">Categories<i class="sl sl-icon-plus"></i></a></span>
                        <div class="toggle-container padding-0">    
                            <!-- Row -->
                            <div class="row with-forms">
                            <!-- Category -->
                            <div class="col-md-12">
                                <!--<h4>Category</h4>-->
                                <div id="ck-button">
                                    <?php
            $category=$this->common_model->select_results_info('category',array('row_status'=>1))->result_array();
            if($category!=''){
            $c=0;foreach ($category as $cat) {
            ?>
                                   <label>
                                      <input type="checkbox" name="category[]" value="<?=$cat['id'];?>" <?=(($_GET['category'][$c]==$cat['id'])? 'checked' : '')?>><span><?=$cat['name'];?></span>
                                   </label>
             <?php $c++;}}?>
                                </div>
                            </div>
                        </div>
					<!-- Row / End -->
                        </div>
                    </div>

                    <div class="toggle-wrap">
                        <span class="trigger "><a href="#">Facilities<i class="sl sl-icon-plus"></i></a></span>
                        <div class="toggle-container padding-0">    
                            <!-- Row -->
                            <div class="row with-forms">
                                <!-- Facilities -->
                                <div class="col-md-12">
                                   <!-- <h4>Facilities</h4>-->
                                    <div id="ck-button">
                    <?php
                $facilities=$this->common_model->select_results_info('facilities',array('row_status'=>1))->result_array();
                if($facilities!=''){
                $c=0;foreach ($facilities as $fac) {
                ?>
                                       <label>
                                          <input type="checkbox" name="facilities[]" value="<?=$fac['id'];?>" <?=(($_GET['facilities'][$c]==$fac['id'])? 'checked' : '')?>><span><?=$fac['name'];?></span>
                                       </label>
                <?php $c++;}}?>
                                    </div>
                                </div>
                            </div>
                            <!-- Row / End -->
                        </div>
                    </div>

					

					<button class="button fullwidth margin-top-25">Apply filters</button>

				</div>
				<!-- Widget / End -->

			</div>
		</form>
		
	


