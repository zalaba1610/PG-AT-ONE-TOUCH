  <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow-x:auto;">
              <h5 class="card-title"> Add Area</h5>

              <!-- General Form Elements -->
              <form  method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ar_name" placeholder="Enter Area ">
                  </div>
				  
                </div>
                
                
              
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="ar_status">
                      <option selected>-- Select Status --</option>
                      <option value="Active">Active</option>
                      <option value="Deactive">Deactive</option>
                    </select>
                  </div>
                </div>

                

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" name="add_area" class="btn btn-primary">Submit </button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
			
			
			<?php if(isset($_REQUEST['add_area'])){
					
					// VARIABLE DECLARATION
					$name = $_REQUEST['ar_name'];
					$status = $_REQUEST['ar_status'];
					
					
					//DATE-TIME FUNCTION
					date_default_timezone_set("Asia/Kolkata");
					$c_date = date('Y-m-d H:i:s');
					$u_date = date('Y-m-d H:i:s');
					
					//INSERT QUERY
					$ins = "insert into area_tb(ar_name,ar_status,ar_cdate,ar_udate) values ('$name','$status','$c_date','$u_date')";
					
					// CHECK QUERY IN CONNECTION
					if($con->query($ins) == TRUE){
						
						//PAGE REDIRECT
						header("location:index.php?file=area");
						
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
              <h5 class="card-title">Area Details</h5>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
					<th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
				$j = 1;
					$sel = "select * from area_tb order by ar_id DESC";
					$selr = $con->query($sel);
					foreach($selr as $selv){
				?>
                  <tr>
                    <td><?php echo $j++; ?></td>
                    <td><?php echo $selv['ar_name']; ?></td>
                    
                    <td>
					<?php if($selv['ar_status'] == 'Active'){ ?>
					<a href="index.php?file=area&arid=<?php echo $selv['ar_id']; ?>&arstatus=<?php echo $selv['ar_status']; ?>" >
				<span class="badge bg-success"><?php echo $selv['ar_status']; ?></span></a>
				<?php } else { ?>
				<a href="index.php?file=area&arid=<?php echo $selv['ar_id']; ?>&arstatus=<?php echo $selv['ar_status']; ?>" >	
				<span class="badge bg-danger"><?php echo $selv['ar_status']; ?></span></a>
				<?php } ?></td>
                    
                    <td><a href="index.php?file=area-edit&edtid=<?php echo $selv['ar_id']; ?>" >
				<button type="button" class="btn btn-primary">Edit</button>
				</a>
				<a href="index.php?file=area&delid=<?php echo $selv['ar_id']; ?>" onclick="return confirm('Are you sure want to Delete.?')" >
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
	if(isset($_REQUEST['arstatus'])){
			
			$ARIDs = $_REQUEST['arid'];
			$ARStatus = $_REQUEST['arstatus'];
			
			if($ARStatus == 'Active'){
				$NewStatus = "Deactive";
			}else{
				$NewStatus = "Active";
			}
			
			//DATE-TIME FUNCTION
			date_default_timezone_set("Asia/Kolkata");
			$u_date = date('Y-m-d H:i:s');
			
			// delete QUERY
			$upd = "update area_tb set ar_status = '$NewStatus', ar_udate = '$u_date' where ar_id = '$ARIDs'";
			if($con->query($upd) == TRUE){
				header("location:index.php?file=area");
			}
			
		}
	
		
		if(isset($_REQUEST['delid'])){
			
			$areaId = $_REQUEST['delid'];
			
			// delete QUERY
			$Del = "delete from area_tb where ar_id = '$areaId'";
			if($con->query($Del) == TRUE){
				header("location:index.php?file=area");
			}
			
		}
	
	?>
