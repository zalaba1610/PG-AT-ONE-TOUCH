		
		<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow-x:auto;">
              <h5 class="card-title"> Add PG</h5>

              <!-- General Form Elements -->
              <form  method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Category</label>
                  <div class="col-sm-10">
				   <select class="form-select" aria-label="Default select example" name="cat_id">

				  <?Php
						 $sel = "select * from category_tb where cat_status ='Active'";
						$selr = $con->query($sel);
						foreach($selr as $selv){
				  ?>
                                        
                      <option value="<?php echo $selv['cat_id']; ?>"><?php echo $selv['cat_name']; ?></option>
						<?php } ?>
                    </select>
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Area</label>
                  <div class="col-sm-10">
				   <select class="form-select" aria-label="Default select example" name="ar_id">

				  <?Php
						 $sel = "select * from area_tb where ar_status ='Active'";
						$selr = $con->query($sel);
						foreach($selr as $selv){
				  ?>
                                        
                      <option value="<?php echo $selv['ar_id']; ?>"><?php echo $selv['ar_name']; ?></option>
						<?php } ?>
                    </select>
				  
                    
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="pg_name" placeholder="Enter PG Name">
                  </div>
                </div>
				
				<div class="row mb-3">
				<label for="inputText" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <textarea  class="form-control" value="" name="pg_add" placeholder="Enter PG Address"></textarea>
                  </div>
                </div>
				
				<div class="row mb-3">
				<label for="inputText" class="col-sm-2 col-form-label">PG Details</label>
                  <div class="col-sm-10">
                    <textarea  class="form-control" value="" name="pg_details" placeholder="Enter PG Details"></textarea>
                  </div>
                </div>
				
				 <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Image 1</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="pg_image1">
                  </div>
                </div>
				
				 <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Image 2</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="pg_image2">
                  </div>
                </div>
				
				 <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Image 3</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="pg_image3">
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Capacity</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="pg_capacity" placeholder="Enter Capacity">
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Rent</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="pg_rent" placeholder="Enter Rent">
                  </div>
                </div>
                
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="pg_status">
                      <option selected>-- Select Status --</option>
                      <option value="Active">Active</option>
                      <option value="Deactive">Deactive</option>
                    </select>
                  </div>
                </div>

                

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" name="add_pg" class="btn btn-primary">Submit </button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
	<?php if(isset($_REQUEST['add_pg'])){
					
					// VARIABLE DECLARATION
					$cat_id = $_REQUEST['cat_id'];
					$ar_id = $_REQUEST['ar_id'];
					$name = $_REQUEST['pg_name'];
					$add = $_REQUEST['pg_add'];
					$details = $_REQUEST['pg_details'];
					$capacity = $_REQUEST['pg_capacity'];
					$rent = $_REQUEST['pg_rent'];
					$status = $_REQUEST['pg_status'];
					
					move_uploaded_file($_FILES['pg_image1']['tmp_name'],"../upload/pg/".$_FILES['pg_image1']['name']);
					
					$image1 = $_FILES['pg_image1']['name'];
					
					move_uploaded_file($_FILES['pg_image2']['tmp_name'],"../upload/pg/".$_FILES['pg_image2']['name']);
					
					$image2 = $_FILES['pg_image2']['name'];
					
					move_uploaded_file($_FILES['pg_image3']['tmp_name'],"../upload/pg/".$_FILES['pg_image3']['name']);
					
					$image3 = $_FILES['pg_image3']['name'];
					
					$ownerid = $_SESSION['ownerid'];
					
					//DATE-TIME FUNCTION
					date_default_timezone_set("Asia/Kolkata");
					$c_date = date('Y-m-d H:i:s');
					$u_date = date('Y-m-d H:i:s');
					
					//INSERT QUERY
			         $ins = "INSERT INTO pg_tb(`cat_id`, `ar_id`, `o_id`, `pg_name`, `pg_add`, `pg_details`, `pg_image1`, `pg_image2`, `pg_image3`, `pg_capacity`, `pg_rent`, `pg_status`, `pg_cdate`, `pg_udate`) VALUES ('$cat_id','$ar_id','$ownerid','$name','$add','$details','$image1','$image2','$image3','$capacity','$rent','$status','$c_date','$u_date')";
					
					// CHECK QUERY IN CONNECTION
					if($con->query($ins) == TRUE){
						
						//PAGE REDIRECT
						header("location:index.php?file=pg");
						
					}

					
				}?>
			
			          </div>

        </div>
		</div>
		</section>
		
		
	
	
	