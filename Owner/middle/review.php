<?php
 $id =  $_SESSION['ownerid'];
?>
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow-x:auto;">
              <h5 class="card-title">Review Details</h5>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User</th>
                    <th scope="col">PG</th>
					<th scope="col">Message</th>
					<th scope="col">Type</th>
                    <th scope="col">Status</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
				    $j = 1;
					$sel = "select * from feedback_tb f,user_tb u,pg_tb p where f.u_id = u.u_id and f.pg_id = p.pg_id and f.f_type = 'Review' and p.o_id = '$id' order by f_id DESC";
					$selr = $con->query($sel);
					foreach($selr as $selv){
				?>
                  <tr>
                    <td><?php echo $j++; ?></td>
					<td><?php echo $selv['u_name']; ?><br/>
					<span class="badge bg-success"><?php echo $selv['u_contact']; ?></span></td>

					<td><?php echo $selv['pg_name']; ?></td>
                    
					<td><?php echo $selv['f_msg']; ?></td>
					<td><?php echo $selv['f_type']; ?></td>
                    
                    <td>
					<?php if($selv['f_status'] == 'Show'){ ?>
					
				<span class="badge bg-success"><?php echo $selv['f_status']; ?></span>
				<?php } else { ?>
				
				<span class="badge bg-danger"><?php echo $selv['f_status']; ?></span>
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
	
	