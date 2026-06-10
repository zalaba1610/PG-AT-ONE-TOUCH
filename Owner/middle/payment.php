<?php 
$id = $_SESSION['ownerid'];
?>
		
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow-x:auto;">
              <h5 class="card-title">Payment Details</h5>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
				    <th scope="col">Booking</th>
					<th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created Date</th>
					<th scope="col">Action</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
				$j = 1;
					$sel = "select * from payment_tb ,booking_tb where payment_tb.b_id=booking_tb.b_id and booking_tb.o_id = '$id' order by payment_tb.p_id DESC";
					$selr = $con->query($sel);
					foreach($selr as $selv){
				?>
                  <tr>
                    <td><?php echo $j++; ?></td>
                    <td><?php echo $selv['b_id']; ?></td>
					<td>RS.<?php echo $selv['p_amount']; ?></td>
                    
                    <td>
					<?php if($selv['p_status'] == 'Success'){ ?>
					<a href="index.php?file=payment&pid=<?php echo $selv['p_id']; ?>&pstatus=<?php echo $selv['p_status']; ?>" >
				<span class="badge bg-success"><?php echo $selv['p_status']; ?></span></a>
				<?php } else { ?>
				<a href="index.php?file=payment&pid=<?php echo $selv['p_id']; ?>&pstatus=<?php echo $selv['p_status']; ?>" >	
				<span class="badge bg-danger"><?php echo $selv['p_status']; ?></span></a>
				<?php } ?></td>
                    <td><?php echo $selv['p_cdate']; ?></td>
                 <td>   
				<a href="index.php?file=payment&delid=<?php echo $selv['p_id']; ?>" onclick="return confirm('Are you sure want to Delete.?')" >
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
		
		if(isset($_REQUEST['pstatus'])){
			
			$PIDs = $_REQUEST['pid'];
			$PStatus = $_REQUEST['pstatus'];
			
			if($PStatus == 'Success'){
				$NewStatus = "Failed";
			}else{
				$NewStatus = "Success";
			}
			
			//DATE-TIME FUNCTION
			
			
			// delete QUERY
			$upd = "update payment_tb set p_status = '$NewStatus' where p_id = '$PIDs'";
			if($con->query($upd) == TRUE){
				header("location:index.php?file=payment");
			}
			
		}
		
		
		if(isset($_REQUEST['delid'])){
			
			$paymentId = $_REQUEST['delid'];
			
			// delete QUERY
			$Del = "delete from payment_tb where p_id = '$paymentId'";
			if($con->query($Del) == TRUE){
				header("location:index.php?file=payment");
			}
			
		}
	
	?>
