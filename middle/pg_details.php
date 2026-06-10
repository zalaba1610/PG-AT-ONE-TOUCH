<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<?php
	
	$PGID = $_REQUEST['pgid'];
	$PgDetails = "SELECT pg.*, c.cat_name, a.ar_name, o.o_id, o.o_name, o.o_contact, o.o_image FROM pg_tb pg, owner_tb o, area_tb a, category_tb c WHERE pg.cat_id = c.cat_id AND pg.ar_id = a.ar_id AND pg.o_id = o.o_id AND pg.pg_id = $PGID";
	$PgDetailsr = $con->query($PgDetails);
	foreach($PgDetailsr as $PgDetailsv);
	
	// get service Free data
	$GetService = "SELECT * FROM `service_tb` WHERE pg_id = $PGID AND sr_status = 'Active' AND sr_type = 'Free'";
	$GetServicer = $con->query($GetService);
	
	// get service Paid data
	$GetServicePaid = "SELECT * FROM `service_tb` WHERE pg_id = $PGID AND sr_status = 'Active' AND sr_type = 'Paid'";
	$GetServicePaidr = $con->query($GetServicePaid);
	
	// Get category date
	$selcat = "select * from category_tb where cat_status = 'Active'";
	$rcat = $con->query($selcat);
	
	
	
	
	
 ?>


<style>

	.cat-lable{
		background: #ffa920;
		padding: 5px;
		border-radius: 5px;
		color: white;
		letter-spacing: 1px;
	}

</style>

<section class="flat-slider01" >
                <div class="container-full">
                    <div class="row">                      
                        <div class="col-lg-12">
                            <div class="swiper-container thumbs-swiper-column">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="image-detail">
                                           <img src="upload/pg/<?php echo $PgDetailsv['pg_image1'];?>" alt="images" style="height:600px;width:100%">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="image-detail">
                                           <img src="upload/pg/<?php echo $PgDetailsv['pg_image2'];?>" alt="images"style="height:600px;width:100%">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="image-detail">
                                           <img src="upload/pg/<?php echo $PgDetailsv['pg_image3'];?>" alt="images"style="height:600px;width:100%">
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="button-custom-slider">
                                    <div class="swiper-button-next5"><i class="far fa-chevron-down"></i></div>
                                    <div class="swiper-button-prev5"><i class="far fa-chevron-up"></i></div>
                                </div>  
                            </div>
                            <div thumbsSlider="" class="swiper-container thumbs-swiper-column1 swiper-pagination5">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="image-detail">
                                            <img src="upload/pg/<?php echo $PgDetailsv['pg_image1'];?>" alt="images">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="image-detail">
                                            <img src="upload/pg/<?php echo $PgDetailsv['pg_image2'];?>" alt="images">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="image-detail">
                                            <img src="upload/pg/<?php echo $PgDetailsv['pg_image3'];?>" alt="images">
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           
            <section class="flat-property-detail style2" >
                <div class="container">
                    <div class="row">                      
                        <div class="col-lg-12">
                            <div class="wrap-house wg-dream flex bg-white">
                                <div class="box-1">
                                    <div class="title-heading fs-30 fw-7 lh-45"><?php echo $PgDetailsv['pg_name']; ?></div>
                                    <div class="inner flex">
                                        <div class="sales fs-12 fw-7 font-2 text-color-1">For Rent</div>
                                        <div class="text-address" style="width: 60%;"><p><?php echo $PgDetailsv['pg_add']; ?></p></div>
                                        <div class="icon-inner flex">
                                            <div class="years-icon flex align-center">
                                                <i class="fal fa-calendar"></i>
                                                <p class="text-color-2"><?php echo date("d M, Y",strtotime($PgDetailsv['pg_cdate'])); ?></p>
                                            </div>
                                            <div class="view-icon flex align-center">
                                                <i class="far fa-eye"></i>
                                                <p class="text-color-2">4.5<?php echo $PgDetailsv['pg_id']; ?> Views</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="icon-box flex">
                                        <div class="icons icon-1 flex"><span>Capacity:</span><span class="fw-6"><?php echo $PgDetailsv['pg_capacity']; ?> </span></div>
                                        
                                    </div> 
                                </div>
                                <div class="box-2 text-end">
                                    <div class="icon-boxs flex cat-lable">
									   <span class="">Category:</span>
									   <span class="fw-6"><?php echo $PgDetailsv['cat_name']; ?></span>&nbsp;&nbsp;&nbsp;
                                         
										<span class="">Area:</span>
									   <span class="fw-6"><?php echo $PgDetailsv['ar_name']; ?></span>
                                        
                                    </div>
                                    <div class="moneys fs-30 fw-7 lh-45 text-color-3">₹<?php echo $PgDetailsv['pg_rent']; ?> </div>
                                    <div class="text-sq fs-12 lh-16"></div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>

                <div class="container">
				<form method="post">
                    <div class="row">                      
                        <div class="col-lg-8">
                            <div class="post">
                                <div class="wrap-overview wrap-style">
                                    <h3 class="titles">Free Services</h3>
                                    <div class="icon-wrap flex">
									<?php 
										$FreeService = "";
										foreach($GetServicer as $GetServicev){
											$FreeService .= $GetServicev['sr_name'].",";
										?>
                                        <div class="box-icon">
                                            <div class="inner flex">
                                                <div class="icon">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M17.691 16.465H15.2848V1.22595C15.2848 1.14998 15.2568 1.07669 15.2062 1.02006C15.1556 0.963431 15.0859 0.927444 15.0104 0.918975L6.88567 0.00194478C6.84244 -0.00292852 6.79866 0.00138197 6.7572 0.0145944C6.71574 0.0278068 6.67754 0.0496235 6.6451 0.0786168C6.61265 0.10761 6.5867 0.143127 6.56892 0.182844C6.55115 0.22256 6.54197 0.265582 6.54197 0.309093V0.916856H3.02433C2.94235 0.916856 2.86373 0.94942 2.80577 1.00739C2.7478 1.06535 2.71524 1.14397 2.71524 1.22595V16.465H0.309091C0.227115 16.465 0.148497 16.4976 0.0905309 16.5556C0.032565 16.6135 0 16.6922 0 16.7741C0 16.8561 0.032565 16.9347 0.0905309 16.9927C0.148497 17.0507 0.227115 17.0832 0.309091 17.0832H6.54197V17.691C6.54197 17.773 6.57453 17.8516 6.6325 17.9095C6.69046 17.9675 6.76908 18.0001 6.85106 18.0001C6.86286 18.0002 6.87466 17.9995 6.88638 17.9981L14.9934 17.0832H17.6915C17.7735 17.0832 17.8521 17.0507 17.9101 16.9927C17.968 16.9347 18.0006 16.8561 18.0006 16.7741C18.0006 16.6922 17.968 16.6135 17.9101 16.5556C17.8521 16.4976 17.7735 16.465 17.6915 16.465H17.691ZM3.33342 1.53504H6.54197V2.32985H4.43714C4.35517 2.32985 4.27655 2.36241 4.21858 2.42038C4.16061 2.47834 4.12805 2.55696 4.12805 2.63894V16.465H3.33324L3.33342 1.53504ZM4.74641 16.465V2.94803H6.54197V16.465H4.74641ZM7.16015 0.654923L14.6667 1.50272V16.4981L7.16015 17.3459V0.654923Z" fill="black"/>
                                                        <path d="M8.49017 8.0802C8.30824 8.0802 8.13039 8.13415 7.97912 8.23522C7.82785 8.3363 7.70995 8.47996 7.64033 8.64804C7.57071 8.81612 7.55249 9.00108 7.58799 9.17951C7.62348 9.35795 7.71109 9.52185 7.83973 9.65049C7.96838 9.77914 8.13228 9.86675 8.31071 9.90224C8.48915 9.93773 8.6741 9.91951 8.84218 9.84989C9.01026 9.78027 9.15393 9.66237 9.255 9.5111C9.35608 9.35983 9.41003 9.18199 9.41003 9.00006C9.40974 8.75618 9.31274 8.52238 9.1403 8.34993C8.96785 8.17748 8.73404 8.08048 8.49017 8.0802ZM8.49017 9.30173C8.4305 9.30173 8.37218 9.28404 8.32257 9.25089C8.27296 9.21774 8.23429 9.17063 8.21146 9.1155C8.18863 9.06038 8.18265 8.99972 8.19429 8.9412C8.20593 8.88268 8.23466 8.82893 8.27685 8.78674C8.31904 8.74455 8.3728 8.71582 8.43132 8.70418C8.48983 8.69254 8.55049 8.69851 8.60561 8.72135C8.66074 8.74418 8.70785 8.78285 8.741 8.83246C8.77415 8.88207 8.79184 8.94039 8.79184 9.00006C8.79175 9.08004 8.75994 9.15671 8.70338 9.21327C8.64683 9.26982 8.57015 9.30164 8.49017 9.30173Z" fill="black"/>
                                                    </svg>   
                                                </div>
                                                <div class="content">
                                                    <div class="font-2"><?php echo $GetServicev['sr_name']; ?></div>
                                                    <!--<div class="font-2 fw-7"><?php echo $GetServicev['sr_price']; ?></div>-->
                                                    <div class="font-2 fw-7">Free</div>
                                                </div>
                                            </div>
                                        </div>
									<?php } ?>
                                    </div>
                                    
                                </div>
                                <div class="wrap-text wrap-style">
                                    <h3 class="titles">PG Details</h3>
                                    <p class="text-1 text-color-2"><?php echo $PgDetailsv['pg_details']; ?></p>
                                    <p class="text-2 text-color-2"></p>
                                    <a href="#" class="fw-6"></a>
                                </div>
								
								<div class="wrap-featured wrap-style tf-amenities">
                                    <h3 class="titles">Add Paid services</h3>
                                    <div class="box-featured flex">
                                        <div class="inner-1">
                                            <?php foreach($GetServicePaidr as $GetServicePaidv){ ?>
											<label class="flex"><input name="moreservice[]" class="getExtraService" value="<?php echo $GetServicePaidv['sr_price']."-".$GetServicePaidv['sr_name']; ?>" type="checkbox" /> 
                                                <span class="btn-checkbox"></span><span class="fs-13"><?php echo $GetServicePaidv['sr_name']; ?> : ₹ <?php echo $GetServicePaidv['sr_price']; ?>/-</span> 
                                            </label>
                                            <?php } ?>
                                        </div>
                                       
                                    </div>
                                </div>
								
                                <div class="wrap-property wrap-style">
                                    <h3 class="titles">Owner Details</h3>
                                    <div class="box flex" style="align-items: center; justify-content: center;">
                                        <ul style="width:33%">
											<li class="flex"><img src="upload/owner/<?php echo $PgDetailsv['o_image'];?>"alt="images" style="width: 45px;height: 45px;border-radius: 40%;"></li>  
                                        </ul>
										<ul style="width:33%">
											<li class=""><i class="fa fa-user"  ></i>
                                              <?php echo $PgDetailsv['o_name']; ?></li>  
                                        </ul>
										<ul style="width:33%">
											<li class=""><i class="fa fa-phone" ></i>
											<?php echo $PgDetailsv['o_contact']; ?></li>  
                                        </ul>
                                        
                                    </div>                              
                                </div>
                              
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <aside class="side-bar side-bar-1">
                                <div class="inner-side-bar">  
                                    <div class="widget-tour widget-rent">
                                        <div class="flat-tabs style2">
                                            
                                            <div class="content-tab">
                                                <div class="content-inner tab-content">
                                                    <div class="comments">
                                                        <div class="comment-form">
                                                            
                                                                <div class="wd-find-select ">
                                                                   <input type="hidden" value="<?php echo $PgDetailsv['pg_rent']; ?>" class="filltextprice" />
                                                                    <h3 class="title-tour" style="margin-bottom: 15px;">Final Pay Amount : ₹ <span class="fill_finalprice"><?php echo $PgDetailsv['pg_rent']; ?></span>/-</h3>
                                                                    <div class="button-box center">
                                                                        <button class="sc-button btn-icon2 one btn-svg center" name="CreateBooking" type="submit">
                                                                            <span class="">Submit Booking Request</span>
                                                                            <svg width="18" height="10" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M10.5 1L13 3.5M13 3.5L10.5 6M13 3.5H1" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            </svg>
                                                                        </button>
                                                                    </div> 
                                                                </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
											
                                        </div>
                                    </div>
                                   
                                    <div class="widget widget-estate">
                                        <h3 class="widget-title title-news">
                                            Category
                                        </h3>                       
                                        <ul class="group-estate flex">
                                            
											<?php foreach($rcat as $vcat){ ?>
											<li class="box-estate hover-img2">
                                                <div class="thumb img-style2 ">
                                                    <img class="img2" src="upload/category/<?php echo $vcat['cat_image'];?>" alt="images">
                                                </div>
                                                <div class="content">    
                                                    <div class="title link-style-3 fw-6 lh-18"><a href="index.php?file=pg&catid=<?php echo $vcat['cat_id'];?>"><?php echo $vcat['cat_name']; ?></a> </div>                              
                                                    <p class="fs-12 lh-16 text-color-1">&nbsp;</p>
                                                </div>
                                            </li>
                                            <?php } ?>
                                            
                                            
                                        </ul>
                                    </div> 
                                    
								</div>
                            </aside>
                        </div>
                    
					</div>
					</form>
                </div>
				
				<div class="container" style="margin-top: 30px;">
				<form method="post">
                    <div class="row">                      
                        <div class="col-lg-8">
                            <div class="post">
                                <div class="wrap-contact wrap-form wrap-style">
                                    <div class="titles">
                                        <h3>Leave a review</h3>
                                        <p class="fs-12 lh-18">Your email address will not be published. Required fields are marked *</p>
                                    </div>
                                    
                                    <div id="comments" class="comments">
                                        <div class="respond-comment">
                                            <form method="post" id="contactform" class="comment-form form-submit"
                                                 accept-charset="utf-8"
                                                novalidate="novalidate">
                                                
                                                <fieldset class="message-wrap">
                                                    <label class="fw-6">Your review</label>
                                                    <textarea id="comment-message" name="f_msg" rows="4" tabindex="4"
                                                        placeholder="Your message" aria-required="true" style="color: black;" required></textarea>
                                                </fieldset> 
                                                
                                                <button class="sc-button" name="submit" type="submit">
                                                    <span>Send review</span>
                                                </button>
                                            </form>
                                        </div>
					<?php if(isset($_REQUEST['submit'])){
					
					// VARIABLE DECLARATION
					$u_id = $_SESSION['userid'] ;
					
					$message = $_REQUEST['f_msg'];
					
					//DATE-TIME FUNCTION
					date_default_timezone_set("Asia/Kolkata");
					$c_date = date('Y-m-d H:i:s');
					$u_date = date('Y-m-d H:i:s');
					$f_type = 'Review';
					$f_status = 'Hide';
					
					//INSERT QUERY
					  $ins = "insert into feedback_tb(u_id,pg_id,f_msg,f_type,f_status,f_cdate,f_udate) values ('$u_id','$PGID','$message','$f_type','$f_status','$c_date','$u_date')";
					
					// CHECK QUERY IN CONNECTION
					if($con->query($ins) == TRUE){
						
						//PAGE REDIRECT
						header("location:index.php?file=pg");
						
					}

					
				}?>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
					</form>
                </div>
            </section>

            <section class="flat-sale-detail flat-sale wg-dream wg-dots tf-section" >
                <div class="container">
                    <div class="row">                      
                        <div class="col-lg-12">
                            <div class="heading-section ">
                               <div class="title-heading fs-30 lh-45 fw-7">Recent PG</div>
                                <p class="text-color-4"></p>
                            </div>
                            <div class="swiper-container2" >    
                                <div class="one-carousel owl-carousel owl-theme">
                                
								<?php 
									 $selpg = "select * from pg_tb, category_tb,area_tb,owner_tb where pg_tb.cat_id=category_tb.cat_id and pg_tb.ar_id = area_tb.ar_id and pg_tb.o_id = owner_tb.o_id and pg_tb.pg_status = 'Active' order by pg_tb.pg_id DESC limit 8";
									 $selpgr = $con->query($selpg);
									 foreach($selpgr as $selpgrv){
                                     ?>
									 <div class="slide-item">
                                            <div class="box box-dream hv-one">
                                                <div class="image-group relative ">
                                                    <span class="featured fs-12 fw-6"><?php echo $selpgrv['cat_name'];?></span>  
                                                    <span class="featured style fs-12 fw-6">For Rent</span>   
                                                    <span class="icon-bookmark"><i class="far fa-bookmark"></i></span> 
                                                    <div class="swiper-container carousel-2 img-style" >    
                                                        <a href="index.php?file=signin" class="icon-plus"><img src="assets/images/icon/plus.svg" alt="images"></a>
                                                        <div class="swiper-wrapper ">
                                                            <div class="swiper-slide"><img src="upload/pg/<?php echo $selpgrv['pg_image1'];?>" alt="images" style="width:315px; height:226px"></div>
                                                           
                                                        </div>
                                                                                            
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h3 class="link-style-1"><a href="index.php?file=signin"><?php echo $selpgrv['pg_name'];?></a> </h3>
                                                    <div class="text-address"><p class="p-12"><?php echo $selpgrv['pg_add'];?></p></div>
                                                    
                                                    <div class="icon-box flex">
												     	<div style="color: #ffaf31;font-size:15px;">₹<?php echo $selpgrv['pg_rent'];?> / Month </div>
													    &nbsp;&nbsp;
                                                        <div class="icons icon-1 flex"><span>Beds: </span><span class="fw-6"><?php echo $selpgrv['pg_capacity'];?></span></div>
														<div class=""><i class="fa fa-map-marker" aria-hidden="true"></i><span class="fw-6">&nbsp;<?php echo $selpgrv['ar_name'];?></span></div>
                                                        
                                                    </div>   
                                                    <div class="days-box flex justify-space align-center">
                                                        <a class="compare flex align-center fw-6" href="index.php?file=pg_details&pgid=<?php echo $selpgrv['pg_id'];?>">More Details</a>
                                                        <div class="img-author hv-tool" data-tooltip="<?php echo $selpgrv['o_name'];?>"><img src="upload/owner/<?php echo $selpgrv['o_image'];?>" alt="images" style="width: 35px;height: 35px;border-radius: 40%;"></div>
                                                        <div class="days"><?php echo $selpgrv['o_name'];?></div>
                                                    </div>                                           
                                                </div>
                                            </div>
                                        </div>
                                     <?php } ?>
									 
								
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
	$( document ).ready(function() {
		PG_Price = $('.filltextprice').val();
		
		$('.fill_finalprice').html(PG_Price);
		//$('.filltextprice').val(PG_Price);
		
		$('.getExtraService').click(function(){
			if ($(this).is(':checked')) {
				AllValue = $(this).val();
				
				aa = AllValue.split('-');
				
				ServicePrice = aa[0];
				ServiceName = aa[1];
				PG_Price1 = $('.filltextprice').val();
				PayPrice = parseInt(PG_Price1) + parseInt(ServicePrice);
				$('.filltextprice').val(PayPrice);
				$('.fill_finalprice').html(PayPrice);
				
			}else{
				AllValue = $(this).val();
				
				aa = AllValue.split('-');
				
				ServicePrice = aa[0];
				ServiceName = aa[1];
				PG_Price1 = $('.filltextprice').val();
				PayPrice = parseInt(PG_Price1) - parseInt(ServicePrice);
				$('.filltextprice').val(PayPrice);
				$('.fill_finalprice').html(PayPrice);
			}
		});
		
		
		
	});
</script>


<?php if(isset($_REQUEST['CreateBooking'])){
					
	// VARIABLE DECLARATION
	$PGID = $PGID;
	$o_id = $PgDetailsv['o_id'];
	$u_id = $_SESSION['userid'];
	$b_pgrent = $PgDetailsv['pg_rent'];
	$GetAllService = $_REQUEST['moreservice'];
	$b_serviceprice = 0;
	$b_servicename = "";
	
	foreach($GetAllService as $value){
		$ServiceArray = explode('-',$value);
		
		$b_serviceprice += $ServiceArray[0];
		$b_servicename .= $ServiceArray[1].",";
		
	}
	
	$final_servicename = $FreeService.$b_servicename;
	//$b_serviceprice = 500;
	$b_total = $b_pgrent + $b_serviceprice;
	$b_status = 'Pending';
	
	
	//DATE-TIME FUNCTION
	date_default_timezone_set("Asia/Kolkata");
	$c_date = date('Y-m-d H:i:s');
	$u_date = date('Y-m-d H:i:s');
	
	
	//INSERT QUERY
	  $ins = "insert into booking_tb(pg_id,o_id,u_id,b_pgrent,b_servicename,b_serviceprice,b_total,b_status,b_cdate,b_udate) values ('$PGID','$o_id','$u_id','$b_pgrent','$final_servicename','$b_serviceprice','$b_total','$b_status','$c_date','$u_date')";
	
	// CHECK QUERY IN CONNECTION
	if($con->query($ins) == TRUE)
	{
		
		//PAGE REDIRECT
		$last_id = $con->insert_id;
		$ins1 = "insert into payment_tb(b_id,p_amount,p_status,p_cdate) values ('$last_id','$b_total','Failed','$c_date')";
		if($con->query($ins1) == TRUE)
		{
			$last_id1 = $con->insert_id;
			header("location:payment.php?pid=$last_id1");
		}
	}

	
}?>