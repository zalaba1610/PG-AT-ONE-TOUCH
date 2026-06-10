<?php 
$id = $_SESSION['ownerid'];
?>
		
		<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow-x:auto;">
              <h5 class="card-title"> Add Service</h5>

              <!-- General Form Elements -->
              <form  method="post" enctype="multipart/form-data">
               <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">PG</label>
                  <div class="col-sm-10">
				   <select class="form-select" aria-label="Default select example" name="pg_id">

				  <?Php
				   $sel = "select * from pg_tb where pg_status ='Active' and o_id = '$id'";
				   $selr = $con->query($sel);
				   foreach($selr as $selv)
				   {
				  ?>
                                        
                      <option value="<?php echo $selv['pg_id']; ?>"><?php echo $selv['pg_name']; ?> | <?php echo $selv['pg_rent'];?></option>
						<?php } ?>
                    </select>
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="sr_name" placeholder="Enter Name">
                  </div>
                </div>
				
			
				 
				<div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Type</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="sr_type">
                      <option selected>-- Select Type --</option>
                      <option value="Free">Free</option>
                      <option value="Paid">Paid</option>
                    </select>
                  </div>
                </div>
								
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="sr_price" placeholder="Enter Price">
                  </div>
                </div>
                
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="sr_status">
                      <option selected>-- Select Status --</option>
                      <option value="Active">Active</option>
                      <option value="Deactive">Deactive</option>
                    </select>
                  </div>
                </div>

                

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" name="add_service" class="btn btn-primary">Submit </button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
	<?php if(isset($_REQUEST['add_service'])){
					
					// VARIABLE DECLARATION
					$pg_id = $_REQUEST['pg_id'];
					$sr_name = $_REQUEST['sr_name'];
					$type = $_REQUEST['sr_type'];
					$price = $_REQUEST['sr_price'];
					$status = $_REQUEST['sr_status'];
					
					//DATE-TIME FUNCTION
					date_default_timezone_set("Asia/Kolkata");
					$c_date = date('Y-m-d H:i:s');
					$u_date = date('Y-m-d H:i:s');
					
					//INSERT QUERY
			          $ins = "INSERT INTO service_tb(`pg_id`, `sr_name`,`sr_type`,`sr_price`,`sr_status`, `sr_cdate`, `sr_udate`) VALUES ('$pg_id','$sr_name','$type','$price','$status','$c_date','$u_date')";
					
					// CHECK QUERY IN CONNECTION
					if($con->query($ins) == TRUE){
						
						//PAGE REDIRECT
						header("location:index.php?file=service");
						
					}

					
				}?>
			
			          </div>

        </div>
		</div>
		</section>
		
		
	
	
	