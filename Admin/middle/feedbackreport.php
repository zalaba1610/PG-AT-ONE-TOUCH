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
                  <select id="inputState" class="form-select" name="f_status">
                    <option value="Show">Show</option>
                    <option value="Hide">Hide</option>
                   
                  </select>
                </div>
               
                <div class="col-md-2">
                  <button type="submit" class="btn btn-primary" name="feedbackreport" style="background-color: #6c757d;">Generate</button>
                  
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
		
		<?php if(isset($_REQUEST['feedbackreport'])){
					
					// VARIABLE DECLARATION
					$s_date = $_REQUEST['s_date'];
					$e_date = $_REQUEST['e_date'];
					$f_status = $_REQUEST['f_status'];
					
				$j = 1;
					
					 $sel = "select * from feedback_tb where feedback_tb.f_status = '$f_status' and Date(feedback_tb.f_cdate) between '$s_date' and '$e_date' order by f_id DESC";
					$selr = $con->query($sel);				
				?>
 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Feedback Details Report (<?php echo $_REQUEST['s_date'];?> to <?php echo $_REQUEST['e_date'];?>)</h5>
             

              <!-- Table with stripped rows -->
              <table class="table datatable" id="testTable">
                <thead>
                   <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
					<th scope="col">Message</th>
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
                    <td><?php echo $selv['f_name']; ?></td>
					<td><?php echo $selv['f_msg']; ?></td>
                    
                    <td>
					<?php if($selv['f_status'] == 'Show'){ ?>
					
				<span class="badge bg-success"><?php echo $selv['f_status']; ?></span>
				<?php } else { ?>
				
				<span class="badge bg-danger"><?php echo $selv['f_status']; ?></span>
				<?php } ?></td>
                    <td><?php echo $selv['f_cdate']; ?></td>
                    <td><?php echo $selv['f_udate']; ?></td>
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
	