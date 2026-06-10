<?php 
$id = $_SESSION['ownerid'];
?>
		
		 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow-x:auto;">
              <h5 class="card-title">Service Details</h5>
             
			 <a href="index.php?file=service-add" >
				<button type="button" class="btn btn-primary">Add Service</button>
				</a>
				
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
				    <th scope="col">PG</th>
					<th scope="col">Service </th>
					<th scope="col">Type</th>
					<th scope="col">Price</th>
                    <th scope="col">Status</th>
					<th scope="col">Created Date</th>
					<th scope="col">Updated Date</th>
					<th scope="col">Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php
				$j = 1;
					
					$sel = "select * from service_tb,owner_tb,pg_tb where service_tb.pg_id = pg_tb.pg_id and owner_tb.o_id = pg_tb.o_id and pg_tb.o_id = '$id' order by service_tb.sr_id DESC";
					$selr = $con->query($sel);
					foreach($selr as $selv){
				?>
                  <tr>
                    <td><?php echo $j++; ?></td>

					<td><?php echo $selv['pg_name']; ?></td>
					<td><?php echo $selv['sr_name']; ?><br/>
                    
					<td>
					<?php if($selv['sr_type'] == 'Free'){ ?>
					
				<span class="badge bg-success"><?php echo $selv['sr_type']; ?></span>
				<?php } else { ?>
				
				
				<span class="badge bg-danger"><?php echo $selv['sr_type']; ?></span>
				<?php } ?></td>
				 <td>RS.<?php echo $selv['sr_price']; ?></td>

					
                    <td>
					<?php if($selv['sr_status'] == 'Active'){ ?>
					<a href="index.php?file=service&srid=<?php echo $selv['sr_id']; ?>&srstatus=<?php echo $selv['sr_status']; ?>" >
				<span class="badge bg-success"><?php echo $selv['sr_status']; ?></span></a>
				<?php } else { ?>
				<a href="index.php?file=service&srid=<?php echo $selv['sr_id']; ?>&srstatus=<?php echo $selv['sr_status']; ?>" >
				
				<span class="badge bg-danger"><?php echo $selv['sr_status']; ?></span></a>
				<?php } ?></td>
                    <td><?php echo $selv['sr_cdate']; ?></td>
                    <td><?php echo $selv['sr_udate']; ?></td>
                <td>
				<a class="btn btn-success btn-xs" title="Edit" href="index.php?file=service-edit&edtid=<?php echo $selv['sr_id']; ?>" >
				<span class="bi bi-pencil-square"></span></a> 
				<a class="btn btn-danger btn-xs" title="Delete"href="index.php?file=service&delid=<?php echo $selv['sr_id']; ?>" onclick="return confirm('Are you sure want to Delete.?')" ><span class="bi bi-trash"></span>
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
	if(isset($_REQUEST['srstatus'])){
			
			$SRIDs = $_REQUEST['srid'];
			$SRStatus = $_REQUEST['srstatus'];
			
			if($SRStatus == 'Active'){
				$NewStatus = "Deactive";
			}else{
				$NewStatus = "Active";
			}
			
			
			
			
			
			//DATE-TIME FUNCTION
			date_default_timezone_set("Asia/Kolkata");
			$u_date = date('Y-m-d H:i:s');
			
			// delete QUERY
			$upd = "update service_tb set sr_status = '$NewStatus', sr_udate = '$u_date' where sr_id = '$SRIDs'";
			if($con->query($upd) == TRUE){
				header("location:index.php?file=service");
			}
			
		}
		
	
			
		
		if(isset($_REQUEST['delid'])){
			
			$srId = $_REQUEST['delid'];
			
			// delete QUERY
			$Del = "delete from service_tb where sr_id = '$srId'";
			if($con->query($Del) == TRUE){
				header("location:index.php?file=service");
			}
			
		}
	
	?>
