<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  <img src="../upload/other/icon.jpg" alt="">
                  <span class="d-none d-lg-block">Owner Panel</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation"  method="post" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><img src="../upload/other/user.jpg" height="19px" width="19px"></span>
                        <input type="text" name="username" placeholder="Enter Your Contact" class="form-control" id="yourUsername" required>
                      
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
					  <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><img src="../upload/other/download.png" height="17px" width="17px"></span>
                        <input type="password" name="password"  placeholder="Enter Your Password"class="form-control" id="myInput" required>
                      
                      </div>
							<input type="checkbox" onclick="myFunction()"> Show Password
                     
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

                  
				  
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="sub1">Login</button>
                    </div>
					 <?php 
				   if(isset($_REQUEST['sub1']))
				   {
					   
					   $username = $_REQUEST['username'];
					   $password = $_REQUEST['password'];
					   
					   $sel = "select * from owner_tb where o_contact = '$username' and o_password = '$password' and o_status='Active'";
					   $r = $con->query($sel);
					   
					   if(mysqli_num_rows($r) > 0)
					   {
                           foreach($r as $v);

                           session_start();
                           
                           $_SESSION['contact'] = $username;
                           $_SESSION['img'] = $v['o_image'];
                           $_SESSION['ownername'] = $v['o_name'];
                           $_SESSION['time'] = $v['o_udate']; 
                           $_SESSION['ownerid'] = $v['o_id']; 
						   
                           header("location:index.php?file=home");						  
					   }
					   else
					   {
						?>
                    <div class="col-12">
                      <p class="small mb-0" style="color:#ff1d14;">Please Enter Valid Username or Password.!</p>
                    </div>
				   <?php } } ?>	
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="#">Mansi | Minal | Rina</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->