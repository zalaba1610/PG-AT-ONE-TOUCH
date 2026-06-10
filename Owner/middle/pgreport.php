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
               
                <div class="col-md-2">
                  <button type="submit" class="btn btn-primary" name="pgreport" style="background-color: #6c757d;">Generate</button>
                  
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
		
			<?php if(isset($_REQUEST['pgreport'])){
					
					// VARIABLE DECLARATION
					$s_date = $_REQUEST['s_date'];
					$e_date = $_REQUEST['e_date'];
					
				$j = 1;
					
					$sel = "select * from pg_tb, category_tb,area_tb,owner_tb where pg_tb.cat_id=category_tb.cat_id and pg_tb.ar_id = area_tb.ar_id and pg_tb.o_id=owner_tb.o_id and Date(pg_tb.pg_cdate) between '$s_date' and '$e_date' and pg_tb.o_id = '$id' order by pg_tb.pg_id DESC";
					$selr = $con->query($sel);
				
					
									
				?>
 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pg Details Report (<?php echo $_REQUEST['s_date'];?> to <?php echo $_REQUEST['e_date'];?>)</h5>
             

              <!-- Table with stripped rows -->
              <table class="table datatable" id="testTable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
					<th scope="col">Area</th>
				    <th scope="col">Owner</th>
					<th scope="col">Category</th>
					<th scope="col">PG</th>
					<th scope="col">Address</th>
					<th scope="col">Rent</th>
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
					<td><?php echo $selv['ar_name']; ?></td>
					<td><?php echo $selv['o_name']; ?><br/>
					<span class="badge bg-success"><?php echo $selv['o_contact']; ?></span></td>
					<td><?php echo $selv['cat_name']; ?></td>
					
                    <td><?php echo $selv['pg_name']; ?></td>
				 <td><?php echo $selv['pg_add']; ?></td>

					
					  <td>RS.<?php echo $selv['pg_rent']; ?></td>
                    <td>
					<?php if($selv['pg_status'] == 'Active'){ ?>
					
				<span class="badge bg-success"><?php echo $selv['pg_status']; ?></span>
				<?php } else { ?>
				
				<span class="badge bg-danger"><?php echo $selv['pg_status']; ?></span>
				<?php } ?></td>
                    <td><?php echo $selv['pg_cdate']; ?></td>
                    <td><?php echo $selv['pg_udate']; ?></td>
					
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
               
                <div class="col-md-2">
                  <button type="submit" class="btn btn-primary" name="pgreport" style="background-color: #6c757d;">Generate</button>
                  
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
		
			<?php if(isset($_REQUEST['pgreport'])){
					
					// VARIABLE DECLARATION
					$s_date = $_REQUEST['s_date'];
					$e_date = $_REQUEST['e_date'];
					
				$j = 1;
					
					$sel = "select * from pg_tb, category_tb,area_tb,owner_tb where pg_tb.cat_id=category_tb.cat_id and pg_tb.ar_id = area_tb.ar_id and pg_tb.o_id=owner_tb.o_id and Date(pg_tb.pg_cdate) between '$s_date' and '$e_date' and pg_tb.o_id = '$id' order by pg_tb.pg_id DESC";
					$selr = $con->query($sel);
				
					
									
				?>
 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pg Details Report (<?php echo $_REQUEST['s_date'];?> to <?php echo $_REQUEST['e_date'];?>)</h5>
             

              <!-- Table with stripped rows -->
              <table class="table datatable" id="testTable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
					<th scope="col">Area</th>
				    <th scope="col">Owner</th>
					<th scope="col">Category</th>
					<th scope="col">PG</th>
					<th scope="col">Address</th>
					<th scope="col">Rent</th>
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
					<td><?php echo $selv['ar_name']; ?></td>
					<td><?php echo $selv['o_name']; ?><br/>
					<span class="badge bg-success"><?php echo $selv['o_contact']; ?></span></td>
					<td><?php echo $selv['cat_name']; ?></td>
					
                    <td><?php echo $selv['pg_name']; ?></td>
				 <td><?php echo $selv['pg_add']; ?></td>

					
					  <td>RS.<?php echo $selv['pg_rent']; ?></td>
                    <td>
					<?php if($selv['pg_status'] == 'Active'){ ?>
					
				<span class="badge bg-success"><?php echo $selv['pg_status']; ?></span>
				<?php } else { ?>
				
				<span class="badge bg-danger"><?php echo $selv['pg_status']; ?></span>
				<?php } ?></td>
                    <td><?php echo $selv['pg_cdate']; ?></td>
                    <td><?php echo $selv['pg_udate']; ?></td>
					
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
	
		