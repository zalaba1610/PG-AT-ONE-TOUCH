  
		
		
		 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Category Details</h5>
             

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
				$j = 1;
					$sel = "select * from category_tb order by cat_id DESC";
					$selr = $con->query($sel);
					foreach($selr as $selv){
				?>
                  <tr>
                    <td><?php echo $j++; ?></td>
                    <td><?php echo $selv['cat_name']; ?></td>
                    <td><img src="../upload/category/<?php echo $selv['cat_image'];?>" height="50px" width="50px" /></td>
                    <td>
					<?php if($selv['cat_status'] == 'Active'){ ?>
					
				<span class="badge bg-success"><?php echo $selv['cat_status']; ?></span>
				<?php } else { ?>
				
				<span class="badge bg-danger"><?php echo $selv['cat_status']; ?></span>
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
	
	
