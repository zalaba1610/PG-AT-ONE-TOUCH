<?php
	$catid = $_REQUEST['edtid'];
	$selid = "select * from category_tb where cat_id='$catid'";
	$selidr = $con->query($selid);
	foreach($selidr as $selidv);
	
?> 
 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Category</h5>

              <!-- General Form Elements -->
              <form  method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $selidv['cat_name']; ?>" name="cat_name">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                     <br/>
					 <img src="../upload/category/<?php echo $selidv['cat_image']; ?>" height="50px" width="50px" align="" alt="" />
					  <input type="hidden" value="<?php echo $selidv['cat_image']; ?>" name="old_img"/>
					  <br/>
					   <input class="form-control" type="file" id="formFile" name="cat_image">
					
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="cat_status">
                      <option>-- Select Status --</option>
					  <?php if($selidv['cat_status'] == 'Active'){ ?>
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
                    <button type="submit" name="edit_category" class="btn btn-primary">Update</button>
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
				
				if(isset($_REQUEST['edit_category'])){
					
					// VARIABLE DECLARATION
					$name = $_REQUEST['cat_name'];
					$status = $_REQUEST['cat_status'];
					$old_img = $_REQUEST['old_img'];
					
					move_uploaded_file($_FILES['cat_image']['tmp_name'],"../upload/category/".$_FILES['cat_image']['name']);
					
					
					
					$image = $_FILES['cat_image']['name'];
					
					if(strlen($image) > 0)
					{
						  $old_img = $image;
					}
					//DATE-TIME FUNCTION
					date_default_timezone_set("Asia/Kolkata");

					$u_date = date('Y-m-d H:i:s');
					
					//UPDATE QUERY
					$upd = "update category_tb set cat_name='$name',cat_image='$old_img',cat_status='$status',cat_udate='$u_date' where cat_id = '$catid'";
					
					// CHECK QUERY IN CONNECTION
					if($con->query($upd) == TRUE){
						
						//PAGE REDIRECT
						header("location:index.php?file=category");
						
					}
					
				}
		
		?>
		
