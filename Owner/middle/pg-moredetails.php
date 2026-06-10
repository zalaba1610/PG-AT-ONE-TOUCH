<?php 
$pgid = $_REQUEST['pgid'];
?>
		
		 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow-x: auto;">
              <h5 class="card-title">PG More Details</h5>
              <?php
				
					
					 $sel = "select * from pg_tb, category_tb,area_tb,owner_tb where pg_tb.cat_id=category_tb.cat_id and pg_tb.ar_id = area_tb.ar_id and pg_tb.o_id = owner_tb.o_id and pg_tb.pg_id = '$pgid' order by pg_tb.pg_id DESC";
					$selr = $con->query($sel);
					foreach($selr as $selv);
				?>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
					<td><?php echo $selv['pg_id']; ?></td>
					
                  </tr>
				   <tr>
                    <th scope="col">Area</th>
					<td><?php echo $selv['ar_name']; ?></td>
                  </tr>
				  
				  <tr>
                    <th scope="col">Owner</th>
					<td><?php echo $selv['o_name']; ?><br/>
					<span class="badge bg-success"><?php echo $selv['o_contact']; ?></span></td>
				 </tr>
				 
				 <tr>
                    <th scope="col">Category</th>
					<td><?php echo $selv['cat_name']; ?></td>
                  </tr>
				 
				 <tr>
                    <th scope="col">PG</th>
					<td><?php echo $selv['pg_name']; ?></td>
                  </tr>
				  
				  <tr>
                    <th scope="col">Address</th>
					<td><?php echo $selv['pg_add']; ?></td>
                  </tr>
				  
				  <tr>
                    <th scope="col">Details</th>
					<td><?php echo $selv['pg_details']; ?></td>
                  </tr>
				  
				  <tr>
                    <th scope="col">Capacity</th>
					<td><?php echo $selv['pg_capacity']; ?></td>
                  </tr>
				  
				  <tr>
                    <th scope="col">Rent</th>
					<td>RS.<?php echo $selv['pg_rent']; ?></td>
                  </tr>
				  
				  <tr>
                    <th scope="col">Image 1</th>
					<td><a href="../upload/pg/<?php echo $selv['pg_image1'];?>" target="_blank"><img src="../upload/pg/<?php echo $selv['pg_image1'];?>" height="50px" width="50px" /></a></td>
                  </tr>
				  
				  <tr>
                    <th scope="col">Image 2</th>
					<td><a href="../upload/pg/<?php echo $selv['pg_image2'];?>" target="_blank"><img src="../upload/pg/<?php echo $selv['pg_image2'];?>" height="50px" width="50px" /></a></td>
                  </tr>
				  
				  <tr>
                    <th scope="col">Image 3</th>
					<td><a href="../upload/pg/<?php echo $selv['pg_image3'];?>" target="_blank"><img src="../upload/pg/<?php echo $selv['pg_image3'];?>" height="50px" width="50px" /></a></td>
                  </tr>
				  
				  	<tr>
                    <th scope="col">Status</th>
					<td><?php echo $selv['pg_status'];?></td>
                  </tr>
				  
				  <tr>
				  <th><a href="index.php?file=pg" >
				<button type="button" class="btn btn-primary"> Back</button>
				</a>
				</th>
				  </tr>
                </thead>
                <tbody>
                 
                  <tr>
                    
					
					
				
                  </tr>
					
                </tbody>
				

              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
	
	<?php
	if(isset($_REQUEST['pgstatus'])){
			
			$PGIDs = $_REQUEST['pgid'];
			$PGStatus = $_REQUEST['pgstatus'];
			
			if($PGStatus == 'Active'){
				$NewStatus = "Deactive";
			}else{
				$NewStatus = "Active";
			}
			
			//DATE-TIME FUNCTION
			date_default_timezone_set("Asia/Kolkata");
			$u_date = date('Y-m-d H:i:s');
			
			// delete QUERY
			$upd = "update pg_tb set pg_status = '$NewStatus', pg_udate = '$u_date' where pg_id = '$PGIDs'";
			if($con->query($upd) == TRUE){
				header("location:index.php?file=pg");
			}
			
		}
	
		
		if(isset($_REQUEST['delid'])){
			
			$pgId = $_REQUEST['delid'];
			
			// delete QUERY
			$Del = "delete from pg_tb where pg_id = '$pgId'";
			if($con->query($Del) == TRUE){
				header("location:index.php?file=pg");
			}
			
		}
	
	?>
