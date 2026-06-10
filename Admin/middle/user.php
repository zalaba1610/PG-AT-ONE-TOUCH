
 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow-x:auto;">
              <h5 class="card-title">User Details</h5>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
					<th scope="col">Contact</th>
                    <th scope="col">Image</th>
					<th scope="col">Address</th>
					<th scope="col">Gender</th>
                    <th scope="col">Password</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Updated Date</th>
					<th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
				$j = 1;
					$sel = "select * from user_tb order by u_id DESC";
					$selr = $con->query($sel);
					foreach($selr as $selv){
				?>
                  <tr>
                    <td><?php echo $j++; ?></td>
					
					
                    <td><?php echo $selv['u_name']; ?></td>
					<td><?php echo $selv['u_contact']; ?></td>
                    <td><img src="../upload/user/<?php echo $selv['u_image'];?>" height="50px" width="50px" /></td>
					<td><?php echo $selv['u_add']; ?></td>
					<td>
					
					<?php if ($selv['u_gender'] == 'Female'){ ?>
				<span class="badge bg-primary"><?php echo $selv['u_gender']; ?></span>
				<?php } else { ?>
				<span class="badge bg-secondary"><?php echo $selv['u_gender']; ?></span>
				<?php } ?></td>
                    <td><?php echo $selv['u_password']; ?></td>
					<td>
					
					<?php if ($selv['u_status'] == 'Active'){ ?>
					<a href="index.php?file=user&uid=<?php echo $selv['u_id']; ?>&ustatus=<?php echo $selv['u_status']; ?>" >
				<span class="badge bg-success"><?php echo $selv['u_status']; ?></span></a>
				<?php } else { ?>
				<a href="index.php?file=user&uid=<?php echo $selv['u_id']; ?>&ustatus=<?php echo $selv['u_status']; ?>" >
				<span class="badge bg-danger"><?php echo $selv['u_status']; ?></span></a>
				<?php } ?></td>
                    <td><?php echo $selv['u_cdate']; ?></td>
                    <td><?php echo $selv['u_udate']; ?></td>
                    <td>
				<a href="index.php?file=user&delid=<?php echo $selv['u_id']; ?>" onclick="return confirm('Are you sure want to Delete.?')" >
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
	if(isset($_REQUEST['ustatus'])){
			
			$UIDs = $_REQUEST['uid'];
			$UStatus = $_REQUEST['ustatus'];
			
			if($UStatus == 'Active'){
				$NewStatus = "Deactive";
			}else{
				$NewStatus = "Active";
			}
			
			//DATE-TIME FUNCTION
			date_default_timezone_set("Asia/Kolkata");
			$u_date = date('Y-m-d H:i:s');
			
			// delete QUERY
			$upd = "update user_tb set u_status = '$NewStatus', u_udate = '$u_date' where u_id = '$UIDs'";
			if($con->query($upd) == TRUE){
				header("location:index.php?file=user");
			}
			
		}
		
		
		if(isset($_REQUEST['delid'])){
			
			$userId = $_REQUEST['delid'];
			
			// delete QUERY
			$Del = "delete from user_tb where u_id = '$userId'";
			if($con->query($Del) == TRUE){
				header("location:index.php?file=user");
			}
			
		}
	
	?>
