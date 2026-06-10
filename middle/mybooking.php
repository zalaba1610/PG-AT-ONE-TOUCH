
<style>
	.flat-property-list2 .box .image-group .img-box.img-box2 {
    width: 43.9%;
    margin-left: 2px;
}
span.fw-6.status-lable {
    color: white;
    padding: 5px 15px;
    border-radius: 25px;
    letter-spacing: 1px;
}
.wg-dream .icon-bookmark i {
    z-index: 999;
    top: 0;
    right: 0;
    position: absolute;
    margin-top: -42px;
    margin-right: 6px;
    color: white;
    font-size: 20px;
}
.wg-dream .icon-bookmark {
    position: absolute;
    right: 0px;
    top: 0px;
    z-index: 9;
    border-top: 50px solid red;
    border-left: 58px solid transparent;
    border-radius: 0px 10px;
}
.sconfirm{
	background: green;
}
.spending{
	background: #ffa920;
}
.scancle{
	background: red;
}
</style>

<?php 
	
	$UserID = $_SESSION['userid'];

  $sel="select * from pg_tb,category_tb,area_tb,owner_tb, booking_tb where pg_tb.pg_id = booking_tb.pg_id AND booking_tb.o_id = owner_tb.o_id AND pg_tb.cat_id=category_tb.cat_id and pg_tb.ar_id = area_tb.ar_id and pg_tb.o_id = owner_tb.o_id and pg_tb.pg_status = 'Active' AND booking_tb.u_id = $UserID order by pg_tb.pg_id DESC";
  
  $selbookr = $con->query($sel);
   

?>
			<section class=" flat-property flat-property-list2 flat-properties-rent tf-section2 wg-dream " >
                <div class="container">
                    <div class="row flex">                      
                        <div class="col-lg-12">
                            <div class="posts">
                                <div class="category-filter flex justify-space">
                                    <div class="box-1 flex align-center">
                                        <div class="heading-listing fs-30 lh-45 fw-7">My Booking</div><div class=""></div> 
                                    </div>
                                </div>
                            
							<?php foreach($selbookr as $selbookrv){
								if($selbookrv['b_status'] == 'Confirm'){
									$StatusColor = "sconfirm";
								}else if($selbookrv['b_status'] == 'Pending'){
									$StatusColor = "spending";
								}else{
									$StatusColor = "scancle";
								}
								?>
							<div class="wrap-list ">
                                <div class="box box-dream flex">
                                    <div class="image-group relative flex">
                                        <div class="img-box img-box1 flex-none relative">
                                            <span class="featured fs-12 fw-6"><?php echo $selbookrv['cat_name'];?></span>    
                                            <span class="featured style fs-12 fw-6"><?php echo $selbookrv['ar_name'];?></span>
                                            <img src="upload/pg/<?php echo $selbookrv['pg_image1'];?>" style="height:300px;width:100%" alt="images">
                                        </div>
                                        <div  class="img-box img-box2">
                                            <img class="img-2" src="upload/pg/<?php echo $selbookrv['pg_image2'];?>" style="height:150px;width:100%" alt="images">
                                            <img src="upload/pg/<?php echo $selbookrv['pg_image3'];?>"  style="height:150px;width:100%" alt="images">
                                        </div>
                                        
                                    </div>
                                    <div class="content">
										<?php if($selbookrv['b_status'] == 'Pending'){ ?>
										<a href="index.php?file=mybooking&bdeleteid=<?php echo $selbookrv['b_id'];?>" onclick="return confirm('Are you sure want to delete this Booking?');">
											<span class="icon-bookmark" name="delete"><i class="far fa-trash"></i></span> 
                                        </a>
										<?php } ?>
										<h3 class="link-style-1"><a href="index.php?file=pg_details&pgid=<?php echo $selbookrv['pg_id'];?>"><?php echo $selbookrv['pg_name'];?></a> </h3>
                                        <div class="text-address"><p class="p-12"><?php echo $selbookrv['pg_add'];?></p></div>
                                        <div class="money fs-20 fw-8 font-2 text-color-3"><a href="property-detail-v1.html">₹ <?php echo $selbookrv['b_total'];?></a></div>  
                                        <div class="icon-box">
													<?php
														$myString = rtrim($selbookrv['b_servicename'], ',');
														$myArray = explode(',', $myString);
														foreach($myArray as $ArrayValue){
													?>
                                            <div class="icons icon-1 flex">		
											<span><?php echo $ArrayValue; ?> </span><span class="fw-6"> </span>
														
											</div>
                                           <?php }?> 
                                        </div>   
                                        <div class="img-box flex justify-space align-center">
                                            <div class="img-author flex align-center"><img src="upload/owner/<?php echo $selbookrv['o_image'];?>" alt="images"><div class="fs-13 fw-6 link-style-1"><a href="#"><?php echo $selbookrv['o_name'];?></a></div> </div>
                                            <a class="">
											<span><?php echo $selbookrv['b_udate'];?></span>
                                                <span class="fw-6 status-lable <?php echo $StatusColor; ?>"><?php echo $selbookrv['b_status'];?></span>
                                            </a>
                                        </div>                                           
                                    </div>
									<?php
									if(isset($_REQUEST['bdeleteid'])){
											
											$bid = $_REQUEST['bdeleteid'];
											
											//DATE-TIME FUNCTION
											date_default_timezone_set("Asia/Kolkata");
											$u_date = date('Y-m-d H:i:s');
											
											// delete QUERY
											$upd = "update booking_tb set b_status = 'Cancel', b_udate = '$u_date' where b_id = '$bid'";
											if($con->query($upd) == TRUE){
												header("location:index.php?file=mybooking");
											}
											
										}
							         ?>
                                </div>
                                
                              
                            </div>
							<?php } ?>
                         </div>
                        </div>  
                     
                    </div>
                </div>
            </section>
