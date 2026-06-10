<?php 
$bookingstatus = $_REQUEST['bookstatus'];
$id = $_SESSION['ownerid'];
?>
 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow-x:auto;">
              <h5 class="card-title"><?php echo $bookingstatus; ?> Booking Details</h5>
             

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
					<th scope="col">PG</th>
					<th scope="col">User</th>
					<th scope="col">Pg Rent</th>
					<th scope="col">Service Name</th>
                    <th scope="col">Service Price</th>
					<th scope="col">Total</th>
					<th scope="col">Status</th>
					<th scope="col">Created Date</th>
					<th scope="col">Updated Date</th>
					<th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				  
				$j = 1;
					
					 $sel = "select * from booking_tb, pg_tb,owner_tb,user_tb where booking_tb.pg_id=pg_tb.pg_id and booking_tb.o_id = owner_tb.o_id and booking_tb.u_id=user_tb.u_id and booking_tb.b_status = '$bookingstatus' and booking_tb.o_id= '$id' order by booking_tb.b_id DESC";
					$selr = $con->query($sel);
					foreach($selr as $selv){
				?>
                  <tr>
                    <td><?php echo $j++; ?></td>
					
					<td><?php echo $selv['pg_name']; ?></td>
					
					<td><?php echo $selv['u_name']; ?><br/>
					<span class="badge bg-success"><?php echo $selv['u_contact']; ?></span></td>
                    <td>RS.<?php echo $selv['b_pgrent']; ?></td>
					<td>
					<?php
						$myString = $selv['b_servicename'];
						$myArray = explode(',', $myString);
						foreach($myArray as $ArrayValue){
					?>
				 <span class="badge bg-info"><?php echo $ArrayValue; ?></span>
						<?php } ?>
					</td>
				 <td>RS.<?php echo $selv['b_serviceprice']; ?></td>
					<td>RS.<?php echo $selv['b_total']; ?></td>
					 
                     <td>
					
					<?php if($selv['b_status'] == 'Pending'){ ?>
						<a href="index.php?file=booking&bid=<?php echo $selv['b_id']; ?>&bstatus=<?php echo $selv['b_status']; ?>">
							<span class="badge bg-primary"><?php echo $selv['b_status']; ?></span></a>
					<?php } else if($selv['b_status'] == 'Confirm'){ ?>
						<a href="index.php?file=booking&bid=<?php echo $selv['b_id']; ?>&bstatus=<?php echo $selv['b_status']; ?>">
							<span class="badge bg-warning"><?php echo $selv['b_status']; ?></span>
						</a>
					<?php } else if($selv['b_status'] == 'Complete'){ ?>
						<a href="index.php?file=booking&bid=<?php echo $selv['b_id']; ?>&bstatus=<?php echo $selv['b_status']; ?>">
							<span class="badge bg-success"><?php echo $selv['b_status']; ?></span>
						</a>
					<?php } else { ?>
						<span class="badge bg-danger"><?php echo $selv['b_status']; ?></span>
					<?php } ?></td>
					
                    <td><?php echo $selv['b_cdate']; ?></td>
                    <td><?php echo $selv['b_udate']; ?></td>
                    <td>
				<a href="index.php?file=booking&delid=<?php echo $selv['b_id']; ?>&statusbook=<?php echo $selv['b_status']; ?>" onclick="return confirm('Are you sure want to Delete.?')" >
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
	if(isset($_REQUEST['bstatus'])){
			
			$BIDs = $_REQUEST['bid'];
			$BStatus = $_REQUEST['bstatus'];
			
			if($BStatus == 'Pending'){
				$NewStatus = "Confirm";
			}else if($BStatus == 'Confirm'){
				$NewStatus = "Cancel";
			}
		
			//DATE-TIME FUNCTION
			date_default_timezone_set("Asia/Kolkata");
			$u_date = date('Y-m-d H:i:s');
			
			// delete QUERY
			$upd = "update booking_tb set b_status = '$NewStatus', b_udate = '$u_date' where b_id = '$BIDs'";
			if($con->query($upd) == TRUE){
				header("location:index.php?file=booking&bookstatus=".$NewStatus);
			}
			
		}
	?>
		
	<?php	if(isset($_REQUEST['delid'])){
			
			$bId = $_REQUEST['delid'];
			$statusbook = $_REQUEST['statusbook'];
			
			// delete QUERY
			$Del = "delete from booking_tb where b_id = '$bId'";
			if($con->query($Del) == TRUE){
				header("location:index.php?file=booking&bookstatus=".$statusbook);
			}
			
		}
	
	?>
