<?php
	$pgid = $_REQUEST['edtid'];
	$selid = "select * from pg_tb where pg_id='$pgid'";
	$selidr = $con->query($selid);
	foreach($selidr as $selidv);
	
?>
		<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow-x:auto;">
              <h5 class="card-title">PG Edit</h5>

              <!-- General Form Elements -->
              <form  method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Category</label>
                  <div class="col-sm-10">
				   <select class="form-select" aria-label="Default select example" name="cat_id">

				  <?Php
						$sel = "select * from category_tb where cat_status ='Active'";
						$selr = $con->query($sel);
						foreach($selr as $selv)
						{
							if($selv['cat_id'] == $selidv['cat_id'])
							{
				  ?>
                                        
                       <option value="<?php echo $selv['cat_id']; ?>" selected><?php echo $selv['cat_name']; ?></option>
						<?php } else {?>
						<option value="<?php echo $selv['cat_id']; ?>"><?php echo $selv['cat_name']; ?></option>
						<?php } }?>
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
						foreach($selr as $selv)
						{
							if($selv['ar_id'] == $selidv['ar_id'])
							{
				  ?>
                                        
                      <option value="<?php echo $selv['ar_id']; ?>" selected><?php echo $selv['ar_name']; ?></option>
					  <?php } else {?>
						<option value="<?php echo $selv['ar_id']; ?>"><?php echo $selv['ar_name']; ?></option>
						<?php } } ?>
                    </select>
				  
                    
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?php echo $selidv['pg_name']; ?>" name="pg_name" placeholder="Enter PG Name">
                  </div>
                </div>
				
				<div class="row mb-3">
				<label for="inputText" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <textarea  class="form-control"  name="pg_add" placeholder="Enter PG Address"><?php echo $selidv['pg_add']; ?></textarea>
                  </div>
                </div>
				
				<div class="row mb-3">
				<label for="inputText" class="col-sm-2 col-form-label">PG Details</label>
                  <div class="col-sm-10">
                    <textarea  class="form-control"  name="pg_details" placeholder="Enter PG Details"><?php echo $selidv['pg_details']; ?></textarea>
                  </div>
                </div>
				
				 <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Image 1</label>
                  <div class="col-sm-10">
					 <br/>
					 <img src="../upload/pg/<?php echo $selidv['pg_image1']; ?>" height="50px" width="50px" align="" alt="" />
					  <input type="hidden" value="<?php echo $selidv['pg_image1']; ?>" name="old_img1"/>
					  <br/>
                    <input class="form-control" type="file" id="formFile"  name="pg_image1">
                  </div>
                </div>
				
				 <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Image 2</label>
                  <div class="col-sm-10">
				  <br/>
					 <img src="../upload/pg/<?php echo $selidv['pg_image2']; ?>" height="50px" width="50px" align="" alt="" />
					  <input type="hidden" value="<?php echo $selidv['pg_image2']; ?>" name="old_img2"/>
					  <br/>
                    <input class="form-control" type="file"  id="formFile" name="pg_image2">
                  </div>
                </div>
				
				 <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Image 3</label>
                  <div class="col-sm-10">
				    <br/>
					 <img src="../upload/pg/<?php echo $selidv['pg_image3']; ?>" height="50px" width="50px" align="" alt="" />
					  <input type="hidden" value="<?php echo $selidv['pg_image3']; ?>" name="old_img3"/>
					  <br/>
                    <input class="form-control" type="file" id="formFile"  name="pg_image3">
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Capacity</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="pg_capacity"  value="<?php echo $selidv['pg_capacity']; ?>" placeholder="Enter Capacity">
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Rent</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="pg_rent" value="<?php echo $selidv['pg_rent']; ?>" placeholder="Enter Rent">
                  </div>
                </div>
                
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="pg_status">
                      <option>-- Select Status --</option>
					  <?php if($selidv['pg_status'] == 'Active'){ ?>
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
                    <button type="submit" name="edit_pg" class="btn btn-primary">Update </button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
	<?php if(isset($_REQUEST['edit_pg'])){
					
					// VARIABLE DECLARATION
					$cat_id = $_REQUEST['cat_id'];
					$ar_id = $_REQUEST['ar_id'];
					$name = $_REQUEST['pg_name'];
					$add = $_REQUEST['pg_add'];
					$details = $_REQUEST['pg_details'];
					$capacity = $_REQUEST['pg_capacity'];
					$rent = $_REQUEST['pg_rent'];
					$status = $_REQUEST['pg_status'];
					$old_img1 = $_REQUEST['old_img1'];
					$old_img2 = $_REQUEST['old_img2'];
					$old_img3 = $_REQUEST['old_img3'];
					
					move_uploaded_file($_FILES['pg_image1']['tmp_name'],"../upload/pg/".$_FILES['pg_image1']['name']);
					
					$image1 = $_FILES['pg_image1']['name'];
					
					if(strlen($image1) > 0)
					{
						  $old_img1 = $image1;
					}
					
					move_uploaded_file($_FILES['pg_image2']['tmp_name'],"../upload/pg/".$_FILES['pg_image2']['name']);
					
					$image2 = $_FILES['pg_image2']['name'];
					
					if(strlen($image2) > 0)
					{
						  $old_img2 = $image2;
					}
					
					move_uploaded_file($_FILES['pg_image3']['tmp_name'],"../upload/pg/".$_FILES['pg_image3']['name']);
					
					$image3 = $_FILES['pg_image3']['name'];
					
					if(strlen($image3) > 0)
					{
						  $old_img3 = $image3;
					}
					
					
					
					
					//DATE-TIME FUNCTION
					date_default_timezone_set("Asia/Kolkata");

					$u_date = date('Y-m-d H:i:s');
					
					//UPDATE QUERY
					$upd = "update pg_tb set cat_id='$cat_id',ar_id='$ar_id',pg_name='$name',pg_add='$add',pg_details='$details',pg_image1='$old_img1',pg_image2='$old_img2',pg_image3='$old_img3',pg_capacity='$capacity',pg_rent='$rent',pg_status='$status',pg_udate='$u_date' where pg_id = '$pgid'";
					
					// CHECK QUERY IN CONNECTION
					if($con->query($upd) == TRUE){
						
						//PAGE REDIRECT
						header("location:index.php?file=pg");
						
					}
					
				

					
				}?>
			
			          </div>

        </div>
		</div>
		</section>
		
		
	
	
	