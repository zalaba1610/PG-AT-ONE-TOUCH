<?php
	$areaid = $_REQUEST['edtid'];
	$selid = "select * from area_tb where ar_id='$areaid'";
	$selidr = $con->query($selid);
	foreach($selidr as $selidv);
	
?> 
 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Area</h5>

              <!-- General Form Elements -->
              <form  method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $selidv['ar_name']; ?>" name="ar_name">
                  </div>
                </div>
                
              
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="ar_status">
                      <option>-- Select Status --</option>
					  <?php if($selidv['ar_status'] == 'Active'){ ?>
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
                    <button type="submit" name="edit_area" class="btn btn-primary">Update</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
			
			

          </div>

        </div>
		</div>
		</section>
		
		<?php 
				// UPDATE CONDING
				
				if(isset($_REQUEST['edit_area'])){
					
					// VARIABLE DECLARATION
					$name = $_REQUEST['ar_name'];
					$status = $_REQUEST['ar_status'];
					
					
					
					//DATE-TIME FUNCTION
					date_default_timezone_set("Asia/Kolkata");

					$u_date = date('Y-m-d H:i:s');
					
					//UPDATE QUERY
					$upd = "update area_tb set ar_name='$name',ar_status='$status',ar_udate='$u_date' where ar_id = '$areaid'";
					
					// CHECK QUERY IN CONNECTION
					if($con->query($upd) == TRUE){
						
						//PAGE REDIRECT
						header("location:index.php?file=area");
						
					}
					
				}
		
		?>
		
