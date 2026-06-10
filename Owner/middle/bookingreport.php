 <?php 
$id = $_SESSION['ownerid'];
?>
 <script type="text/javascript">

function sprint() {
    var divToPrint = document.getElementById('testTable');
    var htmlToPrint = '<style type="text/css"> table,table th, table td { border:1px solid #000; border-collapse: collapse; } </style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
	//newWin.window.print();
}
 </script>
   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow-x:auto;">
              <h5 class="card-title">Generate Report</h5>

              <!-- General Form Elements -->
            
			  
			  
			  
			  <form class="row g-3"  method="post" enctype="multipart/form-data">
               
                <div class="col-md-3">
                  <input type="date" class="form-control" name="s_date">
                </div>
                <div class="col-md-3">
                  <input type="date" class="form-control" name="e_date">
                </div>
               
               
                <div class="col-md-3">
                  <select id="inputState" class="form-select" name="b_status">
                    <option value="Pending">Pending</option>
                    <option value="Confirm">Confirm</option>
                    <option value="Cancel">Cancel</option>
                   
                  </select>
                </div>
               
                <div class="col-md-2">
                  <button type="submit" class="btn btn-primary" name="bookingreport" style="background-color: #6c757d;">Generate</button>
                  
                </div>
				 <div class="col-md-1">
                  
                  <button type="submit" class="btn btn-secondary" onclick="sprint('testTable')">Print</button>
                </div>
              </form><!-- End No Labels Form -->

			  
            </div>
			
			
          </div>

        </div>
		</div>
		</section>
		
 
			<?php if(isset($_REQUEST['bookingreport'])){
					
					// VARIABLE DECLARATION
					$s_date = $_REQUEST['s_date'];
					$e_date = $_REQUEST['e_date'];
					$b_status = $_REQUEST['b_status'];
					
				$j = 1;
					
					 $sel = "select * from booking_tb, pg_tb,owner_tb,user_tb where booking_tb.pg_id=pg_tb.pg_id and booking_tb.o_id = owner_tb.o_id and booking_tb.u_id=user_tb.u_id and booking_tb.b_status = '$b_status' and Date(booking_tb.b_cdate) between '$s_date' and '$e_date' and booking_tb.o_id= '$id' order by booking_tb.b_id DESC";
					$selr = $con->query($sel);
				
					
									
				?>
 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Booking Details Report (<?php echo $_REQUEST['s_date'];?> to <?php echo $_REQUEST['e_date'];?>)</h5>
             

              <!-- Table with stripped rows -->
              <table class="table datatable" id="testTable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
					<th scope="col">Owner</th>
					<th scope="col">PG</th>
					<th scope="col">User</th>
					<th scope="col">PgRent</th>
					<th scope="col">Service Name</th>
                    <th scope="col">Service Price</th>
					<th scope="col">Total</th>
					<th scope="col">Status</th>
					<th scope="col">Created Date</th>
					<th scope="col">Updated Date</th>
					
                  </tr>
                </thead>
                <tbody>
                  <?php
				   
					if (mysqli_num_rows($selr) > 0) {
					foreach($selr as $selv){
				?>
                  <tr>
                    <td><?php echo $j++; ?></td>
					<td><?php echo $selv['pg_name']; ?></td>
					<td><?php echo $selv['o_name']; ?><br/>
					<span class="badge bg-success"><?php echo $selv['o_contact']; ?></span></td>
					<td><?php echo $selv['u_name']; ?><br/>
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
						
							<span class="badge bg-primary"><?php echo $selv['b_status']; ?></span>
					<?php } else if($selv['b_status'] == 'Confirm'){ ?>
						
							<span class="badge bg-warning"><?php echo $selv['b_status']; ?></span>
						
					<?php } else if($selv['b_status'] == 'Cancel'){ ?>
						
							<span class="badge bg-success"><?php echo $selv['b_status']; ?></span>
						
					<?php } else { ?>
						<span class="badge bg-danger"><?php echo $selv['b_status']; ?></span>
					<?php } ?></td>
					
                    <td><?php echo $selv['b_cdate']; ?></td>
                    <td><?php echo $selv['b_udate']; ?></td>
                   
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
	
	<?php } } ?>
	