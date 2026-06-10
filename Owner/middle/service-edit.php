<?php
	$srid = $_REQUEST['edtid'];
	$selid = "select * from service_tb where sr_id='$srid'";
	$selidr = $con->query($selid);
	foreach($selidr as $selidv);
	
?>
		<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow-x:auto;">
              <h5 class="card-title">Service Edit</h5>

              <!-- General Form Elements -->
              <form  method="post" enctype="multipart/form-data">
			  <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">PG</label>
                  <div class="col-sm-10">
				   <select class="form-select" aria-label="Default select example" name="pg_id">

				  <?Php
						 $sel = "select * from pg_tb where pg_status ='Active' ";
						$selr = $con->query($sel);
						foreach($selr as $selv){
				  ?>
                                        
                      <option value="<?php echo $selv['pg_id']; ?>"><?php echo $selv['pg_name']; ?> | <?php echo $selv['pg_rent'];?></option>
						<?php } ?>
                    </select>
				  
                    
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="sr_name" value="<?php echo $selidv['sr_name']; ?>" placeholder="Enter Price">
                  </div>
                </div>
				
				
				
				
				<div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Type</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="sr_type">
                      <option>-- Select Type --</option>
					  <?php if($selidv['sr_type'] == 'Free'){ ?>
                      <option value="Free" selected>Free</option>
                      <option value="Paid">Paid</option>
					  <?php }else { ?>
					  <option value="Free" >Free</option>
                      <option value="Paid" selected>Paid</option>
					  <?php } ?>
                    </select>
                  </div>
                </div>

				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="sr_price" value="<?php echo $selidv['sr_price']; ?>" placeholder="Enter Price">
                  </div>
                </div>
                
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="sr_status">
                      <option>-- Select Status --</option>
					  <?php if($selidv['sr_status'] == 'Active'){ ?>
                      <option value="Active" selected>Active</option>
                      <option value="Deactive">Deactive</option>
					  <?php }else { ?>
					  <option value="Active" >Active</option>
                      <option value="Deactive" selected>Deactive</option>
					  <?php } ?>
                    </select>
                  </div>
                </div>

                

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" name="edit_service" class="btn btn-primary">Update </button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
	<?php if(isset($_REQUEST['edit_service'])){
					
					// VARIABLE DECLARATION
					$pg_id = $_REQUEST['pg_id'];
					$sr_name = $_REQUEST['sr_name'];
					$type = $_REQUEST['sr_type'];
					$price = $_REQUEST['sr_price'];
					$status = $_REQUEST['sr_status'];
					
					
					
					//DATE-TIME FUNCTION
					date_default_timezone_set("Asia/Kolkata");

					$u_date = date('Y-m-d H:i:s');
					
					//UPDATE QUERY
					$upd = "update service_tb set pg_id='$pg_id',sr_name='$sr_name',sr_type='$type',sr_price='$price',sr_status='$status',sr_udate='$u_date' where sr_id = '$srid'";
					
					// CHECK QUERY IN CONNECTION
					if($con->query($upd) == TRUE){
						
						//PAGE REDIRECT
						header("location:index.php?file=service");
						
					}
					
				

					
				}?>
			
			          </div>

        </div>
		</div>
		</section>
		
		
	
	
	