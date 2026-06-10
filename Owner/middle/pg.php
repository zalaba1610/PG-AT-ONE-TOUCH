<?php 
$id = $_SESSION['ownerid'];
?>
		
		 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" >
            <div class="card-body" style="overflow-x: auto;">
              <h5 class="card-title">PG Details</h5>
			 
				
			  <a href="index.php?file=pg-add" >
				<button type="button" class="btn btn-primary">Add PG</button>
				</a>
             

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
					<th scope="col">Area</th>
					<th scope="col">Category</th>
					<th scope="col">PG</th>
					<th scope="col">Address</th>
					<th scope="col">Rent</th>
                    <th scope="col">Status</th>
					<th scope="col">Created Date</th>
					<th scope="col">Updated Date</th>
					<th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				$j = 1;
					
					 $sel = "select * from pg_tb, category_tb,area_tb,owner_tb where pg_tb.cat_id=category_tb.cat_id and pg_tb.ar_id = area_tb.ar_id and pg_tb.o_id=owner_tb.o_id and pg_tb.o_id = '$id' order by pg_tb.pg_id DESC";
					$selr = $con->query($sel);
					foreach($selr as $selv){
				?>
                  <tr>
                    <td><?php echo $j++; ?></td>
					<td><?php echo $selv['ar_name']; ?></td>
					<td><?php echo $selv['cat_name']; ?></td>
					<td><?php echo $selv['pg_name']; ?></td>
				    <td><?php echo $selv['pg_add']; ?></td>

					
					  <td>RS.<?php echo $selv['pg_rent']; ?></td>
                    <td>
					<?php if($selv['pg_status'] == 'Active'){ ?>
					<a href="index.php?file=pg&pgid=<?php echo $selv['pg_id']; ?>&pgstatus=<?php echo $selv['pg_status']; ?>" >
				<span class="badge bg-success"><?php echo $selv['pg_status']; ?></span></a>
				<?php } else { ?>
				<a href="index.php?file=pg&pgid=<?php echo $selv['pg_id']; ?>&pgstatus=<?php echo $selv['pg_status']; ?>" >
				
				<span class="badge bg-danger"><?php echo $selv['pg_status']; ?></span></a>
				<?php } ?></td>
                    <td><?php echo $selv['pg_cdate']; ?></td>
                    <td><?php echo $selv['pg_udate']; ?></td>
					
					
				<td>
				<a class="btn btn-primary btn-xs" title="Pg Details" href="index.php?file=pg-moredetails&pgid=<?php echo $selv['pg_id']; ?>"><span class="bi bi-list-ul"></span></a>
                <a class="btn btn-success btn-xs" title="Edit" href="index.php?file=pg-edit&edtid=<?php echo $selv['pg_id']; ?>" >
				<span class="bi bi-pencil-square"></span></a> 
				<a class="btn btn-danger btn-xs" title="Delete"href="index.php?file=pg&delid=<?php echo $selv['pg_id']; ?>" onclick="return confirm('Are you sure want to Delete.?')" ><span class="bi bi-trash"></span>
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
