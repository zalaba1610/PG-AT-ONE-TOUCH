<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow-x:auto;">
              <h5 class="card-title">Review Details</h5>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User</th>
                    <th scope="col">PG</th>
                    <th scope="col">Message</th>
					<th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created Date</th>
					<th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
				    $j = 1;
					$sel = "select * from feedback_tb f,user_tb u,pg_tb p where f.u_id = u.u_id and f.pg_id = p.pg_id and f.f_type = 'Review' order by f_id DESC";
					$selr = $con->query($sel);
					foreach($selr as $selv){
				?>
                  <tr>
                    <td><?php echo $j++; ?></td>
					<td><?php echo $selv['u_name']; ?><br/>
					<span class="badge bg-success"><?php echo $selv['u_contact']; ?></span></td>

					<td><?php echo $selv['pg_name']; ?></td>
					<td><?php echo $selv['f_msg']; ?></td>
					<td><?php echo $selv['f_type']; ?></td>
                    
                    <td>
					<?php if($selv['f_status'] == 'Show')
					{ 
				    ?>
					<a href="index.php?file=review&fid=<?php echo $selv['f_id']; ?>&fstatus=<?php echo $selv['f_status']; ?>" ><span class="badge bg-success"><?php echo $selv['f_status']; ?></span></a>
				    <?php 
				    } 
				    else 
					{ 
				    ?>
				    <a href="index.php?file=review&fid=<?php echo $selv['f_id']; ?>&fstatus=<?php echo $selv['f_status']; ?>" ><span class="badge bg-danger"><?php echo $selv['f_status']; ?></span></a>
				    <?php } ?>
					</td>
                    <td><?php echo $selv['f_cdate']; ?></td>
                   
                 <td>   
				<a href="index.php?file=review&delid=<?php echo $selv['f_id']; ?>" onclick="return confirm('Are you sure want to Delete.?')" >
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
		
		if(isset($_REQUEST['fstatus'])){
			
			$FIDs = $_REQUEST['fid'];
			$FStatus = $_REQUEST['fstatus'];
			
			if($FStatus == 'Show'){
				$NewStatus = "Hide";
			}else{
				$NewStatus = "Show";
			}
			
			//DATE-TIME FUNCTION
			date_default_timezone_set("Asia/Kolkata");
			$u_date = date('Y-m-d H:i:s');
			
			// delete QUERY
			$upd = "update feedback_tb set f_status = '$NewStatus', f_udate = '$u_date' where f_id = '$FIDs'";
			if($con->query($upd) == TRUE){
				header("location:index.php?file=review");
			}
			
		}
		
		
		if(isset($_REQUEST['delid'])){
			
			$feedbackId = $_REQUEST['delid'];
			
			// delete QUERY
			$Del = "delete from feedback_tb where f_id = '$feedbackId'";
			if($con->query($Del) == TRUE){
				header("location:index.php?file=review");
			}
			
		}
	
	?>
