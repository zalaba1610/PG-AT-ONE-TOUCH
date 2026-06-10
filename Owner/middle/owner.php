<?php 
$id = $_SESSION['ownerid'];
?>
		
		 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow-x:auto;">
              <h5 class="card-title">Owner Details</h5>
             

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                    <th scope="col">Image</th>
                    <th scope="col">Id Proof</th>
                    <th scope="col">Status</th>
					<th scope="col">Created Date</th>
					<th scope="col">Updated Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				$j = 1;
					$sel = "select * from owner_tb where o_id !='$id' order by o_id DESC";
					$selr = $con->query($sel);
					foreach($selr as $selv){
				?>
                  <tr>
                    <td><?php echo $j++; ?></td>
                    <td><?php echo $selv['o_name']; ?></td>
					 <td><?php echo $selv['o_contact']; ?></td>
					  <td><?php echo $selv['o_add']; ?></td>
                    <td><img src="../upload/owner/<?php echo $selv['o_image'];?>" height="50px" width="50px" /></td>
					 
					 <td><a href="../upload/owner/<?php echo $selv['o_idproof'];?>" target="_blank"><img src="../upload/owner/<?php echo $selv['o_idproof'];?>" height="50px" width="50px" /></a></td>
					 
                    <td>
					<?php if($selv['o_status'] == 'Active'){ ?>
				<span class="badge bg-success"><?php echo $selv['o_status']; ?></span>
				<?php } else { ?>
				
				<span class="badge bg-danger"><?php echo $selv['o_status']; ?></span>
				<?php } ?></td>
                    <td><?php echo $selv['o_cdate']; ?></td>
                    <td><?php echo $selv['o_udate']; ?></td>
                    
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
	if(isset($_REQUEST['ostatus'])){
			
			$OIDs = $_REQUEST['oid'];
			$OStatus = $_REQUEST['ostatus'];
			
			if($OStatus == 'Active'){
				$NewStatus = "Deactive";
			}else{
				$NewStatus = "Active";
			}
			
			//DATE-TIME FUNCTION
			date_default_timezone_set("Asia/Kolkata");
			$u_date = date('Y-m-d H:i:s');
			
			// delete QUERY
			$upd = "update owner_tb set o_status = '$NewStatus', o_udate = '$u_date' where o_id = '$OIDs'";
			if($con->query($upd) == TRUE){
				header("location:index.php?file=owner");
			}
			
		}
	
		
		if(isset($_REQUEST['delid'])){
			
			$ownerId = $_REQUEST['delid'];
			
			// delete QUERY
			$Del = "delete from owner_tb where o_id = '$ownerId'";
			if($con->query($Del) == TRUE){
				header("location:index.php?file=owner");
			}
			
		}
	
	?>
