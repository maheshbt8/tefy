<form action="<?=base_url('listings-list');?>" methor="get">

<div class="">

				<!-- Widget -->
				<div class="widget margin-bottom-20 search-fix">
					<!--<h3 class="margin-top-0 margin-bottom-30">Filters</h3>-->

					<!-- Row -->
					<div class="row with-forms">
						<!-- Cities -->
						<div class="col-md-6 col-sm-12 col-xs-12">
							<input type="text" placeholder="Enter School name/Board/Daycare/Playschool"  value="<?=$_GET['keyword'];?>" name="keyword" autocomplete="off" />
						</div>
					
						<!-- Cities -->
						<div class="col-md-4 col-sm-7 col-xs-7 admiss-stick">

							<div class="input-with-icon location">
								<div id="autocomplete-container">
								<input id="pac-input" type="text" placeholder="Enter area you are looking for?" name="location" autocomplete="off" value="<?=$_GET['location'];?>">
                                <input type="hidden" name="lat" id="lat" value="<?=$_GET['lat'];?>">
                                <input type="hidden" name="lng" id="lng" value="<?=$_GET['lng'];?>">
                                <input type="hidden" name="address" id="address" value="<?=$_GET['address'];?>">
								</div>
								<a href="#"><i class="fa fa-map-marker"></i></a>
							</div>

						</div>
						<div class="col-md-2 col-sm-5 col-xs-5">
                            <button class="button fullwidth ">
                                Search
                            </button>
					    </div>
					</div>
					<!-- Row / End -->
                    <!--<br>-->

					

					

					

				</div>
				<!-- Widget / End -->

			</div>
		</form>