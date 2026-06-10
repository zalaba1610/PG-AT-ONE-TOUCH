<?php
	$oid =$_SESSION['ownerid']; 
	$selid = "select * from owner_tb where o_id='$oid'";
	$selidr = $con->query($selid);
	foreach($selidr as $selidv);
	
?> 
 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Change Profile</h5>

              <!-- General Form Elements -->
              <form  method="post" enctype="multipart/form-data">
			  
					 <img src="../upload/owner/<?php echo $selidv['o_image']; ?>" height="150px" width="150px" style="border-radius:50%; border:3px solid black;" alt="" /><br/><br/>
			   <div class="row mb-3">
                   <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
					  <input type="hidden" value="<?php echo $selidv['o_image']; ?>" name="old_img"/>
					  <input class="form-control" type="file" id="formFile" name="o_image">
					
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $selidv['o_name']; ?>" name="o_name">
                  </div>
                </div>
				
				<div class="row mb-3">
				<label for="inputText" class="col-sm-2 col-form-label">Contact</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $selidv['o_contact']; ?>" name="o_contact" readonly>
                  </div>
                </div>
				
				<div class="row mb-3">
				<label for="inputText" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <textarea  class="form-control" value="" name="o_add"><?php echo $selidv['o_add']; ?></textarea>
                  </div>
                </div>
                
               
				
				<div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">IdProof</label>
                  <div class="col-sm-10">
                     <br/>
					 <a href="../upload/owner/<?php echo $selidv['o_idproof']; ?>"  target="_blank" >View IdProof</a>
					  <input type="hidden" value="<?php echo $selidv['o_idproof']; ?>" name="old_idproof"/>
					  <br/>
					   <input class="form-control" type="file" id="formFile" name="o_idproof">
					
                  </div>
                </div>
				
				<div class="row mb-3">
				<label for="inputText" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" value="<?php echo $selidv['o_password']; ?>" name="o_password" id="myInput">
					<input type="checkbox" onclick="myFunction()"> Show Password
                  </div>
					 
                </div>
				 <script>
					function myFunction() {
					  var x = document.getElementById("myInput");
					  if (x.type === "password") {
						x.type = "text";
					  } else {
						x.type = "password";
					  }
					}
					</script>
				
				<div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" name="edit_profile" class="btn btn-primary">Change Profile</button>
                  </div>
                </div>
              


              </form><!-- End General Form Elements -->

            </div>
			
			

          </div>

        </div>
		</div>
		</section>
		
		<?php 
				// UPDATE CONDING
				
				if(isset($_REQUEST['edit_profile'])){
					
					// VARIABLE DECLARATION
					$name = $_REQUEST['o_name'];
					$address = $_REQUEST['o_add'];
					$old_img = $_REQUEST['old_img'];
					$old_idproof = $_REQUEST['old_idproof'];
					$password = $_REQUEST['o_password'];

					
					move_uploaded_file($_FILES['o_image']['tmp_name'],"../upload/owner/".$_FILES['o_image']['name']);
					
					
					
					$image = $_FILES['o_image']['name'];
					
					if(strlen($image) > 0)
					{
						  $old_img = $image;
					}
					 
					
					move_uploaded_file($_FILES['o_idproof']['tmp_name'],"../upload/owner/".$_FILES['o_idproof']['name']);
					
					
					
					$idproof = $_FILES['o_idproof']['name'];
					
					if(strlen($idproof) > 0)
					{
						  $old_idproof = $idproof;
					}
					
					//DATE-TIME FUNCTION
					date_default_timezone_set("Asia/Kolkata");

					$u_date = date('Y-m-d H:i:s');
					
					//UPDATE QUERY
					$upd = "update owner_tb set o_name='$name',o_add='$address',o_image='$old_img',o_idproof='$old_idproof',o_password='$password',o_udate='$u_date'where o_id = '$oid'";
					
					// CHECK QUERY IN CONNECTION
					if($con->query($upd) == TRUE){
						
						//PAGE REDIRECT
						header("location:index.php?file=home");
						
					}
					
				}
		
		?>
		
