<section class="flat-featured wg-dream home" >
                    <div class="container3">
                        <div class="row">                      
                            <div class="col-lg-12">
                                <div class="heading-section center">
                                    <h2>Our PG</h2>
                                    <p class="text-color-4">Better lives with better PG</p>
                                </div>
                                <div class="flat-tabs themesflat-tabs">
                                    <div class="box-tab center">
                                        <ul class="menu-tab tab-title flex justify-center">
                                            <?php 
											$selcat = "select * from category_tb where cat_status = 'Active'";
									        $rcat = $con->query($selcat);
											$j=1;
									        foreach($rcat as $vcat)
									        {
										     ?>	
                                            <?php
                                            if(isset($_REQUEST['catid']))
											{												
                                            ?>											
											<li class="item-title <?php if($vcat['cat_id'] == $_REQUEST['catid']){?>active<?php } ?> hv-tool" data-tooltip="<?php echo $vcat['cat_name'];?>">
                                                <a href="index.php?file=pg&catid=<?php echo $vcat['cat_id'];?>"><h5 class="inner"><?php echo $vcat['cat_name'];?></h5></a>
                                            </li>
                                            <?php } else { ?>
											<li class="item-title <?php if($j==1){?>active<?php } ?> hv-tool" data-tooltip="<?php echo $vcat['cat_name'];?>">
                                                <a href="index.php?file=pg&catid=<?php echo $vcat['cat_id'];?>"><h5 class="inner"><?php echo $vcat['cat_name'];?></h5></a>
                                            </li>
											<?php $j++;} } ?>
                                        </ul>
                                    </div>
                                   
                                    <div class="content-tab">
									        
                                        <div class="content-inner tab-content">                            
                                            <div class="wrap-item flex">
									<?php
									 if(isset($_REQUEST['catid']) && isset($_REQUEST['areaid']))
									 {
										$catid =  $_REQUEST['catid'];
										$areaid = $_REQUEST['areaid'];
										
										$selpg = "select * from pg_tb,category_tb,area_tb,owner_tb where pg_tb.cat_id=category_tb.cat_id and pg_tb.ar_id = area_tb.ar_id and pg_tb.o_id = owner_tb.o_id and pg_tb.pg_status = 'Active' and pg_tb.cat_id = '$catid' and pg_tb.ar_id = '$areaid' order by pg_tb.pg_id DESC"; 
										 
									 }									
									 else if(isset($_REQUEST['catid']))
									 {
									     $catid = $_REQUEST['catid'];   	 
										 $selpg = "select * from pg_tb, category_tb,area_tb,owner_tb where pg_tb.cat_id=category_tb.cat_id and pg_tb.ar_id = area_tb.ar_id and pg_tb.o_id = owner_tb.o_id and pg_tb.pg_status = 'Active' and pg_tb.cat_id = '$catid' order by pg_tb.pg_id DESC";
									 }
									
									 else
									 {
										 $catid = 1;   	 
										 $selpg = "select * from pg_tb, category_tb,area_tb,owner_tb where pg_tb.cat_id=category_tb.cat_id and pg_tb.ar_id = area_tb.ar_id and pg_tb.o_id = owner_tb.o_id and pg_tb.pg_status = 'Active' and pg_tb.cat_id = '$catid' order by pg_tb.pg_id DESC"; 
									 }
									
									 $selpgr = $con->query($selpg);
									 if(mysqli_num_rows($selpgr) > 0)
									 {
									 foreach($selpgr as $selpgrv){
										 
										 
										 
                                     ?>
                                               
											   <!-- col 1 -->
                                                <div class="box box-dream hv-one">
                                                    <div class="image-group relative ">
                                                        <span class="featured fs-12 fw-6"><?php echo $selpgrv['cat_name'];?></span> 
														<span class="featured style fs-12 fw-6">For Rent</span>														
                                                        <span class="icon-bookmark"><i class="far fa-bookmark"></i></span> 
                                                        <div class="swiper-container carousel-2 img-style" >   
															<?php if(isset($_SESSION['userid'])){ ?>
                                                            <a href="index.php?file=pg_details&pgid=<?php echo $selpgrv['pg_id'];?>" class="icon-plus"><img src="assets/images/icon/plus.svg" alt="images"></a>
															<?php } else { ?>
															<a href="index.php?file=signin" class="icon-plus"><img src="assets/images/icon/plus.svg" alt="images"></a>
															<?php } ?>
                                                            <div class="swiper-wrapper ">
                                                                <div class="swiper-slide"><img src="upload/pg/<?php echo $selpgrv['pg_image1'];?>" alt="images" style="width:315px; height:226px"></div>
                                                               
                                                            </div>
                                                                                                    
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="link-style-1">
														<a href="index.php?file=signin"><?php echo $selpgrv['pg_name'];?></a> </h3>
                                                        <div class="text-address"><p class="p-12"><?php echo $selpgrv['pg_add'];?></p></div>
                                                         
                                                        <div class="icon-box flex">
                                                              <div style="color: #ffaf31;font-size:15px;">₹<?php echo $selpgrv['pg_rent'];?> / Month </div>
															   &nbsp;&nbsp;
															  <div class="icons icon-1 flex"><span>Beds: </span><span class="fw-6"><?php echo $selpgrv['pg_capacity'];?></span></div>
															   <div class=""><i class="fa fa-map-marker" aria-hidden="true"></i><span class="fw-6">&nbsp;<?php echo $selpgrv['ar_name'];?></span></div>                    
															</div>   
                                                        <div class="days-box flex justify-space align-center">
														<?php if(isset($_SESSION['userid'])){ ?>
                                                            <a class="compare flex align-center fw-6" href="index.php?file=pg_details&pgid=<?php echo $selpgrv['pg_id'];?>">More Details</a>
														<?php }else{ ?>
														 <a class="compare flex align-center fw-6" href="index.php?file=signin">More Details</a>
														<?php } ?>
															
                                                            <div class="img-author hv-tool" data-tooltip="<?php echo $selpgrv['o_name'];?>"><img src="upload/owner/<?php echo $selpgrv['o_image'];?>" alt="images" style="width: 35px;height: 35px;border-radius: 40%;"></div>
                                                        <div class="days"><?php echo $selpgrv['o_name'];?></div>
														
                                                        </div>                                           
                                                    </div>
                                                </div>
									 <?php } } else { ?>
									 <div class="alert alert-danger" style="margin-left: 45%;"><strong>No Recoed Found.!</strong> </div>
									 
									 <?php } ?> 
                                            </div>

                                        </div>
                                       
                                       
                                      </div>
                                </div>
                          
                            </div>
                        </div>
                    </div>
                </section>
