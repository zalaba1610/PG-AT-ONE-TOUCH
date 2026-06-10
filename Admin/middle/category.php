  <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow-x:auto;">
              <h5 class="card-title"> Add Category</h5>

              <!-- General Form Elements -->
              <form  method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cat_name" placeholder="Enter Category">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="cat_image">
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="cat_status">
                      <option selected>-- Select Status --</option>
                      <option value="Active">Active</option>
                      <option value="Deactive">Deactive</option>
                    </select>
                  </div>
                </div>

                

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" name="add_category" class="btn btn-primary">Submit </button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
			
			
			<?php if(isset($_REQUEST['add_category'])){
					
					// VARIABLE DECLARATION
					$name = $_REQUEST['cat_name'];
					$status = $_REQUEST['cat_status'];
					
					move_uploaded_file($_FILES['cat_image']['tmp_name'],"../upload/category/".$_FILES['cat_image']['name']);
					
					$image = $_FILES['cat_image']['name'];
					
					//DATE-TIME FUNCTION
					date_default_timezone_set("Asia/Kolkata");
					$c_date = date('Y-m-d H:i:s');
					$u_date = date('Y-m-d H:i:s');
					
					//INSERT QUERY
					$ins = "insert into category_tb(cat_name,cat_image,cat_status,cat_cdate,cat_udate) values ('$name','$image','$status','$c_date','$u_date')";
					
					// CHECK QUERY IN CONNECTION
					if($con->query($ins) == TRUE){
						
						//PAGE REDIRECT
						header("location:index.php?file=category");
						
					}

					
				}?>
          </div>

        </div>
		</div>
		</section>
		
		
		 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Category Details</h5>
             

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
				$j = 1;
					$sel = "select * from category_tb order by cat_id DESC";
					$selr = $con->query($sel);
					foreach($selr as $selv){
				?>
                  <tr>
                    <td><?php echo $j++; ?></td>
                    <td><?php echo $selv['cat_name']; ?></td>
                    <td><img src="../upload/category/<?php echo $selv['cat_image'];?>" height="50px" width="50px" /></td>
                    <td>
					<?php if($selv['cat_status'] == 'Active'){ ?>
					<a href="index.php?file=category&catid=<?php echo $selv['cat_id']; ?>&catstatus=<?php echo $selv['cat_status']; ?>" >
				<span class="badge bg-success"><?php echo $selv['cat_status']; ?></span></a>
				<?php } else { ?>
				<a href="index.php?file=category&catid=<?php echo $selv['cat_id']; ?>&catstatus=<?php echo $selv['cat_status']; ?>" >	
				<span class="badge bg-danger"><?php echo $selv['cat_status']; ?></span></a>
				<?php } ?></td>
                    
                    <td><a href="index.php?file=category-edit&edtid=<?php echo $selv['cat_id']; ?>" >
				<button type="button" class="btn btn-primary">Edit</button>
				</a>
				<a href="index.php?file=category&delid=<?php echo $selv['cat_id']; ?>" onclick="return confirm('Are you sure want to Delete.?')" >
				<button type="button" class="btn btn-danger">Delete</button>
				</a></td>
                  </tr>
					<?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
	
	<?php
		if(isset($_REQUEST['catstatus'])){
			
			$CATIDs = $_REQUEST['catid'];
			$CATStatus = $_REQUEST['catstatus'];
			
			if($CATStatus == 'Active'){
				$NewStatus = "Deactive";
			}else{
				$NewStatus = "Active";
			}
			
			//DATE-TIME FUNCTION
			date_default_timezone_set("Asia/Kolkata");
			$u_date = date('Y-m-d H:i:s');
			
			// delete QUERY
			$upd = "update category_tb set cat_status = '$NewStatus', cat_udate = '$u_date' where cat_id = '$CATIDs'";
			if($con->query($upd) == TRUE){
				header("location:index.php?file=category");
			}
			
		}
	
		
		if(isset($_REQUEST['delid'])){
			
			$CatId = $_REQUEST['delid'];
			
			// delete QUERY
			$Del = "delete from category_tb where cat_id = '$CatId'";
			if($con->query($Del) == TRUE){
				header("location:index.php?file=category");
			}
			
		}
	
	?>
