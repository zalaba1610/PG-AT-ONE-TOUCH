  
		
		
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
					
				<span class="badge bg-success"><?php echo $selv['ar_status']; ?></span>
				<?php } else { ?>
					
				<span class="badge bg-danger"><?php echo $selv['ar_status']; ?></span>
				<?php } ?></td>
                    
                    
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
