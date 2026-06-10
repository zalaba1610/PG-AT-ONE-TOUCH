 <section class="slider home">
                    <div class="slider-item">
                        <div class="img-slider">
                            <img class="img-item" src="assets/images/slider/bg-slider-1.png" alt="">
                        </div>
                        
                        <div class="container3  relative">   
                            <div class="row"> 
                                <div class="col-lg-12">
                                    <div class="content po-content-two">
                                        <div class="heading">
                                            <h1 class="wow slideInDown js-letters"  data-wow-delay="0ms" data-wow-duration="1200ms">Better lives with better PG</h1>
                                            <p class="fs-16 lh-24 text-color-2 wow fadeInUp"  data-wow-delay="100ms" data-wow-duration="2000ms">Find a variety of category that suit you very easily, forget all difficulties in finding a residence for you</p>
                                        </div>
                                        <div class="flat-tabs themesflat-tabs">
                                           
                                            <div class="content-tab">
                                                <div class="content-inner tab-content">
                                                    <div class="form-sl">
                                                        <form method="post">
                                                            <div class="wd-find-select flex">
                                                                <div class="inner-group">
                                                                    
                                                                    <div class="form-group-2 form-style ">
                                                                        <div class="group-select">
                                                                            <select class="form-control" style="height: auto;" name="areaid">
																			<option value="">-- Select Area --</option>
																			<?php			
																				$sel = "select * from area_tb where ar_status = 'Active' order by ar_id DESC";
																				$selr = $con->query($sel);
																				foreach($selr as $selv){
																			?>
																			<option value="<?php echo $selv['ar_id']; ?>"><?php echo $selv['ar_name']; ?></option>
																			<?php } ?>
																			</select>
																			
																			
                  														
				
															
													
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group-3 form-style" style="margin-left: 19%;">
                                                                        <div class="group-select">
																		<select class="form-control" style="height: auto;" name="catid">
                                                                        <option value="">-- Select Category --</option>
																		<?php			
																			$selcat = "select * from category_tb where cat_status = 'Active' order by cat_id DESC";
																			$selcatr = $con->query($selcat);
																			foreach($selcatr as $selcatrv){
																		?>
																		<option value="<?php echo $selcatrv['cat_id']; ?>"><?php echo $selcatrv['cat_name']; ?>
																			<?php } ?>
																		</select>
                                                                           
                                                                        </div>                                                    
                                                                    </div>
                                                                </div>
                                                               
                                                                <div class="button-search sc-btn-top">
                                                                    <input type="submit" class="sc-button" name="search" value="Search" style="color: white;border: white;" />
                                                                        
                                                                </div> 
                                                            </div>
															<?php
                                                              if(isset($_POST['search']))
															  {
																  $areaid = $_REQUEST['areaid'];
																  $catid = $_REQUEST['catid'];
																  
																  header("location:index.php?file=pg&catid=$catid&areaid=$areaid");
																  
															  }																  
															?>
                                                            <div class="wd-find-select wd-search-form ">
                                                                <div class="box1 flex flex-wrap form-wg">
                                                                    <div class="form-group wg-box3">
                                                                        <div class="group-select">
                                                                            <div class="nice-select" tabindex="0"><span class="current">Baths: Any</span>
                                                                                <ul class="list"> 
                                                                                    <li data-value class="option selected">Baths: Any</li>                                                         
                                                                                    <li data-value="1" class="option">1</li>
                                                                                    <li data-value="2" class="option">2</li>
                                                                                    <li data-value="3" class="option">3</li>
                                                                                    <li data-value="4" class="option">4</li>
                                                                                    <li data-value="5" class="option">5</li>
                                                                                    <li data-value="6" class="option">6</li>
                                                                                    <li data-value="7" class="option">7</li>
                                                                                    <li data-value="8" class="option">8</li>
                                                                                    <li data-value="9" class="option">9</li>
                                                                                    <li data-value="9" class="option">10</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group wg-box3">
                                                                        <div class="group-select">
                                                                            <div class="nice-select" tabindex="0"><span class="current">Beds: Any</span>
                                                                                <ul class="list">   
                                                                                    <li data-value class="option selected">Beds: Any</li>                                                       
                                                                                    <li data-value="1" class="option">1</li>
                                                                                    <li data-value="2" class="option">2</li>
                                                                                    <li data-value="3" class="option">3</li>
                                                                                    <li data-value="4" class="option">4</li>
                                                                                    <li data-value="5" class="option">5</li>
                                                                                    <li data-value="6" class="option">6</li>
                                                                                    <li data-value="7" class="option">7</li>
                                                                                    <li data-value="8" class="option">8</li>
                                                                                    <li data-value="9" class="option">9</li>
                                                                                    <li data-value="9" class="option">10</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group wg-box3">
                                                                        <div class="widget widget-price ">
                                                                            <div class="caption flex-two">
                                                                                <div>
                                                                                    <span class="fw-6">Form</span>
                                                                                    <span id="slider-range-value1"></span>
                                                                                    <span id="slider-range-value2"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div id="slider-range"></div>
                                                                            <div class=" slider-labels">
                                                                                <div>
                                                                                    <input type="hidden" name="min-value" value="">
                                                                                    <input type="hidden" name="max-value" value="">                                                                                  
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- /.widget_price -->
                                                                    </div>
                                                                    <div class="form-group wg-box3">
                                                                        <div class="widget widget-price ">
                                                                            <div class="caption flex-two">
                                                                                <div>
                                                                                    <span class="fw-6">Size</span>
                                                                                    <span id="slider-range-value01"></span>
                                                                                    <span id="slider-range-value02"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div id="slider-range2"></div>
                                                                            <div class="slider-labels">
                                                                            <div>                                                                             
                                                                                <input type="hidden" name="min-value2" value="">
                                                                                <input type="hidden" name="max-value2" value="">      
                                                                            </div>
                                                                            </div>
                                                                        </div><!-- /.widget_price -->
                                                                    </div>
                                                                </div>
                                                                <div class="boder-wg"></div>
                                                                <div class="box2 flex flex-wrap form-wg">
                                                                    <div class="form-group wg-box3">
                                                                        <div class="tf-amenities bg-white">
                                                                            <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Swimming pool</span> 
                                                                            </label>
                                                                            <label class="flex"><input name="newsletter" type="checkbox" /> 
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Garage</span> 
                                                                            </label>
                                                                            <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Alarm system</span> 
                                                                            </label> 
                                                                        </div>                                                  
                                                                    </div> 
                                                                    <div class="form-group wg-box3">
                                                                        <div class="tf-amenities bg-white">
                                                                            <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Balcony</span> 
                                                                            </label>
                                                                            <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Outdoor area</span> 
                                                                            </label>
                                                                            <label class="flex"><input name="newsletter" type="checkbox" /> 
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Broadband</span> 
                                                                            </label>                                   
                                                                        </div>                                                  
                                                                    </div> 
                                                                    <div class="form-group wg-box3">
                                                                        <div class="tf-amenities bg-white">
                                                                            <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Ensuite</span> 
                                                                            </label>
                                                                            <label class="flex"><input name="newsletter" type="checkbox" /> 
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Built in robes</span> 
                                                                            </label>
                                                                            <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                                                <span class="btn-checkbox"></span><span class="fs-13 ">Gym</span> 
                                                                            </label> 
                                                                        </div>                                                  
                                                                    </div>  
                                                                    <div class="form-group wg-box3">
                                                                        <div class="tf-amenities bg-white">
                                                                            <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Tennis court</span> 
                                                                            </label>
                                                                            <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Study</span> 
                                                                            </label>
                                                                            <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Outdoor spa</span> 
                                                                            </label> 
                                                                        </div>                                                  
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <!-- End Job  Search Form-->
                                                    </div> 

                                                </div>
                                                <!-- <div class="content-inner tab-content"></div> -->
                                            </div>
                                        </div>
                                        <div class="themes-count tf-counter flex">
                                            <div class="counter-box one ">
                                                <div class="count-number ">                                  
                                                    <div class="number number-style number-one" data-speed="2000" data-to="1500" data-inviewport="yes"></div>                                   
                                                </div>
                                                <div class="title-count fw-6 fs-13 text-color-4">Property ready</div>                              
                                            </div>
                                            <div class="counter-box ">
                                                <div class="count-number "> 
                                                    <div class="number number-style number-one" data-speed="2000" data-to="700" data-inviewport="yes"></div>                                                      
                                                </div>
                                                <div class="title-count fw-6 fs-13 text-color-4">Happy customer</div>                                                                           
                                            </div>
                                        </div>                      
                                    </div> 
                                    <div class="images po-content-one">
                                        <div class="image">
                                            <img class="img-item" src="assets/images/slider/slider-1.png" alt="">
                                        </div>
                                    </div> 
                                    <div class="curved-group home ">
                                        <div class="curved-text animate-rotate">PAYING GUEST AT ONE TOUCH</div>
                                    </div>                                      
                                </div>
                            </div>
                        </div> 
                    </div>                                                                        
                </section>  
