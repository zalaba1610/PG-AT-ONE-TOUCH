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
                  <button type="submit" class="btn btn-primary" name="ownerreport" style="background-color: #6c757d;">Generate</button>
                  
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
		
		<?php if(isset($_REQUEST['ownerreport'])){
					
					// VARIABLE DECLARATION
					$s_date = $_REQUEST['s_date'];
					$e_date = $_REQUEST['e_date'];
					
				$j = 1;
					
					$sel = "select * from owner_tb where Date(o_cdate) between '$s_date' and '$e_date' order by o_id DESC";
					$selr = $con->query($sel);
									
				?>
				<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Owner Details Report (<?php echo $_REQUEST['s_date'];?> to <?php echo $_REQUEST['e_date'];?>)</h5>
             

              <!-- Table with stripped rows -->
              <table class="table datatable" id="testTable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                    <th scope="col">Image</th>
                    <th scope="col">Id Proof</th>
					<th scope="col">Password</th>
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
                    <td><?php echo $selv['o_name']; ?></td>
					 <td><?php echo $selv['o_contact']; ?></td>
					  <td><?php echo $selv['o_add']; ?></td>
                    <td><img src="../upload/owner/<?php echo $selv['o_image'];?>" height="50px" width="50px" /></td>
					 
					  <td><img src="../upload/owner/<?php echo $selv['o_idproof'];?>" height="50px" width="50px" /></td>
					 
					  <td><?php echo $selv['o_password']; ?></td>
                    <td>
					<?php if($selv['o_status'] == 'Active'){ ?>
					<a href="index.php?file=owner&oid=<?php echo $selv['o_id']; ?>&ostatus=<?php echo $selv['o_status']; ?>" >
				<span class="badge bg-success"><?php echo $selv['o_status']; ?></span></a>
				<?php } else { ?>
				<a href="index.php?file=owner&oid=<?php echo $selv['o_id']; ?>&ostatus=<?php echo $selv['o_status']; ?>" >
				
				<span class="badge bg-danger"><?php echo $selv['o_status']; ?></span></a>
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
	
	<?php } } ?>
	